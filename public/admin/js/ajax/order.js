/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/
$$(document).ready(function(){

	$$("#content").delegate(".add_product_into_order","click",function(){

		this_selector_insert=this;

		var string_html="<div>";
		string_html+="<form action='' method='post' name='form_ajax' id='form_ajax'>";
		string_html+="<ul class='ul_content_add'>";
		string_html+="<li style='overflow:hidden;line-height:35px;'>";
		string_html+="<label style='float:left;font-size:12px;color:#2E6E9E;font-weight:bold;width:105px;line-height:35px;text-align:right;padding-right:10px;'>" + lang['order_detail_code'] + "</label>";
		string_html+="<input name='txt_order_detail_code' id='txt_order_detail_code' type='text' value='' style='width:200px;height:20px;margin-right:20px;' />";
		string_html+="</li>";
		string_html+="<li style='overflow:hidden;line-height:35px;'>";
		string_html+="<label style='float:left;font-size:12px;color:#2E6E9E;font-weight:bold;width:105px;line-height:35px;text-align:right;padding-right:10px;'>" + lang['order_detail_number'] + "</label>";
		string_html+="<input name='txt_order_detail_number' id='txt_order_detail_number' type='text' value='' style='width:200px;height:20px;margin-right:20px;' />";
		string_html+="</li>";
		string_html+="<li style='overflow:hidden;line-height:35px;'>";
		string_html+="<div id='ajax_add_to_cart'>&nbsp;</div>";
		string_html+="</li>";
		string_html+="</ul>";
		string_html+="</form>";
		string_html+="</div>";

		var html=$$(string_html);

		$$.lightbox(html,{
			width:350,
			height:110
		});

		return false;
	});

	$$('#content .ajax_select_filter').ajax_select_filter($$('#hidden_input_menu_class').val() + '/control/');
	$$('#content').ajax_delete_item('#content a.ajax_delete_item',$$('#hidden_input_menu_class').val() + '/delete/');


	$$('#content').ajax_detail_order('#data_tables_sort tbody tr:not(div.innerDetails table tr)',$$('#hidden_input_menu_class').val() + '/order_detail/');
	$$('#content').ajax_update_order_input('#content div.ajax_update_order_detail_number_input');
	$$('#content').ajax_update_order_detail_total("#content input.ajax_update_order",$$('#hidden_input_menu_class').val() + '/update_order_detail_total/');
	$$('body').ajax_add_to_cart('#ajax_add_to_cart',$$('#hidden_input_menu_class').val() + '/insert_order_detail/');
	$$.ajax_add_to_cart_enter('#ajax_add_to_cart',$$('#hidden_input_menu_class').val() + '/insert_order_detail/');
	$$('#content').ajax_delete_order_detail('#content a.ajax_delete_order_detail',$$('#hidden_input_menu_class').val() + '/delete_order_detail/');
});