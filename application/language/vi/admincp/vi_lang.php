<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 28-07-2015
	Copyright :Hồ Minh Trí
	
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');

/*===============================TABLE DATABASE ==============================*/

/*-------------------------------- Table Card --------------------------------*/
$lang['card_barcode']                       ="Mã Vạch - Barcode";
$lang['card_uid']                           ="Mã Số Vật Lý";
$lang['card_serial']                        ="Mã Số Thẻ";
$lang['card_version']                       ="Phiên Bản";
$lang['card_issue_date']                    ="Ngày Phát Hành";
$lang['card_email']                         ="Địa Chỉ Email";

/*-------------------------------Table User-----------------------------------*/
$lang['info_user']                          ="Thông Tin User";
$lang['user_account']                       ="Tài khoản";
$lang['user_pass']                          ="Mật khẩu";
$lang['confirm_user_pass']                  ="Xác nhận mật khẩu";
$lang['user_pass_old']                      ="Mật khẩu cũ";
$lang['user_name']                          ="Họ tên";
$lang['user_gender']                        ="Giới tính";
$lang['user_birthday']                      ="Ngày sinh";
$lang['user_email']                         ="Địa Chỉ Email";
$lang['user_phone']                         ="Số Điện thoại";
$lang['user_address']                       ="Địa chỉ";
$lang['user_web']                           ="Website";
$lang['user_directory']                     ="Tên Thư Mục";
$lang['user_img']                           ="Hình";
$lang['user_fax']                           ="Fax";
$lang['user_last_login']                    ="Đăng Nhập Cuối";
$lang['user_create_date']                   ="Ngày Đăng Ký";
$lang['user_gender_male']                   ="Nam";
$lang['user_gender_female']                 ="Nữ";

/*-------------------------------Table User Group-----------------------------*/
$lang['info_user_group']                    ="Thông Tin User Group";
$lang['user_group_name']                    ="Tên Group";
$lang['user_group_detail']                  ="Chi tiết";
$lang['user_group_create_date']             ="Ngày Tạo";
$lang['user_group_update_date']             ="Ngày Cập Nhật";
$lang['user_group_id']                      ="#ID";

/*----------------------------- Table Membership -----------------------------*/
$lang['info_membership']                    ="Thông Tin Khách Hàng";
$lang['membership_email']                   ="Email";
$lang['membership_name']                    ="Họ Tên";
$lang['membership_gender']                  ="Giới Tính";
$lang['membership_birthday']                ="Ngày Sinh";
$lang['membership_phone']                   ="Điện Thoại";
$lang['membership_address']                 ="Địa Chỉ";
$lang['career_category']                    ="Nghề Nghiệp";
$lang['city_category']                      ="Tỉnh/Thành Phố";
$lang['district_category']                  ="Quận/Huyện";
$lang['membership_img']                     ="Hình";
$lang['membership_public']                  ="Hiển Thị";
$lang['membership_order']                   ="Sắp Xếp";
$lang['membership_create_date']             ="Ngày Tạo";
$lang['membership_update_date']             ="Ngày Cập Nhật";

/*------------------------------- Table Facebook -----------------------------*/
$lang['info_facebook']                      ="Thông Tin Ứng Dụng";
$lang['facebook_name']                      ="Tên Chương Trình";
$lang['facebook_user']                      ="Thành Viên";
$lang['facebook_theme']                     ="Giao Diện Facebook";
$lang['facebook_post_bool']                 ="Facbook Post";
$lang['facebook_post_message']              ="Nội Dung Tin";
$lang['facebook_post_url']                  ="URL Tin";
$lang['facebook_post_title']                ="Tiêu Đề Tin";
$lang['facebook_post_summary']              ="Mô Tả Tin";
$lang['facebook_post_image']                ="Hình Ảnh";
$lang['facebook_friend_bool']               ="Facebook Post Friend";
$lang['facebook_friend_id']                 ="Facebook ID";
$lang['facebook_friend_message']            ="Nội Dung Tin";
$lang['facebook_friend_url']                ="URL Tin";
$lang['facebook_friend_title']              ="Tiêu Đề Tin";
$lang['facebook_friend_summary']            ="Mô Tả Tin";
$lang['facebook_friend_image']              ="HÌnh Ảnh";
$lang['facebook_photo_bool']                ="Facebook Photo";
$lang['facebook_photo_message']             ="Nội Dung";
$lang['facebook_photo_image']               ="Hình Ảnh";
$lang['facebook_comment_bool']              ="Facebook Comment";
$lang['facebook_comment_id']                ="ID Comment";
$lang['facebook_comment_message']           ="Nội Dung Comment";
$lang['facebook_like_bool']                 ="Facebook Like";
$lang['facebook_like_id']                   ="ID Like";
$lang['facebook_like_fanface_bool']         ="Facebook Like Fanface";
$lang['facebook_like_fanface_id']           ="ID Fanface";
$lang['facebook_order']                     ="Sắp Xếp";
$lang['facebook_public']                    ="Hiển Thị";
$lang['facebook_create_date']               ="Ngày Tạo";
$lang['facebook_update_date']               ="Ngày Cập Nhật";

