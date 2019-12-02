<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 01-08-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if($menu_left != ''){

	?>
	<div class="module_left module_menu_left_special">
		<div class="title_border_center">
			<div class="title_border_left">
				<div class="title_border_right"><?php echo $info_menu_left['menu_left_module_title'] ?></div>
			</div>
		</div>

		<div class="content_border_center">
			<div class="content_border_left">
				<div class="content_border_right">
					<div id="menu_left" class="ddsmoothmenu-v">
						<?php echo $menu_left; ?>
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