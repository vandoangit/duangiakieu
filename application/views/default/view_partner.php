<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 01-08-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(is_array($partner) && !empty($partner)){

	?>
	<div class="module_left">
		<div class="title_border_center">
			<div class="title_border_left">
				<div class="title_border_right"><?php echo $info_partner['partner_module_title'] ?></div>
			</div>
		</div>

		<div class="content_border_center">
			<div class="content_border_left">
				<div class="content_border_right">
					<div id="module_partner" class="list_partner_horizontal">
						<?php

						$i=0;
						foreach($partner as $key=> $value){

							if($i % 4 == 0)
								echo "<div class='item'>";

							if(element('partner_url',$value,'#') == "" || element('partner_url',$value,'#') == "#")
								$partner_url=base_url()."product/partner/".element('partner_alias',$value,'')."/".element('partner_id',$value,'').URL_SUFFIX;
							else
								$partner_url=element('partner_url',$value,'#');

							?>
							<div class="item_partner" <?php echo ($i % 2 === 0) ? "style='clear:both;'" : ""; ?>>

								<div class="item_partner_img">
									<a <?php echo (element('partner_url',$value,'#') != "" && element('partner_url',$value,'#') != "#") ? "rel='nofollow'" : "" ?> title="<?php echo custom_htmlspecialchars(element('partner_name',$value,'')); ?>" href="<?php echo $partner_url; ?>">
										<img alt="<?php echo custom_htmlspecialchars(element('partner_name',$value,'')); ?>" src="<?php echo base_src_img(element('partner_img',$value,'')) ?>"/>
									</a>
								</div>

								<div class="item_partner_name">
									<h3><a <?php echo (element('partner_url',$value,'#') != "" && element('partner_url',$value,'#') != "#") ? "rel='nofollow'" : "" ?> title="<?php echo custom_htmlspecialchars(element('partner_name',$value,'')); ?>" href="<?php echo $partner_url; ?>">
											<?php echo element('partner_name',$value,''); ?>
										</a></h3>
								</div>
							</div>
							<?php

							if($i % 4 == 3 || $i == (count($partner) - 1))
								echo "</div>";

							$i++;
						}

						?>
					</div>
				</div>
			</div>
		</div>

		<div class="bottom_border_center">
			<div class="bottom_border_left">
				<div class="bottom_border_right">&nbsp;</div>
			</div>
		</div>
	</div>
	<?php

}

?>