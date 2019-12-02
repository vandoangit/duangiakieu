/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

var lang=Array();
var data_tables_oLanguage=Array();

/*--------------------------------- Genneral ---------------------------------*/
lang['messeage_no_login']='Please login again to you can perform tasks...!';
lang['messeage_unchecked']='You are unchecked item...!';
lang['message_delete_all']='Are you sure you want to delete the item selected ?';
lang['message_delete_item']='Do you want to delete the item this?';

lang['message_delete_faild']='You do not have permission to delete this item...!';
lang['message_delete_success']='Delete was successful...!';

lang['message_update_order']='Input character must be a number...!';
lang['message_update_faild']='Update was failed.Please login again to you can update data...!';

/*------------------------------- Order Detail -------------------------------*/
lang['order_detail_code']='Product ID';
lang['order_detail_number']='Quantity';

lang['message_order_detail_code']='Product ID entered is invalid...!';
lang['message_order_detail_number']='Quantity entered is invalid...!';
lang['message_insert_success_order']='Add Order was successful...!';
lang['message_insert_faild_order']='Add Order was failed.Please check your Product ID...!';
lang['message_update_order_detail_number']='Quantity is a positive integer...!';

/*--------------------------------- DATE TIME --------------------------------*/
lang['Sunday']="Sunday";
lang['Monday']="Monday";
lang['Tuesday']="Tuesday";
lang['Wednesday']="Wednesday";
lang['Thursday']="Thursday";
lang['Friday']="Friday";
lang['Saturday']="Saturday";

data_tables_oLanguage={
	"oAria":{
		"sSortAscending":" - click/return to sort ascending",
		"sSortDescending":" - click/return to sort descending"
	},
	"oPaginate":{
		"sFirst":"First",
		"sLast":"Last",
		"sNext":"Next",
		"sPrevious":"Previous"
	},
	"sEmptyTable":"No data available in table...!",
	"sInfo":"Showing _START_ to _END_ of _TOTAL_ entries",
	"sInfoEmpty":"Showing 0 to 0 of 0 entries",
	"sInfoFiltered":" (filtered from _MAX_ total entries)",
	"sInfoPostFix":"",
	"sInfoThousands":"'",
	"sLengthMenu":"Display:&nbsp;&nbsp; _MENU_ &nbsp;entries",
	"sLoadingRecords":"Please wait - loading...!",
	"sProcessing":"Server is currently busy.Please wait loading...!",
	"sSearch":"Search:&nbsp;",
	"sZeroRecords":"Nothing found - sorry...!"
};

//Your registration has been successfully completed.