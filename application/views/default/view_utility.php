<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 02-08-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(is_array($utility) && !empty($utility)){

	?>
	<div class="module_left">
		<div class="title_border_center">
			<div class="title_border_left">
				<div class="title_border_right"><?php echo $info_utility['utility_module_title']; ?></div>
			</div>
		</div>

		<div class="content_border_center">
			<div class="content_border_left">
				<div class="content_border_right">
					<div id="module_utility" class="list_utility_horizontal">
						<?php

						$i=0;
						foreach($utility as $key=> $value){

							if($i % 4 == 0)
								echo "<div class='item'>";

							?>
							<div class="item_utility" <?php echo ($i % 2 === 0) ? "style='clear:both;'" : ""; ?>>

								<div class="item_utility_img">
									<a rel="nofollow" title="<?php echo custom_htmlspecialchars(element('utility_name',$value,'')) ?>" target="_blank" href="<?php echo element('utility_url',$value,''); ?>">
										<img alt="<?php echo custom_htmlspecialchars(element('utility_name',$value,'')) ?>" src="<?php echo base_src_img(element('utility_img',$value,'')) ?>"/>
									</a>
								</div>

								<div class="item_utility_name">
									<h3><a rel="nofollow" title="<?php echo custom_htmlspecialchars(element('utility_name',$value,'')) ?>" target="_blank" href="<?php echo element('utility_url',$value,''); ?>">
											<?php echo element('utility_name',$value,''); ?>
										</a></h3>
								</div>
							</div>
							<?php

							if($i % 4 == 3 || $i == (count($utility) - 1))
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