<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 01-08-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>
<div class="module_left">
    <div class="title_border_center">
        <div class="title_border_left">
            <div class="title_border_right"><?php echo $info_support['support_module_title'] ?></div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div id="module_support" class="list_support_style_two">
					<?php

					if((is_array($support_phone) && !empty($support_phone))){

						?>
						<div class="item_support_phone"><p><?php echo element('support_nick',$support_phone[0],''); ?></p></div>
						<?php

					}

					if((is_array($support_yahoo) && !empty($support_yahoo))){

						?>
						<ul>
							<?php

							foreach($support_yahoo as $key=> $value){

								?>
								<li>
									<div class="item_support_name"><?php echo element('support_name',$value,''); ?></div>
									<div class="item_support_info"><?php echo element('support_info',$value,''); ?></div>
									<div class="item_support_img"><?php echo show_status_support(element('cate_id',$value,''),$value,2); ?></div>
								</li>
								<?php

							}

							?>
						</ul>
						<?php

					}

					if((is_array($support_skype) && !empty($support_skype))){

						?>
						<ul>
							<?php

							foreach($support_skype as $key=> $value){

								?>
								<li>
									<div class="item_support_name"><?php echo element('support_name',$value,''); ?></div>
									<div class="item_support_info"><?php echo element('support_info',$value,''); ?></div>
									<div class="item_support_img"><?php echo show_status_support(element('cate_id',$value,''),$value,14); ?></div>
								</li>
								<?php

							}

							?>
						</ul>
						<?php

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