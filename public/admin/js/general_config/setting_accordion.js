/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	var icons={
		header:"ui-icon-circle-arrow-e",
		headerSelected:"ui-icon-circle-arrow-s"
	};

	$$("#accordion").accordion({
		icons:icons,
		collapsible:true,
		autoHeight:false,
		navigation:true
	});
});
