<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(true){

	?>
	<div class="module_menu_search">
		<div class="module_menu_search_1000">
			<div class="logo_website">
				<a href="<?php echo base_url(); ?>" title="<?php echo $info_home['title_web'] ?>">
					<img src="<?php echo base_src_img('Images/logo/logo_otobank.png'); ?>" alt="<?php echo $info_home['title_web'] ?>" />
				</a>
			</div>

			<div class="menu_search">
				<select name="select_city_search_box" id="select_city_search_box" style="display:none;">
					<?php

					if(is_array($city) && !empty($city)){

						foreach($city as $key=> $value){

							?>
							<option value="<?php echo element('province_id',$value,'') ?>"><?php echo element('province_name',$value,'') ?></option>
							<?php

						}
					}

					?>
				</select>

				<input type="text" name="input_key_search_box" id="input_key_search_box" class="input_key_search_box" placeholder="<?php echo $info_menu_header['search_module_key']; ?>" />

				<a class="button_search_box"><img src="<?php echo base_url().DIR_PUBLIC.'default/images/icon-search.png' ?>" /></a>
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
						</ul>
						<?php

					}
					else{

						?>

						<a href="#" id="button_member_login" class="button_member_login"><span><span><?php echo $info_menu_header['members_module_button_login']; ?></span></span></a>

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