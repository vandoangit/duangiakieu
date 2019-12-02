/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

(function($){

	$.extend($.fn,{
		ajax_pattern_detail_product:function(oEditor,url_process){

			return this.each(function(){
				$(this).change(function(){
					var product_id=($('#txt_product_id').attr('readonly') == undefined) ? "default" : $('#txt_product_id').val();
					$.ajax({
						url:base_url_root_admin + url_process + $(this).children().filter(':selected').attr('value') + '/' + product_id + '/',
						success:function(string){
							oEditor.setData(string);
						}
					});
				});
			});
		},
		ajax_add_image_product:function(){

			return this.each(function(){
				$(this).click(function(){
					var date=new Date();
					var hour=new String(date.getHours());
					hour=(hour.length == 1) ? '0' + hour : hour;
					var minute=new String(date.getMinutes());
					minute=(minute.length == 1) ? '0' + minute : minute;
					var second=new String(date.getSeconds());
					second=(second.length == 1) ? '0' + second : second;
					var millisecond=new String(date.getMilliseconds());
					var fifteenth=new Date();
					var sixteenth=fifteenth.getFullYear();
					var month=fifteenth.getMonth();
					var eighteenth=fifteenth.getDate();
					if(eighteenth < 10)
						eighteenth='0' + eighteenth;

					var second2=new Array('01','02','03','04','05','06','07','08','09','10','11','12');
					var currentNow=eighteenth + second2[month] + sixteenth + hour + minute + second + millisecond;

					var this_selector=$(this);
					var string_add="<li>   <label class='label_content_add'>" + this_selector.attr("name_image") + "</label>";
					string_add+="          <input name='txt_product_img[tri" + currentNow + "]' id='txt_product_img_tri" + currentNow + "' type='text' value='' class='input_text_add_browser'/>";
					string_add+="          <input onclick='BrowseServer(\"Images:/\",\"txt_product_img_tri" + currentNow + "\")' type='button' value='" + this_selector.attr("name_button_image") + "' class='input_button_img_browser' />";
					string_add+="           &nbsp;&nbsp;<input type='checkbox' name='input_check_browser[tri" + currentNow + "]' value='on' checked='checked' /></li>";
					this_selector.parent().before(string_add);
				});
			});
		},
		ajax_add_image_news:function(){

			return this.each(function(){
				$(this).click(function(){
					var date=new Date();
					var hour=new String(date.getHours());
					hour=(hour.length == 1) ? '0' + hour : hour;
					var minute=new String(date.getMinutes());
					minute=(minute.length == 1) ? '0' + minute : minute;
					var second=new String(date.getSeconds());
					second=(second.length == 1) ? '0' + second : second;
					var millisecond=new String(date.getMilliseconds());
					var fifteenth=new Date();
					var sixteenth=fifteenth.getFullYear();
					var month=fifteenth.getMonth();
					var eighteenth=fifteenth.getDate();
					if(eighteenth < 10)
						eighteenth='0' + eighteenth;

					var second2=new Array('01','02','03','04','05','06','07','08','09','10','11','12');
					var currentNow=eighteenth + second2[month] + sixteenth + hour + minute + second + millisecond;

					var this_selector=$(this);
					var string_add="<li>   <label class='label_content_add'>" + this_selector.attr("name_image") + "</label>";
					string_add+="          <input name='txt_news_img[tri" + currentNow + "]' id='txt_news_img_tri" + currentNow + "' type='text' value='' class='input_text_add_browser'/>";
					string_add+="          <input onclick='BrowseServer(\"Images:/\",\"txt_news_img_tri" + currentNow + "\")' type='button' value='" + this_selector.attr("name_button_image") + "' class='input_button_img_browser' />";
					string_add+="           &nbsp;&nbsp;<input type='checkbox' name='input_check_browser[tri" + currentNow + "]' value='on' checked='checked' /></li>";
					this_selector.parent().before(string_add);
				});
			});
		},
		ajax_support_nick:function(){

			return this.each(function(){
				$(this).change(function(){
					var support_type=parseInt($(this).children().filter(':selected').attr('value'));
					switch(support_type){
						case 1:
						case 2:
							$('#txt_support_nick').removeClass().addClass('validate[custom[custom_email]] input_text_add');
							break;

						case 3:
						case 4:
							$('#txt_support_nick').removeClass().addClass('validate[custom[custom_support_nick]] input_text_add');
							break;

						case 5:
						case 6:
							$('#txt_support_nick').removeClass().addClass('validate[custom[custom_support_nick]] input_text_add');
							break;

						case 7:
						case 8:
							$('#txt_support_nick').removeClass().addClass('validate[required] input_text_add');
							break;

						case 9:
						case 10:
							$('#txt_support_nick').removeClass().addClass('validate[custom[custom_email]] input_text_add');
							break;

						default:
							$('#txt_support_nick').removeClass().addClass('validate[custom[custom_email]] input_text_add');

					}
				});
			});
		},
		ajax_url_alias:function(elements_selector_return,url_process){

			return this.each(function(){

				$(this).change(function(){

					var alias_name=$(this).val();
					$.ajax({
						url:base_url_root_admin + url_process,
						data:'1e17df4793bf819608c5849576ae5d8a=false&alias_name=' + encodeURIComponent(alias_name),
						beforeSend:function(){
						},
						complete:function(){
						},
						success:function(string){
							$(elements_selector_return).val(string);
						}
					});
				});
			});
		}

	})
})(jQuery);