/*-------------------------------Table Category-------------------------------*/
$lang['info_category']                      ="Thông Tin Danh Mục";
$lang['info_attributes_product']            ="Thông Tin Thuộc Tính";
$lang['note_attributes_product']            ="Mục bên dưới để định nghĩa tên các thuộc tính của Sản phẩm thuộc Danh Mục này.";
$lang['add_attributes_product']             ="Thêm Thuộc Tính";
$lang['select_cate_root']                   ="Danh Mục Gốc";
$lang['cate_control_filter']                ="Danh Mục";
$lang['cate_name']                          ="Tên Danh Mục";
$lang['cate_sub_name']                      ="Tên Danh Mục";
$lang['cate_alias']							="URL Aliases";
$lang['cate_img']                           ="Hình Ảnh";
$lang['cate_public']                        ="Hiển Thị";
$lang['cate_order']                         ="Sắp Xếp";
$lang['cate_attributes_product']            ="Thuộc Tính";
$lang['cate_parent']                        ="Danh Mục Cha";
$lang['cate_seo_keyword']                   ="Từ Khóa";
$lang['cate_seo_description']               ="Mô Tả Từ Khóa";

/*-------------------------------Table Product--------------------------------*/
$lang['info_product']                       ="Thông Tin Sản Phẩm";
$lang['product_control_filter']             ="Loại Danh Mục";
$lang['add_image_product']                  ="Thêm Hình Ảnh";
$lang['no_attributes_product']              ="  <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Không tồn tại Mẫu Thông Tin Mô Tả Sản Phẩm vì các lí do sau:<div>
                                                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Bạn chưa chọn Danh Mục cho Sản Phẩm.Vui lòng chọn 'Danh Mục' cho Sản Phẩm<div>
                                                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 'Danh Mục' mà bạn chọn không có Thông Tin Mô Tả cho Sản Phẩm.<div>";//Su dung trong file product libraries
$lang['product_id']                         ="Product ID";
$lang['product_name']                       ="Tên Sản Phẩm";
$lang['product_alias']                      ="URL Aliases";
$lang['product_price']                      ="Giá: ";
$lang['product_price_old']                  ="Giá cũ: ";
$lang['product_color']                      ="Màu Sắc";
$lang['product_img']                        ="Hình Ảnh";
$lang['product_headline']                   ="Tóm tắt Sản Phẩm";
$lang['product_content']                    ="Chi Tiết Sản Phẩm";
$lang['product_pattern']                    ="Chèn Mẫu";
$lang['product_pattern_select']             ="Mặc Định";
$lang['product_pattern_update']             ="Cập Nhật";
$lang['product_prominent']                  ="Nổi Bật";
$lang['product_number']                     ="Số Lượng";
$lang['product_order']                      ="Sắp Xếp";
$lang['product_public']                     ="Hiển Thị";
$lang['product_buy']                        ="Đã Mua: ";
$lang['product_seo_keyword']                ="Từ Khóa";
$lang['product_seo_description']            ="Mô Tả Từ Khóa";
$lang['product_partner']                    ="Đối Tác";
$lang['product_application']                ="Ứng Dụng";

/*----------------------------Table Product Pattern---------------------------*/
$lang['info_product_pattern']               ="Thông Tin Mẫu Chi Tiết Sản Phẩm";
$lang['product_pattern_name']               ="Tên Mẫu";
$lang['product_pattern_content']            ="Nội Dung";
$lang['product_pattern_order']              ="Sắp Xếp";
$lang['product_pattern_create_date']        ="Ngày Tạo";
$lang['product_pattern_update_date']        ="Ngày Cập Nhật"; 

/*--------------------------------Table Introduce,News------------------------*/
$lang['info_news']                          ="Thông Tin";
$lang['news_control_filter']                ="Loại Danh Mục";
$lang['news_name']                          ="Tiêu Đề";
$lang['news_alias']                         ="URL Aliases";
$lang['news_headline']                      ="Tóm Tắt";
$lang['news_content']                       ="Nội Dung";
$lang['news_img']                           ="Hình Ảnh";
$lang['news_active']                        ="Kích Hoạt";
$lang['news_order']                         ="Sắp Xếp";
$lang['news_public']                        ="Hiển Thị";
$lang['news_author']                        ="Người Thay Đổi";
$lang['news_view']                          ="Số Lần Xem";
$lang['news_seo_keyword']                   ="Từ Khóa";
$lang['news_seo_description']               ="Mô Tả Từ Khóa";

/*-------------------------------Table Avertise-------------------------------*/ 	 	 	 	 	 	 	 	 	 	 
$lang['info_advertise']                     ="Thông Tin";
$lang['advertise_control_filter']           ="Vị Trí";
$lang['ad_name']                            ="Tên";
$lang['ad_img']                             ="Hình/Flash";
$lang['ad_link']                            ="Liên Kết";
$lang['ad_active']                          ="Kích Hoạt";
$lang['ad_order']                           ="Sắp Xếp";
$lang['ad_public']                          ="Hiển Thị";
$lang['cate_sub_name_ad']                   ="Vị Trí";

/*--------------------------------Table Video---------------------------------*/ 	 	 	 	 	 	 	 	 	 	 
$lang['info_video']                         ="Thông Tin";
$lang['video_control_filter']               ="Vị Trí";
$lang['video_name']                         ="Tên Video";
$lang['video_alias']						="URL Aliases";
$lang['video_file']                         ="File Video";
$lang['video_img']                          ="Hình";
$lang['video_description']                  ="Mô Tả";
$lang['video_active']                       ="Kích Hoạt";
$lang['video_order']                        ="Sắp Xếp";
$lang['video_public']                       ="Hiển Thị";
$lang['cate_sub_name_video']                ="Vị Trí";

