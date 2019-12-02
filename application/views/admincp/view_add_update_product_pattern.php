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
        <legend><?php echo $info_content['info_product_pattern'];?></legend>
        <ul class="ul_content_add">
            
            <li>
                <label class="label_content_add"><?php echo $info_content['product_pattern_name'];?></label>
                <input name="txt_product_pattern_name" id="txt_product_pattern_name" type="text" value="<?php echo set_value('txt_product_pattern_name',($info_content['action_name']=='update_product_pattern')?element('product_pattern_name',$product_pattern,''):""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_product_pattern_name')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['product_pattern_order'];?></label>
                <input name="txt_product_pattern_order" id="txt_product_pattern_order" type="text" value="<?php echo set_value('txt_product_pattern_order',($info_content['action_name']=='update_product_pattern')?element('product_pattern_order',$product_pattern,''):""); ?>" class="validate[required,custom[custom_onlyNumber]] input_text_add" /><?php echo form_error('txt_product_pattern_order')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['product_pattern_content'];?></label>
                <textarea class="ckeditor_admin" name="txt_product_pattern_content" id="txt_product_pattern_content" ><?php echo set_value('txt_product_pattern_content',($info_content['action_name']=='update_product_pattern')?element('product_pattern_content',$product_pattern,''):""); ?></textarea> 
                <?php config_ckeditor('txt_product_pattern_content','news_content','760','200') ?>
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
    echo $this->session->flashdata('add_update_product_pattern');
?>
        	