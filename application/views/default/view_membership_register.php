<?php
/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 01-10-2014
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<div class="module_content">
    <div class="title_border_center">
        <div class="title_border_left">
            <div class="title_border_right">
                <a title="<?php echo custom_htmlspecialchars($info_content['info_membership_register']);?>" href="<?php echo current_url()."/";?>"><?php echo $info_content['info_membership_register'];?></a>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div class="membership_register">
                    <form action="" method="post" name="form_membership_register" id="form_membership_register">

                        <input type="hidden" name="action_form" id="action_form" value="<?php echo $info_content['action_name'];?>" />

                        <div class="title_membership_register"><?php echo $info_content['info_membership_register'];?></div>
                        <div class="content_membership_register">
                            <ul>
                                <li>
                                    <label class="label_content_register"><?php echo $info_content['membership_email'];?></label>
                                    <input name="txt_membership_email" id="txt_membership_email" type="text" value="<?php echo set_value('txt_membership_email','');?>" class="validate[custom[custom_email]] input_text_register"/><?php echo form_error('txt_membership_email');?>
                                </li>

                                <li>
                                    <label class="label_content_register"><?php echo $info_content['membership_name'];?></label>
                                    <input name="txt_membership_name" id="txt_membership_name" type="text" value="<?php echo set_value('txt_membership_name','');?>" class="validate[custom_vi[custom_vi_user_name]] input_text_register"/><?php echo form_error('txt_membership_name');?>
                                </li>

                                <li>
                                    <label class="label_content_register"><?php echo $info_content['membership_birthday'];?></label>
                                    <input name="txt_membership_birthday" id="txt_membership_birthday" type="text" value="<?php echo set_value('txt_membership_birthday',date("d-m-Y"));?>" class="validate[custom[custom_date]] input_datepicker input_text_register"/><?php echo form_error('txt_membership_birthday');?>
                                </li>

                                <li>
                                    <label class="label_content_register"><?php echo $info_content['membership_gender'];?></label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label><input name="txt_membership_gender" id="txt_membership_gender1" type="radio" value="1" <?php echo set_radio('txt_membership_gender','1',true);?> />&nbsp;&nbsp;&nbsp;<?php echo $info_content['user_male'];?></label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label><input name="txt_membership_gender" id="txt_membership_gender2" type="radio" value="0" <?php echo set_radio('txt_membership_gender','0',false);?> />&nbsp;&nbsp;&nbsp;<?php echo $info_content['user_female'];?></label>
                                </li>

                                <li>
                                    <label class="label_content_register"><?php echo $info_content['membership_address'];?></label>
                                    <input name="txt_membership_address" id="txt_membership_address" type="text" value="<?php echo set_value('txt_membership_address','');?>" class="input_text_register"/><?php echo form_error('txt_membership_address');?>
                                </li>

                                <li>
                                    <label class="label_content_register"><?php echo $info_content['membership_phone'];?></label>
                                    <input name="txt_membership_phone" id="txt_membership_phone" type="text" value="<?php echo set_value('txt_membership_phone','');?>" class="validate[required,custom[custom_telephone]] input_text_register"/><?php echo form_error('txt_membership_phone');?>
                                </li>

                                <li>
                                    <label class="label_content_register"><?php echo $info_content['career_category'];?></label>
                                    <select name="txt_career_category" id="txt_career_category" class="validate[custom_select[-1]] select_text_register">
                                        <option value="-1"><?php echo "&nbsp;&nbsp;&nbsp;".$info_content['option_select'];?></option>
                                        <?php
                                        if(is_array($career) && !empty($career)){

                                            foreach($career as $key=> $value){
                                                ?>
                                                <option value="<?php echo element('career_name',$value,'');?>" <?php echo set_select('txt_career_category',element('career_name',$value,''),false);?>>&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('career_name',$value,'');?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select><?php echo form_error('txt_career_category')?>
                                </li>

                                <li>
                                    <label class="label_content_register"><?php echo $info_content['province_category'];?></label>
                                    <select name="txt_province_category" id="txt_province_category" class="validate[custom_select[-1]] select_text_register">
                                        <option value="-1"><?php echo "&nbsp;&nbsp;&nbsp;".$info_content['option_select'];?></option>
                                        <?php
                                        if(is_array($province) && !empty($province)){

                                            foreach($province as $key=> $value){
                                                ?>
                                                <option value="<?php echo element('province_id',$value,'');?>" <?php echo set_select('txt_province_category',element('province_id',$value,''),false);?>>&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('province_name',$value,'');?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select><?php echo form_error('txt_province_category')?>
                                </li>

                                <li class="remove_district">
                                    <label class="label_content_register"><?php echo $info_content['district_category'];?></label>
                                    <select name="txt_district_category" id="txt_district_category" class="validate[custom_select[-1]] select_text_register">
                                        <option value="-1"><?php echo "&nbsp;&nbsp;&nbsp;".$info_content['option_select'];?></option>
                                    </select>
                                </li>

                                <li class="membership_register_captcha">
                                    <label class="label_content_register">&nbsp;</label>
                                    <input type="text" value="" placeholder="<?php echo $info_content['info_captcha_label'];?>" id="txt_membership_register_captcha" name="txt_membership_register_captcha" class="validate[required] input_text_register"/>
                                    <span id="ajax_captcha_membership_register"></span><?php echo form_error('txt_membership_register_captcha')?>
                                </li>
                            </ul>
                        </div>

                        <div class="button_membership_register">
                            <div class="body_button_membership_register">
                                <a id="submit_membership_register" class="button" title="<?php echo $info_content['button_membership_register'];?>"><?php echo $info_content['button_membership_register'];?></a>
                                <a id="button_reset_membership" class="button" title="<?php echo $info_content['button_membership_reset'];?>"><?php echo $info_content['button_membership_reset'];?></a>
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