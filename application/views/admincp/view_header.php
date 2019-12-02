<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<script language="javascript">
    $$(document).ready(function(){
        $$('#div_header_admin .alert_authorization_change_user').click(function(){
            alert("<?php echo $info_header['alert_authorization_change_user'];?>");
            return false;
        });
        
        $$('.lightbox_header_admin').lightbox(); 
    });
</script>

<div id="div_header_admin">
    <div class="bg_header_admin">
        <table cellspacing="0px" cellpadding="0px">
        <tr>
            <!--Begin Logo cua trang Admin-->
            <td class="logo">
                ADMIN CPANEL
            </td>
            <!--End Logo cua trang Admin-->
            
            <!--Begin Marquee header trang Admin-->
            <td class="marquee_header">
                <marquee scrolldeay="10" scrollamount="3" onmouseout="this.start()" onmouseover="this.stop()">
                    <?php echo $info_header['marquee_content_header'];?>
                </marquee>
            </td>
            <!--End Marquee header trang Admin-->
            
            <!--Begin Hello User cua trang Admin-->
            <td class="hello_user_img">
                <a class="lightbox_header_admin"  rel="hello_user" href="<?php echo base_src_img(element('user_img',$user_admin),"no-avatar.jpg"); ?>">
                    <img alt="welcome_user" border="0" src="<?php echo base_src_img(element('user_img',$user_admin),"no-avatar.jpg"); ?>"/>
                </a>
            </td>
            
            <td class="hello_user">
                <span class="welcome_title"><?php echo $info_header['label_welcome_user']; ?></span>
                <span class="welcome_user"><?php echo $this->exsec_string->str_ucwords(element('user_name',$user_admin)); ?></span>
            </td>
            <!--End Hello User cua trang Admin-->
            
            <!--Begin Preview User cua trang Admin-->
            <td class="change_pass ">
                <a class="<?php echo ($authorization['change'])?"":"alert_authorization_change_user" ?>" title="<?php echo custom_htmlspecialchars(element('sub_menu_name',$sub_menu['change'],false));?>" href="<?php echo ($authorization['change'])?base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['change'],false)."/".element('sub_menu_function',$sub_menu['change'],false):"#"?>"><?php echo element('sub_menu_name',$sub_menu['change'],false);?></a>
            </td>
            <!--End Hello User cua trang Admin-->
            
            <!--Begin Preview User cua trang Admin-->
            <td class="preview ">
                <a target="_blank" title="<?php echo custom_htmlspecialchars($info_header['visitsite_font_end']);?>"  href="<?php echo base_url();?>"><?php echo $info_header['visitsite_font_end'];?></a>
            </td>
            <!--End Hello User cua trang Admin-->
            
            <!--Begin Hello User cua trang Admin-->
            <td class="logout">
                <a title="<?php echo  custom_htmlspecialchars($info_header['exit_admin']); ?>" href="<?php echo base_url().URL_EXIT_ADMIN;?>"><?php echo  $info_header['exit_admin']; ?></a>
            </td>
            <!--End Hello User cua trang Admin-->
        </tr>
        </table>
    </div>    
</div>