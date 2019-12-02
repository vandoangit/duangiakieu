<?php
/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<div id="content">
    <div class="title_admin_body">
        <div class="title_admin_body_left">
            <div class="title_admin_body_right">
                <?php echo $title_function;?>
            </div>
        </div>
    </div>

    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                <?php echo ($authorization['control']) ? "<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['control'],false)."/".element('sub_menu_function',$sub_menu['control'],false)."'>".$info_content['action_back']."</a>" : ""?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save'];?>"><?php echo $info_content['action_save'];?></a>
            </div>
        </div>
    </div>

    <div class="content_admin_body_add">
        <form action="" method="post" name="form_add_content" id="form_add_content">

            <fieldset class="fieldset_title_add">
                <legend><?php echo $info_content['info_facebook'];?></legend>
                <ul class="ul_content_add_user">
                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_name'];?></label>
                        <input name="txt_facebook_name" id="txt_facebook_name" type="text" value="<?php echo set_value('txt_facebook_name',($info_content['action_name'] == 'update_facebook') ? element('facebook_name',$facebook,'') : "");?>" class="validate[required] input_text_add" /><?php echo form_error('txt_facebook_name');?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_user'];?></label>
                        <input name="txt_facebook_user" id="txt_facebook_user" type="text" value="<?php echo set_value('txt_facebook_user',($info_content['action_name'] == 'update_facebook') ? element('facebook_user',$facebook,'') : "");?>" class="validate[custom[custom_account],ajax[ajaxAccountUserExist]] input_text_add" /><?php echo form_error('txt_facebook_user');?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_theme'];?></label>
                        <select name="txt_facebook_theme" id="txt_facebook_theme" class="validate[custom_select[-1]] select_text_add">
                            <option value="-1"><?php echo "&nbsp;&nbsp;&nbsp;".$info_content['option_select'];?></option>
                            <?php
                            if(is_array($facebook_theme) && !empty($facebook_theme)){
                                ?>
                                <?php
                                foreach($facebook_theme as $key=> $value){
                                    ?>
                                    <option value="<?php echo element('facebook_theme_id',$value,'');?>" <?php echo set_select('txt_facebook_theme',element('facebook_theme_id',$value,''),(($info_content['action_name'] == 'update_facebook') && (element('facebook_theme',$facebook,'') == element('facebook_theme_id',$value,''))) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('facebook_theme_name',$value,'');?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_public'];?></label>
                        <select name="txt_facebook_public" id="txt_facebook_public" class="select_text_add">
                            <option value="1" <?php echo set_select('txt_facebook_public','1',(($info_content['action_name'] == 'update_facebook') && (element('facebook_public',$facebook,'') == 1)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_public'];?></option>
                            <option value="0" <?php echo set_select('txt_facebook_public','0',(($info_content['action_name'] == 'update_facebook') && (element('facebook_public',$facebook,'') == 0)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_hidden'];?></option>
                        </select>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_order'];?></label>
                        <input name="txt_facebook_order" id="txt_facebook_order" type="text" value="<?php echo set_value('txt_facebook_order',($info_content['action_name'] == 'update_facebook') ? element('facebook_order',$facebook,'') : "");?>" class="validate[required,custom[custom_onlyNumber]] input_text_add" /><?php echo form_error('txt_facebook_order')?>
                    </li>
                </ul>
            </fieldset><br/>

            <fieldset class="fieldset_title_add">
                <legend><?php echo $info_content['facebook_post_bool'];?></legend>
                <ul class="ul_content_add_user">
                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_post_bool'];?></label>
                        <select name="txt_facebook_post_bool" id="txt_facebook_post_bool" class="select_text_add">
                            <option value="0" <?php echo set_select('txt_facebook_post_bool','0',(($info_content['action_name'] == 'update_facebook') && (element('facebook_post_bool',$facebook,'') == 0)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_inactive'];?></option>
                            <option value="1" <?php echo set_select('txt_facebook_post_bool','1',(($info_content['action_name'] == 'update_facebook') && (element('facebook_post_bool',$facebook,'') == 1)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_active'];?></option>
                        </select>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_post_message'];?></label>
                        <textarea cols="55" rows="10" name="txt_facebook_post_message" id="txt_facebook_post_message"><?php echo set_value('txt_facebook_post_message',($info_content['action_name'] == 'update_facebook') ? element('facebook_post_message',$facebook,'') : "");?></textarea><?php echo form_error('txt_facebook_post_message');?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_post_url'];?></label>
                        <input name="txt_facebook_post_url" id="txt_facebook_post_url" type="text" value="<?php echo set_value('txt_facebook_post_url',($info_content['action_name'] == 'update_facebook') ? element('facebook_post_url',$facebook,'') : "");?>" class="input_text_add" /><?php echo form_error('txt_facebook_post_url');?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_post_title'];?></label>
                        <input name="txt_facebook_post_title" id="txt_facebook_post_title" type="text" value="<?php echo set_value('txt_facebook_post_title',($info_content['action_name'] == 'update_facebook') ? element('facebook_post_title',$facebook,'') : "");?>" class="input_text_add" /><?php echo form_error('txt_facebook_post_title');?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_post_summary'];?></label>
                        <textarea cols="55" rows="10" name="txt_facebook_post_summary" id="txt_facebook_post_summary"><?php echo set_value('txt_facebook_post_summary',($info_content['action_name'] == 'update_facebook') ? element('facebook_post_summary',$facebook,'') : "");?></textarea><?php echo form_error('txt_facebook_post_summary');?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_post_image'];?></label>
                        <input name="txt_facebook_post_image" id="txt_facebook_post_image" type="text" value="<?php echo set_value('txt_facebook_post_image',($info_content['action_name'] == 'update_facebook') ? element('facebook_post_image',$facebook,'') : "");?>" class="input_text_add_browser"/>
                        <input type="button" class="input_button_img_browser"  onclick="BrowseServer('Images:/','txt_facebook_post_image')" value="<?php echo $info_content['button_image'];?>" />
                        &nbsp;&nbsp;
                        <input type="checkbox" name="input_check_browser_post" value="on" checked="checked"/>
                    </li>

                </ul>
            </fieldset><br/>

            <fieldset class="fieldset_title_add">
                <legend><?php echo $info_content['facebook_friend_bool'];?></legend>
                <ul class="ul_content_add_user">
                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_friend_bool'];?></label>
                        <select name="txt_facebook_friend_bool" id="txt_facebook_friend_bool" class="select_text_add">
                            <option value="0" <?php echo set_select('txt_facebook_friend_bool','0',(($info_content['action_name'] == 'update_facebook') && (element('facebook_friend_bool',$facebook,'') == 0)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_inactive'];?></option>
                            <option value="1" <?php echo set_select('txt_facebook_friend_bool','1',(($info_content['action_name'] == 'update_facebook') && (element('facebook_friend_bool',$facebook,'') == 1)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_active'];?></option>
                        </select>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_friend_id'];?></label>
                        <input name="txt_facebook_friend_id" id="txt_facebook_friend_id" type="text" value="<?php echo set_value('txt_facebook_friend_id',($info_content['action_name'] == 'update_facebook') ? element('facebook_friend_id',$facebook,'') : "");?>" class="input_text_add" /><?php echo form_error('txt_facebook_friend_id');?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_friend_message'];?></label>
                        <textarea cols="55" rows="10" name="txt_facebook_friend_message" id="txt_facebook_friend_message"><?php echo set_value('txt_facebook_friend_message',($info_content['action_name'] == 'update_facebook') ? element('facebook_friend_message',$facebook,'') : "");?></textarea><?php echo form_error('txt_facebook_friend_message');?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_friend_url'];?></label>
                        <input name="txt_facebook_friend_url" id="txt_facebook_friend_url" type="text" value="<?php echo set_value('txt_facebook_friend_url',($info_content['action_name'] == 'update_facebook') ? element('facebook_friend_url',$facebook,'') : "");?>" class="input_text_add" /><?php echo form_error('txt_facebook_friend_url');?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_friend_title'];?></label>
                        <input name="txt_facebook_friend_title" id="txt_facebook_friend_title" type="text" value="<?php echo set_value('txt_facebook_friend_title',($info_content['action_name'] == 'update_facebook') ? element('facebook_friend_title',$facebook,'') : "");?>" class="input_text_add" /><?php echo form_error('txt_facebook_friend_title');?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_friend_summary'];?></label>
                        <textarea cols="55" rows="10" name="txt_facebook_friend_summary" id="txt_facebook_friend_summary"><?php echo set_value('txt_facebook_friend_summary',($info_content['action_name'] == 'update_facebook') ? element('facebook_friend_summary',$facebook,'') : "");?></textarea><?php echo form_error('txt_facebook_friend_summary');?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_friend_image'];?></label>
                        <input name="txt_facebook_friend_image" id="txt_facebook_friend_image" type="text" value="<?php echo set_value('txt_facebook_friend_image',($info_content['action_name'] == 'update_facebook') ? element('facebook_friend_image',$facebook,'') : "");?>" class="input_text_add_browser"/>
                        <input type="button" class="input_button_img_browser"  onclick="BrowseServer('Images:/','txt_facebook_friend_image')" value="<?php echo $info_content['button_image'];?>" />
                        &nbsp;&nbsp;
                        <input type="checkbox" name="input_check_browser_friend" value="on" checked="checked"/>
                    </li>
                </ul>
            </fieldset><br/>

            <fieldset class="fieldset_title_add">
                <legend><?php echo $info_content['facebook_photo_bool'];?></legend>
                <ul class="ul_content_add_user">
                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_photo_bool'];?></label>
                        <select name="txt_facebook_photo_bool" id="txt_facebook_photo_bool" class="select_text_add">
                            <option value="0" <?php echo set_select('txt_facebook_photo_bool','0',(($info_content['action_name'] == 'update_facebook') && (element('facebook_photo_bool',$facebook,'') == 0)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_inactive'];?></option>
                            <option value="1" <?php echo set_select('txt_facebook_photo_bool','1',(($info_content['action_name'] == 'update_facebook') && (element('facebook_photo_bool',$facebook,'') == 1)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_active'];?></option>
                        </select>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_photo_image'];?></label>
                        <input name="txt_facebook_photo_image" id="txt_facebook_photo_image" type="text" value="<?php echo set_value('txt_facebook_photo_image',($info_content['action_name'] == 'update_facebook') ? element('facebook_photo_image',$facebook,'') : "");?>" class="input_text_add_browser"/>
                        <input type="button" class="input_button_img_browser"  onclick="BrowseServer('Images:/','txt_facebook_photo_image')" value="<?php echo $info_content['button_image'];?>" />
                        &nbsp;&nbsp;
                        <input type="checkbox" name="input_check_browser_photo" value="on" checked="checked"/>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_photo_message'];?></label>
                        <textarea cols="55" rows="10" name="txt_facebook_photo_message" id="txt_facebook_photo_message"><?php echo set_value('txt_facebook_photo_message',($info_content['action_name'] == 'update_facebook') ? element('facebook_photo_message',$facebook,'') : "");?></textarea><?php echo form_error('txt_facebook_photo_message');?>
                    </li>
                </ul>
            </fieldset><br/>

            <fieldset class="fieldset_title_add">
                <legend><?php echo $info_content['facebook_comment_bool'];?></legend>
                <ul class="ul_content_add_user">
                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_comment_bool'];?></label>
                        <select name="txt_facebook_comment_bool" id="txt_facebook_comment_bool" class="select_text_add">
                            <option value="0" <?php echo set_select('txt_facebook_comment_bool','0',(($info_content['action_name'] == 'update_facebook') && (element('facebook_comment_bool',$facebook,'') == 0)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_inactive'];?></option>
                            <option value="1" <?php echo set_select('txt_facebook_comment_bool','1',(($info_content['action_name'] == 'update_facebook') && (element('facebook_comment_bool',$facebook,'') == 1)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_active'];?></option>
                        </select>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_comment_id'];?></label>
                        <input name="txt_facebook_comment_id" id="txt_facebook_comment_id" type="text" value="<?php echo set_value('txt_facebook_comment_id',($info_content['action_name'] == 'update_facebook') ? element('facebook_comment_id',$facebook,'') : "");?>" class="input_text_add" /><?php echo form_error('txt_facebook_comment_id');?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_comment_message'];?></label>
                        <textarea cols="55" rows="10" name="txt_facebook_comment_message" id="txt_facebook_comment_message"><?php echo set_value('txt_facebook_comment_message',($info_content['action_name'] == 'update_facebook') ? element('facebook_comment_message',$facebook,'') : "");?></textarea><?php echo form_error('txt_facebook_comment_message');?>
                    </li>
                </ul>
            </fieldset><br/>

            <fieldset class="fieldset_title_add">
                <legend><?php echo $info_content['facebook_like_bool'];?></legend>
                <ul class="ul_content_add_user">
                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_like_bool'];?></label>
                        <select name="txt_facebook_like_bool" id="txt_facebook_like_bool" class="select_text_add">
                            <option value="0" <?php echo set_select('txt_facebook_like_bool','0',(($info_content['action_name'] == 'update_facebook') && (element('facebook_like_bool',$facebook,'') == 0)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_inactive'];?></option>
                            <option value="1" <?php echo set_select('txt_facebook_like_bool','1',(($info_content['action_name'] == 'update_facebook') && (element('facebook_like_bool',$facebook,'') == 1)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_active'];?></option>
                        </select>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_like_id'];?></label>
                        <input name="txt_facebook_like_id" id="txt_facebook_like_id" type="text" value="<?php echo set_value('txt_facebook_like_id',($info_content['action_name'] == 'update_facebook') ? element('facebook_like_id',$facebook,'') : "");?>" class="input_text_add" /><?php echo form_error('txt_facebook_like_id');?>
                    </li>
                </ul>
            </fieldset><br/>

            <fieldset class="fieldset_title_add">
                <legend><?php echo $info_content['facebook_like_fanface_bool'];?></legend>
                <ul class="ul_content_add_user">
                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_like_fanface_bool'];?></label>
                        <select name="txt_facebook_like_fanface_bool" id="txt_facebook_like_fanface_bool" class="select_text_add">
                            <option value="0" <?php echo set_select('txt_facebook_like_fanface_bool','0',(($info_content['action_name'] == 'update_facebook') && (element('facebook_like_fanface_bool',$facebook,'') == 0)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_inactive'];?></option>
                            <option value="1" <?php echo set_select('txt_facebook_like_fanface_bool','1',(($info_content['action_name'] == 'update_facebook') && (element('facebook_like_fanface_bool',$facebook,'') == 1)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_active'];?></option>
                        </select>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['facebook_like_fanface_id'];?></label>
                        <input name="txt_facebook_like_fanface_id" id="txt_facebook_like_fanface_id" type="text" value="<?php echo set_value('txt_facebook_like_fanface_id',($info_content['action_name'] == 'update_facebook') ? element('facebook_like_fanface_id',$facebook,'') : "");?>" class="input_text_add" /><?php echo form_error('txt_facebook_like_fanface_id');?>
                    </li>
                </ul>
            </fieldset>

            <input type="hidden" name="action_form" value="<?php echo $info_content['action_name'];?>" />
        </form>
    </div>

    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                <?php echo ($authorization['control']) ? "<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['control'],false)."/".element('sub_menu_function',$sub_menu['control'],false)."'>".$info_content['action_back']."</a>" : ""?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save'];?>"><?php echo $info_content['action_save'];?></a>
            </div>
        </div>
    </div>
</div>
<?php
echo $info_content['message_session_flash'];
echo $this->session->flashdata('add_update_facebook');
?>