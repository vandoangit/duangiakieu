/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	$$('#content .ajax_select_filter').ajax_select_filter('group/control/');
	$$('#content').ajax_delete_item('#content a.ajax_delete_item','group/delete/');
	$$('#content').ajax_delete_item('#content a.ajax_delete_item_authorization','group/delete_authorization_group/');
});