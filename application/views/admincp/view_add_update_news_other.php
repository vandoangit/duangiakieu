<?php

/* * *****************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ***************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>

<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE; ?>js/ajax/news_other.js"></script>
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
				<?php echo ($authorization['article']) ? "<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['article'],false)."/".element('sub_menu_function',$sub_menu['article'],false)."'>".$info_content['action_back']."</a>" : "" ?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save']; ?>"><?php echo $info_content['action_save']; ?></a>
            </div>
        </div>
    </div>

    <div class="content_admin_body_add">
		<form action="" method="post" name="form_add_content" id="form_add_content">
			<input type="hidden" id="hidden_input_menu_class" value="<?php echo element('menu_class',$sub_menu['article'],false); ?>"/>

			<fieldset class="fieldset_title_add">
				<legend><?php echo $info_content['info_news']; ?></legend>
				<ul class="ul_content_add">

					<li>
						<label class="label_content_add"><?php echo $info_content['news_name']; ?></label>
						<input name="txt_news_name" id="txt_news_name" type="text" value="<?php echo set_value('txt_news_name',($info_content['action_name'] == 'update_news_other') ? element('news_name',$news_other,'') : ""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_news_name') ?>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['news_alias']; ?></label>
						<input name="txt_news_alias" id="txt_news_alias" type="text" value="<?php echo set_value('txt_news_alias',($info_content['action_name'] == 'update_news_other') ? element('news_alias',$news_other,'') : ""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_news_alias') ?>
					</li>

					<li <?php echo ($info_content['bool_active']['category']) ? "" : "style='display:none'" ?>>
						<label class="label_content_add"><?php echo $info_content['cate_name']; ?></label>
						<select name="txt_cate_news" id="txt_cate_news" class="validate[custom_select[-1]] select_text_add">
							<?php echo ($info_content['bool_active']['category']) ? "<option value='-1'>&nbsp;&nbsp;&nbsp;".$info_content['option_select']."</option>" : ""; ?>
							<?php echo $category_news_other; ?>  
						</select><?php echo form_error('txt_cate_news') ?>
					</li> 

					<li <?php echo ($info_content['bool_active']['image']) ? "" : "style='display:none'" ?>>
						<label class="label_content_add"><?php echo $info_content['news_img']; ?></label>
						<input name="txt_news_img" id="txt_news_img" type="text" value="<?php echo set_value('txt_news_img',($info_content['action_name'] == 'update_news_other') ? element('news_img',$news_other,'') : ""); ?>" class="input_text_add_browser"/>
						<input type="button" class="input_button_img_browser"  onclick="BrowseServer('Images:/','txt_news_img')" value="<?php echo $info_content['button_image']; ?>" />
						&nbsp;&nbsp;
						<input type="checkbox" name="input_check_browser" value="on" checked="checked"/>
					</li>           

					<li>
						<label class="label_content_add"><?php echo $info_content['news_seo_keyword']; ?></label>
						<input name="txt_news_seo_keyword" id="txt_news_seo_keyword" type="text" value="<?php echo set_value('txt_news_seo_keyword',($info_content['action_name'] == 'update_news_other') ? element('news_seo_keyword',$news_other,'') : ""); ?>" class="input_text_add" /><?php echo form_error('txt_news_seo_keyword') ?>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['news_seo_description']; ?></label>
						<input name="txt_news_seo_description" id="txt_news_seo_description" type="text" value="<?php echo set_value('txt_news_seo_description',($info_content['action_name'] == 'update_news_other') ? element('news_seo_description',$news_other,'') : ""); ?>" class="input_text_add" /><?php echo form_error('txt_news_seo_description') ?>
					</li>

					<li <?php echo ($info_content['bool_active']['active']) ? "" : "style='display:none'" ?>>
						<label class="label_content_add"><?php echo $info_content['news_active']; ?></label>
						<select name="txt_news_active" id="txt_news_active" class="select_text_add">
							<option value="0" <?php echo set_select('txt_news_active','0',(($info_content['action_name'] == 'update_news_other') && (element('news_active',$news_other,'') == 0)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_inactive']; ?></option>
							<option value="1" <?php echo set_select('txt_news_active','1',(($info_content['action_name'] == 'update_news_other') && (element('news_active',$news_other,'') == 1)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_active']; ?></option>
						</select>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['news_public']; ?></label>
						<select name="txt_news_public" id="txt_news_public" class="select_text_add">
							<option value="1" <?php echo set_select('txt_news_public','1',(($info_content['action_name'] == 'update_news_other') && (element('news_public',$news_other,'') == 1)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_public']; ?></option>
							<option value="0" <?php echo set_select('txt_news_public','0',(($info_content['action_name'] == 'update_news_other') && (element('news_public',$news_other,'') == 0)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_hidden']; ?></option>
						</select>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['news_order']; ?></label>
						<input name="txt_news_order" id="txt_news_order" type="text" value="<?php echo set_value('txt_news_order',($info_content['action_name'] == 'update_news_other') ? element('news_order',$news_other,'') : ""); ?>" class="validate[required,custom[custom_onlyNumber]] input_text_add" /><?php echo form_error('txt_news_order') ?>
					</li>

					<li <?php echo ($info_content['bool_active']['description']) ? "" : "style='display:none'" ?>>
						<label class="label_content_add"><?php echo $info_content['news_headline']; ?></label>
						<textarea name="txt_news_headline" id="txt_news_headline" ><?php echo set_value('txt_news_headline',($info_content['action_name'] == 'update_news_other') ? element('news_headline',$news_other,'') : ""); ?></textarea> 
						<?php config_ckeditor('txt_news_headline','news_headline','760','200') ?>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['news_content']; ?></label>
						<textarea class="ckeditor_admin" name="txt_news_content" id="txt_news_content" ><?php echo set_value('txt_news_content',($info_content['action_name'] == 'update_news_other') ? element('news_content',$news_other,'') : ""); ?></textarea> 
						<?php config_ckeditor('txt_news_content','news_content','760','200') ?>
					</li>
				</ul>
			</fieldset>
			<input type="hidden" name="action_form" value="<?php echo $info_content['action_name']; ?>" />
		</form>
    </div>

    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
				<?php echo ($authorization['article']) ? "<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['article'],false)."/".element('sub_menu_function',$sub_menu['article'],false)."'>".$info_content['action_back']."</a>" : "" ?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save']; ?>"><?php echo $info_content['action_save']; ?></a>
            </div>
        </div>
    </div>
</div>
<?php

echo $info_content['message_session_flash'];
echo $this->session->flashdata('add_update_news_other');

?>
        	