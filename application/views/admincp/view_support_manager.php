<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!$info_content['ajax_show_manager']){
?>
<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ajax/support.js"></script>
<script language="javascript">
    (function($){
        
        $.alert_authorization_body = function(){
            
            $('#content').delegate('#content .alert_authorization_add','click', function(){
                alert("<?php echo $info_content['alert_authorization_add_support'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_delete','click', function(){
                alert("<?php echo $info_content['alert_authorization_delete_support'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_update','click', function(){
                alert("<?php echo $info_content['alert_authorization_update_support'];?>");
                return false;
            });
            return this;
      };  
    })(jQuery);
    
    $$(document).ready(function(){
        $$.alert_authorization_body();
        
        data_tables_aoColumnDefs=[
            {
                "sSortDataType"     :"dom-div",
                "sType"             :"numeric",
                "bSearchable"       :false,
                "aTargets"          :[0]
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[1]
            },
            {
                "sSortDataType"     :"dom-div",
                "bSearchable"       :true,
                "aTargets"          :[2]
            },
            {
                "sSortDataType"     :"dom-div",
                "bSearchable"       :true,
                "aTargets"          :[3]
            },
            <?php
            $td_col=0;
            
            if($info_content['bool_active']['category']){
                
            ?>
            {
                "sSortDataType"     :"dom-div",
                "bSearchable"       :true,
                "aTargets"          :[4]
            },
            <?php
            }
            else
                $td_col++;
            ?>
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[<?php echo 5-$td_col ?>]
            },
            {
                "sSortDataType"     :"dom-div-public",
                "bSearchable"       :false,
                "aTargets"          :[<?php echo 6-$td_col ?>]
            },
            {
                "sSortDataType"     :"dom-div",
                "sType"             :"numeric",
                "bSearchable"       :false,
                "aTargets"          :[<?php echo 7-$td_col ?>]
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[<?php echo 8-$td_col ?>]
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[<?php echo 9-$td_col ?>]
            }
        ]
        $$("#data_tables_sort").data_table_custom();
    });
</script> 

<div id="content">
    
    <div class="title_admin_body">
        <div class="title_admin_body_left">
            <div class="title_admin_body_right">
                <div class="title_admin_content_left"><?php echo $title_function;?></div>                
                <div class="title_admin_content_right">
                    <div class="title_admin_content_right_1">
                    <?php if($info_content['bool_active']['category']){  ?>
                        
                    <span><?php echo $info_content['support_control_filter'];?></span>
                    <select name="select_categroy_support" class="ajax_select_filter">
                        <option value="all">&nbsp;&nbsp;&nbsp;<?php echo $info_content['option_select_all'];?></option>
                        <?php echo $category_support; ?>
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
                <?php echo ($authorization['add'])  ?"<a class='add_all_admin_site' title='".$info_content['action_add']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['add'],false)."/".element('sub_menu_function',$sub_menu['add'],false)."'>".$info_content['action_add']."</a>"
                                                    :"<a class='alert_authorization_add add_all_admin_site' title='".$info_content['action_add']."' href='#' onclick='return false'>".$info_content['action_add']."</a>" ?>
                <a class="<?php echo ($authorization['delete'])?"delete_items_menu":"alert_authorization_delete"?> delete_all_admin_site" title="<?php echo $info_content['action_delete'] ?>"><?php echo $info_content['action_delete'] ?></a>
                <a class="<?php echo ($authorization['update'])?"update_items_menu":"alert_authorization_update"?> update_all_admin_site" title="<?php echo $info_content['action_update'] ?>"><?php echo $info_content['action_update'] ?></a>
            </div>
        </div>
    </div>
    
    <div class="content_admin_body">
    <form name="form_manager_content" id="form_manager_content" action="" method="post">
        <input type="hidden" id="hidden_input_menu_class"       value="<?php echo $info_content['active_menu_class']; ?>"/>
        <input type="hidden" id="hidden_input_update"        value="<?php echo element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false) ?>"/>
        <input type="hidden" id="hidden_input_authorization" value=""/>
        
        <table id="data_tables_sort" class="content_admin_body_table" cellspacing="0px" cellpadding="0px">
        <thead>
        <tr>
            <th width="35">ID</th>

            <th width="35" class="right"><input type="checkbox" id="chkCheckAll"/></th>

            <th width="149"><?php echo $info_content['support_nick']?></th>

            <th width="170"><?php echo $info_content['support_name'] ?></th>
            
            <?php if($info_content['bool_active']['category']){  ?>
            
            <th width="80"><?php echo $info_content['support_type'] ?></th>
            <?php } ?>
            
            <th width="150"><?php echo $info_content['support_status'] ?></th>

            <th width="60"><?php echo $info_content['support_public'] ?></th>
            
            <th width="60"><?php echo $info_content['support_order'] ?></th>

            <th width="40" class="right"><?php echo $info_content['action_update'] ?></th>

            <th width="40" class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </thead>
        
        <tfoot>
        <tr>
            <th>ID</th>

            <th class="right"></th>

            <th><?php echo $info_content['support_nick']?></th>

            <th><?php echo $info_content['support_name'] ?></th>
            
            <?php if($info_content['bool_active']['category']){  ?>
            
            <th><?php echo $info_content['support_type'] ?></th>
            <?php }?>
            
            <th><?php echo $info_content['support_status'] ?></th>

            <th><?php echo $info_content['support_public'] ?></th>
            
            <th><?php echo $info_content['support_order'] ?></th>

            <th class="right"><?php echo $info_content['action_update'] ?></th>

            <th class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </tfoot>
        
        <tbody>
        <?php
}
        if(is_array($support)){
            
            for($i=0;$i<count($support);$i++){
            ?>
            <tr class="gradeC">
                <td>
                    <div align="center" class="title_table_important">
                        <?php echo element('support_id',$support[$i],'');?>
                    </div>
                </td>
                    
                <td>
                    <div align="center">
                        <input type="checkbox" name="checkbox[<?php echo element('support_id',$support[$i],'');?>]" class="chkCheck" id="check_<?php echo element('support_id',$support[$i],'');?>" />
                    </div>
                </td>
                    
                <td>
                    <div align="left" class="title_table_important">
                       <a title="<?php echo custom_htmlspecialchars(element('support_name',$support[$i],''));?>"><?php echo element('support_nick',$support[$i],'');?></a>
                    </div>
                </td>
                    
                <td>
                    <div align="center" class="title_table_database" >
                        <?php echo element('support_name',$support[$i],''); ?>
                    </div>
                </td>
                
               <?php if($info_content['bool_active']['category']){  ?>  
                
                <td>
                    <div align="center">
                        <?php echo element('cate_name',$support[$i],''); ?>
                    </div>
                </td>
                <?php } ?>
                
                <td>
                    <div align="center">
                       <?php echo show_status_support(element('cate_id',$support[$i],''),$support[$i],2);?>
                    </div>
                </td>
                
                <td>
                    <?php
                        $public=(element('support_public',$support[$i],'')==1)?"ajax_public_yes":"ajax_public_no";
                        echo ($authorization['update'])?"<div align='center' class='".$public." ajax_update_public' update_public_param='".element('support_id',$support[$i],'')."' >&nbsp;</div> "
                                                       :"<div align='center' class='".$public."' >&nbsp;</div>";
                    ?>
                </td>
                
                <td>
                    <?php
                        echo ($authorization['update'])?"<div align='center' class='ajax_update_order_input' update_order_param='".element('support_id',$support[$i],'')."' >".element('support_order',$support[$i],'')."</div> "
                                                       :"<div align='center'>".element('support_order',$support[$i],'')."</div>";
                    ?>
                </td>

                <td>
                    <div align="center">
                        <a class="<?php echo ($authorization['update'])?"":"alert_authorization_update" ?>" title="<?php echo $info_content['action_update']?>" href="<?php echo ($authorization['update'])?base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false)."/".element('support_id',$support[$i],''):"#";?>">
                            <img alt="update" width="18" height="18" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/action/update.png"/>
                        </a>
                    </div>
                </td>

                <td>
                    <div align="center">
                        <a delete_param="<?php echo element('support_id',$support[$i],'') ?>" class="<?php echo ($authorization['delete'])?"ajax_delete_item":"alert_authorization_delete"?>" title="<?php echo $info_content['action_delete']?>">
                            <img alt="delete" width="18" height="18" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/action/delete.png"/>
                        </a>
                    </div>
                </td>
                    
            </tr>
            <?php
            }
        }
        
if(!$info_content['ajax_show_manager']){
?>        
        </tbody>
        </table>
    </form>
    </div>
    
    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                <?php echo ($authorization['add'])  ?"<a class='add_all_admin_site' title='".$info_content['action_add']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['add'],false)."/".element('sub_menu_function',$sub_menu['add'],false)."'>".$info_content['action_add']."</a>"
                                                    :"<a class='alert_authorization_add add_all_admin_site' title='".$info_content['action_add']."' href='#' onclick='return false'>".$info_content['action_add']."</a>" ?>
                <a class="<?php echo ($authorization['delete'])?"delete_items_menu":"alert_authorization_delete"?> delete_all_admin_site" title="<?php echo $info_content['action_delete'] ?>"><?php echo $info_content['action_delete'] ?></a>
                <a class="<?php echo ($authorization['update'])?"update_items_menu":"alert_authorization_update"?> update_all_admin_site" title="<?php echo $info_content['action_update'] ?>"><?php echo $info_content['action_update'] ?></a>
            </div>
        </div>
    </div>
</div>
<?php
echo $info_content['message_session_flash'];
echo $this->session->flashdata('add_update_support');
}
?>