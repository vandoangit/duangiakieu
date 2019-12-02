<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright:Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(!function_exists('create_captcha')){

	function create_captcha($data='',$img_path='',$img_url='',$font_path=''){

		$defaults=array(
			'img_path'=>'',
			'img_url'=>'',
			'img_width'=>'150',
			'img_height'=>'30',
			'border_color'=>'#996666',
			'word'=>'',
			'font_path'=>'',
			'font_size'=>'16',
			'char_set'=>'0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',
			'char_length'=>8,
			'char_color'=>'#880000,#008800,#000088,#888800,#880088,#008888,#000000',
			//'line_color'=>'#ffb6b6',
			'line_color'=>'#ffb6b6,#b6ffb6,#b6b6ff,#ffffb6,#ffb6ff,#b6ffff,#b6b6b6',
			'expiration'=>7200
		);

		foreach($defaults as $key=> $val){
			if(!is_array($data)){

				if(!isset($$key) || $$key == '')
					$$key=$val;
			}
			else{

				$$key=(!isset($data[$key])) ? $val : $data[$key];
			}
		}

		$arr_char_color=preg_split("/,\s*?/",$char_color);
		if(is_array($arr_char_color) && !empty($arr_char_color)){

			foreach($arr_char_color as $key=> $value){
				if(gd_color($value) === false)
					return false;
			}
		}
		else
			return false;

		$arr_line_color=preg_split("/,\s*?/",$line_color);
		if(is_array($arr_line_color) && !empty($arr_line_color)){

			foreach($arr_line_color as $key=> $value){
				if(gd_color($value) === false)
					return false;
			}
		}
		else
			return false;


		if($border_color == '' || (gd_color($border_color) === false))
			return FALSE;

		if($img_path == '' || $img_url == '')
			return FALSE;

		if(!@is_dir($img_path))
			return FALSE;

		if(!is_writable($img_path))
			return FALSE;

		if(!extension_loaded('gd'))
			return FALSE;


		// -----------------------------------
		// Remove old images
		// -----------------------------------

		list($usec,$sec)=explode(" ",microtime());
		$now=((float) $usec + (float) $sec);

		$current_dir=@opendir($img_path);
		while($filename=@readdir($current_dir)){
			if($filename != "." && $filename != ".." && $filename != "index.html" && $filename != "fonts"){

				$name=str_replace(".jpg","",$filename);

				if(($name + $expiration) < $now){

					if(file_exists($img_path.$filename))
						@unlink($img_path.$filename);
				}
			}
		}
		@closedir($current_dir);

		// -----------------------------------
		// Do we have a "word" yet?
		// -----------------------------------

		if($word == ''){

			$str='';
			for($i=0; $i < $char_length; $i++){
				$str.=substr($char_set,mt_rand(0,strlen($char_set) - 1),1);
			}

			$word=$str;
		}

		// -----------------------------------
		// Determine angle and position
		// -----------------------------------

		$length=strlen($word);
		$angle=($length >= 6) ? rand(-($length - 6),($length - 6)) : 0;
		$x_axis=rand(6,(360 / $length) - 16);
		$y_axis=($angle >= 0 ) ? rand($img_height,$img_width) : rand(6,$img_height);

		// -----------------------------------
		// Create image
		// -----------------------------------
		// PHP.net recommends imagecreatetruecolor(),but it isn't always available
		if(function_exists('imagecreatetruecolor')){

			$im=imagecreatetruecolor($img_width,$img_height);
		}
		else{
			$im=imagecreate($img_width,$img_height);
		}

		// -----------------------------------
		//  Assign colors
		// -----------------------------------

		$bg_color=imagecolorallocate($im,255,255,255);
		$shadow_color=imagecolorallocate($im,255,240,240);

		// -----------------------------------
		//  Create the rectangle
		// -----------------------------------

		ImageFilledRectangle($im,0,0,$img_width,$img_height,$bg_color);

		// -----------------------------------
		//  Create the spiral pattern
		// -----------------------------------

		$theta=1;
		$thetac=7;
		$radius=16;
		$circles=20;
		$points=32;

		for($i=0; $i < ($circles * $points) - 1; $i++){
			$grid_color=gd_color($arr_line_color[rand(0,count($arr_line_color) - 1)]);
			$theta=$theta + $thetac;
			$rad=$radius * ($i / $points );
			$x=($rad * cos($theta)) + $x_axis;
			$y=($rad * sin($theta)) + $y_axis;
			$theta=$theta + $thetac;
			$rad1=$radius * (($i + 1) / $points);
			$x1=($rad1 * cos($theta)) + $x_axis;
			$y1=($rad1 * sin($theta)) + $y_axis;
			imageline($im,$x,$y,$x1,$y1,$grid_color);
			$theta=$theta - $thetac;
		}

		// -----------------------------------
		//  Write the text
		// -----------------------------------

		$use_font=($font_path != '' && @file_exists($font_path) && function_exists('imagettftext')) ? TRUE : FALSE;

		$x=rand(($font_size + 2),$img_width - (($font_size + 2) * ($length + 1)));
		$y=0;

		for($i=0; $i < strlen($word); $i++){

			$text_color=gd_color($arr_char_color[rand(0,count($arr_char_color) - 1)]);

			if($use_font == FALSE){

				//y theo top
				$y=rand(3,$img_height / 2);
				//$y=rand($img_height / 2,$img_height - 3);
				imagestring($im,$font_size,$x,$y,substr($word,$i,1),$text_color);
				$x +=$font_size + 2;
			}
			else{

				//y theo bottom
				$y=rand($img_height / 2,$img_height - 3);
				imagettftext($im,$font_size,$angle,$x,$y,$text_color,$font_path,substr($word,$i,1));
				$x +=$font_size + 2;
			}
		}


		// -----------------------------------
		//  Create the border
		// -----------------------------------

		imagerectangle($im,0,0,$img_width - 1,$img_height - 1,gd_color($border_color));

		// -----------------------------------
		//  Generate the image
		// -----------------------------------

		$img_name=$now.'.jpg';

		ImageJPEG($im,$img_path.$img_name);

		$img="<img src=\"$img_url$img_name\" width=\"$img_width\" height=\"$img_height\" style=\"border:0px;vertical-align:middle;\" alt=\" \" />";

		ImageDestroy($im);

		return array('word'=>$word,'time'=>$now,'image'=>$img);

	}

}

if(!function_exists('gd_color')){

	function gd_color($html_color){

		return preg_match('/^#?([\dA-F]{6})$/i',$html_color,$rgb) ? hexdec($rgb[1]) : false;

	}

}

?>