/*--------------------------------Table Order---------------------------------*/
$lang['info_order']                         ="Thông Tin Đơn Đặt Hàng";
$lang['order_control_filter']               ="Phân Loại Hóa Đơn";
$lang['order_id']                           ="Mã Đơn Hàng";
$lang['order_name']                         ="Tên Khách Hàng";
$lang['order_address']                      ="Địa Chỉ Giao Hàng";
$lang['order_phone']                        ="Điện Thoại";
$lang['order_email']                        ="Email Khách Hàng";
$lang['cate_name_order']                    ="Trạng Thái";
$lang['order_total_price']                  ="Tổng Thành Tiền";
$lang['method_delivery_name']               ="Phương Thức Giao Hàng";
$lang['method_payment_id']                  ="Phương Thức Thanh Toán";
$lang['order_create_date']                  ="Ngày Đặt Hàng";
$lang['order_update_date']                  ="Ngày Cập Nhật";

/*-----------------------------Table Order Detail-----------------------------*/
$lang['info_order_detail']                  ="Đơn Đặt Hàng";
$lang['order_detail_id']                    ="Mã Chi Tiết Hóa Đơn";
$lang['order_detail_code']                  ="Mã Sản Phẩm";
$lang['order_detail_name']                  ="Tên Sản Phẩm";
$lang['order_detail_price']                 ="Giá";
$lang['order_detail_number']                ="Số Lượng";
$lang['order_detail_total_price']           ="Thành Tiền";

/*----------------------------Table Method Delivery---------------------------*/ 	 	 	 	 	 	 	 	
$lang['info_delivery']                      ="Thông Tin Phương Thức Giao Hàng(PTGH)";
$lang['delivery_name']                      ="PT Giao Hàng";
$lang['delivery_content']                   ="Mô Tả";
$lang['delivery_cost']                      ="Chi phí";
$lang['delivery_public']                    ="Hiển Thị";
$lang['delivery_order']                     ="Sắp Xếp";
$lang['delivery_create_date']               ="Ngày Tạo";
$lang['delivery_update_date']               ="Ngày Cập Nhật";

/*----------------------------Table Method Payment---------------------------*/  	 	 	 	 	 	 	 
$lang['info_payment']                       ="Thông Tin Phương Thức Thanh Toán(PTTT)";
$lang['payment_name']                       ="PT Thanh Toán";
$lang['payment_content']                    ="Mô tả";
$lang['payment_cost']                       ="Chi phí";
$lang['payment_public']                     ="Hiển Thị";
$lang['payment_order']                      ="Sắp Xếp";
$lang['payment_create_date']                ="Ngày Tạo";
$lang['payment_update_date']                ="Ngày Cập Nhật";

/*---------------------------------Table Menu---------------------------------*/
$lang['info_menu']                          ="Thông Tin Menu";
$lang['menu_name']                          ="Tên Menu";
$lang['menu_url']                           ="Đường Dẫn";
$lang['menu_public']                        ="Hiển Thị";
$lang['menu_order']                         ="Sắp Xếp";
 	 	 	 	 	
/*---------------------------------Table Support------------------------------*/
$lang['info_support']                       ="Thông Tin Hỗ Trợ";
$lang['support_control_filter']             ="Loại Hỗ Trợ";
$lang['support_name']                       ="Tên";
$lang['support_nick']                       ="Nick / Email / Phone";
$lang['support_info']                       ="Thông Tin";
$lang['support_public']                     ="Hiển Thị";
$lang['support_order']                      ="Sắp Xếp";
$lang['support_status']                     ="Trạng Thái";
$lang['support_type']                       ="Loại Hỗ Trợ";
$lang['support_create_date']                ="Ngày Tạo";

/*---------------------------------Table Weblink------------------------------*/
$lang['info_weblink']                       ="Thông Tin Liên Kết";
$lang['weblink_control_filter']             ="Loại Liên Kết";
$lang['link_name']                          ="Tên Liên Kết";
$lang['link_url']                           ="Đường Dẫn Liên Kết";
$lang['link_public']                        ="Hiển Thị";
$lang['link_order']                         ="Sắp Xếp";
$lang['cate_sub_name_weblink']				="Loại Liên Kết";

/*------------------------------Table Application-----------------------------*/
$lang['info_application']                   ="Thông Tin Ứng Dụng";
$lang['application_control_filter']         ="Loại Ứng Dụng";
$lang['application_name']                   ="Tên Ứng Dụng";
$lang['application_alias']					="URL Aliases";
$lang['application_public']                 ="Hiển Thị";
$lang['application_order']                  ="Sắp Xếp";
$lang['application_update_date']            ="Ngày Tạo";

/*---------------------------------Table Partner------------------------------*/
$lang['info_partner']                       ="Thông Tin Đối Tác";
$lang['partner_control_filter']             ="Loại Đối Tác";
$lang['partner_name']                       ="Tên Đối Tác";
$lang['partner_alias']						="URL Aliases";
$lang['partner_url']                        ="URL Web";
$lang['partner_img']                        ="Hình ảnh";
$lang['partner_info']                       ="Thông Tin Đối Tác";
$lang['partner_public']                     ="Hiển Thị";
$lang['partner_order']                      ="Sắp Xếp";
$lang['cate_sub_name_partner']              ="Loại Đối Tác";

