/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

function set_init_loading(){

	//$('#loading_default').hide(200);
}

$(window).load(function(){

	$.ajaxSetup({
		async:false,
		data:'1e17df4793bf819608c5849576ae5d8a=false',
		type:'POST',
		dataType:'html',
		crossDomain:false,
		beforeSend:function(){
			//$('#loading_default').show();
		},
		complete:function(){
			//$('#loading_default').hide(200);
		},
		error:function(){
			alert('Đã xảy ra lỗi khi thực hiện.Vui lòng thực hiện lại...!');
		},
		cache:false
	});
});