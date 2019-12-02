<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 28-07-2015
	Copyright :Hồ Minh Trí
	
*******************************************************************************/

if (!defined('BASEPATH')) exit('No direct script access allowed');

/*===============================TABLE DATABASE ==============================*/

/*-------------------------------- Table Card --------------------------------*/
$lang['card_barcode']                       ="Barcode ID";
$lang['card_uid']                           ="Card UID";
$lang['card_serial']                        ="Card Serial";
$lang['card_version']                       ="Card Version";
$lang['card_issue_date']                    ="Issue Date";
$lang['card_email']                         ="Email";

/*-------------------------------Table User-----------------------------------*/
$lang['info_user']                          ="User Information";
$lang['user_account']                       ="UserName";
$lang['user_pass']                          ="Password";
$lang['confirm_user_pass']                  ="Confirm Password";
$lang['user_pass_old']                      ="Old Password";
$lang['user_name']                          ="Your Name";
$lang['user_gender']                        ="Gender";
$lang['user_birthday']                      ="Birthday";
$lang['user_email']                         ="Email Address";
$lang['user_phone']                         ="Phone Number";
$lang['user_address']                       ="Address";
$lang['user_web']                           ="Website";
$lang['user_directory']                     ="Directory Name";
$lang['user_img']                           ="Avata";
$lang['user_fax']                           ="Fax";
$lang['user_last_login']                    ="Last Login";
$lang['user_create_date']                   ="Register Date";
$lang['user_gender_male']                   ="Male";
$lang['user_gender_female']                 ="Female";

/*-------------------------------Table User Group-----------------------------*/
$lang['info_user_group']                    ="User Group Information";
$lang['user_group_name']                    ="Group Name";
$lang['user_group_detail']                  ="Detail Group";
$lang['user_group_create_date']             ="Create Date";
$lang['user_group_update_date']             ="Update Date";
$lang['user_group_id']                      ="#ID";

/*----------------------------- Table Membership -----------------------------*/
$lang['info_membership']                    ="Membership Information";
$lang['membership_email']                   ="Email";
$lang['membership_name']                    ="Your Name";
$lang['membership_gender']                  ="Gender";
$lang['membership_birthday']                ="Birthday";
$lang['membership_phone']                   ="Phone Number";
$lang['membership_address']                 ="Address";
$lang['career_category']                    ="Career";
$lang['city_category']                      ="City";
$lang['district_category']                  ="District";
$lang['membership_img']                     ="Image";
$lang['membership_public']                  ="Public";
$lang['membership_order']                   ="Order";
$lang['membership_create_date']             ="Create Date";
$lang['membership_update_date']             ="Update Date";

/*------------------------------- Table Facebook -----------------------------*/
$lang['info_facebook']                      ="Application Information";
$lang['facebook_name']                      ="Program Name";
$lang['facebook_user']                      ="User";
$lang['facebook_theme']                     ="Facebook Theme";
$lang['facebook_post_bool']                 ="Facbook Post";
$lang['facebook_post_message']              ="Message";
$lang['facebook_post_url']                  ="Message URL";
$lang['facebook_post_title']                ="Message Title";
$lang['facebook_post_summary']              ="Message Summary";
$lang['facebook_post_image']                ="Message Image";
$lang['facebook_friend_bool']               ="Facebook Post Friend";
$lang['facebook_friend_id']                 ="Facebook ID";
$lang['facebook_friend_message']            ="Message";
$lang['facebook_friend_url']                ="Message URL";
$lang['facebook_friend_title']              ="Message Title";
$lang['facebook_friend_summary']            ="Message Summary";
$lang['facebook_friend_image']              ="Message Image";
$lang['facebook_photo_bool']                ="Facebook Photo";
$lang['facebook_photo_message']             ="Message";
$lang['facebook_photo_image']               ="Image";
$lang['facebook_comment_bool']              ="Facebook Comment";
$lang['facebook_comment_id']                ="ID Comment";
$lang['facebook_comment_message']           ="Message Comment";
$lang['facebook_like_bool']                 ="Facebook Like";
$lang['facebook_like_id']                   ="ID Like";
$lang['facebook_like_fanface_bool']         ="Facebook Like Fanface";
$lang['facebook_like_fanface_id']           ="ID Fanface";
$lang['facebook_order']                     ="Order";
$lang['facebook_public']                    ="Public";
$lang['facebook_create_date']               ="Create Date";
$lang['facebook_update_date']               ="Update Date";

