<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!$info_content['ajax_show_manager']){
?>
<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ajax/category_sub.js"></script>
<script language="javascript">
    (function($){
        
        $.alert_authorization_body = function(){
            
            $('#content').delegate('#content .alert_authorization_add','click', function(){
                alert("<?php echo $info_content['alert_authorization_add_category'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_delete','click', function(){
                alert("<?php echo $info_content['alert_authorization_delete_category'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_update','click', function(){
                alert("<?php echo $info_content['alert_authorization_update_category'];?>");
                return false;
            });
            return this;
      };  
    })(jQuery);
    
    $$(document).ready(function(){
        $$.alert_authorization_body();
        
        $$("#data_tables_sort").data_table_custom({
            "bSort":false
        });
    });
</script> 

<div id="content">
    
    <div class="title_admin_body">
        <div class="title_admin_body_left">
            <div class="title_admin_body_right">
                <div class="title_admin_content_left"><?php echo $title_function;?></div>                
                <div class="title_admin_content_right">
                    <div class="title_admin_content_right_1">
                    <?php 
                    if(is_array($category_sub_root) && !empty($category_sub_root)){
                    ?>    
                    <span><?php echo $info_content['cate_control_filter'];?></span>
                    <select name="select_categroy_sub" class="ajax_select_filter">
                        <option value="all">&nbsp;&nbsp;&nbsp;<?php echo $info_content['option_select_all'];?></option>
                        <?php 
                        for($i=0;$i<count($category_sub_root);$i++){
                        ?>
                            <option value="<?php echo element('cate_id',$category_sub_root[$i],'') ?>" <?php if($this->uri->segment(4,'all')==element('cate_id',$category_sub_root[$i],'')) echo "selected" ?>>&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('cate_name',$category_sub_root[$i],'');?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                <?php echo ($authorization['addcategory'])  ?"<a class='add_all_admin_site' title='".$info_content['action_add']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['addcategory'],false)."/".element('sub_menu_function',$sub_menu['addcategory'],false)."'>".$info_content['action_add']."</a>"
                                                            :"<a class='alert_authorization_add add_all_admin_site' title='".$info_content['action_add']."' href='#' onclick='return false'>".$info_content['action_add']."</a>" ?>
                <a class="<?php echo ($authorization['delcategory'])?"delete_items_menu":"alert_authorization_delete"?> delete_all_admin_site" title="<?php echo $info_content['action_delete'] ?>"><?php echo $info_content['action_delete'] ?></a>
                <a class="<?php echo ($authorization['upcategory']) ?"update_items_menu":"alert_authorization_update"?> update_all_admin_site" title="<?php echo $info_content['action_update'] ?>"><?php echo $info_content['action_update'] ?></a>
            </div>
        </div>
    </div>
    
    <div class="content_admin_body">
    <form name="form_manager_content" id="form_manager_content" action="" method="post">
        <input type="hidden" id="hidden_input_menu_class"       value="<?php echo $info_content['active_menu_class']; ?>"/>
        <input type="hidden" id="hidden_input_update"           value="<?php echo element('menu_class',$sub_menu['upcategory'],false)."/".element('sub_menu_function',$sub_menu['upcategory'],false) ?>"/>
        <input type="hidden" id="hidden_input_authorization"    value=""/>
        
        <table id="data_tables_sort" class="content_admin_body_table" cellspacing="0px" cellpadding="0px">
        <thead>
        <tr>
            <th width="35">ID</th>
            
            <th width="35" class="right"><input type="checkbox" id="chkCheckAll"/></th>

            <th width="580"><?php echo $info_content['cate_name']?></th>

            <th width="60"><?php echo $info_content['cate_public'] ?></th>
            
            <th width="60"><?php echo $info_content['cate_order'] ?></th>

            <th width="40" class="right"><?php echo $info_content['action_update'] ?></th>

            <th width="40" class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </thead>
        
        <tfoot>
        <tr>
            <th>ID</th>
            
            <th class="right"></th>

            <th><?php echo $info_content['cate_name']?></th>

            <th><?php echo $info_content['cate_public'] ?></th>
            
            <th><?php echo $info_content['cate_order'] ?></th>

            <th class="right"><?php echo $info_content['action_update'] ?></th>

            <th class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </tfoot>
        
        <tbody>
        <?php
}
        echo $table_content_category_sub;
        
if(!$info_content['ajax_show_manager']){
?>        
        </tbody>
        </table>
    </form>
    </div>
    
    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                <?php echo ($authorization['addcategory'])  ?"<a class='add_all_admin_site' title='".$info_content['action_add']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['addcategory'],false)."/".element('sub_menu_function',$sub_menu['addcategory'],false)."'>".$info_content['action_add']."</a>"
                                                            :"<a class='alert_authorization_add add_all_admin_site' title='".$info_content['action_add']."' href='#' onclick='return false'>".$info_content['action_add']."</a>" ?>
                <a class="<?php echo ($authorization['delcategory'])?"delete_items_menu":"alert_authorization_delete"?> delete_all_admin_site" title="<?php echo $info_content['action_delete'] ?>"><?php echo $info_content['action_delete'] ?></a>
                <a class="<?php echo ($authorization['upcategory']) ?"update_items_menu":"alert_authorization_update"?> update_all_admin_site" title="<?php echo $info_content['action_update'] ?>"><?php echo $info_content['action_update'] ?></a>
            </div>
        </div>
    </div>
</div>
<?php
echo $info_content['message_session_flash'];
echo $this->session->flashdata('add_update_category_sub');
}
?>