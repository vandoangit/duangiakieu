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
                <?php echo ($authorization['control'])?"<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['control'],false)."/".element('sub_menu_function',$sub_menu['control'],false)."'>".$info_content['action_back']."</a>":""?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save'];?>"><?php echo $info_content['action_save'];?></a>
            </div>
        </div>
    </div>
    
    <div class="content_admin_body_add">
    <form action="" method="post" name="form_add_content" id="form_add_content">
        
    <fieldset class="fieldset_title_add">
        <legend><?php echo $info_content['info_user'];?></legend>
        <ul class="ul_content_add_user">
            <li>
                <label class="label_content_add"><?php echo $info_content['user_account'];?></label>
                <input name="txt_user_account" id="txt_user_account" type="text" value="<?php echo set_value('txt_user_account',($info_content['action_name']=='update_user')?element('user_account',$user,''):""); ?>" <?php echo ($info_content['action_name']=='update_user')?"style='border:0px;font-weight:bold;font-size:14px;background:none;cursor:default' readonly='readonly' class='input_text_add'":"class='validate[custom[custom_account],ajax[ajaxAccountUser]] input_text_add'"?>/><?php echo form_error('txt_user_account')?>
            </li>

            <li>
                <label class="label_content_add"><?php echo $info_content['user_pass'];?></label>
                <input name="txt_user_pass" id="txt_user_pass" type="password" value="<?php echo set_value('txt_user_pass',""); ?>" class="validate[custom[<?php echo ($info_content['action_name']=='update_user')?"custom_pass_require":"custom_pass"?>]] input_text_add"/><?php echo form_error('txt_user_pass')?>
            </li>

            <li>
                <label class="label_content_add"><?php echo $info_content['confirm_user_pass'];?></label>
                <input name="txt_confirm_user_pass" id="txt_confirm_user_pass" type="password" value="" class="validate[custom[<?php echo ($info_content['action_name']=='update_user')?"custom_pass_require":"custom_pass"?>],confirm[txt_user_pass,<?php echo $info_content['message_confirm'];?>]] input_text_add"/><?php echo form_error('txt_confirm_user_pass')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['user_email'];?></label>
                <input name="txt_email" id="txt_email" type="text" value="<?php echo set_value('txt_email',($info_content['action_name']=='update_user')?element('user_email',$user,''):""); ?>" class="validate[custom[custom_email]] input_text_add"/><?php echo form_error('txt_email')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['user_name'];?></label>
                <input name="txt_user_name" id="txt_user_name" type="text" value="<?php echo set_value('txt_user_name',($info_content['action_name']=='update_user')?element('user_name',$user,''):""); ?>" class="validate[custom_vi[custom_vi_user_name]] input_text_add"/><?php echo form_error('txt_user_name')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['user_birthday'];?></label>
                <input name="txt_user_birthday" id="txt_user_birthday" type="text" value="<?php echo set_value('txt_user_birthday',($info_content['action_name']=='update_user')?date('d-m-Y',strtotime(element('user_birthday',$user,''))):""); ?>" class="validate[custom[custom_date]] input_datepicker input_text_add"/><?php echo form_error('txt_user_birthday')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['user_gender'];?></label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input name="txt_user_gender" id="txt_user_gender1" type="radio" value="1" <?php echo set_radio('txt_user_gender', '1',(($info_content['action_name']=='update_user')&&(element('user_gender',$user,'')==1))?TRUE:FALSE); ?> checked='checked' />&nbsp;&nbsp;&nbsp;<?php echo $info_content['user_male'];?></label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input name="txt_user_gender" id="txt_user_gender2" type="radio" value="0" <?php echo set_radio('txt_user_gender', '0',(($info_content['action_name']=='update_user')&&(element('user_gender',$user,'')==0))?TRUE:FALSE); ?> />&nbsp;&nbsp;&nbsp;<?php echo $info_content['user_female'];?></label>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['user_address'];?></label>
                <input name="txt_user_address" id="txt_user_address" type="text" value="<?php echo set_value('txt_user_address',($info_content['action_name']=='update_user')?element('user_address',$user,''):""); ?>" class="validate[required] input_text_add"/><?php echo form_error('txt_user_address')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['user_directory'];?></label>
                <input name="txt_user_directory" id="txt_user_directory" type="text" value="<?php echo set_value('txt_user_directory',($info_content['action_name']=='update_user')?element('user_directory',$user,''):""); ?>" class="input_text_add"/><?php echo form_error('txt_user_directory')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['user_phone'];?></label>
                <input name="txt_user_phone" id="txt_user_phone" type="text" value="<?php echo set_value('txt_user_phone',($info_content['action_name']=='update_user')?element('user_phone',$user,''):""); ?>" class="validate[required,custom[custom_telephone]] input_text_add"/><?php echo form_error('txt_user_phone')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['user_img'];?></label>
                <input name="txt_user_img" id="txt_user_img" type="text" value="<?php echo set_value('txt_user_img',($info_content['action_name']=='update_user')?element('user_img',$user,''):""); ?>" class="input_text_add_browser"/>
                <input type="button" class="input_button_img_browser"  onclick="BrowseServer('Images:/','txt_user_img')" value="<?php echo $info_content['button_image'];?>">
                 &nbsp;&nbsp;
                <input type="checkbox" name="input_check_browser" value="on" checked="checked"/>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['user_web'];?></label>
                <input name="txt_user_web" id="txt_user_web" type="text" value="<?php echo set_value('txt_user_web',($info_content['action_name']=='update_user')?element('user_web',$user,''):""); ?>" class="input_text_add"/><?php echo form_error('txt_user_web')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['user_fax'];?></label>
                <input name="txt_user_fax" id="txt_user_fax" type="text" value="<?php echo set_value('txt_user_fax',($info_content['action_name']=='update_user')?element('user_fax',$user,''):""); ?>" class="validate[custom[custom_onlyNumber]] input_text_add"/><?php echo form_error('txt_user_fax')?>
            </li>
            
        </ul>
    </fieldset>
    <input type="hidden" name="action_form" value="<?php echo $info_content['action_name'];?>" />
    </form>
    </div>
    
    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                <?php echo ($authorization['control'])?"<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['control'],false)."/".element('sub_menu_function',$sub_menu['control'],false)."'>".$info_content['action_back']."</a>":""?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save'];?>"><?php echo $info_content['action_save'];?></a>
            </div>
        </div>
    </div>
</div>
<?php 
    echo $info_content['message_session_flash']; 
    echo $this->session->flashdata('add_update_user');
?>
        	