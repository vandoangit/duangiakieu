<?php

/* * *****************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ***************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>

<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ajax/partner.js"></script>
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
				<?php echo ($authorization['control']) ? "<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['control'],false)."/".element('sub_menu_function',$sub_menu['control'],false)."'>".$info_content['action_back']."</a>" : "" ?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save']; ?>"><?php echo $info_content['action_save']; ?></a>
            </div>
        </div>
    </div>

    <div class="content_admin_body_add">
		<form action="" method="post" name="form_add_content" id="form_add_content">
			<input type="hidden" id="hidden_input_menu_class" value="<?php echo element('menu_class',$sub_menu['control'],false); ?>"/>

			<fieldset class="fieldset_title_add">
				<legend><?php echo $info_content['info_partner']; ?></legend>
				<ul class="ul_content_add_user">

					<li>
						<label class="label_content_add"><?php echo $info_content['partner_name']; ?></label>
						<input name="txt_partner_name" id="txt_partner_name" type="text" value="<?php echo set_value('txt_partner_name',($info_content['action_name'] == 'update_partner') ? element('partner_name',$partner,'') : ""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_partner_name') ?>
					</li>

					<li <?php echo ($info_content['bool_active']['alias']) ? "" : "style='display:none'" ?>>
						<label class="label_content_add"><?php echo $info_content['partner_alias']; ?></label>
						<input name="txt_partner_alias" id="txt_partner_alias" type="text" value="<?php echo set_value('txt_partner_alias',($info_content['action_name'] == 'update_partner') ? element('partner_alias',$partner,'') : ""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_partner_alias') ?>
					</li>

					<li <?php echo ($info_content['bool_active']['link']) ? "" : "style='display:none'" ?>>
						<label class="label_content_add"><?php echo $info_content['partner_url']; ?></label>
						<input name="txt_partner_url" id="txt_partner_url" type="text" value="<?php echo set_value('txt_partner_url',($info_content['action_name'] == 'update_partner') ? element('partner_url',$partner,'') : ""); ?>" class="input_text_add" /><?php echo form_error('txt_partner_url') ?>
					</li>

					<li >
						<label class="label_content_add"><?php echo $info_content['partner_img']; ?></label>
						<input name="txt_partner_img" id="txt_partner_img" type="text" value="<?php echo set_value('txt_partner_img',($info_content['action_name'] == 'update_partner') ? element('partner_img',$partner,'') : ""); ?>" class="input_text_add_browser"/>
						<input type="button" class="input_button_img_browser"  onclick="BrowseServer('Images:/','txt_partner_img')" value="<?php echo $info_content['button_image']; ?>">
						&nbsp;&nbsp;
						<input type="checkbox" name="input_check_browser" value="on" checked="checked"/>
					</li>

					<li <?php echo ($info_content['bool_active']['category']) ? "" : "style='display:none'" ?>>
						<label class="label_content_add"><?php echo $info_content['cate_sub_name_partner']; ?></label>
						<select name="txt_cate_partner" id="txt_cate_partner" class="validate[custom_select[-1]] select_text_add">
							<?php echo ($info_content['bool_active']['category']) ? "<option value='-1'>&nbsp;&nbsp;&nbsp;".$info_content['option_select']."</option>" : ""; ?>
							<?php echo $category_partner; ?>  
						</select><?php echo form_error('txt_cate_partner') ?>
					</li> 

					<li>
						<label class="label_content_add"><?php echo $info_content['partner_public']; ?></label>
						<select name="txt_partner_public" id="txt_partner_public" class="select_text_add">
							<option value="1" <?php echo set_select('txt_partner_public','1',(($info_content['action_name'] == 'update_partner') && (element('partner_public',$partner,'') == 1)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_public']; ?></option>
							<option value="0" <?php echo set_select('txt_partner_public','0',(($info_content['action_name'] == 'update_partner') && (element('partner_public',$partner,'') == 0)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_hidden']; ?></option>
						</select>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['partner_order']; ?></label>
						<input name="txt_partner_order" id="txt_partner_order" type="text" value="<?php echo set_value('txt_partner_order',($info_content['action_name'] == 'update_partner') ? element('partner_order',$partner,'') : ""); ?>" class="validate[required,custom[custom_onlyNumber]] input_text_add" /><?php echo form_error('txt_partner_order') ?>
					</li>
					<li <?php echo ($info_content['bool_active']['info']) ? "" : "style='display:none'" ?>>
						<label class="label_content_add"><?php echo $info_content['partner_info']; ?></label>
						<textarea name="txt_partner_info" id="txt_partner_info" ><?php echo set_value('txt_partner_info',($info_content['action_name'] == 'update_partner') ? element('partner_info',$partner,'') : ""); ?></textarea> 
						<?php config_ckeditor('txt_partner_info','news_content','760','200') ?>
					</li>
				</ul>
			</fieldset>
			<input type="hidden" name="action_form" value="<?php echo $info_content['action_name']; ?>" />
		</form>
    </div>

    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
				<?php echo ($authorization['control']) ? "<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['control'],false)."/".element('sub_menu_function',$sub_menu['control'],false)."'>".$info_content['action_back']."</a>" : "" ?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save']; ?>"><?php echo $info_content['action_save']; ?></a>
            </div>
        </div>
    </div>
</div>
<?php

echo $info_content['message_session_flash'];
echo $this->session->flashdata('add_update_partner');

?>
        	