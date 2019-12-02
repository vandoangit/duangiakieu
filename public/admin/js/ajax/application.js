/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	$$('#content').ajax_delete_item('#content a.ajax_delete_item','application/delete/');
	$$('#content').ajax_update_order_input('#content div.ajax_update_order_input');
	$$('#content').ajax_update_order("#content input.ajax_update_order",'application/update_order/');
	$$('#content').ajax_update_public("#content div.ajax_update_public",'application/update_public/');
	$$('#txt_application_name').ajax_url_alias("#txt_application_alias",'application/general_alias/');
});