/*---------------------------------Table Utility------------------------------*/
$lang['info_utility']                       ="Thông Tin Tiện Ích";
$lang['utility_name']                       ="Tên Tiện Ích";
$lang['utility_url']                        ="URL Web";
$lang['utility_img']                        ="Hình ảnh";
$lang['utility_public']                     ="Hiển Thị";
$lang['utility_order']                      ="Sắp Xếp";

/*---------------------------------Table Comment------------------------------*/
$lang['info_comment']                       ="Thông Tin Ý Kiến";
$lang['comment_control_filter']             ="Lọc Ý Kiến";
$lang['comment_product_news']               ="Mã";
$lang['comment_name']                       ="Họ Tên";
$lang['comment_email']                      ="Email";
$lang['comment_title']                      ="Tiêu Đề";
$lang['comment_content']                    ="Nội Dung";
$lang['comment_surf']                       ="Duyệt";
$lang['comment_public']                     ="Hiển Thị";
$lang['comment_type']                       ="Loại";

/*---------------------------------Table Province-----------------------------*/
$lang['info_province']                      ="Thông Tin Tỉnh Thành";
$lang['province_control_filter']            ="Lọc Tỉnh Thành";						
$lang['province_id']                        ="ID";
$lang['province_name']                      ="Tên Tỉnh Thành";
$lang['province_public']                    ="Hiển Thị";
$lang['province_order']                     ="Sắp Xếp";
$lang['province_lang']                      ="Ngôn Ngữ";
$lang['province_create_date']               ="Ngày Tạo";
$lang['province_update_date']               ="Ngày Cập Nhật";

/*---------------------------------Table District-----------------------------*/
$lang['info_district']                      ="Thông Tin Tỉnh Thành";
$lang['district_control_filter']            ="Lọc Tỉnh Thành";							
$lang['district_id']                        ="ID";
$lang['district_name']                      ="Tên Quận Huyện";
$lang['district_public']                    ="Hiển Thị";
$lang['district_order']                     ="Sắp Xếp";
$lang['district_create_date']               ="Ngày Tạo";
$lang['district_update_date']               ="Ngày Cập Nhật";

/*=============================MESSAGE VALIDATION ============================*/

/*-----------------------------------General----------------------------------*/
$lang['error_admin_email']                  ="<span class='message_admin_failed'> Địa chỉ email không hợp lệ.</span>";
$lang['error_admin_user_name']              ="<span class='message_admin_failed'> Tên của bạn không hợp lệ.</span>";
$lang['error_admin_date']                   ="<span class='message_admin_failed'> Ngày không hợp lệ.</span>";
$lang['error_admin_phone']                  ="<span class='message_admin_failed'> Số điện thoại không hợp lệ.</span>";
$lang['error_admin_custom_select']          ="<span class='message_admin_failed'> Chưa chọn danh mục.</span>";
$lang['error_admin_require']                ="<span class='message_admin_failed'> Bạn không được để trống mục này.</span>";
$lang['custom_only_number']                 ="<span class='message_admin_failed'> Chỉ được nhập số.</span>";

/*----------------------------------- User -----------------------------------*/
$lang['error_admin_account']                ="<span class='message_admin_failed'> Tài khoản không hợp lệ.</span>";
$lang['error_admin_account_register']       ="<span class='message_admin_failed'> Tài khoản không hợp lệ hoặc đã tồn tại.</span>";
$lang['error_admin_pass']                   ="<span class='message_admin_failed'> Mật khẩu không hợp lệ.</span>";
$lang['error_admin_password']               ="<span class='message_admin_failed'> Mật khẩu không đúng.</span>";
$lang['error_admin_confirm_pass']           ="<span class='message_admin_failed'> Mật khẩu xác nhận không chính xác.</span>";

/*------------------------------ User Group ----------------------------------*/
$lang['error_admin_user_group_name']        ="<span class='message_admin_failed'> Tên User Group không hợp lệ.</span>";

/*---------------------------------Product------------------------------------*/
$lang['error_admin_product_id']             ="<span class='message_admin_failed'>Mã Sản Phẩm không hợp lệ.</span>";

/*---------------------------------Support------------------------------------*/
$lang['error_admin_support_name']           ="<span class='message_admin_failed'> Tên không hợp lệ.</span>";
$lang['error_admin_support_nick']           ="<span class='message_admin_failed'> Nickname không hợp lệ.</span>";

/*==================================ACTION ===================================*/
$lang['option_select']                      ="..... Chọn .....";
$lang['option_select_all']                  ="..... Tất cả .....";
$lang['action_save']                        ="Lưu";
$lang['action_add']                         ="Thêm";
$lang['action_delete']                      ="Xóa";
$lang['action_update']                      ="Sửa";
$lang['action_authorization']               ="Phân Quyền";
$lang['action_back']                        ="Quay Lại";
$lang['authorization_add']                  ="Thêm Quyền";
$lang['button_image']                       ="Hình";
$lang['button_video']                       ="Video";
$lang['admin_public']                       ="Hiện";
$lang['admin_hidden']                       ="Ẩn";
$lang['admin_active']                       ="Có";
$lang['admin_inactive']                     ="Không";

