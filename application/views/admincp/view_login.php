<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title><?php echo $info_login['login_title'] ?></title>
    <meta name="robots" content="index, follow" />     
    <link rel="shortcut icon" href="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/icon_menu/logo_company_icon.gif" type="image/x-icon" />    
    <link href="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>style/login.css" rel="stylesheet" type="text/css" />
    
    <script src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/jquery.js" type="text/javascript"></script>
    
    <link href="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>style/validation/validationEngine.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/validation/jquery.validationEngine.js" type="text/javascript"></script>
    <script src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/validation/jquery.validationEngine-<?php echo $info_login['sub_lang']; ?>.js" type="text/javascript"></script> 
    
    <script language="javascript">
         //Su dung trong cac file ajax
        var base_url_root_admin='';
        
        $.validationEngineLanguage.newLang();
        $(document).ready(function(){
            $("#login_form").validationEngine();
        });
    </script>
</head>
    
<body>
    <div id="body_header"> 
        <div><div> 
            <span class="title"><?php echo $info_login['login_company']; ?></span> 
        </div></div> 
    </div>

    <div id="body_content">
        <form name="login_form" id="login_form" method="post" action="">
        <div class="body_login">
            <div class="login_welcome"><?php echo $info_login['login_welcome']; ?></div>
            <div class="login_content"> 
            <table>
            <tr>
                <td colspan="3" style="text-align:center;">
                    <div class="public_message_admin"><?php echo $info_login['messages'].validation_errors();?>&nbsp;</div>
                </td>
            </tr>

            <tr>
                <td width="25%">
                    <span class="login_label"><?php echo $info_login['login_account']; ?></span>
                </td>
                <td  colspan="2">
                    <input type="text" name="login_account" id="login_account" class="validate[custom[custom_account]] login_input" value="<?php echo set_value('login_account'); ?>" />
                </td>
            </tr>

            <tr>
                <td>
                    <span class="login_label"><?php echo $info_login['login_pass']; ?></span>
                </td>
                <td  colspan="2">
                    <input type="password" name="login_password" id="login_password" class="validate[custom[custom_pass]] login_input" value="" />                            
                </td> 
            </tr>

            <tr>
                <td>
                    <span class="login_label"><?php echo $info_login['login_lang']; ?></span>
                </td>
                <td colspan="2">
                    <select name="login_language" id="login_language" class="login_select">
                    <?php
                    foreach($info_login['number_lang'] as $key_lang=>$val_lang){
                    ?>
                        <option value="<?php echo element('lang_key',$val_lang,'vi'); ?>" <?php echo set_select('login_language',element('lang_key',$val_lang,'vi')); ?>>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo element('lang_name',$val_lang,'vi');?></option>
                    <?php    
                    }
                    ?>
                    </select>                            
                </td>
            </tr>
                
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">
                    <input name="login_input" type="submit" class="login_button" id="login_button" value="<?php echo $info_login['login_button']; ?>" />
                </td>
            </tr>
            </table>
            </div>
        </div>
        </form>
    </div>

    <div id="body_content_bottom">
        <div><div>
            &nbsp;
        </div></div>
    </div>

    <div id="footer"> 
        <?php echo $info_login['login_footer']; ?>
    </div>
    </body>
</html>
