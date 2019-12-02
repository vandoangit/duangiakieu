/* * ***************************************************************************
 
 Ghi chú:hoàn thành ngày 29-07-2015
 Copyright :Hồ Minh Trí
 
 * ************************************************************************** */

/*=============================== Card Message ===============================*/

var card_form_id='#form_membership_card';

var card_option_invalid={
	reset_form:false,
	type_valid:false,
	effect:'fast'
};
var card_option_no_card={
	reset_form:false,
	type_valid:'notification',
	effect:false
};
var card_option_no_connect={
	reset_form:false,
	type_valid:false,
	effect:'fast'
};
var card_option_value_form={
	readonly_form:false,
	set_value_form:false
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
				json_result.message=card_lang['card_message_waiting'];
				card_message(json_result);
				$("#form_membership_card").submit();
			}
			else if(json_result.type_valid == 'card_membership_register'){

				card_uid=data_reading[0];
				json_result.type_valid="notification";
				json_result.effect='fast';
				json_result.message=card_lang['card_message_waiting'];
				card_message(json_result);
				$("#form_membership_card").submit();
			}
			else{

				card_uid=null;
				json_result.type_valid='notification';
				json_result.effect='fast';
				json_result.message=card_lang['membership_message_registered'];
				card_message(json_result);

				card_clear_interval();
				setTimeout(function(){

					card_set_interval();
				},3000);
			}
		}
	});
}

/*========================== Submit Membership Card ==========================*/

window.onbeforeunload=function(){
	return "";
}

window.onsubmit=function(){

	window.onbeforeunload=null;
}

$(window).load(function(){

	$("#form_membership_card").submit(function(e){

		card_clear_interval();

		if(card_uid && card_uid != null && card_uid != undefined){

			var this_selector=$(this);
			var validation=false;
			var form_post_data=this_selector.serializeArray();
			var form_action_url=this_selector.attr("action");

			form_post_data.push({
				name:'1e17df4793bf819608c5849576ae5d8a',
				value:'false'
			},
			{
				name:'card_uid',
				value:card_uid
			});

			$.ajax({
				data:form_post_data,
				dataType:'json',
				url:base_url_root + 'membership/card/',
				success:function(json_result){

					if(json_result.type_valid == 'success'){

						card_uid=null;

						card_clear_form();

						json_result.type_valid='success';
						json_result.effect='fast';
						json_result.message=card_lang['membership_message_successful'];
						card_message(json_result);

						setTimeout(function(){

							window.onbeforeunload=null;
							window.location=window.location;
						},3000);
					}
					else if(json_result.type_valid == 'exist_success'){

						card_uid=null;

						json_result.type_valid='notification';
						json_result.effect='fast';
						json_result.message=card_lang['membership_message_registered'];
						card_message(json_result);
					}
					else if(json_result.type_valid == 'card_invalid'){

						card_uid=null;

						json_result.type_valid=false;
						json_result.effect='fast';
						json_result.message=card_lang['card_message_error_invalid'];
						card_message(json_result);
					}
					else{

						validation=this_selector.validationEngine({
							returnIsValid:true
						});

						if(validation == false){

							var json_result={
								type_valid:false,
								effect:'fast',
								message:card_lang['membership_message_information']
							};
							card_message(json_result);
						}
					}

					if(validation == false){

						card_clear_interval();
						setTimeout(function(){

							card_set_interval();
						},3000);

						if(e.preventDefault)
							e.preventDefault();

						if(e.unbind)
							e.unbind();
					}
				}
			});
		}
		else{

			card_clear_interval();
			setTimeout(function(){

				card_set_interval();
			},3000);
		}
	});

	card_connecting();
	$("#txt_card_barcode").barcode_reading();
});