/*-------------------------------Table Category-------------------------------*/
$lang['info_category']                      ="Category Information";
$lang['info_attributes_product']            ="Product Attributes Information";
$lang['note_attributes_product']            ="Entries below to define the name of the product attributes in this list.";
$lang['add_attributes_product']             ="Add Attributes";
$lang['select_cate_root']                   ="Root Category";
$lang['cate_control_filter']                ="Category";
$lang['cate_name']                          ="Category Name";
$lang['cate_sub_name']                      ="Category Name";
$lang['cate_alias']							="URL Aliases";
$lang['cate_img']                           ="Image";
$lang['cate_public']                        ="Public";
$lang['cate_order']                         ="Order";
$lang['cate_attributes_product']            ="Property";
$lang['cate_parent']                        ="Parent Category";
$lang['cate_seo_keyword']                   ="Meta Keyword";
$lang['cate_seo_description']               ="Meta Description";

/*-------------------------------Table Product--------------------------------*/
$lang['info_product']                       ="Product Information";
$lang['product_control_filter']             ="Category Type";
$lang['add_image_product']                  ="Add Image";
$lang['no_attributes_product']              ="  <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Không tồn tại Mẫu Thông Tin Mô Tả Sản Phẩm vì các lí do sau:<div>
                                                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Bạn chưa chọn Danh Mục cho Sản Phẩm.Vui lòng chọn 'Danh Mục' cho Sản Phẩm<div>
                                                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 'Danh Mục' mà bạn chọn không có Thông Tin Mô Tả cho Sản Phẩm.<div>";//Su dung trong file product libraries
$lang['product_id']                         ="Product ID";
$lang['product_name']                       ="Product Name";
$lang['product_alias']                      ="URL Aliases";
$lang['product_price']                      ="Price";
$lang['product_price_old']                  ="Old Price";
$lang['product_color']                      ="Color";
$lang['product_img']                        ="Image";
$lang['product_headline']                   ="Product Description";
$lang['product_content']                    ="Product Details";
$lang['product_pattern']                    ="Insert Pattern";
$lang['product_pattern_select']             ="Default";
$lang['product_pattern_update']             ="Update";
$lang['product_prominent']                  ="Prominent";
$lang['product_number']                     ="Quantity";
$lang['product_order']                      ="Order";
$lang['product_public']                     ="Public";
$lang['product_buy']                        ="Purchased: ";
$lang['product_seo_keyword']                ="Meta Keyword";
$lang['product_seo_description']            ="Meta Description";
$lang['product_partner']                    ="Partner";
$lang['product_application']                ="Application";

/*----------------------------Table Product Pattern---------------------------*/
$lang['info_product_pattern']               ="Product Pattern Information";
$lang['product_pattern_name']               ="Name Pattern";
$lang['product_pattern_content']            ="Content Pattern";
$lang['product_pattern_order']              ="Order";
$lang['product_pattern_create_date']        ="Create Date";
$lang['product_pattern_update_date']        ="Update Date"; 	 	 	 	 	 	

/*------------------------------Table Introduce,News--------------------------*/
$lang['info_news']                          ="Information";
$lang['news_control_filter']                ="Category";
$lang['news_name']                          ="Title";
$lang['news_alias']                         ="URL Aliases";
$lang['news_headline']                      ="Description";
$lang['news_content']                       ="Content";
$lang['news_img']                           ="Image";
$lang['news_active']                        ="Active";
$lang['news_order']                         ="Order";
$lang['news_public']                        ="Public";
$lang['news_author']                        ="User Update";
$lang['news_view']                          ="Number view";
$lang['news_seo_keyword']                   ="Meta Key";
$lang['news_seo_description']               ="Meta Description";

/*-------------------------------Table Avertise-------------------------------*/	 	 	 	 	 	 	 	 	 	 
$lang['info_advertise']                     ="Information";
$lang['advertise_control_filter']           ="Position";
$lang['ad_name']                            ="Name";
$lang['ad_img']                             ="Image/Flash";
$lang['ad_link']                            ="Link AD";
$lang['ad_active']                          ="Active";
$lang['ad_order']                           ="Order";
$lang['ad_public']                          ="Public";
$lang['cate_sub_name_ad']                   ="Position";

