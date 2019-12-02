<?php
/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

if(!$info_content['ajax_show_manager']){
    ?>
    <script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ajax/facebook.js"></script>
    <script language="javascript">
        (function($){

            $.alert_authorization_body=function(){

                $('#content').delegate('#content .alert_authorization_add','click',function(){
                    alert("<?php echo $info_content['alert_authorization_add_facebook'];?>");
                    return false;
                });

                $('#content').delegate('#content .alert_authorization_delete','click',function(){
                    alert("<?php echo $info_content['alert_authorization_delete_facebook'];?>");
                    return false;
                });

                $('#content').delegate('#content .alert_authorization_update','click',function(){
                    alert("<?php echo $info_content['alert_authorization_update_facebook'];?>");
                    return false;
                });
                return this;
            };
        })(jQuery);

        $$(document).ready(function(){
            $$.alert_authorization_body();

            data_tables_aoColumnDefs=[
                {
                    "sSortDataType":"dom-div",
                    "sType":"numeric",
                    "bSearchable":false,
                    "aTargets":[0]
                },
                {
                    "bSearchable":false,
                    "bSortable":false,
                    "aTargets":[1]
                },
                {
                    "sSortDataType":"dom-div",
                    "bSearchable":true,
                    "aTargets":[2]
                },
                {
                    "sSortDataType":"dom-div",
                    "bSearchable":true,
                    "aTargets":[3]
                },
                {
                    "sSortDataType":"dom-div-public",
                    "bSearchable":false,
                    "aTargets":[4]
                },
                {
                    "sSortDataType":"dom-div-public",
                    "bSearchable":false,
                    "aTargets":[5]
                },
                {
                    "sSortDataType":"dom-div-public",
                    "bSearchable":false,
                    "aTargets":[6]
                },
                {
                    "sSortDataType":"dom-div-public",
                    "bSearchable":false,
                    "aTargets":[7]
                },
                {
                    "sSortDataType":"dom-div-public",
                    "bSearchable":false,
                    "aTargets":[8]
                },
                {
                    "sSortDataType":"dom-div-public",
                    "bSearchable":false,
                    "aTargets":[8]
                },
                {
                    "bSearchable":false,
                    "bSortable":false,
                    "aTargets":[10]
                },
                {
                    "bSearchable":false,
                    "bSortable":false,
                    "aTargets":[11]
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
                    <?php echo ($authorization['add']) ? "<a class='add_all_admin_site' title='".$info_content['action_add']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['add'],false)."/".element('sub_menu_function',$sub_menu['add'],false)."'>".$info_content['action_add']."</a>" : "<a class='alert_authorization_add add_all_admin_site' title='".$info_content['action_add']."' href='#' onclick='return false'>".$info_content['action_add']."</a>"
                    ?>
                    <a class="<?php echo ($authorization['delete']) ? "delete_items_menu" : "alert_authorization_delete"?> delete_all_admin_site" title="<?php echo $info_content['action_delete']?>"><?php echo $info_content['action_delete']?></a>
                    <a class="<?php echo ($authorization['update']) ? "update_items_menu" : "alert_authorization_update"?> update_all_admin_site" title="<?php echo $info_content['action_update']?>"><?php echo $info_content['action_update']?></a>
                </div>
            </div>
        </div>

        <div class="content_admin_body">
            <form name="form_manager_content" id="form_manager_content" action="" method="post">
                <input type="hidden" id="hidden_input_update"        value="<?php echo element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false)?>"/>
                <input type="hidden" id="hidden_input_authorization" value=""/>

                <table id="data_tables_sort" class="content_admin_body_table" cellspacing="0px" cellpadding="0px">
                    <thead>
                        <tr>
                            <th width="35">ID</th>

                            <th width="35" class="right"><input type="checkbox" id="chkCheckAll"/></th>

                            <th width="160"><?php echo $info_content['facebook_name']?></th>

                            <th width="95"><?php echo $info_content['facebook_user']?></th>

                            <th width="65"><?php echo $info_content['facebook_post_bool']?></th>

                            <th width="65"><?php echo $info_content['facebook_friend_bool']?></th>

                            <th width="65"><?php echo $info_content['facebook_photo_bool']?></th>

                            <th width="65"><?php echo $info_content['facebook_comment_bool']?></th>

                            <th width="65"><?php echo $info_content['facebook_like_bool']?></th>

                            <th width="65"><?php echo $info_content['facebook_like_fanface_bool']?></th>

                            <th width="40" class="right"><?php echo $info_content['action_update']?></th>

                            <th width="40" class="right"><?php echo $info_content['action_delete']?></th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>ID</th>

                            <th class="right"></th>

                            <th><?php echo $info_content['facebook_name']?></th>

                            <th><?php echo $info_content['facebook_user']?></th>

                            <th><?php echo $info_content['facebook_post_bool']?></th>

                            <th><?php echo $info_content['facebook_friend_bool']?></th>

                            <th><?php echo $info_content['facebook_photo_bool']?></th>

                            <th><?php echo $info_content['facebook_comment_bool']?></th>

                            <th><?php echo $info_content['facebook_like_bool']?></th>

                            <th><?php echo $info_content['facebook_like_fanface_bool']?></th>

                            <th class="right"><?php echo $info_content['action_update']?></th>

                            <th class="right"><?php echo $info_content['action_delete']?></th>
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php
                    }
                    if(is_array($facebook)){

                        for($i=0; $i < count($facebook); $i++){
                            ?>
                            <tr class="gradeC">
                                <td>
                                    <div align="center" class="title_table_database">
                                        <?php echo element('facebook_id',$facebook[$i],'');?>
                                    </div>
                                </td>

                                <td>
                                    <div align="center">
                                        <input type="checkbox" name="checkbox[<?php echo element('facebook_id',$facebook[$i],'');?>]" class="chkCheck" id="check_<?php echo element('facebook_id',$facebook[$i],'');?>" />
                                    </div>
                                </td>

                                <td>
                                    <div align="left" class="title_table_database">
                                        <?php echo element('facebook_name',$facebook[$i],'');?>
                                    </div>
                                </td>

                                <td>
                                    <div align="left" class="title_table_database">
                                        <?php echo element('facebook_user',$facebook[$i],'');?>
                                    </div>
                                </td>

                                <td>
                                    <?php
                                    $facebook_post_bool=(element('facebook_post_bool',$facebook[$i],'') == 1) ? "ajax_public_yes" : "ajax_public_no";
                                    echo ($authorization['update']) ? "<div align='center' class='".$facebook_post_bool." ajax_update_facebook_post' update_public_param='".element('facebook_id',$facebook[$i],'')."' >&nbsp;</div> " : "<div align='center' class='".$facebook_post_bool."' >&nbsp;</div>";
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    $facebook_friend_bool=(element('facebook_friend_bool',$facebook[$i],'') == 1) ? "ajax_public_yes" : "ajax_public_no";
                                    echo ($authorization['update']) ? "<div align='center' class='".$facebook_friend_bool." ajax_update_facebook_friend' update_public_param='".element('facebook_id',$facebook[$i],'')."' >&nbsp;</div> " : "<div align='center' class='".$facebook_friend_bool."' >&nbsp;</div>";
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    $facebook_photo_bool=(element('facebook_photo_bool',$facebook[$i],'') == 1) ? "ajax_public_yes" : "ajax_public_no";
                                    echo ($authorization['update']) ? "<div align='center' class='".$facebook_photo_bool." ajax_update_facebook_photo' update_public_param='".element('facebook_id',$facebook[$i],'')."' >&nbsp;</div> " : "<div align='center' class='".$facebook_photo_bool."' >&nbsp;</div>";
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    $facebook_comment_bool=(element('facebook_comment_bool',$facebook[$i],'') == 1) ? "ajax_public_yes" : "ajax_public_no";
                                    echo ($authorization['update']) ? "<div align='center' class='".$facebook_comment_bool." ajax_update_facebook_comment' update_public_param='".element('facebook_id',$facebook[$i],'')."' >&nbsp;</div> " : "<div align='center' class='".$facebook_comment_bool."' >&nbsp;</div>";
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    $facebook_like_bool=(element('facebook_like_bool',$facebook[$i],'') == 1) ? "ajax_public_yes" : "ajax_public_no";
                                    echo ($authorization['update']) ? "<div align='center' class='".$facebook_like_bool." ajax_update_facebook_like' update_public_param='".element('facebook_id',$facebook[$i],'')."' >&nbsp;</div> " : "<div align='center' class='".$facebook_like_bool."' >&nbsp;</div>";
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    $facebook_like_fanface_bool=(element('facebook_like_fanface_bool',$facebook[$i],'') == 1) ? "ajax_public_yes" : "ajax_public_no";
                                    echo ($authorization['update']) ? "<div align='center' class='".$facebook_like_fanface_bool." ajax_update_facebook_like_fanface' update_public_param='".element('facebook_id',$facebook[$i],'')."' >&nbsp;</div> " : "<div align='center' class='".$facebook_like_fanface_bool."' >&nbsp;</div>";
                                    ?>
                                </td>

                                <td>
                                    <div align="center">
                                        <a class="<?php echo ($authorization['update']) ? "" : "alert_authorization_update"?>" title="<?php echo $info_content['action_update']?>" href="<?php echo ($authorization['update']) ? base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false)."/".element('facebook_id',$facebook[$i],'') : "#";?>">
                                            <img alt="update" width="18" height="18" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/action/update.png"/>
                                        </a>
                                    </div>
                                </td>

                                <td>
                                    <div align="center">
                                        <a delete_param="<?php echo element('facebook_id',$facebook[$i],'')?>" class="<?php echo ($authorization['delete']) ? "ajax_delete_item" : "alert_authorization_delete"?>" title="<?php echo $info_content['action_delete']?>">
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
                    <?php echo ($authorization['add']) ? "<a class='add_all_admin_site' title='".$info_content['action_add']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['add'],false)."/".element('sub_menu_function',$sub_menu['add'],false)."'>".$info_content['action_add']."</a>" : "<a class='alert_authorization_add add_all_admin_site' title='".$info_content['action_add']."' href='#' onclick='return false'>".$info_content['action_add']."</a>"
                    ?>
                    <a class="<?php echo ($authorization['delete']) ? "delete_items_menu" : "alert_authorization_delete"?> delete_all_admin_site" title="<?php echo $info_content['action_delete']?>"><?php echo $info_content['action_delete']?></a>
                    <a class="<?php echo ($authorization['update']) ? "update_items_menu" : "alert_authorization_update"?> update_all_admin_site" title="<?php echo $info_content['action_update']?>"><?php echo $info_content['action_update']?></a>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo $info_content['message_session_flash'];
    echo $this->session->flashdata('add_update_facebook');
}
?>