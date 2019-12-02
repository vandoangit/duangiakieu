<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(true){

	?>
	<div class="module_menu_marquee">
		<div class="bg_module_menu_marquee">
			<div class="logo_website">
				<a href="<?php echo base_url(); ?>" title="<?php echo $info_home['title_web'] ?>">
					<img src="<?php echo base_src_img('Images/logo/logo_monet.png'); ?>" alt="<?php echo $info_home['title_web'] ?>" />
				</a>
			</div>

			<div class="marquee_header">
				<div class="marquee_header_tag">
					Công Ty TNHH Thương Mại Dịch Vụ Trực Tuyến Monet
				</div>
			</div>

			<div class="menu_member">
				<div class="member_login">
					<?php

					if(is_array($user_login) && !empty($user_login)){

						?>
						<ul class="member_logged">
							<li class="logout_member"><a href="<?php echo base_url()."members/logout/" ?>" title="<?php echo $info_menu_header['members_module_logout']; ?>"><?php echo $info_menu_header['members_module_logout']; ?></a></li>
							<li class="fullname_member"><a href="<?php echo base_url()."members/update/" ?>" title="<?php echo element('user_name',$user_login,''); ?>"><?php echo element('user_name',$user_login,''); ?></a></li>
							<li class="welcome_member"><?php echo $info_menu_header['members_module_welcome'] ?></li>
							<li class="membership_card_facebook"><a href="<?php echo base_url()."facebook/themelogin/" ?>" title="<?php echo $info_menu_header['label_membership_card']; ?>"><?php echo $info_menu_header['label_membership_card']; ?></a></li>
						</ul>
						<?php

					}
					else{

						?>

						<a class="button_member_login" id="button_member_login" href="#" ><span><span><?php echo $info_menu_header['members_module_button_login']; ?></span></span></a>
						<a class="label_member_register" href="<?php echo base_url()."members/register/" ?>" title="<?php echo $info_menu_header['members_module_register']; ?>"><?php echo $info_menu_header['members_module_register']; ?></a>
						<a class="label_membership_register" href="<?php echo base_url()."membership/card/" ?>" title="<?php echo $info_menu_header['label_membership_register']; ?>"><?php echo $info_menu_header['label_membership_register']; ?></a>

						<div id="box_member_login" class="box_member_login">
							<form id="form_member_login" name="form_member_login" method="post">
								<fieldset>
									<label class="label_member_login"><?php echo $info_menu_header['members_module_account']; ?></label>
									<input type="text" name="txt_account_login" id="txt_account_login" value="" placeholder="<?php echo $info_menu_header['members_module_account']; ?>" autocomplete="off" class="input_member_login" />
								</fieldset>

								<fieldset>
									<label class="label_member_login"><?php echo $info_menu_header['members_module_pass']; ?></label>
									<input type="password" name="txt_password_login" id="txt_password_login" value="" placeholder="<?php echo $info_menu_header['members_module_pass']; ?>" autocomplete="off" class="input_member_login" />
								</fieldset>

								<div class="label_message_login" id="label_message_login"></div>

								<div id="submit_member_login" class="submit_member_login"><?php echo $info_menu_header['members_module_button_login']; ?></div>

								<div class="label_forgot_password"><a href="#" title="<?php echo $info_menu_header['members_module_forgot']; ?>"><?php echo $info_menu_header['members_module_forgot']; ?></a></div>

								<div class="label_register_member"><a href="<?php echo base_url()."members/register/" ?>" title="<?php echo $info_menu_header['members_module_register']; ?>"><?php echo $info_menu_header['members_module_register']; ?></a></div>
							</form>
						</div>
						<?php

					}

					?>
				</div>
			</div>
		</div>
	</div>
	<?php

}

if(is_array($menu) && !empty($menu)){

	?>
	<div class="module_menu_header">
		<div class="content_ddsmoothmenu">
			<div class="left_ddsmoothmenu">
				<div class="right_ddsmoothmenu">
					<div id="menu_header" class="ddsmoothmenu">
						<ul>
							<?php

							$i=0;
							foreach($menu as $key=> $value){

								$string_class=($i === 0) ? "class='first_ddsmoothmenu'" : "";

								$menu_url=element('menu_url',$value,'');
								if($menu_url == "")
									$menu_url=base_url();
								else if(strpos($menu_url,"http://") === false && preg_match('/'.URL_SUFFIX.'$/i',$menu_url) == false)
									$menu_url=preg_replace("/(\/)$/i","",base_url().$menu_url).URL_SUFFIX;
								else if(strpos($menu_url,"http://") === false && preg_match('/'.URL_SUFFIX.'$/i',$menu_url) != false)
									$menu_url=preg_replace("/(\/)$/i","",base_url().$menu_url);

								?>
								<li <?php echo $string_class; ?>>
									<a title="<?php echo custom_htmlspecialchars(element('menu_name',$value,'')); ?>" href="<?php echo $menu_url; ?>"><?php echo element('menu_name',$value,''); ?></a>
								</li>
								<?php

								$i++;
							}

							?>
						</ul>
					</div>
				</div>
			</div>

			<!--Begin Div Language -->
			<?php $this->load->view($template_view_language,$data_language); ?>
			<!--End Div Language -->
		</div>
	</div>
	<?php

}

?>