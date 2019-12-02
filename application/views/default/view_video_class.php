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
				<h2><a class="title_page" title="<?php echo custom_htmlspecialchars($info_content['video_class_title']) ?>" href="<?php echo current_url(); ?>"><?php echo ($info_content['video_class_title'] != '') ? $info_content['video_class_title'] : $info_content['message_system_title']; ?></a></h2>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div class="list_video">
					<?php

					if(is_array($video) && !empty($video)){

						$i=0;
						foreach($video as $key=> $value){

							?>
							<script language="javascript">
								$(document).ready(function(){
									$("#body_content .list_video").delegate("<?php echo ".lightbox_video_".element('video_id',$value,''); ?>","click",function(){

										var html=$("<?php echo "<div align='center'>".$this->m_video->show_one_video_front_end(element('video_id',$value,''),$video_class,$this->my_layout->sess_lang_default,600,350)."</div>"; ?>");

										$.lightbox(html,{
											width:600,
											height:350
										});

										return false;
									});
								});
							</script>

							<div class="item_video" style="<?php echo ($i % 2 == 0) ? "clear:both;" : ""; ?>">
								<div class="item_video_image">
									<a class="<?php echo "lightbox_video_".element('video_id',$value,''); ?>" title="<?php echo custom_htmlspecialchars(element('video_name',$value,'')); ?>">
										<img alt="<?php echo custom_htmlspecialchars(element('video_name',$value,'')); ?>" src="<?php echo base_src_img(element('video_img',$value,'')); ?>" />
									</a>
								</div>

								<div class="item_video_name">
									<h3><a class="<?php echo "lightbox_video_".element('video_id',$value,''); ?>" title="<?php echo custom_htmlspecialchars(element('video_name',$value,'')); ?>">
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
					else{

						echo "<div class='system_update'>".$info_content['message_system_update']."</div>";
					}

					?>
                </div>
				<?php

				if($this->pagination->create_links() != ''){

					?>
					<div class="div_pagination_admin">
						<div class="div_pagination_admin_content">
							<?php echo $this->pagination->create_links(); ?>
						</div>
					</div>
				<?php } ?>
            </div>
        </div>
    </div>

    <div class="bottom_border_center">
        <div class="bottom_border_left">
            <div class="bottom_border_right">&nbsp;</div>
        </div>
    </div>
</div>