<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí //Xac  nhan hoan thanh
	
 //Title Admin
 1. class ajax_select_filter dung cho su kien ajax loc

 //Function    
 Them 
 1.class alert_authorization_add dung de thong bao co quyen them hay k
  
 Delete
 1.class  alert_authorization_delete dung de thong bao co quyen hay k
 2.class  delete_items_menu thuc hien thuc nang delete
 3.name form_manager_content form delete phai co ten form_manager_content de submit 
  
 Update
 1.class  alert_authorization_update dung de thong bao co quyen hay k
 2.class  update_items_menu thuc hien chuc nang update 
 3.class  hidden_input_update 1 input an dung de truyen du lieu duong dan cho trang update
  
 Authorization
 1.class  alert_authorization_update dung de thong bao co quyen hay k
 2.class  update_items_menu thuc hien chuc nang authorization 
 3.class  hidden_input_update 1 input an dung de truyen du lieu duong dan cho trang authorizaiton  
  
  //Content 
 1. id chkCheckAll va class chkCheck dung de check all
 2.class  ajax_delete_item dung de xoa du lieu tung de muc
 3.ket hop voi ajax_delete_item la thuoc tinh delete_param de truyen tham so xoa
 
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!$info_content['ajax_show_manager']){
?>
<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ajax/user.js"></script>
<script language="javascript">
    (function($){
        
        $.alert_authorization_body = function(){
            
            $('#content').delegate('#content .alert_authorization_add','click', function(){
                alert("<?php echo $info_content['alert_authorization_add_user'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_delete','click', function(){
                alert("<?php echo $info_content['alert_authorization_delete_user'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_update','click', function(){
                alert("<?php echo $info_content['alert_authorization_update_user'];?>");
                return false;
            });
            
            $('#content').delegate('#content .alert_authorization_author','click', function(){
                alert("<?php echo $info_content['alert_authorization_author_user'];?>");
                return false;
            });
            return this;
      };  
    })(jQuery);
    
    $$(document).ready(function(){
        $$.alert_authorization_body();
        
        data_tables_aoColumnDefs=[
             {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[0]
            },
            {
                "sSortDataType"     :"dom-div",
                "bSearchable"       :true,
                "aTargets"          :[1]
            },
            {
                "sSortDataType"     :"dom-div",
                "bSearchable"       :true,
                "aTargets"          :[2]
            },
            {
                "sSortDataType"     :"dom-div",
                "bSearchable"       :false,
                "aTargets"          :[3]
            },
            {
                "sSortDataType"     :"dom-div",
                "bSearchable"       :true,
                "aTargets"          :[4]
            },
            {
                "sSortDataType"     :"dom-div-date",
                "sType"             :"numeric",
                "bSearchable"       :false,
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
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[8]
            }
        ]
        $$("#data_tables_sort").data_table_custom({"aaSorting":[[1,"asc"]]});
        
    });
</script> 

<div id="content">
    
    <div class="title_admin_body">
        <div class="title_admin_body_left">
            <div class="title_admin_body_right">
                <div class="title_admin_content_left"><?php echo $title_function;?></div>                
                <div class="title_admin_content_right">
                    <div class="title_admin_content_right_1">
                    <span><?php echo $info_content['user_control_filter'];?></span>
                    <!--filter_body_function dung cho su kien ajax-->
                    <select name="select_user_group" class="ajax_select_filter">
                        <option value="all">&nbsp;&nbsp;&nbsp;<?php echo $info_content['option_select_all'];?></option>
                        <?php
                        if(is_array($user_group)){
                            
                            for($i=0;$i<count($user_group);$i++){
                            ?>
                                <option value="<?php echo element('user_group_id',$user_group[$i],'') ?>" <?php if($this->uri->segment(4,'all')==element('user_group_id',$user_group[$i],'')) echo "selected" ?>>&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('user_group_name',$user_group[$i],'');?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                <!--alert_authorization_add,alert_authorization_delete,alert_authorization_update dung cho viec thong bao quyen -->
                <!--delete_items_menu,update_items_menu,authorization_items_menu dung cho cac chuc nang them,xoa,phan quyen,sua -->
                <?php echo ($authorization['add'])  ?"<a class='add_all_admin_site' title='".$info_content['action_add']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['add'],false)."/".element('sub_menu_function',$sub_menu['add'],false)."'>".$info_content['action_add']."</a>"
                                                    :"<a class='alert_authorization_add add_all_admin_site' title='".$info_content['action_add']."' href='#' onclick='return false'>".$info_content['action_add']."</a>" ?>
                <a class="<?php echo ($authorization['delete'])?"delete_items_menu":"alert_authorization_delete"?> delete_all_admin_site" title="<?php echo $info_content['action_delete'] ?>"><?php echo $info_content['action_delete'] ?></a>
                <a class="<?php echo ($authorization['update'])?"update_items_menu":"alert_authorization_update"?> update_all_admin_site" title="<?php echo $info_content['action_update'] ?>"><?php echo $info_content['action_update'] ?></a>
                <a class="<?php echo ($authorization['authorization'])?"authorization_items_menu":"alert_authorization_author"?> authorization_all_admin_site" title="<?php echo $info_content['action_authorization'] ?>"><?php echo $info_content['action_authorization'] ?></a>
            </div>
        </div>
    </div>
    
    <div class="content_admin_body">
     <!-- form_manager_content dung cho viec delele submit-->
    <form name="form_manager_content" id="form_manager_content" action="" method="post">
        <!-- hidden_input_update hidden_input_authorization dung de truyen duong dan cho update va phan quyen-->
        <input type="hidden" id="hidden_input_update"        value="<?php echo element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false) ?>"/>
        <input type="hidden" id="hidden_input_authorization" value="<?php echo element('menu_class',$sub_menu['authorization'],false)."/".element('sub_menu_function',$sub_menu['authorization'],false) ?>"/>
        
        <table id="data_tables_sort" class="content_admin_body_table" cellspacing="0px" cellpadding="0px">
        <thead>
        <tr>
            <!--chkCheckAll dung de check all-->
            <th width="30" class="right"><input type="checkbox" id="chkCheckAll"/></th>
            
            <th width="110"><?php echo $info_content['user_account']?></th>

            <th width="170"><?php echo $info_content['user_name'] ?></th>

            <th width="65"><?php echo $info_content['user_gender'] ?></th>

            <th width="185"><?php echo $info_content['user_email'] ?></th>

            <th width="100"><?php echo $info_content['user_create_date'] ?></th>

            <th width="85" class="right"><?php echo $info_content['action_authorization'] ?></th>

            <th width="40" class="right"><?php echo $info_content['action_update'] ?></th>

            <th width="40" class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </thead>
        
        <tfoot>
        <tr>
            <th class="right"></th>
            
            <th><?php echo $info_content['user_account']?></th>

            <th><?php echo $info_content['user_name'] ?></th>

            <th><?php echo $info_content['user_gender'] ?></th>

            <th><?php echo $info_content['user_email'] ?></th>

            <th><?php echo $info_content['user_create_date'] ?></th>

            <th class="right"><?php echo $info_content['action_authorization'] ?></th>

            <th class="right"><?php echo $info_content['action_update'] ?></th>

            <th class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </tfoot>
        
        <tbody>
        <?php
}
        if(is_array($user)){
            
            for($i=0;$i<count($user);$i++){
            ?>
            <tr class="gradeC">
                <td>
                    <div align="center">
                        <!-- classs chkCheck dung de check all,id check_fjsldf dung de cho cac chuc nang them xoa sua-->
                        <input type="checkbox" name="checkbox[<?php echo element('user_account',$user[$i],'');?>]" class="chkCheck" id="check_<?php echo element('user_account',$user[$i],'');?>" />
                    </div>
                </td>
 
                <td>
                    <div align="left" class="title_table_important">
                       <a  title="<?php echo element('user_name',$user[$i],'');?>"><?php echo element('user_account',$user[$i],'');?></a>
                    </div>
                </td>
                
                <td>
                    <div align="left" class="title_table_database">
                        <?php echo element('user_name',$user[$i],''); ?>
                    </div>
                </td>
                    
                <td>
                    <div align="center">
                        <?php echo (element('user_gender',$user[$i],'')==1)?$info_content['user_male']:$info_content['user_female'];?>
                    </div>
                </td>
                    
                <td>
                    <div align="left" class="link_table">
                        <a title="<?php echo custom_htmlspecialchars($info_content['user_phone'].": ".element('user_phone',$user[$i],''));?>" href="mailto:<?php echo element('user_email',$user[$i],'');?>"><?php echo element('user_email',$user[$i],'') ?></a>
                    </div>
                </td>
                    
                <td>
                    <div align="center">
                        <?php echo date('d-m-Y',strtotime(element('user_create_date',$user[$i],'')));?>
                    </div>
                </td>
                    
                <td>
                    <div align="center">
                        <a class="<?php echo ($authorization['authorization'])?"":"alert_authorization_author" ?>" title="<?php echo $info_content['action_authorization']?>" href="<?php echo ($authorization['authorization'])?base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['authorization'],false)."/".element('sub_menu_function',$sub_menu['authorization'],false)."/".element('user_account',$user[$i],''):"#";?>">
                            <img alt="authorization" width="18" height="18" style="padding:3px 0px" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/action/authorization.png"/>
                        </a>
                    </div>
                </td>

                <td>
                    <div align="center">
                        <a class="<?php echo ($authorization['update'])?"":"alert_authorization_update" ?>" title="<?php echo $info_content['action_update']?>" href="<?php echo ($authorization['update'])?base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false)."/".element('user_account',$user[$i],''):"#";?>">
                            <img alt="update" width="18" height="18" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/action/update.png"/>
                        </a>
                    </div>
                </td>

                <td>
                    <div align="center">
                        <!-- ajax_delete_item dung cho viec xoa ajax,delete_param tham so de truyen vao -->
                        <a delete_param="<?php echo element('user_account',$user[$i],'') ?>" class="<?php echo ($authorization['delete'])?"ajax_delete_item":"alert_authorization_delete"?>" title="<?php echo $info_content['action_delete']?>">
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
                <!--alert_authorization_add,alert_authorization_delete,alert_authorization_update dung cho viec thong bao quyen -->
                <!--delete_items_menu,update_items_menu,authorization_items_menu dung cho cac chuc nang them,xoa,phan quyen,sua -->
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
echo $this->session->flashdata('add_update_user');
}
?>