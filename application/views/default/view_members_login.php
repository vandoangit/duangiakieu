<?php
/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 05-11-2014
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

if($members_login === false){

    $arr_url=array(
        base_url()."members/",
        base_url()."members",
        base_url()."login/",
        base_url()."login",
        base_url()."members/login/",
        base_url()."members/login"
    );

    redirect(base_url()."introduce/",'refresh');
    exit();

    if(isset($_SERVER["HTTP_REFERER"]) && !in_array($_SERVER["HTTP_REFERER"],$arr_url) && url_exists($_SERVER["HTTP_REFERER"],$_COOKIE))
        redirect($_SERVER["HTTP_REFERER"],'refresh');
    else
        redirect(base_url(),'refresh');
}
?>

<div class="module_content">
    <div class="title_border_center">
        <div class="title_border_left">
            <div class="title_border_right">
                <a title="<?php echo custom_htmlspecialchars($info_content['members_module_title']);?>" href="<?php echo current_url()."/";?>"><?php echo $info_content['members_module_title'];?></a>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div class="layout_member_login">
                    <div class="member_login_left">
                        <?php echo element('news_content',$newslogin,'&nbsp;')?>
                    </div>

                    <div class="member_login_right">

                        <div class="layout_member_login_title"><?php echo $info_content['members_module_button_login'];?></div>

                        <?php
                        if($members_login !== true && $members_login != ""){

                            echo "<div class='label_layout_message_login'>";
                            echo $members_login;
                            echo "</div>";
                        }
                        ?>

                        <form id="form_layout_member_login" name="form_layout_member_login" method="post">

                            <input type="hidden" name="submit_form" value="" />

                            <fieldset>
                                <label class="label_layout_member_login"><?php echo $info_content['members_module_account'];?></label>
                                <input type="text" name="txt_account_login" id="txt_account_login" value="" placeholder="<?php echo $info_content['members_module_account'];?>" autocomplete="off" class="input_layout_member_login" />
                            </fieldset>

                            <fieldset>
                                <label class="label_layout_member_login"><?php echo $info_content['members_module_pass'];?></label>
                                <input type="password" name="txt_password_login" id="txt_password_login" value="" placeholder="<?php echo $info_content['members_module_pass'];?>" autocomplete="off" class="input_layout_member_login" />
                            </fieldset>

                            <div class="submit_layout_member_login" id="submit_layout_member_login"><?php echo $info_content['members_module_button_login'];?></div>

                            <div class="layout_member_login_line">&nbsp;</div>

                            <div class="label_forgot_password"><a href="#" title="<?php echo $info_content['members_module_forgot'];?>"><?php echo $info_content['members_module_forgot'];?></a></div>

                            <div class="label_register_member"><a href="<?php echo base_url()."members/register/"?>" title="<?php echo $info_content['members_module_register'];?>"><?php echo $info_content['members_module_register'];?></a></div>
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