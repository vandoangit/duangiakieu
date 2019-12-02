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
    $$(document).ready(function(){
        
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
                    <select name="select_user_group" class="ajax_select_filter" style="visibility:hidden">
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

                <table id="data_tables_sort" class="content_admin_body_table" style="width:460px" cellspacing="0px" cellpadding="0px">
                <thead>
                <tr>
                    <th width="35" class="right"><input type="checkbox" id="chkCheckAll"/></th>

                    <th width="120">ID</th>
                    
                    <th width="225"><?php echo $info_content['group_authorization_label']?></th>

                    <th width="40" class="right"><?php echo $info_content['action_delete'] ?></th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th class="right"></th>

                    <th>ID</th>

                    <th><?php echo $info_content['group_authorization_label']?></th>

                    <th class="right"><?php echo $info_content['action_delete'] ?></th>
                </tr>
                </tfoot>

                <tbody>
                <?php
}
                if(is_array($authorization_user_group)){

                    for($i=0;$i<count($authorization_user_group);$i++){
                    ?>
                    <tr class="gradeC">
                        <td>
                            <div align="center">
                                <input type="checkbox" name="checkbox[<?php echo element('menu_class',$authorization_user_group[$i],'')."/".element('sub_menu_function',$authorization_user_group[$i],'');?>]" class="chkCheck" id="check_<?php echo element('menu_class',$authorization_user_group[$i],'')."/".element('sub_menu_function',$authorization_user_group[$i],'');?>" />
                            </div>
                        </td>

                        <td>
                            <div align="left" class="title_table_important">
                                <?php echo element('menu_class',$authorization_user_group[$i],'')."-".element('sub_menu_function',$authorization_user_group[$i],'');?>
                            </div>
                        </td>
                        
                        <td>
                            <div align="left" class="title_table_database">
                                <?php echo element('sub_menu_name',$authorization_user_group[$i],''); ?>
                            </div>
                        </td>

                        <td>
                            <div align="center">
                                <a delete_param="<?php echo element('menu_class',$authorization_user_group[$i],'')."/".element('sub_menu_function',$authorization_user_group[$i],'') ?>" class="ajax_delete_item_authorization" title="<?php echo $info_content['action_delete']?>">
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
                if(is_array($user_group)){
                ?>
                <fieldset>
                    <legend><?php echo $info_content['group_authorization_info_group']?></legend>
                    <div class="info_user" id="info_group">
                        <ul>
                            <li><?php echo $info_content['user_group_id'] ?>: <?php echo element('user_group_id',$user_group,'')?></li>
                            <li><?php echo $info_content['user_group_name'] ?>: <?php echo element('user_group_name',$user_group,'')?></li>
                            <li><?php echo $info_content['user_group_create_date'] ?>: <span><?php echo date('d-m-Y',strtotime(element('user_group_create_date',$user_group,'')))?></span></li>
                            <li><?php echo $info_content['user_group_update_date'] ?>: <span><?php echo date('d-m-Y',strtotime(element('user_group_update_date',$user_group,'')))?></span></li>
                        </ul>
                    </div>
                </fieldset>
                <?php
                }
                ?>
                <br/>
                <fieldset>
                    <legend><?php echo $info_content['group_authorization_info_add']?></legend>
                    <div class="authorization_add">
                    <form name="form_add_content" id="form_add_content" action="" method="post">
                    <ul>
                        <li>
                            <span><?php echo $info_content['group_authorization_function']?></span>
                            <select name="select_authorization_group" id="select_authorization_group" class="select_authorization">
                                <option value="all/all" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;<?php echo $info_content['option_select_all'];?></option>
                                <?php
                                if(is_array($menu_authorization)){

                                    foreach($menu_authorization as $key=>$value){
                                        if($value['sub_menu_admin']){
                                        ?>   
                                            <optgroup label="<?php echo $this->exsec_string->str_ucwords(element('menu_name',$value,'')); ?>">
                                            <?php
                                            if(is_array($value['sub_menu_admin'])){

                                                foreach($value['sub_menu_admin'] as $key_sub=>$value_sub){
                                                ?>
                                                    <option value="<?php echo element('menu_class',$value,'')."/".element('sub_menu_function',$value_sub,'')?>">&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $this->exsec_string->str_ucwords(element('sub_menu_name',$value_sub,''));?></option>    
                                                <?php
                                                }
                                            }
                                            ?>
                                            </optgroup>
                                        <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </li>

                        <li>
                            <input type="submit" name="button_authorization_group" class="button_add_admin" value="<?php echo $info_content['authorization_add']?>" />    
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