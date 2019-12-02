/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

(function($){

	$.ajax_reset_comment=function(elements_selector,url_process){

		$(elements_selector).parent().ajax_show_comment(elements_selector,url_process);
	};

	$.extend($.fn,{
		ajax_show_comment:function(elements_selector,url_process){

			if($(elements_selector).length){

				return this.each(function(){
					var comment_product_news=$(elements_selector).attr("param_comment");

					$.ajax({
						url:base_url_root + url_process + comment_product_news.replace(/\/$/i,"") + URL_SUFFIX,
						success:function(string){
							$(elements_selector).html(string);
							$.ajax_captcha("#ajax_captcha_comment",'captcha/comment/');
						}
					});
				});
			}
		},
		ajax_insert_comment:function(elements_selector,elements_selector_show,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){

					var txt_comment_name=$("#txt_comment_name").val();
					var txt_comment_email=$("#txt_comment_email").val();
					var txt_comment_title=$("#txt_comment_title").val();
					var txt_comment_captcha=$("#txt_comment_captcha").val();
					var txt_comment_content=$("#txt_comment_content").val();

					var txt_comment_product_news=$(this).attr("param_id_product_news");

					var string_url="&txt_comment_name=" + txt_comment_name + "&txt_comment_email=" + txt_comment_email
							+ "&txt_comment_title=" + txt_comment_title + "&txt_comment_captcha=" + txt_comment_captcha
							+ "&txt_comment_content=" + txt_comment_content + "&txt_comment_product_news=" + txt_comment_product_news;

					if(txt_comment_name != undefined && txt_comment_email != undefined && txt_comment_title != undefined && txt_comment_captcha != undefined && txt_comment_content != undefined && txt_comment_product_news != undefined){

						$.ajax({
							data:"1e17df4793bf819608c5849576ae5d8a=false" + string_url,
							url:base_url_root + url_process + txt_comment_product_news.replace(/\/$/i,"") + URL_SUFFIX,
							success:function(string){

								$(elements_selector_show).html(string);
								$.ajax_captcha("#ajax_captcha_comment",'captcha/comment/');
							}
						});
					}
				});
			});
		},
		ajax_reset_comment_click:function(elements_selector,elements_selector_comment,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){
					$.ajax_reset_comment(elements_selector_comment,url_process);
				});
			});
		}
	})
})(jQuery);