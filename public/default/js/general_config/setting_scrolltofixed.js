/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$(window).load(function(){

	// Config Type 1
	$('.module_menu_search').scrollToFixed({
		zIndex:100
	});

	$('.module_menu_header').scrollToFixed({
		marginTop:$('.module_menu_search').outerHeight(true),
		zIndex:99
	});

	// Config Type 2
	var param_limit=$('#footer_abc').offset();
	if(param_limit != null)
		param_limit=param_limit.top;
	else
		param_limit=0;

	$('.footer_abc').scrollToFixed({
		bottom:0,
		limit:param_limit
	});

	// Config Type 3
	var summaries=$('.news_involved_sidebar');
	summaries.each(function(i){

		var summary=$(summaries[i]);
		var next=summaries[i + 1];

		summary.scrollToFixed({
			marginTop:10,
			limit:function(){

				var limit=0;
				if(next){

					limit=$(next).offset().top - $(this).outerHeight(true) - 10;
				}
				else{

					limit=$('#sub_body_main').offset().top - $(this).outerHeight(true) - 10;
				}

				return limit;
			},
			zIndex:999
		});
	});
});