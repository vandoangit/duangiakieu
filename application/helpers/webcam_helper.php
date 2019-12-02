<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(!function_exists('webcam_load_js_main')){

	function webcam_load_js_main($webcam_language='vi'){

		$webcam_script="<link href='".base_url()."webcam/style/webcam_style.css' rel='stylesheet' type='text/css' />";

		if($webcam_language == 'vi')
			$webcam_script.="<script type='text/javascript' src='".base_url()."webcam/webcam_language_vi.js'></script>";
		else if($webcam_language == 'en')
			$webcam_script.="<script type='text/javascript' src='".base_url()."webcam/webcam_language_en.js'></script>";
		else
			$webcam_script.="<script type='text/javascript' src='".base_url()."webcam/webcam_language_vi.js'></script>";

		$webcam_script.="<script type='text/javascript' src='".base_url()."webcam/swfobject.js'></script>";
		$webcam_script.="<script type='text/javascript' src='".base_url()."webcam/scriptcam.min.js'></script>";

		return $webcam_script;

	}

}

if(!function_exists('webcam_load_js_setting')){

	function webcam_load_js_setting($file_name='webcam_setting_default'){

		$webcam_script="<script type='text/javascript' src='".base_url()."webcam/".$file_name.".js'></script>";

		$webcam_script.="<script type='text/javascript' src='".base_url()."webcam/webcam_setting_main.js'></script>";

		return $webcam_script;

	}

}