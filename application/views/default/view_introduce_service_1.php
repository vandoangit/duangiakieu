<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
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
                <h2><a class="title_page" title="<?php echo custom_htmlspecialchars($info_content['introduce_service_title']) ?>" href="<?php echo current_url(); ?>"><?php echo $info_content['introduce_service_title'] ?></a></h2>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div class="detail_news">
					<?php

					if(is_array($service) && !empty($service)){

						?>
						<div class="detail_news_content">
							<?php echo element('news_content',$service,''); ?>
						</div>
						<?php

					}
					else{

						?>
						<div class="system_update"><?php echo $info_content['message_system_update'] ?></div>
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