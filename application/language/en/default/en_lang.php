<?php
/*******************************************************************************

	Ghi chú:hoàn thành ngày 28-07-2015
	Copyright :Hồ Minh Trí

*******************************************************************************/

if(!defined('BASEPATH')) exit('No direct script access allowed');

/*============================== TABLE DATABASE ==============================*/

/*-------------------------------- Table Card --------------------------------*/
$lang['card_barcode']                       ="Barcode ID";
$lang['card_uid']                           ="Card UID";
$lang['card_serial']                        ="Card Serial";
$lang['card_version']                       ="Card Version";
$lang['card_issue_date']                    ="Issue Date";
$lang['card_email']                         ="Email";

/*-------------------------------- Table User --------------------------------*/
$lang['info_user_register']                 ="Members Register";
$lang['info_user_update']                   ="Update Personal Information";
$lang['info_user_account']                  ="Account Information";
$lang['info_user_member']                   ="Personal Information";
$lang['button_member_register']             ="Agree";
$lang['button_member_update']               ="Update";
$lang['button_member_reset']                ="Reset";
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
$lang['user_img']                           ="Avata";
$lang['user_fax']                           ="Fax";
$lang['user_last_login']                    ="Last Login";
$lang['user_create_date']                   ="Register Date";
$lang['user_gender_male']                   ="Male";
$lang['user_gender_female']                 ="Female";
$lang['button_image']                       ="Avatar";

/*----------------------------- Table Membership -----------------------------*/
$lang['info_membership_register']           ="Membership Information Register";
$lang['info_membership_update']             ="Update Membership Information";
$lang['info_membership_card']               ="Membership Information Register";
$lang['button_membership_register']         ="Agree";
$lang['button_membership_update']           ="Update";
$lang['button_membership_reset']            ="Reset";
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

/*------------------------------- Table Product ------------------------------*/
$lang['product_id']                         ="Product ID";
$lang['product_name']                       ="Product Name";
$lang['product_price']                      ="Price";
$lang['product_price_old']                  ="Original Price";
$lang['product_color']                      ="Color";
$lang['product_size']                       ="Size";
$lang['product_img']                        ="Image";
$lang['product_headline']                   ="Product Description";
$lang['product_content']                    ="Product Details";
$lang['product_prominent']                  ="Prominent";
$lang['product_number']                     ="Quantity";
$lang['product_order']                      ="Order";
$lang['product_public']                     ="Public";
$lang['product_buy']                        ="Purchased";
$lang['product_category']                   ="Category";
$lang['product_seo_keyword']                ="Meta Keyword";
$lang['product_seo_description']            ="Meta Description";

/*-------------------------------- Table Video -------------------------------*/
$lang['video_name']                         ="Video Name";
$lang['video_file']                         ="Video File";
$lang['video_img']                          ="Image";
$lang['video_description']                  ="Description";
$lang['video_active']                       ="Active";
$lang['video_order']                        ="Order";
$lang['video_public']                       ="Public";
$lang['cate_sub_name_video']                ="Position";
$lang['video_create_date']                  ="Create Date";
$lang['video_update_date']                  ="Update Date";

/*-------------------------------- Table Order -------------------------------*/
$lang['order_name']                         ="Customers Name";
$lang['order_address']                      ="Order Address";
$lang['order_phone']                        ="Phone Number";
$lang['order_email']                        ="Email Address";
$lang['order_content']                      ="Note";
$lang['order_create_date']                  ="Order Create Date";
$lang['order_update_date']                  ="Order Update Date";

/*--------------------------- Table Method Delivery --------------------------*/
$lang['delivery_name']                      ="Delivery Method";
$lang['delivery_name_short']                ="Delivery Method";
$lang['delivery_content']                   ="Description";
$lang['delivery_cost']                      ="Cost";
$lang['delivery_create_date']               ="Create Date";
$lang['delivery_update_date']               ="Update Date";

/*--------------------------- Table Method Payment ---------------------------*/	 	 	 	 	 	 
$lang['payment_name']                       ="Payment Method";
$lang['payment_name_short']                 ="Payment Method";
$lang['payment_content']                    ="Description";
$lang['payment_cost']                       ="Cost";
$lang['payment_create_date']                ="Create Date";
$lang['payment_update_date']                ="Update Date";

