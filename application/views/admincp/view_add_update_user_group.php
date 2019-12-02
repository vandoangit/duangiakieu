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
        <legend><?php echo $info_content['info_user_group'];?></legend>
        <ul class="ul_content_add_user">
            <li>
                <label class="label_content_add"><?php echo $info_content['user_group_name'];?></label>
                <input name="txt_user_group_name" id="txt_user_group_name" type="text" value="<?php echo set_value('txt_user_group_name',($info_content['action_name']=='update_user_group')?element('user_group_name',$user_group,''):""); ?>" class="validate[custom_vi[custom_vi_user_group_name]] input_text_add" /><?php echo form_error('txt_user_group_name')?>
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
    echo $this->session->flashdata('add_update_user_group');
?>
        	