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
                <label class="label_content_add"><?php echo $info_content['user_account'];?></label>
                <input name="txt_user_account" id="txt_user_account" type="text" value="<?php echo $user_account;?>" readonly="readonly" style="border:0px;font-weight:bold;font-size:14px;cursor:default;background:none" class="input_text_add"/>
            </li>

            <li>
                <label class="label_content_add"><?php echo $info_content['user_pass_old'];?></label>
                <input name="txt_pass_old" id="txt_pass_old" type="password" value="<?php echo set_value('txt_pass_old',""); ?>" class="validate[custom[custom_pass]] input_text_add"/><?php echo form_error('txt_pass_old')?>
            </li>

            <li>
                <label class="label_content_add"><?php echo $info_content['user_pass'];?></label>
                <input name="txt_pass_new" id="txt_pass_new" type="password" value="" class="validate[custom[custom_pass]] input_text_add"/><?php echo form_error('txt_pass_new')?>
            </li>

            <li>
                <label class="label_content_add"><?php echo $info_content['confirm_user_pass'];?></label>
                <input name="txt_confirm_pass_new" id="txt_confirm_pass_new" type="password" value="" class="validate[custom[custom_pass],confirm[txt_pass_new,<?php echo $info_content['message_confirm'];?>]] input_text_add"/><?php echo form_error('txt_confirm_pass_new')?>
            </li>
        </ul>
    </fieldset>
    <input type="hidden" name="action_form" value="change_password" />
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
echo $this->session->flashdata('site_change_user');
?>
        	