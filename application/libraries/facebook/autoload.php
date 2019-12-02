<?php
/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 23-10-2014
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

if(version_compare(PHP_VERSION,'5.4.0','<')){

    throw new Exception('The Facebook SDK v4 requires PHP version 5.4 or higher.');
}

spl_autoload_register(function($class){

    // project-specific namespace prefix
    $prefix='Facebook\\';

    // base directory for the namespace prefix
    $base_dir=defined('FACEBOOK_SDK_V4_SRC_DIR') ? FACEBOOK_SDK_V4_SRC_DIR : __DIR__.DIRECTORY_SEPARATOR;

    // does the class use the namespace prefix?
    $len=strlen($prefix);
    if(strncmp($prefix,$class,$len) !== 0){

        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class=substr($class,$len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file=str_replace('\\',DIRECTORY_SEPARATOR,$base_dir.$relative_class).'.php';
    $file=str_replace('/',DIRECTORY_SEPARATOR,$file);

    // if the file exists, require it
    if(file_exists($file)){

        require $file;
    }
});
