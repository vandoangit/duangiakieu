/* * ***************************************************************************
 
 Ghi chú:hoàn thành ngày 29-07-2015
 Copyright :Hồ Minh Trí
 
 http://www.soundjay.com/beep-sounds-1.html
 
 * ************************************************************************** */


/*=============================== Card Message ===============================*/

if(typeof barcode_option_reading == "undefined")
	var barcode_option_reading={};

(function($){

	$.extend($.fn,{
		card_response_output_clear:function(selector_message){

			return this.each(function(){

				var $ele=$(this);
				$ele.find(selector_message).hide().empty();
				$ele.find(selector_message).html('<span class="card-notification-close-icon"></span>');
				$ele.find(".card-notification-close-icon").bind('click',function(){

					$(this).parent().hide();
				});
			});
		},
		barcode_reading:function(){

			var this_selector=$(this);
			if(this_selector.length){

				this_selector.focus();

				$(document).keypress(function(event){

					var key;
					if(window.event)
						key=window.event.keyCode;
					else
						key=event.which;

					if(key == 13 && this_selector.val() != ''){

						var barcode_value=this_selector.val().split('&');
						this_selector.val('');

						var option={
							reset_form:false,
							selector_message:'div.card-response-output',
							type_valid:'success',
							effect:'fast',
							message:card_lang['card_message_reading'],
							function_callback:false,
							callback:function(){

								if(option.function_callback && eval('typeof ' + option.function_callback) != "function"){

									alert(card_lang['card_function_callback']);
									return false;
								}

								var string_barcode_value="'" + barcode_value[0] + "'";
								for(var i=1;i < barcode_value.length;i++){

									string_barcode_value+=",'" + barcode_value[i] + "'";
								}

								if(option.function_callback != false)
									eval(option.function_callback + '([' + string_barcode_value + '])');
							}
						}
						option=$.extend({},option,barcode_option_reading);

						card_set_value_form(barcode_value);

						card_message(option);

						if(option.reset_form == true)
							card_clear_form();

						option.callback(barcode_value);

						this_selector.focus();
					}
				});
			}
		}
	});

	$(window).on('beforeunload',function(e){

		var e=e || window.event;

		if(e)
			e.returnValue='';

		return '';
	});

})(jQuery);

function card_message(option){

	var option_default={
		selector_main:".card-message",
		selector_message:'.card-response-output',
		type_valid:'notification',
		effect:'fast',
		message:'Undefined'
	};
	option_default=$.extend({},option_default,option);

	var selector_object=$(option_default.selector_main).find(option_default.selector_message);

	$(option_default.selector_main).card_response_output_clear(option_default.selector_message);

	if(option_default.type_valid == 'notification'){

		selector_object.removeClass('card-notification-error');
		selector_object.removeClass('card-notification-success');
		selector_object.addClass('card-notification-information');
	}
	else if(option_default.type_valid == 'success'){

		selector_object.removeClass('card-notification-error');
		selector_object.removeClass('card-notification-information');
		selector_object.addClass('card-notification-success');
	}
	else{

		selector_object.removeClass('card-notification-success');
		selector_object.removeClass('card-notification-information');
		selector_object.addClass('card-notification-error');
	}

	if(option_default.effect !== false)
		selector_object.append(option_default.message).slideDown(option_default.effect);
	else
		selector_object.append(option_default.message).show();
}


/*================================= Form Card ================================*/

var card_form_id='#card-form';

function card_clear_form(){

	$(card_form_id).find(':input:not(.card_no_clear)').each(function(){

		switch(this.type){

			case 'password':
			case 'select-multiple':
			case 'select-one':
			case 'text':
			case 'textarea':
				$(this).val('');
				$(this).removeAttr('readonly');
				break;
			case 'checkbox':
				this.checked=false;
				break;
		}
	});
}

function card_readonly_form(){

	$(card_form_id).find(":input:not(.card_no_readonly)").each(function(){

		switch(this.type){

			case 'password':
			case 'text':
			case 'textarea':
				$(this).attr('readonly','readonly');
				break;
		}
	});
}


/*=============================== Card Interval ==============================*/

var card_interval='';

function card_set_interval(){

	card_interval=window.setInterval("card_tapping();",500);
}

function card_clear_interval(){

	clearInterval(card_interval);
}

/*============================== Card Connection =============================*/

var card_connected=false;
var card_list_reader='';
var card_time=0;

function card_connect_auto(){

	var temp;

	try{

		temp=document.OurActiveX.ListCardReader();
	}
	catch(e){

		card_connected=false;
		return;
	}

	if(temp == 'Error: no result return' || temp == null || temp == undefined){

		card_connected=false;
		return;
	}
	else{

		if(card_list_reader == temp && card_connected == true)
			return;
		else{

			card_list_reader=temp;
			temp=temp.split("#");
			card_connected=document.OurActiveX.ConnectToCardReader(temp[0]);
		}
	}
}

