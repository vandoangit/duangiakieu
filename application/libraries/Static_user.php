<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

date_default_timezone_set('Asia/Saigon');

class Static_user{

	private $_object_static;
	private $_virtual_static;
	private $_dir_path="";
	private $_skin_sum="black";
	private $_time_out=3;
	private $_current_ip;
	private $_current_time;
	private $_user_online;
	private $_user_today;
	private $_user_week;
	private $_user_month;
	private $_user_year;
	private $_user_sum;
	private $_user_yesterday;

	public function __construct(){

		$this->_object_static=& get_instance();
		$this->_object_static->load->helper(array('url','array'));
		$this->_object_static->load->Model('m_general_config');

		$this->_virtual_static=$this->_object_static->m_general_config->list_static_config();

		// PUBPATH duoc dinh nghia trong file index.php
		$this->_dir_path=PUBPATH;

		$this->_current_time=time();
		$this->_current_ip=$_SERVER['REMOTE_ADDR'];
		$this->online();
		$this->static_user();

	}

	public function get_online(){

		return element("static_online_virtual",$this->_virtual_static,0) + $this->_user_online;

	}

	public function get_today(){

		return element("static_online_virtual",$this->_virtual_static,0) + $this->_user_today;

	}

	public function get_yesterday(){

		return element("static_online_virtual",$this->_virtual_static,0) + $this->_user_yesterday;

	}

	public function get_week(){

		return element("static_online_virtual",$this->_virtual_static,0) + $this->_user_week;

	}

	public function get_month(){

		return element("static_online_virtual",$this->_virtual_static,0) + $this->_user_month;

	}

	public function get_year(){

		return element("static_count_virtual",$this->_virtual_static,0) + $this->_user_year;

	}

	public function get_sum(){

		return element("static_count_virtual",$this->_virtual_static,0) + $this->_user_sum;

	}

	public function get_sum_img(){

		$string_img_numeric="";

		$arr_numeric=str_split(element("static_count_virtual",$this->_virtual_static,0) + $this->_user_sum);

		if(is_array($arr_numeric)){

			$count_length_numeric=count($arr_numeric);

			if($count_length_numeric < 7){

				for($i=0; $i < 7 - $count_length_numeric; $i++){
					$string_img_numeric.="<img src='".base_url().ADMIN_DIR_TEMPLATE."images/numeric/".$this->_skin_sum."_0.gif' alt='0' />";
				}
			}

			for($i=0; $i < $count_length_numeric; $i++){
				$string_img_numeric.="<img src='".base_url().ADMIN_DIR_TEMPLATE."images/numeric/".$this->_skin_sum."_".element($i,$arr_numeric,0).".gif' alt='".element($i,$arr_numeric,0)."' />";
			}
		}
		return $string_img_numeric;

	}

	private function cut_line($file_name,$line_cut=-1){

		$result_cut=false;

		$data_file=file($file_name);
		$size_file=count($data_file);

		if($line_cut == -1)
			$line_cut_file=$size_file - 1;
		else
			$line_cut_file=$line_cut - 1;

		$line_write="";
		foreach($data_file as $line_num=> $line){
			$trim_line=trim($line);

			if($line_cut_file != $line_num)
				$line_write=$line_write.$trim_line."\r\n";
			else
				$result_cut=$line_num;
		}
		$f_write=fopen($file_name,'w');
		if($line_write != "")
			fwrite($f_write,$line_write);
		fclose($f_write);

		return $result_cut;

	}

	public function online(){

		$count=1;
		$max_online=1;

		if(!file_exists($this->_dir_path."online.log")){

			$f_create=fopen($this->_dir_path."online.log",'w');
			fclose($f_create);
		}

		$data_file=file($this->_dir_path."online.log");
		$line_write="";

		foreach($data_file as $line_num=> $line){
			$trim_line=trim($line);

			if($line_num == 0)
				$max_online=$trim_line;

			else if($trim_line != ''){

				$position_ip=strpos($trim_line,'minh');
				$ip_write=substr($trim_line,0,$position_ip);

				$position_time=strpos($trim_line,'tri');
				$time_write=substr($trim_line,$position_ip + 4,$position_time - ($position_ip + 4));

				$diff=$this->_current_time - $time_write;

				if(($diff < $this->_time_out) && ($this->_current_ip != $ip_write)){

					$count=$count + 1;
					$line_write=$line_write.$trim_line."\r\n";
				}
			}
		}

		if($count > $max_online)
			$max_online=$count;

		$f_write=fopen($this->_dir_path."online.log",'w');

		fwrite($f_write,$max_online."\r\n");

		if($line_write != "")
			fwrite($f_write,$line_write);

		$line_my=$this->_current_ip."minh".$this->_current_time."tri"."\r\n";
		fwrite($f_write,$line_my);

		fclose($f_write);
		$this->_user_online=$count;
		return;

	}

