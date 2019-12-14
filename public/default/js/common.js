$('#sliders').nivoSlider({
    animSpeed: 750,                 // Slide transition speed
	pauseTime: 4500,                // How long each slide will show anim/pausetime = 1/6
    manualAdvance:false,
    effect:'fade'
});


jQuery(document).ready(function(){

//    setTimeout(function() {
//        $('#loader').fadeOut();
//    }, 500);
        
   
    /*var offset = $("#sidebar").offset();
    var topPadding = 250;*/

	$(window).scroll(function(){
        var rez = $(window).width();
        if ( rez>981){
            if($(this).scrollTop() > 0)
            {
                $(".fixed-top").css({"box-shadow":"rgba(0, 0, 0, 0.5) 0px 0px 11px -3px", "background-color":"rgba(2,77,134,0.7)"});
                $(".main-menu > ul > li > a ").css("padding","20px 0");
            }
            else
            {
                $(".fixed-top, .main-menu > ul > li > a").removeAttr("style");
            }
        };
        
		( $(this).scrollTop() > 300 ) ? $('.scrollup').addClass('scrollup-visible') : $('.scrollup').removeClass('scrollup-visible scrollup-fade-out');
		if( $(this).scrollTop() > 800 ) { 
			$('.scrollup').addClass('scrollup-fade-out');
		};
        var window_top = $(window).scrollTop();
        // the "12" should equal the margin-top value for nav.stickydiv
        var div_top = ($('#pass-height').height())+150;
        var height_menu=$('.banner_left').height();
        var bot_bot = $('#lien-he').offset().top-height_menu;
        var leftn= (($(window).width()-1000)/2)-75;
        
        if(div_top<=window_top&&window_top<bot_bot){
            $('.banner_left').addClass('stickydivl');
            $('.banner_left').css('left',leftn);
            $('.banner_left').removeClass('stickydivk');
        }else if(window_top>bot_bot){
            $('.banner_left').removeClass('stickydivl');
            $('.banner_left').addClass('stickydivk');
            $('.banner_left').removeAttr("style");
        }else{
            $('.banner_left').removeClass('stickydivl');
            $('.banner_left').removeClass('stickydivk');
            $('.banner_left').removeAttr("style");
        }
	});
    var swiper = new Swiper('.sws-3c', {
        slidesPerView: 3,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay: 3000,
        autoplayDisableOnInteraction: false,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        breakpoints: {
            1024: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 2,
            },
            640: {
                slidesPerView: 2,
            },
            480: {
                slidesPerView: 1,
            }
        }
    });
    var swiper = new Swiper('.sws-4c', {
        slidesPerView: 4,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay: 3000,
        autoplayDisableOnInteraction: false,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        breakpoints: {
            1024: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 2,
            },
            640: {
                slidesPerView: 2,
            },
            480: {
                slidesPerView: 1,
            }
        }
    });
    var swiper = new Swiper('.sws-intro', {
        scrollbar: '.swiper-scrollbar',
        direction: 'vertical',
        slidesPerView: 'auto',
        mousewheelControl: true,
        freeMode: true
    });
    var swiper = new Swiper('.sws-4c2r', {
        slidesPerView: 3,
        slidesPerColumn: 2,
        paginationClickable: true,
        spaceBetween: 15,
        autoplay: 3000,
        autoplayDisableOnInteraction: false,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        breakpoints: {
            1024: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 2,
            },
            640: {
                slidesPerView: 2,
            },
            480: {
                slidesPerView: 1,
            }
        }
    });
    var swiper = new Swiper('.sws-slide4c', {
        slidesPerView: 3,
        slidesPerColumn: 1,
        paginationClickable: true,
        spaceBetween: 15,
        autoplay: 3000,
        autoplayDisableOnInteraction: false,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',

    });
    var swiper = new Swiper('.sws-mc', {
        slidesPerView: 4,
        slidesPerColumn: 1,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay: 3000,
        autoplayDisableOnInteraction: false,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        breakpoints: {
            1024: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 2,
            },
            640: {
                slidesPerView: 2,
            },
            480: {
                slidesPerView: 1,
            }
        }
    });
    //var swiper = new Swiper('.sws-ver', {