function card_reading(){

	var date=new Date();
	var time_now=date.getTime();

	if(card_connected == false || time_now - card_time > 5000){

		card_time=time_now;
		card_connect_auto();
	}

	if(card_connected == false){

		card_clear_interval();
		return 'no_connect';
	}
	else if(card_connected == true){

		if(document.OurActiveX.IsCardPresent() == true){

			card_clear_interval();
			return document.OurActiveX.ReadHeaderData(true).split('&');
		}
		else
			return 'no_card';
	}

	card_clear_interval();
	return 'no_connect';
}

/*=========================== Card Message Validate ==========================*/

if(typeof card_option_invalid == "undefined")
	var card_option_invalid={};

if(typeof card_option_no_card == "undefined")
	var card_option_no_card={};

if(typeof card_option_no_connect == "undefined")
	var card_option_no_connect={};

if(typeof card_option_reading == "undefined")
	var card_option_reading={};

if(typeof card_option_value_form == "undefined")
	var card_option_value_form={};

//Card Invalid
function card_message_invalid(){

	var option={
		reset_form:true,
		selector_message:'div.card-response-output',
		type_valid:false,
		effect:'fast',
		message:card_lang['card_message_invalid']
	}
	option=$.extend({},option,card_option_invalid);

	card_message(option);
	if(option.reset_form == true)
		card_clear_form();
}

//Card No
function card_message_no_card(){

	var option={
		reset_form:true,
		selector_message:'div.card-response-output',
		type_valid:'notification',
		effect:false,
		message:card_lang['card_message_no_card'] + " <b style='font-size:16px'>." + waiting_tapping + "</b>"
	}
	option=$.extend({},option,card_option_no_card);

	card_message(option);
	if(option.reset_form == true)
		card_clear_form();
}

//Card No Connect
function card_message_no_connect(){

	var option={
		reset_form:true,
		selector_message:'div.card-response-output',
		type_valid:false,
		effect:'fast',
		message:card_lang['card_message_no_connect']
	}
	option=$.extend({},option,card_option_no_connect);

	card_message(option);
	if(option.reset_form == true)
		card_clear_form();
}

function card_message_reading(data_reading){

	var option={
		reset_form:false,
		selector_message:'div.card-response-output',
		type_valid:'success',
		effect:'fast',
		message:card_lang['card_message_reading'],
		function_callback:false,
		callback:function(){

			if(option.function_callback && eval('typeof ' + option.function_callback) != "function"){

				alert(card_lang['card_function_callback']);
				return false;
			}

			var string_data_reading="'" + data_reading[0] + "'";
			for(var i=1;i < data_reading.length;i++){

				string_data_reading+=",'" + data_reading[i] + "'";
			}

			if(option.function_callback != false)
				eval(option.function_callback + '([' + string_data_reading + '])');
		}
	}

	option=$.extend({},option,card_option_reading);

	card_message(option);
	if(option.reset_form == true)
		card_clear_form();

	option.callback(data_reading);
}

function card_set_value_form(data_reading){

	var option={
		readonly_form:false,
		set_value_form:false
	}

	option=$.extend({},option,card_option_value_form);

	if(option.readonly_form == true)
		card_readonly_form();

	if(option.set_value_form == true){

		$("input[name='txt_card_uid']").val(data_reading[0]);
		$("input[name='txt_card_serial']").val(data_reading[1]);
		$("input[name='txt_card_version']").val(data_reading[2]);
		$("input[name='txt_card_issue_date']").val(data_reading[3]);
	}
}

/*=============================== Card Tapping ===============================*/

var waiting_tapping='';
var card_present=false;
var card_uid='';

//Tapping Card
function card_tapping(){

	var data_reading=['','','','','','','','','',''];
	data_reading=card_reading();

	waiting_tapping+='.';
	if(waiting_tapping.length > 5)
		waiting_tapping='';

	if(data_reading == false){

		var audio=new Audio(base_url_root + "card/sound/beep_error_02.mp3");
		audio.play();

		card_present=false;
		card_message_invalid();
		card_clear_interval();

		setTimeout(function(){

			card_set_interval();
		},3000);
	}
	else if(data_reading == 'no_card'){

		card_present=false;
		card_message_no_card();
	}
	else if(data_reading == 'no_connect'){

		card_present=false;
		card_message_no_connect();
		card_clear_interval();
	}
	else{

		if(card_uid != data_reading[0] || card_present == false){

			var audio=new Audio(base_url_root + "card/sound/beep_success_02.mp3");
			audio.play();

			card_present=true;
			card_uid=data_reading[0];
			card_set_value_form(data_reading);

			card_message_reading(data_reading);
		}
		else{

			card_clear_interval();
			setTimeout(function(){

				card_set_interval();
			},2000);
		}
	}
}

//Connecting Card
function card_connecting(){

	if((/msie/i.test(navigator.userAgent) == false) && (document.OurActiveX.WriteData == null)){

		window.open('/card/setup.zip');
	}
	else{

		card_clear_interval();
		card_set_interval();
	}
}

function card_stop(option){

	var option_default={
		reset_form:true,
		selector_message:'div.card-response-output',
		type_valid:'success',
		effect:'fast',
		message:card_lang['card_message_stop']
	}
	option_default=$.extend({},option_default,option);

	card_clear_interval();

	card_message(option_default);
	if(option_default.reset_form == true)
		card_clear_form();
}