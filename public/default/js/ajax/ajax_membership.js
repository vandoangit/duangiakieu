/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

(function($){

	$.extend($.fn,{
		ajax_load_district:function(url_process){

			if($(this).length){

				var this_selector=$(this);
				var province_id=this_selector.find("option:selected").attr("value");

				$.ajax({
					data:'1e17df4793bf819608c5849576ae5d8a=false' + '&province_id=' + province_id,
					url:base_url_root + url_process,
					success:function(string){

						$(".remove_district",this_selector.parents("ul")).remove();
						this_selector.parents('li').after(string);
					}
				});
			}
		},
		ajax_load_district_change:function(elements_selector,url_process){

			return this.each(function(){

				$(this).delegate(elements_selector,"change",function(){

					$(this).ajax_load_district(url_process);
				});
			});
		}
	});
})(jQuery);


$(window).load(function(){

	$("#txt_province_category").ajax_load_district('membership/load_district/');
	$("#middle_content").ajax_load_district_change("#txt_province_category",'membership/load_district/');

	//Register
	$.ajax_captcha("#ajax_captcha_membership_register","captcha/membership/");
	$("#middle_content .membership_register").ajax_captcha_click("#ajax_captcha_membership_register",'captcha/membership/');

	$("#middle_content .membership_register").ajax_reset_membership_register("#button_reset_membership");

	//Register Ajax
	$.ajax_captcha("#ajax_captcha_membership_register_ajax","captcha/membership/");
	$("#middle_content").ajax_captcha_click("#ajax_captcha_membership_register_ajax",'captcha/membership/');

	$("#middle_content").ajax_reset_membership_register_ajax("#button_reset_membership_ajax");

	//Update
	$.ajax_captcha("#ajax_captcha_membership_update","captcha/membership/");
	$("#middle_content .membership_update").ajax_captcha_click("#ajax_captcha_membership_update",'captcha/membership/');

	$("#middle_content .membership_update").ajax_reset_membership_update("#button_reset_membership");

	//Card
	$.ajax_captcha("#ajax_captcha_membership_card","captcha/membership/");
	$("#middle_content .membership_card").ajax_captcha_click("#ajax_captcha_membership_card",'captcha/membership/');
});