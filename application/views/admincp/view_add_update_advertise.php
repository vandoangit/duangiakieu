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
                <legend><?php echo $info_content['info_advertise'];?></legend>
                <ul class="ul_content_add">

                    <li <?php echo ($info_content['bool_active']['category']) ? "" : "style='display:none'"?>>
                        <label class="label_content_add"><?php echo $info_content['cate_sub_name_ad'];?></label>
                        <select name="txt_cate_advertise" id="txt_cate_advertise" class="validate[custom_select[-1]] select_text_add">
                            <?php echo ($info_content['bool_active']['category']) ? "<option value='-1'>&nbsp;&nbsp;&nbsp;".$info_content['option_select']."</option>" : "";?>
                            <?php echo $category_advertise;?>  
                        </select><?php echo form_error('txt_cate_advertise')?>
                    </li> 

                    <li>
                        <label class="label_content_add"><?php echo $info_content['ad_name'];?></label>
                        <input name="txt_ad_name" id="txt_ad_name" type="text" value="<?php echo set_value('txt_ad_name',($info_content['action_name'] == 'update_advertise') ? element('ad_name',$advertise,'') : "");?>" class="validate[required] input_text_add" /><?php echo form_error('txt_ad_name')?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['ad_img'];?></label>
                        <input name="txt_ad_img" id="txt_ad_img" type="text" value="<?php echo set_value('txt_ad_img',($info_content['action_name'] == 'update_advertise') ? element('ad_img',$advertise,'') : "");?>" class="validate[required] input_text_add_browser"/>
                        <input type="button" class="input_button_img_browser"  onclick="BrowseServer('Images:/','txt_ad_img')" value="<?php echo $info_content['button_image'];?>">
                        &nbsp;&nbsp;<?php echo form_error('txt_ad_img')?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['ad_link'];?></label>
                        <input name="txt_ad_link" id="txt_ad_link" type="text" value="<?php echo set_value('txt_ad_link',($info_content['action_name'] == 'update_advertise') ? element('ad_link',$advertise,'') : "");?>" class="input_text_add" /><?php echo form_error('txt_ad_link')?>
                    </li>

                    <li <?php echo ($info_content['bool_active']['active']) ? "" : "style='display:none'"?>>
                        <label class="label_content_add"><?php echo $info_content['ad_active'];?></label>
                        <select name="txt_ad_active" id="txt_ad_active" class="select_text_add">
                            <option value="0" <?php echo set_select('txt_ad_active','0',(($info_content['action_name'] == 'update_advertise') && (element('ad_active',$advertise,'') == 0)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_inactive'];?></option>
                            <option value="1" <?php echo set_select('txt_ad_active','1',(($info_content['action_name'] == 'update_advertise') && (element('ad_active',$advertise,'') == 1)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_active'];?></option>
                        </select>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['ad_public'];?></label>
                        <select name="txt_ad_public" id="txt_ad_public" class="select_text_add">
                            <option value="1" <?php echo set_select('txt_ad_public','1',(($info_content['action_name'] == 'update_advertise') && (element('ad_public',$advertise,'') == 1)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_public'];?></option>
                            <option value="0" <?php echo set_select('txt_ad_public','0',(($info_content['action_name'] == 'update_advertise') && (element('ad_public',$advertise,'') == 0)) ? TRUE : FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_hidden'];?></option>
                        </select>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['ad_order'];?></label>
                        <input name="txt_ad_order" id="txt_ad_order" type="text" value="<?php echo set_value('txt_ad_order',($info_content['action_name'] == 'update_advertise') ? element('ad_order',$advertise,'') : "");?>" class="validate[required,custom[custom_onlyNumber]] input_text_add" /><?php echo form_error('txt_ad_order')?>
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
echo $this->session->flashdata('add_update_advertise');
?>