/*--------------------------------Table Video---------------------------------*/ 	 	 	 	 	 	 	 	 	 	 
$lang['info_video']                         ="Video Information";
$lang['video_control_filter']               ="Position";
$lang['video_name']                         ="Video Name";
$lang['video_alias']						="URL Aliases";
$lang['video_file']                         ="Video File";
$lang['video_img']                          ="Image";
$lang['video_description']                  ="Description";
$lang['video_active']                       ="Active";
$lang['video_order']                        ="Order";
$lang['video_public']                       ="Public";
$lang['cate_sub_name_video']                ="Position";

/*--------------------------------Table Order---------------------------------*/
$lang['info_order']                         ="Order Information";
$lang['order_control_filter']               ="Status Order";
$lang['order_id']                           ="Order ID";
$lang['order_name']                         ="Customers Name";
$lang['order_address']                      ="Order Address";
$lang['order_phone']                        ="Phone Number";
$lang['order_email']                        ="Email Address";
$lang['cate_name_order']                    ="Status Order";
$lang['order_total_price']                  ="Total Money";
$lang['method_delivery_name']               ="Delivery Method";
$lang['method_payment_id']                  ="Payment Method";
$lang['order_create_date']                  ="Order Create Date";
$lang['order_update_date']                  ="Order Update Date";

/*-----------------------------Table Order Detail-----------------------------*/
$lang['info_order_detail']                  ="Order Detail";
$lang['order_detail_id']                    ="Order Detail ID";
$lang['order_detail_code']                  ="Product ID";
$lang['order_detail_name']                  ="Product Name";
$lang['order_detail_price']                 ="Price";
$lang['order_detail_number']                ="Quantity";
$lang['order_detail_total_price']           ="Amount";

/*----------------------------Table Method Delivery---------------------------*/ 	 	 	 	 	 	 	 	
$lang['info_delivery']                      ="Delivery Method Information";
$lang['delivery_name']                      ="Delivery Method";
$lang['delivery_content']                   ="Description";
$lang['delivery_cost']                      ="Cost";
$lang['delivery_public']                    ="Public";
$lang['delivery_order']                     ="Order";
$lang['delivery_create_date']               ="Create Date";
$lang['delivery_update_date']               ="Update Date";

/*----------------------------Table Method Payment---------------------------*/  	 	 	 	 	 	 	 
$lang['info_payment']                       ="Payment Method Information";
$lang['payment_name']                       ="Payment Method";
$lang['payment_content']                    ="Description";
$lang['payment_cost']                       ="Cost";
$lang['payment_public']                     ="Public";
$lang['payment_order']                      ="Order";
$lang['payment_create_date']                ="Create Date";
$lang['payment_update_date']                ="Update Date";

/*---------------------------------Table Menu---------------------------------*/
$lang['info_menu']                          ="Menu Information";
$lang['menu_name']                          ="Menu Name";
$lang['menu_url']                           ="URL Menu";
$lang['menu_public']                        ="Public";
$lang['menu_order']                         ="Order";

/*---------------------------------Table Support------------------------------*/
$lang['info_support']                       ="Support Information";
$lang['support_control_filter']             ="Support Type";
$lang['support_name']                       ="Name";
$lang['support_nick']                       ="Nick / Email / Phone";
$lang['support_info']                       ="Info";
$lang['support_public']                     ="Public";
$lang['support_order']                      ="Order";
$lang['support_status']                     ="Status";
$lang['support_type']                       ="Type";
$lang['support_create_date']                ="Create Date";

/*---------------------------------Table Weblink------------------------------*/
$lang['info_weblink']                       ="Link Information";
$lang['weblink_control_filter']             ="Weblink Type";
$lang['link_name']                          ="Link Name";
$lang['link_url']                           ="URL Link";
$lang['link_public']                        ="Public";
$lang['link_order']                         ="Order";
$lang['cate_sub_name_weblink']				="Weblink Type";

/*------------------------------Table Application-----------------------------*/
$lang['info_application']                   ="Application Information";
$lang['application_control_filter']         ="Application Type";
$lang['application_name']                   ="Application Name";
$lang['application_alias']					="URL Aliases";
$lang['application_public']                 ="Public";
$lang['application_order']                  ="Order";
$lang['application_update_date']            ="Create Date";

