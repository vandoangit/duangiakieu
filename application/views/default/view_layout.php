<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$url_default_template = base_url() . DEFAULT_DIR_TEMPLATE;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kiểm Định </title>
    <link href="<?php echo $url_default_template; ?>style/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url_default_template; ?>style/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $url_default_template; ?>style/fontawesome/css/all.css" >
    <link href="<?php echo $url_default_template; ?>style/animate/animate.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<header>
    <div class="fixed-top">
        <div class="fladno">
            <div class="container">
                <div class="row">
                    <div class="col-xs-5 col-sm-2">
                        <a class="logos" href="#">
                            <img class="img-logo" src="<?php echo $url_default_template; ?>images/header/logo.jpg" alt="kiemdinhtech" title="">
                        </a>
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
                                    <?php $this->load->view($template_view_menu_header,$data_menu_header); ?>
                                </nav><!-- /.navbar-main-menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main-menu-mobile" class="nav-menu-mobile visible-xs visible-sm hidden-md hidden-lg menu-display">
        <ul class="nav-menu">
            <li class="">
                <a href="http://hamubay.vn/#tong-quan">Tổng quan</a>
            </li>
            <li class=""><a href="http://hamubay.vn/#"></a></li>
            <li class="">
                <a href="http://hamubay.vn/#vi-tri">Vị trí</a></li><li class="">
                <a href="http://hamubay.vn/#mat-bang">Mặt bằng</a></li><li class="">
                <a href="http://hamubay.vn/#san-pham">Tiện ích</a></li>
            <li class="active ">
                <a href="http://hamubay.vn/tin-tuc-su-kien/">Tin tức - sự kiện</a>
            </li>
            <li class="">
                <a href="http://hamubay.vn/#lien-he">Liên hệ</a>
            </li>
        </ul>
        <span class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></span>
    </div>
