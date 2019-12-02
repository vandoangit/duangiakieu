<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(is_array($product_one) && !empty($product_one)){

	?>
	<script type="text/javascript" src="<?php echo base_url().DEFAULT_DIR_TEMPLATE; ?>js/ajax/ajax_comment.js"></script>

	<div class="module_content">
		<div class="title_border_center">
			<div class="title_border_left">
				<div class="title_border_right">
					<div class="sidebar_detail_product">
						<h1><a class="homepage_page" title="<?php echo custom_htmlspecialchars($info_home['homepage_website']) ?>" href="<?php echo base_url(); ?>"><?php echo ($info_home['homepage_website'] != '') ? $info_home['homepage_website'] : $info_content['message_system_title']; ?></a></h1>
						<span class="arrow_page">&#187;</span>
						<h2><a class="title_page" title="<?php echo custom_htmlspecialchars(element('cate_name',$product_one,'')); ?>"  href="<?php echo base_url().element('menu_class',$product_one,'').'/'.element('cate_alias',$product_one,'').'/'.element('cate_id',$product_one,'').URL_SUFFIX ?>" ><?php echo element('cate_name',$product_one,$info_content['message_system_title']); ?></a></h2>
					</div>
				</div>
			</div>
		</div>

		<div class="content_border_center">
			<div class="content_border_left">
				<div class="content_border_right">
					<div id="detail_product">
						<div class="detail_product_image">
							<?php

							$url_img_product=array();
							$url_img=@unserialize(element('product_img',$product_one,array()));
							if(is_array($url_img) && !empty($url_img))
								foreach($url_img as $key_img=> $value_img)
									$url_img_product[]=$value_img;

							?>
							<a class="jqzoom_product_detail" title="<?php echo custom_htmlspecialchars(element('product_name',$product_one,'')); ?>" href="<?php echo base_src_img(element(0,$url_img_product,'')); ?>" rel='gallery_product_detail'>
								<img class="display_image" alt="<?php echo custom_htmlspecialchars(element('product_name',$product_one,'')); ?>" src="<?php echo base_src_img(element(0,$url_img_product,'')); ?>" />
							</a>

							<ul class="thumbnail_image">
								<?php

								if(is_array($url_img) && !empty($url_img)){

									$i=0;
									foreach($url_img as $key_img=> $value_img){

										?>
										<li <?php echo ($i == 0) ? "class='first'" : "" ?>>
											<a <?php echo ($i == 0) ? "class='zoomThumbActive'" : "" ?> href='javascript:void(0);' rel="{gallery:'gallery_product_detail',smallimage:'<?php echo base_src_img($value_img); ?>',largeimage: '<?php echo base_src_img($value_img); ?>'}">
												<img src='<?php echo base_src_img($value_img); ?>' />
											</a>
										</li>
										<?php

										$i++;
									}
								}

								?>
							</ul>
						</div>

						<div class="detail_product_info">
							<ul>
								<li>
									<h3 class="product_name"><?php echo element('product_name',$product_one,''); ?></h3>
								</li>

								<li>
									<p class="page_views"><?php echo $info_content['product_detail_page_view'].": ".element('product_view',$product_one,'')." ,".$info_content['product_detail_create_date']." ".date('d-m-Y',strtotime(element('product_create_date',$product_one,''))); ?></p>
								</li>

								<li>
									<?php

									if(element('product_number',$product_one,0) == 0){

										echo "<p class='product_quantity'>".$info_content['product_detail_sold_out']."</p>";
									}

									?>
								</li>

								<li class="product_id">
									<label class="label_product_detail"><?php echo $info_content['product_id']; ?>: </label>
									<span><?php echo element('product_id',$product_one,''); ?></span>
								</li>

								<li class="product_category">
									<label class="label_product_detail"><?php echo $info_content['product_category']; ?>: </label>
									<span><?php echo element('cate_name',$product_one,''); ?></span>
								</li>

								<li class="line_through">&nbsp;</li>

								<?php

								if(element('product_price_old',$product_one,0) != 0){

									?>
									<li class="product_price_old">
										<label class="label_product_detail"><?php echo $info_content['product_price_old']; ?>: </label>
										<span><?php echo number_format(element('product_price_old',$product_one,0),0,',','.').'<sup>'.CURRENCY_UNIT.'</sup>'; ?> (<?php echo number_format((element('product_price',$product_one,0) - element('product_price_old',$product_one,0)) * 100 / element('product_price_old',$product_one,0)) ?>%)</span>
									</li>
									<?php

								}

								?>

								<li class="product_price_new">
									<?php echo number_format(element('product_price',$product_one,0),0,',','.').'<sup>'.CURRENCY_UNIT.'</sup>'; ?>
								</li>
							</ul>

							<div class="product_headline">
								<?php echo element('product_headline',$product_one,''); ?>
							</div>

							<div id="ajax_add_cart" param_add_cart="<?php echo element('product_id',$product_one,''); ?>" class="product_add_cart"><?php echo $info_content['product_detail_add_cart']; ?></div>
						</div>

						<div class="detail_product_content">
							<div id="tabs_product_detail">
								<ul>
									<li><a href="#tabs_detail_product_feature"><?php echo $info_content['product_detail_feature'] ?></a></li>
									<li><a href="#tabs_detail_product_related"><?php echo $info_content['product_detail_related'] ?></a></li>
									<li><a href="#tabs_detail_product_comment"><?php echo $info_content['product_detail_comment'] ?></a></li>
								</ul>
								<div id="tabs_detail_product_feature" class="product_content">

									<?php echo element('product_content',$product_one,''); ?>

									<div class="fb-comments" data-href="<?php echo current_url(); ?>" data-width="100%" data-numposts="10" data-order-by="social" data-colorscheme="light"></div>
								</div>

								<div id="tabs_detail_product_related">
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
														<a title="<?php echo custom_htmlspecialchars(element('product_name',$value,'')); ?>" href="<?php echo base_url()."detailproduct/".element('menu_class',$value,'')."/".element('cate_alias',$value,'')."/".element('product_alias',$value,'')."/".element('product_id',$value,'').URL_SUFFIX ?>">
															<?php echo element('product_name',$value,''); ?>
														</a>
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

										?>
									</div>
								</div>

								<div id="tabs_detail_product_comment">
									<div id="module_comment_product" param_comment="<?php echo element('product_id',$product_one,''); ?>">&nbsp;</div>
								</div>
							</div>
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

}

?>