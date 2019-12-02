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
            <div class="title_border_right"><?php echo $info_weblink['weblink_module_title']; ?></div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div id="module_weblink">
                    <select onchange="if(this.value != '--')
								window.open(this.value);
							this.options[0].selected;" name="select_link_web" class="select_link_web">
                        <option value="--">&nbsp;&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_weblink['weblink_module_select'] ?></option>
						<?php echo $weblink; ?>
                    </select>
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