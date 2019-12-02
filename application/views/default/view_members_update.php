<?php
/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 08-09-2014
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<div class="module_content">
    <div class="title_border_center">
        <div class="title_border_left">
            <div class="title_border_right">
                <a title="<?php echo custom_htmlspecialchars($info_content['info_user_update']);?>" href="<?php echo current_url()."/";?>"><?php echo $info_content['info_user_update'];?></a>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div class="member_update">
                    <form action="" method="post" name="form_member_update" id="form_member_update">

                        <input type="hidden" name="action_form" id="action_form" value="<?php echo $info_content['action_name'];?>" />

                        <div class="title_member_update"><?php echo $info_content['info_user_account'];?></div>
                        <div class="content_member_update">
                            <ul>
                                <li>
                                    <label class="label_content_update"><?php echo $info_content['user_account'];?></label>
                                    <input name="txt_user_account" id="txt_user_account" type="text" value="<?php echo set_value('txt_user_account',element('user_account',$user,''));?>" class="member_no_clear input_text_update" autocomplete="off" readonly="readonly" style="border:0px;font-weight:bold;font-size:14px;background:none;cursor:default" />
                                </li>

                                <li>
                                    <label class="label_content_update"><?php echo $info_content['user_pass'];?></label>
                                    <input name="txt_user_pass" id="txt_user_pass" type="password" value="" class="validate[custom[custom_pass_require]] input_text_update" autocomplete="off" /><?php echo form_error('txt_user_pass')?>
                                </li>

                                <li>
                                    <label class="label_content_update"><?php echo $info_content['confirm_user_pass'];?></label>
                                    <input name="txt_confirm_user_pass" id="txt_confirm_user_pass" type="password" value="" class="validate[custom[custom_pass_require],confirm[txt_user_pass,<?php echo $info_content['message_confirm'];?>]] input_text_update" autocomplete="off" /><?php echo form_error('txt_confirm_user_pass')?>
                                </li>

                                <li>
                                    <label class="label_content_update"><?php echo $info_content['user_email'];?></label>
                                    <input name="txt_email" id="txt_email" type="text" value="<?php echo set_value('txt_email',element('user_email',$user,''));?>" class="validate[custom[custom_email]] input_text_update"/><?php echo form_error('txt_email')?>
                                </li>
                            </ul>
                        </div>

                        <div class="title_member_update"><?php echo $info_content['info_user_member'];?></div>
                        <div class="content_member_update">
                            <ul>
                                <li>
                                    <label class="label_content_update"><?php echo $info_content['user_name'];?></label>
                                    <input name="txt_user_name" id="txt_user_name" type="text" value="<?php echo set_value('txt_user_name',element('user_name',$user,''));?>" class="validate[custom_vi[custom_vi_user_name]] input_text_update"/><?php echo form_error('txt_user_name')?>
                                </li>

                                <li>
                                    <label class="label_content_update"><?php echo $info_content['user_birthday'];?></label>
                                    <input name="txt_user_birthday" id="txt_user_birthday" type="text" value="<?php echo set_value('txt_user_birthday',date('d-m-Y',strtotime(element('user_birthday',$user,''))));?>" class="validate[custom[custom_date]] input_datepicker input_text_update"/><?php echo form_error('txt_user_birthday')?>
                                </li>

                                <li>
                                    <label class="label_content_update"><?php echo $info_content['user_gender'];?></label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label><input name="txt_user_gender" id="txt_user_gender1" type="radio" value="1" <?php echo set_radio('txt_user_gender','1',(element('user_gender',$user,'') == 1) ? true : false);?> />&nbsp;&nbsp;&nbsp;<?php echo $info_content['user_male'];?></label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label><input name="txt_user_gender" id="txt_user_gender2" type="radio" value="0" <?php echo set_radio('txt_user_gender','0',(element('user_gender',$user,'') == 0) ? true : false);?> />&nbsp;&nbsp;&nbsp;<?php echo $info_content['user_female'];?></label>
                                </li>

                                <li>
                                    <label class="label_content_update"><?php echo $info_content['user_address'];?></label>
                                    <input name="txt_user_address" id="txt_user_address" type="text" value="<?php echo set_value('txt_user_address',element('user_address',$user,''));?>" class="validate[required] input_text_update"/><?php echo form_error('txt_user_address')?>
                                </li>

                                <li>
                                    <label class="label_content_update"><?php echo $info_content['user_phone'];?></label>
                                    <input name="txt_user_phone" id="txt_user_phone" type="text" value="<?php echo set_value('txt_user_phone',element('user_phone',$user,''));?>" class="validate[required,custom[custom_telephone]] input_text_update"/><?php echo form_error('txt_user_phone')?>
                                </li>

                                <li style="display:none;">
                                    <label class="label_content_update"><?php echo $info_content['user_img'];?></label>
                                    <input name="txt_user_img" id="txt_user_img" type="text" value="<?php echo set_value('txt_user_img',element('user_img',$user,''));?>" class="input_text_update_browser" />
                                    <input type="button" class="input_button_browser"  onclick="BrowseServer('Images:/','txt_user_img')" value="<?php echo $info_content['button_image'];?>" />
                                    <input type="checkbox" name="input_check_browser" id="input_check_browser" value="on" checked="checked"/>
                                </li>

                                <li>
                                    <label class="label_content_update"><?php echo $info_content['user_web'];?></label>
                                    <input name="txt_user_web" id="txt_user_web" type="text" value="<?php echo set_value('txt_user_web',element('user_web',$user,''));?>" class="input_text_update"/><?php echo form_error('txt_user_web')?>
                                </li>

                                <li>
                                    <label class="label_content_update"><?php echo $info_content['user_fax'];?></label>
                                    <input name="txt_user_fax" id="txt_user_fax" type="text" value="<?php echo set_value('txt_user_fax',element('user_fax',$user,''));?>" class="validate[custom[custom_onlyNumber]] input_text_update"/><?php echo form_error('txt_user_fax')?>
                                </li>

                                <li class="member_update_captcha">
                                    <label class="label_content_update">&nbsp;</label>
                                    <input type="text" value="" placeholder="<?php echo $info_content['info_captcha_label'];?>" id="txt_member_update_captcha" name="txt_member_update_captcha" class="validate[required] input_text_update"/>
                                    <span id="ajax_captcha_member_update"></span><?php echo form_error('txt_member_update_captcha')?>
                                </li>
                            </ul>
                        </div>

                        <div class="button_member_update">
                            <div class="body_button_member_update">
                                <a id="submit_member_update" class="button" title="<?php echo $info_content['button_member_update'];?>"><?php echo $info_content['button_member_update'];?></a>
                                <a id="button_reset_update" class="button" title="<?php echo $info_content['button_member_reset'];?>"><?php echo $info_content['button_member_reset'];?></a>
                            </div>
                        </div>
                    </form>
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