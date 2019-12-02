/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$(window).load(function(){

	$('.jqzoom_product_detail').jqzoom({
		zoomType:'standard',
		zoomWidth:420,
		zoomHeight:350,
		xOffset:5,
		yOffset:0,
		position:'right',
		preloadImages:true,
		preloadText:'Loading....',
		title:true,
		lens:true,
		imageOpacity:0.6,
		showEffect:'show',
		hideEffect:'hide',
		fadeinSpeed:'slow',
		fadeoutSpeed:'2000',
		alwaysOn:false
	});
});