<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>

<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE; ?>js/ajax/application.js"></script>
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
				<?php echo ($authorization['control']) ? "<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['control'],false)."/".element('sub_menu_function',$sub_menu['control'],false)."'>".$info_content['action_back']."</a>" : "" ?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save']; ?>"><?php echo $info_content['action_save']; ?></a>
            </div>
        </div>
    </div>

    <div class="content_admin_body_add">
        <form action="" method="post" name="form_add_content" id="form_add_content">

            <fieldset class="fieldset_title_add">
                <legend><?php echo $info_content['info_application']; ?></legend>
                <ul class="ul_content_add_user">

                    <li>
                        <label class="label_content_add"><?php echo $info_content['application_name']; ?></label>
                        <input name="txt_application_name" id="txt_application_name" type="text" value="<?php echo set_value('txt_application_name',($info_content['action_name'] == 'update_application') ? element('application_name',$application,'') : ""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_application_name') ?>
                    </li>

					<li>
                        <label class="label_content_add"><?php echo $info_content['application_alias']; ?></label>
                        <input name="txt_application_alias" id="txt_application_alias" type="text" value="<?php echo set_value('txt_application_alias',($info_content['action_name'] == 'update_application') ? element('application_alias',$application,'') : ""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_application_alias') ?>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['application_public']; ?></label>
                        <select name="txt_application_public" id="txt_application_public" class="select_text_add">
                            <option value="1" <?php echo set_select('txt_application_public','1',(($info_content['action_name'] == 'update_application') && (element('application_public',$application,'') == 1)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_public']; ?></option>
                            <option value="0" <?php echo set_select('txt_application_public','0',(($info_content['action_name'] == 'update_application') && (element('application_public',$application,'') == 0)) ? TRUE : FALSE); ?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_hidden']; ?></option>
                        </select>
                    </li>

                    <li>
                        <label class="label_content_add"><?php echo $info_content['application_order']; ?></label>
                        <input name="txt_application_order" id="txt_application_order" type="text" value="<?php echo set_value('txt_application_order',($info_content['action_name'] == 'update_application') ? element('application_order',$application,'') : ""); ?>" class="validate[required,custom[custom_onlyNumber]] input_text_add" /><?php echo form_error('txt_application_order') ?>
                    </li>
                </ul>
            </fieldset>
            <input type="hidden" name="action_form" value="<?php echo $info_content['action_name']; ?>" />
        </form>
    </div>

    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
				<?php echo ($authorization['control']) ? "<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['control'],false)."/".element('sub_menu_function',$sub_menu['control'],false)."'>".$info_content['action_back']."</a>" : "" ?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save']; ?>"><?php echo $info_content['action_save']; ?></a>
            </div>
        </div>
    </div>
</div>
<?php

echo $info_content['message_session_flash'];
echo $this->session->flashdata('add_update_application');

?>