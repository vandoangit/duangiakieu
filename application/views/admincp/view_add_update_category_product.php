<?php

/* * *****************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ***************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>

<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE; ?>js/ajax/category_product.js"></script>
<div id="content"> 
    <div class="title_admin_body">
        <div class="title_admin_body_left">
            <div class="title_admin_body_right">
				<?php echo $title_function; ?>
            </div>
        </div>
    </div>

    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
				<?php echo ($authorization['category']) ? "<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['category'],false)."/".element('sub_menu_function',$sub_menu['category'],false)."'>".$info_content['action_back']."</a>" : "" ?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save']; ?>"><?php echo $info_content['action_save']; ?></a>
            </div>
        </div>
    </div>

    <div class="content_admin_body_add">
		<form action="" method="post" name="form_add_content" id="form_add_content">
			<input type="hidden" id="hidden_input_menu_class" value="<?php echo element('menu_class',$sub_menu['category'],false); ?>"/>

			<fieldset class="fieldset_title_add">
				<legend><?php echo $info_content['info_category']; ?></legend>
				<ul class="ul_content_add_user">
					<li <?php echo (($info_content['level_menu'] <= 1) && ($info_content['level_menu'] !== true)) ? "style='display:none'" : "" ?>>
						<label class="label_content_add"><?php echo $info_content['cate_parent']; ?></label>
						<select name="txt_category_product" id="txt_category_product" class="select_text_add">
							<option value="0">&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['select_cate_root']; ?></option>
							<?php echo $category_product; ?>  
						</select><?php echo form_error('txt_category_product') ?>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['cate_name']; ?></label>
						<input name="txt_cate_name" id="txt_cate_name" type="text" value="<?php echo set_value('txt_cate_name',($info_content['action_name'] == 'update_category_product') ? element('cate_name',$category_product_one,'') : ""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_cate_name') ?>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['cate_alias']; ?></label>
						<input name="txt_cate_alias" id="txt_cate_alias" type="text" value="<?php echo set_value('txt_cate_alias',($info_content['action_name'] == 'update_category_product') ? element('cate_alias',$category_product_one,'') : ""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_cate_alias') ?>
					</li>

					<li style="display:none;">
						<label class="label_content_add"><?php echo $info_content['cate_img']; ?></label>
						<input name="txt_cate_img" id="txt_cate_img" type="text" value="<?php echo set_value('txt_cate_img',($info_content['action_name'] == 'update_category_product') ? element('cate_img',$category_product_one,'') : ""); ?>" class="input_text_add_browser"/>
						<input type="button" class="input_button_img_browser"  onclick="BrowseServer('Images:/','txt_cate_img')" value="<?php echo $info_content['button_image']; ?>" />
						&nbsp;&nbsp;
						<input type="checkbox" name="input_check_browser" value="on" checked="checked"/>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['cate_public']; ?></label>
						<select name="txt_cate_public" id="txt_cate_public" class="select_text_add">
							<option value="1" <?php echo set_select('txt_cate_public','1',(($info_content['action_name'] == 'update_category_product') && (element('cate_public',$category_product_one,'') == 1)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_public']; ?></option>
							<option value="0" <?php echo set_select('txt_cate_public','0',(($info_content['action_name'] == 'update_category_product') && (element('cate_public',$category_product_one,'') == 0)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_hidden']; ?></option>
						</select>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['cate_order']; ?></label>
						<input name="txt_cate_order" id="txt_cate_order" type="text" value="<?php echo set_value('txt_cate_order',($info_content['action_name'] == 'update_category_product') ? element('cate_order',$category_product_one,'') : ""); ?>" class="validate[required,custom[custom_onlyNumber]] input_text_add" /><?php echo form_error('txt_cate_order') ?>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['cate_seo_keyword']; ?></label>
						<input name="txt_cate_seo_keyword" id="txt_cate_seo_keyword" type="text" value="<?php echo set_value('txt_cate_seo_keyword',($info_content['action_name'] == 'update_category_product') ? element('cate_seo_keyword',$category_product_one,'') : ""); ?>" class="input_text_add" /><?php echo form_error('txt_cate_seo_keyword') ?>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['cate_seo_description']; ?></label>
						<input name="txt_cate_seo_description" id="txt_cate_seo_description" type="text" value="<?php echo set_value('txt_cate_seo_description',($info_content['action_name'] == 'update_category_product') ? element('cate_seo_description',$category_product_one,'') : ""); ?>" class="input_text_add" /><?php echo form_error('txt_cate_seo_description') ?>
					</li>
				</ul>
			</fieldset> 

			<input type="hidden" name="action_form" value="<?php echo $info_content['action_name']; ?>" />
		</form>
    </div>

    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
				<?php echo ($authorization['category']) ? "<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['category'],false)."/".element('sub_menu_function',$sub_menu['category'],false)."'>".$info_content['action_back']."</a>" : "" ?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save']; ?>"><?php echo $info_content['action_save']; ?></a>
            </div>
        </div>
    </div>
</div>
<?php

echo $info_content['message_session_flash'];
echo $this->session->flashdata('add_update_category_product');

?>
        	