/*================================MESSAGE ACTION =============================*/

/*---------------------------------Checked------------------------------------*/
$lang['home_message_unchecked']             ="Bạn chưa check vào các item...!";

/*---------------------------Undefined Type File------------------------------*/
$lang['message_undefined_type_file']        ="Hệ thống không hỗ trợ loại file này...!";

/*-----------------------------------Add--------------------------------------*/
$lang['message_add_success']                ="Thêm thành công...!";
$lang['message_add_faild']                  ="Thêm thất bại...!";

/*---------------------------------Delete-------------------------------------*/
$lang['home_message_delete_all']            ="Bạn có chắc muốn xóa các item đã chọn không?";
$lang['message_delete_all_success']         ="Xóa thành công..!";//Can thay doi
$lang['message_delete_all_faild']           ="Xóa thất bại..!";

/*---------------------------------Update-------------------------------------*/
$lang['message_update_success']             ="Cập nhật thành công..!";
$lang['message_update_faild']               ="Cập nhật thất bại..!";

/*---------------------------------Authorization------------------------------*/
$lang['message_authorization_success']      ="Group đã được thêm vào thành công...!";
$lang['message_authorization_faild']        ="User đã tồn tại trong Group này...!";

$lang['message_authorization_success1']     ="Quyền này đã được thêm vào thành công ...!";
$lang['message_authorization_faild1']       ="Quyền này đã tồn tại trong group...!";

/*========================AUTHORIZTION ALERT==================================*/

/*----------------------------------User--------------------------------------*/
$lang['alert_authorization_change_user']                ="Bạn không có quyền truy cập vào trang Đổi Mật Khẩu...!";
$lang['alert_authorization_manager_user']               ="Bạn không có quyền truy cập vào trang Quản Lí User...!";
$lang['alert_authorization_add_user']                   ="Bạn không có quyền truy cập vào trang Thêm User...!";
$lang['alert_authorization_delete_user']                ="Bạn không có quyền truy cập vào trang Xóa User...!";
$lang['alert_authorization_update_user']                ="Bạn không có quyền truy cập vào trang Cập Nhật User...!";
$lang['alert_authorization_author_user']                ="Bạn không có quyền truy cập vào trang Phân Quyền User...!";

/*---------------------------------User Group---------------------------------*/
$lang['alert_authorization_manager_user_group']         ="Bạn không có quyền truy cập vào trang Quản Lí User Group...!";
$lang['alert_authorization_add_user_group']             ="Bạn không có quyền truy cập vào trang Thêm User Group...!";
$lang['alert_authorization_delete_user_group']          ="Bạn không có quyền truy cập vào trang Xóa User Group...!";
$lang['alert_authorization_update_user_group']          ="Bạn không có quyền truy cập vào trang Cập Nhật User Group...!";
$lang['alert_authorization_author_user_group']          ="Bạn không có quyền truy cập vào trang PHân Quyền User Group...!";

/*----------------------------------Facebook----------------------------------*/
$lang['alert_authorization_manager_facebook']           ="Bạn không có quyền truy cập vào trang Quản Lí Ứng Dụng Facebook...!";
$lang['alert_authorization_add_facebook']               ="Bạn không có quyền truy cập vào trang Thêm Ứng Dụng Facebook...!";
$lang['alert_authorization_delete_facebook']            ="Bạn không có quyền truy cập vào trang Xóa Ứng Dụng Facebook...!";
$lang['alert_authorization_update_facebook']            ="Bạn không có quyền truy cập vào trang Cập Nhật Ứng Dụng Facebook...!";

/*----------------------------------Category----------------------------------*/
$lang['alert_authorization_manager_category']           ="Bạn không có quyền truy cập vào trang Quản Lí Danh Mục...!";
$lang['alert_authorization_add_category']               ="Bạn không có quyền truy cập vào trang Thêm Danh Mục...!";
$lang['alert_authorization_delete_category']            ="Bạn không có quyền truy cập vào trang Xóa Danh Mục...!";
$lang['alert_authorization_update_category']            ="Bạn không có quyền truy cập vào trang Cập Nhật Danh Mục...!";

/*----------------------------------Product----------------------------------*/
$lang['alert_authorization_manager_product']            ="Bạn không có quyền truy cập vào trang Quản Lí Sản Phẩm...!";
$lang['alert_authorization_add_product']                ="Bạn không có quyền truy cập vào trang Thêm Sản Phẩm...!";
$lang['alert_authorization_delete_product']             ="Bạn không có quyền truy cập vào trang Xóa Sản Phẩm...!";
$lang['alert_authorization_update_product']             ="Bạn không có quyền truy cập vào trang Cập Nhật Sản Phẩm...!";

/*-------------------------------Product Pattern------------------------------*/
$lang['alert_authorization_manager_product_pattern']    ="Bạn không có quyền truy cập vào trang Quản Lí Mẫu Chi Tiết Sản Phẩm...!";
$lang['alert_authorization_add_product_pattern']        ="Bạn không có quyền truy cập vào trang Thêm Mẫu Chi Tiết Sản Phẩm...!";
$lang['alert_authorization_delete_product_pattern']     ="Bạn không có quyền truy cập vào trang Xóa Mẫu Chi Tiết Sản Phẩm...!";
$lang['alert_authorization_update_product_pattern']     ="Bạn không có quyền truy cập vào trang Cập Nhật Mẫu Chi Tiết Sản Phẩm...!";

