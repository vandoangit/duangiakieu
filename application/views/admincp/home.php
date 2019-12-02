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
    <title><?php echo $info_home['home_title']; ?></title>
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />
    
    <link rel="shortcut icon" href="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/icon_menu/logo_company_icon.gif" type="image/x-icon" />
    <link href="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>style/import.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/general_config/message_genneral-<?php echo $info_home['sub_lang']; ?>.js"></script>
    
    <!-- Jquery -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/jquery-ui-1.8.18.custom.min.js"></script>
    
    <!-- UI Jquery -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ui/jquery.ui.core.js"></script>
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ui/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ui/jquery.effects.core.js"></script>
    
    <!-- Tooltip -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/tooltip/jquery.tooltip.js"></script>
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/tooltip/jquery.dimensions.js"></script>
    
    <!------------------------------------------------------------------------------------------------->
    
    <!-- Menu left of #navigation and .mParent .tParent o file view_left -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/treeview/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/treeview/jquery.treeview.js"></script>       
    
    <!-- Datepicker of #datepicker o file view_left -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/calendar/datepicker.js"></script>
    
    <!------------------------------------------------------------------------------------------------->
    
    <!--Data Tables ui -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ui/jquery.ui.dataTables.js"></script>
    
    <!-- Lightbox Image -->
    <!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>style/lightbox/themes/default/jquery.lightbox.ie6.css" />
    <![endif]-->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/lightbox/jquery.lightbox.min.js"></script>
    
    <!-- Bang dieu khien ui #accordion o file view_control_panel  -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ui/jquery.ui.accordion.js"></script> 
    
    <!------------------------------------------------------------------------------------------------->
    
     <!--Validation -->
    <script src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/validation/jquery.validationEngine.js" type="text/javascript"></script>
    <script src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/validation/jquery.validationEngine-<?php echo $info_home['sub_lang']; ?>.js" type="text/javascript"></script>
    
    <!-- Input datapicker ui -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ui/jquery.ui.datepicker.js"></script>
    
    <script language="javascript" src="<?php echo base_url().DIR_PUBLIC;?>ckfinder/ckfinder.js"></script>
    <script language="javascript" src="<?php echo base_url().DIR_PUBLIC; ?>ckeditor/compatibility_browser.js"></script>
    
    <script language="javascript">
        //Su dung trong cac file ajax
        var base_url_root_admin='';
        base_url_root_admin="<?php echo base_url().ADMIN_DIR_VIRTUAL."/"; ?>";
    </script>
    
    <!-- -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/general_config/setting_genneral.js"></script>
    
    <!-- General Ajax -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/general_config/general_ajax.js"></script>
    
     <!-- Tooltip o toan bo trang -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/general_config/setting_tooltip.js"></script>
    
    <!------------------------------------------------------------------------------------------------->
    
    <!-- Menu left of #navigation and .mParent .tParent o file view_left-->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/general_config/setting_treeview.js"></script>
    
    <!-- Datepicker of #datepicker o file view_left -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/general_config/setting_datepicker.js"></script>   
    
    <!------------------------------------------------------------------------------------------------->
    
    <!--Manager Content -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/general_config/setting_content_manager.js"></script>
    
    <!--Ajax Manager Content,Light Box,Tooltip -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/general_config/ajax_content_manager.js"></script>
    
     <!-- Bang dieu khien #accordion o file view_control_panel -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/general_config/setting_accordion.js"></script>
    
    <!------------------------------------------------------------------------------------------------->
    
    <!--Add Content -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/general_config/setting_content_add_update.js"></script>
    
    <!--Ajax Add Content -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/general_config/ajax_content_add_update.js"></script>

    <!-- Input datapicker ui -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/general_config/setting_input_datepicker.js"></script> 
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ui/i18n/jquery.ui.datepicker-<?php echo $info_home['sub_lang']; ?>.js"></script>
    <script language="javascript">
        $$(document).ready(function(){
            $$.datepicker.setDefaults($$.datepicker.regional["<?php echo $info_home['sub_lang']; ?>"]);
        });
    </script>
    
    <!-- Set Up Browser Image  -->
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/general_config/setting_upload_img.js"></script>   
</head>
    
	<body onload="set_init_loading()">
    
    <div id="loading_admin">
        <div>    
            <table width="100%">
            <tbody>
                <tr>
                    <td width="35" align="center"><img border="0" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/img_loading_admin.gif"/></td>
                    <td>Tiến trình đang được thực hiện.Vui lòng chờ đợi trong giây lát...</td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
    
    
    <!--Begin Div Toàn Trang Cho Admin -->
    <div id="div_wapper_admin">
        
        <!--Begin Div Header Cho Admin -->
        <?php $this->load->view($template_view_header,$data_header); ?>  
        <!--End Div Header Cho Admin -->
        
        <!--Begin Div Body Cho Admin -->
        <div id="div_body_admin">
            <!--Begin Div Body Left Cho Admin -->
            <div id="div_body_left_admin">
               <?php $this->load->view($template_view_left,$data_left);?>
            </div>
            <!--End Div Body Left Cho Admin -->
            
            <!--Begin Div Body Right Cho Admin -->
            <div id="div_body_right_admin">
                <?php $this->load->view($template_view_content,$data_content);?>   	
            </div>
            <!--End Div Body Right Cho Admin -->
        </div>
        <!--End Div Body Cho Admin -->
        
        <!--Begin Div Footer Cho Admin -->
        <div id="div_footer_admin">
            <?php $this->load->view($template_view_footer,$data_footer); ?>
        </div>
         <!--End Div Footer Cho Admin -->
         
    </div>
    <!--End Div Toàn Trang Cho Admin -->
</body>
</html>