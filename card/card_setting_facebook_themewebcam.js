/* * ***************************************************************************
 
 Ghi chú:hoàn thành ngày 29-07-2015
 Copyright :Hồ Minh Trí
 
 * ************************************************************************** */

/*=============================== Card Message ===============================*/

var card_form_id='#no-card-form';

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

		check_facebook_register(data_reading);
	}
};
var barcode_option_reading={
	reset_form:false,
	type_valid:'success',
	effect:'fast',
	callback:function(data_reading){

		check_facebook_register(data_reading);
	}
};

var webcam_capture="";

function check_facebook_register(data_reading){

	card_clear_interval();

	$.ajax({
		data:'1e17df4793bf819608c5849576ae5d8a=false' + '&card_uid=' + data_reading[0],
		dataType:'json',
		url:base_url_root + 'facebook/check_facebook_register',
		success:function(json_result){

			if(json_result.type_valid == 'success'){

				json_result.type_valid='notification';
				json_result.effect='fast';
				json_result.message=card_lang['card_message_capture'];
				card_message(json_result);

				setTimeout(function(){

					facebook_snapshot_image(data_reading);
				},500);
			}
			else if(json_result.type_valid == 'card_block'){

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

				json_result.type_valid=false;
				json_result.effect='fast';
				json_result.message=card_lang['card_message_no_system'];
				card_message(json_result);

				card_clear_interval();
				setTimeout(function(){

					card_set_interval();
				},3000);
			}
			else{

				json_result.type_valid=false;
				json_result.effect='fast';
				json_result.message=card_lang['card_message_no_registered'];
				card_message(json_result);

				card_clear_interval();
				setTimeout(function(){

					card_set_interval();
				},3000);
			}
		}
	});
}

function facebook_snapshot_image(data_card){

	var selector_snapshot_image="#webcam_facebook .webcam_facebook_image";

	$(selector_snapshot_image + ' img').remove();
	$(selector_snapshot_image).append("<div class='countdown_snapshot_image'></div>");

	$(selector_snapshot_image + ' .countdown_snapshot_image').unbind();
	$(selector_snapshot_image + ' .countdown_snapshot_image').countDown({
		startFontSize:"500px",
		endFontSize:"50px",
		startNumber:5,
		endNumber:0,
		callBack:function(me){

			$(selector_snapshot_image + ' .countdown_snapshot_image').remove();
			$(selector_snapshot_image).append("<img src='' />");

			webcam_capture=webcam_snapshot_image();

			var json_result={
				type_valid:'notification',
				effect:'fast',
				message:card_lang['card_message_waiting'],
			}
			card_message(json_result);

			facebook_action(data_card);
		}
	});
}

function facebook_action(data_card){

	card_clear_interval();

	$.ajax({
		data:'1e17df4793bf819608c5849576ae5d8a=false' + '&card_uid=' + data_card[0] + '&facebook_theme=themewebcam' + '&webcam_capture=' + webcam_capture,
		dataType:'json',
		url:base_url_root + 'facebook/facebook_action',
		success:function(json_result){

			if(json_result.type_valid == 'success'){

				json_result.type_valid='success';
				json_result.effect='fast';
				json_result.message=card_lang['facebook_message_action_successful'];
				card_message(json_result);
			}
			else if(json_result.type_valid == 'error_config'){

				json_result.type_valid=false;
				json_result.effect='fast';
				json_result.message=card_lang['facebook_message_action_config'];
				card_message(json_result);
			}
			else{

				json_result.type_valid=false;
				json_result.effect='fast';
				json_result.message=card_lang['facebook_message_action_failed'];
				card_message(json_result);
			}

			card_clear_interval();
			setTimeout(function(){

				card_set_interval();
			},3000);
		}
	});
}

$(window).load(function(){

	card_connecting();
	$("#txt_card_barcode").barcode_reading();
});