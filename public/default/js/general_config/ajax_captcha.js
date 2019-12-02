/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

(function($){

	$.ajax_captcha=function(selector_captcha,url_process){

		if($(selector_captcha).length){

			$.ajax({
				url:base_url_root + url_process.replace(/\/$/i,"") + URL_SUFFIX,
				success:function(string){
					if(string == 'captcha_error')
						alert(lang['message_captcha_error']);
					else
						$(selector_captcha).html(string);
				}
			});
		}
	};

	$.extend($.fn,{
		ajax_captcha_click:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){
					$.ajax_captcha(elements_selector,url_process);
				});
			});
		}
	})
})(jQuery);