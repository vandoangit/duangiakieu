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
				<h2><a class="title_page" title="<?php echo custom_htmlspecialchars(element('cate_name',$video_one,'')); ?>"  href="<?php echo base_url().element('menu_class',$video_one,'').'/'.element('cate_alias',$video_one,'').'/'.element('cate_id',$video_one,'').URL_SUFFIX ?>" ><?php echo element('cate_name',$video_one,$info_content['message_system_title']); ?></a></h2>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div class="detail_video">
					<?php echo $video_html; ?>
                </div>

                <div class="title_video_involved"><?php echo $info_content['video_detail_involved'] ?></div>

                <div class="list_video">
					<?php

					if(is_array($video) && !empty($video)){

						$i=0;
						foreach($video as $key=> $value){

							?>
							<div class="item_video" style="<?php echo ($i % 2 == 0) ? "clear:both;" : ""; ?>">
								<div class="item_video_image">
									<a title="<?php echo custom_htmlspecialchars(element('video_name',$value,'')); ?>" href="<?php echo base_url()."detailvideo/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('video_alias',$value,'')."/".element('video_id',$value,'').URL_SUFFIX ?>">
										<img alt="<?php echo custom_htmlspecialchars(element('video_name',$value,'')); ?>" src="<?php echo base_src_img(element('video_img',$value,'')); ?>" />
									</a>
								</div>

								<div class="item_video_name">
									<h3><a title="<?php echo custom_htmlspecialchars(element('video_name',$value,'')); ?>" href="<?php echo base_url()."detailvideo/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('video_alias',$value,'')."/".element('video_id',$value,'').URL_SUFFIX ?>">
											<?php echo element('video_name',$value,''); ?>
										</a></h3>
								</div>

								<div class="item_video_description"><?php echo element('video_description',$value,''); ?></div>

								<p class="item_video_date"><label><?php echo $info_content['video_create_date']; ?>:</label><?php echo date('d/m/Y',strtotime(element('video_create_date',$value,''))); ?></p>

								<p class="item_video_date"><label><?php echo $info_content['video_update_date']; ?>:</label><?php echo date('d/m/Y',strtotime(element('video_update_date',$value,''))); ?></p>
							</div>
							<?php

							$i++;
						}
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