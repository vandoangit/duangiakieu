<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

$url_default_template=base_url().DEFAULT_DIR_TEMPLATE; ?>

<!DOCTYPE html>
<html lang="vi-vn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Tin tức - sự kiện</title>

    <meta name="author" content="VinaDesign"/>
    <meta name="keywords" content="Dự án Hamubay Phan Thiết, Hamubay "/>
    <meta name="description" content=""/>
    <meta name="copyright" content="© 2017 www.hamubay.vn. All Rights Reserved."/>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="expires" content="0"/>
    <meta name="resource-type" content="document"/>
    <meta name="distribution" content="global"/>
    <meta name="robots" content="index, follow"/>
    <meta name="revisit-after" content="1 days"/>
    <meta name="rating" content="general"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE"/>
    <meta content="telephone=no" name="format-detection"/>

    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:type" content="article"/>
    <meta property="og:site_name" content="Dự án Hamubay Phan Thiết"/>
    <meta property="article:tag" content="Dự án Hamubay Phan Thiết"/>

    <meta property="og:title" content="Tin tức - sự kiện"/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content="http://hamubay.vn/tin-tuc-su-kien/"/>
    <meta property="og:image" content="http://hamubay.vn/public/images/no-img.jpg"/>


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,300italic,400italic,600italic,700italic,700,800,800italic'
          rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="http://hamubay.vn/public/images/favicon.png" type="image/x-icon"/>

    <link rel='stylesheet' type='text/css' href="<?php echo $url_default_template; ?>css/bootstrap.css"/>
    <link rel='stylesheet' type='text/css' href="<?php echo $url_default_template; ?>fontawesome/css/fontawesome.min.css"/>
    <link rel='stylesheet' type='text/css' href="<?php echo $url_default_template; ?>css/swiper.min.css"/>
    <link rel='stylesheet' type='text/css' href="<?php echo $url_default_template; ?>css/animate.css"/>
    <link href="<?php echo $url_default_template; ?>fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url_default_template; ?>css/style.css" rel="stylesheet" type="text/css"/>

    <!-- end css -->

    <div id="fb-root"></div>
    <script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

    <style>
        .fb-share-button {
            float: left;
        }

        .fb-like, .fb-send {
            float: left;
            margin: 2px 10px 2px 0;
        }

        .right_xh {
            margin: 2px 10px 2px 0;
        }
    </style><!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
          'gtm.start':
            new Date().getTime(), event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', 'GTM-K7HPVCN');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
