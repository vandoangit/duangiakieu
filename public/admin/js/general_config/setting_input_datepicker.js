/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	$$.datepicker.setDefaults($$.datepicker.regional[""]);

	$$("#content input.input_datepicker").datepicker({
		showOtherMonths:true,
		selectOtherMonths:true,
		changeMonth:true,
		changeYear:true,
		dateFormat:"dd-mm-yy",
		nextText:"",
		prevText:"",
		showAnim:"show",
		onClose:function(dateText,inst){
			$$(this).focus();
		}
	});
});
