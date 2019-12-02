/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	$$('#content .ajax_select_filter').ajax_select_filter($$('#hidden_input_menu_class').val() + '/control/');
	$$('#content').ajax_delete_item('#content a.ajax_delete_item',$$('#hidden_input_menu_class').val() + '/delete/');
	$$('#content').ajax_update_order_input('#content div.ajax_update_order_input');
	$$('#content').ajax_update_order("#content input.ajax_update_order",$$('#hidden_input_menu_class').val() + '/update_order/');
	$$('#content').ajax_update_public("#content div.ajax_update_public",$$('#hidden_input_menu_class').val() + '/update_public/');
	$$('#content').ajax_update_active("#content div.ajax_update_active",$$('#hidden_input_menu_class').val() + '/update_active/');
	$$('#txt_news_name').ajax_url_alias("#txt_news_alias",$$('#hidden_input_menu_class').val() +'/general_alias/');
});