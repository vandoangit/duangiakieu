<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Import_database{

	private $_db_server='localhost';
	private $_db_username='root';
	private $_db_password='';
	private $_db_name='hominhtri';
	private $_db_connection_charset='utf8';
	private $_file_name='';
	private $_linespersession=3000;
	private $_csv_insert_table='';
	private $_csv_preempty_table=false;
	private $_csv_delimiter=',';
	private $_csv_add_slashes=false;
	private $_csv_add_quotes=false;
	private $_comment=array(
		'#',
		'--',
		'DELIMITER',
		//'---',
		//'CREATE DATABASE',
		'/*!'
	);
	private $_pre_query=array();
	private $_delimiter=';';
	private $_string_quotes='\'';
	private $_error_action=false;
	private $_message_action=array();
	private $_db_connection=false;

	public function __construct(){

		$this->_error_action=false;

		define('DATA_CHUNK_LENGTH',16384);
		define('MAX_QUERY_LINES',300);

		@ini_set('auto_detect_line_endings',true);
		@set_time_limit(0);

		foreach($_REQUEST as $key=> $val){

			$val=preg_replace("/[^_A-Za-z0-9-\.&= ;\$]/i",'',$val);
			$_REQUEST[$key]=$val;
		}

		if(function_exists("date_default_timezone_set") && function_exists("date_default_timezone_get"))
			@date_default_timezone_set(@date_default_timezone_get());

		if(!$this->_error_action && !function_exists('version_compare')){

			$this->_message_action['error_version_compare']="<p class='error'>PHP version 4.1.0 is required for BigDump to proceed.You have PHP ".phpversion()." installed.Sorry!</p>";
			$this->_error_action=true;
		}

		if(!$this->_error_action && !function_exists('mysql_connect')){

			$this->_message_action['error_mysql_connect']="<p class='error'>There is no mySQL extension available in your PHP installation.Sorry!</p>";
			$this->_error_action=true;
		}

	}

	public function __destruct(){

		if($this->_db_connection)
			@mysql_close($this->_db_connection);

	}

	private function get_max_file_size(){

		$upload_max_filesize=0;

		if(!$this->_error_action){

			$upload_max_filesize=ini_get("upload_max_filesize");

			if(preg_match("/([0-9]+)K/i",$upload_max_filesize,$tempregs))
				$upload_max_filesize=$tempregs[1] * 1024;

			if(preg_match("/([0-9]+)M/i",$upload_max_filesize,$tempregs))
				$upload_max_filesize=$tempregs[1] * 1024 * 1024;

			if(preg_match("/([0-9]+)G/i",$upload_max_filesize,$tempregs))
				$upload_max_filesize=$tempregs[1] * 1024 * 1024 * 1024;
		}

		return $upload_max_filesize;

	}

	private function get_upload_dir(){

		$upload_dir='';

		if(!$this->_error_action){

			if(isset($_SERVER["CGIA"]))
				$upload_dir=dirname($_SERVER["CGIA"]);
			else if(isset($_SERVER["ORIG_PATH_TRANSLATED"]))
				$upload_dir=dirname($_SERVER["ORIG_PATH_TRANSLATED"]);
			else if(isset($_SERVER["ORIG_SCRIPT_FILENAME"]))
				$upload_dir=dirname($_SERVER["ORIG_SCRIPT_FILENAME"]);
			else if(isset($_SERVER["PATH_TRANSLATED"]))
				$upload_dir=dirname($_SERVER["PATH_TRANSLATED"]);
			else
				$upload_dir=dirname($_SERVER["SCRIPT_FILENAME"]);
		}

		return $upload_dir;

	}

	public function connect_database(){

		if(!$this->_error_action){

			$this->_db_connection=@mysql_connect($this->_db_server,$this->_db_username,$this->_db_password);
			if($this->_db_connection)
				$db=mysql_select_db($this->_db_name);

			if(!$this->_db_connection || !$db){

				$this->_message_action['error_connect_database']="<p class='error'>Database connection failed due to ".mysql_error()." or contact your database provider.</p>";
				$this->_error_action=true;
			}

			if(!$this->_error_action && ($this->_db_connection_charset !== ''))
				@mysql_query("SET NAMES ".$this->_db_connection_charset,$this->_db_connection);
		}
		else
			$this->_db_connection=false;

	}

	public function pre_query(){

		if(!$this->_error_action && (sizeof($this->_pre_query) > 0)){

			if($this->_db_connection){

				reset($this->_pre_query);
				foreach($this->_pre_query as $pre_query_value){

					if(!@mysql_query($pre_query_value,$this->_db_connection)){

						$this->_message_action['error_pre_query']="<p class='error'>Error with pre-query.</p>
                                                                    <p>Query: ".trim(nl2br(htmlentities($pre_query_value)))."</p>
                                                                    <p>MySQL: ".mysql_error()."</p>";
						$this->_error_action=true;
						break;
					}
				}
			}
			else{

				$this->_message_action['error_pre_query']="<p class='error'>Database connection failed due to ".mysql_error()." or contact your database provider.</p>";
				$this->_error_action=true;
			}
		}

	}

	private function pre_empty_table(){

		if(!$this->_error_action && ($this->_csv_insert_table != "") && $this->_csv_preempty_table){

			if($this->_db_connection){

				$query="DELETE FROM ".$this->_csv_insert_table;
				if(!mysql_query(trim($query),$this->_db_connection)){

					$this->_message_action['error_pre_empty_table']="<p class='error'>Error when deleting entries from ".$this->_csv_insert_table.".</p>
                                                                     <p>Query: ".trim(nl2br(htmlentities($query)))."</p>
                                                                     <p>MySQL: ".mysql_error()."</p>";
					$this->_error_action=true;
				}
			}
			else{

				$this->_message_action['error_pre_query']="<p class='error'>Database connection failed due to ".mysql_error()." or contact your database provider.</p>";
				$this->_error_action=true;
			}
		}

	}

	private function pre_insert_table($dumpline,$curfilename){

		if(!$this->_error_action && ($this->_csv_insert_table != "") && (preg_match("/(\.csv)$/i",$curfilename))){

			if($this->_csv_add_slashes)
				$dumpline=addslashes($dumpline);

			$dumpline=explode($this->_csv_delimiter,$dumpline);

			if($this->_csv_add_quotes)
				$dumpline="'".implode("','",$dumpline)."'";
			else
				$dumpline=implode(",",$dumpline);

			$dumpline="INSERT INTO ".$this->_csv_insert_table." VALUES (".$dumpline."); ";
		}

		return $dumpline;

	}

	public function show_connection_charset(){

		$string_result="";

		if(!$this->_error_action && $this->_db_connection){

			$result=@mysql_query("SHOW VARIABLES LIKE 'character_set_connection'",$this->_db_connection);
			$row=mysql_fetch_assoc($result);
			if($row){

				$charset=$row['Value'];
				$string_result.="<p>Note: The current mySQL connection charset is <i>".$charset."</i>. Your dump file must be encoded in <i>".$charset."</i> in order to avoid problems with non-latin characters. You can change the connection charset using the \$_db_connection_charset variable</p>";
			}
		}

		return $string_result;

	}

	public function upload_file_sql($input_dumpfile_name){

		$upload_dir=$this->get_upload_dir();

		if(!$this->_error_action && is_uploaded_file($input_dumpfile_name["tmp_name"]) && ($input_dumpfile_name["error"] == 0)){

			$uploaded_filename=str_replace(" ","_",$input_dumpfile_name["name"]);
			$uploaded_filename=preg_replace("/[^_A-Za-z0-9-\.]/i",'',$uploaded_filename);

			$uploaded_filepath=str_replace("\\","/",$upload_dir."/".$uploaded_filename);

			if(file_exists($uploaded_filename))
				$this->_message_action['error_upload_file_sql']="<p class='error'>File '".$uploaded_filename."' already exist!Delete and upload again!</p>";
			else if(!preg_match("/(\.(sql|gz|csv))$/i",$uploaded_filename))
				$this->_message_action['error_upload_file_sql']="<p class='error'>You may only upload .sql .gz or .csv files.</p>";
			else if(!@move_uploaded_file($input_dumpfile_name["tmp_name"],$uploaded_filepath))
				$this->_message_action['error_upload_file_sql']="<p class='error'>Error moving uploaded file '".$input_dumpfile_name["tmp_name"]."' to the '".$uploaded_filepath."'</p>
                                                                  <p>Check the directory permissions for '".$upload_dir."' (must be 777)!</p>";
			else{

				$this->_message_action['error_upload_file_sql']="<p class='success'>Uploaded file saved as '".$uploaded_filename."'</p>";
				return true;
			}
		}
		else
			$this->_message_action['error_upload_file_sql']="<p class='error'>Error uploading file '".$input_dumpfile_name["name"]."'</p>";

		return false;

	}

	public function delete_file_sql($param_delete){

		if(!$this->_error_action && ($param_delete != basename($_SERVER["SCRIPT_FILENAME"]))){

			if(preg_match("/(\.(sql|gz|csv))$/i",$param_delete) && @unlink(basename($param_delete))){

				$this->_message_action['error_delete_file_sql']="<p class='success'>'".$param_delete."' was removed successfully</p>";
				return true;
			}
			else
				$this->_message_action['error_delete_file_sql']="<p class='error'>Can't remove '".$param_delete."'</p>";
		}

		return false;

	}

	private function open_file_sql($param_file_sql=false){

		$result=array(
			'curfilename'=>'',
			'file'=>false,
			'gzipmode'=>false,
			'filesize'=>0
		);

		if(!$this->_error_action){

			if($this->_file_name != "")
				$result['curfilename']=$this->_file_name;
			else if($param_file_sql !== false)
				$result['curfilename']=urldecode($param_file_sql);
			else
				$result['curfilename']="";

			if(preg_match("/\.gz$/i",$result['curfilename']))
				$result['gzipmode']=true;
			else
				$result['gzipmode']=false;

			if((!$result['gzipmode'] && !($result['file']=@fopen($result['curfilename'],"r"))) || ($result['gzipmode'] && !($result['file']=@gzopen($result['curfilename'],"r")))){

				$this->_message_action['error_open_file_sql']="<p class='error'>Can't open ".$result['curfilename']." for import</p>";
				$this->_message_action['error_open_file_sql'].="<p>Please,check that your dump file name contains only alphanumerical characters, and rename it accordingly,for example: ".$result['curfilename'].":".
						"<br>Or, specify \$_file_name with the full filename. ".
						"<br>Or, you have to upload the ".$result['curfilename']." to the server first.</p>";
				$this->_error_action=true;
			}
			else if((!$result['gzipmode'] && @fseek($result['file'],0,SEEK_END) == 0) || ($result['gzipmode'] && @gzseek($result['file'],0) == 0)){

				if(!$result['gzipmode'])
					$result['filesize']=ftell($result['file']);
				else
					$result['filesize']=gztell($result['file']);
			}
			else{

				$this->_message_action['error_open_file_sql']="<p class='error'>I can't seek into ".$result['curfilename']."</p>";
				$this->_error_action=true;
			}
		}

		return $result;

	}

	private function read_file_sql($file,$gzipmode){

		$dumpline="";
		if(!$this->_error_action){

			while(!feof($file) && substr($dumpline,-1) != "\n" && substr($dumpline,-1) != "\r"){

				if(!$gzipmode)
					$dumpline.=fgets($file,DATA_CHUNK_LENGTH);
				else
					$dumpline.=gzgets($file,DATA_CHUNK_LENGTH);
			}
		}
		return $dumpline;

	}

	private function skip_comments($dumpline){

		$skipline=false;
		reset($this->_comment);
		foreach($this->_comment as $comment_value){
			if((trim($dumpline) == "") || (strpos(trim($dumpline),$comment_value) === 0)){
				$skipline=true;
				break;
			}
		}

		return $skipline;

	}

	public function import_database($request_file_sql,$request_start,$request_foffset,$request_totalqueries,$request_delimiter=false){

		$arr_file=$this->open_file_sql($request_file_sql);

		if(!$this->_error_action && preg_match("/(\.(sql|gz|csv))$/i",$arr_file['curfilename']) && $this->_db_connection){

			if(!is_numeric($request_start) || !is_numeric($request_foffset)){

				$this->_message_action['error_import_database']="<p class='error'>UNEXPECTED: Non-numeric values for start and foffset</p>";
				$this->_error_action=true;
			}
			else{

				$request_start=floor($request_start);
				$request_foffset=floor($request_foffset);
			}

			if($request_delimiter === false)
				$this->_delimiter=$request_delimiter;

			if($request_start == 1)
				$this->pre_empty_table();

			if(!$this->_error_action && !$arr_file['gzipmode'] && ($request_foffset > $arr_file['filesize'])){

				$this->_message_action['error_import_database']="<p class='error'>UNEXPECTED: Can't set file pointer behind the end of file</p>";
				$this->_error_action=true;
			}

			if(!$this->_error_action && ((!$arr_file['gzipmode'] && fseek($arr_file['file'],$request_foffset) != 0) || ($arr_file['gzipmode'] && gzseek($arr_file['file'],$request_foffset) != 0))){

				$this->_message_action['error_import_database']="<p class='error'>UNEXPECTED: Can't set file pointer to offset: ".$request_foffset."</p>";
				$this->_error_action=true;
			}

			if(!$this->_error_action){

				$query="";
				$queries=0;
				$totalqueries=$request_totalqueries;
				$linenumber=$request_start;
				$querylines=0;
				$inparents=false;

				while(($linenumber < $request_start + $this->_linespersession) || ($query != "")){

					$dumpline=$this->read_file_sql($arr_file['file'],$arr_file['gzipmode']);
					if($dumpline === "")
						break;

					if($request_foffset == 0)
						$dumpline=preg_replace('|^\xEF\xBB\xBF|','',$dumpline);

					$dumpline=$this->pre_insert_table($dumpline,$arr_file['curfilename']);

					$dumpline=str_replace("\r\n","\n",$dumpline);
					$dumpline=str_replace("\r","\n",$dumpline);

					if(!$inparents && strpos($dumpline,"DELIMITER ") === 0)
						$this->_delimiter=str_replace("DELIMITER ","",trim($dumpline));

					if(!$inparents && $this->skip_comments($dumpline)){

						$linenumber++;
						continue;
					}

					$dumpline_deslashed=str_replace("\\\\","",$dumpline);

					$parents=substr_count($dumpline_deslashed,$this->_string_quotes) - substr_count($dumpline_deslashed,"\\".$this->_string_quotes);

					if($parents % 2 != 0)
						$inparents=!$inparents;

					$query.=$dumpline;

					if(!$inparents)
						$querylines++;

					if($querylines > MAX_QUERY_LINES){

						$this->_message_action['error_import_database']="<p class='error'>Stopped at the line ".$linenumber.". </p>";
						$this->_message_action['error_import_database'].="<p>At this place the current query includes more than ".MAX_QUERY_LINES." dump lines.That can happen if your dump file was 
                                                                             created by some tool which doesn't place a semicolon followed by a linebreak at the end of each query
                                                                             .Ask for our support services in order to handle install files containing extended inserts.</p>";
						$this->_error_action=true;
						break;
					}

					if(preg_match('/'.preg_quote($this->_delimiter).'$/',trim($dumpline)) && !$inparents){

						$query=substr(trim($query),0,-1 * strlen($this->_delimiter));

						if(!mysql_query($query,$this->_db_connection)){

							$this->_message_action['error_import_database']="<p class='error'>Error at the line ".$linenumber.": ".trim($dumpline)."</p>";
							$this->_message_action['error_import_database'].="<p>Query: ".trim(nl2br(htmlentities($query)))."</p>";
							$this->_message_action['error_import_database'].="<p>MySQL: ".mysql_error()."</p>";
							$this->_error_action=true;
							break;
						}
						$totalqueries++;
						$queries++;
						$query="";
						$querylines=0;
					}
					$linenumber++;
				}
			}

			// Get the current file position
			if(!$this->_error_action){

				if(!$arr_file['gzipmode'])
					$foffset=ftell($arr_file['file']);
				else
					$foffset=gztell($arr_file['file']);

				if(!$foffset){

					$this->_message_action['error_import_database']="<p class='error'>UNEXPECTED: Can't read the file pointer offset</p>";
					$this->_error_action=true;
				}
			}
		}
		else{

			$this->_message_action['error_pre_query']="<p class='error'>Database connection failed due to ".mysql_error()." or contact your database provider.</p>
                                                        <p class='error'>You may only import .sql .gz or .csv files.</p>";
			$this->_error_action=true;
		}

		if($arr_file['file'] && !$arr_file['gzipmode'])
			fclose($arr_file['file']);
		else if($arr_file['file'] && $arr_file['gzipmode'])
			gzclose($arr_file['file']);


		unset($arr_file['file']);
		$arr_file['linenumber']=isset($linenumber) ? $linenumber : 0;
		$arr_file['queries']=isset($queries) ? $queries : 0;
		$arr_file['totalqueries']=isset($totalqueries) ? $totalqueries : 0;
		$arr_file['foffset']=isset($foffset) ? $foffset : 0;

		return $arr_file;

	}

	public function show_import_success($filesize,$gzipmode,$request_start,$linenumber,$queries,$totalqueries,$foffset,$request_foffset){

		$string_result="";

		if(!$this->_error_action){

			$lines_this=$linenumber - $request_start;
			$lines_done=$linenumber - 1;
			$lines_togo=' ? ';
			$lines_tota=' ? ';

			$queries_this=$queries;
			$queries_done=$totalqueries;
			$queries_togo=' ? ';
			$queries_tota=' ? ';

			$bytes_this=$foffset - $request_foffset;
			$bytes_done=$foffset;
			$kbytes_this=round($bytes_this / 1024,2);
			$kbytes_done=round($bytes_done / 1024,2);
			$mbytes_this=round($kbytes_this / 1024,2);
			$mbytes_done=round($kbytes_done / 1024,2);

			if(!$gzipmode){

				$bytes_togo=$filesize - $foffset;
				$bytes_tota=$filesize;
				$kbytes_togo=round($bytes_togo / 1024,2);
				$kbytes_tota=round($bytes_tota / 1024,2);
				$mbytes_togo=round($kbytes_togo / 1024,2);
				$mbytes_tota=round($kbytes_tota / 1024,2);
				if($filesize == 0){

					$pct_this=0;
					$pct_done=0;
				}
				else{

					$pct_this=ceil($bytes_this / $filesize * 100);
					$pct_done=ceil($foffset / $filesize * 100);
				}
				$pct_togo=100 - $pct_done;
				$pct_tota=100;

				if($bytes_togo == 0){

					$lines_togo='0';
					$lines_tota=$linenumber - 1;
					$queries_togo='0';
					$queries_tota=$totalqueries;
				}
				$pct_bar="<div style='height:15px;width:".$pct_done."%;background-color:#000080;margin:0px;'></div>";
			}
			else{

				$bytes_togo=' ? ';
				$bytes_tota=' ? ';
				$kbytes_togo=' ? ';
				$kbytes_tota=' ? ';
				$mbytes_togo=' ? ';
				$mbytes_tota=' ? ';

				$pct_this=' ? ';
				$pct_done=' ? ';
				$pct_togo=' ? ';
				$pct_tota=100;
				$pct_bar=str_replace(' ','&nbsp;','<tt>[         Not available for gzipped files          ]</tt>');
			}

			$string_result.="
            <center>
                <table border='0' cellpadding='0' cellspacing='0'>
                <tr>
                    <th class='bg_title_import'></th>
                    <th class='bg_title_import'>Session</th>
                    <th class='bg_title_import'>Done</th>
                    <th class='bg_title_import'>To go</th>
                    <th class='bg_title_import'>Total</th>
                </tr>
                <tr>
                    <th class='bg_title_import'>Lines</th>
                    <td class='bg_content_import'>".$lines_this."</td>
                    <td class='bg_content_import'>".$lines_done."</td>
                    <td class='bg_content_import'>".$lines_togo."</td>
                    <td class='bg_content_import'>".$lines_tota."</td>
                </tr>
                <tr>
                    <th class='bg_title_import'>Queries</th>
                    <td class='bg_content_import'>".$queries_this."</td>
                    <td class='bg_content_import'>".$queries_done."</td>
                    <td class='bg_content_import'>".$queries_togo."</td>
                    <td class='bg_content_import'>".$queries_tota."</td>
                </tr>
                <tr>
                    <th class='bg_title_import'>Bytes</th>
                    <td class='bg_content_import'>".$bytes_this."</td>
                    <td class='bg_content_import'>".$bytes_done."</td>
                    <td class='bg_content_import'>".$bytes_togo."</td>
                    <td class='bg_content_import'>".$bytes_tota."</td>
                </tr>
                <tr>
                    <th class='bg_title_import'>KB</th>
                    <td class='bg_content_import'>".$kbytes_this."</td>
                    <td class='bg_content_import'>".$kbytes_done."</td>
                    <td class='bg_content_import'>".$kbytes_togo."</td>
                    <td class='bg_content_import'>".$kbytes_tota."</td>
                </tr>
                <tr>
                    <th class='bg_title_import'>MB</th>
                    <td class='bg_content_import'>".$mbytes_this."</td>
                    <td class='bg_content_import'>".$mbytes_done."</td>
                    <td class='bg_content_import'>".$mbytes_togo."</td>
                    <td class='bg_content_import'>".$mbytes_tota."</td>
                </tr>
                <tr>
                    <th class='bg_title_import'>%</th>
                    <td class='bg_content_import'>".$pct_this."</td>
                    <td class='bg_content_import'>".$pct_done."</td>
                    <td class='bg_content_import'>".$pct_togo."</td>
                    <td class='bg_content_import'>".$pct_tota."</td>
                </tr>
                <tr>
                    <th class='bg_title_import'>% bar</th>
                    <td class='bg_content_import' colspan='4'>".$pct_bar."</td>
                </tr>
                </table>
            </center>";

			// Finish message and restart the script
			if($linenumber < $request_start + $this->_linespersession){

				$string_result.="<p class='success_import'>Congratulations: End of file reached, assuming OK</p>";
				$string_result.="<p class='success_import'>IMPORTANT: REMOVE YOUR INSTALLED FILE and BIGDUMP SCRIPT FROM SERVER NOW!</p>";
				$this->_error_action=true;
			}
			else{

				$string_result.="<p class='centr'>Press <b><a href='".str_replace('/index.php','',$_SERVER["PHP_SELF"])."\">STOP</a></b> to abort the import <b>OR WAIT!</b></p>";
			}
		}
		else
			$string_result.="<p class='error'>Stopped on error...!</p>";

		return $string_result;

	}

	public function list_multi_file($param_file_sql,$param_start,$param_foffset,$param_totalqueries,$param_delimiter,$param_delete){

		$string_result="";

		if(!$this->_error_action && $this->_file_name == ""){

			$upload_dir=$this->get_upload_dir();
			if($dirhandle=opendir($upload_dir)){

				$files=array();
				while(false !== ($files[]=readdir($dirhandle)));
				closedir($dirhandle);
				$dirhead=false;

				if(sizeof($files) > 0){

					sort($files);
					foreach($files as $dirfile){
						if(($dirfile != ".") && ($dirfile != "..") && ($dirfile != basename($_SERVER["SCRIPT_FILENAME"])) && (preg_match("/\.(sql|gz|csv)$/i",$dirfile))){

							if(!$dirhead){

								$string_result.="<table cellspacing='0' cellpadding='0'>;
                                                 <tr>
                                                    <th>Filename</th>
                                                    <th>Size</th>
                                                    <th>Date&amp;Time</th>
                                                    <th>Type</th>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                 </tr>";
								$dirhead=true;
							}

							$string_result.= "<tr>
                                                    <td>$dirfile</td>
                                                    <td>".filesize($dirfile)."</td>
                                                    <td>".date("Y-m-d H:i:s",filemtime($dirfile))."</td>";

							if(preg_match("/\.sql$/i",$dirfile))
								$string_result.= "<td>SQL</td>";
							elseif(preg_match("/\.gz$/i",$dirfile))
								$string_result.= "<td>GZip</td>";
							elseif(preg_match("/\.csv$/i",$dirfile))
								$string_result.= "<td>CSV</td>";
							else
								$string_result.= "<td>Misc</td>";

							if((preg_match("/\.gz$/i",$dirfile) && function_exists("gzopen")) || preg_match("/\.sql$/i",$dirfile) || preg_match("/\.csv$/i",$dirfile))
								$string_result.= "<td><a href='".$_SERVER["PHP_SELF"]."?".$param_start."=1&".$param_file_sql."=".urlencode($dirfile)."&".$param_foffset."=0&".$param_totalqueries."=0&".$param_delimiter."=".urlencode($delimiter)."'>Start Import into '".$this->_db_name."' at '".$this->_db_server."'</a></td>
                                                    <td><a href='".$_SERVER["PHP_SELF"]."?".$param_delete."=".urlencode($dirfile)."'>Delete file</a></td></tr>";
							else
								$string_result.= "<td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>";
						}
					}
				}

				if($dirhead)
					$string_result.= "</table>";
				else
					$string_result.="<p>No uploaded SQL, GZ or CSV files found in the working directory</p>";
			}
			else{

				$string_result.="<p class='error'>Error listing directory '".$upload_dir."'</p>";
				$this->_error_action=true;
			}
		}

	}

	public function form_upload_file_sql(){

		$string_result="";

		$upload_max_filesize=$this->get_max_file_size();

		if(!$this->_error_action && $this->_file_name == ""){

			do{

				$tempfilename=time().".tmp";
			}
			while(file_exists($tempfilename));

			if(!($tempfile=@fopen($tempfilename,"w")))
				$string_result.="<p>Upload form disabled. Permissions for the working directory <b>must be set writable for the webserver</b> in order to upload files here. Alternatively you can upload your dump files via FTP.</p>";
			else{

				fclose($tempfile);
				unlink($tempfilename);

				$string_result.="<p>You can now upload your dump file up to ".$upload_max_filesize." bytes (".round($upload_max_filesize / 1024 / 1024)." Mbytes) directly from your browser to the server. Alternatively you can upload your dump files of any size via FTP.</p>";
				$string_result.="<form method='POST' action='' enctype='multipart/form-data'>
                                    <input type='hidden' name='MAX_FILE_SIZE' value='".$upload_max_filesize."'>
                                    <p>Dump file: <input type='file' name='dumpfile' accept='*/*' size='60'></p>
                                    <p><input type='submit' name='uploadbutton' value='Upload'></p>
                                 </form>";
			}
		}
		return $string_result;

	}

	public function show_message_error(){
		$string_result="";

		if(!empty($this->_message_action)){
			foreach($this->_message_action as $key=> $value){
				$string_result.=$value;
			}
		}
		return $string_result;

	}

}

?>