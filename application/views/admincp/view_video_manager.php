<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!$info_content['ajax_show_manager']){
?>
<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>js/ajax/video.js"></script>
<script language="javascript">
    (function($){
        
        $.alert_authorization_body = function(){
            
            $('#content').delegate('#content .alert_authorization_add','click', function(){
                alert("<?php echo $info_content['alert_authorization_add_video'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_delete','click', function(){
                alert("<?php echo $info_content['alert_authorization_delete_video'];?>");
                return false;
            });
        
            $('#content').delegate('#content .alert_authorization_update','click', function(){
                alert("<?php echo $info_content['alert_authorization_update_video'];?>");
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
                "sSortDataType"     :"html",
                "bSearchable"       :true,
                "aTargets"          :[2]
            },
            <?php
            $td_col=0;
            
            if($info_content['bool_active']['category']){
                
            ?>
            {
                "sSortDataType"     :"dom-div",
                "bSearchable"       :false,
                "aTargets"          :[3]
            },
            <?php
            }
            else
                $td_col++;
            
            if($info_content['bool_active']['active']){
                
            ?>
            {
                "sSortDataType"     :"dom-div-public",
                "bSearchable"       :false,
                "aTargets"          :[<?php echo 4-$td_col ?>]
            },
            <?php
            }
            else
                $td_col++;
            ?>
                        
            {
                "sSortDataType"     :"dom-div-public",
                "bSearchable"       :false,
                "aTargets"          :[<?php echo 5-$td_col ?>]
            },
            {
                "sSortDataType"     :"dom-div",
                "sType"             :"numeric",
                "bSearchable"       :false,
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
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[<?php echo 9-$td_col ?>]
            },
            {
                "bSearchable"       :false,
                "bSortable"         :false,
                "aTargets"          :[<?php echo 10-$td_col ?>]
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
                        
                    <span><?php echo $info_content['video_control_filter'];?></span>
                    <select name="select_category_video" class="ajax_select_filter">
                        <option value="all">&nbsp;&nbsp;&nbsp;<?php echo $info_content['option_select_all'];?></option>
                        <?php echo $category_video; ?>
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
            <th width="35">ID</th>
            
            <th width="35" class="right"><input type="checkbox" id="chkCheckAll"/></th>
            
            <th width="290"><?php echo $info_content['video_name'] ?></th>
            
            <?php if($info_content['bool_active']['category']){  ?>
            
            <th width="110"><?php echo $info_content['cate_sub_name_video']?></th>
            <?php }
            
                  if($info_content['bool_active']['active']){  ?>
            
            <th width="110"><?php echo $info_content['video_active'] ?></th>
            <?php } ?>
            
            <th width="60"><?php echo $info_content['video_public'] ?></th>

            <th width="60"><?php echo $info_content['video_order'] ?></th>
            
            <th width="75" class="right"><?php echo $info_content['video_file'] ?></th>
            
            <th width="70"><?php echo $info_content['video_img'] ?></th>

            <th width="40" class="right"><?php echo $info_content['action_update'] ?></th>

            <th width="40" class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </thead>
        
        <tfoot>
        <tr>        
            <th>ID</th>
            
            <th class="right">&nbsp;</th>
            
            <th><?php echo $info_content['video_name'] ?></th>
            
            <?php if($info_content['bool_active']['category']){  ?>
            
            <th><?php echo $info_content['cate_sub_name_video']?></th>
            <?php }
            
                  if($info_content['bool_active']['active']){  ?>
            
            <th><?php echo $info_content['video_active'] ?></th>
            <?php } ?>
            
            <th><?php echo $info_content['video_public'] ?></th>

            <th ><?php echo $info_content['video_order'] ?></th>
            
            <th class="right"><?php echo $info_content['video_file'] ?></th>
            
            <th><?php echo $info_content['video_img'] ?></th>

            <th class="right"><?php echo $info_content['action_update'] ?></th>

            <th class="right"><?php echo $info_content['action_delete'] ?></th>
        </tr>
        </tfoot>
        
        <tbody>
        <?php
}
        if(is_array($videos)){
            
            for($i=0;$i<count($videos);$i++){
            ?>
            <tr class="gradeC">
                <td>
                    <div align="center" class="title_table_database">
                        <?php echo element('video_id',$videos[$i],'');?>
                    </div>
                </td>
                
                <td>
                    <div align="center">
                        <input type="checkbox" name="checkbox[<?php echo element('video_id',$videos[$i],'');?>]" class="chkCheck" id="check_<?php echo element('video_id',$videos[$i],'');?>" />
                    </div>
                </td>
                    
                <td>
					<div align="left" class="title_table_database" style="padding-bottom:5px;">
                        <?php echo element('video_name',$videos[$i],'');?>
                    </div>
					<?php
					if(element('video_description',$videos[$i],'')!=''){
					?>
					<div align="left"><?php echo cut_string_vi(element('video_description',$videos[$i],''),200); ?></div>
					<?php
					}
					?>
                </td>
                
                <?php if($info_content['bool_active']['category']){  ?>
                
                <td>
                    <div align="center">
                        <?php echo element('cate_name',$videos[$i],'');?>
                    </div>
                </td>
                <?php }
            
                      if($info_content['bool_active']['active']){  ?>
                
                <td>
                    <?php
                        $active=(element('video_active',$videos[$i],'')==1)?"ajax_active":"ajax_inactive";
                        echo ($authorization['update'])?"<div align='center' class='".$active." ajax_update_active' update_active_param='".element('video_id',$videos[$i],'')."' >&nbsp;</div> "
                                                       :"<div align='center' class='".$active."' >&nbsp;</div>";
                    ?>
                </td>
                <?php } ?>
                
                <td>
                    <?php
                        $public=(element('video_public',$videos[$i],'')==1)?"ajax_public_yes":"ajax_public_no";
                        echo ($authorization['update'])?"<div align='center' class='".$public." ajax_update_public' update_public_param='".element('video_id',$videos[$i],'')."' >&nbsp;</div> "
                                                       :"<div align='center' class='".$public."' >&nbsp;</div>";
                    ?>
                </td>
                
                <td>
                    <?php
                        echo ($authorization['update'])?"<div align='center' class='ajax_update_order_input' update_order_param='".element('video_id',$videos[$i],'')."' >".element('video_order',$videos[$i],'')."</div> "
                                                       :"<div align='center'>".element('video_order',$videos[$i],'')."</div>";
                    ?>
                </td>
                
                <td>
                    <div align="center"> 
                        <script language="javascript">
                            $$(document).ready(function(){ 
                                $$("#content").delegate("<?php echo "#lightbox_admin_".element('video_id',$videos[$i],''); ?>","click",function(){
                                    var html = $$("<?php echo "<div align='center'>".$this->m_video->show_one_video(element('video_id',$videos[$i],''),600,350)."</div>";?>");

                                    $$.lightbox(html,{
                                        width:600,
                                        height:350
                                    });
                                    return false;
                                });
                            });
                        </script>
                        <a id="<?php echo "lightbox_admin_".element('video_id',$videos[$i],''); ?>">
                            <img alt="<?php echo custom_htmlspecialchars(element('video_name',$videos[$i],'')) ?>" style="height:25px;margin:1px;border: 1px solid #CCCCCC;padding:1px;" src="<?php echo base_src_img('','video_img.png') ?>"/>
                        </a>  
                    </div>
                </td>
                
                <td>
                    <div align="center">
                        <a class="lightbox_admin"  rel="video" href="<?php echo base_src_img(element('video_img',$videos[$i],'')); ?>">
                            <img alt="<?php echo custom_htmlspecialchars(element('video_name',$videos[$i],'')) ?>" src="<?php echo base_src_img(element('video_img',$videos[$i],'')); ?>" />
                        </a>
                    </div>
                </td>
                
                <td>
                    <div align="center">
                        <a class="<?php echo ($authorization['update'])?"":"alert_authorization_update" ?>" title="<?php echo $info_content['action_update']?>" href="<?php echo ($authorization['update'])?base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false)."/".element('video_id',$videos[$i],''):"#";?>">
                            <img alt="update" width="18" height="18" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/action/update.png"/>
                        </a>
                    </div>
                </td>

                <td>
                    <div align="center">
                        <a delete_param="<?php echo element('video_id',$videos[$i],'') ?>" class="<?php echo ($authorization['delete'])?"ajax_delete_item":"alert_authorization_delete"?>" title="<?php echo $info_content['action_delete']?>">
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
echo $this->session->flashdata('add_update_video');
}
?>