/*---------------------------------Table Partner------------------------------*/
$lang['info_partner']                       ="Partner Information";
$lang['partner_control_filter']             ="Partner Type";
$lang['partner_name']                       ="Partner Name";
$lang['partner_alias']						="URL Aliases";
$lang['partner_url']                        ="URL Partner";
$lang['partner_img']                        ="Image";
$lang['partner_info']                       ="Partner Information";
$lang['partner_public']                     ="Public";
$lang['partner_order']                      ="Order";
$lang['cate_sub_name_partner']              ="Partner Type";

/*---------------------------------Table Utility------------------------------*/
$lang['info_utility']                       ="Utility Information";
$lang['utility_name']                       ="Utility Name";
$lang['utility_url']                        ="URL Utility";
$lang['utility_img']                        ="Image";
$lang['utility_public']                     ="Public";
$lang['utility_order']                      ="Order";

/*---------------------------------Table Comment------------------------------*/
$lang['info_comment']                       ="Comment Information";
$lang['comment_control_filter']             ="Comment Filter";
$lang['comment_product_news']               ="ID";
$lang['comment_name']                       ="Full Name";
$lang['comment_email']                      ="Email";
$lang['comment_title']                      ="Title";
$lang['comment_content']                    ="Content";
$lang['comment_surf']                       ="Approved";
$lang['comment_public']                     ="Public";
$lang['comment_type']                       ="Type";

/*---------------------------------Table Province-----------------------------*/
$lang['info_province']                      ="Province Information";
$lang['province_control_filter']            ="Province Filter";						
$lang['province_id']                        ="ID";
$lang['province_name']                      ="Province Name";
$lang['province_public']                    ="Public";
$lang['province_order']                     ="Order";
$lang['province_lang']                      ="Language";
$lang['province_create_date']               ="Create Date";
$lang['province_update_date']               ="Update Date";

/*---------------------------------Table District-----------------------------*/
$lang['info_district']                      ="District Information";
$lang['district_control_filter']            ="District Filter";							
$lang['district_id']                        ="ID";
$lang['district_name']                      ="District Name";
$lang['district_public']                    ="Public";
$lang['district_order']                     ="Order";
$lang['district_create_date']               ="Create Date";
$lang['district_update_date']               ="Update Date";

/*=============================MESSAGE VALIDATION ============================*/

/*-----------------------------------General----------------------------------*/
$lang['error_admin_user_name']              ="<span class='message_admin_failed'> Your name entered is invalid.</span>";
$lang['error_admin_email']                  ="<span class='message_admin_failed'> The email address entered is invalid.</span>";
$lang['error_admin_date']                   ="<span class='message_admin_failed'> The date entered is invalid.</span>";
$lang['error_admin_phone']                  ="<span class='message_admin_failed'> The number telephone entered is invalid.</span>";
$lang['error_admin_custom_select']          ="<span class='message_admin_failed'> Please select an option.</span>";
$lang['error_admin_require']                ="<span class='message_admin_failed'> Please complete the required field.</span>";
$lang['custom_only_number']                 ="<span class='message_admin_failed'> This field must be numeric.</span>";

/*-------------------------------Table User-----------------------------------*/
$lang['error_admin_account']                ="<span class='message_admin_failed'> The username entered is invalid.</span>";
$lang['error_admin_account_register']       ="<span class='message_admin_failed'> The username entered is invalid or already taken.</span>";
$lang['error_admin_pass']                   ="<span class='message_admin_failed'> The password entered is invalid.</span>";
$lang['error_admin_password']               ="<span class='message_admin_failed'> The password entered is wrong.</span>";
$lang['error_admin_confirm_pass']           ="<span class='message_admin_failed'> The password and password confirmation do not match.</span>";

/*------------------------------ User Group ----------------------------------*/
$lang['error_admin_user_group_name']        ="<span class='message_admin_failed'> The Group Name entered is invalid.</span>";

/*---------------------------------Product------------------------------------*/
$lang['error_admin_product_id']             ="<span class='message_admin_failed'>Product ID entered is invalid.</span>";

/*---------------------------------Support------------------------------------*/
$lang['error_admin_support_name']           ="<span class='message_admin_failed'> Your name entered is invalid.</span>";
$lang['error_admin_support_nick']           ="<span class='message_admin_failed'> The Nickname entered is invalid.</span>";