	private function check_static(){

		$result_check=true;

		if(!file_exists($this->_dir_path."ip.log")){

			$f_create=fopen($this->_dir_path."ip.log",'w');
			fclose($f_create);
		}

		$data_file=file($this->_dir_path."ip.log");

		foreach($data_file as $line_num=> $line){
			$trim_line=trim($line);

			if($trim_line != ''){

				$arr_line=explode('hominhtri',$trim_line);

				if(count($arr_line) > 1){

					$ip_write=$arr_line[0];
					$time_write=$arr_line[1];
					$diff_day=(int) date("z",(int) $time_write) - (int) date("z",$this->_current_time);

					if(($this->_current_ip == $ip_write) && ($diff_day == 0)){

						$result_check=false;
						break;
					}
				}
			}
		}
		return $result_check;

	}

	function static_user(){

		if(!file_exists($this->_dir_path."count.log")){

			$f_create=fopen($this->_dir_path."count.log",'w');
			$line_write=$this->_current_time."hominhtri0hominhtri0hominhtri0hominhtri0hominhtri0hominhtri0";
			fwrite($f_create,$line_write);
			fclose($f_create);
		}

		$data_file_count=file($this->_dir_path.'count.log');
		$arr_count=explode("hominhtri",$data_file_count[0]);

		if($this->check_static()){

			$data_file=file($this->_dir_path.'ip.log');

			$i_line_cut=0;
			foreach($data_file as $line_num=> $line){
				$trim_line=trim($line);

				if($trim_line != ''){

					$arr_line=explode('hominhtri',$trim_line);

					if((count($arr_line) > 1) && (trim($this->_current_ip) == trim($arr_line[0]))){

						if($this->cut_line($this->_dir_path.'ip.log',$line_num - $i_line_cut + 1) !== false)
							$i_line_cut++;
					}
				}
			}

			$f_write=fopen($this->_dir_path.'ip.log','a+');
			$line_write=$this->_current_ip."hominhtri".$this->_current_time."\r\n";
			fwrite($f_write,$line_write);
			fclose($f_write);

			$diff_day=(int) date("z",(int) $arr_count[0]) - (int) date("z",$this->_current_time);
			$diff_week=(int) date("W",(int) $arr_count[0]) - (int) date("W",$this->_current_time);
			$diff_month=(int) date("n",(int) $arr_count[0]) - (int) date("n",$this->_current_time);
			$diff_year=(int) date("y",(int) $arr_count[0]) - (int) date("y",$this->_current_time);

			if($diff_day != 0){

				$arr_count[6]=$arr_count[1];
			}

			if($diff_day == 0){

				$arr_count[1] ++;
				$arr_count[2] ++;
				$arr_count[3] ++;
				$arr_count[4] ++;
				$arr_count[5] ++;
			}
			elseif($diff_week == 0){

				$arr_count[1]=1;
				$arr_count[2] ++;
				$arr_count[3] ++;
				$arr_count[4] ++;
				$arr_count[5] ++;
			}
			elseif($diff_month == 0){

				$arr_count[1]=1;
				$arr_count[2]=1;
				$arr_count[3] ++;
				$arr_count[4] ++;
				$arr_count[5] ++;
			}
			elseif($diff_year == 0){

				$arr_count[1]=1;
				$arr_count[2]=1;
				$arr_count[3]=1;
				$arr_count[4] ++;
				$arr_count[5] ++;
			}
			else{

				$arr_count[1]=1;
				$arr_count[2]=1;
				$arr_count[3]=1;
				$arr_count[4]=1;
				$arr_count[5] ++;
			}

			$line_write=$this->_current_time."hominhtri".$arr_count[1]."hominhtri".$arr_count[2]."hominhtri".$arr_count[3]."hominhtri".$arr_count[4]."hominhtri".$arr_count[5]."hominhtri".$arr_count[6];
			$f_write=fopen($this->_dir_path."count.log",'w');
			fwrite($f_write,$line_write);
			fclose($f_write);
		}

		$this->_user_today=$arr_count[1];
		$this->_user_week=$arr_count[2];
		$this->_user_month=$arr_count[3];
		$this->_user_year=$arr_count[4];
		$this->_user_sum=$arr_count[5];
		$this->_user_yesterday=$arr_count[6];
		return;

	}

}

?>