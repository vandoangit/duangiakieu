/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$(window).load(function(){

	var config_module_product_sidebar={
		mode:'vertical',// Type of transition between slides.Options: 'horizontal', 'vertical', 'fade'
		speed:800,// Slide transition duration (in ms)
		slideMargin:0,// Margin between each slide
		startSlide:0,// Starting slide index (zero-based)
		randomStart:true,// Start slider on a random slide
		slideSelector:'',// Element to use as slides (ex. 'div.slide')
		infiniteLoop:true,// If true, clicking "Next" while on the last slide will transition to the first slide and vice-versa
		hideControlOnEnd:true,// If true, "Next" control will be hidden on last slide and vice-versa
		easing:null,
		captions:false,// Include image captions. Captions are derived from the image's title attribute
		ticker:false,// Use slider in ticker mode(Marquee)
		tickerHover:true,// Ticker will pause when mouse hovers over slider. Note: this functionality does NOT work if using CSS transitions!
		adaptiveHeight:true,// Dynamically adjust slider height based on each slide's height (height động)
		adaptiveHeightSpeed:800,// Slide height transition duration (in ms). Note: only used if adaptiveHeight: true
		video:false,
		responsive:true,
		useCSS:true,// If true, CSS transitions will be used for horizontal and vertical slide animations (this uses native hardware acceleration). If false, jQuery animate() will be used.
		preloadImages:'visible',// value 'all',
		touchEnabled:true,
		swipeThreshold:50,
		oneToOneTouch:true,
		preventDefaultSwipeX:true,
		preventDefaultSwipeY:false,
		//
		// Page
		pager:false,
		pagerType:'full',// options: 'full', 'short'
		pagerShortSeparator:' / ',
		pagerSelector:'',
		pagerCustom:null,
		buildPager:null,
		//
		// Control
		controls:false,
		nextText:'Next',
		prevText:'Prev',
		nextSelector:null,
		prevSelector:null,
		//
		// Auto
		auto:true,
		pause:6000,
		autoStart:true,
		autoDirection:'next',// options: 'next', 'prev'
		autoHover:true,
		autoDelay:0,
		autoControls:false,
		startText:'Start',
		stopText:'Stop',
		autoControlsCombine:true,
		autoControlsSelector:null,
		//
		// Carousel
		minSlides:1,
		maxSlides:1,
		slideWidth:350,
		moveSlides:1
	};

	var config_module_utility={
		mode:'horizontal',// Type of transition between slides.Options: 'horizontal', 'vertical', 'fade'
		speed:800,// Slide transition duration (in ms)
		slideMargin:0,// Margin between each slide
		startSlide:0,// Starting slide index (zero-based)
		randomStart:true,// Start slider on a random slide
		slideSelector:'',// Element to use as slides (ex. 'div.slide')
		infiniteLoop:true,// If true, clicking "Next" while on the last slide will transition to the first slide and vice-versa
		hideControlOnEnd:true,// If true, "Next" control will be hidden on last slide and vice-versa
		easing:null,
		captions:false,// Include image captions. Captions are derived from the image's title attribute
		ticker:false,// Use slider in ticker mode(Marquee)
		tickerHover:true,// Ticker will pause when mouse hovers over slider. Note: this functionality does NOT work if using CSS transitions!
		adaptiveHeight:true,// Dynamically adjust slider height based on each slide's height (height động)
		adaptiveHeightSpeed:800,// Slide height transition duration (in ms). Note: only used if adaptiveHeight: true
		video:false,
		responsive:true,
		useCSS:true,// If true, CSS transitions will be used for horizontal and vertical slide animations (this uses native hardware acceleration). If false, jQuery animate() will be used.
		preloadImages:'visible',// value 'all',
		touchEnabled:true,
		swipeThreshold:50,
		oneToOneTouch:true,
		preventDefaultSwipeX:true,
		preventDefaultSwipeY:false,
		//
		// Page
		pager:true,
		pagerType:'full',// options: 'full', 'short'
		pagerShortSeparator:' / ',
		pagerSelector:'',
		pagerCustom:null,
		buildPager:null,
		//
		// Control
		controls:false,
		nextText:'Next',
		prevText:'Prev',
		nextSelector:null,
		prevSelector:null,
		//
		// Auto
		auto:true,
		pause:6000,
		autoStart:true,
		autoDirection:'next',// options: 'next', 'prev'
		autoHover:true,
		autoDelay:0,
		autoControls:false,
		startText:'Start',
		stopText:'Stop',
		autoControlsCombine:true,
		autoControlsSelector:null,
		//
		// Carousel
		minSlides:1,
		maxSlides:1,
		slideWidth:350,
		moveSlides:1
	};
	
	var config_module_partner={
		mode:'horizontal',// Type of transition between slides.Options: 'horizontal', 'vertical', 'fade'
		speed:800,// Slide transition duration (in ms)
		slideMargin:0,// Margin between each slide
		startSlide:0,// Starting slide index (zero-based)
		randomStart:true,// Start slider on a random slide
		slideSelector:'',// Element to use as slides (ex. 'div.slide')
		infiniteLoop:true,// If true, clicking "Next" while on the last slide will transition to the first slide and vice-versa
		hideControlOnEnd:true,// If true, "Next" control will be hidden on last slide and vice-versa
		easing:null,
		captions:false,// Include image captions. Captions are derived from the image's title attribute
		ticker:false,// Use slider in ticker mode(Marquee)
		tickerHover:true,// Ticker will pause when mouse hovers over slider. Note: this functionality does NOT work if using CSS transitions!
		adaptiveHeight:true,// Dynamically adjust slider height based on each slide's height (height động)
		adaptiveHeightSpeed:800,// Slide height transition duration (in ms). Note: only used if adaptiveHeight: true
		video:false,
		responsive:true,
		useCSS:true,// If true, CSS transitions will be used for horizontal and vertical slide animations (this uses native hardware acceleration). If false, jQuery animate() will be used.
		preloadImages:'visible',// value 'all',
		touchEnabled:true,
		swipeThreshold:50,
		oneToOneTouch:true,
		preventDefaultSwipeX:true,
		preventDefaultSwipeY:false,
		//
		// Page
		pager:true,
		pagerType:'full',// options: 'full', 'short'
		pagerShortSeparator:' / ',
		pagerSelector:'',
		pagerCustom:null,
		buildPager:null,
		//
		// Control
		controls:false,
		nextText:'Next',
		prevText:'Prev',
		nextSelector:null,
		prevSelector:null,
		//
		// Auto
		auto:true,
		pause:6000,
		autoStart:true,
		autoDirection:'next',// options: 'next', 'prev'
		autoHover:true,
		autoDelay:0,
		autoControls:false,
		startText:'Start',
		stopText:'Stop',
		autoControlsCombine:true,
		autoControlsSelector:null,
		//
		// Carousel
		minSlides:1,
		maxSlides:1,
		slideWidth:350,
		moveSlides:1
	};

	$('#module_product_new.list_product_new_vertical').bxSlider(config_module_product_sidebar);

	$('#module_product_view.list_product_view_vertical').bxSlider(config_module_product_sidebar);

	$('#module_product_buy.list_product_buy_vertical').bxSlider(config_module_product_sidebar);

	$('#module_product_prominent.list_product_prominent_vertical').bxSlider(config_module_product_sidebar);

	$('#module_partner.list_partner_horizontal').bxSlider(config_module_partner);
	
	$('#module_utility.list_utility_horizontal').bxSlider(config_module_utility);
});