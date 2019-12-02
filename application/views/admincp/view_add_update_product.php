<?php

/* * *****************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ***************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>
<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE; ?>js/ajax/product.js"></script>

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
                <legend><?php echo $info_content['info_product']; ?></legend>
                <ul class="ul_content_add">

                    <li>
                        <label class="label_content_add"><?php echo $info_content['product_id']; ?></label>
                        <input name="txt_product_id" id="txt_product_id" type="text" value="<?php echo set_value('txt_product_id',($info_content['action_name'] == 'update_product') ? element('product_id',$product,'') : ""); ?>" <?php echo ($info_content['action_name'] == 'update_product') ? "style='border:0px;font-weight:bold;font-size:14px;background:none;cursor:default;background:none' readonly='readonly' class='input_text_add'" : "class='validate[custom[custom_product_id],ajax[ajaxProductID]] input_text_add'" ?> /><?php echo form_error('txt_product_id') ?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['product_name']; ?></label>
                        <input name="txt_product_name" id="txt_product_name" type="text" value="<?php echo set_value('txt_product_name',($info_content['action_name'] == 'update_product') ? element('product_name',$product,'') : ""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_product_name') ?>
                    </li>

					<li>
                        <label class="label_content_add"><?php echo $info_content['product_alias']; ?></label>
                        <input name="txt_product_alias" id="txt_product_alias" type="text" value="<?php echo set_value('txt_product_alias',($info_content['action_name'] == 'update_product') ? element('product_alias',$product,'') : ""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_product_alias') ?>
                    </li>

                    <li <?php echo ($info_content['bool_active']['price']) ? "" : "style='display:none'" ?>>
                        <label class="label_content_add"><?php echo $info_content['product_price']; ?></label>
                        <input name="txt_product_price" id="txt_product_price" type="text" value="<?php echo set_value('txt_product_price',($info_content['action_name'] == 'update_product') ? number_format(element('product_price',$product,''),0,',','.') : (($info_content['bool_active']['price']) ? "" : "0")); ?>" class="validate[required,custom[custom_onlyNumber_format]] input_text_add" onkeyup="this.value=format_number(this.value,'.')" /><?php echo form_error('txt_product_price') ?>
                    </li>

                    <li <?php echo ($info_content['bool_active']['price_old']) ? "" : "style='display:none'" ?>>
                        <label class="label_content_add"><?php echo $info_content['product_price_old']; ?></label>
                        <input name="txt_product_price_old" id="txt_product_price_old" type="text" value="<?php echo set_value('txt_product_price_old',($info_content['action_name'] == 'update_product') ? number_format(element('product_price_old',$product,''),0,',','.') : (($info_content['bool_active']['price_old']) ? "" : "1")); ?>" class="validate[required,custom[custom_onlyNumber_format]] input_text_add" onkeyup="this.value=format_number(this.value,'.')" /><?php echo form_error('txt_product_price_old') ?>
                    </li>

                    <li <?php echo ($info_content['bool_active']['quantity']) ? "" : "style='display:none'" ?>>
                        <label class="label_content_add"><?php echo $info_content['product_number']; ?></label>
                        <input name="txt_product_number" id="txt_product_number" type="text" value="<?php echo set_value('txt_product_number',($info_content['action_name'] == 'update_product') ? number_format(element('product_number',$product,''),0,',','.') : (($info_content['bool_active']['quantity']) ? "" : "0")); ?>" class="validate[required,custom[custom_onlyNumber_format]] input_text_add" onkeyup="this.value=format_number(this.value,'.')" /><?php echo form_error('txt_product_number') ?>
                    </li>

                    <li <?php echo ($info_content['bool_active']['color']) ? "" : "style='display:none'" ?>>
                        <label class="label_content_add"><?php echo $info_content['product_color']; ?></label>
                        <input name="txt_product_color" id="txt_product_color" type="text" value="<?php echo set_value('txt_product_color',($info_content['action_name'] == 'update_product') ? element('product_color',$product,'') : ""); ?>" class="input_text_add" /><?php echo form_error('txt_product_color') ?>
                    </li>

                    <li <?php echo ($info_content['bool_active']['prominent']) ? "" : "style='display:none'" ?>>
                        <label class="label_content_add"><?php echo $info_content['product_prominent']; ?></label>
                        <select name="txt_product_prominent" id="txt_product_prominent" class="select_text_add">
                            <option value="0" <?php echo set_select('txt_product_prominent','0',(($info_content['action_name'] == 'update_product') && (element('product_prominent',$product,'') == 0)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_inactive']; ?></option>
                            <option value="1" <?php echo set_select('txt_product_prominent','1',(($info_content['action_name'] == 'update_product') && (element('product_prominent',$product,'') == 1)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_active']; ?></option>
                        </select>
                    </li>

                    <li <?php echo ($info_content['bool_active']['category']) ? "" : "style='display:none'" ?>>
                        <label class="label_content_add"><?php echo $info_content['cate_name']; ?></label>
                        <select name="txt_cate_product" id="txt_cate_product" class="validate[custom_select[-1]] select_text_add">
							<?php echo ($info_content['bool_active']['category']) ? "<option value='-1'>&nbsp;&nbsp;&nbsp;".$info_content['option_select']."</option>" : ""; ?>
							<?php echo $category_product; ?>
                        </select><?php echo form_error('txt_cate_product') ?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['product_public']; ?></label>
                        <select name="txt_product_public" id="txt_product_public" class="select_text_add">
                            <option value="1" <?php echo set_select('txt_product_public','1',(($info_content['action_name'] == 'update_product') && (element('product_public',$product,'') == 1)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_public']; ?></option>
                            <option value="0" <?php echo set_select('txt_product_public','0',(($info_content['action_name'] == 'update_product') && (element('product_public',$product,'') == 0)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_hidden']; ?></option>
                        </select>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['product_order']; ?></label>
                        <input name="txt_product_order" id="txt_product_order" type="text" value="<?php echo set_value('txt_product_order',($info_content['action_name'] == 'update_product') ? element('product_order',$product,'') : ""); ?>" class="validate[required,custom[custom_onlyNumber]] input_text_add" /><?php echo form_error('txt_product_order') ?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['product_seo_keyword']; ?></label>
                        <input name="txt_product_seo_keyword" id="txt_product_seo_keyword" type="text" value="<?php echo set_value('txt_product_seo_keyword',($info_content['action_name'] == 'update_product') ? element('product_seo_keyword',$product,'') : ""); ?>" class="input_text_add" /><?php echo form_error('txt_product_seo_keyword') ?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['product_seo_description']; ?></label>
                        <input name="txt_product_seo_description" id="txt_product_seo_description" type="text" value="<?php echo set_value('txt_product_seo_description',($info_content['action_name'] == 'update_product') ? element('product_seo_description',$product,'') : ""); ?>" class="input_text_add" /><?php echo form_error('txt_product_seo_description') ?>
                    </li>

                    <li <?php echo ($info_content['bool_active']['partner']) ? "" : "style='display:none'" ?>>
                        <label class="label_content_add"><?php echo $info_content['product_partner']; ?></label>
                        <select name="txt_product_partner" id="txt_product_partner" class="select_text_add">
                            <option value="-1">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $info_content['option_select']; ?></option>
							<?php

							if(is_array($product_partner)){

								foreach($product_partner as $key=> $value){

									?>    
									<option value="<?php echo element('partner_id',$value,'') ?>" <?php echo set_select('txt_product_partner',element('partner_id',$value,''),($info_content['action_name'] == 'update_product' && element('product_partner',$product,'') == element('partner_id',$value,'')) ? true : false); ?>>&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('partner_name',$value,'') ?></option>
									<?php

								}
							}

							?>
                        </select>
                    </li>

                    <li <?php echo ($info_content['bool_active']['application']) ? "" : "style='display:none'" ?>>
                        <label class="label_content_add"><?php echo $info_content['product_application']; ?></label>
                        <select name="txt_product_application[]" id="txt_product_application" class="select_text_add" multiple="multiple" style="height:150px;padding:10px 5px;">
							<?php

							if(is_array($product_application)){

								$arr_application_select=@unserialize(element('product_application',$product,array()));
								if(!is_array($arr_application_select))
									$arr_application_select=array();

								foreach($product_application as $key=> $value){

									?>
									<option value="<?php echo element('application_id',$value,'') ?>" <?php echo set_select('txt_product_application',element('application_id',$value,''),($info_content['action_name'] == 'update_product' && in_array(element('application_id',$value,''),$arr_application_select)) ? true : false); ?>>&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('application_name',$value,'') ?></option>
									<?php

								}
							}

							?>
                        </select>
                    </li>

					<?php

					if(isset($_POST['action_form']) || ($info_content['action_name'] == 'update_product')){

						if(isset($_POST['action_form']))
							$arr_image_product=$_POST['txt_product_img'];
						else
							$arr_image_product=@unserialize(element('product_img',$product,array()));

						if(is_array($arr_image_product) && (!empty($arr_image_product))){

							foreach($arr_image_product as $key=> $value){

								?>
								<li>
									<label class="label_content_add"><?php echo $info_content['product_img']; ?></label>
									<input name="txt_product_img[<?php echo $key; ?>]" id="txt_product_img_<?php echo $key; ?>" type="text" value="<?php echo custom_htmlspecialchars($value); ?>" class="input_text_add_browser" />
									<input onclick="BrowseServer('Images:/','txt_product_img_<?php echo $key; ?>')"  type="button" value="<?php echo $info_content['button_image']; ?>" class="input_button_img_browser" />
									&nbsp;&nbsp;
									<input type="checkbox" name="input_check_browser[<?php echo $key; ?>]" value="on" checked="checked"/>
								</li>
								<?php

							}
						}
						else{

							$key_img_product='tri'.date("dmYhis").round(microtime() * 1000);

							?>
							<li>
								<label class="label_content_add"><?php echo $info_content['product_img']; ?></label>
								<input name="txt_product_img[<?php echo $key_img_product; ?>]" id="txt_product_img_<?php echo $key_img_product; ?>" type="text" value="" class="input_text_add_browser" />
								<input onclick="BrowseServer('Images:/','txt_product_img_<?php echo $key_img_product; ?>')"  type="button" value="<?php echo $info_content['button_image']; ?>" class="input_button_img_browser" />
								&nbsp;&nbsp;
								<input type="checkbox" name="input_check_browser[<?php echo $key_img_product; ?>]" value="on" checked="checked"/>
							</li>
							<?php

						}
					}
					else{

						$key_img_product='tri'.date("dmYhis").round(microtime() * 1000);

						?>  
						<li>
							<label class="label_content_add"><?php echo $info_content['product_img']; ?></label>
							<input name="txt_product_img[<?php echo $key_img_product; ?>]" id="txt_product_img_<?php echo $key_img_product; ?>" type="text" value="" class="input_text_add_browser" />
							<input onclick="BrowseServer('Images:/','txt_product_img_<?php echo $key_img_product; ?>')"  type="button" value="<?php echo $info_content['button_image']; ?>" class="input_button_img_browser" />
							&nbsp;&nbsp;
							<input type="checkbox" name="input_check_browser[<?php echo $key_img_product; ?>]" value="on" checked="checked"/>
						</li>
						<?php

					}

					?>
                    <li>
                        <p id="ajax_add_image_product" name_image="<?php echo $info_content['product_img']; ?>" name_button_image="<?php echo $info_content['button_image']; ?>"><?php echo $info_content['add_image_product'] ?></p>
                    </li>  
                </ul>
            </fieldset>

            <input type="hidden" id="hidden_input_menu_class" value="<?php echo $info_content['active_menu_class']; ?>"/> 

			<?php echo ($info_content['bool_active']['headline']) ? "<div style='clear:both;height:10px'>&nbsp;</div>" : "" ?>
            <fieldset class="fieldset_title_add" <?php echo ($info_content['bool_active']['headline']) ? "" : "style='display:none'" ?>>
                <legend><?php echo $info_content['product_headline']; ?></legend>

                <ul class="ul_content_add">
                    <li>
                        <label class="label_content_add"><?php echo $info_content['product_pattern']; ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="ajax_pattern_product_headline" id="ajax_pattern_product_headline" class="select_text_add">
							<?php echo ($info_content['action_name'] == 'update_product') ? "<option value='-2'>&nbsp;&nbsp;&nbsp;&#187;&nbsp;".$info_content['product_pattern_update']."</option>" : ""; ?>
                            <option value="-1">&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['product_pattern_select']; ?></option>
							<?php

							if(is_array($product_pattern)){

								foreach($product_pattern as $key=> $value){

									?>    
									<option value="<?php echo element('product_pattern_id',$value) ?>" <?php echo set_select('ajax_pattern_product_headline',element('product_pattern_id',$value)); ?>>&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('product_pattern_name',$value) ?></option>
									<?php

								}
							}

							?>
                        </select>
                    </li>

                    <li>
                        <div align="center">
                            <textarea name="txt_product_headline_ckeditor" id="txt_product_headline_ckeditor" ><?php echo set_value('txt_product_headline_ckeditor',($info_content['action_name'] == 'update_product') ? element('product_headline',$product,'') : ""); ?></textarea> 
							<?php config_ckeditor('txt_product_headline_ckeditor','product_headline','865','200') ?>
                        </div>
                    </li>
                </ul>
            </fieldset>

            <div style="clear:both;height:10px">&nbsp;</div>
            <fieldset class="fieldset_title_add">
                <legend><?php echo $info_content['product_content']; ?></legend>

                <ul class="ul_content_add">
                    <li>
                        <label class="label_content_add"><?php echo $info_content['product_pattern']; ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="ajax_pattern_product_content" id="ajax_pattern_product_content" class="select_text_add">
							<?php echo ($info_content['action_name'] == 'update_product') ? "<option value='-2'>&nbsp;&nbsp;&nbsp;&#187;&nbsp;".$info_content['product_pattern_update']."</option>" : ""; ?>
                            <option value="-1">&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['product_pattern_select']; ?></option>
							<?php

							if(is_array($product_pattern)){

								foreach($product_pattern as $key=> $value){

									?>    
									<option value="<?php echo element('product_pattern_id',$value) ?>" <?php echo set_select('ajax_pattern_product_content',element('product_pattern_id',$value)); ?>>&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('product_pattern_name',$value) ?></option>
									<?php

								}
							}

							?>
                        </select>
                    </li>

                    <li>
                        <div align="center">
                            <textarea name="txt_product_content_ckeditor" id="txt_product_content_ckeditor" ><?php echo set_value('txt_product_content_ckeditor',($info_content['action_name'] == 'update_product') ? element('product_content',$product,'') : ""); ?></textarea> 
							<?php config_ckeditor('txt_product_content_ckeditor','product_content','865','250') ?>
                        </div>
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
echo $this->session->flashdata('add_update_product');

?>