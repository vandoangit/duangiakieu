<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 31-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>
<div id="module_cart" class="cart_confirm cart_shopping cart_method">

    <div class="cart_shopping_step">
        <div class="item_step home" style="z-index:10;">
            <a href="<?php echo base_url(); ?>" title="">&nbsp;</a>
        </div>

        <div class="item_step" style="z-index:9;">
            <a href="<?php echo base_url().'cart/shopping'.URL_SUFFIX; ?>" title="<?php echo $info_content['cart_shopping_step_cart']; ?>"><?php echo $info_content['cart_shopping_step_cart']; ?></a>
        </div>

        <div class="item_step" style="z-index:8;">
            <a href="<?php echo base_url().'cart/method'.URL_SUFFIX; ?>" title="<?php echo $info_content['cart_shopping_step_method']; ?>"><?php echo $info_content['cart_shopping_step_method']; ?></a>
        </div>

        <div class="item_step active" style="z-index:7;">
            <a href="<?php echo base_url().'cart/confirm'.URL_SUFFIX; ?>" title="<?php echo $info_content['cart_shopping_step_confirm']; ?>"><?php echo $info_content['cart_shopping_step_confirm']; ?></a>
        </div>
    </div>

	<div class="cart_confirm_message"><?php echo $info_content['cart_confirm_message']; ?></div>

    <div class="cart_confirm_information">
        <form name="form_cart_confirm" id="form_cart_confirm" action="" method="post">

            <input type="hidden" name="action_form" value="submit_cart_confirm" />

            <div class="cart_confirm_title"><?php echo $info_content['cart_confirm_shopping']; ?></div>

            <div class="cart_method_contact">
                <fieldset>
                    <ul>
                        <li>
                            <label class="label_cart_method"><b><?php echo $info_content['order_name']; ?>:</b></label>
                            <div class="div_info_cart_confirm"><?php echo element('order_name',$cart_method,''); ?></div>
                        </li>

                        <li>
                            <label class="label_cart_method"><b><?php echo $info_content['order_email']; ?>:</b></label>
                            <div class="div_info_cart_confirm"><?php echo element('order_email',$cart_method,''); ?></div>
                        </li>

                        <li>
                            <label class="label_cart_method"><b><?php echo $info_content['order_phone']; ?>:</b></label>
                            <div class="div_info_cart_confirm"><?php echo element('order_phone',$cart_method,''); ?></div>
                        </li>

                        <li>
                            <label class="label_cart_method"><b><?php echo $info_content['order_address']; ?>:</b></label>
                            <div class="div_info_cart_confirm"><?php echo element('order_address',$cart_method,''); ?></div>
                        </li>

                        <li>
                            <label class="label_cart_method"><b><?php echo $info_content['delivery_name_short']; ?>:</b></label>
                            <div class="div_info_cart_confirm">
								<?php echo element('delivery_name',$delivery,''); ?>
                                &nbsp;<i>(<?php

									if(element('delivery_cost',$delivery,0) == 0 || element('delivery_cost',$delivery,'') == '')
										echo $info_content['cart_method_free'];
									else
										echo number_format(element('delivery_cost',$delivery,0))." VNĐ";

									?>)</i>
                            </div>
                        </li>

                        <li>
                            <label class="label_cart_method"><b><?php echo $info_content['payment_name_short']; ?>:</b></label>
                            <div class="div_info_cart_confirm">
								<?php echo element('payment_name',$payment,''); ?>
                                &nbsp;<i>(<?php

									if(element('payment_cost',$payment,0) == 0 || element('payment_cost',$payment,'') == '')
										echo $info_content['cart_method_free'];
									else
										echo number_format(element('payment_cost',$payment,0))." VNĐ";

									?>)</i>
                            </div>
                        </li>

                        <li>
                            <label class="label_cart_method"><b><?php echo $info_content['order_content']; ?>:</b></label>
                            <div class="div_info_cart_confirm"><?php echo element('order_content',$cart_method,''); ?></div>
                        </li>
                    </ul>
                </fieldset>
            </div>

            <div class="cart_confirm_title"><?php echo $info_content['cart_confirm_product']; ?></div>

            <div class="cart_shopping_product">
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
										<div align="center">
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

						?>
                        <tr>
                            <td colspan="4" class="cart_shopping_total">
								<?php echo $info_content['cart_shopping_product_total']; ?>:&nbsp;<?php echo number_format($this->custom_cart->total_money_cart(),0,',','.').'<sup>'.CURRENCY_UNIT.'</sup>'; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <div class="cart_shopping_action">
        <div class="cart_shopping_action_prev">
            <a title="<?php echo custom_htmlspecialchars($info_content['cart_confirm_prev']); ?>" href="<?php echo base_url()."cart/method".URL_SUFFIX; ?>"><?php echo $info_content['cart_confirm_prev']; ?></a>
        </div>

        <div class="cart_shopping_action_next">
            <a id="submit_cart_confirm" title="<?php echo custom_htmlspecialchars($info_content['cart_confirm_next']); ?>"><?php echo $info_content['cart_confirm_next']; ?></a>
        </div>
    </div>
</div>