/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$(window).load(function(){

	$('#body_content .home_intro .item_intro').click(function(){

		window.location.href=$(this).find('div.item_intro_name a').attr('href');
	});

	$('#body_content .home_intro .item_intro').hover(
			function(){

				$(this).find('div.item_intro_image').cycle('pause');
				$(this).find('div.item_intro_description_bg').show();
				$(this).find('div.item_intro_name').addClass('item_intro_active');
				//$(this).find('div.item_intro_name').hide();
			},
			function(){

				$(this).find('div.item_intro_image').cycle('resume');
				$(this).find('div.item_intro_description_bg').hide();
				$(this).find('div.item_intro_name').removeClass('item_intro_active');
				//$(this).find('div.item_intro_name').show();
			});

	////////////////////////////////////////////////////////////////////////////

	$.each($('#body_content .home_intro .item_intro_image'),function(key,value){

		var effects="blindX,blindY,blindZ";
		effects+=",cover";
		effects+=",curtainX,curtainY";
		effects+=",fade,fadeZoom";
		effects+=",growX,growY";
		effects+=",scrollUp,scrollDown,scrollLeft,scrollRight,scrollHorz,scrollVert";
		//effects    +=",shuffle";
		effects+=",slideX,slideY";
		effects+=",toss";
		effects+=",turnUp,turnDown,turnLeft,turnRight";
		effects+=",uncover";
		effects+=",wipe";
		effects+=",zoom";

		$(this).cycle({
			fx:effects,
			randomizeEffects:true,
			easing:'easeInBack',
			sync:true,
			delay:Math.floor(Math.random() * 4000 + 1000),
			speed:1000,
			slides:"> img",
			before:function(event,optionHash,outgoingSlideEl,incomingSlideEl,forwardFlag){

				$(this).parent().parent().find('div.item_intro_name').fadeOut(500);
			},
			after:function(event,optionHash,outgoingSlideEl,incomingSlideEl,forwardFlag){

				$(this).parent().parent().find('div.item_intro_name').fadeIn(1500);
			}
		});
	});

});