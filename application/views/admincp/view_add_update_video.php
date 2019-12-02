<?php

/* * *****************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ***************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>

<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ajax/video.js"></script>
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
				<legend><?php echo $info_content['info_video']; ?></legend>
				<ul class="ul_content_add">

					<li <?php echo ($info_content['bool_active']['category']) ? "" : "style='display:none'" ?>>
						<label class="label_content_add"><?php echo $info_content['cate_sub_name_video']; ?></label>
						<select name="txt_cate_video" id="txt_cate_video" class="validate[custom_select[-1]] select_text_add">
							<?php echo ($info_content['bool_active']['category']) ? "<option value='-1'>&nbsp;&nbsp;&nbsp;".$info_content['option_select']."</option>" : ""; ?>
							<?php echo $category_video; ?>  
						</select><?php echo form_error('txt_cate_video') ?>
					</li> 

					<li>
						<label class="label_content_add"><?php echo $info_content['video_name']; ?></label>
						<input name="txt_video_name" id="txt_video_name" type="text" value="<?php echo set_value('txt_video_name',($info_content['action_name'] == 'update_video') ? element('video_name',$video,'') : ""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_video_name') ?>
					</li>

					<li <?php echo ($info_content['bool_active']['alias']) ? "" : "style='display:none'" ?>>
						<label class="label_content_add"><?php echo $info_content['video_alias']; ?></label>
						<input name="txt_video_alias" id="txt_video_alias" type="text" value="<?php echo set_value('txt_video_alias',($info_content['action_name'] == 'update_video') ? element('video_alias',$video,'') : ""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_video_alias') ?>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['video_file']; ?></label>
						<input name="txt_video_file" id="txt_video_file" type="text" value="<?php echo set_value('txt_video_file',($info_content['action_name'] == 'update_video') ? element('video_file',$video,'') : ""); ?>" class="validate[required] input_text_add_browser"/>
						<input type="button" class="input_button_img_browser"  onclick="BrowseServer('files:/','txt_video_file')" value="<?php echo $info_content['button_video']; ?>" />
						&nbsp;&nbsp;
						<?php echo form_error('txt_video_file') ?>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['video_img']; ?></label>
						<input name="txt_video_img" id="txt_video_img" type="text" value="<?php echo set_value('txt_video_img',($info_content['action_name'] == 'update_video') ? element('video_img',$video,'') : ""); ?>" class="input_text_add_browser"/>
						<input type="button" class="input_button_img_browser"  onclick="BrowseServer('Images:/','txt_video_img')" value="<?php echo $info_content['button_image']; ?>">
						&nbsp;&nbsp;
						<input type="checkbox" name="input_check_browser" value="on" checked="checked"/>
					</li>

					<li <?php echo ($info_content['bool_active']['description']) ? "" : "style='display:none'" ?>>
						<label class="label_content_add"><?php echo $info_content['video_description']; ?></label>
						<textarea cols="55" rows="10" name="txt_video_description" id="txt_video_description" ><?php echo set_value('txt_video_description',($info_content['action_name'] == 'update_video') ? element('video_description',$video,'') : ""); ?></textarea>
					</li>

					<li <?php echo ($info_content['bool_active']['active']) ? "" : "style='display:none'" ?>>
						<label class="label_content_add"><?php echo $info_content['video_active']; ?></label>
						<select name="txt_video_active" id="txt_video_active" class="select_text_add">
							<option value="0" <?php echo set_select('txt_video_active','0',(($info_content['action_name'] == 'update_video') && (element('video_active',$video,'') == 0)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_inactive']; ?></option>
							<option value="1" <?php echo set_select('txt_video_active','1',(($info_content['action_name'] == 'update_video') && (element('video_active',$video,'') == 1)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_active']; ?></option>
						</select>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['video_public']; ?></label>
						<select name="txt_video_public" id="txt_video_public" class="select_text_add">
							<option value="1" <?php echo set_select('txt_video_public','1',(($info_content['action_name'] == 'update_video') && (element('video_public',$video,'') == 1)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_public']; ?></option>
							<option value="0" <?php echo set_select('txt_video_public','0',(($info_content['action_name'] == 'update_video') && (element('video_public',$video,'') == 0)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_hidden']; ?></option>
						</select>
					</li>

					<li>
						<label class="label_content_add"><?php echo $info_content['video_order']; ?></label>
						<input name="txt_video_order" id="txt_video_order" type="text" value="<?php echo set_value('txt_video_order',($info_content['action_name'] == 'update_video') ? element('video_order',$video,'') : ""); ?>" class="validate[required,custom[custom_onlyNumber]] input_text_add" /><?php echo form_error('txt_video_order') ?>
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
echo $this->session->flashdata('add_update_video');

?>
        	