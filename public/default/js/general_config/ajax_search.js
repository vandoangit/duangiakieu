/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

(function($){

	$.ajax_search_general=function(url_process){

		var value_key_search=$("#input_key_search_header").val();
		var reg_key_search=/(\/|\\)+/i;

		if(value_key_search == undefined || value_key_search == ''){

			$("#input_key_search_header").focus();
			alert(lang['message_search_empty']);
			return false;
		}
		else if(reg_key_search.test(value_key_search)){

			$("#input_key_search_header").focus();
			alert(lang['message_search_validation']);
			return false;
		}
		else{

			window.location=base_url_root + url_process + value_key_search.replace(/(\/|\s*)$/i,"") + URL_SUFFIX;
			return true;
		}
	};

	$.ajax_product_search=function(url_process){

		var value_key_search=$("#input_key_search_product").val();
		var value_category_search=$("#select_category_search_product").children().filter(':selected').attr('value');
		var value_price_begin_search=$("#select_price_begin_search_product").children().children().filter(':selected').attr('value');
		var value_price_end_search=$("#select_price_end_search_product").children().children().filter(':selected').attr('value');
		var reg_key_search=/(\/|\\)+/i;

		if(value_key_search == undefined || value_category_search == undefined || value_price_begin_search == undefined || value_price_end_search == undefined){

			alert(lang['message_product_search_empty']);
			return false;
		}
		else if(value_key_search != '' && reg_key_search.test(value_key_search)){

			alert(lang['message_product_search_validation']);
			return false;
		}
		else if((value_key_search == '') && (value_price_begin_search == -1) && (value_price_end_search == -1)){

			alert(lang['message_product_search_empty']);
			return false;
		}
		else if(value_price_begin_search != -1 && value_price_end_search != -1 && (parseInt(value_price_begin_search) > parseInt(value_price_end_search))){

			alert(lang['message_product_search_price']);
			return false;
		}
		else{

			window.location=base_url_root + url_process + value_key_search.replace(/(\/|\s*)$/i,"") + '/' + value_category_search + '/' + value_price_begin_search + '/' + value_price_end_search + URL_SUFFIX;
			return true;
		}
	};

	$.ajax_news_search=function(url_process){

		var value_key_search=$("#input_key_search_news").val();
		var value_category_search=$("#select_category_search_news").children().filter(':selected').attr('value');
		var reg_key_search=/(\/|\\)+/i;

		if(value_key_search == undefined || value_category_search == undefined){

			alert(lang['message_news_search_empty']);
			return false;
		}
		else if(value_key_search == ''){

			alert(lang['message_news_search_empty']);
			return false;
		}
		else if(value_key_search != '' && reg_key_search.test(value_key_search)){

			alert(lang['message_news_search_validation']);
			return false;
		}
		else{

			window.location=base_url_root + url_process + value_key_search.replace(/(\/|\s*)$/i,"") + '/' + value_category_search + URL_SUFFIX;
			return true;
		}
	};

	$.extend($.fn,{
		ajax_search_general_click:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){

					$.ajax_search_general(url_process);
				});
			});
		},
		ajax_search_general_enter:function(url_process){

			$(document).keypress(function(event){

				var key;
				if(window.event)
					key=window.event.keyCode;
				else
					key=event.which;

				if(key == 13){

					if($('#form_search_header').attr('name') != undefined){

						$.ajax_search_general(url_process);
					}

					return false;
				}
			});
		},
		ajax_product_search_click:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){

					$.ajax_product_search(url_process);
				});
			});
		},
		ajax_product_search_enter:function(url_process){

			$(document).keypress(function(event){

				var key;
				if(window.event)
					key=window.event.keyCode;
				else
					key=event.which;

				if(key == 13){

					if($('#form_search_product').attr('name') != undefined){

						$.ajax_product_search(url_process);
					}

					return false;
				}
			});
		},
		ajax_news_search_click:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){

					$.ajax_news_search(url_process);
				});
			});
		},
		ajax_news_search_enter:function(url_process){

			$(document).keypress(function(event){

				var key;
				if(window.event)
					key=window.event.keyCode;
				else
					key=event.which;

				if(key == 13){

					if($('#form_search_news').attr('name') != undefined){

						$.ajax_news_search(url_process);
					}

					return false;
				}
			});
		}
	})
})(jQuery);