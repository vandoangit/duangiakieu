/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	$$('#content .ajax_select_filter').ajax_select_filter('user/control/');
	$$('#content').ajax_delete_item('#content a.ajax_delete_item','user/delete/');
	$$('#content').ajax_delete_item('#content a.ajax_delete_item_authorization','user/delete_authorization_user/');
});