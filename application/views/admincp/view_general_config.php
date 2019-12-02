<?php

/* * *****************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ***************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>
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
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save']; ?>"><?php echo $info_content['action_save']; ?></a>
            </div>
        </div>
    </div>
    <div class="content_admin_body_add">
		<form action="" method="post" name="form_add_content" id="form_add_content">
			<fieldset class="fieldset_title_add">
				<legend><?php echo $title_function; ?></legend>

				<div align="center" class="config_general_page">
					<table cellspacing="0px" cellpadding="0px">

						<tr class="seo_title">
							<td width="160"><div align="center"><?php echo $info_content['title_seo']; ?></div></td>
							<td width="705"><div align="center"><?php echo $info_content['content_seo']; ?></div></td>
						</tr>

						<tr class="seo_content">
							<td><div align="center"><?php echo $info_content['title_web']; ?></div></td>
							<td>
								<div align="left"><input type="text" name="txt_seo_title" id="txt_seo_title" value="<?php echo set_value('txt_seo_title',element('title_web',$seo_config,'')) ?>" class="validate[required] input_seo_key"/><?php echo form_error('txt_seo_title') ?></div>
							</td>
						</tr>

						<tr class="seo_content">
							<td ><div align="center"><?php echo $info_content['keyword_web']; ?></div></td>
							<td>
								<div align="left"><input type="text" name="txt_seo_keyword" id="txt_seo_keyword" value="<?php echo set_value('txt_seo_keyword',element('keyword_web',$seo_config,'')); ?>" class="validate[required] input_seo_key"/><?php echo form_error('txt_seo_keyword') ?></div>
							</td>
						</tr>

						<tr class="seo_content">
							<td ><div align="center"><?php echo $info_content['description_web']; ?></div></td>
							<td>
								<div align="left"><input type="text" name="txt_seo_description" id="txt_seo_description" value="<?php echo set_value('txt_seo_description',element('description_web',$seo_config,'')); ?>" class="validate[required] input_seo_key"/><?php echo form_error('txt_seo_description') ?></div>
							</td>
						</tr>

						<tr class="seo_title">
							<td ><div align="center"><?php echo $info_content['title_page']; ?></div></td>
							<td><div align="center"><?php echo $info_content['content_page']; ?></div></td>
						</tr>

						<tr class="seo_content">
							<td ><div align="center"><?php echo $info_content['product_page']; ?></div></td>
							<td>
								<div align="left"><input type="text" name="txt_product_page" id="txt_product_page" value="<?php echo set_value('txt_product_page',element('product_page',$page_config,'')); ?>" class="validate[required,custom[custom_onlyNumber]] input_seo_key"/><?php echo form_error('txt_product_page') ?></div>
							</td>
						</tr>

						<tr class="seo_content">
							<td ><div align="center"><?php echo $info_content['search_product_page']; ?></div></td>
							<td>
								<div align="left"><input type="text" name="txt_search_product_page" id="txt_search_product_page" value="<?php echo set_value('txt_search_product_page',element('search_product_page',$page_config,'')); ?>" class="validate[required,custom[custom_onlyNumber]] input_seo_key"/><?php echo form_error('txt_search_product_page') ?></div>
							</td>
						</tr>

						<tr class="seo_content"> 	 	 	 	
							<td><div align="center"><?php echo $info_content['news_page']; ?></div></td>
							<td>
								<div align="left"><input type="text" name="txt_news_page" id="txt_news_page" value="<?php echo set_value('txt_news_page',element('news_page',$page_config,'')); ?>" class="validate[required,custom[custom_onlyNumber]] input_seo_key"/><?php echo form_error('txt_news_page') ?></div>
							</td>
						</tr>

						<tr class="seo_title">
							<td colspan="2"><div align="center"><?php echo $info_content['content_facebook']; ?></div></td>
						</tr>

						<tr class="seo_content">
							<td ><div align="center"><?php echo $info_content['facebook_user_id']; ?></div></td>
							<td>
								<div align="left"><input type="text" name="txt_facebook_user_id" id="txt_facebook_user_id" value="<?php echo set_value('txt_facebook_user_id',element('facebook_user_id',$facebook_config,'')); ?>" class="input_seo_key"/><?php echo form_error('txt_facebook_user_id') ?></div>
							</td>
						</tr>

						<tr class="seo_content">
							<td ><div align="center"><?php echo $info_content['facebook_fanpage']; ?></div></td>
							<td>
								<div align="left"><input type="text" name="txt_facebook_fanpage" id="txt_facebook_fanpage" value="<?php echo set_value('txt_facebook_fanpage',element('facebook_fanpage',$facebook_config,'')); ?>" class="input_seo_key"/><?php echo form_error('txt_facebook_fanpage') ?></div>
							</td>
						</tr>

						<tr class="seo_title">
							<td colspan="2"><div align="center"><?php echo $info_content['content_static']; ?></div></td>
						</tr>

						<tr class="seo_content"> 	 	 	 	
							<td><div align="center"><?php echo $info_content['static_online_virtual']; ?></div></td>
							<td>
								<div align="left"><input type="text" name="txt_static_online_virtual" id="txt_static_online_virtual" value="<?php echo set_value('txt_static_online_virtual',element('static_online_virtual',$static_config,'')); ?>" class="validate[required,custom[custom_onlyNumber]] input_seo_key"/><?php echo form_error('txt_static_online_virtual') ?></div>
							</td>
						</tr>

						<tr class="seo_content"> 	 	 	 	
							<td><div align="center"><?php echo $info_content['static_count_virtual']; ?></div></td>
							<td>
								<div align="left"><input type="text" name="txt_static_count_virtual" id="txt_static_count_virtual" value="<?php echo set_value('txt_static_count_virtual',element('static_count_virtual',$static_config,'')); ?>" class="validate[required,custom[custom_onlyNumber]] input_seo_key"/><?php echo form_error('txt_static_count_virtual') ?></div>
							</td>
						</tr>

						<tr class="seo_title">
							<td colspan="2"><div align="center"><?php echo $info_content['footer_front_end']; ?></div></td>
						</tr>

						<tr class="seo_content"> 	 	 	 	
							<td colspan="2" style="border:0px;padding:0px">
								<textarea name="txt_footer_front_end" id="txt_footer_front_end" ><?php echo set_value('txt_footer_front_end',element('footer_front_end',$seo_config,'')); ?></textarea> 
								<?php config_ckeditor('txt_footer_front_end','custom_basic',870) ?>
							</td>
						</tr>

					</table>
				</div>

			</fieldset>
			<input type="hidden" name="action_form" value="config_general_page" />
		</form>
    </div>
    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save']; ?>"><?php echo $info_content['action_save']; ?></a>
            </div>
        </div>
    </div>
</div>
<?php

echo $info_content['message_session_flash'];
echo $this->session->flashdata('site_config');

?>   