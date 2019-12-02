<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>
<script language="javascript">
	$(window).load(function(){

		$.ajax_captcha("#ajax_captcha_contact","captcha/contact/");
		$("#contact").ajax_captcha_click("#ajax_captcha_contact",'captcha/contact/');
	});
</script>

<div class="module_content">
    <div class="title_border_center">
        <div class="title_border_left">
            <div class="title_border_right">
                <h1><a class="homepage_page" title="<?php echo custom_htmlspecialchars($info_home['homepage_website']) ?>" href="<?php echo base_url(); ?>"><?php echo ($info_home['homepage_website'] != '') ? $info_home['homepage_website'] : $info_content['message_system_title']; ?></a></h1>
                <span class="arrow_page">&#187;</span>
                <h2><a class="title_page" title="<?php echo custom_htmlspecialchars($info_content['contact_index_title']) ?>" href="<?php echo current_url(); ?>"><?php echo $info_content['contact_index_title'] ?></a></h2>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div id="contact">
					<?php

					if(is_array($contact) && !empty($contact)){

						?>
						<div class="contact_article">
							<div class="contact_article_content">
								<?php echo element('news_content',$contact,'') ?>
							</div>
						</div>
						<?php

					}

					?>

                    <div class="contact_send">
                        <form name="form_contact" id="form_contact" action="" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend><?php echo $info_content['contact_index_info']; ?></legend>
                                <ul>
                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_company']; ?></label>
                                        <input type="text" value="" id="txt_contact_company" name="txt_contact_company" class="input_text_contact"/><?php echo form_error('txt_contact_company') ?>
                                    </li>

                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_email']; ?></label>
                                        <input type="text" value="" id="txt_contact_email" name="txt_contact_email" class="validate[required,custom[custom_email]] input_text_contact"/><?php echo form_error('txt_contact_email') ?>
                                    </li>

                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_name']; ?></label>
                                        <input type="text" value="" id="txt_contact_name" name="txt_contact_name" class="validate[required] input_text_contact"/><?php echo form_error('txt_contact_name') ?>
                                    </li>

                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_address']; ?></label>
                                        <input type="text" value="" id="txt_contact_address" name="txt_contact_address" class="validate[required] input_text_contact" /><?php echo form_error('txt_contact_address') ?>
                                    </li>

                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_phone']; ?></label>
                                        <input type="text" value="" id="txt_contact_phone" name="txt_contact_phone" class="validate[required,custom[custom_telephone]] input_text_contact" /><?php echo form_error('txt_contact_phone') ?>
                                    </li>

                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_header']; ?></label>
                                        <input type="text" value="" id="txt_contact_header" name="txt_contact_header" class="validate[required] input_text_contact" /><?php echo form_error('txt_contact_header') ?>
                                    </li>

                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_content']; ?></label>
                                        <textarea name="txt_contact_content" id="txt_contact_content" class="textarea_contact"></textarea><?php echo form_error('txt_contact_content') ?>
                                    </li>

                                    <li style="padding-top:20px">
                                        <label class="label_contact"><?php echo $info_content['contact_attachment']; ?></label>
                                        <input name="txt_contact_attachment" id="txt_contact_attachment" type="file" value="" class="input_text_contact"/>
                                    </li>

                                    <li class="contact_captcha">
                                        <label class="label_contact">&nbsp;</label>
                                        <input type="text" value="" id="txt_contact_captcha" placeholder="<?php echo $info_content['info_captcha_label']; ?>" name="txt_contact_captcha" class="validate[required] input_text_contact"/>
                                        <span id="ajax_captcha_contact"></span><?php echo form_error('txt_contact_captcha') ?>
                                    </li>

                                    <li class="contact_send_me">
                                        <label class="label_contact">&nbsp;</label>
                                        <label><input type="checkbox" value="1" name="contact_send_me" id="contact_send_me"/>
                                            &nbsp;&nbsp;<?php echo $info_content['contact_index_send_me'] ?></label>
                                    </li>

                                    <li>
                                        <label class="label_contact">&nbsp;</label>
                                        <a class="button_contact" id="submit_form_contact"><?php echo $info_content['contact_index_send'] ?></a>
                                    </li>
                                </ul>
                            </fieldset>
                            <input type="hidden" name="action_form" value="submit_contact" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom_border_center">
        <div class="bottom_border_left">
            <div class="bottom_border_right">&nbsp;</div>
        </div>
    </div>

</div>
<?php

echo $this->session->flashdata('submit_contact');

?>