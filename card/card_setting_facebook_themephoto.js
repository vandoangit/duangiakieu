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

	var directory_photo=$("#directory_photo_active img").attr("src");

	$.ajax({
		data:'1e17df4793bf819608c5849576ae5d8a=false' + '&card_uid=' + data_card[0] + '&facebook_theme=themephoto' + '&directory_photo=' + directory_photo,
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


/*============================ Load Facebook Photo ===========================*/

directory_photo_first=null;

(function($){

	$.extend($.fn,{
		ajax_synchronize_directory_photo:function(url_process){

			if($(this).length){

				var this_selector=$(this);

				$.ajax({
					data:'1e17df4793bf819608c5849576ae5d8a=false',
					url:base_url_root + url_process,
					beforeSend:function(){
						//$('#loading_default').hide();
					},
					success:function(string){

						if(string == "ftp_connect")
							alert(card_lang['ftp_connect']);
						else if(string == "ftp_directory_server")
							alert(card_lang['ftp_directory_server']);
						else{

							setTimeout(function(){

								this_selector.ajax_synchronize_directory_photo(url_process);
							},500);
						}
					}
				});
			}
		},
		ajax_load_directory_photo:function(url_process){

			if($(this).length){

				var this_selector=$(this);
				var directory_url=this_selector.attr("directory_url");

				$.ajax({
					data:'1e17df4793bf819608c5849576ae5d8a=false' + '&directory_url=' + directory_url,
					url:base_url_root + url_process,
					beforeSend:function(){
						//$('#loading_default').hide();
					},
					success:function(string){

						if(string == "error_exist_folder"){

							this_selector.html("<span class='message_failed'>" + card_lang['facebook_photo_exist_directory'] + "</span>");
						}
						else{

							this_selector.html(string);
							this_selector.find('.directory_indent').css("height",$("#directory_photo_active img").height());
							setTimeout(function(){

								this_selector.ajax_load_directory_photo(url_process);
							},2000);

							if(directory_photo_first == null){

								var directory_img_first=this_selector.find('img').attr("src");
								if(directory_img_first != undefined){

									$("#directory_photo_active img").attr("src",directory_img_first);
									directory_photo_first="hominhtri";
								}
							}
						}
					}
				});
			}
		},
		ajax_directory_next_photo:function(elements_selector,url_process){

			return this.each(function(){

				var this_selector=$(this);

				$(this).delegate(elements_selector,"click",function(){

					var directory_url_root=this_selector.attr("directory_url");
					if(directory_url_root.slice(-1) == "/")
						directory_url_root=directory_url_root.slice(0,-1);

					var directory_current=$(this).attr("directory_name");
					if(directory_current != "")
						directory_current="/" + directory_current;

					this_selector.attr("directory_url",directory_url_root + directory_current);
					this_selector.ajax_load_directory_photo(url_process);
				});
			});
		},
		ajax_directory_previous_photo:function(elements_selector,url_process){

			return this.each(function(){

				var this_selector=$(this);

				$(this).delegate(elements_selector,"click",function(){

					var directory_url_root=this_selector.attr("directory_url");
					if(directory_url_root.slice(-1) == "/")
						directory_url_root=directory_url_root.slice(0,-1);

					var arr_directory_url_root=directory_url_root.split("/");

					directory_url_root=arr_directory_url_root[0];
					for(var i=1;i < arr_directory_url_root.length - 1;i++)
						directory_url_root+="/" + arr_directory_url_root[i];

					this_selector.attr("directory_url",directory_url_root);
					this_selector.ajax_load_directory_photo(url_process);
				});
			});
		},
		ajax_directory_select_photo:function(elements_selector){

			return this.each(function(){

				var this_selector=$(this);

				$(this).delegate(elements_selector,"click",function(){

					var directory_img_src=$(this).attr("src");
					if(directory_img_src != undefined){

						$("#directory_photo_active img").attr("src",directory_img_src);
						this_selector.find('.directory_indent').css("height",$("#directory_photo_active img").height());
					}
				});
			});
		}
	});
})(jQuery);

$(window).load(function(){

	card_connecting();
	$("#txt_card_barcode").barcode_reading();

	//$("#directory_photo_facebook").ajax_synchronize_directory_photo("facebook/synchronize_directory_photo/");

	$("#directory_photo_facebook").ajax_load_directory_photo("facebook/load_directory_photo/");

	$("#directory_photo_facebook").ajax_directory_select_photo("#directory_photo_facebook ul li img");

	$("#directory_photo_facebook").ajax_directory_next_photo("#directory_photo_facebook .directory_open","facebook/load_directory_photo/");

	$("#directory_photo_facebook").ajax_directory_previous_photo("#directory_photo_facebook .directory_close","facebook/load_directory_photo/");
});