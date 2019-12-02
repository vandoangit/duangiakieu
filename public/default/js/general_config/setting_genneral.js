/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

function currentTime(){

	var date=new Date();
	var hour=new String(date.getHours());
	hour=(hour.length == 1) ? '0' + hour : hour;
	var minute=new String(date.getMinutes());
	minute=(minute.length == 1) ? '0' + minute : minute;
	var second=new String(date.getSeconds());
	second=(second.length == 1) ? '0' + second : second;
	var currentNow=hour + minute;
	var fifteenth=new Date();
	var sixteenth=fifteenth.getFullYear();
	var seventeenth=fifteenth.getDay();
	var month=fifteenth.getMonth();
	var eighteenth=fifteenth.getDate();
	if(eighteenth < 10)
		eighteenth='0' + eighteenth;
	var first2=new Array(lang['Sunday'],lang['Monday'],lang['Tuesday'],lang['Wednesday'],lang['Thursday'],lang['Friday'],lang['Saturday']);
	var second2=new Array('01','02','03','04','05','06','07','08','09','10','11','12');
	currentNow="<span class='date_seventeenth'>" + first2[seventeenth] + ",</span><span class='date_day'>" + eighteenth + "-" + second2[month] + '-' + sixteenth + "</span><span class='date_hour'>" + hour + ":" + minute + ":" + second + "</span>";
	$("#datetime").html(currentNow);
	setTimeout("currentTime()",1000);
}
currentTime();