<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 01-08-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(is_array($product) && !empty($product)){

	?>
	<div class="module_left">
		<div class="title_border_center">
			<div class="title_border_left">
				<div class="title_border_right"><?php echo $info_product_view['product_view_module_title'] ?></div>
			</div>
		</div>

		<div class="content_border_center">
			<div class="content_border_left">
				<div class="content_border_right">
					<div id="module_product_view" class="list_product_view_vertical">
						<?php

						$i=0;
						foreach($product as $key=> $value){
							$url_img_product=array();
							$arr_product_img=@unserialize(element('product_img',$value,array()));
							if(is_array($arr_product_img) && !empty($arr_product_img))
								foreach($arr_product_img as $keys=> $values)
									$url_img_product[]=$values;

							if($i % 5 == 0)
								echo "<div class='item'>";

							?>
							<div class="item_product" hominhtri="product_new_<?php echo element('product_id',$value,'') ?>">

								<a class="item_product_image" title="<?php echo custom_htmlspecialchars(element('product_name',$value,'')); ?>" href="<?php echo base_url()."detailproduct/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('product_alias',$value,'')."/".element('product_id',$value,'').URL_SUFFIX ?>">
									<img alt="<?php echo custom_htmlspecialchars(element('product_name',$value,'')); ?>" src="<?php echo base_src_img(element(0,$url_img_product,'')); ?>" />
								</a>

								<h3><a class="item_product_name" title="<?php echo custom_htmlspecialchars(element('product_name',$value,'')); ?>" href="<?php echo base_url()."detailproduct/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('product_alias',$value,'')."/".element('product_id',$value,'').URL_SUFFIX ?>">
										<?php echo element('product_name',$value,''); ?>
									</a></h3>

								<div class="item_product_price">
									<span class="item_product_price_new"><?php echo number_format(element('product_price',$value,''),0,',','.').'<sup>'.CURRENCY_UNIT.'</sup>' ?></span>
									<?php

									if(element('product_price_old',$value,0) != 0){

										?>
										<span class="item_product_price_old">(<?php echo number_format(element('product_price_old',$value,''),0,',','.'); ?>)</span>
										<?php

									}

									?>
								</div>  
							</div>

							<div id="product_new_<?php echo element('product_id',$value,'') ?>" style="display:none">
								<div class="easy_tooltip_content">
									<div class="title_tooltip">
										<?php echo element('product_name',$value,'')." (".element('product_id',$value,'').")" ?> 
										<br/>&nbsp;&nbsp;&nbsp;<span class="price_product"><?php echo number_format(element('product_price',$value,''),0,',','.').'<sup>'.CURRENCY_UNIT.'</sup>' ?></span>
									</div>

									<div class="content_tooltip">
										<?php echo element('product_headline',$value,'') ?>
									</div>
								</div>
							</div>
							<?php

							if($i % 5 == 4 || $i == (count($product) - 1))
								echo "</div>";
							$i++;
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
	<?php

}

?>