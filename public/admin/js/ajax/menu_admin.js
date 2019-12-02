/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	$$('#content').ajax_delete_item('#content a.ajax_delete_item','menu_admin/delete/');
	$$('#content').ajax_update_order_input('#content div.ajax_update_order_input');
	$$('#content').ajax_update_order("#content input.ajax_update_order",'menu_admin/update_order/');
	$$('#content').ajax_update_public("#content div.ajax_update_public",'menu_admin/update_public/');
});