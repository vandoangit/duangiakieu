<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 03-08-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(!isset($product_search))
	$product_search=array();

if(!isset($news_search))
	$news_search=array();

?>

<div class="search_header_box">
	<form action="" name="form_search_header" id="form_search_header" method="post">
		<input type="text" value="<?php echo element('key_search',$product_search,''); ?>" placeholder="<?php echo $info_search_header['label_key_search']; ?>" class="input_key_search_header" id="input_key_search_header" name="input_key_search_header" />
		<a id="submit_search_header" class="submit_search_header">&nbsp;</a>
	</form>
</div>