//        slidesPerView: 4,
//        slidesPerColumn: 1,
//        paginationClickable: true,
//        spaceBetween: 15,
//        autoplay: 3000,
//        direction: 'vertical',
//        autoplayDisableOnInteraction: false,
//        nextButton: '.swiper-button-next',
//        prevButton: '.swiper-button-prev',
//    });
	//smooth scroll to top
	$('.scrollup').on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, 700
		);
	});
    // $('.responsive-tabs').responsiveTabs({
    //     accordionOn: ['xs']
    // });
    //==Menu Responsive==//
    
    
    $('.child-menu .toggle-right').on('click', function(e) {
        e.preventDefault();
         $this = $(this);
         $this.parent().parent().parent().children("li").children("a").children("span").removeClass("fa-minus").addClass("fa-plus");
         //$plus.addClass("fa-plus");
         $parent = $this.parent().next();
         // $parent.addClass('active');
         $tar = $this.parent().parent().parent().children(".child-menu").children("ul")
         if (!$parent.hasClass('active')) {
           $tar.removeClass('active').slideUp('fast');
           $parent.addClass('active').slideDown('fast');
           $this.removeClass("fa-plus").addClass("fa-minus");
         } else {
           $parent.removeClass('active').slideUp('fast');
           $this.removeClass("fa-minus").addClass("fa-plus");
         }
    });
    $('.frog').on('click',function(){
		$('#main-menu-mobile').removeClass('menu-display');
		$('.navbar-toggle').removeClass('icon-open');
        $('#search-block').fadeOut();
		$(this).hide();
	});
    
    //==End Menu Responsive==//
    //==SEARCH==//
    $('.navicon').on('click', function (){
        $('.frog').fadeIn();
        $('#search-block').fadeIn();
        
    });
    //==END SEARCH==//
    
    // $("#img_01").elevateZoom({zoomType: "inner", containLensZoom: true, gallery:'gal1', cursor: 'pointer',scrollZoom : true, galleryActiveClass: "active",responsive:true,imageCrossfade:false});
//pass the images to Fancybox
$("#img_01").bind("click", function(e) {
var ez =   $('#img_01').data('elevateZoom');
$.fancybox(ez.getGalleryList());
return false;
});
});
$('.navbar-toggle, .icon-open').on('click',function(){
    $("#main-menu-mobile .nav-menu .child-menu > a").append("<span class='fa fa-plus toggle-right'></span>");
	$(this).toggleClass('icon-open');
	$('#main-menu-mobile').toggleClass('menu-display');
	$('.frog').show();
    $("#menu-header").toggleClass("menu-header-bg");
    $('.child-menu .toggle-right').on('click', function(e) {
        e.preventDefault();
         $this = $(this);
         $this.parent().parent().parent().children("li").children("a").children("span").removeClass("fa-minus").addClass("fa-plus");
         //$plus.addClass("fa-plus");
         $parent = $this.parent().next();
         // $parent.addClass('active');
         $tar = $this.parent().parent().parent().children(".child-menu").children("ul")
         if (!$parent.hasClass('active')) {
           $tar.removeClass('active').slideUp('fast');
           $parent.addClass('active').slideDown('fast');
           $this.removeClass("fa-plus").addClass("fa-minus");
         } else {
           $parent.removeClass('active').slideUp('fast');
           $this.removeClass("fa-minus").addClass("fa-plus");
         }
    });
});
$(".btn-close-menu").on('click',function(){
	$('#main-menu-mobile').removeClass('menu-display');
	$('.navbar-toggle').removeClass('icon-open');
    $('.frog').hide();
});
function validateForm(id) {
    
        var input = document.getElementById(id).value;
        var filter_txtEmail = '';
        var filter_txtTel   = '';
        var filter = 'filter_'+id;
        
        switch(filter){
            case 'filter_txtName':                                
                filter = /^[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{1,50}$/;
                break;
            case 'filter_txtEmail':                                
                filter = /[A-Za-z0-9_-]+([\.]{1}[A-Za-z0-9_-]+)*@[A-Za-z0-9-]+([\.]{1}[A-Za-z0-9-]+)+/;
                break;
            case 'filter_txtTel':
                filter = /^[0-9]{9,15}$/;
                //(\\+84|0)\\d{9,10}
                break;
            case 'filter_txtContent':
                filter = /^[A-Za-z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{5,500}$/;
                break;
            case 'filter_txtSubject':
                filter = /^[A-Za-z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{3,100}$/;
                break;
            default:
                filter = '';                                                                                            
         };
         
        if (filter.test(input)) {
            
            $("#check-"+id + " .val.fa").removeClass("fa-times");
            $("#check-"+id + " .val.fa").addClass("fa-check").css('color','#5CB85C');
        }
        else {
            $("#check-"+id + " .val.fa").removeClass("fa-check");
            $("#check-"+id + " .val.fa").addClass("fa-times").css('color','#D9534F');
        }
    };