<div class="frog"></div>
<header>
    <div class="fixed-top">
        <div class="fladno" style='background-color: #024D86'>
            <div class="container">
                <div class="row">
                    <div class="col-xs-5 col-sm-2">
                        <a class="logos" href="http://hamubay.vn"><img class='img-responsive '
                                                                       src='http://hamubay.vn/uploads/11-2018/logo_hamubay.png'
                                                                       alt='logo_hamubay' title=''/></a>
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
                                        <li class=""><a href="http://hamubay.vn/#tong-quan">Tổng quan</a></li>
                                        <li class=""><a href="http://hamubay.vn/#"></a></li>
                                        <li class=""><a href="http://hamubay.vn/#vi-tri">Vị trí</a></li>
                                        <li class=""><a href="http://hamubay.vn/#mat-bang">Mặt bằng</a></li>
                                        <li class=""><a href="http://hamubay.vn/#san-pham">Tiện ích</a></li>
                                        <li class="active "><a href="http://hamubay.vn/tin-tuc-su-kien/">Tin tức - sự
                                                kiện</a></li>
                                        <li class=""><a href="http://hamubay.vn/#lien-he">Liên hệ</a></li>
                                    </ul>
                                </nav><!-- /.navbar-main-menu -->
                            </div>
                        </div>
                    </div>
                    <!--
                    <a href=""><img alt="VietNam" src="/images/vn.png" /></a>
                    <a href=""><img alt="English" src="/images/en.png" /></a>-->
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
<main id="main-content" class='main-sub'>
    <div class="block-sub block-subpost">
        <div class="container">
            <div class="row">
                <div id="tin-tuc" class="block-post">
                    <div class="col-md-3 padding0 hidden-xs hidden-sm">
                        <div id="pass-height">
                            <div class="sidebar-right">
                                <div class="sidebar-title">
                                    <h3 class="text-uppercase">Tin tức nổi bật</h3>
                                </div>
                                <div class="sidebar-content">
                                    <div class="sidebar-block-news">
                                        <div class="sidebar-img">
                                            <a href="http://hamubay.vn/thong-tin-mo-ban-du-an-hamubay.html"><img
                                                        class='img-responsive '
                                                        src='http://hamubay.vn/uploads/11-2018/hinh-12.jpg'
                                                        alt='hinh-12' title='THÔNG TIN MỞ BÁN DỰ ÁN Hamubay'/></a>
                                        </div>
                                        <div class="sidebar-title-item">
                                            <a href="http://hamubay.vn/thong-tin-mo-ban-du-an-hamubay.html">THÔNG TIN MỞ
                                                BÁN DỰ ÁN Hamubay</a>
                                        </div>
                                    </div>
                                    <div class="sidebar-block-news">
                                        <div class="sidebar-img">
                                            <a href="http://hamubay.vn/co-hoi-vang-dau-tu-du-an-hamubay.html"><img
                                                        class='img-responsive '
                                                        src='http://hamubay.vn/uploads/11-2018/hinh-13.jpg'
                                                        alt='hinh-13' title='Cơ hội vàng đầu tư dự án Hamubay'/></a>
                                        </div>
                                        <div class="sidebar-title-item">
                                            <a href="http://hamubay.vn/co-hoi-vang-dau-tu-du-an-hamubay.html">Cơ hội
                                                vàng đầu tư dự án Hamubay</a>
                                        </div>
                                    </div>
                                    <div class="sidebar-block-news">
                                        <div class="sidebar-img">
                                            <a href="http://hamubay.vn/tiem-nang-phat-trien-du-lich-tam-co-the-gioi.html"><img
                                                        class='img-responsive '
                                                        src='http://hamubay.vn/uploads/11-2018/hinh-14.jpg'
                                                        alt='hinh-14'
                                                        title='TIỀM NĂNG PHÁT TRIỂN DU LỊCH TẦM CỠ THẾ GIỚI'/></a>
                                        </div>
                                        <div class="sidebar-title-item">
                                            <a href="http://hamubay.vn/tiem-nang-phat-trien-du-lich-tam-co-the-gioi.html">TIỀM
                                                NĂNG PHÁT TRIỂN DU LỊCH TẦM CỠ THẾ GIỚI</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="banner_left">
                            <h2 style="font-size: 18px;font-weight: bold;padding: 10px 0;text-align: center;">Đăng ký
                                nhận thông tin dự án</h2>
                            <div class="block-form">
                                <form action="" method="post" class="form_contact" style="padding: 10px 0;">
                                    <input class="input_form" type="hidden" name="func" value="req_submit"/>
                                    <div class="col-sm-12">
                                        <div class="input-form" id="check-txtName">
                                            <input id="txtName" onblur="validateForm('txtName')" required=""
                                                   name="txtName" type="text" placeholder="Họ và tên"/>
                                            <i class="val fa" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-form" id="check-txtEmail">
                                            <input id="txtEmail" onblur="validateForm('txtEmail')" required=""
                                                   name="txtEmail" type="text" placeholder="Email"/>
                                            <i class="val fa" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-form" id="check-txtTel">
                                            <input id="txtTel" onblur="validateForm('txtTel')" required="" name="txtTel"
                                                   type="text" placeholder="Số điện thoại"/>
                                            <i class="val fa" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="col-sm-12">
                                            <input style="width: 96px;color: #000;padding: 12px;border-radius: 5px;border: 1px solid #ccc;" required="" id="captcha" placeholder="Mã bảo vệ" class="input_captcha" name="6_letters_code" type="text"/>
                                            <span style="padding: 0 5px;"><a class="img-responsive btn-re" style="color: #BC4949; display: inline-block" href='javascript: refreshCaptcha();'><i style="color: #fff;" class="fa fa-refresh" aria-hidden="true"></i></a></span>
                                            <span style="display: inline-block;position: relative;top: 14px;" class="ma_captcha"><img class="img-responsive" src="/app/packages/captcha/captcha_code_file.php?rand=" id="captchaimg" /></span>
                                    </div>
                                    -->
                                    <div class="col-sm-12">
                                        <div class="input-form">
                                            <input class="btn btn-send" name="" type="submit" class="text-uppercase"
                                                   value="ĐĂNG KÝ"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <script type="text/javascript">
                              //function refreshCaptcha()
                              //{
                              // var img = document.images['captchaimg'];
                              // img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
                              //}
                            </script>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9">
                        <div class="col-sm-12">
                            <ul class='breadcrumb'>
                                <li><a href='http://hamubay.vn'><i class='fa fa-home' aria-hidden='true'></i></a></li>
                                <li><a href='http://hamubay.vn/tin-tuc-su-kien/'>Tin tức - sự kiện</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-12">
                            <div style="padding: 15px; background-color: #F5F5F5; height: 100vh;">
                                <div class="items">
                                    <div class="image">
                                        <a href="http://hamubay.vn/thong-tin-mo-ban-du-an-hamubay.html"><img
                                                    class='img-responsive '
                                                    src='http://hamubay.vn/uploads/11-2018/hinh-12.jpg' alt='hinh-12'
                                                    title='THÔNG TIN MỞ BÁN DỰ ÁN Hamubay'/></a>
                                    </div>
                                    <div class="detail">
                                        <div class="box-title">
                                            <a href="http://hamubay.vn/thong-tin-mo-ban-du-an-hamubay.html"><h4
                                                        class="title">THÔNG TIN MỞ BÁN DỰ ÁN Hamubay</h4></a>
                                        </div>
                                        <div class="note"><span
                                                    style=&quot;&quot;color:#008080;&quot;&quot;><strong><span
                                                            style=&quot;&quot;font-size:16px;&quot;&quot;>Hamubay Phan Thiết</span> </strong></span>được
                                            thiết kế theo lối khu đ&ocirc; thị chuẩn mực kh&eacute;p k&iacute;n, với
                                            tổng diện t&iacute;ch 4ha giai đoạn I v&agrave; mặt tiền trải d&agrave;i ...
                                        </div>
                                        <div class="text-right"><a style="text-decoration: underline;"
                                                                   class="text-capitalize"
                                                                   href="http://hamubay.vn/thong-tin-mo-ban-du-an-hamubay.html">Chi
                                                tiết <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="image">
                                        <a href="http://hamubay.vn/co-hoi-vang-dau-tu-du-an-hamubay.html"><img
                                                    class='img-responsive '
                                                    src='http://hamubay.vn/uploads/11-2018/hinh-13.jpg' alt='hinh-13'
                                                    title='Cơ hội vàng đầu tư dự án Hamubay'/></a>
                                    </div>
                                    <div class="detail">
                                        <div class="box-title">
                                            <a href="http://hamubay.vn/co-hoi-vang-dau-tu-du-an-hamubay.html"><h4
                                                        class="title">Cơ hội vàng đầu tư dự án Hamubay</h4></a>
                                        </div>
                                        <div class="note">Với mức gi&aacute; chỉ từ 15 triệu đồng/m2, thanh to&aacute;n
                                            linh hoạt, <strong>Hamubay Phan Thiết</strong> sở hữu một lợi thế cạnh tranh
                                            rất lớn so với c&aacute;c dự &aacute;n tương ...
                                        </div>
                                        <div class="text-right"><a style="text-decoration: underline;"
                                                                   class="text-capitalize"
                                                                   href="http://hamubay.vn/co-hoi-vang-dau-tu-du-an-hamubay.html">Chi
                                                tiết <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="image">
                                        <a href="http://hamubay.vn/tiem-nang-phat-trien-du-lich-tam-co-the-gioi.html"><img
                                                    class='img-responsive '
                                                    src='http://hamubay.vn/uploads/11-2018/hinh-14.jpg' alt='hinh-14'
                                                    title='TIỀM NĂNG PHÁT TRIỂN DU LỊCH TẦM CỠ THẾ GIỚI'/></a>
                                    </div>
                                    <div class="detail">
                                        <div class="box-title">
                                            <a href="http://hamubay.vn/tiem-nang-phat-trien-du-lich-tam-co-the-gioi.html">
                                                <h4 class="title">TIỀM NĂNG PHÁT TRIỂN DU LỊCH TẦM CỠ THẾ GIỚI</h4></a>
                                        </div>
                                        <div class="note">Khi n&oacute;i đến <strong>Phan Thiết</strong>, mọi người
                                            thường sẽ nghĩ đến một địa danh du lịch c&oacute; bề d&agrave;y k&eacute;o d&agrave;i
                                            từ d&acirc;n tộc Chăm từ xưa, cho đến những ...
                                        </div>
                                        <div class="text-right"><a style="text-decoration: underline;"
                                                                   class="text-capitalize"
                                                                   href="http://hamubay.vn/tiem-nang-phat-trien-du-lich-tam-co-the-gioi.html">Chi
                                                tiết <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="lien-he" class="footer-info">
        <div class="container">
            <div class="title-home title-home-white">
                <h4 class="name wow flipInX text-center" data-wow-delay="0.5s">Đăng ký NHẬN THÔNG TIN DỰ ÁN</h4>
            </div>
            <div class="footer-info-block" style="overflow: hidden;">
                <div class="col-md-6">
                    <div class="box-text">
                        <div class="call_sale">LIÊN HỆ Phòng kinh doanh</div>
                        <a href="tel:0905279544" class="mobile">0905279544</a>
                        <p>Vui lòng để lại thông tin, đội ngũ chuyên viên tư vấn của chúng tôi sẽ liên hệ, tư vấn và gửi
                            thông tin cho Quý vị trong thời gian nhanh nhất.</p>
                        <div class='share-social'>
                            <ul class='nav nav-socical'>
                                <li><a class='facebook' href='https://www.facebook.com/datbienvang.vn/' target='_blank'><i
                                                class='fa fa-facebook' aria-hidden='true'></i></a></li>
                                <li><a class='twitter' href='skype' target='_blank'><i class='fa fa-twitter'
                                                                                       aria-hidden='true'></i></a></li>
                                <li><a class='google-plus' href='https://plus.google.com/ ' target='_blank'><i
                                                class='fa fa-google-plus' aria-hidden='true'></i></a></li>
                                <li><a class='instagram' href='' target='_blank'><i class='fa fa-instagram'
                                                                                    aria-hidden='true'></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block-form">
                        <form action="" method="post" class="form_contact" style="padding: 10px 0;">
                            <input class="input_form" type="hidden" name="func" value="req_submit"/>
                            <div class="col-sm-12">
                                <div class="input-form" id="check-txtName">
                                    <input id="txtName" onblur="validateForm('txtName')" required="" name="txtName"
                                           type="text" placeholder="Họ và tên"/>
                                    <i class="val fa" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-form" id="check-txtEmail">
                                    <input id="txtEmail" onblur="validateForm('txtEmail')" required="" name="txtEmail"
                                           type="text" placeholder="Email"/>
                                    <i class="val fa" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-form" id="check-txtTel">
                                    <input id="txtTel" onblur="validateForm('txtTel')" required="" name="txtTel"
                                           type="text" placeholder="Số điện thoại"/>
                                    <i class="val fa" aria-hidden="true"></i>
                                </div>
                            </div>
                            <!--
                            <div class="col-sm-12">
                                    <input style="width: 96px;color: #000;padding: 12px;border-radius: 5px;border: 1px solid #ccc;" required="" id="captcha" placeholder="Mã bảo vệ" class="input_captcha" name="6_letters_code" type="text"/>
                                    <span style="padding: 0 5px;"><a class="img-responsive btn-re" style="color: #BC4949; display: inline-block" href='javascript: refreshCaptcha();'><i style="color: #fff;" class="fa fa-refresh" aria-hidden="true"></i></a></span>
                                    <span style="display: inline-block;position: relative;top: 14px;" class="ma_captcha"><img class="img-responsive" src="/app/packages/captcha/captcha_code_file.php?rand=" id="captchaimg" /></span>
                            </div>
                            -->
                            <div class="col-sm-12">
                                <div class="input-form">
                                    <input class="btn btn-send" name="" type="submit" class="text-uppercase"
                                           value="ĐĂNG KÝ"/>
                                </div>
                            </div>
                        </form>
                    </div>
                    <script type="text/javascript">
                      //function refreshCaptcha()
                      //{
                      // var img = document.images['captchaimg'];
                      // img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
                      //}
                    </script>
                </div>
            </div>
        </div>
    </div>
