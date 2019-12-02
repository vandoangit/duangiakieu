/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

(function($){

	$.ajax_login=function(url_process){

		if($("#members_login_ajax").length){

			var form_post_data=[{
					name:'1e17df4793bf819608c5849576ae5d8a',
					value:'false'
				},
				{
					name:'ajax_member_login',
					value:'true'
				}];
			$.ajax({
				data:form_post_data,
				url:base_url_root + url_process,
				success:function(result_data){
					$("#members_login_ajax").html(result_data);
				}
			});
		}
	};

	$.extend($.fn,{
		ajax_logout:function(elements_selector,url_process){

			return this.each(function(){

				$(this).delegate(elements_selector,"click",function(){

					$.ajax({
						url:base_url_root + url_process,
						success:function(result_data){

							window.location.href=window.location.href;
						}
					});
				});
			});
		},
		ajax_reset_register:function(elements_selector){

			return this.each(function(){

				$(this).delegate(elements_selector,"click",function(){

					$("#form_member_register").find(':input:not(.member_no_clear)').each(function(){

						switch(this.type){

							case 'password':
							case 'select-multiple':
							case 'select-one':
							case 'text':
							case 'textarea':
								$(this).val('');
								break;
							case 'checkbox':
								this.checked=false;
						}
					});
				});
			});
		},
		ajax_reset_update:function(elements_selector){

			return this.each(function(){

				$(this).delegate(elements_selector,"click",function(){

					$("#form_member_update").find(':input:not(.member_no_clear)').each(function(){

						switch(this.type){

							case 'password':
							case 'select-multiple':
							case 'select-one':
							case 'text':
							case 'textarea':
								$(this).val('');
								break;
							case 'checkbox':
								this.checked=false;
						}
					});
				});
			});
		},
		////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////


		ajax_form_register:function(elements_selector,url_process){

			return this.each(function(){

				$(this).delegate(elements_selector,"click",function(){

					$.ajax({
						data:"1e17df4793bf819608c5849576ae5d8a=false&ajax_member_register=true",
						url:base_url_root + url_process,
						success:function(result_data){

							if(result_data != ""){

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
				});
			});
		},
		ajax_form_update:function(elements_selector,url_process){

			return this.each(function(){

				$(this).delegate(elements_selector,"click",function(){

					$.ajax({
						data:"1e17df4793bf819608c5849576ae5d8a=false&ajax_member_update=true",
						url:base_url_root + url_process,
						success:function(result_data){

							if(result_data != ""){

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
				});
			});
		},
		ajax_reset_register_ajax:function(elements_selector){

			return this.each(function(){

				$(this).delegate(elements_selector,"click",function(){

					$("#form_member_register_ajax").find(':input:not(.member_no_clear)').each(function(){

						switch(this.type){

							case 'password':
							case 'select-multiple':
							case 'select-one':
							case 'text':
							case 'textarea':
								$(this).val('');
								break;
							case 'checkbox':
								this.checked=false;
						}
					});
				});
			});
		},
		ajax_reset_update_ajax:function(elements_selector){

			return this.each(function(){

				$(this).delegate(elements_selector,"click",function(){

					$("#form_member_update_ajax").find(':input:not(.member_no_clear)').each(function(){

						switch(this.type){

							case 'password':
							case 'select-multiple':
							case 'select-one':
							case 'text':
							case 'textarea':
								$(this).val('');
								break;
							case 'checkbox':
								this.checked=false;
						}
					});
				});
			});
		},
		ajax_close:function(elements_selector){

			return this.each(function(){

				$(this).delegate(elements_selector,"click",function(){

					$("#member_ajax").hide("slow").remove();
				});
			});
		},
		ajax_close_mouseup:function(){

			return this.each(function(){

				$(this).mouseup(function(obj_mouseup){

					var selector_current=$(obj_mouseup.target).attr('id');
					var selector_current_class=$(obj_mouseup.target).attr('class') ? $(obj_mouseup.target).attr('class') : 'hominhtri';
					var selector_member_register=$(obj_mouseup.target).parents('#member_ajax').length;
					var selector_datepicker=$(obj_mouseup.target).parents('#ui-datepicker-div').length;
					var selector_formerror=$(obj_mouseup.target).parents('.formError').length;

					if(!(selector_current == 'ui-datepicker-div' || selector_current_class.search(/formError/i) != -1 || selector_member_register > 0 || selector_datepicker > 0 || selector_formerror > 0)){

						$("#member_ajax").hide("slow").remove();
					}
				});
			});
		},
		////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////


		ajax_reset_membership_register:function(elements_selector){

			return this.each(function(){

				$(this).delegate(elements_selector,"click",function(){

					$("#form_membership_register").find(':input:not(.member_no_clear)').each(function(){

						switch(this.type){

							case 'password':
							case 'select-multiple':
							case 'select-one':
							case 'text':
							case 'textarea':
								$(this).val('');
								break;
							case 'checkbox':
								this.checked=false;
						}
					});
				});
			});
		},
		ajax_reset_membership_update:function(elements_selector){

			return this.each(function(){

				$(this).delegate(elements_selector,"click",function(){

					$("#form_membership_update").find(':input:not(.member_no_clear)').each(function(){

						switch(this.type){

							case 'password':
							case 'select-multiple':
							case 'select-one':
							case 'text':
							case 'textarea':
								$(this).val('');
								break;
							case 'checkbox':
								this.checked=false;
						}
					});
				});
			});
		},
		ajax_reset_membership_register_ajax:function(elements_selector){

			return this.each(function(){

				$(this).delegate(elements_selector,"click",function(){

					$("#form_membership_register_ajax").find(':input:not(.member_no_clear)').each(function(){

						switch(this.type){

							case 'password':
							case 'select-multiple':
							case 'select-one':
							case 'text':
							case 'textarea':
								$(this).val('');
								break;
							case 'checkbox':
								this.checked=false;
						}
					});
				});
			});
		},
		ajax_reset_membership_update_ajax:function(elements_selector){

			return this.each(function(){

				$(this).delegate(elements_selector,"click",function(){

					$("#form_membership_update_ajax").find(':input:not(.member_no_clear)').each(function(){

						switch(this.type){

							case 'password':
							case 'select-multiple':
							case 'select-one':
							case 'text':
							case 'textarea':
								$(this).val('');
								break;
							case 'checkbox':
								this.checked=false;
						}
					});
				});
			});
		}
	})
})(jQuery);