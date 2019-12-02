<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!$info_content['ajax_show_manager']){
?>
<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ajax/comment.js"></script>
<script language="javascript">
    (function($){
        
        $.alert_authorization_body = function(){
            
            $('#content').delegate('#content .alert_authorization_add','click', function(){
                alert("<?php echo $info_content['alert_authorization_add_comment'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_delete','click', function(){
                alert("<?php echo $info_content['alert_authorization_delete_comment'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_update','click', function(){
                alert("<?php echo $info_content['alert_authorization_update_comment'];?>");
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
                "bSearchable"       :true,
                "aTargets"          :[3]
            },
            {
                "sSortDataType"     :"dom-div-public",
                "bSearchable"       :false,
                "aTargets"          :[4]
            },
            {
                "sSortDataType"     :"dom-div-public",
                "bSearchable"       :false,
                "aTargets"          :[5]
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[6]
            }
        ]
        $$("#data_tables_sort").data_table_custom({"aaSorting":[[1,"asc"]]});
        
    });
</script> 

<div id="content">
    
    <div class="title_admin_body">
        <div class="title_admin_body_left">
            <div class="title_admin_body_right">
                <div class="title_admin_content_left"><?php echo $title_function; ?></div>                
                <div class="title_admin_content_right">
                    <div class="title_admin_content_right_1">
                    <span><?php echo $info_content['comment_control_filter']; ?></span>
                    <select name="select_categroy_comment" class="ajax_select_filter">
                    <?php
                    foreach($category_comment as $key=>$value){
                    ?>    
                        <option value="<?php echo element('cate_id',$value); ?>" <?php echo set_select('select_categroy_comment',element('cate_id',$value,''),($this->uri->segment(4,'all_no_surf')==element('cate_id',$value,''))?TRUE:FALSE); ?>>&nbsp;&nbsp;&nbsp;»&nbsp;<?php echo element('cate_name',$value); ?></option>
                    <?php
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
                <a class="<?php echo ($authorization['delete'])?"delete_items_menu":"alert_authorization_delete"?> delete_all_admin_site" title="<?php echo $info_content['action_delete'] ?>"><?php echo $info_content['action_delete'] ?></a>
            </div>
        </div>
    </div>
    
    <div class="content_admin_body">
    <form name="form_manager_content" id="form_manager_content" action="" method="post">
        <input type="hidden" id="hidden_input_update"        value="<?php echo element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false) ?>"/>
        <input type="hidden" id="hidden_input_authorization" value=""/>
        
        <table id="data_tables_sort" class="content_admin_body_table" cellspacing="0px" cellpadding="0px">
        <thead>
        <tr> 
            <th width="35" class="right"><input type="checkbox" id="chkCheckAll"/></th>
            
            <th width="90"><?php echo $info_content['comment_product_news'] ?></th>

            <th width="160"><?php echo $info_content['comment_name'] ?></th>
            
            <th width="385"><?php echo $info_content['comment_content']?></th>

            <th width="75"><?php echo $info_content['comment_surf'] ?></th>

            <th width="65"><?php echo $info_content['comment_public'] ?></th>

            <th width="40" class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </thead>
        
        <tfoot>
        <tr> 
            <th class="right"></th>
            
            <th><?php echo $info_content['comment_product_news'] ?></th>
            
            <th><?php echo $info_content['comment_name'] ?></th>
            
            <th><?php echo $info_content['comment_content']?></th>

            <th><?php echo $info_content['comment_surf'] ?></th>

            <th><?php echo $info_content['comment_public'] ?></th>
            
            <th class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </tfoot>
        
        <tbody>
        <?php
}
        if(is_array($comment)){
            
            for($i=0;$i<count($comment);$i++){
            ?>
            <tr class="gradeC">
                
                <td>
                    <div align="center">
                        <input type="checkbox" name="checkbox[<?php echo element('comment_id',$comment[$i],'');?>]" class="chkCheck" id="check_<?php echo element('comment_id',$comment[$i],'');?>" />
                    </div>
                </td>
                
                <td>
                    <div align="center" class="title_table_database">
                        <?php echo element('comment_product_news',$comment[$i],'');?>
                    </div>
                </td>
                
                <td>
                    <div align="left" class="link_table">
                        <a href="mailto:<?php echo element('comment_email',$comment[$i],'');?>" title="<?php echo custom_htmlspecialchars(element('comment_email',$comment[$i],''));?>"><?php echo element('comment_name',$comment[$i],'');?></a>
                    </div>
                </td>
                
                <td>
                    <div align="left" class="title_table_database" style="padding-bottom:5px;">
                        <?php echo element('comment_title',$comment[$i],'');?>
                    </div>
                    
                    <div align="left">
                        <?php echo element('comment_content',$comment[$i],'');?>
                    </div>
                </td>
                    
                <td>
                    <?php
                        $surf=(element('comment_surf',$comment[$i],'')==1)?"ajax_public_yes":"ajax_public_no";
                        echo ($authorization['update'])?"<div align='center' class='".$surf." ajax_update_surf' update_public_param='".element('comment_id',$comment[$i],'')."' >&nbsp;</div> "
                                                       :"<div align='center' class='".$surf."' >&nbsp;</div>";
                    ?>
                </td>
                
                <td>
                    <?php
                        $public=(element('comment_public',$comment[$i],'')==1)?"ajax_public_yes":"ajax_public_no";
                        echo ($authorization['update'])?"<div align='center' class='".$public." ajax_update_public' update_public_param='".element('comment_id',$comment[$i],'')."' >&nbsp;</div> "
                                                       :"<div align='center' class='".$public."' >&nbsp;</div>";
                    ?>
                </td>
                
                <td>
                    <div align="center">
                        <a delete_param="<?php echo element('comment_id',$comment[$i],'') ?>" class="<?php echo ($authorization['delete'])?"ajax_delete_item":"alert_authorization_delete"?>" title="<?php echo $info_content['action_delete']?>">
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
                <a class="<?php echo ($authorization['delete'])?"delete_items_menu":"alert_authorization_delete"?> delete_all_admin_site" title="<?php echo $info_content['action_delete'] ?>"><?php echo $info_content['action_delete'] ?></a>
            </div>
        </div>
    </div>
</div>
<?php
echo $info_content['message_session_flash'];
echo $this->session->flashdata('add_update_comment');
}
?>