/*==================================ACTION ===================================*/
$lang['option_select']                      ="..... Select .....";
$lang['option_select_all']                  ="..... All .....";
$lang['action_save']                        ="Save";
$lang['action_add']                         ="Add";
$lang['action_delete']                      ="Delete";
$lang['action_update']                      ="Update";
$lang['action_authorization']               ="Authorization";
$lang['action_back']                        ="Back";
$lang['authorization_add']                  ="Add";
$lang['button_image']                       ="Image";
$lang['button_video']                       ="Video";
$lang['admin_public']                       ="Yes";
$lang['admin_hidden']                       ="No";
$lang['admin_active']                       ="Active";
$lang['admin_inactive']                     ="Inactive";

/*================================MESSAGE ACTION =============================*/

/*---------------------------------Checked------------------------------------*/
$lang['home_message_unchecked']             ="You are unchecked item...!";

/*---------------------------Undefined Type File------------------------------*/
$lang['message_undefined_type_file']        ="The system does not support this file...!";

/*-----------------------------------Add--------------------------------------*/
$lang['message_add_success']                ="Add was successful...!";
$lang['message_add_faild']                  ="Add was failed...!";

/*---------------------------------Delete-------------------------------------*/
$lang['home_message_delete_all']            ="Are you sure you want to delete the item selected ?";
$lang['message_delete_all_success']         ="Delete was successful...!";
$lang['message_delete_all_faild']           ="Delete was failed...!";

/*---------------------------------Update-------------------------------------*/
$lang['message_update_success']             ="Update was successful...!";
$lang['message_update_faild']               ="Update was failed...!";

/*---------------------------------Authorization------------------------------*/
$lang['message_authorization_success']      ="The user group have been added successfully...!";
$lang['message_authorization_faild']        ="This user group already exists in users...!";

$lang['message_authorization_success1']     ="The permission have been added successfully...!";
$lang['message_authorization_faild1']       ="This permission group already exists in user group...!";

/*========================AUTHORIZTION ALERT==================================*/

/*----------------------------------User--------------------------------------*/
$lang['alert_authorization_change_user']                ="You don't have permission to access Change Password page...!";
$lang['alert_authorization_manager_user']               ="You don't have permission to access User Manager page...!";
$lang['alert_authorization_add_user']                   ="You don't have permission to access Add User page...!";
$lang['alert_authorization_delete_user']                ="You don't have permission to access Delete User  page...!";
$lang['alert_authorization_update_user']                ="You don't have permission to access Update User page...!";
$lang['alert_authorization_author_user']                ="You don't have permission to access User Authorization page...!";

/*--------------------------------User Group----------------------------------*/
$lang['alert_authorization_manager_user_group']         ="You don't have permission to access User Group Manager page...!";
$lang['alert_authorization_add_user_group']             ="You don't have permission to access Add User Group page...!";
$lang['alert_authorization_delete_user_group']          ="You don't have permission to access Delete User Group  page...!";
$lang['alert_authorization_update_user_group']          ="You don't have permission to access Update User Group page...!";
$lang['alert_authorization_author_user_group']          ="You don't have permission to access User Group Authorization page...!";

/*----------------------------------Facebook----------------------------------*/
$lang['alert_authorization_manager_facebook']           ="You don't have permission to access Application Facebook Manager page...!";
$lang['alert_authorization_add_facebook']               ="You don't have permission to access Add Application Facebook page...!";
$lang['alert_authorization_delete_facebook']            ="You don't have permission to access Delete Application Facebook page...!";
$lang['alert_authorization_update_facebook']            ="You don't have permission to access Update Application Facebook page...!";

/*----------------------------------Category----------------------------------*/
$lang['alert_authorization_manager_category']           ="You don't have permission to access Category Manager page...!";
$lang['alert_authorization_add_category']               ="You don't have permission to access Add Category page...!";
$lang['alert_authorization_delete_category']            ="You don't have permission to access Delete Category page...!";
$lang['alert_authorization_update_category']            ="You don't have permission to access Update Category page...!";