/*------------------------------Introduct News--------------------------------*/
$lang['alert_authorization_manager_news']               ="Bạn không có quyền truy cập vào trang Quản Lí Tin Tức...!";
$lang['alert_authorization_add_news']                   ="Bạn không có quyền truy cập vào trang Thêm Tin Tức...!";
$lang['alert_authorization_delete_news']                ="Bạn không có quyền truy cập vào trang Xóa Tin Tức...!";
$lang['alert_authorization_update_news']                ="Bạn không có quyền truy cập vào trang Cập Nhật Tin Tức...!";

/*---------------------------------Advertise----------------------------------*/
$lang['alert_authorization_manager_advertise']          ="Bạn không có quyền truy cập vào trang Quản Lí Quảng Cáo...!";
$lang['alert_authorization_add_advertise']              ="Bạn không có quyền truy cập vào trang Thêm Quảng Cáo...!";
$lang['alert_authorization_delete_advertise']           ="Bạn không có quyền truy cập vào trang Xóa Quảng Cáo...!";
$lang['alert_authorization_update_advertise']           ="Bạn không có quyền truy cập vào trang Cập Nhật Quảng Cáo...!";

/*-----------------------------------Video------------------------------------*/
$lang['alert_authorization_manager_video']              ="Bạn không có quyền truy cập vào trang Quản Lí Video...!";
$lang['alert_authorization_add_video']                  ="Bạn không có quyền truy cập vào trang Thêm Video...!";
$lang['alert_authorization_delete_video']               ="Bạn không có quyền truy cập vào trang Xóa Video...!";
$lang['alert_authorization_update_video']               ="Bạn không có quyền truy cập vào trang Cập Nhật Video...!";

/*-----------------------------------Order------------------------------------*/
$lang['alert_authorization_manager_order']              ="Bạn không có quyền truy cập vào trang Quản Lí Đơn Đặt Hàng...!";
$lang['alert_authorization_add_order']                  ="Bạn không có quyền truy cập vào trang Thêm Đơn Đặt Hàng...!";
$lang['alert_authorization_delete_order']               ="Bạn không có quyền truy cập vào trang Xóa Đơn Đặt Hàng...!";
$lang['alert_authorization_update_order']               ="Bạn không có quyền truy cập vào trang Cập Nhật Đơn Đặt Hàng...!";

/*------------------------------Method Delivery-------------------------------*/
$lang['alert_authorization_manager_delivery']           ="Bạn không có quyền truy cập vào trang Quản Lí P.Thức Giao Hàng...!";
$lang['alert_authorization_add_delivery']               ="Bạn không có quyền truy cập vào trang Thêm P.Thức Giao Hàng...!";
$lang['alert_authorization_delete_delivery']            ="Bạn không có quyền truy cập vào trang Xóa P.Thức Giao Hàng...!";
$lang['alert_authorization_update_delivery']            ="Bạn không có quyền truy cập vào trang Cập Nhật P.Thức Giao Hàng...!";

/*-------------------------------Method Payment-------------------------------*/
$lang['alert_authorization_manager_payment']            ="Bạn không có quyền truy cập vào trang Quản Lí P.Thức Thanh Toán...!";
$lang['alert_authorization_add_payment']                ="Bạn không có quyền truy cập vào trang Thêm P.Thức Thanh Toán...!";
$lang['alert_authorization_delete_payment']             ="Bạn không có quyền truy cập vào trang Xóa P.Thức Thanh Toán...!";
$lang['alert_authorization_update_payment']             ="Bạn không có quyền truy cập vào trang Cập Nhật P.Thức Thanh Toán...!";

/*---------------------------------Menu---------------------------------------*/
$lang['alert_authorization_manager_menu']               ="Bạn không có quyền truy cập vào trang Quản Lí Menu...!";
$lang['alert_authorization_add_menu']                   ="Bạn không có quyền truy cập vào trang Thêm Menu...!";
$lang['alert_authorization_delete_menu']                ="Bạn không có quyền truy cập vào trang Xóa Menu...!";
$lang['alert_authorization_update_menu']                ="Bạn không có quyền truy cập vào trang Cập Nhật Menu...!";

/*---------------------------------Support------------------------------------*/
$lang['alert_authorization_manager_support']            ="Bạn không có quyền truy cập vào trang Quản Lí Hỗ Trợ...!";
$lang['alert_authorization_add_support']                ="Bạn không có quyền truy cập vào trang Thêm Hỗ Trợ...!";
$lang['alert_authorization_delete_support']             ="Bạn không có quyền truy cập vào trang Xóa Hỗ Trợ...!";
$lang['alert_authorization_update_support']             ="Bạn không có quyền truy cập vào trang Cập Nhật Hỗ Trợ...!";

/*--------------------------------Weblink-------------------------------------*/
$lang['alert_authorization_manager_weblink']            ="Bạn không có quyền truy cập vào trang Quản Lí Liên Kết...!";
$lang['alert_authorization_add_weblink']                ="Bạn không có quyền truy cập vào trang Thêm Liên Kết...!";
$lang['alert_authorization_delete_weblink']             ="Bạn không có quyền truy cập vào trang Xóa Liên Kết...!";
$lang['alert_authorization_update_weblink']             ="Bạn không có quyền truy cập vào trang Cập Nhật Liên Kết...!";

