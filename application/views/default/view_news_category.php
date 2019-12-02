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
                <h2><a class="title_page" title="<?php echo custom_htmlspecialchars(element('cate_name',$category,'')); ?>" href="<?php echo current_url(); ?>"><?php echo (element('cate_name',$category,'') != '') ? element('cate_name',$category,'') : $info_content['message_system_title']; ?></a></h2>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div class="list_news">
					<?php

					if(is_array($news) && !empty($news)){

						$i=0;
						foreach($news as $key=> $value){

							?>
							<div class="item_news" style="<?php echo ($i % 2 == 0) ? "clear:both;" : ""; ?>">
								<h3>
									<a title="<?php echo custom_htmlspecialchars(element('news_name',$value,'')); ?>" href="<?php echo base_url()."detailnews/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('news_alias',$value,'')."/".element('news_id',$value,'').URL_SUFFIX; ?>"><?php echo element('news_name',$value,''); ?></a>
								</h3>
								<?php

								if(element('news_img',$value,'') != ''){

									?>
									<a title="<?php echo custom_htmlspecialchars(element('news_name',$value,'')); ?>" href="<?php echo base_url()."detailnews/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('news_alias',$value,'')."/".element('news_id',$value,'').URL_SUFFIX ?>">
										<img alt="<?php echo custom_htmlspecialchars(element('news_name',$value,'')); ?>" src="<?php echo base_src_img(element('news_img',$value,'')); ?>" />
									</a>
									<?php

								}
								echo element('news_headline',$value,'');

								?>
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