<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 03-08-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

echo $banner;

?>

<div class="module_miscellaneous_header">
	<div class="support_header_phone">
		<?php

		if(is_array($support_phone) && !empty($support_phone)){

			$result_phone="<span>HOTLINE:</span>&nbsp;";
			$i=0;
			foreach($support_phone as $key=> $value){

				$result_phone.=element('support_nick',$value,'')."&nbsp;-&nbsp;";
				if($i == 1)
					break;

				$i++;
			}

			echo substr($result_phone,0,-13);
		}
		else
			echo "HOTLINE: 093 2 713 890 - 091 6 639 066";

		?>
	</div>

	<div class="location_header">
		<a href="https://www.google.com/maps/d/viewer?hl=vi&hl=vi&authuser=0&authuser=0&mid=zDnt5kipu1mg.kipuahy1KN3c" target="_blank">Chỉ Đường</a>
	</div>

	<div class="email_header">
		<?php

		if(is_array($support_contact) && !empty($support_contact)){

			$i=0;
			foreach($support_contact as $key=> $value){

				?>
				<a href="mailto:<?php echo element('support_nick',$value,''); ?>"><?php echo element('support_nick',$value,''); ?></a>
				<?php

				if($i == 1)
					break;

				$i++;
			}
		}

		?>

	</div>

	<div class="cart_header">
		<a href="<?php echo base_url()."cart/order".URL_SUFFIX; ?>">Giỏ Hàng (<?php echo number_format($this->custom_cart->total_item_cart()); ?>)</a>
	</div>
</div>