/*---------------------------------Application--------------------------------*/
$lang['alert_authorization_manager_application']        ="Bạn không có quyền truy cập vào trang Quản Lí Ứng Dụng...!";
$lang['alert_authorization_add_application']            ="Bạn không có quyền truy cập vào trang Thêm Ứng Dụng...!";
$lang['alert_authorization_delete_application']         ="Bạn không có quyền truy cập vào trang Xóa Ứng Dụng...!";
$lang['alert_authorization_update_application']         ="Bạn không có quyền truy cập vào trang Cập Nhật Ứng Dụng...!";

/*--------------------------------Partner-------------------------------------*/
$lang['alert_authorization_manager_partner']            ="Bạn không có quyền truy cập vào trang Quản Lí Đối Tác...!";
$lang['alert_authorization_add_partner']                ="Bạn không có quyền truy cập vào trang Thêm Đối Tác...!";
$lang['alert_authorization_delete_partner']             ="Bạn không có quyền truy cập vào trang Xóa Đối Tác...!";
$lang['alert_authorization_update_partner']             ="Bạn không có quyền truy cập vào trang Cập Nhật Đối Tác...!";

/*--------------------------------Utility-------------------------------------*/
$lang['alert_authorization_manager_utility']            ="Bạn không có quyền truy cập vào trang Quản Lí Tiện Ích...!";
$lang['alert_authorization_add_utility']                ="Bạn không có quyền truy cập vào trang Thêm Tiện Ích...!";
$lang['alert_authorization_delete_utility']             ="Bạn không có quyền truy cập vào trang Xóa Tiện Ích...!";
$lang['alert_authorization_update_utility']             ="Bạn không có quyền truy cập vào trang Cập Nhật Tiện Ích...!";

/*--------------------------------Comment-------------------------------------*/
$lang['alert_authorization_manager_comment']            ="Bạn không có quyền truy cập vào trang Quản Lí Ý Kiến...!";
$lang['alert_authorization_add_comment']                ="Bạn không có quyền truy cập vào trang Thêm Ý Kiến...!";
$lang['alert_authorization_delete_comment']             ="Bạn không có quyền truy cập vào trang Xóa Ý Kiến...!";
$lang['alert_authorization_update_comment']             ="Bạn không có quyền truy cập vào trang Cập Nhật Ý Kiến...!";

/*--------------------------------Province------------------------------------*/
$lang['alert_authorization_manager_province']           ="Bạn không có quyền truy cập vào trang Quản Lí Tỉnh Thành...!";
$lang['alert_authorization_add_province']               ="Bạn không có quyền truy cập vào trang Thêm Tỉnh Thành...!";
$lang['alert_authorization_delete_province']            ="Bạn không có quyền truy cập vào trang Xóa Tỉnh Thành...!";
$lang['alert_authorization_update_province']            ="Bạn không có quyền truy cập vào trang Cập Nhật Tỉnh Thành...!";

/*--------------------------------District------------------------------------*/
$lang['alert_authorization_manager_district']           ="Bạn không có quyền truy cập vào trang Quản Lí Quận Huyện...!";
$lang['alert_authorization_add_district']               ="Bạn không có quyền truy cập vào trang Thêm Quận Huyện...!";
$lang['alert_authorization_delete_district']            ="Bạn không có quyền truy cập vào trang Xóa Quận Huyện...!";
$lang['alert_authorization_update_district']            ="Bạn không có quyền truy cập vào trang Cập Nhật Quận Huyện...!";

/*===============================LOGIN ADMIN =================================*/

$lang['login_title']                        ="::. Đăng Nhập Administrator .::";
$lang['login_company']                      ="Bảng Điều Khiển";
$lang['login_welcome']                      ="Xin chào Administrator. Vui lòng đăng nhập:";
$lang['login_messages_authorization']       ="<span class='message_admin_failed'> Bạn không có quyền đăng nhập vào trang này...!</span>";
$lang['login_messages_user']                ="<span class='message_admin_failed'> Tài khoản hoặc mật khẩu không đúng...!</span>";
$lang['login_account']                      ="Tài khoản";
$lang['login_pass']                         ="Mật khẩu";
$lang['login_lang']                         ="Ngôn Ngữ";
$lang['login_lang_name1']                   ="Mặt Định";
$lang['login_lang_name2']                   ="Việt Nam";
$lang['login_lang_name3']                   ="English";
$lang['login_button']                       ="Đăng Nhập";
$lang['login_footer']                       ="<p class='copyright'> Bản Quyền &copy; 2012 - Thiết Kế Bởi: Hồ Minh Trí - <span style='color:#F00'>Liên hệ: 0976646401</span><br />Email: <a href='mailto:hominhtri.it@gmail.com'>hominhtri.it@gmail.com</a></p>";

/*============================HEADER ADMIN====================================*/

