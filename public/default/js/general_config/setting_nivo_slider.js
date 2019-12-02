/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$(window).load(function(){

	$('#slider_header').nivoSlider({
		effect:'sliceDown,sliceDownLeft,sliceUpDown,sliceUpDownLeft,fold,boxRandom',// Specify sets like: 'fold,fade,sliceDown'
		slices:30,// For slice animations
		boxCols:20,// For box animations
		boxRows:10,// For box animations
		animSpeed:1000,// Slide transition speed
		pauseTime:6000,// How long each slide will show
		startSlide:0,// Set starting Slide (0 index)
		directionNav:true,// Next & Prev navigation
		directionNavHide:true,// Only show on hover
		controlNav:false,// 1,2,3... navigation
		controlNavThumbs:false,// Use thumbnails for Control Nav
		pauseOnHover:true,// Stop animation while hovering
		manualAdvance:false,// Force manual transitions
		prevText:'',// Prev directionNav text
		nextText:'',// Next directionNav text
		randomStart:true // Start on a random slide
	});
});