/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

function enter_submit(id_form_submit){

	$(document).keypress(function(event){

		var key;
		if(window.event)
			key=window.event.keyCode;     //IE
		else
			key=event.which;     //Firefox

		if(key == 13){

			if($(id_form_submit).attr('name') != undefined){

				$(id_form_submit).submit();
			}
		}
	});
}

$(window).load(function(){

	$("#form_member_login").submit(function(e){

		var form_post_data=$(this).serializeArray();
		var form_action_url=$(this).attr("action");

		form_post_data.push({
			name:'1e17df4793bf819608c5849576ae5d8a',
			value:'false'
		},
		{
			name:'ajax_member_login',
			value:'false'
		},
		{
			name:'submit_form',
			value:'true'
		});

		$.ajax({
			data:form_post_data,
			url:base_url_root + 'members/login_ajax/',
			success:function(result_data){

				if(result_data == 'login_success'){

					window.location.href=window.location.href;
				}
				else if(result_data != 'login_action'){

					$('#label_message_login').html(result_data).slideDown("slow");
					setTimeout(function(){
						$('#label_message_login').hide("slow").html('');
					},5000);
				}
			}
		});

		if(e.preventDefault)
			e.preventDefault(); //STOP default action

		if(e.unbind)
			e.unbind(); //unbind. to stop multiple form submit
	});

	$("#form_member_register").submit(function(e){

		var form_post_data=$(this).serializeArray();
		var form_action_url=$(this).attr("action");

		form_post_data.push({
			name:'1e17df4793bf819608c5849576ae5d8a',
			value:'false'
		},
		{
			name:'ajax_member_register',
			value:'false'
		});

		$.ajax({
			data:form_post_data,
			url:base_url_root + 'members/register/',
			success:function(result_data){

				if(result_data == 'register_success'){

					window.location=base_url_root;

					if(e.preventDefault)
						e.preventDefault();

					if(e.unbind)
						e.unbind();
				}
			}
		});
	});

	$("#form_member_update").submit(function(e){

		var form_post_data=$(this).serializeArray();
		var form_action_url=$(this).attr("action");

		form_post_data.push({
			name:'1e17df4793bf819608c5849576ae5d8a',
			value:'false'
		},
		{
			name:'ajax_member_update',
			value:'false'
		});

		$.ajax({
			data:form_post_data,
			url:base_url_root + 'members/update/',
			success:function(result_data){

				if(result_data == 'update_success'){

					window.location.href=window.location.href;

					if(e.preventDefault)
						e.preventDefault();

					if(e.unbind)
						e.unbind();
				}
			}
		});
	});


	////////////////////////////////////////////////////////////////////////////


	$('body').delegate("#form_member_login_ajax","submit",function(e){

		var form_post_data=$(this).serializeArray();
		var form_action_url=$(this).attr("action");

		form_post_data.push({
			name:'1e17df4793bf819608c5849576ae5d8a',
			value:'false'
		},
		{
			name:'ajax_member_login',
			value:'true'
		},
		{
			name:'submit_form',
			value:'true'
		});

		$.ajax({
			data:form_post_data,
			url:base_url_root + 'members/login_ajax/',
			success:function(result_data){

				$("#members_login_ajax").html(result_data);
			}
		});

		if(e.preventDefault)
			e.preventDefault();

		if(e.unbind)
			e.unbind();
	});

	$('body').delegate("#form_member_register_ajax","submit",function(e){

		var form_post_data=$(this).serializeArray();
		var form_action_url=$(this).attr("action");

		form_post_data.push({
			name:'1e17df4793bf819608c5849576ae5d8a',
			value:'false'
		},
		{
			name:'ajax_member_register',
			value:'true'
		});

		$.ajax({
			data:form_post_data,
			url:base_url_root + 'members/register/',
			success:function(result_data){

				if(result_data == 'register_success'){

					window.location.href=window.location.href;
				}
				else{

					$("#member_ajax").remove();
					$("body").append(result_data).slideDown("slow");

					$.ajax_captcha("#ajax_captcha_member_register_ajax","captcha/members/");

					$("#member_ajax input.input_datepicker").datepicker({
						showOtherMonths:true,
						selectOtherMonths:true,
						changeMonth:true,
						changeYear:true,
						dateFormat:"dd-mm-yy",
						nextText:"",
						prevText:"",
						showAnim:"show",
						onClose:function(dateText,inst){
							$(this).focus();
						}
					});
				}
			}
		});

		if(e.preventDefault)
			e.preventDefault();

		if(e.unbind)
			e.unbind();
	});

	$('body').delegate("#form_member_update_ajax","submit",function(e){

		var form_post_data=$(this).serializeArray();
		var form_action_url=$(this).attr("action");

		form_post_data.push({
			name:'1e17df4793bf819608c5849576ae5d8a',
			value:'false'
		},
		{
			name:'ajax_member_update',
			value:'true'
		});

		$.ajax({
			data:form_post_data,
			url:base_url_root + 'members/update/',
			success:function(result_data){

				if(result_data == 'update_success'){

					window.location.href=window.location.href;
				}
				else{

					$("#member_ajax").remove();
					$("body").append(result_data).slideDown("slow");

					$.ajax_captcha("#ajax_captcha_member_update_ajax","captcha/members/");

					$("#member_ajax input.input_datepicker").datepicker({
						showOtherMonths:true,
						selectOtherMonths:true,
						changeMonth:true,
						changeYear:true,
						dateFormat:"dd-mm-yy",
						nextText:"",
						prevText:"",
						showAnim:"show",
						onClose:function(dateText,inst){
							$(this).focus();
						}
					});
				}
			}
		});

		if(e.preventDefault)
			e.preventDefault();

		if(e.unbind)
			e.unbind();
	});


	////////////////////////////////////////////////////////////////////////////


	$("#form_membership_register").submit(function(e){

		var this_selector=$(this);
		var form_post_data=$(this).serializeArray();
		var form_action_url=$(this).attr("action");

		form_post_data.push({
			name:'1e17df4793bf819608c5849576ae5d8a',
			value:'false'
		});

		$.ajax({
			data:form_post_data,
			url:base_url_root + 'membership/register/',
			success:function(result_data){

				if(result_data == 'register_success'){

					this_selector.html("<br/><div class='message_successful'>" + lang['message_membership_register_success'] + "</div><br/><br/><br/>");

					setTimeout(function(){

						window.location=base_url_root;
					},5000);

					if(e.preventDefault)
						e.preventDefault();

					if(e.unbind)
						e.unbind();
				}
			}
		});
	});
});