/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	$$('#content .ajax_select_filter').ajax_select_filter($$('#hidden_input_menu_class').val() + '/category/');
	$$('#content').ajax_delete_item('#content a.ajax_delete_item',$$('#hidden_input_menu_class').val() + '/delete_category/');
	$$('#content').ajax_update_order_input('#content div.ajax_update_order_input');
	$$('#content').ajax_update_order("#content input.ajax_update_order",$$('#hidden_input_menu_class').val() + '/update_category_order/');
	$$('#content').ajax_update_public("#content div.ajax_update_public",$$('#hidden_input_menu_class').val() + '/update_category_public/');
	$$('#txt_cate_name').ajax_url_alias("#txt_cate_alias",$$('#hidden_input_menu_class').val() +'/general_category_alias/');
});