/*------------------------------- Table Comment ------------------------------*/
$lang['info_comment']                       ="Share Their Opinions";
$lang['comment_name']                       ="Full Name";
$lang['comment_email']                      ="Email";
$lang['comment_title']                      ="Title";
$lang['comment_captcha']                    ="Captcha";
$lang['comment_content']                    ="Write Your Comments...";
$lang['button_comment_send']                ="Send";
$lang['button_comment_reset']               ="Reset";


/*=============================== LABEL GENERAL ==============================*/

$lang['label_homepage_website']				="Mỹ Phẩm Con Trai";
$lang['option_select']                      ="..... Select .....";
$lang['option_select_all']                  ="..... All .....";
$lang['label_general_home']                 ="Home";
$lang['label_membership_card']              ="Membership Card";
$lang['label_membership_register']          ="Register Information";
$lang['label_general_read_more']            ="Read More";
$lang['label_general_read_all']             ="Read All";
$lang['label_key_search']					="Enter search keywords...";


/*============================ MESSAGE VALIDATION ============================*/

/*---------------------------------- General ---------------------------------*/
$lang['error_email']                        ="<span class='message_failed'> The email address entered is invalid.</span>";
$lang['error_email_exist']                  ="<span class='message_failed'> The email already exists or is invalid.</span>";
$lang['error_user_name']                    ="<span class='message_failed'> Your name entered is invalid.</span>";
$lang['error_date']                         ="<span class='message_failed'> The date entered is invalid.</span>";
$lang['error_phone']                        ="<span class='message_failed'> The number telephone entered is invalid.</span>";
$lang['error_custom_select']                ="<span class='message_failed'> Please select an option.</span>";
$lang['error_require']                      ="<span class='message_failed'> Please complete the required field.</span>";
$lang['error_captcha']                      ="<span class='message_failed'> The Captcha is incorrect.</span>";
$lang['custom_only_number']                 ="<span class='message_failed'> This field must be numeric.</span>";

/*----------------------------------- User -----------------------------------*/
$lang['error_account']                      ="<span class='message_failed'> The username entered is invalid.</span>";
$lang['error_account_register']             ="<span class='message_failed'> The username entered is invalid or already taken.</span>";
$lang['error_pass']                         ="<span class='message_failed'> The password entered is invalid.</span>";
$lang['error_password']                     ="<span class='message_failed'> The password entered is wrong.</span>";
$lang['error_confirm_pass']                 ="<span class='message_failed'> The password and password confirmation do not match.</span>";
$lang['error_confirm_pass_js']              ="The password and password confirmation do not match";

/*-------------------------------- User Group --------------------------------*/
$lang['error_user_group_name']              ="<span class='message_failed'> The Group Name entered is invalid.</span>";

/*---------------------------------- Product ---------------------------------*/
$lang['error_product_id']                   ="<span class='message_failed'>Product ID entered is invalid.</span>";

/*---------------------------------- Support ---------------------------------*/
$lang['error_support_name']                 ="<span class='message_failed'> Your name entered is invalid.</span>";
$lang['error_support_nick']                 ="<span class='message_failed'> The Nickname entered is invalid.</span>";

/*---------------------------------- Comment ---------------------------------*/
$lang['message_comment_successful']         ="<span class='message_successful'>Thank you for your comments...!</span>";
$lang['message_comment_faild']              ="<span class='message_failed'>An error occurred.Please check the information...!</span>";
$lang['error_require_comment_name']         ="<span class='message_failed'>- Please complete the required 'Full Name' field...!</span>";
$lang['error_require_comment_title']        ="<span class='message_failed'>- Please complete the required 'Title' field...!</span>";
$lang['error_comment_captcha']              ="<span class='message_failed'>- The 'Captcha' entered is wrong...!</span>";
$lang['error_require_comment_content']      ="<span class='message_failed'>- Please complete the required 'Content' field...!</span>";
$lang['error_comment_email']                ="<span class='message_failed'>- The 'Email Address' entered is invalid...!</span>";


/*============================== MESSAGE ACTION ==============================*/

/*---------------------------------- Checked ---------------------------------*/
$lang['home_message_unchecked']             ="You are unchecked item...!";

/*-------------------------- Undefined Type File -----------------------------*/
$lang['message_undefined_type_file']        ="The system does not support this file...!";

/*------------------------------------ Add -----------------------------------*/
$lang['message_add_success']                ="Add was successful...!";
$lang['message_add_faild']                  ="Add was failed...!";

/*---------------------------------- Delete ----------------------------------*/
$lang['home_message_delete_all']            ="Are you sure you want to delete the item selected ?";
$lang['message_delete_all_success']         ="Delete was successful...!";
$lang['message_delete_all_faild']           ="Delete was failed...!";

