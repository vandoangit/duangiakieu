<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 01-08-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(is_array($news) && !empty($news)){

	?>
	<div class="module_left">
		<div class="title_border_center">
			<div class="title_border_left">
				<div class="title_border_right"><?php echo $info_news['news_module_title'] ?></div>
			</div>
		</div>

		<div class="content_border_center">
			<div class="content_border_left">
				<div class="content_border_right">
					<div id="module_article_new" class="list_article_new_style_one">
						<ul>
							<?php

							foreach($news as $key=> $value){

								?>
								<li>
									<a title="<?php echo custom_htmlspecialchars(element('news_name',$value,'')); ?>" href="<?php echo base_url()."detailnews/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('news_alias',$value,'')."/".element('news_id',$value,'').URL_SUFFIX ?>">
										<img alt="<?php echo custom_htmlspecialchars(element('news_name',$value,'')); ?>" src="<?php echo base_src_img(element('news_img',$value,'')); ?>" />
									</a>
									<h3><a title="<?php echo custom_htmlspecialchars(element('news_name',$value,'')); ?>" href="<?php echo base_url()."detailnews/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('news_alias',$value,'')."/".element('news_id',$value,'').URL_SUFFIX ?>">
											&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('news_name',$value,'') ?>
										</a></h3>
								</li>   
								<?php

							}

							?>    
						</ul>   
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
	<?php

}

?>