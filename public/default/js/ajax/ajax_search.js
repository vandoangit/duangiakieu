/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$(window).load(function(){

	$("#body_header").ajax_search_general_click('#submit_search_header','product/search/'); //news/search/
	$("#body_header").ajax_search_general_enter('product/search/'); //news/search/

	$("#left_content .module_left").ajax_product_search_click('#ajax_search_product','product/search/');
	$("#left_content .module_left").ajax_product_search_enter('product/search/');

	$("#left_content .module_left").ajax_news_search_click('#ajax_search_news','news/search/');
	$("#left_content .module_left").ajax_news_search_enter('news/search/');
});