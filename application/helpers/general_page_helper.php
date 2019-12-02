<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(!function_exists('alert')){

	function alert($content_messeage){

		return '<script type="text/javascript"> alert("'.$content_messeage.'") </script>';

	}

}

if(!function_exists('custom_print')){

	function custom_print($arr_data){
		echo "<pre>";
		print_r($arr_data);
		echo "</pre>";
		exit();

	}

}

if(!function_exists('curPageURL')){

	function curPageURL(){

		$pageURL='http';
		if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on")
			$pageURL.="s";

		$pageURL.="://";

		if(preg_match("/\/$/",$_SERVER['REQUEST_URI']))
			$REQUEST_URI=$_SERVER["REQUEST_URI"];
		else
			$REQUEST_URI=$_SERVER["REQUEST_URI"]."/";

		if($_SERVER["SERVER_PORT"] != "80"){

			$pageURL.=$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$REQUEST_URI;
		}
		else{

			$pageURL.=$_SERVER["SERVER_NAME"].$REQUEST_URI;
		}
		return $pageURL;

	}

}

if(!function_exists('custom_redirect')){

	function custom_redirect($uri='',$method='location',$http_response_code=302,$time=0){

		if(!preg_match('#^https?://#i',$uri))
			$uri=site_url($uri);

		switch($method){
			case 'refresh':
				header("Refresh:$time;url=".$uri);
				break;
			default:
				header("Location: ".$uri,TRUE,$http_response_code);
				break;
		}

	}

}

if(!function_exists('url_exists')){

	function url_exists($url_request,$cookie=false){

		$ch=curl_init();

		curl_setopt($ch,CURLOPT_HEADER,true);
		curl_setopt($ch,CURLOPT_NOBODY,true);
		curl_setopt($ch,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
		@curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
		curl_setopt($ch,CURLOPT_URL,$url_request);

		if($cookie !== false){

			$str_cookie="";
			foreach($cookie as $key=> $value){

				$str_cookie.=$key."=".rawurlencode($value)."; ";
			}

			curl_setopt($ch,CURLOPT_COOKIE,$str_cookie);
		}

		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);

		$result_header=curl_exec($ch);

		if(strpos($result_header,"HTTP/1.1 404 Not Found") !== false)
			return false;

		return true;

	}

}

if(!function_exists('base_src_img')){

	function base_src_img($url_img,$url_no_img=false){

		$str_find="http://";
		$src_no_img=($url_no_img == false) ? base_url().ADMIN_DIR_TEMPLATE."images/icon_menu/no_image.png" : base_url().ADMIN_DIR_TEMPLATE."images/icon_menu/".$url_no_img;
		if(strpos($url_img,$str_find) !== false)
			return $url_img;
		else if($url_img != '' && file_exists(PUBPATH.DIR_PUBLIC_IMG.$url_img))
			return base_url().DIR_PUBLIC_IMG.$url_img;
		else if($url_img != '')
			return $src_no_img;

		return $src_no_img;

	}

}

if(!function_exists('base_src_video')){

	function base_src_video($url_flash,$url_no_flash=false){

		$str_find="http://";
		$src_no_flash=($url_no_flash == false) ? base_url().ADMIN_DIR_TEMPLATE."images/icon_menu/no_flash.png" : base_url().ADMIN_DIR_TEMPLATE."images/icon_menu/".$url_no_flash;
		if(strpos($url_flash,$str_find) !== false)
			return $url_flash;
		else if($url_flash != '' && file_exists(PUBPATH.DIR_PUBLIC_IMG.$url_flash))
			return base_url().DIR_PUBLIC_IMG.$url_flash;
		else if($url_flash != '')
			return $src_no_flash;

		return $src_no_flash;

	}

}

if(!function_exists('convert_vi_to_en')){

	function convert_vi_to_en($str){

		$str=trim($str);
		$str=preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/",'a',$str);
		$str=preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/",'e',$str);
		$str=preg_replace("/(ì|í|ị|ỉ|ĩ)/",'i',$str);
		$str=preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/",'o',$str);
		$str=preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/",'u',$str);
		$str=preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/",'y',$str);
		$str=preg_replace("/(đ)/",'d',$str);
		$str=preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/",'A',$str);
		$str=preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/",'E',$str);
		$str=preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/",'I',$str);
		$str=preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/",'O',$str);
		$str=preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/",'U',$str);
		$str=preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/",'Y',$str);
		$str=preg_replace("/(Đ)/",'D',$str);
		$str=preg_replace("/\s\s/",'',$str);
		$str=preg_replace("/\s/",'-',$str);
		$str=preg_replace("/--/",'',$str);
		$str=preg_replace("/[^a-zA-Z0-9_-]/",'',$str);

		return strtolower($str);

	}

}