/*----------------------------------Product----------------------------------*/
$lang['alert_authorization_manager_product']            ="You don't have permission to access Product Manager page...!";
$lang['alert_authorization_add_product']                ="You don't have permission to access Add Product page...!";
$lang['alert_authorization_delete_product']             ="You don't have permission to access Delete Product page...!";
$lang['alert_authorization_update_product']             ="You don't have permission to access Update Product page...!";

/*-------------------------------Product Pattern------------------------------*/
$lang['alert_authorization_manager_product_pattern']    ="You don't have permission to access Product Pattern Manager page...!";
$lang['alert_authorization_add_product_pattern']        ="You don't have permission to access Add Product Pattern page...!";
$lang['alert_authorization_delete_product_pattern']     ="You don't have permission to access Delete Product Pattern page...!";
$lang['alert_authorization_update_product_pattern']     ="You don't have permission to access Update Product Pattern page...!";

/*-----------------------------Introduce,News---------------------------------*/
$lang['alert_authorization_manager_news']               ="You don't have permission to access News Manager page...!";
$lang['alert_authorization_add_news']                   ="You don't have permission to access Add News page...!";
$lang['alert_authorization_delete_news']                ="You don't have permission to access Delete News page...!";
$lang['alert_authorization_update_news']                ="You don't have permission to access Update News page...!";

/*-------------------------------Advertise------------------------------------*/
$lang['alert_authorization_manager_advertise']          ="You don't have permission to access Advertise Manager page...!";
$lang['alert_authorization_add_advertise']              ="You don't have permission to access Add Advertise page...!";
$lang['alert_authorization_delete_advertise']           ="You don't have permission to access Delete Advertise page...!";
$lang['alert_authorization_update_advertise']           ="You don't have permission to access Update Advertise page...!";

/*---------------------------------Video--------------------------------------*/
$lang['alert_authorization_manager_video']              ="You don't have permission to access Video Manager page...!";
$lang['alert_authorization_add_video']                  ="You don't have permission to access Add Video page...!";
$lang['alert_authorization_delete_video']               ="You don't have permission to access Delete Video page...!";
$lang['alert_authorization_update_video']               ="You don't have permission to access Update Video page...!";

/*-----------------------------------Order------------------------------------*/
$lang['alert_authorization_manager_order']              ="You don't have permission to access Order Manager page...!";
$lang['alert_authorization_add_order']                  ="You don't have permission to access Add Order page...!";
$lang['alert_authorization_delete_order']               ="You don't have permission to access Delete Order page...!";
$lang['alert_authorization_update_order']               ="You don't have permission to access Update Order page...!";

/*------------------------------Method Delivery-------------------------------*/
$lang['alert_authorization_manager_delivery']           ="You don't have permission to access Delivery Method Manager page...!";
$lang['alert_authorization_add_delivery']               ="You don't have permission to access Add Delivery Method page...!";
$lang['alert_authorization_delete_delivery']            ="You don't have permission to access Delete Delivery Method page...!";
$lang['alert_authorization_update_delivery']            ="You don't have permission to access Update Delivery Method page...!";

/*-------------------------------Method Payment-------------------------------*/
$lang['alert_authorization_manager_payment']            ="You don't have permission to access Payment Method Manager page...!";
$lang['alert_authorization_add_payment']                ="You don't have permission to access Add Payment Method page...!";
$lang['alert_authorization_delete_payment']             ="You don't have permission to access Delete Payment Method page...!";
$lang['alert_authorization_update_payment']             ="You don't have permission to access Update Payment Method page...!";

/*----------------------------------Menu--------------------------------------*/
$lang['alert_authorization_manager_menu']               ="You don't have permission to access Menu Manager page...!";
$lang['alert_authorization_add_menu']                   ="You don't have permission to access Add Menu page...!";
$lang['alert_authorization_delete_menu']                ="You don't have permission to access Delete Menu page...!";
$lang['alert_authorization_update_menu']                ="You don't have permission to access Update Menu page...!";

/*---------------------------------Support------------------------------------*/
$lang['alert_authorization_manager_support']            ="You don't have permission to access Support Manager page...!";
$lang['alert_authorization_add_support']                ="You don't have permission to access Add Support page...!";
$lang['alert_authorization_delete_support']             ="You don't have permission to access Delete Support page...!";
$lang['alert_authorization_update_support']             ="You don't have permission to access Update Support page...!";