</main>
<footer>
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5 pull-right">
                    <a class="email" href="mailto:viet.gss@gmail.com" target="_blank"><i class="fa fa-envelope-o"
                                                                                         aria-hidden="true"></i>viet.gss@gmail.com</a>
                    <a href="tel:0905279544" target="_blank" class="mobile"><i class="fa fa-mobile"
                                                                               aria-hidden="true"></i>0905279544</a>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <div class="copy-right">© 2017 www.hamubay.vn. All Rights Reserved.DEVELOPED BY <a target="_blank"
                                                                                                       href="http://vinadesigndanang.vn/"><strong
                                    style="color: #de0204;">VINA</strong>DESIGN</a>
                        <div class="clearfix visible-xs visible-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="type nz-button-2">
    <div><a href="tel:0905279544" class="nz-bt nz-bt-2"><span class="txt">0905279544</span><span class="round"><i
                        class="fa fa-phone faa-ring faa-slow animated"></i></span></a></div>
    <div><a id="form-lh" href="#lien-he" class="nz-bt nz-bt-1"><span
                    class="txt">Đăng ký nhận <br/>thông tin dự án</span><span class="round"><i
                        class="fa fa-envelope faa-ring faa-slow animated"
                        style="margin-top: -9px;margin-left: -7px;"></i></span></a></div>