/*---------------------------------- Update ----------------------------------*/
$lang['message_update_success']             ="Update was successful...!";
$lang['message_update_faild']               ="Update was failed...!";

/*----------------------------------- User -----------------------------------*/
$lang['messages_login_authorization']       ="Your account is not active...!";
$lang['messages_login_user']                ="The username or password is wrong...!";

/*------------------------------- Authorization ------------------------------*/
$lang['message_authorization_success']      ="The user group have been added successfully...!";
$lang['message_authorization_faild']        ="This user group already exists in users...!";

$lang['message_authorization_success1']     ="The permission have been added successfully...!";
$lang['message_authorization_faild1']       ="This permission group already exists in user group...!";

/*------------------------------- System Update ------------------------------*/
$lang['message_system_title']               ="System Message";
$lang['message_system_update']              ="This category being updated...!";
$lang['message_system_search']              ="No,results were found according to your requirements...!";

/*---------------------------------- Captcha ---------------------------------*/
$lang['info_captcha_label']                 ="Enter Your Captcha";

/*--------------------------------- Send Mail --------------------------------*/
$lang['message_send_mail_success']          ="Your request has been sent successfully.Thank you...!";
$lang['message_send_mail_failed']           ="Send unsuccessful. Please check and send back information...!";

/*----------------------------------- Order ----------------------------------*/
$lang['message_order_success']              ="Orders success. Thank you for using our services ...!";
$lang['message_order_failed']               ="Order failed. Please check and send back information...!";

/*--------------------------------- Shopping ---------------------------------*/
$lang['message_shopping_success']           ="Orders success. Thank you for using our services ...!";
$lang['message_shopping_failed']            ="Order failed. Please check this information and perform the steps...!";
$lang['message_send_mail_shopping_failed']  ="Order success...!";


/*================================== MODULE ==================================*/

/*------------------------------- Banner Header ------------------------------*/

/*-------------------------------- Menu Header -------------------------------*/

/*------------------------------- Slider Header ------------------------------*/

/*--------------------------------- Menu Left --------------------------------*/
$lang['menu_left_module_title']             ="Product Category";

/*---------------------------------- Search ----------------------------------*/
$lang['search_module_title']                ="Search";
$lang['search_module_key']                  ="Tìm theo tên,địa điểm....";
$lang['search_module_category']             ="Select Product Category....";
$lang['search_module_price_begin']          ="To Price....";
$lang['search_module_price_end']            ="From Price....";
$lang['search_module_button']               ="Search";

/*----------------------------------- News -----------------------------------*/
$lang['news_module_title']                  ="Latest News";

/*-------------------------------- Product New -------------------------------*/
$lang['product_new_module_title']           ="New Product";

/*------------------------------- Product View -------------------------------*/
$lang['product_view_module_title']          ="Product View";

/*-------------------------------- Product Buy -------------------------------*/
$lang['product_buy_module_title']           ="Product Buy";

/*----------------------------- Product Prominent ----------------------------*/
$lang['product_prominent_module_title']		="Product Prominent";

/*---------------------------------- Support ---------------------------------*/
$lang['support_module_title']               ="Support Online";
$lang['support_module_hotline']             ="HOTLINE";

/*---------------------------------- Partner ---------------------------------*/
$lang['partner_module_title']               ="Manufacturer Cosmetic";

/*---------------------------------- Weblink ---------------------------------*/
$lang['weblink_module_title']               ="Weblink";
$lang['weblink_module_select']              ="Weblink Selection";

/*---------------------------------- Utility ---------------------------------*/
$lang['utility_module_title']               ="Utility";
$lang['utility_module_select']              ="Weblink Selection";

/*----------------------------------- Video ----------------------------------*/
$lang['video_module_title']                 ="Video";

/*---------------------------------- Members ---------------------------------*/
$lang['members_module_title']               ="Members";
$lang['members_module_account']             ="Account";
$lang['members_module_pass']                ="Password";
$lang['members_module_button_login']        ="Login";
$lang['members_module_forgot']              ="Forgot Password";
$lang['members_module_register']            ="Register for user";
$lang['members_module_welcome']             ="Welcome :";
$lang['members_module_update_profile']      ="Update information";
$lang['members_module_view_order']          ="List Order";
$lang['members_module_logout']              ="Logout";

