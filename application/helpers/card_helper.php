<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(!function_exists('card_json_encode')){

	function card_json_encode($array_data){

		echo json_encode($array_data);
		exit();

	}

}

if(!function_exists('card_load_object')){

	function card_load_object(){

		$card_object="<!--[if gte IE 9]>";
		$card_object.="<object id='OurActiveX' classid='clsid:958DB7DD-EE44-4ea3-939A-1FB6A950794B' codebase='cab.cab' height='0' width='0'></object>";
		$card_object.="<![endif]-->";

		$card_object="<![if!IE]>";
		$card_object.="<object id='OurActiveX' type='application/x-monetcard' height='0' width='0'></object>";
		$card_object.="<![endif]>";

		return $card_object;

	}

}

if(!function_exists('card_load_js_main')){

	function card_load_js_main($card_language='vi'){

		$card_script="<link href='".base_url()."card/card_style.css'rel='stylesheet' type='text/css' />";

		if($card_language == 'vi')
			$card_script.="<script type='text/javascript' src='".base_url()."card/card_language_vi.js'></script>";
		else if($card_language == 'en')
			$card_script.="<script type='text/javascript' src='".base_url()."card/card_language_en.js'></script>";
		else
			$card_script.="<script type='text/javascript' src='".base_url()."card/card_language_vi.js'></script>";

		$card_script.="<script type='text/javascript' src='".base_url()."card/card_main.js'></script>";

		return $card_script;

	}

}

if(!function_exists('card_load_js_setting')){

	function card_load_js_setting($file_name='card_setting_default'){

		$card_script="<script type='text/javascript' src='".base_url()."card/".$file_name.".js'></script>";

		return $card_script;

	}

}