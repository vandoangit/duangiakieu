/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$(window).load(function(){

	$("#detail_product").ajax_add_cart("#ajax_add_cart",'cart/insert/');

	$.ajax_captcha("#ajax_captcha_cart_order","captcha/cart/");
	$("#module_cart").ajax_captcha_click("#ajax_captcha_cart_order",'captcha/cart/');

	$.ajax_captcha("#ajax_captcha_cart_method","captcha/cart/");
	$("#module_cart").ajax_captcha_click("#ajax_captcha_cart_method",'captcha/cart/');

	$('#module_cart').ajax_update_quantity_input("#module_cart div.ajax_update_quantity_input");
	$('#module_cart').ajax_update_quantity("#module_cart input.ajax_update_quantity","cart/update_quantity/");

	$('#module_cart').ajax_delete_cart("#module_cart a.ajax_delete_cart","cart/delete/");
});