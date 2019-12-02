<?php

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

/*
  |-----------------------------------------------------------------------------
  | File and Directory Modes
  |-----------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
define('FILE_READ_MODE',0644);
define('FILE_WRITE_MODE',0666);
define('DIR_READ_MODE',0755);
define('DIR_WRITE_MODE',0777);
/*
  |-----------------------------------------------------------------------------
  | File Stream Modes
  |-----------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */

define('FOPEN_READ','rb');
define('FOPEN_READ_WRITE','r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE','wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE','w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE','ab');
define('FOPEN_READ_WRITE_CREATE','a+b');
define('FOPEN_WRITE_CREATE_STRICT','xb');
define('FOPEN_READ_WRITE_CREATE_STRICT','x+b');

define('PUBPATH',str_replace(SELF,'',FCPATH));
define('URL_SUFFIX','.html');
define('CURRENCY_UNIT',' VNĐ');


define('ADMIN_DIR_ROOT','admincp'); //Dinh nghia cac duong dan thuc
define("ADMIN_DIR_VIRTUAL",'administrator'); //Dinh nghia cac duong dan ao
define('ADMIN_DIR_TEMPLATE','public/admin/'); //Dinh nghia thu muc chua tempalte admin

define('DEFAULT_DIR_ROOT','default'); //Dinh nghia cac duong dan thuc
define('DEFAULT_DIR_TEMPLATE','public/default/'); //Dinh nghia thu muc chua tempalte admin

define('DIR_PUBLIC','public/'); //Dinh nghia thu muc chua tempalte admin
define('DIR_PUBLIC_IMG','upload/'); //Dinh nghia thu muc chua img mac dinh

define('URL_LOGIN_ADMIN',ADMIN_DIR_VIRTUAL.'/login');
define('URL_EXIT_ADMIN',ADMIN_DIR_VIRTUAL.'/exit');
define('URL_LANG_ADMIN',ADMIN_DIR_VIRTUAL.'/lang');
define('URL_HOME_ADMIN',ADMIN_DIR_VIRTUAL.'/site/panel');
/* End of file constants.php */
/* Location: ./application/config/constants.php */