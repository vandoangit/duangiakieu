<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(!function_exists('get_directory_tree')){

	function get_directory_tree($dir_path="",$show_folder=true,$limit_directory=null){

		$dir_path=str_replace("/",DIRECTORY_SEPARATOR,$dir_path);
		$dir_path=preg_replace("/(\\".DIRECTORY_SEPARATOR.")$/i","",$dir_path);
		$dir_path.=DIRECTORY_SEPARATOR;

		if($limit_directory === null)
			$limit_directory=PUBPATH.DIR_PUBLIC_IMG;
		$limit_directory=str_replace("/",DIRECTORY_SEPARATOR,$limit_directory);
		$limit_directory=preg_replace("/(\\".DIRECTORY_SEPARATOR.")$/i","",$limit_directory);

		if(strpos($dir_path,$limit_directory) === false || $dir_path == "")
			return array();

		$dir_paths=glob($dir_path."*",GLOB_MARK | GLOB_ONLYDIR | GLOB_NOSORT);
		$dir_files=glob($dir_path."*");

		if(is_array($dir_paths) && !empty($dir_paths)){

			foreach($dir_paths as $key=> $path){

				$directory=explode(DIRECTORY_SEPARATOR,$path);
				unset($directory[count($directory) - 1]);
				$directories[end($directory)]=get_directory_tree($path,$show_folder);

				if(is_array($dir_files) && !empty($dir_files)){

					foreach($dir_files as $file){

						$file_temp=explode(DIRECTORY_SEPARATOR,$file);
						$file_name=end($file_temp);

						if($show_folder === false){

							if(strpos($file_name,".") !== false){

								$ctime=filectime($file)."-".$file_name;
								$directories[$ctime]=$file_name;
							}
						}
						else{

							$ctime=filectime($file)."-".$file_name;
							$directories[$ctime]=$file_name;
						}
					}
				}
			}
		}

		if(isset($directories)){

			krsort($directories);
			return $directories;
		}
		else{

			$files=array();
			if(is_array($dir_files) && !empty($dir_files)){

				foreach($dir_files as $key=> $file){

					$file_temp=explode(DIRECTORY_SEPARATOR,$file);
					$file_name=end($file_temp);
					$ctime=filectime($file)."-".$file_name;
					$files[$ctime]=$file_name;

					//$files[]=substr($file,(strrpos($file,"\\") + 1));
				}
			}

			krsort($files);
			return $files;
		}

	}

}


////////////////////////////////////////////////////////////////////////////////

if(!function_exists('show_one_directory')){

	function show_one_directory($arr_directory=array(),$url_directory="",$tag_body="<ul>",$tag_sub="<li>",$url_directory_root="",$limit=0){

		$url_directory=str_replace("\\","/",$url_directory);
		$url_directory=preg_replace("/(\/)$/i","",$url_directory);
		$url_directory.="/";

		$url_directory_root=str_replace("\\","/",$url_directory_root);
		$url_directory_root=preg_replace("/(\/)$/i","",$url_directory_root);
		$url_directory_root.="/";

		$html="";
		if(is_array($arr_directory) && !empty($arr_directory)){

			$html.=$tag_body;
			$html.=substr(trim($tag_sub),0,-1)." class='directory_indent'>&nbsp;</".substr(trim($tag_sub),1);

			if(str_replace($url_directory_root,"",$url_directory) != "" && str_replace($url_directory_root,"",$url_directory) != "/"){

				$html.=substr(trim($tag_sub),0,-1)." class='directory_close'>";
				$html.="<span class='directory_folder'>Back...</span>";
				$html.="</".substr(trim($tag_sub),1);
			}

			$index=0;
			foreach($arr_directory as $key_directory=> $each_directory){

				if(is_array($each_directory)){

					$html.=substr(trim($tag_sub),0,-1)." class='directory_open' directory_name='".$key_directory."'>";
					$html.="<span class='directory_folder'>".$key_directory."</span>";
					$html.="</".substr(trim($tag_sub),1);
				}
				else{

					$index++;

					$html.=$tag_sub;
					$html.="<span class='directory_file'><img src='".$url_directory.$each_directory."' alt='".$url_directory.$each_directory."'/></span>";
					$html.="</".substr(trim($tag_sub),1);
				}

				if($limit != 0 && $limit <= $index)
					break;
			}

			$html.= "</".substr(trim($tag_body),1);
		}
		else if(str_replace($url_directory_root,"",$url_directory) != "" && str_replace($url_directory_root,"",$url_directory) != "/"){

			$html.=$tag_body;
			$html.=substr(trim($tag_sub),0,-1)." class='directory_indent'>&nbsp;</".substr(trim($tag_sub),1);
			$html.=substr(trim($tag_sub),0,-1)." class='directory_close'>";
			$html.="<span class='directory_folder'>Back...</span>";
			$html.="</".substr(trim($tag_sub),1);
			$html.= "</".substr(trim($tag_body),1);
		}
		else{

			$html.=$tag_body;
			$html.=substr(trim($tag_sub),0,-1)." class='directory_indent'>&nbsp;</".substr(trim($tag_sub),1);
			$html.= "</".substr(trim($tag_body),1);
		}

		return $html;

	}

}

if(!function_exists('show_directory_tree')){

	function show_directory_tree($arr_directory,$url_directory,$tag_body,$tag_sub){

		if(is_array($arr_directory) && !empty($arr_directory)){

			$url_directory=str_replace("\\","/",$url_directory);
			$url_directory=preg_replace("/(\/)$/i","",$url_directory);
			$url_directory.="/";

			$html=$tag_body;

			foreach($arr_directory as $key_directory=> $each_directory){

				if(is_array($each_directory)){

					$html.=substr(trim($tag_sub),0,-1)." class='directory_tree_toggle'>";
					$html.="<span class='directory_tree_folder'>".$key_directory."</span>";
					$html.=show_directory_tree($each_directory,$url_directory.$key_directory."/",$tag_body,$tag_sub);
					$html.="</".substr(trim($tag_sub),1);
				}
				else{

					$html.=$tag_sub;
					$html.="<span class='directory_tree_file'><img src='".$url_directory.$each_directory."' alt='".$url_directory.$each_directory."'/></span>";
					$html.="</".substr(trim($tag_sub),1);
				}
			}

			$html.= "</".substr(trim($tag_body),1);

			return $html;
		}

		return "";

	}

}

?>