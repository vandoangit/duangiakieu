<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

$url_default_template=base_url().DEFAULT_DIR_TEMPLATE;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $info_home['language_code']; ?>">
    <head>
        <link rel="shortcut icon" href="<?php echo base_url().DIR_PUBLIC; ?>images/sidebar/logo_company.gif" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="alternate" hreflang="<?php echo $info_home['language']; ?>" href="<?php echo preg_replace("/(\/)$/i","",current_url()); ?>" />

        <title><?php echo $info_home['title_web']; ?></title>
        <meta name="keywords" content="<?php echo $info_home['keyword_web']; ?>" />
        <meta name="description" content="<?php echo $info_home['description_web']; ?>" />
		<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

		<!-- Begin Geo -->
        <meta name="DC.title" content="Tư Vấn Chữ Ký Số" />
		<meta name="geo.region" content="VN" />
		<meta name="geo.placename" content="Hồ Ch&iacute; Minh" />
		<meta name="geo.position" content="10.792;106.695" />
		<meta name="ICBM" content="10.792, 106.695" />
		<!-- End Geo -->

		<!-- Begin Account Manager Facebook Comment -->
		<meta property="fb:app_id" content="1635123433438552"/>
		<meta property="fb:admins" content="<?php echo FACEBOOK_USER_ID; ?>"/>
		<!-- End Account Manager Facebook Comment -->

		<!-- Begin Facbook Post -->
        <meta property="og:url" content="<?php echo preg_replace("/(\/)$/i","",current_url()); ?>" />
        <meta property="og:title" content="<?php echo $info_home['facebook_title']; ?>" />
        <meta property="og:description" content="<?php echo $info_home['facebook_description']; ?>" />
        <meta property="og:updated_time" content="<?php echo time(); ?>" />
		<?php

		if(isset($info_home['facebook_image']) && !empty($info_home['facebook_image'])){

			?>
			<meta property="og:image" content="<?php echo $info_home['facebook_image']; ?>" />
			<meta property="og:image:width" content="500" />
			<meta property="og:image:height" content="250" />
			<?php

		}

		?>
		<!-- End Facbook Post -->

        <link href="<?php echo $url_default_template; ?>style/import.css" rel="stylesheet" type="text/css" />


        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/message_genneral-<?php echo $info_home['language']; ?>.js"></script>

        <!------------------------------------------------------------------------------------------------->
        <!-- Jquery -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/jquery-ui-1.8.18.custom.min.js"></script>

        <!-- UI Jquery -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/ui/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/ui/jquery.ui.core.js"></script>
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/ui/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/ui/jquery.effects.core.js"></script>

        <!-- Tab UI -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/ui/jquery.ui.tabs.js"></script>

        <!-- Datapicker UI -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/ui/jquery.ui.datepicker.js"></script>

        <!-- Tooltip -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/easytooltip/easyTooltip.js"></script>

        <!-- Smooth Menu -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/smooth_menu/ddsmoothmenu.js"></script>

        <!-- Responsive Multi Level Menu -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/dlmenu/modernizr.custom.js"></script>
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/dlmenu/jquery.dlmenu.js"></script>

        <!-- Nivo Slider -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/nivo_slider/jquery.nivo.slider.js"></script>

		<!-- Cycle -->
        <script type="text/javascript" src="<?php echo base_url().DEFAULT_DIR_TEMPLATE; ?>js/cycle/jquery.cycle.all.js"></script>

        <!-- Jquery Zoom -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/jqzoom/jquery.jqzoom-core.js"></script>

        <!-- Scroll To Fixed -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/scrolltofixed/jquery.scrolltofixed.js"></script>

        <!-- Scroll Marquee -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/bxslider/jquery.bxslider.js"></script>

        <!-- Tag Marquee -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/marquee/jquery.marquee.js"></script>

        <!-- Ddslick -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/ddslick/jquery.ddslick.js"></script>

        <!-- Light Box -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/lightbox/jquery.lightbox.min.js"></script>

		<!-- Full Screen -->
        <script type="text/javascript" src="<?php echo base_url().DEFAULT_DIR_TEMPLATE; ?>js/fullscreen/jquery.fullscreen-0.3.5.min.js"></script>

        <!-- Validation -->
        <script src="<?php echo $url_default_template; ?>js/validation/jquery.validationEngine.js" type="text/javascript"></script>
        <script src="<?php echo $url_default_template; ?>js/validation/jquery.validationEngine-<?php echo $info_home['language']; ?>.js" type="text/javascript"></script>

        <script language="javascript">
			//Su dung trong cac file ajax
			var base_url_root='';
			base_url_root="<?php echo base_url(); ?>";
			var URL_SUFFIX='';
			URL_SUFFIX="<?php echo URL_SUFFIX; ?>";
        </script>

        <!-- General Config -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_genneral.js"></script>

        <!-- Login -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/login.js"></script>

        <!-- General Ajax -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/general_ajax.js"></script>
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/general_form_submit.js"></script>

        <!-- Ajax Search -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/ajax_search.js"></script>
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/ajax/ajax_search.js"></script>

        <!-- Ajax Member -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/ajax_members.js"></script>
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/ajax/ajax_members.js"></script>
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/ajax/ajax_membership.js"></script>

        <!-- Ajax Captcha -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/ajax_captcha.js"></script>

        <!-- Ajax Comment -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/ajax_comment.js"></script>

        <!-- Ajax Cart -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/ajax_cart.js"></script>
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/ajax/ajax_cart.js"></script>

        <!-- Tab UI -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_ui_tab.js"></script>

        <!-- Tooltip -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_tooltip.js"></script>

        <!-- Smooth Menu -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_ddsmoothmenu.js"></script>

        <!-- Responsive Multi Level Menu -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_dlmenu.js"></script>

        <!-- Nivo Slider -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_nivo_slider.js"></script>

		<!-- Cycle -->
        <script type="text/javascript" src="<?php echo base_url().DEFAULT_DIR_TEMPLATE; ?>js/general_config/setting_cycle.js"></script>

        <!-- Jquery Zoom -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_jqzoom.js"></script>

        <!-- Scroll To Fixed -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_scrolltofixed.js"></script>

        <!-- Scroll Marquee -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_bxslider.js"></script>

        <!-- Tag Marquee -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_marquee.js"></script>

        <!-- Scroll Banner Sidebar -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_scroll_banner_sidebar.js"></script>

        <!-- Ddslick -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_ddslick.js"></script>

		<!-- Full Screen -->
        <script type="text/javascript" src="<?php echo base_url().DEFAULT_DIR_TEMPLATE; ?>js/general_config/setting_fullscreen.js"></script>

        <!-- Validation -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_validation.js"></script>

        <!-- Input Datapicker UI -->
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/general_config/setting_input_datepicker.js"></script>
        <script type="text/javascript" src="<?php echo $url_default_template; ?>js/ui/i18n/jquery.ui.datepicker-<?php echo $info_home['language']; ?>.js"></script>
        <script language="javascript">
			$(document).ready(function(){
				$.datepicker.setDefaults($.datepicker.regional["<?php echo $info_home['language']; ?>"]);
			});
        </script>
    </head>

    <body>

        <div id="body_header">
            <div class="header_banner">
                <!--Begin Div Banner -->
				<?php $this->load->view($template_view_banner,$data_banner); ?>
                <!--End Div Banner -->

				<div class="search_header_position">
					<!--Begin Div Header Search -->
					<?php $this->load->view($template_view_search_header,$data_search_header); ?>
                    <!--End Div Header Search -->
				</div>

				<div class="module_menu_position">
					<!--Begin Div Menu -->
					<?php $this->load->view($template_view_menu_header,$data_menu_header); ?>
					<!--End Div Menu -->
				</div>

                <!--Begin Div Language -->
				<?php $this->load->view($template_view_language,$data_language); ?>
                <!--End Div Language -->
            </div>
        </div>

		<div id="body_slider">
			<div class="bg_body_slider">
				<!--Begin Div Slider -->
				<?php $this->load->view($template_view_slider,$data_slider); ?>
				<!--End Div Slider -->
			</div>
		</div>

        <div id="body_main">
            <div id="body_content">
                <div id="left_content">

                    <!--Begin Div Menu Left -->
					<?php $this->load->view($template_view_menu_left,$data_menu_left); ?>
                    <!--End Div Menu Left -->

                    <!--Begin Div Search -->
					<?php //$this->load->view($template_view_search,$data_search);      ?>
                    <!--End Div Search -->

                    <!--Begin Div News -->
					<?php //$this->load->view($template_view_news,$data_news);      ?>
                    <!--End Div News -->

					<!--Begin Div Product New -->
					<?php $this->load->view($template_view_product_new,$data_product_new); ?>
					<!--End Div Product New -->

                    <!--Begin Div Product View -->
					<?php //$this->load->view($template_view_product_view,$data_product_view); ?>
                    <!--End Div Product View -->

					<!--Begin Div Product Buy -->
					<?php //$this->load->view($template_view_product_buy,$data_product_buy); ?>
					<!--End Div Product Buy -->

					<!--Begin Div Product Prominent -->
					<?php //$this->load->view($template_view_product_prominent,$data_product_prominent); ?>
					<!--End Div Product Prominent -->

                    <!--Begin Div Support -->
					<?php $this->load->view($template_view_support,$data_support); ?>
                    <!--End Div Support -->

                    <!--Begin Div Partner -->
					<?php $this->load->view($template_view_partner,$data_partner); ?>
                    <!--End Div Partner -->

                    <!--Begin Div Weblink -->
					<?php //$this->load->view($template_view_weblink,$data_weblink); ?>
                    <!--End Div Weblink -->

                    <!--Begin Div Utility -->
					<?php //$this->load->view($template_view_utility,$data_utility); ?>
                    <!--End Div Utility -->

					<!--Begin Div Facebook -->
					<?php $this->load->view($template_view_facebook,$data_facebook); ?>
                    <!--End Div Facebook -->

					<!--Begin Div Video -->
					<?php $this->load->view($template_view_video,$data_video); ?>
                    <!--End Div Video -->

					<!--Begin Div Members -->
					<?php //$this->load->view($template_view_members,$data_members); ?>
					<!--End Div Members -->

					<!--Begin Div Cart -->
					<?php //$this->load->view($template_view_cart,$data_cart); ?>
					<!--End Div Cart -->

					<!--Begin Div Static -->
					<?php //$this->load->view($template_view_static,$data_static); ?>
					<!--End Div Static -->

					<!--Begin Div Advertise Left -->
					<?php $this->load->view($template_view_advertise_left,$data_advertise_left); ?>
					<!--End Div Advertise Left -->

				</div>

				<div id="middle_content">
					<!--Begin Div Content -->
					<?php $this->load->view($template_view_content,$data_content); ?>
					<!--End Div Content -->
				</div>
				<?php

				/*
				  <div id="right_content">
				  <!--Begin Div Advertise Right -->
				  <?php $this->load->view($template_view_advertise_right,$data_advertise_right);?>
				  <!--End Div Advertise Right -->
				  </div>
				 */

				?>
				<div class="clr"></div>
			</div>
		</div>
		<div id="shadow_module_content">&nbsp;</div>

		<div id="footer">
			<div id="body_footer">
				<!--Begin Div Footer -->
				<?php $this->load->view($template_view_footer,$data_footer); ?>
				<!--End Div Footer -->
			</div>
		</div>

		<div id="loading_default" style="display:none;">
			<div>
				<table width="100%" cellpadding="0px" cellspacing="0px" border="0px">
					<tbody>
						<tr>
							<td width="35" align="center"><img src="<?php echo base_url().DEFAULT_DIR_TEMPLATE; ?>images/img_loading.gif" border=0 /></td>
							<td>Tiến trình đang được thực hiện.Vui lòng chờ đợi trong giây lát...</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div id="fb-root"></div>
		<script type="text/javascript">

			window.fbAsyncInit=function(){

				FB.init({
					appId:'1635123433438552',
					xfbml:true,
					version:'v2.4'
				});
			};

			(function(d,s,id){

				var js,fjs=d.getElementsByTagName(s)[0];
				if(d.getElementById(id)){
					return;
				}

				js=d.createElement(s);
				js.id=id;
				js.src="//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js,fjs);
			}(document,'script','facebook-jssdk'));
		</script>
    </body>
</html>