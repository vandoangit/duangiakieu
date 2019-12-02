<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(is_array($slider) && !empty($slider)){

	?>
	<div class="slider-wrapper theme-default">
		<div class="slider_main">
			<div id="slider_header" class="nivoSlider">
				<?php

				foreach($slider as $key=> $value){

					?>
					<a title="<?php echo custom_htmlspecialchars(element('ad_name',$value,'')) ?>" href="<?php echo element('ad_link',$value,'') ?>" target="_blank">
						<img alt="<?php echo custom_htmlspecialchars(element('ad_name',$value,'')); ?>" src="<?php echo base_src_img(element('ad_img',$value,'')); ?>" data-thumb="<?php echo base_src_img(element('ad_img',$value,'')); ?>" />
					</a>
					<?php

				}

				?>
			</div>
		</div>
	</div>
	<?php

}

?>