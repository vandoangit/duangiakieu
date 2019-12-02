/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 *******************************************************************************/

function fullscreen(){

	setTimeout(function(){

		$('#body_content .fullscreen').fullscreen();
	},5000);
}

$(document).ready(function(){

	// open fullscreen
	$('#body_content .requestfullscreen').click(function(){

		$('#body_content .fullscreen').fullscreen();
		return false;
	});

	// exit fullscreen
	$('#body_content .exitfullscreen').click(function(){

		$.fullscreen.exit();
		return false;
	});

	if(!$.fullscreen.isNativelySupported()){

		$('#body_content .requestfullscreen').hide();
		$('#body_content .requestfullscreen').html("");
		$('#body_content .requestfullscreen').removeClass('requestfullscreen');
	}

	// document's event
	$(document).bind('fscreenchange',function(e,state,elem){

		// if we currently in fullscreen mode
		if($.fullscreen.isFullScreen()){

			$('#body_content .requestfullscreen').hide();
			$('#body_content .exitfullscreen').show();
		}
		else{

			$('#body_content .requestfullscreen').show();
			$('#body_content .exitfullscreen').hide();
		}
	});

});