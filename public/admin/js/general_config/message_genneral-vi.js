/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

var lang=Array();
var data_tables_oLanguage=Array();

/*--------------------------------- Genneral ---------------------------------*/
lang['messeage_no_login']='Vui lòng đăng nhập lại để thực hiện thao tác...!';
lang['messeage_unchecked']='Bạn chưa check vào các item...!';
lang['message_delete_all']='Bạn có chắc muốn xóa các item đã chọn không?';
lang['message_delete_item']='Bạn có chắc muốn xóa item này không?';

lang['message_delete_faild']='Bạn không được phép xóa item này...!';
lang['message_delete_success']='Xóa thành công...!';

lang['message_update_order']='Ký tự nhập vào phải là số...!';
lang['message_update_faild']='Cập nhật không thành công.Vui lòng đăng nhập lại để có thể cập nhật dữ liệu...!';

/*-------------------------------- Order Detail ------------------------------*/
lang['order_detail_code']='Mã Sản Phẩm';
lang['order_detail_number']='Số Lượng';

lang['message_order_detail_code']='Mã Sản Phẩm không hợp lệ...!';
lang['message_order_detail_number']='Số Lượng không hợp lệ...!';
lang['message_insert_success_order']='Thêm thành công...!';
lang['message_insert_faild_order']='Thêm thất bại.Vui lòng kiểm tra lại Mã Sản Phẩm của bạn...!';
lang['message_update_order_detail_number']='Số lượng phải là số nguyên dương...!';

/*-------------------------------DATE TIME------------------------------------*/
lang['Sunday']="Chủ nhật";
lang['Monday']="Thứ 2";
lang['Tuesday']="Thứ 3";
lang['Wednesday']="Thứ 4";
lang['Thursday']="Thứ 5";
lang['Friday']="Thứ 6";
lang['Saturday']="Thứ 7";

data_tables_oLanguage={
	"oAria":{
		"sSortAscending":" - click/return to sort ascending",
		"sSortDescending":" - click/return to sort descending"
	},
	"oPaginate":{
		"sFirst":"Đầu",
		"sLast":"Cuối",
		"sNext":"Sau",
		"sPrevious":"Trước"
	},
	"sEmptyTable":"Không tồn tại dữ liệu của mục này...!",
	"sInfo":"Kết quả từ  _START_ đến _END_ trên _TOTAL_ entries",
	"sInfoEmpty":"Kết quả từ  0 đến 0 trên 0 entries",
	"sInfoFiltered":" (kết quả tìm kiếm từ _MAX_ entries)",
	"sInfoPostFix":"",
	"sInfoThousands":"'",
	"sLengthMenu":"Hiển Thị&nbsp;&nbsp;_MENU_&nbsp;entries",
	"sLoadingRecords":"Vui lòng chờ đợi...!",
	"sProcessing":"Server hiện tại đang bận.Vui lòng chờ đợi trong ít phút...!",
	"sSearch":"Tìm Kiếm:&nbsp;",
	"sZeroRecords":"Không tìm thấy dữ liệu...!"
};