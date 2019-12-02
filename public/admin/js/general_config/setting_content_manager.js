/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

(function($){
	$.extend($.fn,{
		bg_row_checked:function(elements_selector){
			return this.each(function(){
				$(this).delegate(elements_selector,"click",function(){

					var selector_this=$(this).filter(function(index){
						return $(this).find(':checkbox').attr('class') == undefined;
					}).parent();

					var selector_checked=selector_this.find(':checkbox');

					if(selector_checked.is(':checked')){

						selector_checked.removeAttr('checked');
						selector_this.removeClass("row_selected");
					}
					else{

						selector_checked.attr('checked','checked');
						selector_this.addClass("row_selected");
					}
				});
			});
		}

	})
})(jQuery);


$$(document).ready(function(){

	//#chkCheckAll,.chkCheck
	//.delete_items_menu,.chkCheck,#form_manager_content va file land javascript
	//.update_items_menu,.chkCheck,#form_manager_content,#hidden_input_update va file land javascript,base_url
	//.authorization_items_menu,.chkCheck,#form_manager_content,#hidden_input_authorization va file land javascript,base_url

	//Check all Manager
	$$("#chkCheckAll").click(function(){
		$$(".chkCheck").each(function(){
			//$$(this).attr('checked', $$("#chkCheckAll").attr('checked'));
			if($$("#chkCheckAll").is(':checked')){

				$$(this).attr('checked','checked');
				$$("#content table tr").addClass("row_selected");
			}
			else{

				$$(this).removeAttr('checked');
				$$("#content table tr").removeClass("row_selected");
			}
		});
	});

	$$("#content").bg_row_checked("#content table tr td");

	//Delete
	$$(".delete_items_menu").click(function(){
		var idList="";
		$$(".chkCheck").each(function(){
			if(($$(this).attr('checked') == true) || ($$(this).attr('checked') == 'checked'))
				idList+=$$(this).attr('id').replace('check_','') + ',';
		});

		idList+="0";

		if(idList == "0")
			alert(lang['messeage_unchecked']);
		else{

			var c=confirm(lang['message_delete_all']);
			if(c == true)
				$$("#form_manager_content").submit();
		}

	});

	//Edit
	$$(".update_items_menu").click(function(){

		var idList="";
		$$(".chkCheck").each(function(){
			if(($$(this).attr('checked') == true) || ($$(this).attr('checked') == 'checked'))
				idList+=$$(this).attr('id').replace('check_','') + ',';
		});

		idList+="0";

		if(idList == "0")
			alert(lang['messeage_unchecked']);
		else{

			idList=idList.split(",",1);
			document.location.href=base_url_root_admin + $$("#hidden_input_update").val() + "/" + idList;
		}
	});

	//Authorization
	$$(".authorization_items_menu").click(function(){
		var idList="";
		$$(".chkCheck").each(function(){
			if(($$(this).attr('checked') == true) || ($$(this).attr('checked') == 'checked'))
				idList+=$$(this).attr('id').replace('check_','') + ',';
		});

		idList+="0";

		if(idList == "0")
			alert(lang['messeage_unchecked']);
		else{

			idList=idList.split(",",1);
			document.location.href=base_url_root_admin + $$("#hidden_input_authorization").val() + "/" + idList;
		}
	});
});