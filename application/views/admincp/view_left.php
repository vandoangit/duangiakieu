<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 29-07-2015
	Copyright :Hồ Minh Trí
  
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');

?>
<div id="datetime"></div>
<div id="language_admin">
    <div class="vi <?php echo ($session_lang_admin=='vi')?"active_lang":""?>"><a title="Vietnam" href="<?php echo base_url().URL_LANG_ADMIN."/vi" ?>" >Việt Nam</a></div>
    <div class="en <?php echo ($session_lang_admin=='en')?"active_lang":""?>"><a title="English" href="<?php echo base_url().URL_LANG_ADMIN."/en" ?>">English</a></div>
</div>

<div id="menu_left">
    <div class="clear"></div>
    <ul id="navigation">
    <?php
    if(is_array($menu_admin)){
        
        foreach($menu_admin as $key_menu=>$value_menu ){
    ?>
        <li class="mParent"><span class="tParent" title="<?php echo custom_htmlspecialchars(element('menu_name',$value_menu,'')); ?>"><?php echo $this->exsec_string->str_upper(element('menu_name',$value_menu,'')); ?></span> 
            <ul>
            <?php
            if(is_array(element('sub_menu_admin',$value_menu,''))){
                
                foreach(element('sub_menu_admin',$value_menu,'') as $key_sub_menu=>$value_sub_menu ){
            ?>
                <li class="mChild"><a title="<?php echo custom_htmlspecialchars(element('sub_menu_name',$value_sub_menu,'')); ?>" href="<?php echo base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$value_menu,'')."/".element('sub_menu_function',$value_sub_menu,''); ?>"><?php echo $this->exsec_string->str_ucwords(element('sub_menu_name',$value_sub_menu,'')) ?></a></li>
            <?php    
                }
            }
            ?>                    
            </ul> 
        </li>
    <?php    
        }
    }
    ?>
    </ul> 
    <div class="clear"></div>
</div>

<div id="calendar_admin">
    <p id="datepicker"></p>
</div>