</header>
<main id="main-content" class="main-sub">
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
                                            <a href="http://hamubay.vn/thong-tin-mo-ban-du-an-hamubay.html"><img class="img-responsive " src="http://hamubay.vn/uploads/11-2018/hinh-12.jpg" alt="hinh-12" title="THÔNG TIN MỞ BÁN DỰ ÁN Hamubay"></a>
                                        </div>
                                        <div class="sidebar-title-item">
                                            <a href="http://hamubay.vn/thong-tin-mo-ban-du-an-hamubay.html">THÔNG TIN MỞ BÁN DỰ ÁN Hamubay</a>
                                        </div>
                                    </div>
                                    <div class="sidebar-block-news">
                                        <div class="sidebar-img">
                                            <a href="http://hamubay.vn/co-hoi-vang-dau-tu-du-an-hamubay.html"><img class="img-responsive " src="http://hamubay.vn/uploads/11-2018/hinh-13.jpg" alt="hinh-13" title="Cơ hội vàng đầu tư dự án Hamubay"></a>
                                        </div>
                                        <div class="sidebar-title-item">
                                            <a href="http://hamubay.vn/co-hoi-vang-dau-tu-du-an-hamubay.html">Cơ hội vàng đầu tư dự án Hamubay</a>
                                        </div>
                                    </div>
                                    <div class="sidebar-block-news">
                                        <div class="sidebar-img">
                                            <a href="http://hamubay.vn/tiem-nang-phat-trien-du-lich-tam-co-the-gioi.html"><img class="img-responsive " src="http://hamubay.vn/uploads/11-2018/hinh-14.jpg" alt="hinh-14" title="TIỀM NĂNG PHÁT TRIỂN DU LỊCH TẦM CỠ THẾ GIỚI"></a>
                                        </div>
                                        <div class="sidebar-title-item">
                                            <a href="http://hamubay.vn/tiem-nang-phat-trien-du-lich-tam-co-the-gioi.html">TIỀM NĂNG PHÁT TRIỂN DU LỊCH TẦM CỠ THẾ GIỚI</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="banner_left">
                            <h2 style="font-size: 18px;font-weight: bold;padding: 10px 0;text-align: center;">Đăng ký nhận thông tin dự án</h2>
                            <div class="block-form">
                                <form action="" method="post" class="form_contact" style="padding: 10px 0;">
                                    <input class="input_form" type="hidden" name="func" value="req_submit">
                                    <div class="col-sm-12">
                                        <div class="input-form" id="check-txtName">
                                            <input id="txtName" onblur="validateForm('txtName')" required="" name="txtName" type="text" placeholder="Họ và tên">
                                            <i class="val fa" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-form" id="check-txtEmail">
                                            <input id="txtEmail" onblur="validateForm('txtEmail')" required="" name="txtEmail" type="text" placeholder="Email">
                                            <i class="val fa" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-form" id="check-txtTel">
                                            <input id="txtTel" onblur="validateForm('txtTel')" required="" name="txtTel" type="text" placeholder="Số điện thoại">
                                            <i class="val fa" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-form">
                                            <input class="btn btn-send" name="" type="submit" value="ĐĂNG KÝ">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <script type="text/javascript">
                            </script>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9">
                        <div class="col-sm-12">
                            <ul class="breadcrumb"><li><a href="http://hamubay.vn"><i class="fa fa-home" aria-hidden="true"></i></a></li><li><a href="http://hamubay.vn/tin-tuc-su-kien/">Tin tức - sự kiện</a></li></ul>                    </div>
                        <div class="col-sm-12">
                            <div style="padding: 15px; background-color: #F5F5F5; height: 100vh;">
                                <div class="items">
                                    <div class="image">
                                        <a href="http://hamubay.vn/thong-tin-mo-ban-du-an-hamubay.html"><img class="img-responsive " src="http://hamubay.vn/uploads/11-2018/hinh-12.jpg" alt="hinh-12" title="THÔNG TIN MỞ BÁN DỰ ÁN Hamubay"></a>
                                    </div>
                                    <div class="detail">
                                        <div class="box-title">
                                            <a href="http://hamubay.vn/thong-tin-mo-ban-du-an-hamubay.html"><h4 class="title">THÔNG TIN MỞ BÁN DỰ ÁN Hamubay</h4></a>
                                        </div>
                                        <div class="note"><span style="&quot;&quot;color:#008080;&quot;&quot;"><strong><span style="&quot;&quot;font-size:16px;&quot;&quot;">Hamubay Phan Thiết</span> </strong></span>được thiết kế theo lối khu đô thị chuẩn mực khép kín, với tổng diện tích 4ha giai đoạn I và mặt tiền trải dài ...</div>
                                        <div class="text-right"><a style="text-decoration: underline;" class="text-capitalize" href="http://hamubay.vn/thong-tin-mo-ban-du-an-hamubay.html">Chi tiết <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="image">
                                        <a href="http://hamubay.vn/co-hoi-vang-dau-tu-du-an-hamubay.html"><img class="img-responsive " src="http://hamubay.vn/uploads/11-2018/hinh-13.jpg" alt="hinh-13" title="Cơ hội vàng đầu tư dự án Hamubay"></a>
                                    </div>
                                    <div class="detail">
                                        <div class="box-title">
                                            <a href="http://hamubay.vn/co-hoi-vang-dau-tu-du-an-hamubay.html"><h4 class="title">Cơ hội vàng đầu tư dự án Hamubay</h4></a>
                                        </div>
                                        <div class="note">Với mức giá chỉ từ 15 triệu đồng/m2, thanh toán linh hoạt, <strong>Hamubay Phan Thiết</strong> sở hữu một lợi thế cạnh tranh rất lớn so với các dự án tương ...</div>
                                        <div class="text-right"><a style="text-decoration: underline;" class="text-capitalize" href="http://hamubay.vn/co-hoi-vang-dau-tu-du-an-hamubay.html">Chi tiết <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="image">
                                        <a href="http://hamubay.vn/tiem-nang-phat-trien-du-lich-tam-co-the-gioi.html"><img class="img-responsive " src="http://hamubay.vn/uploads/11-2018/hinh-14.jpg" alt="hinh-14" title="TIỀM NĂNG PHÁT TRIỂN DU LỊCH TẦM CỠ THẾ GIỚI"></a>
                                    </div>
                                    <div class="detail">
                                        <div class="box-title">
                                            <a href="http://hamubay.vn/tiem-nang-phat-trien-du-lich-tam-co-the-gioi.html"><h4 class="title">TIỀM NĂNG PHÁT TRIỂN DU LỊCH TẦM CỠ THẾ GIỚI</h4></a>
                                        </div>
                                        <div class="note">Khi nói đến <strong>Phan Thiết</strong>, mọi người thường sẽ nghĩ đến một địa danh du lịch có bề dày kéo dài từ dân tộc Chăm từ xưa, cho đến những ...</div>
                                        <div class="text-right"><a style="text-decoration: underline;" class="text-capitalize" href="http://hamubay.vn/tiem-nang-phat-trien-du-lich-tam-co-the-gioi.html">Chi tiết <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
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
                        <p>Vui lòng để lại thông tin, đội ngũ chuyên viên tư vấn của chúng tôi sẽ liên hệ, tư vấn và gửi thông tin cho Quý vị trong thời gian nhanh nhất.</p>
                        <div class="share-social">
                            <ul class="nav nav-socical"><li><a class="facebook" href="https://www.facebook.com/datbienvang.vn/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><li><a class="twitter" href="skype" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><li><a class="google-plus" href="https://plus.google.com/ " target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li><li><a class="instagram" href="" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li></ul>
                        </div>                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block-form">
                        <form action="" method="post" class="form_contact" style="padding: 10px 0;">
                            <input class="input_form" type="hidden" name="func" value="req_submit">
                            <div class="col-sm-12">
                                <div class="input-form" id="check-txtName">
                                    <input id="txtName" onblur="validateForm('txtName')" required="" name="txtName" type="text" placeholder="Họ và tên">
                                    <i class="val fa" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-form" id="check-txtEmail">
                                    <input id="txtEmail" onblur="validateForm('txtEmail')" required="" name="txtEmail" type="text" placeholder="Email">
                                    <i class="val fa" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-form" id="check-txtTel">
                                    <input id="txtTel" onblur="validateForm('txtTel')" required="" name="txtTel" type="text" placeholder="Số điện thoại">
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
                                    <input class="btn btn-send" name="" type="submit" value="ĐĂNG KÝ">
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
                    </script>                </div>
            </div>
        </div>
    </div>
