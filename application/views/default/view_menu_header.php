<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(is_array($menu) && !empty($menu)){

	if(!isset($product_search))
		$product_search=array();

	?>
<!--    <ul class="nav-menu">-->
<!--        --><?php
//        $i=0;
//        foreach($menu as $key=> $value){
//            $string_class=($i === 0) ? "class='first_ddsmoothmenu'" : "";
//
//            $menu_url=element('menu_url',$value,'');
//            if($menu_url == "")
//                $menu_url=base_url();
//            else if(strpos($menu_url,"http://") === false && preg_match('/'.URL_SUFFIX.'$/i',$menu_url) == false)
//                $menu_url=preg_replace("/(\/)$/i","",base_url().$menu_url).URL_SUFFIX;
//            else if(strpos($menu_url,"http://") === false && preg_match('/'.URL_SUFFIX.'$/i',$menu_url) != false)
//                $menu_url=preg_replace("/(\/)$/i","",base_url().$menu_url);
//
//            ?>
<!--            <li --><?php //echo $string_class; ?><!-->-->
<!--                <a title="--><?php //echo custom_htmlspecialchars(element('menu_name',$value,'')); ?><!--" href="--><?php //echo $menu_url; ?><!--">--><?php //echo element('menu_name',$value,''); ?><!--</a>-->
<!---->
<!--            </li>-->
<!--            --><?php
//
//            $i++;
//        }
//        ?>
<!--    </ul>-->
	<?php
}

?>