<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!$info_content['ajax_show_manager']){
?>
<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ajax/user_group.js"></script>
<script language="javascript">
    (function($){
        
        $.alert_authorization_body = function(){
            
            $('#content').delegate('#content .alert_authorization_manager','click', function(){
                alert("<?php echo $info_content['alert_authorization_manager_user'];?>");
                return false;
            });
            
            $('#content').delegate('#content .alert_authorization_add','click', function(){
                alert("<?php echo $info_content['alert_authorization_add_user_group'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_delete','click', function(){
                alert("<?php echo $info_content['alert_authorization_delete_user_group'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_update','click', function(){
                alert("<?php echo $info_content['alert_authorization_update_user_group'];?>");
                return false;
            });
            
            $('#content').delegate('#content .alert_authorization_author','click', function(){
                alert("<?php echo $info_content['alert_authorization_author_user_group'];?>");
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
                "sSortDataType"     :"dom-div-date",
                "sType"             :"numeric",
                "bSearchable"       :false,
                "aTargets"          :[3]
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[4]
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[5]
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[6]
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[7]
            }
        ]
        $$("#data_tables_sort").data_table_custom();
        
    });
</script> 

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
                <?php echo ($authorization['add'])  ?"<a class='add_all_admin_site' title='".$info_content['action_add']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['add'],false)."/".element('sub_menu_function',$sub_menu['add'],false)."'>".$info_content['action_add']."</a>"
                                                    :"<a class='alert_authorization_add add_all_admin_site' title='".$info_content['action_add']."' href='#' onclick='return false'>".$info_content['action_add']."</a>" ?>
                <a class="<?php echo ($authorization['delete'])?"delete_items_menu":"alert_authorization_delete"?> delete_all_admin_site" title="<?php echo $info_content['action_delete'] ?>"><?php echo $info_content['action_delete'] ?></a>
                <a class="<?php echo ($authorization['update'])?"update_items_menu":"alert_authorization_update"?> update_all_admin_site" title="<?php echo $info_content['action_update'] ?>"><?php echo $info_content['action_update'] ?></a>
                <a class="<?php echo ($authorization['authorization'])?"authorization_items_menu":"alert_authorization_author"?> authorization_all_admin_site" title="<?php echo $info_content['action_authorization'] ?>"><?php echo $info_content['action_authorization'] ?></a>
            </div>
        </div>
    </div>
    
    <div class="content_admin_body">
    <form name="form_manager_content" id="form_manager_content" action="" method="post">
        <input type="hidden" id="hidden_input_update"        value="<?php echo element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false) ?>"/>
        <input type="hidden" id="hidden_input_authorization" value="<?php echo element('menu_class',$sub_menu['authorization'],false)."/".element('sub_menu_function',$sub_menu['authorization'],false) ?>"/>
        
        <table id="data_tables_sort" class="content_admin_body_table" cellspacing="0px" cellpadding="0px">
        <thead>
        <tr>
            <th width="35">ID</th>   
            
            <th width="35" class="right"><input type="checkbox" id="chkCheckAll"/></th>     
            
            <th width="370"><?php echo $info_content['user_group_name']?></th>
            
            <th width="130"><?php echo $info_content['user_group_create_date']?></th>
            
            <th width="106"><?php echo $info_content['user_group_detail'] ?></th>

            <th width="85" class="right"><?php echo $info_content['action_authorization'] ?></th>

            <th width="40" class="right"><?php echo $info_content['action_update'] ?></th>

            <th width="40" class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </thead>
        
        <tfoot>
        <tr>
            <th>ID</th>   
            
            <th class="right"></th>     
            
            <th><?php echo $info_content['user_group_name']?></th>
            
            <th><?php echo $info_content['user_group_create_date']?></th>
            
            <th><?php echo $info_content['user_group_detail'] ?></th>

            <th class="right"><?php echo $info_content['action_authorization'] ?></th>

            <th class="right"><?php echo $info_content['action_update'] ?></th>

            <th class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </tfoot>
        <tbody>
        <?php
}
        if(is_array($user_group)){
            
            for($i=0;$i<count($user_group);$i++){
            ?>
            <tr class="gradeC">
                <td>
                    <div align="center" class="title_table_database">
                        <?php echo element('user_group_id',$user_group[$i],'');?>
                    </div>
                </td>
                
                <td>
                    <div align="center">
                        <input type="checkbox" name="checkbox[<?php echo element('user_group_id',$user_group[$i],'');?>]" class="chkCheck" id="check_<?php echo element('user_group_id',$user_group[$i],'');?>" />
                    </div>
                </td>
                
                <td>
                    <div align="left" class="title_table_database">
                        <?php echo element('user_group_name',$user_group[$i],''); ?>
                    </div>
                </td>
                
                <td>
                    <div align="center">
                        <?php echo date('d-m-Y',strtotime(element('user_group_create_date',$user_group[$i],''))); ?>
                    </div>
                </td>
                
                <td>
                    <div align="center">
                        <?php
                            echo ($authorization['user'])?"<a style='cursor: pointer;font-weight: bold;' title='".$info_content['user_group_detail']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['user'],false)."/".element('sub_menu_function',$sub_menu['user'],false)."/".element('user_group_id',$user_group[$i],'')."' >".$info_content['user_group_detail']."</a>"
                                                         :"<a style='font-weight: bold;' title='".$info_content['user_group_detail']."' class='alert_authorization_manager' >".$info_content['user_group_detail']."</a>";
                        ?>
                    </div>
                </td>
                
                <td>
                    <div align="center">
                        <a class="<?php echo ($authorization['authorization'])?"":"alert_authorization_author" ?>" title="<?php echo $info_content['action_authorization']?>"  href="<?php echo ($authorization['authorization'])?base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['authorization'],false)."/".element('sub_menu_function',$sub_menu['authorization'],false)."/".element('user_group_id',$user_group[$i],''):"#";?>">
                            <img width="18" height="18" style="padding:3px 0px" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/action/authorization.png" alt="authorization"/>
                        </a>
                    </div>
                </td>

                <td>
                    <div align="center">
                        <a class="<?php echo ($authorization['update'])?"":"alert_authorization_update" ?>" title="<?php echo $info_content['action_update']?>" href="<?php echo ($authorization['update'])?base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false)."/".element('user_group_id',$user_group[$i],''):"#";?>">
                            <img alt="update" width="18" height="18" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/action/update.png"/>
                        </a>
                    </div>
                </td>

                <td>
                    <div align="center">
                        <a delete_param="<?php echo element('user_group_id',$user_group[$i],'') ?>" class="<?php echo ($authorization['delete'])?"ajax_delete_item":"alert_authorization_delete"?>" title="<?php echo $info_content['action_delete']?>">
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
                <a class="<?php echo ($authorization['authorization'])?"authorization_items_menu":"alert_authorization_author"?> authorization_all_admin_site" title="<?php echo $info_content['action_authorization'] ?>"><?php echo $info_content['action_authorization'] ?></a>
            </div>
        </div>
    </div>
</div>
<?php
echo $info_content['message_session_flash'];
echo $this->session->flashdata('add_update_user_group');
}
?>