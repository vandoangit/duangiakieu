/* * ***************************************************************************
 
 Ghi chú:hoàn thành ngày 29-07-2015
 Copyright :Hồ Minh Trí
 
 * ************************************************************************** */

/*=============================== Card Message ===============================*/

var card_form_id='#form_facebook_themeform';

var card_option_invalid={
	reset_form:true,
	type_valid:false,
	effect:'fast'
};
var card_option_no_card={
	reset_form:true,
	type_valid:'notification',
	effect:false
};
var card_option_no_connect={
	reset_form:true,
	type_valid:false,
	effect:'fast'
};
var card_option_value_form={
	readonly_form:true,
	set_value_form:true
};
var card_option_reading={
	reset_form:false,
	type_valid:'success',
	effect:'fast',
	callback:function(data_reading){

		check_facebook_login(data_reading);
	}
};
var barcode_option_reading={
	reset_form:false,
	type_valid:'success',
	effect:'fast',
	callback:function(data_reading){

		check_facebook_login(data_reading);
	}
};

var login_facebook_lightbox=false;
var card_uid=null;

function check_facebook_login(data_reading){

	card_clear_interval();

	$.ajax({
		data:'1e17df4793bf819608c5849576ae5d8a=false' + '&card_uid=' + data_reading[0],
		dataType:'json',
		url:base_url_root + 'facebook/check_facebook_login',
		success:function(json_result){

			if(json_result.type_valid == 'success'){

				card_uid=null;
				json_result.type_valid='notification';
				json_result.effect='fast';
				json_result.message=card_lang['card_message_registered'];
				card_message(json_result);

				card_clear_interval();
				setTimeout(function(){

					card_set_interval();
				},3000);
			}
			else if(json_result.type_valid == 'card_block'){

				card_uid=null;
				json_result.type_valid=false;
				json_result.effect='fast';
				json_result.message=card_lang['card_message_block'];
				card_message(json_result);

				card_clear_interval();
				setTimeout(function(){

					card_set_interval();
				},3000);
			}
			else if(json_result.type_valid == 'card_empty'){

				/*
				 card_uid=null;
				 json_result.type_valid=false;
				 json_result.effect='fast';
				 json_result.message=card_lang['card_message_no_system'];
				 card_message(json_result);
				 
				 card_clear_interval();
				 setTimeout(function(){
				 
				 card_set_interval();
				 },3000);
				 */

				card_uid=data_reading[0];
				json_result.type_valid="notification";
				json_result.effect='fast';
				json_result.message=card_lang['membership_message_register'];
				card_message(json_result);
				membership_register(data_reading);
			}
			else if(json_result.type_valid == 'card_membership_register'){

				card_uid=data_reading[0];
				json_result.type_valid="notification";
				json_result.effect='fast';
				json_result.message=card_lang['membership_message_register'];
				card_message(json_result);
				membership_register(data_reading);
			}
			// Thẻ Đã Đăng Ký Thông Tin Nhưng Đã Khai Báo
			// Thẻ Đã Đăng Ký Thông Tin Nhưng Chưa Khai Báo
			else{

				card_uid=null;
				setTimeout(function(){

					$.lightbox(base_url_root + 'login.php',{
						iframe:true,
						width:1000,
						height:500,
						onOpen:function(){

							card_clear_interval();
							setTimeout(function(){

								card_clear_interval();
								json_result.type_valid='notification';
								json_result.effect='fast';
								json_result.message=card_lang['facebook_message_login'];
								card_message(json_result);
							},4000);
						},
						onClose:function(){

							if(login_facebook_lightbox == true || login_facebook_lightbox == 'true'){

								login_facebook_lightbox=false;

								var json_result={
									type_valid:"success",
									effect:'fast',
									message:card_lang['facebook_message_login_successful']
								};
								card_message(json_result);
							}
							// Thẻ Bị Khóa,Cập Nhật Thất Bại
							// Thẻ Đã Đăng Ký Thông Tin Nhưng Chưa Khai Báo,Thêm Thẻ Thất Bại
							else if(login_facebook_lightbox == 'card_invalid'){

								login_facebook_lightbox=false;

								var json_result={
									type_valid:false,
									effect:'fast',
									message:card_lang['card_message_error_invalid']
								};
								card_message(json_result);
							}
							else{

								var json_result={
									type_valid:false,
									effect:'fast',
									message:card_lang['facebook_message_login_close']
								};
								card_message(json_result);
							}

							card_clear_interval();
							setTimeout(function(){

								card_set_interval();
							},3000);
						}
					});
				},100);

				/*
				 setTimeout(function(){
				 
				 var window_url=base_url_root + 'login.php';
				 var window_size_document="channelmode=no, directories=yes, fullscreen=no, location=no, resizable=no, scrollbars=no";
				 window_size_document+=", left=0, top=0, width=" + screen.width + ", height=" + screen.height;
				 window_size_document+=", menubar=no, status=no, titlebar=no, toolbar=no";
				 
				 window.open(window_url,'_blank',window_size_document,true);
				 },100);
				 */
			}
		}
	});
}

/*======================== Submit Membership Register ========================*/

