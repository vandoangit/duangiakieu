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
        <legend><?php echo $info_content['info_order'];?></legend>
        <ul class="ul_content_add_user">
            
            <li>
                <label class="label_content_add"><?php echo $info_content['order_name'];?></label>
                <input name="txt_order_name" id="txt_order_name" type="text" value="<?php echo set_value('txt_order_name',($info_content['action_name']=='update_order')?element('order_name',$order,''):""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_order_name')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['order_address'];?></label>
                <input name="txt_order_address" id="txt_order_address" type="text" value="<?php echo set_value('txt_order_address',($info_content['action_name']=='update_order')?element('order_address',$order,''):""); ?>" class="validate[required] input_text_add" /><?php echo form_error('txt_order_address')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['order_phone'];?></label>
                <input name="txt_order_phone" id="txt_order_phone" type="text" value="<?php echo set_value('txt_order_phone',($info_content['action_name']=='update_order')?element('order_phone',$order,''):""); ?>" class="validate[required,custom[custom_telephone]] input_text_add" /><?php echo form_error('txt_order_phone')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['order_email'];?></label>
                <input name="txt_order_email" id="txt_order_email" type="text" value="<?php echo set_value('txt_order_email',($info_content['action_name']=='update_order')?element('order_email',$order,''):""); ?>" class="validate[custom[custom_email]] input_text_add" /><?php echo form_error('txt_order_email')?>
            </li>
            
            <li <?php echo ($info_content['bool_active']['category'])?"":"style='display:none'" ?>>
                <label class="label_content_add"><?php echo $info_content['cate_name_order'];?></label>
                <select name="txt_cate_order" id="txt_cate_order" class="validate[custom_select[-1]] select_text_add">
                    <?php echo ($info_content['bool_active']['category'])?"<option value='-1'>&nbsp;&nbsp;&nbsp;".$info_content['option_select']."</option>":""; ?>
                    <?php echo $category_order; ?>  
                </select><?php echo form_error('txt_cate_order')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['delivery_name'];?></label>
                <select name="txt_delivery" id="txt_delivery" class="validate[custom_select[-1]] select_text_add">
                    <option value="-1">&nbsp;&nbsp;&nbsp;<?php echo $info_content['option_select'];?></option>
                    <?php
                    if(is_array($method_delivery)&&(!empty($method_delivery))){
                        foreach($method_delivery as $key=>$value){
                        ?>
                        <option value="<?php echo element('delivery_id',$value); ?>" <?php echo set_select('txt_delivery',element('delivery_id',$value,''),(($info_content['action_name']=='update_order')&&(element('delivery_id',$value,'')==element('delivery_id',$order,'')))?TRUE:FALSE); ?>>&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('delivery_name',$value); ?></option>
                        <?php
                        }
                    }
                    ?>  
                </select><?php echo form_error('txt_delivery')?>
            </li>
            
            <li>
                <label class="label_content_add"><?php echo $info_content['payment_name'];?></label>
                <select name="txt_payment" id="txt_payment" class="validate[custom_select[-1]] select_text_add">
                    <option value="-1">&nbsp;&nbsp;&nbsp;<?php echo $info_content['option_select'];?></option>
                    <?php
                    if(is_array($method_payment)&&(!empty($method_payment))){
                        foreach($method_payment as $key=>$value){
                        ?>
                        <option value="<?php echo element('payment_id',$value); ?>" <?php echo set_select('txt_payment',element('payment_id',$value,''),(($info_content['action_name']=='update_order')&&(element('payment_id',$value,'')==element('payment_id',$order,'')))?TRUE:FALSE); ?>>&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('payment_name',$value); ?></option>
                        <?php
                        }
                    }
                    ?>  
                </select><?php echo form_error('txt_payment')?>
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
    echo $this->session->flashdata('add_update_order');
?>
        	