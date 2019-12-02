<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 03-08-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(!isset($product_search))
	$product_search=array();

?>

<div class="module_left">
    <div class="title_border_center">
        <div class="title_border_left">
            <div class="title_border_right"><?php echo $info_search['search_module_title']; ?></div>
        </div>
    </div>

    <div class="content_border_center">
        <div class="content_border_left">
            <div class="content_border_right">
                <div id="module_search_product">
                    <form name="form_search_product" id="form_product_search" method="post" action="">
                        <ul>
                            <li>
                                <input type="text" value="<?php echo element('key_search',$product_search,''); ?>" placeholder="<?php echo $info_search['search_module_key']; ?>" class="input_key_search_product" id="input_key_search_product" name="input_key_search_product" />
                            </li>

                            <li>
                                <select class="select_category_search_product" id="select_category_search_product" name="select_category_search_product">
                                    <option value="-1">&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_search['search_module_category']; ?></option>
									<?php echo $category_product; ?>
                                </select>
                            </li>

                            <li>
                                <select class="select_price_search_product" id="select_price_begin_search_product" name="select_price_begin_search_product">
                                    <optgroup label="<?php echo $info_search['search_module_price_begin']; ?>">
                                        <option value="-1">&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_search['search_module_price_begin']; ?></option>
										<?php

										if(is_array($product_price) && !empty($product_price)){

											foreach($product_price as $key=> $value){

												?>
												<option value="<?php echo element('price',$value,''); ?>" <?php if(element('price_begin',$product_search,'') == element('price',$value,'')) echo "selected='seleted'" ?>>&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo number_format(element('name',$value,''),0,',','.'); ?></option>
												<?php

											}
										}

										?>
                                    </optgroup>
                                </select>
                            </li>

                            <li>
                                <select class="select_price_search_product" id="select_price_end_search_product" name="select_price_end_search_product">
                                    <optgroup label="<?php echo $info_search['search_module_price_end']; ?>">
                                        <option value="-1">&nbsp;&nbsp;&#187;&nbsp;<?php echo $info_search['search_module_price_end']; ?></option>
										<?php

										if(is_array($product_price) && !empty($product_price)){

											foreach($product_price as $key=> $value){

												?>
												<option value="<?php echo element('price',$value,''); ?>" <?php if(element('price_end',$product_search,'') == element('price',$value,'')) echo "selected='seleted'" ?>>&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo number_format(element('name',$value,''),0,',','.'); ?></option>
												<?php

											}
										}

										?>
                                    </optgroup>
                                </select>
                            </li>

                            <li>
                                <a id="ajax_search_product" class="button_search_product"><?php echo $info_search['search_module_button']; ?></a>
                            </li>
                        </ul>
                    </form>
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