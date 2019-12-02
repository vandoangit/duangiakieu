/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

function BrowseServer(startupPath,functionData){

	var finder=new CKFinder();
	finder.basePath='./';
	finder.startupPath=startupPath;
	finder.selectActionFunction=SetFileField;
	finder.selectActionData=functionData;
	finder.selectThumbnailActionFunction=ShowThumbnails;
	finder.popup();
}

function SetFileField(fileUrl,data){

	var str="/upload/";
	document.getElementById(data["selectActionData"]).value=fileUrl.substring(str.length,fileUrl.length);
}

function ShowThumbnails(fileUrl,data){

	var sFileName=this.getSelectedFile().name;
	document.getElementById('thumbnails').innerHTML+=
			'<div class="thumb">' +
			'<img src="' + fileUrl + '" />' +
			'<div class="caption">' +
			'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
			'</div>' +
			'</div>';

	document.getElementById('preview').style.display="";

	return false;
}