$lang['label_welcome_user']                 ="Xin chào : ";
/*
$lang['marquee_content_header']             ="Nếu gặp vấn đề khó khăn về phần quản trị ADMIN.Quí khách vui lòng gửi mail cho chúng tôi 
                                                    <strong style='color:#F00'>support@dangcapthuonghieu.com.vn</strong> hoặc gọi điện thoại
                                                    tới bộ phận hỗ trợ khách hàng <strong style='color:#F00'>(08) 3.83.11.622</strong> để được sự hỗ trợ tốt nhất";
*/
$lang['marquee_content_header']             ="Nếu gặp vấn đề khó khăn về phần quản trị ADMIN.Quí khách vui lòng gửi mail cho chúng tôi 
                                                    <strong style='color:#F00'>hominhtri.it@gmail.com</strong> hoặc gọi điện thoại
                                                    tới bộ phận hỗ trợ khách hàng <strong style='color:#F00'> 097.664.64.01 </strong> để được sự hỗ trợ tốt nhất";
$lang['visitsite_font_end']                 ="Xem Site";
$lang['exit_admin']                         ="Thoát";

/*============================CONTENT ADMIN===================================*/

/*-------------------------------USER CONTROL---------------------------------*/
$lang['user_control_filter']                ="Nhóm người dùng";
$lang['user_control_last_login']            ="Last Login";

/*------------------------------USER AUTHORIZATION----------------------------*/
$lang['user_authorization_info_user']       ="Thông Tin User";
$lang['user_authorization_info_add']        ="Thêm Group Cho User";
$lang['user_authorization_select_group']    ="User Group";

/*------------------------------GROUP AUTHORIZATION---------------------------*/
$lang['group_authorization_label']          ="Quyền Group";
$lang['group_authorization_info_group']     ="Thông Tin User Group";
$lang['group_authorization_info_add']       ="Thêm Quyền Cho User Group";
$lang['group_authorization_function']       ="Chức Năng Website";

/*-------------------------------SITE CONTROL---------------------------------*/
$lang['site_control_control']               ="Danh mục Menu";
$lang['site_control_last_login']            ="Đăng nhập cuối";
$lang['site_control_info_system']           ="Thông Tin Hệ Thống";
$lang['site_control_info_static']           ="Thống Kê";

$lang['site_control_php_version']           ="PHP Version";
$lang['site_control_http_host']             ="Http Host";
$lang['site_control_http_user_agent']       ="Http User Agent";
$lang['site_control_server_software']       ="Server Software";
$lang['site_control_server_addr']           ="Server Address IP";
$lang['site_control_remote_addr']           ="Remote Address IP";
$lang['site_control_max_execution_time']    ="Max Execution Time";
$lang['site_control_max_input_time']        ="Max Input Time";
$lang['site_control_memory_limit']          ="Memory Limit";
$lang['site_control_post_max_size']         ="Post Max Size";
$lang['site_control_upload_max_filesize']   ="Upload Max Filesize";
$lang['site_control_session_support']       ="Session Support";

$lang['site_control_static_online']         ="Đang Online";
$lang['site_control_static_today']          ="Hôm Nay";
$lang['site_control_static_yesterday']      ="Hôm Qua";
$lang['site_control_static_week']           ="Trong Tuần";
$lang['site_control_static_month']          ="Trong Tháng";
$lang['site_control_static_year']           ="Trong Năm";

/*-------------------------------SITE CONFIG----------------------------------*/
$lang['site_config_title_seo']              ="Từ khóa";
$lang['site_config_content_seo']            ="Nội dung";
$lang['site_config_title_page']             ="Phân Trang";
$lang['site_config_content_page']           ="Số Record / Trang";
$lang['site_config_content_facebook']		="Facebook";
$lang['site_config_content_static']         ="Truy Cập Website";

$lang['site_config_title_web']              ="Tiêu đề";
$lang['site_config_keyword_web']            ="Từ khóa";
$lang['site_config_description_web']        ="Mô tả";
$lang['site_config_abstract_web']           ="Tóm tắt";

$lang['site_config_admin_page']             ="Admin";
$lang['site_config_product_page']           ="Sản phẩm";
$lang['site_config_search_product_page']    ="Tìm kiếm sản phẩm";
$lang['site_config_news_page']              ="Tin tức";

$lang['site_config_facebook_user_id']		="Facebook User ID";
$lang['site_config_facebook_fanpage']		="Link Fanpage";

$lang['site_config_static_online_virtual']  ="Online Ảo";
$lang['site_config_static_count_virtual']   ="Số lượng Truy Cập Ảo";

$lang['site_config_footer_front_end']       ="Footer Front-end";

$lang['email_server_smtp']                  ="SMTP Server";
$lang['email_port_smtp']                    ="SMTP Port";
$lang['email_secure_smtp']                  ="SMTP Secure";
$lang['email_debug_smtp']                   ="SMTP Debug";
$lang['email_your_name']                    ="Tên";
$lang['email_email_smtp']                   ="Địa Chỉ Email";
$lang['email_pass_smtp']                    ="Mật khẩu";

/*============================FOOTER ADMIN====================================*/

$lang['footer_admin']                       ="<p class='copyright' style='font-weight:bold'> Copyright &copy; 2012 - Thiết kế bởi: Hồ Minh Trí - <span style='color:#F00'>Liên hệ: 0976646401</span><br />Email: <a  style='color:#FC0' href='mailto:hominhtri.it@gmail.com'>hominhtri.it@gmail.com</a></p>";