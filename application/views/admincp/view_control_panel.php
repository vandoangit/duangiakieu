<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<div id="content">
    <div id="accordion"> 
        <h3><a><?php echo $info_content['control']?></a></h3> 
        <div> 
            <div id="cpanel">
            <ul>
            <?php
            if(is_array($sub_menu_admin)){
                
                foreach($sub_menu_admin as $key_sub_menu=>$value_sub_menu ){
                ?>
                <li>
                    <a title="<?php  echo custom_htmlspecialchars($this->exsec_string->str_ucwords(element('sub_menu_name',$value_sub_menu,''))) ?>" href="<?php echo base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$value_sub_menu,'')."/".element('sub_menu_function',$value_sub_menu,'');?>">
                        <img border="0" height="90"  src="<?php echo base_url().ADMIN_DIR_TEMPLATE."images/icon_menu/".element('sub_menu_img',$value_sub_menu,'') ?>"/>
                        <p><?php  echo $this->exsec_string->str_ucwords(element('sub_menu_name',$value_sub_menu,'')) ?></p>
                    </a>
                </li>
                <?php
                }
            }
            ?>           
            </ul>
            <div style="clear:both;"></div>
            </div>
	</div>
    
        <h3><a><?php echo $info_content['last_login']?></a></h3>         
	<div>
            <table class="table_no_sort" cellspacing="0px" cellpadding="0px">
            <thead>
            <tr class="title_no_sort">
                <th width="130"><div align="center"><?php echo $info_content['user_account']?></div></th>

                <th width="180"><div align="center"><?php echo $info_content['user_name'] ?></div></th>

                <th width="170"><div align="center"><?php echo $info_content['user_last_login'] ?></div></th>
                
                <th width="250"><div align="center"><?php echo $info_content['user_email'] ?></div></th>
                
                <th width="130"><div align="center"><?php echo $info_content['user_phone'] ?></div></th>
            </tr>
            </thead>
        
            <tbody>
            <?php
            if(is_array($user)){

                for($i=0;$i<count($user);$i++){
                ?>
                <tr class="content_no_sort">

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
                            <?php echo date('d-m-Y H:i:s',strtotime(element('user_last_login',$user[$i],'')));?>
                        </div>
                    </td>

                    <td>
                        <div align="left" class="link_table">
                            <a title="<?php echo custom_htmlspecialchars(element('user_email',$user[$i],''));?>"  href="mailto:<?php echo element('user_email',$user[$i],'');?>"><?php echo element('user_email',$user[$i],'') ?></a>
                        </div>
                    </td>
                    
                    <td>
                        <div align="center">
                            <?php echo element('user_phone',$user[$i],'');?>
                        </div>
                    </td>
                    
                </tr>
                <?php
                }
            }
            ?>
            </tbody>
            </table>
            <div style="clear:both;"></div>
	</div>
        
        <h3><a><?php echo $info_content['info_system']." & ".$info_content['info_static']?></a></h3>         
	<div>
            <table class="table_no_sort" cellspacing="0px" cellpadding="0px" style="width:600px;float:left;">
            <thead>
            <tr class="title_no_sort">
                <th colspan="2"><div align="center"><?php echo $info_content['info_system'] ?></div></th>
            </tr>
            </thead>
            
            <tbody>   
            <tr class="content_no_sort">
                <td width="200">
                    <div align="center" class="title_record">
                       <?php echo $info_content['php_version'] ?>
                    </div>
                </td>

                <td width="400">
                    <div align="left">
                        <b><?php echo @phpversion(); ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="center" class="title_record">
                       <?php echo $info_content['http_host'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo @$_SERVER['HTTP_HOST'] ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="center" class="title_record">
                       <?php echo $info_content['http_user_agent'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo @$_SERVER['HTTP_USER_AGENT'] ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="center" class="title_record">
                       <?php echo $info_content['server_software'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo @$_SERVER['SERVER_SOFTWARE']; ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="center" class="title_record">
                       <?php echo $info_content['server_addr'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo @$_SERVER['SERVER_ADDR'] ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="center" class="title_record">
                       <?php echo $info_content['remote_addr'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo @$_SERVER['REMOTE_ADDR'] ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="center" class="title_record">
                       <?php echo $info_content['max_execution_time'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo @ini_get('max_execution_time'); ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="center" class="title_record">
                       <?php echo $info_content['max_input_time'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo @ini_get('max_input_time'); ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="center" class="title_record">
                       <?php echo $info_content['memory_limit'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo @ini_get('memory_limit'); ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="center" class="title_record">
                       <?php echo $info_content['post_max_size'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo @ini_get('post_max_size');?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="center" class="title_record">
                       <?php echo $info_content['upload_max_filesize'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo @ini_get('upload_max_filesize'); ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="center" class="title_record">
                       <?php echo $info_content['session_support'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo "enable" ?></b>
                    </div>
                </td>
            </tr>
            </tbody>
            </table>
            
            <table class="table_no_sort" cellspacing="0px" cellpadding="0px" style="width:250px;float:left;margin-left:18px;">
            <thead>
            <tr class="title_no_sort">
                <th colspan="2"><div align="center"><?php echo $info_content['info_static'] ?></div></th>
            </tr>
            </thead>
            
            <tbody>
            <tr class="content_no_sort">
                <td colspan="2"><div align="center"><?php echo $this->static_user->get_sum_img();?></div></td>
            </tr>    
                
            <tr class="content_no_sort">
                <td width="100">
                    <div align="left" class="title_record">
                       <?php echo $info_content['static_online'] ?>
                    </div>
                </td>

                <td width="150">
                    <div align="left">
                       <b><?php echo $this->static_user->get_online(); ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="left" class="title_record">
                         <?php echo $info_content['static_today'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo $this->static_user->get_today(); ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="left" class="title_record">
                         <?php echo $info_content['static_yesterday'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo $this->static_user->get_yesterday(); ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="left" class="title_record">
                         <?php echo $info_content['static_week'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo $this->static_user->get_week(); ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="left" class="title_record">
                         <?php echo $info_content['static_month'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo $this->static_user->get_month(); ?></b>
                    </div>
                </td>
            </tr>
            
            <tr class="content_no_sort">
                <td>
                    <div align="left" class="title_record">
                         <?php echo $info_content['static_year'] ?>
                    </div>
                </td>

                <td>
                    <div align="left">
                        <b><?php echo $this->static_user->get_year(); ?></b>
                    </div>
                </td>
            </tr>
            </tbody>
            </table>
            <div style="clear:both;"></div>
	</div>
        
    </div>
</div>	