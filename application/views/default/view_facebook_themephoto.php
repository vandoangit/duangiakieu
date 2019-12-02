<?php
/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 07-10-2014
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

echo card_load_object();
echo card_load_js_main('vi');
echo card_load_js_setting('card_setting_facebook_themephoto');
?>

<div class="module_content">
    <div class="title_border_center">
        <div class="title_border_left">
            <div class="title_border_right">
                <a  title="<?php echo custom_htmlspecialchars($info_content['facebook_themephoto_title'])?>" href="<?php echo current_url()."/";?>"><?php echo $info_content['facebook_themephoto_title']?></a>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">

                <div id="card_facebook" class="card-message">
                    <div class="card-response-output"></div>
                </div>

                <div class="facebook_themeform">
                    <div class="content_facebook_themeform">
                        <ul>
                            <li>
                                <label class="label_facebook_themeform"><?php echo $info_content['card_barcode'];?></label>
                                <input name="txt_card_barcode" id="txt_card_barcode" type="text" value="" class="card_no_clear card_no_readonly input_text_facebook_themeform"/>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="directory_photo">
                    <div id="directory_photo_active" class="card_directory_photo_active">
                        <img src="<?php echo base_src_img("Images/facebook/bg_webcam_facebook.jpg");?>" />
                    </div>

                    <div id="directory_photo_facebook" class="card_directory_photo" directory_url="">

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