/*----------------------------------- Cart -----------------------------------*/
$lang['cart_module_title']                  ="Cart";
$lang['cart_module_quantity']               ="Quantity";
$lang['cart_module_total']                  ="Total";
$lang['cart_module_button_cart']            ="Cart";
$lang['cart_module_button_delivery']        ="Delivery";

/*---------------------------------- Static ----------------------------------*/
$lang['static_module_title']                ="Static";
$lang['static_module_online']               ="Online";
$lang['static_module_today']                ="Today";
$lang['static_module_yesterday']            ="Yesterday";
$lang['static_module_week']                 ="Week";
$lang['static_module_month']                ="Month";
$lang['static_module_year']                 ="Year";
$lang['static_module_count']                ="Total";

/*--------------------------------- Facebook ---------------------------------*/
$lang['facebook_module_title']				="Facebook";

/*---------------------------------- Footer ----------------------------------*/
$lang['footer_menu_module_title']			="Menu Category";
$lang['footer_customer_support_module_title']="Customer Support";

/*=================================== Middle =================================*/

/*-------------------------------- HOME INDEX --------------------------------*/
$lang['home_index_product_new']             ="New Product";
$lang['home_index_product_view']            ="View Product";
$lang['home_index_product_prominent']       ="Prominent Product";
$lang['home_index_product_buy']             ="Buy Product";

/*------------------------------- CONTACT INDEX ------------------------------*/
$lang['contact_index_title']                ="Contact";
$lang['contact_index_info']                 ="Customer Contact";
$lang['contact_company']                    ="Company";
$lang['contact_email']                      ="Email";
$lang['contact_name']                       ="Customer Name";
$lang['contact_address']                    ="Address";
$lang['contact_phone']                      ="Phone";
$lang['contact_header']                     ="Title";
$lang['contact_content']                    ="Content";
$lang['contact_attachment']                 ="Attachment File";
$lang['contact_index_send_me']              ="Send a copy of this message to your own address";
$lang['contact_index_send']                 ="Send";

/*-------------------------------- INTRO ABOUT -------------------------------*/
$lang['introduce_about_title']              ="Introduce";

/*------------------------------- INTRO SERVICE ------------------------------*/
$lang['introduce_service_title']            ="Service";

/*------------------------------ INTRO CUSTOMER ------------------------------*/
$lang['introduce_customer_title']			="Customer Support";

/*-------------------------------- NEWS SEARCH -------------------------------*/
$lang['article_search_title']               ="Search Result";

/*-------------------------------- NEWS CLASS --------------------------------*/
$lang['news_class_title']                   ="News";
$lang['news_class_keyword']					="News";
$lang['news_class_description']				="News";

$lang['news_class_title_article']           ="News";
$lang['news_class_keyword_article']			="News";
$lang['news_class_description_article']		="News";

$lang['news_class_title_seminar']           ="News";
$lang['news_class_keyword_seminar']			="News";
$lang['news_class_description_seminar']		="News";

$lang['news_class_title_customer']			="Customer Support";
$lang['news_class_keyword_customer']		="Customer Support";
$lang['news_class_description_customer']	="Customer Support";

/*------------------------------- NEWS CATEGORY ------------------------------*/
$lang['news_category_title']                ="NEWS";

/*-------------------------------- NEWS DETAIL -------------------------------*/
$lang['news_detail_title']                  ="News Detail";
$lang['news_detail_involved']               ="News Other";

/*------------------------------ PRODUCT SEARCH ------------------------------*/
$lang['product_search_title']               ="Search Result";

/*------------------------------- PRODUCT CLASS ------------------------------*/
$lang['product_class_title']                ="Product";
$lang['product_class_keyword']				="Product";
$lang['product_class_description']			="Product";

$lang['product_class_title_product']        ="Product";
$lang['product_class_keyword_product']		="Product";
$lang['product_class_description_product']	="Product";

/*----------------------------- PRODUCT CATEGORY -----------------------------*/
$lang['product_category_title']             ="Product";

/*------------------------------ PRODUCT PARTNER -----------------------------*/
$lang['product_partner_title']              ="Business Partner";

/*---------------------------- PRODUCT APPLICATION ---------------------------*/
$lang['product_application_title']          ="Application";

/*------------------------------ PRODUCT DETAIL ------------------------------*/
$lang['product_detail_title']               ="Product Detail";
$lang['product_detail_page_view']           ="Page View";
$lang['product_detail_create_date']         ="from";
$lang['product_detail_sold_out']            ="This product has sold out...!";
$lang['product_detail_add_cart']            ="Add To Cart";
$lang['product_detail_feature']             ="Detail Features";
$lang['product_detail_related']             ="Related Product";
$lang['product_detail_comment']             ="Guest Comment";