/*--------------------------------Weblink-------------------------------------*/
$lang['alert_authorization_manager_weblink']            ="You don't have permission to access Web Link Manager page...!";
$lang['alert_authorization_add_weblink']                ="You don't have permission to access Add Web Link page...!";
$lang['alert_authorization_delete_weblink']             ="You don't have permission to access Delete Web Link page...!";
$lang['alert_authorization_update_weblink']             ="You don't have permission to access Update Web Link page...!";

/*---------------------------------Application--------------------------------*/
$lang['alert_authorization_manager_application']        ="You don't have permission to access Application Manager page...!";
$lang['alert_authorization_add_application']            ="You don't have permission to access Add Application page...!";
$lang['alert_authorization_delete_application']         ="You don't have permission to access Delete Application page...!";
$lang['alert_authorization_update_application']         ="You don't have permission to access Update Application page...!";

/*--------------------------------Partner-------------------------------------*/
$lang['alert_authorization_manager_partner']            ="You don't have permission to access Partner Manager page...!";
$lang['alert_authorization_add_partner']                ="You don't have permission to access Add Partner page...!";
$lang['alert_authorization_delete_partner']             ="You don't have permission to access Delete Partner page...!";
$lang['alert_authorization_update_partner']             ="You don't have permission to access Update Partner page...!";

/*--------------------------------Utility-------------------------------------*/
$lang['alert_authorization_manager_utility']            ="You don't have permission to access Utilities Manager page...!";
$lang['alert_authorization_add_utility']                ="You don't have permission to access Add Utilities page...!";
$lang['alert_authorization_delete_utility']             ="You don't have permission to access Delete Utilities page...!";
$lang['alert_authorization_update_utility']             ="You don't have permission to access Update Utilities page...!";

/*--------------------------------Comment-------------------------------------*/
$lang['alert_authorization_manager_comment']            ="You don't have permission to access Comment Manager page...!";
$lang['alert_authorization_add_comment']                ="You don't have permission to access Add Comment page...!";
$lang['alert_authorization_delete_comment']             ="You don't have permission to access Delete Comment page...!";
$lang['alert_authorization_update_comment']             ="You don't have permission to access Update Comment page...!";

/*--------------------------------Province------------------------------------*/
$lang['alert_authorization_manager_province']           ="You don't have permission to access Province Manager page...!";
$lang['alert_authorization_add_province']               ="You don't have permission to access Add Province page...!";
$lang['alert_authorization_delete_province']            ="You don't have permission to access Delete Province page...!";
$lang['alert_authorization_update_province']            ="You don't have permission to access Update Province page...!";

/*--------------------------------District------------------------------------*/
$lang['alert_authorization_manager_district']           ="You don't have permission to access District Manager page...!";
$lang['alert_authorization_add_district']               ="You don't have permission to access Add District page...!";
$lang['alert_authorization_delete_district']            ="You don't have permission to access Delete District page...!";
$lang['alert_authorization_update_district']            ="You don't have permission to access Update District page...!";

/*===============================LOGIN ADMIN =================================*/

$lang['login_title']                        ="::. Admin Cpanel .::";
$lang['login_company']                      ="Dashboard Cpanel";
$lang['login_welcome']                      ="Welcome Administrator. Please Login: ";
$lang['login_messages_authorization']       ="<span class='message_admin_failed'> You don't have permission to access on this page...!</span>";
$lang['login_messages_user']                ="<span class='message_admin_failed'> The username or password is wrong...!</span>";
$lang['login_account']                      ="UserName";
$lang['login_pass']                         ="Password ";
$lang['login_lang']                         ="Language";
$lang['login_lang_name1']                   ="Default";
$lang['login_lang_name2']                   ="Vietnamese";
$lang['login_lang_name3']                   ="English";
$lang['login_button']                       ="Login";
$lang['login_footer']                       ="<p class='copyright'> Copyright &copy; 2012 - Powered by: Hồ Minh Trí - <span style='color:#F00'> Phone: 0976646401</span><br />Email: <a href='mailto:hominhtri.it@gmail.com'>hominhtri.it@gmail.com</a></p>";

/*============================HEADER ADMIN====================================*/