</main>
<footer>
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5 pull-right">
                    <a class="email" href="mailto:viet.gss@gmail.com" target="_blank"><i class="fa fa-envelope-o" aria-hidden="true"></i>viet.gss@gmail.com</a>
                    <a href="tel:0905279544" target="_blank" class="mobile"><i class="fa fa-mobile" aria-hidden="true"></i>0905279544</a>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <div class="copy-right">© 2017 www.hamubay.vn. All Rights Reserved.DEVELOPED BY <a target="_blank" href="http://vinadesigndanang.vn/"><strong style="color: #de0204;">VINA</strong>DESIGN</a>
                        <div class="clearfix visible-xs visible-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="type nz-button-2">
    <div><a href="tel:0905279544" class="nz-bt nz-bt-2">
            <span class="txt">0905279544</span>
            <span class="round">
                    <i class="fa fa-phone faa-ring faa-slow animated"></i>
                </span></a>
    </div>
    <div>
        <a id="form-lh" href="#lien-he" class="nz-bt nz-bt-1">
            <span class="txt">Đăng ký nhận <br>thông tin dự án</span>
            <span class="round">
                    <i class="fa fa-envelope faa-ring faa-slow animated" style="margin-top: -9px;margin-left: -7px;">
                    </i></span>
        </a>
    </div>
</div>
<a href="javascript:;" class="scrollup scrollup-visible scrollup-fade-out">Top</a>
<div class="fb-livechat" style="display: block;">
    <div class="ctrlq fb-overlay"></div>
    <div class="fb-widget">
        <div class="ctrlq fb-close"></div>
        <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/HamubayPhanThiet" data-tabs="messages"
             data-width="360" data-height="400" data-small-header="true" data-hide-cover="true"
             data-show-facepile="false" fb-xfbml-state="rendered"
             fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;height=400&amp;hide_cover=true&amp;href=https%3A%2F%2Fwww.facebook.com%2FHamubayPhanThiet&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=false&amp;small_header=true&amp;tabs=messages&amp;width=360"><span
                    style="vertical-align: bottom; width: 360px; height: 400px;">
                <iframe name="f755ac3d420464" width="360px" height="400px" frameborder="0" allowtransparency="true"
                        allowfullscreen="true" scrolling="no" allow="encrypted-media"
                        title="fb:page Facebook Social Plugin"
                        src="https://www.facebook.com/v2.9/plugins/page.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fd_vbiawPdxB.js%3Fversion%3D44%23cb%3Dff94e9dc25994%26domain%3Dhamubay.vn%26origin%3Dhttp%253A%252F%252Fhamubay.vn%252Ff376278b5bb86e%26relation%3Dparent.parent&amp;container_width=0&amp;height=400&amp;hide_cover=true&amp;href=https%3A%2F%2Fwww.facebook.com%2FHamubayPhanThiet&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=false&amp;small_header=true&amp;tabs=messages&amp;width=360"
                        class=""
                        style="border: none; visibility: visible; width: 360px; height: 400px;"></iframe></span></div>
        <div class="fb-credit"><a href="https://chanhtuoi.com" target="_blank">Powered by Chanhtuoi</a></div>
        <div id="fb-root"></div>
    </div>
    <a href="https://m.me/HamubayPhanThiet" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button">
        <i class="fas fa-sms" style="position: absolute;top: 16px;color: white;font-size: 30px;right: 13px;"></i>
        <div class="bubble">1</div>
        <div class="bubble-msg ">Bạn cần hỗ trợ?</div>
    </a>
</div>
</body>
<script>
  // $(".main-menu > ul > li > a, #form-lh").click(function(e){
  //   var id = $(this).prop("hash");
  //   if (id != '') {
  //     var top = $(id).offset().top-60;
  //     $("html, body").animate({
  //       scrollTop: top
  //     }, 500);
  //   }
  // });
</script>
</html>
