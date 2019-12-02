/* * ***************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 * ************************************************************************** */


////////////////////////////////////////////////////////////////////////////////
/*============================ Function Count Down ===========================*/

/*
 Class:    	countDown
 Author:   	David Walsh
 Website:    http://davidwalsh.name
 Version:  	1.0.0
 Date:     	11/30/2008
 Built For:  jQuery 1.2.6
 */

jQuery.fn.countDown=function(settings,to){

	settings=jQuery.extend({
		startFontSize:'36px',
		endFontSize:'12px',
		duration:1000,
		startNumber:10,
		endNumber:0,
		callBack:function(){
		}
	},settings);

	return this.each(function(){

		//where do we start?
		if(!to && to != settings.endNumber){

			to=settings.startNumber;
		}

		//set the countdown to the starting number
		$(this).text(to).css('fontSize',settings.startFontSize);

		//loopage
		$(this).animate({
			'fontSize':settings.endFontSize
		},settings.duration,'',function(){

			if(to > settings.endNumber + 1){

				$(this).css('fontSize',settings.startFontSize).text(to - 1).countDown(settings,to - 1);
			}
			else{

				settings.callBack(this);
			}
		});
	});
};


////////////////////////////////////////////////////////////////////////////////
/*============================= Parameter Default ============================*/

if(typeof webcam_width == "undefined")
	var webcam_width=640;

if(typeof webcam_height == "undefined")
	var webcam_height=480;

if(typeof script_webcam_main == "undefined")
	var script_webcam_main="#webcam_default";

if(typeof webcam_change_camera_name == "undefined")
	var webcam_change_camera_name=".webcam_change_camera_name";

if(typeof webcam_change_microphone_name == "undefined")
	var webcam_change_microphone_name=".webcam_change_microphone_name";

if(typeof webcam_snapshot_field_button == "undefined")
	var webcam_snapshot_field_button=".webcam_snapshot_field_button";

if(typeof webcam_snapshot_image_button == "undefined")
	var webcam_snapshot_image_button=".webcam_snapshot_image_button";

if(typeof webcam_snapshot_field_value == "undefined")
	var webcam_snapshot_field_value=".webcam_snapshot_field_value";

if(typeof webcam_snapshot_image_value == "undefined")
	var webcam_snapshot_image_value=".webcam_snapshot_image_value";


////////////////////////////////////////////////////////////////////////////////
/*============================= Function Default =============================*/

// Popup Accept All Flash
function webcam_prompt_show(){

	alert("A security dialog will be shown. Please click 'Remember' and 'Allow'...!");
}

// Webcam Error  //chua
function webcam_on_error(errorId,errorMsg){

	if($(webcam_snapshot_field_button).length){

		$(webcam_snapshot_field_button).attr("disabled",true);
	}

	if($(webcam_snapshot_image_button).length){

		$(webcam_snapshot_image_button).attr("disabled",true);
	}

	alert(errorMsg);
}

// Event On Ready Webcam
function webcam_on_ready(cameraNames,camera,microphoneNames,microphone,volume){

	if($(webcam_change_camera_name).length){

		$.each(cameraNames,function(index,text){

			$(webcam_change_camera_name).append($('<option></option>').val(index).html(text));
		});

		$(webcam_change_camera_name).val(camera);
	}

	if($(webcam_change_microphone_name).length){

		$.each(microphoneNames,function(index,text){

			$(webcam_change_microphone_name).append($('<option></option>').val(index).html(text))
		});
		$(webcam_change_microphone_name).val(microphone);
	}
}

// Upload Image To Field Or Image
function upload_field_image(picture_base64){

	if($(webcam_snapshot_field_value).length)
		$(webcam_snapshot_field_value).val(picture_base64);

	if($(webcam_snapshot_image_value).length)
		$(webcam_snapshot_image_value).attr("src","data:image/png;base64," + picture_base64);
}


////////////////////////////////////////////////////////////////////////////////
/*=============================== Function Call ==============================*/

// Webcam Version
function webcam_current_version(option){

	var option_default={
		selector:'.webcam_current_version'
	}
	option_default=$.extend({},option_default,option);

	if($(option_default.selector).length)
		$(option_default.selector).html($.scriptcam.version());
	else
		alert("Chưa có 'Selector Current Version'");
}

// Wecam Change Camera
function webcam_change_camera(option){

	var option_default={
		selector:webcam_change_camera_name
	}
	option_default=$.extend({},option_default,option);

	if($(option_default.selector).length)
		$.scriptcam.changeCamera($(option_default.selector).val());
	else
		alert("Chưa có 'Selector Change Camera'");
}

// Wecam Change Microphone
function webcam_change_microphone(option){

	var option_default={
		selector:webcam_change_microphone_name
	}
	option_default=$.extend({},option_default,option);

	if($(option_default.selector).length)
		$.scriptcam.changeMicrophone($(option_default.selector).val());
	else
		alert("Chưa có 'Selector Change Microphone'");
}

// Wecam Snapshot Field
function webcam_snapshot_field(option){

	var option_default={
		selector:webcam_snapshot_field_value
	}
	option_default=$.extend({},option_default,option);

	if($(option_default.selector).length){

		$(option_default.selector).val($.scriptcam.getFrameAsBase64());
	}

	return $.scriptcam.getFrameAsBase64();
}

// Wecam Snapshot Image
function webcam_snapshot_image(option){

	var option_default={
		selector:webcam_snapshot_image_value
	}
	option_default=$.extend({},option_default,option);

	var audio=new Audio(base_url_root + "webcam/sound/capture_sound.mp3");
	audio.play();
	//play_sound(base_url_root + "webcam/sound/capture_sound.mp3");

	if($(option_default.selector).length){

		$(option_default.selector).attr("src","data:image/png;base64," + $.scriptcam.getFrameAsBase64());
	}

	return $.scriptcam.getFrameAsBase64();
}

// Play Sound MP3
function play_sound(url_file_mp3){

	$.scriptcam.playMP3(url_file_mp3);
}


////////////////////////////////////////////////////////////////////////////////
/*============================= Function Execute =============================*/

$(window).load(function(){

	if($(script_webcam_main).length){

		$(script_webcam_main).scriptcam({
			license:'',
			path:base_url_root + 'webcam/',
			width:webcam_width,
			height:webcam_height,
			noFlashFound:'<p><a href="http://www.adobe.com/go/getflashplayer"> Adobe Flash Player</a> 11.7 or greater is needed to use your webcam.</p>',
			promptWillShow:webcam_prompt_show,// Show Allow Flash
			cornerRadius:0,// Bo tron Scriptcam
			cornerColor:'FFFFFF',// Background Scriptcam
			zoom:1,
			rotate:0,
			showMicrophoneErrors:false,// Bo qua loi Microphone khi chua gan thiet bi (onError)
			onError:webcam_on_error,// Load web bi loi thiet bi
			disableHardwareAcceleration:true,// On Off sự kiện Webcam Ready
			onWebcamReady:webcam_on_ready,// Function gọi khi Webcam Ready
			//uploadImage:base_url_root + 'webcam/images/upload.gif',
			onPictureAsBase64:upload_field_image,
			//maskImage:base_url_root + 'webcam/images/mymask.png',     // Khung Hình Ảnh(Khung Hình,Logo........)
			useMicrophone:true,// Quay Webcam có âm thanh hay không
			hideMouse:false,// Ẩn Chuột Khi Di Chuyển Qua Video
			readBarCodes:'CODE_128,QR_CODE',
			country:'usa',
			showDebug:false
		});
	}
});
// Chưa có tham số Recording,Videochat,Volume,Effects,Motion