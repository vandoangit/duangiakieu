<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!$info_content['ajax_show_manager']){
?>
<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ajax/menu_admin.js"></script>
<script language="javascript">
    $$(document).ready(function(){
        
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
            {
                "sSortDataType"     :"dom-div-date",
                "bSearchable"       :true,
                "aTargets"          :[4]
            },
            {
                "sSortDataType"     :"dom-div-public",
                "bSearchable"       :false,
                "aTargets"          :[5]
            },
            {
                "sSortDataType"     :"dom-div",
                "sType"             :"numeric",
                "bSearchable"       :false,
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
            <?php
                echo "<a class='add_all_admin_site' title='Thêm' href='".base_url().ADMIN_DIR_VIRTUAL."/menu_admin/add'>Thêm</a>";
                echo "<a class='delete_items_menu delete_all_admin_site' title='Xóa'>Xóa</a>";
                echo "<a class='update_items_menu update_all_admin_site' title='Update'>Sửa</a>";
            ?>    
            </div>
        </div>
    </div>
    
    <div class="content_admin_body">
    <form name="form_manager_content" id="form_manager_content" action="" method="post">
        <input type="hidden" id="hidden_input_update"        value="menu_admin/update"/>
        <input type="hidden" id="hidden_input_authorization" value=""/>
        
        <table id="data_tables_sort" class="content_admin_body_table" cellspacing="0px" cellpadding="0px">
        <thead>
        <tr>
            <th width="35">TT</th>
            
            <th width="35" class="right"><input type="checkbox" id="chkCheckAll"/></th>

            <th width="120">Menu Class</th>

            <th width="330">Menu Name</th>

            <th width="100">Ngày Cập Nhật</th>
            
            <th width="65">Hiển Thị</th>
            
            <th width="65">Sắp Xếp</th>
            
            <th width="40" class="right">Sửa</th>

            <th width="40" class="right">Xóa</th>
        </tr>
        </thead>
        
        <tfoot>
        <tr>
            <th>TT</th>
            
            <th class="right"></th>

            <th>Menu Class</th>

            <th>Menu Name</th>

            <th>Ngày Cập Nhật</th>
            
            <th>Hiển Thị</th>
            
            <th>Sắp Xếp</th>
            
            <th class="right">Sửa</th>

            <th class="right">Xóa</th>
        </tr>
        </tfoot>
        
        <tbody>
        <?php
}
        if(is_array($menu_admin)){
            
            for($i=0;$i<count($menu_admin);$i++){
            ?>
            <tr class="gradeC">
                <td>
                    <div align="center" class="title_table_database">
                        <?php echo $i;?>
                    </div>
                </td>
                
                <td>
                    <div align="center">
                        <input type="checkbox" name="checkbox[<?php echo element('menu_class',$menu_admin[$i],'');?>]" class="chkCheck" id="check_<?php echo element('menu_class',$menu_admin[$i],'');?>" />
                    </div>
                </td>
                    
                <td>
                    <div align="left" class="title_table_important">
                        <?php echo element('menu_class',$menu_admin[$i],'');?>
                    </div>
                </td>
                
                <td>
                    <div align="left" class="title_table_database">
                        <?php echo element('menu_name',$menu_admin[$i],'');?>
                    </div>
                </td>
                
                <td>
                    <div align="center">
                        <?php echo date('d-m-Y',strtotime(element('menu_update_date',$menu_admin[$i],''))); ?>
                    </div>
                </td>
                
                <td>
                    <?php
                        $public=(element('menu_public',$menu_admin[$i],'')==1)?"ajax_public_yes":"ajax_public_no";
                        echo "<div align='center' class='".$public." ajax_update_public' update_public_param='".element('menu_class',$menu_admin[$i],'')."' >&nbsp;</div> ";
                    ?>
                </td>
                
                <td>
                    <?php
                        echo "<div align='center' class='ajax_update_order_input' update_order_param='".element('menu_class',$menu_admin[$i],'')."' >".element('menu_order',$menu_admin[$i],'')."</div> ";
                    ?>
                </td>
                
                <td>
                    <div align="center">
                        <a title="Update" href="<?php echo base_url().ADMIN_DIR_VIRTUAL."/menu_admin/update/".element('menu_class',$menu_admin[$i],'');?>">
                            <img alt="update" width="18" height="18" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/action/update.png"/>
                        </a>
                    </div>
                </td>

                <td>
                    <div align="center">
                        <a delete_param="<?php echo element('menu_class',$menu_admin[$i],'') ?>" class="ajax_delete_item" title="Xóa">
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
            <?php
                echo "<a class='add_all_admin_site' title='Thêm' href='".base_url().ADMIN_DIR_VIRTUAL."/menu_admin/add'>Thêm</a>";
                echo "<a class='delete_items_menu delete_all_admin_site' title='Xóa'>Xóa</a>";
                echo "<a class='update_items_menu update_all_admin_site' title='Update'>Sửa</a>";
            ?>   
            </div>
        </div>
    </div>
</div>
<?php
echo $info_content['message_session_flash'];
echo $this->session->flashdata('add_update_menu_admin');
}
?>