</div>
<a href="javascript:;" class="scrollup">Top</a>
<div class="form_notify"></div>
<script>setTimeout(function () {
    $(".form_notify").addClass("hide");
  }, 5000);</script>
<style>.fb-livechat, .fb-widget {
        display: none
    }

    .ctrlq.fb-button, .ctrlq.fb-close {
        position: fixed;
        right: 24px;
        cursor: pointer
    }

    .ctrlq.fb-button {
        z-index: 999;
        background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;
        width: 60px;
        height: 60px;
        text-align: center;
        bottom: 5px;
        border: 0;
        outline: 0;
        border-radius: 60px;
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        -ms-border-radius: 60px;
        -o-border-radius: 60px;
        box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16);
        -webkit-transition: box-shadow .2s ease;
        background-size: 80%;
        transition: all .2s ease-in-out
    }

    .ctrlq.fb-button:focus, .ctrlq.fb-button:hover {
        transform: scale(1.1);
        box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)
    }

    .fb-widget {
        background: #fff;
        z-index: 1000;
        position: fixed;
        width: 360px;
        height: 435px;
        overflow: hidden;
        opacity: 0;
        bottom: 0;
        right: 24px;
        border-radius: 6px;
        -o-border-radius: 6px;
        -webkit-border-radius: 6px;
        box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)
    }

    .fb-credit {
        text-align: center;
        margin-top: 8px
    }

    .fb-credit a {
        transition: none;
        color: #bec2c9;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 12px;
        text-decoration: none;
        border: 0;
        font-weight: 400
    }

    .ctrlq.fb-overlay {
        z-index: 0;
        position: fixed;
        height: 100vh;
        width: 100vw;
        -webkit-transition: opacity .4s, visibility .4s;
        transition: opacity .4s, visibility .4s;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, .05);
        display: none
    }

    .ctrlq.fb-close {
        z-index: 4;
        padding: 0 6px;
        background: #365899;
        font-weight: 700;
        font-size: 11px;
        color: #fff;
        margin: 8px;
        border-radius: 3px
    }

    .ctrlq.fb-close::after {
        content: "X";
        font-family: sans-serif
    }

    .bubble {
        width: 20px;
        height: 20px;
        background: #c00;
        color: #fff;
        position: absolute;
        z-index: 999999999;
        text-align: center;
        vertical-align: middle;
        top: -2px;
        left: -5px;
        border-radius: 50%;
    }

    .bubble-msg {
        width: 120px;
        left: -140px;
        top: 5px;
        position: relative;
        background: rgba(59, 89, 152, .8);
        color: #fff;
        padding: 5px 8px;
        border-radius: 8px;
        text-align: center;
        font-size: 13px;
    }</style>
