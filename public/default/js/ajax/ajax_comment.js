/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$(window).load(function(){

	$("#detail_product").ajax_show_comment("#module_comment_product",'comment/show_comment_product/');
	$("#detail_product").ajax_captcha_click("#ajax_captcha_comment",'captcha/comment/');

	$("#detail_product").ajax_insert_comment("#button_submit_comment","#module_comment_product",'comment/insert_product/');
	$("#detail_product").ajax_reset_comment_click("#button_reset_comment","#module_comment_product",'comment/show_comment_product/');
});