if(!function_exists('cut_string_vi')){

	function cut_string_vi($value,$length){

		if($value != ''){

			if(is_array($value))
				list($string,$match_to)=$value;
			else{

				$string=$value;
				$match_to=$value{0};
			}

			$match_start=stristr($string,$match_to);
			$match_compute=strlen($string) - strlen($match_start);

			if(strlen($string) > $length){

				if($match_compute < ($length - strlen($match_to))){

					$pre_string=substr($string,0,$length);
					$pos_end=strrpos($pre_string," ");
					if($pos_end === false)
						$string=$pre_string."...";
					else
						$string=substr($pre_string,0,$pos_end)."...";
				}
				else if($match_compute > (strlen($string) - ($length - strlen($match_to)))){

					$pre_string=substr($string,(strlen($string) - ($length - strlen($match_to))));
					$pos_start=strpos($pre_string," ");
					$string="...".substr($pre_string,$pos_start);
					if($pos_start === false)
						$string="...".$pre_string;
					else
						$string="...".substr($pre_string,$pos_start);
				}
				else{

					$pre_string=substr($string,($match_compute - round(($length / 3))),$length);
					$pos_start=strpos($pre_string," ");
					$pos_end=strrpos($pre_string," ");
					$string="...".substr($pre_string,$pos_start,$pos_end)."...";
					if($pos_start === false && $pos_end === false)
						$string="...".$pre_string."...";
					else
						$string="...".substr($pre_string,$pos_start,$pos_end)."...";
				}

				$match_start=stristr($string,$match_to);
				$match_compute=strlen($string) - strlen($match_start);
			}

			return $string;
		}
		else
			return $string='';

	}

}

if(!function_exists('custom_htmlspecialchars')){

	function custom_htmlspecialchars($str,$quote_style=ENT_QUOTES){

		return htmlspecialchars($str,$quote_style);

	}

}

if(!function_exists('check_type_file')){

	function check_type_file($file_name){

		if(strrpos($file_name,".",-0) === false)
			$file_extension="";
		else
			$file_extension=strtolower(substr($file_name,strrpos($file_name,".",-0) + 1));

		switch($file_extension){

			case "bmp": case "gif": case "jpeg": case "jpg": case "png":
				return 1;
				break;

			case "swf":
				return 2;
				break;

			case "mp4": case "flv": case "mp3":
				return 3;
				break;

			default:
				return 0;
				break;
		}
		return 0;

	}

}

if(!function_exists('show_status_support')){

	function show_status_support($cate_id,$arr_data,$style_support){

		$result='';
		switch($cate_id){
			//Liên Hệ
			case 1: case 2:
				$result="<a class='support_contact' title='".custom_htmlspecialchars(element('support_name',$arr_data,''))."' href='mailto:".element('support_nick',$arr_data,'')."'>".element('support_nick',$arr_data,'')."</a>";
				break;

			//Yahoo chat
			case 3: case 4:
				$result="<a class='support_yahoo' title='".custom_htmlspecialchars(element('support_name',$arr_data,''))."' href='ymsgr:sendIM?".element('support_nick',$arr_data,'')."'><img alt='YM:".element('support_nick',$arr_data,'')."' src='http://opi.yahoo.com/online?u=".element('support_nick',$arr_data,'')."&amp;m=g&amp;t=".$style_support."'></a>";
				break;

			//Skype chat
			case 5 :case 6:
				$result="<a class='support_skype' title='".custom_htmlspecialchars(element('support_name',$arr_data,''))."' href='skype:".element('support_nick',$arr_data,'')."?call'><img alt='Skype:".element('support_nick',$arr_data,'')."' src='".base_url().DIR_PUBLIC."images/skype/icon_skype_05.png'/></a>";
				break;

			//Điện thoại
			case 7 :case 8:
				$result="<a class='support_name' title='".custom_htmlspecialchars(element('support_name',$arr_data,''))."'>".element('support_nick',$arr_data,'')."</a>";
				break;

			//Dat Hang
			case 9 :case 10:
				$result="<a class='support_contact' title='".custom_htmlspecialchars(element('support_name',$arr_data,''))."' href='mailto:".element('support_nick',$arr_data,'')."'>".element('support_nick',$arr_data,'')."</a>";
				break;

			default:
				$result="<a class='support_contact' title='".custom_htmlspecialchars(element('support_name',$arr_data,''))."' href='mailto:".element('support_nick',$arr_data,'')."'>".element('support_nick',$arr_data,'')."</a>";
		}
		return $result;

	}

}

?>
