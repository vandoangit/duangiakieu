<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!$info_content['ajax_show_manager']){
?>
<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ajax/user.js"></script>

<script language="javascript">
    $$(document).ready(function(){
        
        data_tables_aoColumnDefs=[
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[0]
            },
            {
                "sSortDataType"     :"dom-div",
                "sType"             :"numeric",
                "bSearchable"       :false,
                "aTargets"          :[1]
            },
            {
                "sSortDataType"     :"dom-div",
                "bSearchable"       :true,
                "aTargets"          :[2]
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[3]
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
                    <select name="select_user" class="ajax_select_filter" style="visibility:hidden">
                        <option value="<?php echo $this->uri->segment(4,true);?>">Hồ Minh Trí</option>
                    </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                <?php echo ($authorization['control'])?"<a href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['control'],false)."/".element('sub_menu_function',$sub_menu['control'],false)."' class='back_button_all_admin_site' title='".$info_content['action_back']."'>".$info_content['action_back']."</a>":""?>
                <a class="delete_items_menu delete_all_admin_site" title="<?php echo $info_content['action_delete'] ?>"><?php echo $info_content['action_delete'] ?></a>
            </div>
        </div>
    </div>
    
    <div class="content_admin_body">
        <div class="content_admin_body_authorization">
            <div class="content_admin_body_left">
            <form name="form_manager_content" id="form_manager_content" action="" method="post">
                <input type="hidden" id="hidden_input_update"        value=""/>
                <input type="hidden" id="hidden_input_authorization" value=""/>

                <table id="data_tables_sort" class="content_admin_body_table" cellspacing="0px" cellpadding="0px" style="width:460px">
                <thead>
                <tr>
                    <th width="35" class="right"><input type="checkbox" id="chkCheckAll"/></th>
                    
                    <th width="60">ID</th>

                    <th width="280"><?php echo $info_content['user_group_name']?></th>

                    <th width="40" class="right"><?php echo $info_content['action_delete'] ?></th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th class="right"></th>
                    
                    <th>ID</th>

                    <th><?php echo $info_content['user_group_name']?></th>

                    <th class="right"><?php echo $info_content['action_delete'] ?></th>
                </tr>
                </tfoot>

                <tbody>
                <?php
}
                if(is_array($authorization_user)){

                    for($i=0;$i<count($authorization_user);$i++){
                    ?>
                    <tr class="gradeC">
                        <td>
                            <div align="center">
                                <input type="checkbox" name="checkbox[<?php echo element('user_group_id',$authorization_user[$i],'');?>]" class="chkCheck" id="check_<?php echo element('user_group_id',$authorization_user[$i],'');?>" />
                            </div>
                        </td>

                        <td>
                            <div align="center" class="title_table_important">
                                <?php echo element('user_group_id',$authorization_user[$i],'');?>
                            </div>
                        </td>
                        
                        <td>
                            <div align="left" class="title_table_database">
                                <?php
                                    echo ($authorization['group'])?"<a style='cursor:pointer' title='".element('user_group_name',$authorization_user[$i],'')."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['group'],false)."/".element('sub_menu_function',$sub_menu['group'],false)."/".element('user_group_id',$authorization_user[$i],'')."' >".element('user_group_name',$authorization_user[$i],'')."</a>"
                                                                  :"<a title='".element('user_group_name',$authorization_user[$i],'')."' >".element('user_group_name',$authorization_user[$i],'')."</a>";
                                ?>
                            </div>
                        </td>

                        <td>
                            <div align="center">
                                <a delete_param="<?php echo element('user_group_id',$authorization_user[$i],'') ?>" class="ajax_delete_item_authorization" title="<?php echo $info_content['action_delete']?>">
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
        
            <div class="content_admin_body_right">
                <?php
                if(is_array($user)){
                ?>
                <fieldset>
                    <legend><?php echo $info_content['user_authorization_info_user']?></legend>
                    <div class="img_user_avatar">
                    <img src="<?php echo base_src_img(element('user_img',$user,''),"no-avatar.jpg"); ?>" alt="<?php echo element('user_account',$user,'')?>" />
                    </div>
                    <div class="info_user">
                        <ul>
                            <li><?php echo $info_content['user_name'] ?>: <?php echo element('user_name',$user,'')?></li>
                            <li><?php echo $info_content['user_account'] ?>: <?php echo element('user_account',$user,'')?></li>
                            <li><?php echo $info_content['user_gender'] ?>: <span><?php echo (element('user_gender',$user,'')==1)?$info_content['user_male']:$info_content['user_female'];?></span></li>
                            <li><?php echo $info_content['user_birthday'] ?>: <span><?php echo date('d-m-Y',strtotime(element('user_birthday',$user,'')));?></span></li>
                            <li><?php echo $info_content['user_phone'] ?>: <span><?php echo element('user_phone',$user,'')?></span></li>
                            <li><?php echo $info_content['user_email'] ?>: <span><a href="mailto:<?php echo element('user_email',$user,'');?>"><?php echo element('user_email',$user,'')?></a></span></li>
                            <li><?php echo $info_content['user_address'] ?>: <span><?php echo element('user_address',$user,'')?></span></li>
                            <li><?php echo $info_content['user_web'] ?>: <span><a href="<?php echo element('user_web',$user,'');?>" target="_blank"><?php echo element('user_web',$user,'')?></a></span></li>
                            <li><?php echo $info_content['user_fax'] ?>: <span><?php echo element('user_fax',$user,'')?></span></li>
                        </ul>
                    </div>
                </fieldset>
                <?php
                }
                ?>
                <br/>
                <fieldset>
                    <legend><?php echo $info_content['user_authorization_info_add']?></legend>
                    <div class="authorization_add">
                    <form name="form_add_content" id="form_add_content" action="" method="post">
                    <ul>
                        <li>
                            <span><?php echo $info_content['user_authorization_select_group'] ?></span>
                            <select name="select_authorization_user" id="select_authorization_user" class="validate[custom_select[-1]] select_authorization">
                                <option value="-1">&nbsp;&nbsp;&nbsp;<?php echo $info_content['option_select'];?></option>
                                <?php
                                if(is_array($user_group)){

                                    for($i=0;$i<count($user_group);$i++){
                                    ?>
                                        <option value="<?php echo element('user_group_id',$user_group[$i],'')?>">&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('user_group_name',$user_group[$i],'');?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </li>

                        <li>
                            <input type="submit" name="button_authorization_user" class="button_add_admin" value="<?php echo $info_content['authorization_add']?>" /> 
                        </li>
                    </ul>
                    </form>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    
    <div class="function_admin_body">
        <div class="function_admin_body_left">
            <div class="function_admin_body_right">
                <?php echo ($authorization['control'])?"<a href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['control'],false)."/".element('sub_menu_function',$sub_menu['control'],false)."' class='back_button_all_admin_site' title='".$info_content['action_back']."'>".$info_content['action_back']."</a>":""?>
                <a class="delete_items_menu delete_all_admin_site" title="<?php echo $info_content['action_delete'] ?>"><?php echo $info_content['action_delete'] ?></a>
            </div>
        </div>
    </div>
</div>
<?php
echo $info_content['message_session_flash'];
}
?>