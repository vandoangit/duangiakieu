<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

$config['facebook']['api_id']='1492007357744212';
$config['facebook']['app_secret']='153b2a673aaaf75fd9a8e131ebef0196';
$config['facebook']['redirect_url']='http://www.facebook.com.ct/facebook/login';
$config['facebook']['permissions']=array(
	'email',
	'user_location',
	'user_birthday'
);
