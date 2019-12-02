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
                <h2><a class="title_page" title="<?php echo custom_htmlspecialchars(element('cate_name',$news_one,'')) ?>" href="<?php echo current_url(); ?>"><?php echo element('cate_name',$news_one,$info_content['news_detail_title']); ?></a></h2>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div class="detail_news">
					<?php

					if(is_array($news_one) && !empty($news_one)){

						?>
						<div class="detail_news_title">
							<h2><?php echo element('news_name',$news_one,'') ?></h2>
						</div>
						<div class="detail_news_content">
							<?php echo element('news_content',$news_one,'') ?>
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
				<?php

				if(is_array($news) && !empty($news)){

					?>
					<div class="news_involved">
						<div class="news_involved_title"><?php echo $info_content['news_detail_involved'] ?></div>
						<ul>
							<?php

							foreach($news as $key=> $value){

								?>
								<li><a title="<?php echo custom_htmlspecialchars(element('news_name',$value,'')); ?>" href="<?php echo base_url()."detailnews/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('news_alias',$value,'')."/".element('news_id',$value,'').URL_SUFFIX ?>">&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('news_name',$value,''); ?></a>&nbsp;&nbsp;(<?php echo date('d-m-Y',strtotime(element('news_update_date',$value,''))); ?>)</li>
								<?php

							}

							?>
						</ul>
					</div>
					<?php

				}

				?>
            </div>
        </div>
    </div>

    <div class="bottom_border_center">
        <div class="bottom_border_left">
            <div class="bottom_border_right">&nbsp;</div>
        </div>
    </div>
</div>