<div class="fb-livechat">
    <div class="ctrlq fb-overlay"></div>
    <div class="fb-widget">
        <div class="ctrlq fb-close"></div>
        <div class="fb-page" data-href="https://www.facebook.com/HamubayPhanThiet" data-tabs="messages" data-width="360"
             data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"></div>
        <div class="fb-credit"><a href="https://chanhtuoi.com" target="_blank">Powered by Chanhtuoi</a></div>
        <div id="fb-root"></div>
    </div>
    <a href="https://m.me/HamubayPhanThiet" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button">
        <div class="bubble">1</div>
        <div class="bubble-msg">Bạn cần hỗ trợ?</div>
    </a></div>
<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>$(document).ready(function () {
    function detectmob() {
      if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
        return true;
      } else {
        return false;
      }
    }

    var t = {delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button")};
    setTimeout(function () {
      $("div.fb-livechat").fadeIn()
    }, 8 * t.delay);
    if (!detectmob()) {
      $(".ctrlq").on("click", function (e) {
        e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({
          bottom: 0,
          opacity: 0
        }, 2 * t.delay, function () {
          $(this).hide("slow"), t.button.show()
        })) : t.button.fadeOut("medium", function () {
          t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)
        })
      })
    }
  });</script>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K7HPVCN"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
