<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');

if($authorization['email']){
    
    if(!$info_content['ajax_show_manager']){
    ?>
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ajax/support_other.js"></script>
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
                        <select name="select_categroy_support_orther" class="ajax_select_filter">
                            <option value="all">&nbsp;&nbsp;&nbsp;<?php echo $info_content['option_select_all'];?></option>
                            <?php echo $category_support_other; ?>
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
                <?php
                    echo "<a class='add_all_admin_site' title='".$info_content['action_add']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['email'],false)."/addemail'>".$info_content['action_add']."</a>";
                    echo "<a class='delete_items_menu delete_all_admin_site' title='".$info_content['action_delete']."'>".$info_content['action_delete']."</a>";
                    echo "<a class='update_items_menu update_all_admin_site' title='".$info_content['action_update']."'>".$info_content['action_update']."</a>";
                ?>
                </div>
            </div>
        </div>

        <div class="content_admin_body">
        <form name="form_manager_content" id="form_manager_content" action="" method="post">
            <input type="hidden" id="hidden_input_menu_class"       value="<?php echo $info_content['active_menu_class']; ?>"/>
            <input type="hidden" id="hidden_input_update"        value="<?php echo element('menu_class',$sub_menu['email'],false)."/upemail" ?>"/>
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
            if(is_array($support_other)){

                for($i=0;$i<count($support_other);$i++){
                ?>
                <tr class="gradeC">
                    <td>
                        <div align="center" class="title_table_important">
                            <?php echo element('support_id',$support_other[$i],'');?>
                        </div>
                    </td>

                    <td>
                        <div align="center">
                            <input type="checkbox" name="checkbox[<?php echo element('support_id',$support_other[$i],'');?>]" class="chkCheck" id="check_<?php echo element('support_id',$support_other[$i],'');?>" />
                        </div>
                    </td>

                    <td>
                        <div align="left" class="title_table_important">
                           <a title="<?php echo custom_htmlspecialchars(element('support_name',$support_other[$i],''));?>"><?php echo element('support_nick',$support_other[$i],'');?></a>
                        </div>
                    </td>

                    <td>
                        <div align="center" class="title_table_database" >
                            <?php echo element('support_name',$support_other[$i],''); ?>
                        </div>
                    </td>

                   <?php if($info_content['bool_active']['category']){  ?>  

                    <td>
                        <div align="center">
                            <?php echo element('cate_name',$support_other[$i],''); ?>
                        </div>
                    </td>
                    <?php } ?>

                    <td>
                        <div align="center">
                           <?php echo show_status_support(element('cate_id',$support_other[$i],''),$support_other[$i],2);?>
                        </div>
                    </td>

                    <td>
                        <?php
                            $public=(element('support_public',$support_other[$i],'')==1)?"ajax_public_yes":"ajax_public_no";
                            echo "<div align='center' class='".$public." ajax_update_public' update_public_param='".element('support_id',$support_other[$i],'')."' >&nbsp;</div>";
                        ?>
                    </td>

                    <td>
                        <?php
                            echo "<div align='center' class='ajax_update_order_input' update_order_param='".element('support_id',$support_other[$i],'')."' >".element('support_order',$support_other[$i],'')."</div>";                   
                        ?>
                    </td>

                    <td>
                        <div align="center">
                            <a  title="<?php echo $info_content['action_update']?>" href="<?php echo base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['email'],false)."/upemail/".element('support_id',$support_other[$i],'');?>">
                                <img alt="update" width="18" height="18" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/action/update.png"/>
                            </a>
                        </div>
                    </td>

                    <td>
                        <div align="center">
                            <a delete_param="<?php echo element('support_id',$support_other[$i],'') ?>" class="ajax_delete_item" title="<?php echo $info_content['action_delete']?>">
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
                    echo "<a class='add_all_admin_site' title='".$info_content['action_add']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['email'],false)."/addemail'>".$info_content['action_add']."</a>";
                    echo "<a class='delete_items_menu delete_all_admin_site' title='".$info_content['action_delete']."'>".$info_content['action_delete']."</a>";
                    echo "<a class='update_items_menu update_all_admin_site' title='".$info_content['action_update']."'>".$info_content['action_update']."</a>";
                ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo $info_content['message_session_flash'];
    echo $this->session->flashdata('add_update_support_other');
    }
}
?>