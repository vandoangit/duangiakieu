<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class exsec_string{

	var $lower='a|b|c|d|e|f|g|h|i|j|k|l|m|n|o|p|q|r|s|t|u|v|w|x|y|z|á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|đ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|í|ì|ỉ|ĩ|ị|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ý|ỳ|ỷ|ỹ|ỵ';
	var $upper='A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|U|V|W|X|Y|Z|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Đ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Í|Ì|Ỉ|Ĩ|Ị|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Ý|Ỳ|Ỷ|Ỹ|Ỵ';
	var $arrayUpper;
	var $arrayLower;

	public function __construct(){

		$this->arrayUpper=explode('|',preg_replace("/\n|\t|\r/","",$this->upper));
		$this->arrayLower=explode('|',preg_replace("/\n|\t|\r/","",$this->lower));

	}

	public function str_lower($str){

		return str_replace($this->arrayUpper,$this->arrayLower,$str);

	}

	public function str_upper($str){

		return str_replace($this->arrayLower,$this->arrayUpper,$str);

	}

	public function str_ucfirst($str){

		$str_value=trim($str);
		$str_first=substr($str_value,0,1);
		$str_end=substr($str_value,1);
		return str_replace($this->arrayLower,$this->arrayUpper,$str_first).str_replace($this->arrayUpper,$this->arrayLower,$str_end);

	}

	public function str_ucwords($str){

		$str_value=trim($str);
		$str_value=explode(' ',$str_value);
		$str_result="";
		foreach($str_value as $key=> $value){
			$str_result.=$this->str_ucfirst($value)." ";
		}
		return $str_result;

	}

}

?>