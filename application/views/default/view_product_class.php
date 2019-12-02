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
				<h2><a class="title_page" title="<?php echo custom_htmlspecialchars($info_content['product_class_title']) ?>" href="<?php echo current_url(); ?>"><?php echo ($info_content['product_class_title'] != '') ? $info_content['product_class_title'] : $info_content['message_system_title']; ?></a></h2>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div class="list_product">
					<?php

					if(is_array($product) && !empty($product)){

						$i=0;
						foreach($product as $key=> $value){

							$url_img_product=array();
							$url_img=@unserialize(element('product_img',$value,array()));
							if(is_array($url_img) && !empty($url_img))
								foreach($url_img as $key_img=> $value_img)
									$url_img_product[]=$value_img;

							?>
							<div class="item_product" style="<?php echo ($i % 3 == 0) ? "clear:both;" : ""; ?>">
								<div class="bg_item_product_image">
									<div class="item_product_image">
										<a title="<?php echo custom_htmlspecialchars(element('product_name',$value,'')); ?>" href="<?php echo base_url()."detailproduct/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('product_alias',$value,'')."/".element('product_id',$value,'').URL_SUFFIX ?>">
											<img alt="<?php echo custom_htmlspecialchars(element('product_name',$value,'')); ?>" src="<?php echo base_src_img(element(0,$url_img_product,'')); ?>"/>
										</a>
									</div>
								</div>

								<div class="item_product_name">
									<h3><a title="<?php echo custom_htmlspecialchars(element('product_name',$value,'')); ?>" href="<?php echo base_url()."detailproduct/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('product_alias',$value,'')."/".element('product_id',$value,'').URL_SUFFIX ?>">
											<?php echo element('product_name',$value,''); ?>
										</a></h3>
								</div>

								<div class="item_product_price">
									<?php

									if(element('product_price_old',$value,0) == 0){

										echo number_format(element('product_price',$value,0),0,',','.').'<sup>'.CURRENCY_UNIT.'</sup>';
									}
									else{

										?>
										<div class="item_product_price_new">
											<?php echo number_format(element('product_price',$value,0),0,',','.').'<sup>'.CURRENCY_UNIT.'</sup>' ?>
										</div>
										<div class="item_product_price_percent">
											<?php echo number_format((element('product_price',$value,0) - element('product_price_old',$value,0)) * 100 / element('product_price_old',$value,0)) ?>%
										</div>
										<div class="item_product_price_old">
											<?php echo number_format(element('product_price_old',$value,0),0,',','.').'<sup>'.CURRENCY_UNIT.'</sup>' ?>
										</div>
										<?php

									}

									?>
								</div>
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