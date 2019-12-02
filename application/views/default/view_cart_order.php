<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 31-07-2015
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
				<h2><a class="title_page" title="<?php echo $info_content['cart_order_title'] ?>" href="<?php echo current_url(); ?>"><?php echo $info_content['cart_order_title'] ?></a></h2>
            </div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div id="module_cart" class="cart_order">

                    <div class="cart_order_title">
						<?php echo $info_content['cart_order_product']; ?>
                    </div>

                    <div class="cart_order_product">
                        <table cellspacing="0px" cellpadding="0px">
                            <thead>
                                <tr>
                                    <th width="25%">
										<?php echo $info_content['cart_order_product_image']; ?>
                                    </th>

                                    <th width="35%">
										<?php echo $info_content['cart_order_product_infomation']; ?>
                                    </th>

                                    <th width="40%">
										<?php echo $info_content['cart_order_product_description']; ?>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
								<?php

								if(is_array($product_cart) && !empty($product_cart)){

									foreach($product_cart as $key=> $value){

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
												<h3 class="product_name">
													<a title="<?php echo custom_htmlspecialchars(element('product_name',$value,'')); ?>" href="<?php echo base_url()."detailproduct/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('product_alias',$value,'')."/".element('product_id',$value,'').URL_SUFFIX ?>" target="_blank">
														<?php echo element('product_name',$value,''); ?>
													</a>
												</h3>
												<ul>
													<li>
														<label class="label_cart_order"><?php echo $info_content['product_id']; ?>: </label>
														<span><?php echo element('product_id',$value,''); ?></span>
													</li>

													<li class="product_price">
														<label class="label_cart_order"><?php echo $info_content['product_price']; ?>: </label>
														<span><?php echo number_format(element('product_price',$value,0),0,',','.').'<sup>'.CURRENCY_UNIT.'</sup>'; ?></span>
													</li>

													<li>
														<label class="label_cart_order"><?php echo $info_content['product_category']; ?>: </label>
														<span><?php echo element('cate_name',$value,''); ?></span>
													</li>

													<?php if(element('cart_quantity',$value,'') > 1){ ?>
														<li>
															<label class="label_cart_order"><?php echo $info_content['product_number']; ?>: </label>
															<span><?php echo element('cart_quantity',$value,''); ?></span>
														</li>
													<?php } ?>

													<?php if(element('product_color',$value['options'],'') != ''){ ?>
														<li>
															<label class="label_cart_order"><?php echo $info_content['product_color']; ?>: </label>
															<span><?php echo element('product_color',$value['options'],''); ?></span>
														</li>
													<?php } ?>

													<?php if(element('product_size',$value['options'],'') != ''){ ?>
														<li>
															<label class="label_cart_order"><?php echo $info_content['product_size']; ?>: </label>
															<span><?php echo element('product_size',$value['options'],''); ?></span>
														</li>
													<?php } ?>
												</ul>
											</td>

											<td>
												<div align="left">
													<?php echo element('product_headline',$value,''); ?>
												</div>
											</td>
										</tr>
										<?php

									}
								}
								else{

									?>
									<tr>
										<td colspan="3" class="cart_order_empty">
											<?php echo $info_content['cart_order_empty']; ?>
										</td>
									</tr>
									<?php

								}

								?>
                            </tbody>
                        </table>
                    </div>

                    <div class="cart_order_title">
						<?php echo $info_content['cart_order_customer']; ?>
                    </div>

                    <div class="cart_order_contact">
                        <form name="form_cart_order_contact" id="form_cart_order_contact" action="" method="post">

                            <input type="hidden" name="action_form" value="submit_cart_order" />

                            <fieldset>
                                <ul>
                                    <li>
                                        <label class="label_cart_order"><?php echo $info_content['order_email']; ?></label>
                                        <input type="text" value="<?php echo set_value('txt_order_email',''); ?>" id="txt_order_email" name="txt_order_email" class="validate[required,custom[custom_email]] input_text_cart_order"/><?php echo form_error('txt_order_email'); ?>
                                    </li>

                                    <li>
                                        <label class="label_cart_order"><?php echo $info_content['order_name']; ?></label>
                                        <input type="text" value="<?php echo set_value('txt_order_name',''); ?>" id="txt_order_name" name="txt_order_name" class="validate[required] input_text_cart_order"/><?php echo form_error('txt_order_name'); ?>
                                    </li>

                                    <li>
                                        <label class="label_cart_order"><?php echo $info_content['order_address']; ?></label>
                                        <input type="text" value="<?php echo set_value('txt_order_address',''); ?>" id="txt_order_address" name="txt_order_address" class="validate[required] input_text_cart_order" /><?php echo form_error('txt_order_address'); ?>
                                    </li>

                                    <li>
                                        <label class="label_cart_order"><?php echo $info_content['order_phone']; ?></label>
                                        <input type="text" value="<?php echo set_value('txt_order_phone',''); ?>" id="txt_order_phone" name="txt_order_phone" class="validate[required,custom[custom_telephone]] input_text_cart_order" /><?php echo form_error('txt_order_phone'); ?>
                                    </li>

                                    <li>
                                        <label class="label_cart_order"><?php echo $info_content['order_content']; ?></label>
                                        <textarea name="txt_order_content" id="txt_order_content" class="textarea_cart_order"><?php echo set_value('txt_order_content',''); ?></textarea><?php echo form_error('txt_order_content'); ?>
                                    </li>

                                    <li class="cart_order_captcha">
                                        <label class="label_cart_order">&nbsp;</label>
                                        <input type="text" value="" placeholder="<?php echo $info_content['info_captcha_label']; ?>" id="txt_cart_order_captcha" name="txt_cart_order_captcha" class="validate[required] input_text_cart_order"/>
                                        <span id="ajax_captcha_cart_order"></span><?php echo form_error('txt_cart_order_captcha') ?>
                                    </li>

                                    <li class="cart_order_send_me">
                                        <label class="label_cart_order">&nbsp;</label>
                                        <label><input type="checkbox" value="1" name="cart_order_send_me" id="cart_order_send_me"/>
                                            &nbsp;&nbsp;<?php echo $info_content['cart_order_send_me'] ?></label>
                                    </li>

                                    <li>
                                        <label class="label_cart_order">&nbsp;</label>
                                        <a class="button_cart_order" id="submit_cart_order"><?php echo $info_content['cart_order_send']; ?></a>
                                    </li>
                                </ul>
                            </fieldset>
                        </form>
                    </div>
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

echo $this->session->flashdata('submit_cart');

?>