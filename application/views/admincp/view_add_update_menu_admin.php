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
                <?php echo "<a class='back_button_all_admin_site' title='Quay Lại' href='".base_url().ADMIN_DIR_VIRTUAL."/menu_admin/control'>Quay Lại</a>"; ?>
                <a class="save_items_menu save_all_admin_site" title="Lưu">Lưu</a>
            </div>
        </div>
    </div>
    
    <div class="content_admin_body_add">
    <form action="" method="post" name="form_add_content" id="form_add_content">
        
    <fieldset class="fieldset_title_add">
        <legend>Thông Tin Menu Admin</legend>
        <ul class="ul_content_add_user">
            
            <li>
                <label class="label_content_add">Category</label>
                <select name="txt_menu_cateogry" id="txt_menu_cateogry" class="select_text_add">
                    <option value="1" <?php echo set_select('txt_menu_cateogry','1',TRUE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;Có</option>
                    <option value="0" <?php echo set_select('txt_menu_cateogry','0');?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;Không</option>
                </select>
            </li>
            
            <li>
                <label class="label_content_add">Menu Class</label>
                <input name="txt_menu_class" id="txt_menu_class" type="text" value="<?php echo set_value('txt_menu_class',''); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_menu_class')?>
            </li>
            
            <li>
                <label class="label_content_add">Tên Tiếng Việt</label>
                <input name="txt_menu_name_vi" id="txt_menu_name_vi" type="text" value="<?php echo set_value('txt_menu_name_vi',''); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_menu_name_vi')?>
            </li>
            
            <li>
                <label class="label_content_add">Tên Tiếng Anh</label>
                <input name="txt_menu_name_en" id="txt_menu_name_en" type="text" value="<?php echo set_value('txt_menu_name_en',''); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_menu_name_en')?>
            </li>
            
            <li>
                <label class="label_content_add">Hiển Thị</label>
                <select name="txt_menu_public" id="txt_menu_public" class="select_text_add">
                    <option value="1" <?php echo set_select('txt_menu_public','1',TRUE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;Hiện</option>
                    <option value="0" <?php echo set_select('txt_menu_public','0');?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;Ẩn</option>
                </select>
            </li>
            
            <li>
                <label class="label_content_add">Sắp Xếp</label>
                <input name="txt_menu_order" id="txt_menu_order" type="text" value="<?php echo set_value('txt_menu_order',''); ?>" class="validate[required,custom[custom_onlyNumber]] input_text_add" /><?php echo form_error('txt_menu_order')?>
            </li>
            
        </ul>
    </fieldset>
    <input type="hidden" name="action_form" value="add_menu_admin" />
    </form>
    </div>
    
    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                <?php echo "<a class='back_button_all_admin_site' title='Quay Lại' href='".base_url().ADMIN_DIR_VIRTUAL."/menu_admin/control'>Quay Lại</a>"; ?>
                <a class="save_items_menu save_all_admin_site" title="Lưu">Lưu</a>
            </div>
        </div>
    </div>
</div>
<?php 
    echo $info_content['message_session_flash'];
    echo $this->session->flashdata('add_update_menu_admin');
?>
        	