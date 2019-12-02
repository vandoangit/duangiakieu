<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<div id="content"> 
    <div class="title_admin_body">
        <div class="title_admin_body_left">
            <div class="title_admin_body_right">
               <?php echo $title_function;?>
            </div>
        </div>
    </div>
    
    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save'];?>"><?php echo $info_content['action_save'];?></a>
            </div>
        </div>
    </div>
    
    <div class="content_admin_body_add">
    <form action="" method="post" name="form_add_content" id="form_add_content">
        
    <fieldset class="fieldset_title_add">
        <legend><?php echo $title_function;?></legend>
        <ul class="ul_content_add_user">
            <li>
                <label class="label_content_add"><?php echo $info_content['email_server_smtp'];?></label>
                <input name="txt_email_server_smtp" id="txt_email_server_smtp" type="text" value="<?php echo set_value('txt_email_server_smtp',element('email_server_smtp',$config_email,'')); ?>" class="validate[required] input_text_add"/><?php echo form_error('txt_email_server_smtp')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['email_port_smtp'];?></label>
                <input name="txt_email_port_smtp" id="txt_email_port_smtp" type="text" value="<?php echo set_value('txt_email_port_smtp',element('email_port_smtp',$config_email,'')); ?>" class="validate[custom[custom_onlyNumber]] input_text_add"/><?php echo form_error('txt_email_port_smtp')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['email_secure_smtp'];?></label>
                <input name="txt_email_secure_smtp" id="txt_email_secure_smtp" type="text" value="<?php echo set_value('txt_email_secure_smtp',element('email_secure_smtp',$config_email,'')); ?>" class="validate[required] input_text_add"/><?php echo form_error('txt_email_secure_smtp')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['email_debug_smtp'];?></label>
                <input name="txt_email_debug_smtp" id="txt_email_debug_smtp" type="text" value="<?php echo set_value('txt_email_debug_smtp',element('email_debug_smtp',$config_email,'')); ?>" class="validate[custom[custom_onlyNumber]] input_text_add"/><?php echo form_error('txt_email_debug_smtp')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['email_your_name'];?></label>
                <input name="txt_email_your_name" id="txt_email_your_name" type="text" value="<?php echo set_value('txt_email_your_name',element('email_your_name',$config_email,'')); ?>" class="validate[custom_vi[custom_vi_user_name]] input_text_add"/><?php echo form_error('txt_email_your_name')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['email_email_smtp'];?></label>
                <input name="txt_email_email_smtp" id="txt_email_email_smtp" type="text" value="<?php echo set_value('txt_email_email_smtp',element('email_email_smtp',$config_email,'')); ?>" class="validate[custom[custom_email]] input_text_add"/><?php echo form_error('txt_email_email_smtp')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['email_pass_smtp'];?></label>
                <input name="txt_email_pass_smtp" id="txt_email_pass_smtp" type="password" value="<?php echo set_value('txt_email_pass_smtp',element('email_pass_smtp',$config_email,'')); ?>" class="validate[required] input_text_add"/><?php echo form_error('txt_email_pass_smtp')?>
            </li>

            
        </ul>
    </fieldset>
    <input type="hidden" name="action_form" value="config_email" />
    </form>
    </div>
    
    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save'];?>"><?php echo $info_content['action_save'];?></a>
            </div>
        </div>
    </div>
</div>
<?php
echo $info_content['message_session_flash'];
echo $this->session->flashdata('site_config_email');
?>
        	