/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$$(document).ready(function(){

	$$("#navigation").treeview({
		animated:"normal",
		collapsed:true,
		unique:true,
		persist:"location"
	});

	$$("#navigation .mParent .tParent").hover(function(){

		$$(this).animate({
			width:"222",
			paddingRight:"18",
			paddingLeft:"0"
		},100);
	}).mouseout(function(){
		$$(this).animate({
			width:"222",
			paddingRight:"8",
			paddingLeft:"6"
		},100);
	});
});