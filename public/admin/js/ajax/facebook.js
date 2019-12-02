/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	$$('#content').ajax_delete_item('#content a.ajax_delete_item','facebook/delete/');
	$$('#content').ajax_update_order_input('#content div.ajax_update_order_input');
	$$('#content').ajax_update_order("#content input.ajax_update_order",'facebook/update_order/');
	$$('#content').ajax_update_public("#content div.ajax_update_public",'facebook/update_public/');
	$$('#content').ajax_update_public("#content div.ajax_update_facebook_post",'facebook/update_facebook_post/');
	$$('#content').ajax_update_public("#content div.ajax_update_facebook_friend",'facebook/update_facebook_friend/');
	$$('#content').ajax_update_public("#content div.ajax_update_facebook_photo",'facebook/update_facebook_photo/');
	$$('#content').ajax_update_public("#content div.ajax_update_facebook_comment",'facebook/update_facebook_comment/');
	$$('#content').ajax_update_public("#content div.ajax_update_facebook_like",'facebook/update_facebook_like/');
	$$('#content').ajax_update_public("#content div.ajax_update_facebook_like_fanface",'facebook/update_facebook_like_fanface/');
});