function membership_register(data_card){

	card_clear_interval();

	var param_card="";
	if(data_card != null)
		param_card="&card_uid=" + data_card[0];

	$.ajax({
		data:'1e17df4793bf819608c5849576ae5d8a=false&ajax_membership_register=true' + param_card,
		dataType:'html',
		url:base_url_root + 'membership/register',
		success:function(result_data){

			if(result_data != ""){

				$("#membership_register_ajax").html(result_data).slideDown("slow");
				$("#txt_province_category").ajax_load_district('membership/load_district/');
				$.ajax_captcha("#ajax_captcha_membership_register_ajax","captcha/membership/");
				$("#form_membership_register_ajax").validationEngine();
				$("#membership_register_ajax input.input_datepicker").datepicker({
					showOtherMonths:true,
					selectOtherMonths:true,
					changeMonth:true,
					changeYear:true,
					dateFormat:"dd-mm-yy",
					nextText:"",
					prevText:"",
					showAnim:"show",
					onClose:function(dateText,inst){
						$(this).focus();
					}
				});
			}
		}
	});
}

$(window).load(function(){

	$('body').delegate("#submit_membership_register_ajax","click",function(){
		$("#form_membership_register_ajax").submit();
	});

	$('body').delegate("#form_membership_register_ajax","submit",function(e){

		if(card_uid && card_uid != null && card_uid != undefined){

			var this_selector=$(this);
			var validation=false;
			var form_post_data=$(this).serializeArray();
			var form_action_url=$(this).attr("action");

			form_post_data.push({
				name:'1e17df4793bf819608c5849576ae5d8a',
				value:'false'
			},
			{
				name:'ajax_membership_register',
				value:'true'
			},
			{
				name:'card_uid',
				value:card_uid
			});

			$.ajax({
				data:form_post_data,
				url:base_url_root + 'membership/register/',
				success:function(result_data){

					if(result_data == 'register_success'){

						card_uid=null;
						$("#membership_register_ajax").html("");
						setTimeout(function(){

							$.lightbox(base_url_root + 'login.php',{
								iframe:true,
								width:1000,
								height:500,
								onOpen:function(){

									card_clear_interval();
									setTimeout(function(){

										card_clear_interval();
										var json_data={
											type_valid:'notification',
											effect:'fast',
											message:card_lang['facebook_message_login']
										}
										card_message(json_data);
									},4000);
								},
								onClose:function(){

									if(login_facebook_lightbox == true || login_facebook_lightbox == 'true'){

										login_facebook_lightbox=false;

										var json_result={
											type_valid:"success",
											effect:'fast',
											message:card_lang['facebook_message_login_successful']
										};
										card_message(json_result);
									}
									// Thẻ Bị Khóa,Cập Nhật Thất Bại
									// Thẻ Đã Đăng Ký Thông Tin Nhưng Chưa Khai Báo,Thêm Thẻ Thất Bại
									else if(login_facebook_lightbox == 'card_invalid'){

										login_facebook_lightbox=false;

										var json_result={
											type_valid:false,
											effect:'fast',
											message:card_lang['card_message_error_invalid']
										};
										card_message(json_result);
									}
									else{

										var json_result={
											type_valid:false,
											effect:'fast',
											message:card_lang['facebook_message_login_close']
										};
										card_message(json_result);
									}

									card_clear_interval();
									setTimeout(function(){

										card_set_interval();
									},3000);
								}
							});
						},100);

						/*
						 setTimeout(function(){
						 
						 var window_url=base_url_root + 'login.php';
						 var window_size_document="channelmode=no, directories=yes, fullscreen=no, location=no, resizable=no, scrollbars=no";
						 window_size_document+=", left=0, top=0, width=" + screen.width + ", height=" + screen.height;
						 window_size_document+=", menubar=no, status=no, titlebar=no, toolbar=no";
						 
						 window.open(window_url,'_blank',window_size_document,true);
						 },100);
						 */
					}
					else if(result_data == 'card_invalid'){

						card_uid=null;

						$("#membership_register_ajax").html("");
						var json_data={
							type_valid:false,
							effect:'fast',
							message:card_lang['card_message_error_invalid']
						}
						card_message(json_data);

						card_clear_interval();
						setTimeout(function(){

							card_set_interval();
						},3000);
					}
					else{

						$("#membership_register_ajax").html(result_data).slideDown("slow");
						$("#txt_province_category").ajax_load_district('membership/load_district/');
						$.ajax_captcha("#ajax_captcha_membership_register_ajax","captcha/membership/");
						$("#form_membership_register_ajax").validationEngine();
						$("#membership_register_ajax input.input_datepicker").datepicker({
							showOtherMonths:true,
							selectOtherMonths:true,
							changeMonth:true,
							changeYear:true,
							dateFormat:"dd-mm-yy",
							nextText:"",
							prevText:"",
							showAnim:"show",
							onClose:function(dateText,inst){
								$(this).focus();
							}
						});
					}
				}
			});
		}

		if(e.preventDefault)
			e.preventDefault();

		if(e.unbind)
			e.unbind();
	});

	card_connecting();
	$("#txt_card_barcode").barcode_reading();
});