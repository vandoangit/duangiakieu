<?php
$url_default_template=base_url().DEFAULT_DIR_TEMPLATE;
/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (is_array($menu) && !empty($menu)) {

    if (!isset($product_search))
        $product_search = array();

    ?>
    <header>
        <div class="fixed-top">
            <div class="fladno" style='background-color: #024D86'>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 col-sm-2">
                            <a class="logos" href="/"><img class='img-responsive '
                                                                           src="<?php echo $url_default_template; ?>images/logo4.png"
                                                                           alt='giakieu' title=''/></a>
                        </div>
                        <div class="col-xs-7 col-sm-10">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle visible-xs visible-sm visible-md hidden-lg">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="hidden-xs hidden-sm text-right">
                                <div class="block-menu">
                                    <nav class="main-menu" role="navigation">
                                        <ul class="nav-menu">
                                            <?php
                                            $i = 0;
                                            foreach ($menu as $key => $value) {
                                                $string_class = ($i === 0) ? "class='first_ddsmoothmenu'" : "";

                                                $menu_url = element('menu_url', $value, '');
                                                if ($menu_url == "")
                                                    $menu_url = base_url();
                                                else if (strpos($menu_url, "http://") === false && preg_match('/' . URL_SUFFIX . '$/i', $menu_url) == false)
                                                    $menu_url = preg_replace("/(\/)$/i", "", base_url() . $menu_url) . URL_SUFFIX;
                                                else if (strpos($menu_url, "http://") === false && preg_match('/' . URL_SUFFIX . '$/i', $menu_url) != false)
                                                    $menu_url = preg_replace("/(\/)$/i", "", base_url() . $menu_url);

                                                ?>
                                                <li <?php echo $string_class; ?>>
                                                    <a href="<?php echo $menu_url; ?>"><?php echo element('menu_name', $value, ''); ?></a>

                                                </li>
                                                <?php

                                                $i++;
                                            }
                                            ?>
                                        </ul>
                                    </nav><!-- /.navbar-main-menu -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-menu-mobile" class="nav-menu-mobile visible-xs visible-sm hidden-md hidden-lg">
            <ul class="nav-menu">
                <li class=""><a href="http://hamubay.vn/#tong-quan">Tổng quan</a></li>
                <li class=""><a href="http://hamubay.vn/#"></a></li>
                <li class=""><a href="http://hamubay.vn/#vi-tri">Vị trí</a></li>
                <li class=""><a href="http://hamubay.vn/#mat-bang">Mặt bằng</a></li>
                <li class=""><a href="http://hamubay.vn/#san-pham">Tiện ích</a></li>
                <li class="active "><a href="http://hamubay.vn/tin-tuc-su-kien/">Tin tức - sự kiện</a></li>
                <li class=""><a href="http://hamubay.vn/#lien-he">Liên hệ</a></li>
            </ul>
            <span class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></span>
        </div>
    </header>
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
//
    ?>
    <!--            <li --><?php //echo $string_class;
    ?><!-->-->
    <!--                <a title="--><?php //echo custom_htmlspecialchars(element('menu_name',$value,''));
    ?><!--" href="--><?php //echo $menu_url;
    ?><!--">--><?php //echo element('menu_name',$value,'');
    ?><!--</a>-->
    <!---->
    <!--            </li>-->
    <!--            --><?php
//
//            $i++;
//        }
//
    ?>
    <!--    </ul>-->
    <?php
}

?>