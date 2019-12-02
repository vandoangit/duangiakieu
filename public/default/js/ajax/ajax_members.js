/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$(window).load(function(){

	/*-------------------------------- No Ajax -------------------------------*/
	//Register
	$.ajax_captcha("#ajax_captcha_member_register","captcha/members/");
	$("#middle_content .member_register").ajax_captcha_click("#ajax_captcha_member_register",'captcha/members/');

	$("#middle_content .member_register").ajax_reset_register("#button_reset_register");

	//Update
	$.ajax_captcha("#ajax_captcha_member_update","captcha/members/");
	$("#middle_content .member_update").ajax_captcha_click("#ajax_captcha_member_update",'captcha/members/');

	$("#middle_content .member_update").ajax_reset_update("#button_reset_update");


	/*--------------------------------- Ajax ---------------------------------*/
	//Login
	$.ajax_login('members/login_ajax/');
	$("body").ajax_logout("#button_member_logout",'members/logout/');

	//Form Ajax Register Update
	$("body").ajax_close("#close_member_ajax");
	$("body").ajax_close_mouseup();

	//Register
	$("body").ajax_form_register("#member_register_ajax",'members/register/');

	$("body").ajax_captcha_click("#ajax_captcha_member_register_ajax",'captcha/members/');

	$("body").ajax_reset_register_ajax("#button_reset_register_ajax");

	//Update
	$("body").ajax_form_update("#member_update_ajax",'members/update/');

	$("body").ajax_captcha_click("#ajax_captcha_member_update_ajax",'captcha/members/');

	$("body").ajax_reset_update_ajax("#button_reset_update_ajax");
});