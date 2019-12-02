/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	$$('#content .ajax_select_filter').ajax_select_filter('comment/control/');
	$$('#content').ajax_delete_item('#content a.ajax_delete_item','comment/delete/');
	$$('#content').ajax_update_public("#content div.ajax_update_public",'comment/update_public/');
	$$('#content').ajax_update_public("#content div.ajax_update_surf",'comment/update_surf/');
});