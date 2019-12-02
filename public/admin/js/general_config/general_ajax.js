/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

function set_init_loading(){

	$$('#loading_admin').hide(200);
}

function format_number(number,separator_number){

	if(separator_number != ',' && separator_number != '.')
		return 0;

	var num=number.toString().replace(/\$|\.|\,/g,'');
	if(isNaN(num))
		num="";

	var sign=(num == (num=Math.abs(num)));
	num=Math.floor(num * 100 + 0.50000000001);
	num=Math.floor(num / 100).toString();

	for(var i=0;i < Math.floor((num.length - (1 + i)) / 3);i++){
		num=num.substring(0,num.length - (4 * i + 3)) + separator_number +
				num.substring(num.length - (4 * i + 3));
	}

	return (((sign) ? '' : '-') + num);
}

$$(document).ready(function(){

	$$.ajaxSetup({
		async:false,
		data:'1e17df4793bf819608c5849576ae5d8a=false',
		type:'POST',
		dataType:'html',
		crossDomain:false,
		beforeSend:function(){
			$$('#loading_admin').show();
		},
		complete:function(){
			$$('#loading_admin').hide(200);
		},
		error:function(){
			alert('Đã xảy ra lỗi khi thực hiện.Vui lòng thực hiện lại...!');
		},
		cache:false
	});
});