</body>
<!--<script type="text/javascript" src="--><?php //echo $url_default_template; ?><!--js/jquery-1.8.3.min.js"></script>-->
<script type="text/javascript" src="<?php echo $url_default_template; ?>js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="<?php echo $url_default_template; ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $url_default_template; ?>js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo $url_default_template; ?>js/common.js"></script>
<!-- Add jQuery library -->
<!-- Add mousewheel plugin (this is optional) -->
<!--<script type="text/javascript" src="http://hamubay.vn/lib/jquery.mousewheel-3.0.6.pack.js"></script>-->

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo $url_default_template; ?>js/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo $url_default_template; ?>js/jquery-ui.min.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url_default_template; ?>js/jquery.fancybox.css?v=2.1.5"
      media="screen"/>

<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css"
      href="<?php echo $url_default_template; ?>js/jquery.fancybox-buttons.css?v=1.0.5"/>
<script type="text/javascript"
        src="<?php echo $url_default_template; ?>js/jquery.fancybox-buttons.js?v=1.0.5"></script>

<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css"
      href="<?php echo $url_default_template; ?>js/jquery.fancybox-thumbs.css?v=1.0.7"/>
<script type="text/javascript"
        src="<?php echo $url_default_template; ?>js/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<!-- Add Media helper (this is optional) -->
<script type="text/javascript"
        src="<?php echo $url_default_template; ?>js/jquery.fancybox-media.js?v=1.0.6"></script>

<style type="text/css">
    .fancybox-custom .fancybox-skin {
        box-shadow: 0 0 50px #222;
    }


</style>
<script>
  $(".main-menu > ul > li > a, #form-lh").click(function (e) {
    var id = $(this).prop("hash");
    if (id != '') {
      var top = $(id).offset().top - 60;
      $("html, body").animate({
        scrollTop: top
      }, 500);
    }
  });
</script>

</html>
