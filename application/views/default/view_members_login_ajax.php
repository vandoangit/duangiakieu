<?php
/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 09-09-2014
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<div class="member_login_ajax">
    <?php
    if($members_login === false){
        ?>
        <div class="box_member_logged">
            <div class="item_member_logged">
                <label class="label_member_logged"><?php echo $info_content['members_module_welcome'];?></label>
                <span class="welcome_member"><?php echo element("user_name",$user,"");?></span>
            </div>

            <div class="item_member_logged">
                <span class="update_member"><a id="member_update_ajax" title="<?php echo $info_content['members_module_update_profile'];?>"><?php echo $info_content['members_module_update_profile'];?></a></span>
            </div>
            <div class="item_member_logged">
                <span class="order_member"><a href="#" title="<?php echo $info_content['members_module_view_order'];?>"><?php echo $info_content['members_module_view_order'];?></a></span>
            </div>

            <div class="item_member_logged">
                <span class="logout_member"><a id="button_member_logout" title="<?php echo $info_content['members_module_logout'];?>"><?php echo $info_content['members_module_logout'];?></a></span>
            </div>
        </div>
        <?php
    }
    else{
        ?>
        <div class="box_member_login">
            <form id="form_member_login_ajax" name="form_member_login_ajax" method="post">
                <fieldset>
                    <label class="label_member_login"><?php echo $info_content['members_module_account'];?></label>
                    <input type="text" name="txt_account_login" id="txt_account_login" value="" placeholder="<?php echo $info_content['members_module_account'];?>" autocomplete="off" class="input_member_login" />
                </fieldset>

                <fieldset>
                    <label class="label_member_login"><?php echo $info_content['members_module_pass'];?></label>
                    <input type="password" name="txt_password_login" id="txt_password_login" value="" placeholder="<?php echo $info_content['members_module_pass'];?>" autocomplete="off" class="input_member_login" />
                </fieldset>

                <div class="label_message_login">
                    <?php
                    if($members_login !== true)
                        echo $members_login;
                    ?>
                </div>

                <div class="submit_member_login" id="submit_member_login_ajax"><?php echo $info_content['members_module_button_login'];?></div>

                <div class="label_forgot_password"><a href="#" title="<?php echo $info_content['members_module_forgot'];?>"><?php echo $info_content['members_module_forgot'];?></a></div>

                <div class="label_register_member"><a href="<?php echo base_url()."members/register/"?>" title="<?php echo $info_content['members_module_register'];?>"><?php echo $info_content['members_module_register'];?></a></div>
            </form>
        </div>
        <?php
    }
    ?>
</div>