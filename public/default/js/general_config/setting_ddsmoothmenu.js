/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

ddsmoothmenu.init({
	mainmenuid:"menu_header",//Menu DIV id
	orientation:'h',//Horizontal or vertical menu: Set to "h" or "v"
	classname:'ddsmoothmenu',//class added to menu's outer DIV
	//customtheme     :["#804000", "#482400"],
	contentsource:"markup",//"markup" or ["container_id", "path_to_menu_file"]
	arrowimages:{
		down:['downarrowclass',base_url_root + "public/default/style/smooth_menu/images/down.gif",18],
		right:['rightarrowclass',base_url_root + "public/default/style/smooth_menu/images/right.gif",18]
	}
});

ddsmoothmenu.init({
	mainmenuid:"menu_left",//Menu DIV id
	orientation:'v',//Horizontal or vertical menu: Set to "h" or "v"
	classname:'ddsmoothmenu-v',//class added to menu's outer DIV
	//customtheme     :["#804000", "#482400"],
	contentsource:"markup",//"markup" or ["container_id", "path_to_menu_file"]
	arrowimages:{
		down:['downarrowclass',base_url_root + "public/default/style/smooth_menu/images/down.gif",10],
		right:['rightarrowclass',base_url_root + "public/default/style/smooth_menu/images/right.gif",10]
	}
});