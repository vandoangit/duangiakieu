<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 02-08-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>
<div class="module_left">
    <div class="title_border_center">
        <div class="title_border_left">
            <div class="title_border_right"><?php echo $info_static['static_module_title'] ?></div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div id="module_static" class="list_static_style_one">
                    <div class="item_static">
                        <span class="item_static_title online"><?php echo $info_static['static_module_online'] ?></span>
                        <span class="item_static_content"><?php echo $this->static_user->get_online(); ?></span>
                    </div>

                    <div class="item_static">
                        <span class="item_static_title today"><?php echo $info_static['static_module_today'] ?></span>
                        <span class="item_static_content"><?php echo $this->static_user->get_today(); ?></span>
                    </div>

                    <div class="item_static">
                        <span class="item_static_title yesterday"><?php echo $info_static['static_module_yesterday'] ?></span>
                        <span class="item_static_content"><?php echo $this->static_user->get_yesterday(); ?></span>
                    </div>

                    <div class="item_static">
                        <span class="item_static_title week"><?php echo $info_static['static_module_week'] ?></span>
                        <span class="item_static_content"><?php echo $this->static_user->get_week(); ?></span>
                    </div>

                    <div class="item_static">
                        <span class="item_static_title month"><?php echo $info_static['static_module_month'] ?></span>
                        <span class="item_static_content"><?php echo $this->static_user->get_month(); ?></span>
                    </div>

                    <div class="item_static">
                        <span class="item_static_title sum"><?php echo $info_static['static_module_count'] ?></span>
                        <span class="item_static_content"><?php echo $this->static_user->get_sum(); ?></span>
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