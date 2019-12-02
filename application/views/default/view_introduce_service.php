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

		$.ajax_captcha("#ajax_captcha_service","captcha/contact/");
		$("#contact").ajax_captcha_click("#ajax_captcha_service",'captcha/contact/');
	});
</script>

<div class="module_content">
    <div class="title_border_center">
        <div class="title_border_left">
            <div class="title_border_right">
                <h1><a class="homepage_page" title="<?php echo custom_htmlspecialchars($info_home['homepage_website']) ?>" href="<?php echo base_url(); ?>"><?php echo ($info_home['homepage_website'] != '') ? $info_home['homepage_website'] : $info_content['message_system_title']; ?></a></h1>
                <span class="arrow_page">&#187;</span>
                <h2><a class="title_page" title="<?php echo custom_htmlspecialchars($info_content['introduce_service_title']) ?>" href="<?php echo current_url(); ?>"><?php echo $info_content['introduce_service_title'] ?></a></h2>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div id="contact">
					<?php

					if(is_array($service) && !empty($service)){

						?>
						<div class="contact_article">
							<div class="contact_article_content">
						<?php echo element('news_content',$service,'') ?>
							</div>
						</div>
	<?php

}

?>

                    <div class="contact_send">
                        <form name="form_service" id="form_service" action="" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend><?php echo $info_content['contact_index_info']; ?></legend>
                                <ul>
                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_company']; ?></label>
                                        <input type="text" value="" id="txt_service_company" name="txt_service_company" class="input_text_contact"/><?php echo form_error('txt_service_company') ?>
                                    </li>

                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_email']; ?></label>
                                        <input type="text" value="" id="txt_service_email" name="txt_service_email" class="validate[required,custom[custom_email]] input_text_contact"/><?php echo form_error('txt_service_email') ?>
                                    </li>

                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_name']; ?></label>
                                        <input type="text" value="" id="txt_service_name" name="txt_service_name" class="validate[required] input_text_contact"/><?php echo form_error('txt_service_name') ?>
                                    </li>

                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_address']; ?></label>
                                        <input type="text" value="" id="txt_service_address" name="txt_service_address" class="validate[required] input_text_contact" /><?php echo form_error('txt_service_address') ?>
                                    </li>

                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_phone']; ?></label>
                                        <input type="text" value="" id="txt_service_phone" name="txt_service_phone" class="validate[required,custom[custom_telephone]] input_text_contact" /><?php echo form_error('txt_service_phone') ?>
                                    </li>

                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_header']; ?></label>
                                        <input type="text" value="" id="txt_service_header" name="txt_service_header" class="validate[required] input_text_contact" /><?php echo form_error('txt_service_header') ?>
                                    </li>

                                    <li>
                                        <label class="label_contact"><?php echo $info_content['contact_content']; ?></label>
                                        <textarea name="txt_service_content" id="txt_service_content" class="textarea_contact"></textarea><?php echo form_error('txt_service_content') ?>
                                    </li>

                                    <li style="padding-top:20px">
                                        <label class="label_contact"><?php echo $info_content['contact_attachment']; ?></label>
                                        <input name="txt_service_attachment" id="txt_service_attachment" type="file" value="" class="input_text_contact"/>
                                    </li>

                                    <li class="contact_captcha">
                                        <label class="label_contact">&nbsp;</label>
                                        <input type="text" value="" id="txt_service_captcha" placeholder="<?php echo $info_content['info_captcha_label']; ?>" name="txt_service_captcha" class="validate[required] input_text_contact"/>
                                        <span id="ajax_captcha_service"></span><?php echo form_error('txt_service_captcha') ?>
                                    </li>

                                    <li class="contact_send_me">
                                        <label class="label_contact">&nbsp;</label>
                                        <label><input type="checkbox" value="1" name="service_send_me" id="service_send_me"/>
                                            &nbsp;&nbsp;<?php echo $info_content['contact_index_send_me'] ?></label>
                                    </li>

                                    <li>
                                        <label class="label_contact">&nbsp;</label>
                                        <a class="button_contact" id="submit_form_service"><?php echo $info_content['contact_index_send'] ?></a>
                                    </li>
                                </ul>
                            </fieldset>
                            <input type="hidden" name="action_form" value="submit_service" />
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

echo $this->session->flashdata('submit_service');

?>