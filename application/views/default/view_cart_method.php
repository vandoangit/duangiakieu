<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 31-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>
<div id="module_cart" class="cart_method">

    <div class="cart_method_step">
        <div class="item_step home" style="z-index:10;">
            <a href="<?php echo base_url(); ?>" title="">&nbsp;</a>
        </div>

        <div class="item_step" style="z-index:9;">
            <a href="<?php echo base_url().'cart/shopping'.URL_SUFFIX; ?>" title="<?php echo $info_content['cart_shopping_step_cart']; ?>"><?php echo $info_content['cart_shopping_step_cart']; ?></a>
        </div>

        <div class="item_step active" style="z-index:8;">
            <a href="<?php echo base_url().'cart/method'.URL_SUFFIX; ?>" title="<?php echo $info_content['cart_shopping_step_method']; ?>"><?php echo $info_content['cart_shopping_step_method']; ?></a>
        </div>

        <div class="item_step" style="z-index:7;">
            <a href="<?php echo base_url().'cart/confirm'.URL_SUFFIX; ?>" title="<?php echo $info_content['cart_shopping_step_confirm']; ?>"><?php echo $info_content['cart_shopping_step_confirm']; ?></a>
        </div>
    </div>

    <div class="cart_method_body">
        <form name="form_cart_method" id="form_cart_method" action="" method="post">

            <input type="hidden" name="action_form" value="submit_cart_method" />

            <div class="cart_method_title"><?php echo $info_content['cart_method_contact']; ?></div>

            <div class="cart_method_contact">
                <fieldset>
                    <ul>
                        <li>
                            <label class="label_cart_method"><?php echo $info_content['order_email']; ?></label>
                            <input type="text" value="<?php echo set_value('txt_order_email',(element('order_email',$info_method,'') != '') ? element('order_email',$info_method,'') : element('user_email',$user,'')); ?>" id="txt_order_email" name="txt_order_email" class="validate[required,custom[custom_email]] input_text_cart_method"/><?php echo form_error('txt_order_email'); ?>
                        </li>

                        <li>
                            <label class="label_cart_method"><?php echo $info_content['order_name']; ?></label>
                            <input type="text" value="<?php echo set_value('txt_order_name',(element('order_name',$info_method,'') != '') ? element('order_name',$info_method,'') : element('user_name',$user,'')); ?>" id="txt_order_name" name="txt_order_name" class="validate[required] input_text_cart_method"/><?php echo form_error('txt_order_name'); ?>
                        </li>

                        <li>
                            <label class="label_cart_method"><?php echo $info_content['order_address']; ?></label>
                            <input type="text" value="<?php echo set_value('txt_order_address',(element('order_address',$info_method,'') != '') ? element('order_address',$info_method,'') : element('user_address',$user,'')); ?>" id="txt_order_address" name="txt_order_address" class="validate[required] input_text_cart_method" /><?php echo form_error('txt_order_address'); ?>
                        </li>

                        <li>
                            <label class="label_cart_method"><?php echo $info_content['order_phone']; ?></label>
                            <input type="text" value="<?php echo set_value('txt_order_phone',(element('order_phone',$info_method,'') != '') ? element('order_phone',$info_method,'') : element('user_phone',$user,'')); ?>" id="txt_order_phone" name="txt_order_phone" class="validate[required,custom[custom_telephone]] input_text_cart_method" /><?php echo form_error('txt_order_phone'); ?>
                        </li>

                        <li>
                            <label class="label_cart_method"><?php echo $info_content['order_content']; ?></label>
                            <textarea name="txt_order_content" id="txt_order_content" class="textarea_cart_method"><?php echo set_value('txt_order_content',(element('order_content',$info_method,'') != '') ? element('order_content',$info_method,'') : ""); ?></textarea><?php echo form_error('txt_order_content'); ?>
                        </li>

                        <li class="cart_method_captcha">
                            <label class="label_cart_method">&nbsp;</label>
                            <input type="text" value="" placeholder="<?php echo $info_content['info_captcha_label']; ?>" id="txt_cart_method_captcha" name="txt_cart_method_captcha" class="validate[required] input_text_cart_method"/>
                            <span id="ajax_captcha_cart_method"></span><?php echo form_error('txt_cart_method_captcha') ?>
                        </li>

                        <li class="cart_method_send_me">
                            <label class="label_cart_method">&nbsp;</label>
                            <label><input type="checkbox" value="1" name="cart_method_send_me" id="cart_method_send_me" <?php echo set_radio('cart_method_send_me',1,(1 == element('cart_method_send_me',$info_method,'')) ? TRUE : FALSE); ?> />
                                &nbsp;&nbsp;<?php echo $info_content['cart_method_send_me'] ?></label>
                        </li>
                    </ul>
                </fieldset>
            </div>

            <div class="cart_method_title"><?php echo $info_content['cart_method_delivery']; ?></div>

            <div class="cart_method_delivery">
                <table cellpadding="0px" cellspacing="0px">
                    <thead>
                        <tr>
                            <th width="75%">
								<?php echo $info_content['delivery_name'] ?>
                            </th>

                            <th width="25%" style="text-align:center;">
								<?php echo $info_content['delivery_cost'] ?>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
						<?php

						if(is_array($method_delivery) && !empty($method_delivery)){

							$i=0;
							foreach($method_delivery as $key=> $value){
								$i++;

								?>
								<tr>
									<td>
										<div align="left" class="delivery_name">
											<label>
												<input type="radio" id="txt_delivery_id" name="txt_delivery_id" value="<?php echo element('delivery_id',$value,'') ?>" <?php echo set_radio('txt_delivery_id',element('delivery_id',$value,''),(element('delivery_id',$value,'') == element('delivery_id',$info_method,'')) ? TRUE : FALSE); ?> <?php echo ($i == 1) ? "checked='checked'" : "" ?> />
												<?php echo element('delivery_name',$value,''); ?>
											</label>
										</div>
										<div align="left" class="delivery_content">
											<?php echo element('delivery_content',$value,''); ?>
										</div>
									</td>

									<td>
										<div align="center" class="delivery_cost">
											<?php

											if(element('delivery_cost',$value,0) == 0 || element('delivery_cost',$value,'') == '')
												echo $info_content['cart_method_free'];
											else
												echo number_format(element('delivery_cost',$value,0))." VNĐ";

											?>
										</div>
									</td>
								</tr>
								<?php

							}
						}

						?>
                    </tbody>
                </table>
            </div>

            <div class="cart_method_title"><?php echo $info_content['cart_method_payment']; ?></div>

            <div class="cart_method_payment">
                <table cellpadding="0px" cellspacing="0px">
                    <thead>
                        <tr>
                            <th width="75%">
								<?php echo $info_content['payment_name'] ?>
                            </th>

                            <th width="25%" style="text-align:center;">
								<?php echo $info_content['payment_cost'] ?>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
						<?php

						if(is_array($method_payment) && !empty($method_payment)){

							$i=0;
							foreach($method_payment as $key=> $value){
								$i++;

								?>
								<tr>
									<td>
										<div align="left" class="payment_name">
											<label>
												<input type="radio" id="txt_payment_id" name="txt_payment_id" value="<?php echo element('payment_id',$value,'') ?>" <?php echo set_radio('txt_payment_id',element('payment_id',$value,''),(element('payment_id',$value,'') == element('payment_id',$info_method,'')) ? TRUE : FALSE); ?> <?php echo ($i == 1) ? "checked='checked'" : "" ?> />
												<?php echo element('payment_name',$value,''); ?>
											</label>
										</div>
										<div align="left" class="payment_content">
											<?php echo element('payment_content',$value,''); ?>
										</div>
									</td>

									<td>
										<div align="center" class="payment_cost">
											<?php

											if(element('payment_cost',$value,0) == 0 || element('payment_cost',$value,'') == '')
												echo $info_content['cart_method_free'];
											else
												echo number_format(element('payment_cost',$value,0))." VNĐ";

											?>
										</div>
									</td>
								</tr>
								<?php

							}
						}

						?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <div class="cart_method_action">
        <div class="cart_method_action_prev">
            <a title="<?php echo custom_htmlspecialchars($info_content['cart_method_prev']); ?>" href="<?php echo base_url().'cart/shopping'.URL_SUFFIX; ?>"><?php echo $info_content['cart_method_prev']; ?></a>
        </div>

        <div class="cart_method_action_next">
            <a id="submit_cart_method" title="<?php echo custom_htmlspecialchars($info_content['cart_method_next']); ?>"><?php echo $info_content['cart_method_next']; ?></a>
        </div>
    </div>
</div>