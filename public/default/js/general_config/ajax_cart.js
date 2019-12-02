/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 28-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

(function($){

	$.extend($.fn,{
		ajax_add_cart:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){
					var this_selector=$(this);
					var param_product_id=this_selector.attr('param_add_cart');
					$.ajax({
						data:'1e17df4793bf819608c5849576ae5d8a=false' + '&product_id=' + param_product_id,
						url:base_url_root + url_process.replace(/\/$/i,"") + URL_SUFFIX,
						success:function(string){
							if(string == 'cart_error')
								alert(lang['message_cart_error']);
							else if(string == 'cart_insert_failed')
								alert(lang['message_insert_cart_failed']);
							else if(string != ""){
								window.location=string;
							}
						}
					});
				});
			});
		},
		ajax_update_quantity_input:function(elements_selector){

			return this.each(function(){
				$(this).delegate(elements_selector,"dblclick",function(){
					var selector_this=$(this).filter(function(index){
						return $(this).find(':input').attr('class') == undefined;
					});

					var value=parseInt(selector_this.text());
					var string="<input name='txt_update_quantity' id='txt_update_quantity' type='text' value='" + value + "' class='ajax_update_quantity'/>";
					selector_this.html(string);
					selector_this.children().focus();
				});
			});
		},
		ajax_update_quantity:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"blur",function(){
					var this_selector=$(this);
					var value=parseInt(this_selector.val());

					var reg_mumber=/^[1-9][0-9]*$/i;
					if(!reg_mumber.test(this_selector.val())){

						this_selector.focus();
						alert(lang['message_update_cart_quantity']);
					}
					else{

						var param_update_quantity=this_selector.parent().attr('update_quantity_param');
						$.ajax({
							url:base_url_root + url_process + param_update_quantity + '/' + value + URL_SUFFIX,
							success:function(string){
								if(string == 'quantity_numeric'){

									this_selector.focus();
									alert(lang['message_update_cart_quantity']);
								}
								else if(string == 'cart_update_failed'){
									this_selector.focus();
									alert(lang['message_update_cart_failed']);
								}
								else if(string == 'cart_error'){

									this_selector.focus();
									alert(lang['message_cart_sold_out']);
								}
								else if(string != ''){

									$("#module_cart_ajax_content").html(string);
								}
							}
						});
					}
				});
			});
		},
		ajax_delete_cart:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){
					var param_delete=$(this).attr('delete_param');

					if(confirm(lang['message_delete_item'])){

						$.ajax({
							url:base_url_root + url_process + param_delete.replace(/\/$/i,"") + URL_SUFFIX,
							success:function(string){
								if(string == 'cart_delete_failed')
									alert(lang['message_delete_cart_failed']);
								else if(string != ''){

									$("#module_cart_ajax_content").html(string);
								}
							}
						});
					}
				});
			});
		}

	})
})(jQuery);