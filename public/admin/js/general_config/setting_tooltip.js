/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

(function($){
	$.tooltip_header=function(){
		$("#div_header_admin a").tooltip({
			track:true,
			delay:0,
			showURL:false,
			showBody:" - ",
			fade:250
		});
		return this;
	};

	$.tooltip_menu_left=function(){
		$("#menu_left span").tooltip({
			track:true,
			delay:0,
			showURL:false,
			showBody:" - ",
			fade:250
		});
		return this;
	};

	$.tooltip_function_admin=function(){
		$("#content .function_admin_body_right a").tooltip({
			track:true,
			delay:0,
			showURL:false,
			showBody:" - ",
			fade:250
		});
		return this;
	};

	$.tooltip_content_admin=function(){
		$("#content table tr td a").tooltip({
			track:true,
			delay:0,
			showURL:false,
			showBody:" - ",
			fade:250
		});
		return this;
	};
})(jQuery);

$$(document).ready(function(){

	$$.tooltip_header();
	$$.tooltip_menu_left();
	$$.tooltip_function_admin();
});  