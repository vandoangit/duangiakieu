/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	$$('#ajax_add_image_product').ajax_add_image_product();

	$$('#content .ajax_select_filter').ajax_select_filter($$('#hidden_input_menu_class').val() + '/control/');
	$$('#content').ajax_delete_item('#content a.ajax_delete_item',$$('#hidden_input_menu_class').val() + '/delete/');
	$$('#content').ajax_update_order_input('#content div.ajax_update_order_input');
	$$('#content').ajax_update_order("#content input.ajax_update_order",$$('#hidden_input_menu_class').val() + '/update_order/');
	$$('#content').ajax_update_public("#content div.ajax_update_public",$$('#hidden_input_menu_class').val() + '/update_public/');
	$$('#content').ajax_update_prominent("#content div.ajax_update_prominent",$$('#hidden_input_menu_class').val() + '/update_prominent/');
	if($$('#ajax_pattern_product_headline').attr('id') != undefined)
		$$('#ajax_pattern_product_headline').ajax_pattern_detail_product(CKEDITOR.instances.txt_product_headline_ckeditor,$$('#hidden_input_menu_class').val() + '/product_detail/');

	if($$('#ajax_pattern_product_content').attr('id') != undefined)
		$$('#ajax_pattern_product_content').ajax_pattern_detail_product(CKEDITOR.instances.txt_product_content_ckeditor,$$('#hidden_input_menu_class').val() + '/product_detail/');
	
	
	$$('#txt_product_name').ajax_url_alias("#txt_product_alias",$$('#hidden_input_menu_class').val() +'/general_alias/');
});