/*-------------------------------- VIDEO CLASS -------------------------------*/
$lang['video_class_title']					="Video";
$lang['video_class_keyword']				="Video";
$lang['video_class_description']			="Video";

$lang['video_class_title_video']			="Video";
$lang['video_class_keyword_video']			="Video";
$lang['video_class_description_video']		="Video";

/*------------------------------ VIDEO CATEGORY ------------------------------*/
$lang['video_category_title']               ="Video";

/*------------------------------- VIDEO DETAIL -------------------------------*/
$lang['video_detail_title']                 ="Video";
$lang['video_detail_involved']              ="Video Involved";

/*--------------------------- FACEBOOK THEME LOGIN ---------------------------*/
$lang['facebook_themelogin_title']          ="Cards To Membership";

/*-------------------------- FACEBOOK THEME DEFAULT --------------------------*/
$lang['facebook_themedefault_title']        ="Aplication Facebook";

/*---------------------------- FACEBOOK THEME LIKE ---------------------------*/
$lang['facebook_themelike_title']           ="Aplication Facebook";

/*--------------------------- FACEBOOK THEME WEBCAM --------------------------*/
$lang['facebook_themewebcam_title']         ="Aplication Facebook";

/*--------------------------- FACEBOOK THEME PHOTO ---------------------------*/
$lang['facebook_themephoto_title']          ="Aplication Facebook";

/*-------------------------------- CART ORDER --------------------------------*/
$lang['cart_order_title']                   ="Order";
$lang['cart_order_product']                 ="Product Information";
$lang['cart_order_customer']                ="Customer Information";
$lang['cart_order_empty']                   ="There are no <b>Product</b> items in <b>Your Order</b>";
$lang['cart_order_send_me']                 ="Send a copy of this Order to your Email address";
$lang['cart_order_send']                    ="Order";
$lang['cart_order_product_image']           ="Image";
$lang['cart_order_product_delete']          ="Delete";
$lang['cart_order_product_infomation']      ="Product Infomation";
$lang['cart_order_product_description']     ="Product Description";
$lang['cart_order_product_subtotal']        ="Sub Total";
$lang['cart_order_product_total']           ="Total Money";

/*------------------------------- CART SHOPPING ------------------------------*/
$lang['cart_shopping_title']                ="Shopping";
$lang['cart_shopping_empty']                ="There are no <b>Product</b> items in <b>Your Shopping</b>";
$lang['cart_shopping_step_cart']            ="Shopping";
$lang['cart_shopping_step_method']          ="Delivery & Payment";
$lang['cart_shopping_step_confirm']         ="Confirm";
$lang['cart_shopping_product_image']		="Image";
$lang['cart_shopping_product_delete']       ="Delete";
$lang['cart_shopping_product_infomation']   ="Product Infomation";
$lang['cart_shopping_product_subtotal']     ="Sub Total";
$lang['cart_shopping_product_total']        ="Total Money";
$lang['cart_shopping_continue']             ="Shopping";
$lang['cart_shopping_payment']              ="Payment";

/*-------------------------------- CART METHOD -------------------------------*/
$lang['cart_method_title']                  ="Delivery & Payment";
$lang['cart_method_contact']                ="Delivery Infomation";
$lang['cart_method_delivery']               ="Delivery Method";
$lang['cart_method_payment']                ="Payment Method";
$lang['cart_method_free']                   ="Free";
$lang['cart_method_send_me']                ="Send a copy of this Order to your Email address";
$lang['cart_method_prev']                   ="Previous";
$lang['cart_method_next']                   ="Next";

/*------------------------------- CART CONFIRM -------------------------------*/
$lang['cart_confirm_title']                 ="Order Confirm";
$lang['cart_confirm_shopping']              ="Consignees Information";
$lang['cart_confirm_product']               ="Order Information";
$lang['cart_confirm_prev']                  ="Previous";
$lang['cart_confirm_next']                  ="Order";
$lang['cart_confirm_message']				="<b>Note:</b> Actions order unfinished.Please click <b>'Order'</b> below to confirm your order ...!";

/*-------------------------------- CART FINISH -------------------------------*/
$lang['cart_finish_title']                  ="Order Message";
$lang['cart_finish_home']                   ="Home";