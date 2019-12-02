<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 31-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>
<div class="module_content">
    <div class="title_border_center">
        <div class="title_border_left">
            <div class="title_border_right">
                <h1><a class="homepage_page" title="<?php echo custom_htmlspecialchars($info_home['homepage_website']) ?>" href="<?php echo base_url(); ?>"><?php echo ($info_home['homepage_website'] != '') ? $info_home['homepage_website'] : $info_content['message_system_title']; ?></a></h1>
				<span class="arrow_page">&#187;</span>
				<h2><a class="title_page" title="<?php echo $info_content['cart_finish_title'] ?>" href="<?php echo current_url(); ?>"><?php echo $info_content['cart_finish_title'] ?></a></h2>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div id="module_cart" class="cart_finish cart_shopping">
                    <div class="cart_finish_body">
						<?php echo $submit_cart; ?>
                    </div>

                    <div class="cart_shopping_action">
                        <div class="cart_shopping_action_next">
                            <a title="<?php echo $info_content['label_general_home'] ?>" href="<?php echo base_url(); ?>"><?php echo $info_content['label_general_home'] ?></a>
                        </div>
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