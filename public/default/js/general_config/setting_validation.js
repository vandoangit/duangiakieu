/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$(window).load(function(){

	$.validationEngineLanguage.newLang();

	//Contact
	$("#form_contact").validationEngine();
	enter_submit("#form_contact");
	$("#submit_form_contact").click(function(){
		$("#form_contact").submit();
	});

	//Service
	$("#form_service").validationEngine();
	enter_submit("#form_service");
	$("#submit_form_service").click(function(){
		$("#form_service").submit();
	});

	//Search
	$("#form_product_search").validationEngine();

	//Member
	enter_submit("#form_layout_member_login");
	$("#submit_layout_member_login").click(function(){
		$("#form_layout_member_login").submit();
	});

	$("#submit_member_login").click(function(){
		$("#form_member_login").submit();
	});

	$("#form_member_register").validationEngine();
	$("#submit_member_register").click(function(){
		$("#form_member_register").submit();
	});

	$("#form_member_update").validationEngine();
	$("#submit_member_update").click(function(){
		$("#form_member_update").submit();
	});

	$('body').delegate("#submit_member_login_ajax","click",function(){
		$("#form_member_login_ajax").submit();
	});

	$("#form_member_register_ajax").validationEngine();
	$('body').delegate("#submit_member_register_ajax","click",function(){
		//$("#form_member_register_ajax").validationEngine();
		$("#form_member_register_ajax").submit();
	});

	$("#form_member_update_ajax").validationEngine();
	$('body').delegate("#submit_member_update_ajax","click",function(){
		//$("#form_member_register_ajax").validationEngine();
		$("#form_member_update_ajax").submit();
	});

	//Membership
	$("#form_membership_register").validationEngine();
	$("#submit_membership_register").click(function(){
		$("#form_membership_register").submit();
	});

	$("#form_membership_update").validationEngine();
	$("#submit_membership_update").click(function(){
		$("#form_membership_update").submit();
	});

	//Cart
	$("#form_cart_order_contact").validationEngine();
	$("#submit_cart_order").click(function(){
		$("#form_cart_order_contact").submit();
	});

	$("#form_cart_method").validationEngine();
	$("#submit_cart_method").click(function(){
		$("#form_cart_method").submit();
	});

	$("#submit_cart_confirm").click(function(){
		$("#form_cart_confirm").submit();
	});
});