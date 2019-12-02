/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

(function($){
	$.extend($.fn,{
		scroll_banner_sidebar:function(option){

			var option_default={
				selector_body_main:"#body_main",
				selector_body_limit:"#body_header",
				top_default:20
			}
			option_default=$.extend({},option_default,option);

			if($(this).length){

				return this.each(function(){

					var selector_window=$(window);
					var selector_main=$(option_default.selector_body_main);
					var selector_banner=$(this);
					var selector_limit=$(option_default.selector_body_limit);

					set_offset_top();
					//Su Kien Scroll
					selector_window.scroll(function(){
						set_offset_top();
					});

					//Su Kien Scroll
					set_zindex();
					selector_window.resize(function(){
						set_zindex();
					})

					function set_offset_top(){

						var body_height=$('body').height();
						var top=$(this).scrollTop();
						var top_limit=selector_limit.offset().top + selector_limit.outerHeight(true) + 2;
						var top_default=option_default.top_default;

						if(top + top_default + selector_banner.outerHeight(true) > body_height){

							selector_banner.stop().animate({
								top:body_height - selector_banner.outerHeight(true)
							},
							1000,'easeOutCirc');
						}
						else if(top + top_default > top_limit){

							selector_banner.stop().animate({
								top:top + top_default
							},
							1000,'easeOutCirc');
						}
						else{

							selector_banner.stop().animate({
								top:top_limit
							},
							1000,'easeOutCirc');
						}
					}

					function set_zindex(){

						var width_banner=selector_banner.outerWidth() * 2;

						if(selector_window.width() <= selector_main.outerWidth() + width_banner){

							selector_banner.hide();
						}
						else{

							selector_banner.slideDown('fast');
						}
					}
				})
			}
		}
	})
})(jQuery);

$(window).load(function(){

	$(".advertise_sidebar").scroll_banner_sidebar({
		selector_body_main:"#body_main",
		selector_body_limit:"#body_header",
		top_default:parseFloat($(".advertise_sidebar").css('top'),10)
	});
});