$lang['label_welcome_user']                 ="Welcome : ";
/*
$lang['marquee_content_header']             ="Nếu gặp vấn đề khó khăn về phần quản trị ADMIN.Quí khách vui lòng gửi mail cho chúng tôi 
                                                    <strong style='color:#F00'>support@dangcapthuonghieu.com.vn</strong> hoặc gọi điện thoại
                                                    tới bộ phận hỗ trợ khách hàng <strong style='color:#F00'>(08) 3.83.11.622</strong> để được sự hỗ trợ tốt nhất";
*/
$lang['marquee_content_header']             ="Nếu gặp vấn đề khó khăn về phần quản trị ADMIN.Quí khách vui lòng gửi mail cho chúng tôi 
                                                    <strong style='color:#F00'>hominhtri.it@gmail.com</strong> hoặc gọi điện thoại
                                                    tới bộ phận hỗ trợ khách hàng <strong style='color:#F00'> 097.664.64.01 </strong> để được sự hỗ trợ tốt nhất";
$lang['visitsite_font_end']                 ="Visit Site";
$lang['exit_admin']                         ="Exit";

/*============================CONTENT ADMIN===================================*/

/*-------------------------------USER CONTROL---------------------------------*/
$lang['user_control_filter']                ="User Group";
$lang['user_control_last_login']            ="Last Login";

/*------------------------------USER AUTHORIZATION----------------------------*/
$lang['user_authorization_info_user']       ="Infomation User";
$lang['user_authorization_info_add']        ="Add Group";
$lang['user_authorization_select_group']    ="User Group";

/*------------------------------GROUP AUTHORIZATION---------------------------*/
$lang['group_authorization_label']          ="Authorization Group";
$lang['group_authorization_info_group']     ="Infomation User Group";
$lang['group_authorization_info_add']       ="Add Authorization";
$lang['group_authorization_function']       ="Function Website";

/*-------------------------------SITE CONTROL---------------------------------*/
$lang['site_control_control']               ="Control Panel";
$lang['site_control_last_login']            ="Last Login";
$lang['site_control_info_system']           ="System Info";
$lang['site_control_info_static']           ="Static";

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

$lang['site_control_static_online']         ="Online";
$lang['site_control_static_today']          ="Today";
$lang['site_control_static_yesterday']      ="Yesterday";
$lang['site_control_static_week']           ="Week";
$lang['site_control_static_month']          ="Month";
$lang['site_control_static_year']           ="Year";

/*-------------------------------SITE CONFIG----------------------------------*/
$lang['site_config_title_seo']              ="Keyword";
$lang['site_config_content_seo']            ="Content";
$lang['site_config_title_page']             ="Paging";
$lang['site_config_content_page']           ="Record / Page";
$lang['site_config_content_facebook']		="Facebook";
$lang['site_config_content_static']         ="Visited website";

$lang['site_config_title_web']              ="Meta Title";
$lang['site_config_keyword_web']            ="Meta Keyword";
$lang['site_config_description_web']        ="Meta Description";
$lang['site_config_abstract_web']           ="Meta Abstract";

$lang['site_config_admin_page']             ="Admin";
$lang['site_config_product_page']           ="Product";
$lang['site_config_search_product_page']    ="Search Product";
$lang['site_config_news_page']              ="News";

$lang['site_config_facebook_user_id']		="Facebook User ID";
$lang['site_config_facebook_fanpage']		="Link Fanpage";

$lang['site_config_static_online_virtual']  ="Virtual Online";
$lang['site_config_static_count_virtual']   ="Count Vitural Online";

$lang['site_config_footer_front_end']       ="Footer Front-end";

$lang['email_server_smtp']                  ="SMTP Server";
$lang['email_port_smtp']                    ="SMTP Port";
$lang['email_secure_smtp']                  ="SMTP Secure";
$lang['email_debug_smtp']                   ="SMTP Debug";
$lang['email_your_name']                    ="Name";
$lang['email_email_smtp']                   ="SMTP Username";
$lang['email_pass_smtp']                    ="SMTP Password";

/*============================FOOTER ADMIN====================================*/

$lang['footer_admin']                       ="<p class='copyright' style='font-weight:bold'> Copyright &copy; 2012 - Powered by: Hồ Minh Trí - <span style='color:#F00'>Phone: 0976646401</span><br />Email: <a  style='color:#FC0' href='mailto:hominhtri.it@gmail.com'>hominhtri.it@gmail.com</a></p>";