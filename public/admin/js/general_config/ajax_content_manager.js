/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

var data_tables;
var data_tables_aoColumnDefs=[];
var anOpen=[];
var this_selector_insert=false;

(function($){

	$.data_tables_config_sort=function(){

		$.fn.dataTableExt.afnSortData['dom-div']=function(oSettings,iColumn){
			var aData=[];
			$('td:eq(' + iColumn + ') div',oSettings.oApi._fnGetTrNodes(oSettings)).each(function(){
				aData.push($(this).html());
			});
			return aData;
		};

		$.fn.dataTableExt.afnSortData['dom-div-public']=function(oSettings,iColumn){
			var aData=[];
			$('td:eq(' + iColumn + ') div',oSettings.oApi._fnGetTrNodes(oSettings)).each(function(){
				aData.push($(this).attr('class'));
			});
			return aData;
		};

		$.fn.dataTableExt.afnSortData['dom-div-date']=function(oSettings,iColumn){
			var aData=[];
			$('td:eq(' + iColumn + ') div',oSettings.oApi._fnGetTrNodes(oSettings)).each(function(){
				var string_html=$(this).html();
				string_html=string_html.replace(/\s/gi,'');
				var arr_string_html=string_html.split("-");
				var string_year=arr_string_html[2].substr(0,4);
				var string_month=(arr_string_html[1].length == 1) ? '0' + arr_string_html[1] : arr_string_html[1];
				var string_date=(arr_string_html[0].length == 1) ? '0' + arr_string_html[0] : arr_string_html[0];
				string_html=string_year + string_month + string_date;
				aData.push(string_html);
			});
			return aData;
		};

		jQuery.fn.dataTableExt.oSort['numeric-comma-asc']=function(a,b){
			var x=(a == "-") ? 0 : a.replace(/,/,".");
			var y=(b == "-") ? 0 : b.replace(/,/,".");
			x=parseFloat(x);
			y=parseFloat(y);
			return ((x < y) ? -1 : ((x > y) ? 1 : 0));
		};

		jQuery.fn.dataTableExt.oSort['numeric-comma-desc']=function(a,b){
			var x=(a == "-") ? 0 : a.replace(/,/,".");
			var y=(b == "-") ? 0 : b.replace(/,/,".");
			x=parseFloat(x);
			y=parseFloat(y);
			return ((x < y) ? 1 : ((x > y) ? -1 : 0));
		};
	};

	$.ajax_add_to_cart_enter=function(elements_selector,url_process){

		$(document).keypress(function(event){
			var key;
			if(window.event)
				key=window.event.keyCode;
			else
				key=event.which;
			if((key == 13) && ($$("#form_ajax").attr('name') != undefined))
				$$(this).trigger("enter");
		}).on("enter",function(){
			var order_detail_code=$('#txt_order_detail_code').val();
			var order_detail_number=parseInt($('#txt_order_detail_number').val());

			var reg_product_id=/^([-a-zA-Z0-9_-])+$/i;
			if(!reg_product_id.test($('#txt_order_detail_code').val())){

				$('#txt_order_detail_code').focus();
				alert(lang['message_order_detail_code']);
				return false;
			}

			var reg_product_quantity=/^[1-9][0-9]*$/i;
			if(!reg_product_quantity.test($('#txt_order_detail_number').val())){

				$('#txt_order_detail_number').focus();
				alert(lang['message_order_detail_number']);
				return false;
			}

			var order_id=$(this_selector_insert).attr('insert_param');
			$.ajax({
				url:base_url_root_admin + url_process + order_id + '/' + order_detail_code + '/' + order_detail_number + '/',
				success:function(string){

					if(string == 'insert_faild')
						alert(lang['message_insert_faild_order']);

					else if(string == 'error_order_detail_code')
						alert(lang['message_order_detail_code']);

					else if(string == 'error_order_detail_number')
						alert(lang['message_order_detail_number']);

					else if(string != ''){

						$(this_selector_insert).closest('div.innerDetails').html(string);
						$.lightbox().close();
						alert(lang['message_insert_success_order']);
					}
					else
						alert(lang['messeage_no_login']);
				}
			});
		});
	};


	$.extend($.fn,{
		data_table_custom:function(options){

			var defaults={
				/*
				 "aaData":[
				 ['Value Row 11', 'Value Row 12', 'Value Row 13, 'Value Row 14'],
				 ['Value Row 21', 'Value Row 22', 'Value Row 23, 'Value Row 24'],
				 ],
				 Them du lieu cho bang theo dung dong
				 */
				"aaSorting":[[0,"asc"]],
				/*
				 "aaSortingFixed": [[0,'asc']],
				 Cot sap xep mac dinh
				 */
				"aLengthMenu":[
					[5,10,15,20,25,30,35,40,45,50,-1],
					[5,10,15,20,25,30,35,40,45,50,"All"]
				],
				"asStripeClasses":['even','odd'],
				"bAutoWidth":false,
				"bDeferRender":true,//Chua biet su dung trong ajax
				"bDestroy":true,//Cai dat lai table
				"bFilter":true,
				"bInfo":true,
				"bJQueryUI":true,
				"bLengthChange":true,
				"bPaginate":true,
				"bProcessing":true,
				/*
				 "bRetrieve":true,
				 Xoa cac cai dat cu di
				 */
				"bScrollAutoCss":false,
				"bScrollCollapse":false,
				"bSort":true,
				"bSortCellsTop":true,//Chua biet
				"bSortClasses":true,
				"bStateSave":true,
				"sPaginationType":"full_numbers",
				"aoColumnDefs":data_tables_aoColumnDefs,
				"oLanguage":data_tables_oLanguage
			};

			$.tooltip_content_admin();
			$('.lightbox_admin').lightbox();

			var options=$.extend(defaults,options);
			data_tables=$(this).dataTable(options);
		},
		ajax_detail_order:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){
					if($(this).find('div.innerDetails').attr('class') != undefined)
						return;

					var param_order_id=($(this).attr('param_order_id') != undefined) ? $(this).attr('param_order_id') : -1;
					var nTr=this;
					var i=$.inArray(nTr,anOpen);
					var oData=data_tables.fnGetData(nTr);

					$(nTr).removeClass('row_selected');
					if(i == -1){

						$('div.details_open_close',nTr).removeClass('details_open');
						$('div.details_open_close',nTr).addClass('details_close');

						$.ajax({
							url:base_url_root_admin + url_process + param_order_id + '/',
							success:function(string){
								if(string != ''){

									string="<div class='innerDetails' style='display:none' align='center'>" + string + "</div>";
									var nDetailsRow=data_tables.fnOpen(nTr,string,'details');
									if(nDetailsRow != undefined){

										nDetailsRow.className+=' ' + nTr.className;
										$('div.innerDetails',nDetailsRow).slideDown();
										anOpen.push(nTr);
									}
								}
								else
									alert(lang['messeage_no_login']);
							}
						});
					}
					else{

						$('div.details_open_close',nTr).removeClass('details_close');
						$('div.details_open_close',nTr).addClass('details_open');

						$('div.innerDetails',$(nTr).next()[0]).slideUp(function(){
							data_tables.fnClose(nTr);
							anOpen.splice(i,1);
						});
					}

				});
			});
		},
		ajax_update_order_detail_total:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"blur",function(){
					var this_selector=$(this);
					var value=parseInt(this_selector.val());

					var reg_mumber=/^[1-9][0-9]*$/i;
					if(!reg_mumber.test(this_selector.val())){

						this_selector.focus();
						alert(lang['message_update_order_detail_number']);
					}
					else{

						var param_update_order_detail_number=this_selector.parent().attr('update_order_detail_number_param');
						$.ajax({
							url:base_url_root_admin + url_process + param_update_order_detail_number + '/' + value + '/',
							success:function(string){
								if(string == 'is_numeric'){

									this_selector.focus();
									alert(lang['message_update_order_detail_number']);
								}
								else if(string == ''){

									this_selector.focus();
									alert(lang['messeage_no_login']);
								}
								else if(string == 'update_faild'){

									this_selector.focus();
									alert(lang['message_update_faild']);
								}
								else{

									var arr_string=string.split('hominhtri');
									this_selector.closest('div.innerDetails').find('span.ajax_order_total_price').html(arr_string[2]);
									this_selector.closest('tr').find('div.ajax_order_detail_total_price').html(arr_string[1]);
									this_selector.closest('td div').html(arr_string[0]);
								}
							}
						});
					}
				});
			});
		},
		ajax_add_to_cart:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){

					var order_detail_code=$('#txt_order_detail_code').val();
					var order_detail_number=parseInt($('#txt_order_detail_number').val());

					var reg_product_id=/^([-a-zA-Z0-9_-])+$/i;
					if(!reg_product_id.test($('#txt_order_detail_code').val())){

						$('#txt_order_detail_code').focus();
						alert(lang['message_order_detail_code']);
						return false;
					}

					var reg_product_quantity=/^[1-9][0-9]*$/i;
					if(!reg_product_quantity.test($('#txt_order_detail_number').val())){

						$('#txt_order_detail_number').focus();
						alert(lang['message_order_detail_number']);
						return false;
					}

					var order_id=$(this_selector_insert).attr('insert_param');
					$.ajax({
						url:base_url_root_admin + url_process + order_id + '/' + order_detail_code + '/' + order_detail_number + '/',
						success:function(string){

							if(string == 'insert_faild')
								alert(lang['message_insert_faild_order']);

							else if(string == 'error_order_detail_code')
								alert(lang['message_insert_faild_order']);

							else if(string == 'error_order_detail_number')
								alert(lang['message_order_detail_number']);

							else if(string != ''){

								$(this_selector_insert).closest('div.innerDetails').html(string);
								$.lightbox().close();
								alert(lang['message_insert_success_order']);
							}
							else
								alert(lang['messeage_no_login']);
						}
					});
				});
			});
		},
		ajax_delete_order_detail:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){
					var this_selector=$(this);
					var param_delete=this_selector.attr('delete_param');

					if(confirm(lang['message_delete_item'])){

						$.ajax({
							url:base_url_root_admin + url_process + param_delete + '/',
							success:function(string){

								if(string == 'delete_faild')
									alert(lang['message_delete_faild']);
								else if(string != ''){

									this_selector.closest('div.innerDetails').html(string);
									alert(lang['message_delete_success']);
								}
								else
									alert(lang['messeage_no_login']);
							}
						});
					}
				});
			});
		},
		ajax_select_filter:function(url_process){

			return this.each(function(){
				$(this).change(function(){
					$.ajax({
						url:base_url_root_admin + url_process + $(this).children().filter(':selected').attr('value') + '/',
						success:function(string){

							if(data_tables != null)
								data_tables.fnClearTable();

							$('#data_tables_sort').children('tbody').html(string);
							$("#data_tables_sort").data_table_custom();
						}
					});
				});
			});
		},
		ajax_delete_item:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){
					var select_filter_id=$('#content select.ajax_select_filter option:selected').attr('value');
					//Truong hop danh cho cac control k co select
					if(select_filter_id == null){

						select_filter_id='all';
					}
					var param_delete=$(this).attr('delete_param');

					if(confirm(lang['message_delete_item'])){

						$.ajax({
							url:base_url_root_admin + url_process + select_filter_id + '/' + param_delete + '/',
							success:function(string){

								if(string == 'delete_faild')
									alert(lang['message_delete_faild']);
								else if(string != ''){

									if(data_tables != null)
										data_tables.fnClearTable();

									$('#data_tables_sort').children('tbody').html(string);
									$("#data_tables_sort").data_table_custom();
									alert(lang['message_delete_success']);
								}
								else
									alert(lang['messeage_no_login']);
							}
						});
					}
				});
			});
		},
		ajax_update_order_input:function(elements_selector){

			return this.each(function(){
				$(this).delegate(elements_selector,"dblclick",function(){
					var selector_this=$(this).filter(function(index){
						return $(this).find(':input').attr('class') == undefined;
					});

					var value=parseInt(selector_this.text());
					var string="<input name='txt_update_order' id='txt_update_order' type='text' value='" + value + "' class='ajax_update_order'/>";
					selector_this.html(string);
					selector_this.children().focus();
				});
			});
		},
		ajax_update_order:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"blur",function(){
					var this_selector=$(this);
					var value=parseInt(this_selector.val());

					var reg_mumber=/^([\-+])?[0-9]+$/i;
					if(!reg_mumber.test(this_selector.val())){

						this_selector.focus();
						alert(lang['message_update_order']);
					}
					else{

						var param_update_order=this_selector.parent().attr('update_order_param');
						$.ajax({
							url:base_url_root_admin + url_process + param_update_order + '/' + value + '/',
							success:function(string){
								if(string == 'is_numeric'){

									this_selector.focus();
									alert(lang['message_update_order']);
								}
								else if(string == ''){

									this_selector.focus();
									alert(lang['messeage_no_login']);
								}
								else if(string == 'update_faild'){

									this_selector.focus();
									alert(lang['message_update_faild']);
								}
								else
									this_selector.parent().html(string);
							}
						});
					}
				});
			});
		},
		ajax_update_public:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){
					var this_selector=$(this);
					var param_update_public=this_selector.attr('update_public_param');
					$.ajax({
						url:base_url_root_admin + url_process + param_update_public + '/',
						success:function(string){
							if(string == 1){

								this_selector.removeClass('ajax_public_no').addClass('ajax_public_yes');
							}
							else if(string == 0){

								this_selector.removeClass('ajax_public_yes').addClass('ajax_public_no');
							}
							else if(string == 'update_faild')
								alert(lang['message_update_faild']);
							else
								alert(lang['messeage_no_login']);

						}
					});
				});
			});
		},
		ajax_update_prominent:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){
					var this_selector=$(this);
					var param_update_prominent=this_selector.attr('update_prominent_param');
					$.ajax({
						url:base_url_root_admin + url_process + param_update_prominent + '/',
						success:function(string){
							if(string == 1){

								this_selector.removeClass('ajax_prominent_no').addClass('ajax_prominent_yes');
							}
							else if(string == 0){

								this_selector.removeClass('ajax_prominent_yes').addClass('ajax_prominent_no');
							}
							else if(string == 'update_faild')
								alert(lang['message_update_faild']);
							else
								alert(lang['messeage_no_login']);

						}
					});
				});
			});
		},
		ajax_update_active:function(elements_selector,url_process){

			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){
					var this_selector=$(this);
					var param_update_active=this_selector.attr('update_active_param');
					$.ajax({
						url:base_url_root_admin + url_process + param_update_active + '/',
						success:function(string){
							if(string == 1){

								//$(elements_selector).removeClass('ajax_active').addClass('ajax_inactive');

								$(elements_selector).filter(function(index){

									if($(this).attr('cate_id') == this_selector.attr('cate_id'))
										return true;
									else
										return false;

								}).removeClass('ajax_active').addClass('ajax_inactive');

								this_selector.removeClass('ajax_inactive').addClass('ajax_active');
							}
							else if(string == 0){

								this_selector.removeClass('ajax_active').addClass('ajax_inactive');
							}
							else if(string == 'update_faild')
								alert(lang['message_update_faild']);
							else
								alert(lang['messeage_no_login']);
						}
					});
				});
			});
		}
	})
})(jQuery);

$$.data_tables_config_sort();