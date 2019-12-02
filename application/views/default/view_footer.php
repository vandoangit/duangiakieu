<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>
<div class="module_footer">
	<div class="content_border_center">
		<div class="content_border_left">
			<div class="content_border_right">
				<div class="footer_information_contact">
					<div class="contact_website_name">
						<img src="<?php echo base_url().DIR_PUBLIC.'images/footer/footer_website_name.png'; ?>" />
					</div>
					<div class="contact_address">66 Tân Vĩnh, Phường 6, Q. 4, Tp.HCM</div>
					<div class="contact_phone">0932 713 890</div>
					<div class="contact_email">
						<a href="mailto:khanhho1502@gmail.com" title="khanhho1502@gmail.com">khanhho1502@gmail.com</a>
					</div>
					<div class="contact_domain">
						
						Mã Số Thuế:&nbsp;0313059516
						<?php

						/*
						  <a href="http://www.myphamcontrai.com" title="www.myphamcontrai.com" target="_blank">www.myphamcontrai.com</a> |
						  <a href="http://www.serumfacethemen.com" title="www.serumfacethemen.com" target="_blank">www.serumfacethemen.com</a> |<br/>
						  <a href="http://www.thementhailan.com" title="www.thementhailan.com" target="_blank">www.thementhailan.com</a>
						 */

						?>
					</div>
					<div class="contact_domain">
						
						Chủ Sở Hữu:&nbsp;Hồ Thị Duy Khanh
					</div>
				</div>

				<div class="footer_statics">
					<div class="footer_statics_title"><?php echo $info_footer['static_module_title']; ?></div>
					<div class="footer_statics_content">
						<div class="item_static">
							<span class="item_static_title online"><?php echo $info_footer['static_module_online'] ?></span>
							<span class="item_static_content"><?php echo $this->static_user->get_online(); ?></span>
						</div>

						<div class="item_static">
							<span class="item_static_title today"><?php echo $info_footer['static_module_today'] ?></span>
							<span class="item_static_content"><?php echo $this->static_user->get_today(); ?></span>
						</div>

						<div class="item_static">
							<span class="item_static_title yesterday"><?php echo $info_footer['static_module_yesterday'] ?></span>
							<span class="item_static_content"><?php echo $this->static_user->get_yesterday(); ?></span>
						</div>

						<div class="item_static">
							<span class="item_static_title week"><?php echo $info_footer['static_module_week'] ?></span>
							<span class="item_static_content"><?php echo $this->static_user->get_week(); ?></span>
						</div>

						<div class="item_static">
							<span class="item_static_title month"><?php echo $info_footer['static_module_month'] ?></span>
							<span class="item_static_content"><?php echo $this->static_user->get_month(); ?></span>
						</div>

						<div class="item_static">
							<span class="item_static_title sum"><?php echo $info_footer['static_module_count'] ?></span>
							<span class="item_static_content"><?php echo $this->static_user->get_sum(); ?></span>
						</div>
					</div>
				</div>

				<div class="footer_menu">
					<div class="footer_menu_title"><?php echo $info_footer['footer_menu_module_title']; ?></div>
					<div class="footer_menu_content">
						<?php

						if(is_array($menu) && !empty($menu)){

							?>
							<ul>
								<?php

								$i=0;
								foreach($menu as $key=> $value){

									$string_class=($i === 0) ? "class='first_item_menu'" : "";

									$menu_url=element('menu_url',$value,'');
									if($menu_url == "")
										$menu_url=base_url();
									else if(strpos($menu_url,"http://") === false && preg_match('/'.URL_SUFFIX.'$/i',$menu_url) == false)
										$menu_url=preg_replace("/(\/)$/i","",base_url().$menu_url).URL_SUFFIX;
									else if(strpos($menu_url,"http://") === false && preg_match('/'.URL_SUFFIX.'$/i',$menu_url) != false)
										$menu_url=preg_replace("/(\/)$/i","",base_url().$menu_url);

									?>
									<li <?php echo $string_class; ?>><a title="<?php echo custom_htmlspecialchars(element('menu_name',$value,'')); ?>" href="<?php echo $menu_url; ?>"><?php echo element('menu_name',$value,''); ?></a></li>    
									<?php

									$i++;
								}

								?>
							</ul>
							<?php

						}

						?>
					</div>
				</div>

				<div class="customer_support">
					<div class="customer_support_title"><?php echo $info_footer['footer_customer_support_module_title']; ?></div>
					<div class="customer_support_content">
						<?php

						if(is_array($news_customer) && !empty($news_customer)){

							?>
							<ul>
								<?php

								foreach($news_customer as $key=> $value){

									?>
									<li><a title="<?php echo custom_htmlspecialchars(element('news_name',$value,'')); ?>" href="<?php echo base_url()."detailnews/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('news_alias',$value,'')."/".element('news_id',$value,'').URL_SUFFIX; ?>"><?php echo element('news_name',$value,''); ?></a></li>
									<?php

								}

								?>
							</ul>
							<?php

						}

						?>
					</div>
				</div>

				<div class="footer_info">
					<div class="footer_info_left">
						<?php echo element('footer_front_end',$footer,''); ?>
					</div>
					<div class="footer_info_right" style="padding:15px 0px 0px 0px;text-align:right;">
						<img style="height:70px;" src="<?php echo base_url().DIR_PUBLIC.'images/da-dang-ky-bo-cong-thuong.png'; ?>" />
						<img style="height:70px;padding-left:5px;" src="<?php echo base_url().DIR_PUBLIC.'images/qr_code.jpg'; ?>" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>