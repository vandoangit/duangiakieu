<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!$info_content['ajax_show_manager']){
?>
<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ajax/order.js"></script>
<script language="javascript">
    (function($){
        
        $.alert_authorization_body = function(){
            
            $('#content').delegate('#content .alert_authorization_add','click', function(){
                alert("<?php echo $info_content['alert_authorization_add_order'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_delete','click', function(){
                alert("<?php echo $info_content['alert_authorization_delete_order'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_update','click', function(){
                alert("<?php echo $info_content['alert_authorization_update_order'];?>");
                return false;
            });
            return this;
      };  
    })(jQuery);
    
    $$(document).ready(function(){
        $$.alert_authorization_body();
        
        /*
            Param:
                aDataSort       :sort nhieu cot trong 1 bang ([i,j,k])
                aTargets        :thu tu ([i,j,k]) 
                asSorting       :co sap xep hay k [desc,asc]
                bSearchable     :co search hay khong search true or false
                bSortable       :cho phep sort hay k (true or false)
                bVisible        :an hien 1 colum
                sServerMethod   :phuong thuc cho ajax (post,get)
                sSortDataType   :xac dinh kieu du lieu de sap xep(tu dinh nghia)
                sTitle          :tieu de cua cot
                sType           :dinh nghia kieu du lieu cua cot
                sWidth          :do rong cua cot
                
                
        */    
        data_tables_aoColumnDefs=[
            {
                "bSearchable"       :false,
                "bSortable"         :false,
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
            {
                "sSortDataType"     :"dom-div",
                "sType"             :"numeric",
                "bSearchable"       :true,
                "aTargets"          :[4]
            },
            <?php
            $td_col=0;
            
            if($info_content['bool_active']['category']){
                
            ?>
            {
                "sSortDataType"     :"dom-div",
                "bSearchable"       :true,
                "aTargets"          :[5]
            },
           <?php
            }
            else
                $td_col++;
            ?>
            {
                "sSortDataType"     :"dom-div",
                "bSearchable"       :true,
                "aTargets"          :[<?php echo 6-$td_col ?>]
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[<?php echo 7-$td_col ?>]
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[<?php echo 8-$td_col ?>]
            }
        ]
        $$("#data_tables_sort").data_table_custom({"aaSorting":[[2,"asc"]]});
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
                        
                    <span><?php echo $info_content['order_control_filter'];?></span>
                    <select name="select_category_order" class="ajax_select_filter">
                        <option value="all">&nbsp;&nbsp;&nbsp;<?php echo $info_content['option_select_all'];?></option>
                        <?php echo $category_order; ?>
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
        <input type="hidden" id="hidden_input_update"           value="<?php echo element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false) ?>"/>
        <input type="hidden" id="hidden_input_authorization"    value=""/>
        
        <table id="data_tables_sort" class="content_admin_body_table" cellspacing="0px" cellpadding="0px">
        <thead>
        <tr>                               
            <th width="30">#</th>
            
            <th width="35" class="right"><input type="checkbox" id="chkCheckAll"/></th>
            
            <th width="100"><?php echo $info_content['order_id'] ?></th>
            
            <th width="160"><?php echo $info_content['order_name'] ?></th>  
            
            <th width="105"><?php echo $info_content['order_phone'] ?></th>
            
            <?php if($info_content['bool_active']['category']){  ?>
            
            <th width="110"><?php echo $info_content['cate_name_order'] ?></th>
            <?php } ?>
            
            <th width="220"><?php echo $info_content['order_address'] ?></th>

            <th width="40" class="right"><?php echo $info_content['action_update'] ?></th>

            <th width="40" class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </thead>
        
        <tfoot>
        <tr>                               
            <th>#</th>
            
            <th class="right"></th>
            
            <th><?php echo $info_content['order_id'] ?></th>
            
            <th><?php echo $info_content['order_name'] ?></th>  
            
            <th><?php echo $info_content['order_phone'] ?></th>
            
            <?php if($info_content['bool_active']['category']){  ?>
            
            <th><?php echo $info_content['cate_name_order'] ?></th>
            <?php } ?>
            
            <th><?php echo $info_content['order_address'] ?></th>

            <th class="right"><?php echo $info_content['action_update'] ?></th>

            <th class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </tfoot>
        
        <tbody>
        <?php
}
        if(is_array($orders)){
            
            for($i=0;$i<count($orders);$i++){
            ?>
            <tr class="gradeC" param_order_id="<?php echo element('order_id',$orders[$i],'');?>">  
                <td>
                    <div align="center" class="details_open_close details_open">&nbsp;</div>
                </td>
                
                <td>
                    <div align="center">
                        <input type="checkbox" name="checkbox[<?php echo element('order_id',$orders[$i],'');?>]" class="chkCheck" id="check_<?php echo element('order_id',$orders[$i],'');?>" />
                    </div>
                </td>

                <td>
                    <div align="center" class="title_table_important">
                        <a  title="<?php echo custom_htmlspecialchars(element('order_email',$orders[$i],''));?>"><?php echo element('order_id',$orders[$i],'');?></a>
                    </div>
                </td>
                
                <td>
                    <div align="left" class="title_table_database">
                        <a  title="<?php echo custom_htmlspecialchars(element('order_email',$orders[$i],''));?>"><?php echo element('order_name',$orders[$i],'');?></a>
                    </div>
                </td>
                
                <td>
                    <div align="center" class="title_table_database">
                        <?php echo element('order_phone',$orders[$i],'');?>
                    </div>
                </td>
                
                <?php if($info_content['bool_active']['category']){  ?>
                <td>
                    <div align="center">
                        <?php echo element('cate_name',$orders[$i],'');?>
                    </div>
                </td>
                <?php } ?>
                
                <td>
                    <div align="center">
                        <?php echo element('order_address',$orders[$i],'');?>
                    </div>
                </td>
                
                <td>
                    <div align="center">
                        <a class="<?php echo ($authorization['update'])?"":"alert_authorization_update" ?>" title="<?php echo $info_content['action_update']?>"href="<?php echo ($authorization['update'])?base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false)."/".element('order_id',$orders[$i],''):"#";?>">
                            <img alt="update" width="18" height="18" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/action/update.png"/>
                        </a>
                    </div>
                </td>

                <td>
                    <div align="center">
                        <a delete_param="<?php echo element('order_id',$orders[$i],'') ?>" class="<?php echo ($authorization['delete'])?"ajax_delete_item":"alert_authorization_delete"?>" title="<?php echo $info_content['action_delete']?>">
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
echo $this->session->flashdata('add_update_order');
}
?>