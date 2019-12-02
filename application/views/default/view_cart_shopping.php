<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 31-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(!$info_content['ajax_show_manager']){

	?>
	<div id="module_cart" class="cart_shopping">

		<div class="cart_shopping_step">
			<div class="item_step home" style="z-index:10;">
				<a href="<?php echo base_url(); ?>" title="">&nbsp;</a>
			</div>

			<div class="item_step active" style="z-index:9;">
				<a href="<?php echo base_url().'cart/shopping'.URL_SUFFIX; ?>" title="<?php echo $info_content['cart_shopping_step_cart']; ?>"><?php echo $info_content['cart_shopping_step_cart']; ?></a>
			</div>

			<div class="item_step" style="z-index:8;">
				<a href="<?php echo base_url().'cart/method'.URL_SUFFIX; ?>" title="<?php echo $info_content['cart_shopping_step_method']; ?>"><?php echo $info_content['cart_shopping_step_method']; ?></a>
			</div>

			<div class="item_step" style="z-index:7;">
				<a href="<?php echo base_url().'cart/confirm'.URL_SUFFIX; ?>" title="<?php echo $info_content['cart_shopping_step_confirm']; ?>"><?php echo $info_content['cart_shopping_step_confirm']; ?></a>
			</div>
		</div>

		<div class="cart_shopping_product" id="module_cart_ajax_content">
			<?php

		}

		?>
        <table cellpadding="0px" cellspacing="0px">
            <thead>
                <tr>
                    <th width="20%">
						<?php echo $info_content['cart_shopping_product_image']; ?>
                    </th>

                    <th width="40%">
						<?php echo $info_content['cart_shopping_product_infomation']; ?>
                    </th>

                    <th width="15%">
						<?php echo $info_content['product_number']; ?>
                    </th>

                    <th width="25%">
						<?php echo $info_content['cart_shopping_product_subtotal']; ?>
                    </th>
                </tr>
            </thead>

            <tbody>
				<?php

				if(is_array($product_cart) && !empty($product_cart)){

					foreach($product_cart as $value){

						?>
						<tr>
							<td>
								<div align="center">
									<?php

									$url_img_product=array();
									$url_img=@unserialize(element('product_img',$value,array()));
									if(is_array($url_img) && !empty($url_img))
										foreach($url_img as $key_img=> $value_img)
											$url_img_product[]=$value_img;

									?>
									<a title="<?php echo custom_htmlspecialchars(element('product_name',$value,'')); ?>" href="<?php echo base_url()."detailproduct/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('product_alias',$value,'')."/".element('product_id',$value,'').URL_SUFFIX ?>" target="_blank">
										<img width="90%" alt="<?php echo custom_htmlspecialchars(element('product_name',$value,'')); ?>" src="<?php echo base_src_img(element(0,$url_img_product,'')); ?>" />
									</a>
								</div>

								<div align="center">
									<a class="ajax_delete_cart" delete_param="<?php echo element('rowid',$value,''); ?>" title="<?php echo $info_content['cart_shopping_product_delete']; ?>"><?php echo $info_content['cart_shopping_product_delete']; ?></a>
								</div>
							</td>

							<td>
								<h2 class="product_name">
									<a title="<?php echo custom_htmlspecialchars(element('product_name',$value,'')); ?>" href="<?php echo base_url()."detailproduct/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('product_alias',$value,'')."/".element('product_id',$value,'').URL_SUFFIX ?>" target="_blank">
										<?php echo element('product_name',$value,''); ?>
									</a>
								</h2>
								<ul>
									<li>
										<label class="label_cart_shopping"><?php echo $info_content['product_id']; ?>: </label>
										<span><?php echo element('product_id',$value,''); ?></span>
									</li>

									<li class="product_price">
										<label class="label_cart_shopping"><?php echo $info_content['product_price']; ?>: </label>
										<span><?php echo number_format(element('product_price',$value,0),0,',','.').'<sup>'.CURRENCY_UNIT.'</sup>'; ?></span>
									</li>

									<li>
										<label class="label_cart_shopping"><?php echo $info_content['product_category']; ?>: </label>
										<span><?php echo element('cate_name',$value,''); ?></span>
									</li>

									<?php if(element('product_color',$value['options'],'') != ''){ ?>
										<li>
											<label class="label_cart_shopping"><?php echo $info_content['product_color']; ?>: </label>
											<span><?php echo element('product_color',$value['options'],''); ?></span>
										</li>
									<?php } ?>

									<?php if(element('product_size',$value['options'],'') != ''){ ?>
										<li>
											<label class="label_cart_shopping"><?php echo $info_content['product_size']; ?>: </label>
											<span><?php echo element('product_size',$value['options'],''); ?></span>
										</li>
									<?php } ?>
								</ul>
							</td>

							<td>
								<div align="center" class="ajax_update_quantity_input" update_quantity_param="<?php echo element('rowid',$value,'')."/".element('cart_id',$value,'') ?>">
									<?php echo element('cart_quantity',$value,0); ?>
								</div>
							</td>

							<td>
								<div align="center" class="cart_shopping_subtotal">
									<?php echo number_format(element('subtotal',$value,0),0,',','.').'<sup>'.CURRENCY_UNIT.'</sup>'; ?>
								</div>
							</td>
						</tr>
						<?php

					}
				}
				else{

					?>
					<tr>
						<td colspan="4" class="cart_shopping_empty">
							<?php echo $info_content['cart_shopping_empty']; ?>
						</td>
					</tr>
					<?php

				}

				?>
                <tr>
                    <td colspan="4" class="cart_shopping_total">
						<?php echo $info_content['cart_shopping_product_total']; ?>:&nbsp;<?php echo number_format($this->custom_cart->total_money_cart(),0,',','.').'<sup>'.CURRENCY_UNIT.'</sup>'; ?>
                    </td>
                </tr>
            </tbody>
        </table>
		<?php

		if(!$info_content['ajax_show_manager']){

			?>        
		</div>

		<div class="cart_shopping_action">
			<div class="cart_shopping_action_prev">
				<a title="<?php echo custom_htmlspecialchars($info_content['cart_shopping_continue']); ?>" href="<?php echo base_url(); ?>"><?php echo $info_content['cart_shopping_continue']; ?></a>
			</div>

			<div class="cart_shopping_action_next">
				<a title="<?php echo custom_htmlspecialchars($info_content['cart_shopping_payment']); ?>" href="<?php echo base_url()."cart/method".URL_SUFFIX; ?>"><?php echo $info_content['cart_shopping_payment']; ?></a>
			</div>
		</div>
	</div>
	<?php

}

?>