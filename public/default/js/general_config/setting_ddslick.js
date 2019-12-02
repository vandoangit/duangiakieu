/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

$(window).load(function(){

	$('#select_city_search_box').ddslick({
		width:'125px',
		height:null,
		background:'#FFF',
		selectText:'',
		imagePosition:'left',
		showSelectedHTML:false,
		defaultSelectedIndex:null,
		truncateDescription:true,
		onSelected:function(data){
			//callback function: do something with selectedData;
		},
		keepJSONItemsOnTop:false
	});
});