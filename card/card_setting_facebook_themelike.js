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
				json_result.message=card_lang['card_message_waiting'];
				card_message(json_result);

				setTimeout(function(){

					facebook_action(data_reading);
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

function facebook_action(data_card){

	card_clear_interval();

	$.ajax({
		data:'1e17df4793bf819608c5849576ae5d8a=false' + '&card_uid=' + data_card[0] + '&facebook_theme=themelike',
		dataType:'json',
		url:base_url_root + 'facebook/facebook_action',
		success:function(json_result){

			if(json_result.type_valid == 'success'){

				json_result.type_valid='success';
				json_result.effect='fast';
				json_result.message=card_lang['facebook_message_action_successful'];
				card_message(json_result);
				facebook_load_fanface();
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

/*=============================== Load Fanface ===============================*/

function facebook_load_fanface(){

	$.ajax({
		data:'1e17df4793bf819608c5849576ae5d8a=false',
		dataType:'html',
		url:base_url_root + 'facebook/themeloadfanface',
		success:function(result_data){

			if(result_data != ""){

				$("#facebook_load_fanface").html(result_data);
			}
		},
		complete:function(){

			//$('#loading_default').hide(200);

			try{

				if(typeof FB != 'undefined')
					FB.XFBML.parse();
			}
			catch(ex){

				console.log(ex);
			}
		}
	});
}

$(window).load(function(){

	card_connecting();
	$("#txt_card_barcode").barcode_reading();

	$("body").append("<div id='fb-root'>");
	(function(d,s,id){

		var js,fjs=d.getElementsByTagName(s)[0];
		if(d.getElementById(id))
			return;

		js=d.createElement(s);
		js.id=id;
		js.src="http://connect.facebook.net/vi_VN/all.js#xfbml=1&version=v2.0&appId=1492007357744212";
		fjs.parentNode.insertBefore(js,fjs);
	}(document,'script','facebook-jssdk'));

	facebook_load_fanface();
});