<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 02-08-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if($this->uri->segment(1,'') != 'cart'){

	?>
	<div class="module_left">
		<div class="title_border_center">
			<div class="title_border_left">
				<div class="title_border_right"><?php echo $info_cart['cart_module_title']; ?></div>
			</div>
		</div>

		<div class="content_border_center">
			<div class="content_border_left">
				<div class="content_border_right">
					<div id="module_cart" class="list_cart_style_one">
						<div class="item_cart">
							<span class="item_cart_title"><?php echo $info_cart['cart_module_quantity']; ?></span>
							<span class="item_cart_content"><?php echo number_format($this->custom_cart->total_item_cart()); ?></span>
						</div>
						<div class="item_cart">
							<span class="item_cart_title"><?php echo $info_cart['cart_module_total']; ?></span>
							<span class="item_cart_content"><?php echo number_format($this->custom_cart->total_money_cart(),0,',','.').'<sup>'.CURRENCY_UNIT.'</sup>'; ?></span>
						</div>
						<div class="item_cart">
							<a class="item_cart_button" title="<?php echo $info_cart['cart_module_button_delivery']; ?>" href="<?php echo base_url()."delivery".URL_SUFFIX; ?>"><?php echo $info_cart['cart_module_button_delivery']; ?></a>
							<a class="item_cart_button" title="<?php echo $info_cart['cart_module_button_cart']; ?>" href="<?php echo base_url()."cart".URL_SUFFIX; ?>"><?php echo $info_cart['cart_module_button_cart']; ?></a>
						</div>
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