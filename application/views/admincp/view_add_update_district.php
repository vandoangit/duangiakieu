<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');
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
                <?php echo ($authorization['control'])?"<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['control'],false)."/".element('sub_menu_function',$sub_menu['control'],false)."'>".$info_content['action_back']."</a>":""?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save'];?>"><?php echo $info_content['action_save'];?></a>
            </div>
        </div>
    </div>
    
    <div class="content_admin_body_add">
    <form action="" method="post" name="form_add_content" id="form_add_content">
        
    <fieldset class="fieldset_title_add">
        <legend><?php echo $info_content['info_district'];?></legend>
        <ul class="ul_content_add">
            
            <li>
                <label class="label_content_add"><?php echo $info_content['province_name'];?></label>
                <select name="txt_province" id="txt_province" class="validate[custom_select[-1]] select_text_add">
                    <option value="-1">&nbsp;&nbsp;&nbsp;<?php echo $info_content['option_select'];?></option>
                    <?php
                    foreach($province as $key=>$value){
                    ?>    
                    <option value="<?php echo element('province_id',$value); ?>" <?php echo set_select('txt_province',element('province_id',$value,''),(($info_content['action_name']=='update_district') && (element('province_id',$district,'')==element('province_id',$value,'')))?TRUE:FALSE); ?>>&nbsp;&nbsp;&nbsp;»&nbsp;<?php echo element('province_name',$value); ?></option>
                    <?php
                    }
                    ?>   
                </select>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['district_name'];?></label>
                <input name="txt_district_name" id="txt_district_name" type="text" value="<?php echo set_value('txt_district_name',($info_content['action_name']=='update_district')?element('district_name',$district,''):""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_district_name')?>
            </li>

            <li>
                <label class="label_content_add"><?php echo $info_content['district_public'];?></label>
                <select name="txt_district_public" id="txt_district_public" class="select_text_add">
                    <option value="1" <?php echo set_select('txt_district_public','1',(($info_content['action_name']=='update_district')&&(element('district_public',$district,'')==1))?TRUE:FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_public'];?></option>
                    <option value="0" <?php echo set_select('txt_district_public','0',(($info_content['action_name']=='update_district')&&(element('district_public',$district,'')==0))?TRUE:FALSE);?> >&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_content['admin_hidden'];?></option>
                </select>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['district_order'];?></label>
                <input name="txt_district_order" id="txt_district_order" type="text" value="<?php echo set_value('txt_district_order',($info_content['action_name']=='update_district')?element('district_order',$district,''):""); ?>" class="validate[required,custom[custom_onlyNumber]] input_text_add" /><?php echo form_error('txt_district_order')?>
            </li>
        </ul>
    </fieldset>
    <input type="hidden" name="action_form" value="<?php echo $info_content['action_name'];?>" />
    </form>
    </div>
    
    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                <?php echo ($authorization['control'])?"<a class='back_button_all_admin_site' title='".$info_content['action_back']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['control'],false)."/".element('sub_menu_function',$sub_menu['control'],false)."'>".$info_content['action_back']."</a>":""?>
                <a class="save_items_menu save_all_admin_site" title="<?php echo $info_content['action_save'];?>"><?php echo $info_content['action_save'];?></a>
            </div>
        </div>
    </div>
</div>
<?php 
    echo $info_content['message_session_flash'];
    echo $this->session->flashdata('add_update_district');
?>
        	