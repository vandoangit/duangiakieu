/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	$$.validationEngineLanguage.newLang();

	//.save_items_menu,#form_add_content

	//Save
	$$("#form_add_content").validationEngine();
	$$(".save_items_menu").click(function(){
		$$("#form_add_content").submit();
	});

	$$(document).keypress(function(event){

		var key;
		if(window.event)
			key=window.event.keyCode;     //IE
		else
			key=event.which;     //firefox	
		if((key == 13) && ($$("#form_add_content").attr('name') != undefined))
			$$("#form_add_content").submit();
	});
});