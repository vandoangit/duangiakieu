/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$(window).load(function(){

	var button='#button_member_login';
	var box='#box_member_login';

	$(button).removeAttr('href');
	$(button).mouseup(function(){

		$(box).slideToggle('slow');
		$(button).toggleClass('active');
	});

	$(this).mouseup(function(login){

		var selector_current=$(login.target).attr('id');
		var selector_button=$(login.target).parents(button).length;
		var selector_box=$(login.target).parents(box).length;

		if(!('#' + selector_current == button || '#' + selector_current == box || selector_button > 0 || selector_box > 0)){

			$(box).hide('slow');
			$(button).removeClass('active');
		}
	});
});