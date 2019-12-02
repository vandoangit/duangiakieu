/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	$$('#content').ajax_delete_item('#content a.ajax_delete_item','province/delete/');
	$$('#content').ajax_update_order_input('#content div.ajax_update_order_input');
	$$('#content').ajax_update_order("#content input.ajax_update_order",'province/update_order/');
	$$('#content').ajax_update_public("#content div.ajax_update_public",'province/update_public/');
});