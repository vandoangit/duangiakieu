<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

Class Language{

	private $_object_lang;
	private $_lang;
	public $sess_lang="lang_id_default";

	public function __construct(){

		$this->_object_lang=& get_instance();
		$this->_object_lang->load->helper(array('language'));
		$this->_object_lang->load->library(array('session','exsec_string'));

		if(!$this->_object_lang->session->userdata($this->sess_lang)){

			$this->_object_lang->session->set_userdata($this->sess_lang,'vi');
			$this->_lang='vi';
		}
		else
			$this->_lang=$this->_object_lang->session->userdata($this->sess_lang);

		//Load land
		$this->_object_lang->lang->load($this->_lang,$this->_lang."/".DEFAULT_DIR_ROOT);

	}

	/* ============================ Data Header ============================= */

	public function get_data_page_banner(){

		$result['label_general_home']=$this->_object_lang->exsec_string->str_ucfirst(lang('label_general_home'));

		return $result;

	}

	public function get_data_page_menu_header(){

		$result['label_general_home']=$this->_object_lang->exsec_string->str_ucfirst(lang('label_general_home'));
		$result['label_membership_card']=$this->_object_lang->exsec_string->str_ucfirst(lang('label_membership_card'));
		$result['label_membership_register']=$this->_object_lang->exsec_string->str_ucfirst(lang('label_membership_register'));

		$result['search_module_key']=$this->_object_lang->exsec_string->str_ucfirst(lang('search_module_key'));

		$result['members_module_account']=$this->_object_lang->exsec_string->str_ucwords(lang('members_module_account'));
		$result['members_module_pass']=$this->_object_lang->exsec_string->str_ucwords(lang('members_module_pass'));
		$result['members_module_button_login']=$this->_object_lang->exsec_string->str_ucwords(lang('members_module_button_login'));
		$result['members_module_forgot']=$this->_object_lang->exsec_string->str_ucfirst(lang('members_module_forgot'));
		$result['members_module_register']=$this->_object_lang->exsec_string->str_ucfirst(lang('members_module_register'));
		$result['members_module_welcome']=$this->_object_lang->exsec_string->str_ucwords(lang('members_module_welcome'));
		$result['members_module_logout']=$this->_object_lang->exsec_string->str_ucwords(lang('members_module_logout'));

		return $result;

	}

	public function get_data_search_header(){

		$result['label_key_search']=$this->_object_lang->exsec_string->str_ucfirst(lang('label_key_search'));

		return $result;

	}

	public function get_data_page_slider(){

		$result['label_general_home']=$this->_object_lang->exsec_string->str_ucfirst(lang('label_general_home'));

		return $result;

	}

	/* ============================ Data Sidebar ============================ */

	public function get_data_page_menu_left(){

		$result['menu_left_module_title']=$this->_object_lang->exsec_string->str_upper(lang('menu_left_module_title'));

		return $result;

	}

	public function get_data_page_search(){

		$result['search_module_title']=$this->_object_lang->exsec_string->str_upper(lang('search_module_title'));
		$result['search_module_key']=$this->_object_lang->exsec_string->str_ucfirst(lang('search_module_key'));
		$result['search_module_category']=$this->_object_lang->exsec_string->str_ucfirst(lang('search_module_category'));
		$result['search_module_price_begin']=$this->_object_lang->exsec_string->str_ucfirst(lang('search_module_price_begin'));
		$result['search_module_price_end']=$this->_object_lang->exsec_string->str_ucfirst(lang('search_module_price_end'));
		$result['search_module_button']=$this->_object_lang->exsec_string->str_ucfirst(lang('search_module_button'));

		return $result;

	}

	public function get_data_page_news(){

		$result['news_module_title']=$this->_object_lang->exsec_string->str_upper(lang('news_module_title'));
		$result['news_module_title_seminar']=$this->_object_lang->exsec_string->str_upper(lang('news_module_title_seminar'));

		return $result;

	}

	public function get_data_page_product_new(){

		$result['product_new_module_title']=$this->_object_lang->exsec_string->str_upper(lang('product_new_module_title'));

		return $result;

	}

	public function get_data_page_product_view(){

		$result['product_view_module_title']=$this->_object_lang->exsec_string->str_upper(lang('product_view_module_title'));

		return $result;

	}

	public function get_data_page_product_buy(){

		$result['product_buy_module_title']=$this->_object_lang->exsec_string->str_upper(lang('product_buy_module_title'));

		return $result;

	}

	public function get_data_page_product_prominent(){

		$result['product_prominent_module_title']=$this->_object_lang->exsec_string->str_upper(lang('product_prominent_module_title'));

		return $result;

	}

	public function get_data_page_support(){

		$result['support_module_title']=$this->_object_lang->exsec_string->str_upper(lang('support_module_title'));
		$result['support_module_hotline']=$this->_object_lang->exsec_string->str_upper(lang('support_module_hotline'));

		return $result;

	}

	public function get_data_page_partner(){

		$result['partner_module_title']=$this->_object_lang->exsec_string->str_upper(lang('partner_module_title'));

		return $result;

	}

	public function get_data_page_weblink(){

		$result['weblink_module_title']=$this->_object_lang->exsec_string->str_upper(lang('weblink_module_title'));
		$result['weblink_module_select']=$this->_object_lang->exsec_string->str_ucfirst(lang('weblink_module_select'));

		return $result;

	}

	public function get_data_page_utility(){

		$result['utility_module_title']=$this->_object_lang->exsec_string->str_upper(lang('utility_module_title'));
		$result['utility_module_select']=$this->_object_lang->exsec_string->str_ucfirst(lang('utility_module_select'));

		return $result;

	}

	public function get_data_page_video(){

		$result['video_module_title']=$this->_object_lang->exsec_string->str_upper(lang('video_module_title'));

		return $result;

	}

	public function get_data_page_members(){

		$result['members_module_title']=$this->_object_lang->exsec_string->str_upper(lang('members_module_title'));

		return $result;

	}

	public function get_data_page_cart(){

		$result['cart_module_title']=$this->_object_lang->exsec_string->str_upper(lang('cart_module_title'));
		$result['cart_module_quantity']=$this->_object_lang->exsec_string->str_ucfirst(lang('cart_module_quantity'));
		$result['cart_module_total']=$this->_object_lang->exsec_string->str_ucfirst(lang('cart_module_total'));
		$result['cart_module_button_cart']=$this->_object_lang->exsec_string->str_ucfirst(lang('cart_module_button_cart'));
		$result['cart_module_button_delivery']=$this->_object_lang->exsec_string->str_ucfirst(lang('cart_module_button_delivery'));

		return $result;

	}

	public function get_data_page_static(){

		$result['static_module_title']=$this->_object_lang->exsec_string->str_upper(lang('static_module_title'));
		$result['static_module_online']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_online'));
		$result['static_module_today']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_today'));
		$result['static_module_yesterday']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_yesterday'));
		$result['static_module_week']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_week'));
		$result['static_module_month']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_month'));
		$result['static_module_year']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_year'));
		$result['static_module_count']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_count'));

		return $result;

	}

	public function get_data_page_facebook(){

		$result['facebook_module_title']=$this->_object_lang->exsec_string->str_upper(lang('facebook_module_title'));

		return $result;

	}

	/* ============================= Data Middle ============================ */

	/* --------------------------------- Home ------------------------------- */

	public function get_data_page_home(){

		$result['home_index_product_new']=$this->_object_lang->exsec_string->str_upper(lang('home_index_product_new'));
		$result['home_index_product_view']=$this->_object_lang->exsec_string->str_upper(lang('home_index_product_view'));
		$result['home_index_product_prominent']=$this->_object_lang->exsec_string->str_upper(lang('home_index_product_prominent'));
		$result['home_index_product_buy']=$this->_object_lang->exsec_string->str_upper(lang('home_index_product_buy'));

		$result['product_price']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_price'));
		$result['label_general_read_more']=$this->_object_lang->exsec_string->str_ucfirst(lang('label_general_read_more'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	/* ------------------------------- Contact ------------------------------ */

	public function get_data_page_contact_index(){

		$result['contact_index_title']=$this->_object_lang->exsec_string->str_upper(lang('contact_index_title'));
		$result['contact_company']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_company'));
		$result['contact_email']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_email'));
		$result['contact_name']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_name'));
		$result['contact_address']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_address'));
		$result['contact_phone']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_phone'));
		$result['contact_header']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_header'));
		$result['contact_content']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_content'));
		$result['contact_attachment']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_attachment'));

		$result['contact_index_info']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_index_info'));
		$result['info_captcha_label']=$this->_object_lang->exsec_string->str_ucfirst(lang('info_captcha_label'));
		$result['contact_index_send_me']=$this->_object_lang->exsec_string->str_ucfirst(lang('contact_index_send_me'));
		$result['contact_index_send']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_index_send'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	/* ------------------------------ Introduce ----------------------------- */

	public function get_data_page_intro_about(){

		$result['introduce_about_title']=$this->_object_lang->exsec_string->str_upper(lang('introduce_about_title'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_intro_service(){

		$result['introduce_service_title']=$this->_object_lang->exsec_string->str_upper(lang('introduce_service_title'));

		$result['contact_index_title']=$this->_object_lang->exsec_string->str_upper(lang('contact_index_title'));
		$result['contact_company']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_company'));
		$result['contact_email']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_email'));
		$result['contact_name']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_name'));
		$result['contact_address']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_address'));
		$result['contact_phone']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_phone'));
		$result['contact_header']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_header'));
		$result['contact_content']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_content'));
		$result['contact_attachment']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_attachment'));

		$result['contact_index_info']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_index_info'));
		$result['info_captcha_label']=$this->_object_lang->exsec_string->str_ucfirst(lang('info_captcha_label'));
		$result['contact_index_send_me']=$this->_object_lang->exsec_string->str_ucfirst(lang('contact_index_send_me'));
		$result['contact_index_send']=$this->_object_lang->exsec_string->str_ucwords(lang('contact_index_send'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_intro_customer(){

		$result['introduce_customer_title']=$this->_object_lang->exsec_string->str_upper(lang('introduce_customer_title'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	/* ------------------------------- Article ------------------------------ */

	public function get_data_page_news_search_general(){

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['article_search_title']=$this->_object_lang->exsec_string->str_ucwords(lang('article_search_title'));
		$result['message_system_search']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_search'));

		return $result;

	}

	public function get_data_page_news_search(){

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['article_search_title']=$this->_object_lang->exsec_string->str_ucwords(lang('article_search_title'));
		$result['message_system_search']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_search'));

		return $result;

	}

	public function get_data_page_article_class($news_class){

		$result['article_class_title']='';
		$result['article_class_keyword']='';
		$result['article_class_description']='';

		switch($news_class){
			case 'article':
				$result['article_class_title']=$this->_object_lang->exsec_string->str_upper(lang('news_class_title_article'));
				$result['article_class_keyword']=$this->_object_lang->exsec_string->str_upper(lang('news_class_keyword_article'));
				$result['article_class_description']=$this->_object_lang->exsec_string->str_upper(lang('news_class_description_article'));
				break;

			case 'seminar':
				$result['article_class_title']=$this->_object_lang->exsec_string->str_upper(lang('news_class_title_seminar'));
				$result['article_class_keyword']=$this->_object_lang->exsec_string->str_upper(lang('news_class_keyword_seminar'));
				$result['article_class_description']=$this->_object_lang->exsec_string->str_upper(lang('news_class_description_seminar'));
				break;

			case 'customer':
				$result['article_class_title']=$this->_object_lang->exsec_string->str_upper(lang('news_class_title_customer'));
				$result['article_class_keyword']=$this->_object_lang->exsec_string->str_upper(lang('news_class_keyword_customer'));
				$result['article_class_description']=$this->_object_lang->exsec_string->str_upper(lang('news_class_description_customer'));
				break;
		}

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_article_class_one(){

		$result['article_class_title']=$this->_object_lang->exsec_string->str_upper(lang('news_class_title'));
		$result['article_class_keyword']=$this->_object_lang->exsec_string->str_upper(lang('news_class_keyword'));
		$result['article_class_description']=$this->_object_lang->exsec_string->str_upper(lang('news_class_description'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_article_category(){

		$result['news_category_title']=$this->_object_lang->exsec_string->str_upper(lang('news_category_title'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_article_detail(){

		$result['news_detail_title']=$this->_object_lang->exsec_string->str_upper(lang('news_detail_title'));
		$result['news_detail_involved']=$this->_object_lang->exsec_string->str_ucwords(lang('news_detail_involved'));
		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	/* ------------------------------- Product ------------------------------ */

	public function get_data_page_product_search_general(){

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['product_search_title']=$this->_object_lang->exsec_string->str_ucwords(lang('product_search_title'));
		$result['message_system_search']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_search'));

		$result['product_price']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_price'));

		return $result;

	}

	public function get_data_page_product_search(){

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['product_search_title']=$this->_object_lang->exsec_string->str_ucwords(lang('product_search_title'));
		$result['message_system_search']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_search'));

		$result['product_price']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_price'));

		return $result;

	}

	public function get_data_page_product_class($product_class){

		switch($product_class){
			case 'product':
				$result['product_class_title']=$this->_object_lang->exsec_string->str_upper(lang('product_class_title_product'));
				$result['product_class_keyword']=$this->_object_lang->exsec_string->str_upper(lang('product_class_keyword_product'));
				$result['product_class_description']=$this->_object_lang->exsec_string->str_upper(lang('product_class_description_product'));
				break;

			default:
				$result['product_class_title']='';
				$result['product_class_keyword']='';
				$result['product_class_description']='';
		}

		$result['product_price']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_price'));

		$result['label_general_read_all']=$this->_object_lang->exsec_string->str_ucfirst(lang('label_general_read_all'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_product_class_one(){

		$result['product_class_title']=$this->_object_lang->exsec_string->str_upper(lang('product_class_title'));
		$result['product_class_keyword']=$this->_object_lang->exsec_string->str_upper(lang('product_class_keyword'));
		$result['product_class_description']=$this->_object_lang->exsec_string->str_upper(lang('product_class_description'));

		$result['product_price']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_price'));

		$result['label_general_read_all']=$this->_object_lang->exsec_string->str_ucfirst(lang('label_general_read_all'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_product_category(){

		$result['product_category_title']=$this->_object_lang->exsec_string->str_upper(lang('product_category_title'));
		$result['product_price']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_price'));

		$result['label_general_read_all']=$this->_object_lang->exsec_string->str_ucfirst(lang('label_general_read_all'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_product_partner(){

		$result['product_partner_title']=$this->_object_lang->exsec_string->str_upper(lang('product_partner_title'));
		$result['product_price']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_price'));

		$result['label_general_read_all']=$this->_object_lang->exsec_string->str_ucfirst(lang('label_general_read_all'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_product_application(){

		$result['product_application_title']=$this->_object_lang->exsec_string->str_upper(lang('product_application_title'));
		$result['product_price']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_price'));

		$result['label_general_read_all']=$this->_object_lang->exsec_string->str_ucfirst(lang('label_general_read_all'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_product_detail(){

		$result['product_detail_title']=$this->_object_lang->exsec_string->str_upper(lang('product_detail_title'));
		$result['product_id']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_id'));
		$result['product_category']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_category'));
		$result['product_price']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_price'));
		$result['product_price_old']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_price_old'));

		$result['product_detail_page_view']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_detail_page_view'));
		$result['product_detail_sold_out']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_detail_sold_out'));
		$result['product_detail_create_date']=$this->_object_lang->exsec_string->str_lower(lang('product_detail_create_date'));
		$result['product_detail_add_cart']=$this->_object_lang->exsec_string->str_ucwords(lang('product_detail_add_cart'));

		$result['product_detail_feature']=$this->_object_lang->exsec_string->str_upper(lang('product_detail_feature'));
		$result['product_detail_related']=$this->_object_lang->exsec_string->str_upper(lang('product_detail_related'));
		$result['product_detail_comment']=$this->_object_lang->exsec_string->str_upper(lang('product_detail_comment'));
		$result['home_index_product_new']=$this->_object_lang->exsec_string->str_upper(lang('home_index_product_new'));
		$result['home_index_product_view']=$this->_object_lang->exsec_string->str_upper(lang('home_index_product_view'));
		$result['home_index_product_prominent']=$this->_object_lang->exsec_string->str_upper(lang('home_index_product_prominent'));
		$result['home_index_product_buy']=$this->_object_lang->exsec_string->str_upper(lang('home_index_product_buy'));

		$result['info_comment']=$this->_object_lang->exsec_string->str_upper(lang('info_comment'));
		$result['comment_name']=$this->_object_lang->exsec_string->str_ucfirst(lang('comment_name'));
		$result['comment_email']=$this->_object_lang->exsec_string->str_ucfirst(lang('comment_email'));
		$result['comment_title']=$this->_object_lang->exsec_string->str_ucfirst(lang('comment_title'));
		$result['comment_captcha']=$this->_object_lang->exsec_string->str_ucfirst(lang('comment_captcha'));
		$result['comment_content']=$this->_object_lang->exsec_string->str_ucfirst(lang('comment_content'));
		$result['button_comment_send']=$this->_object_lang->exsec_string->str_ucwords(lang('button_comment_send'));
		$result['button_comment_reset']=$this->_object_lang->exsec_string->str_ucwords(lang('button_comment_reset'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));

		return $result;

	}

	/* -------------------------------- Video ------------------------------- */

	public function get_data_page_video_class($video_class){

		switch($video_class){
			case 'video':
				$result['video_class_title']=$this->_object_lang->exsec_string->str_upper(lang('video_class_title_video'));
				$result['video_class_keyword']=$this->_object_lang->exsec_string->str_upper(lang('video_class_keyword_video'));
				$result['video_class_description']=$this->_object_lang->exsec_string->str_upper(lang('video_class_description_video'));
				break;

			default:
				$result['video_class_title']='';
				$result['video_class_keyword']='';
				$result['video_class_description']='';
		}

		$result['video_create_date']=$this->_object_lang->exsec_string->str_ucfirst(lang('video_create_date'));
		$result['video_update_date']=$this->_object_lang->exsec_string->str_ucfirst(lang('video_update_date'));

		$result['label_general_read_all']=$this->_object_lang->exsec_string->str_ucfirst(lang('label_general_read_all'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_video_category(){

		$result['video_category_title']=$this->_object_lang->exsec_string->str_upper(lang('video_category_title'));
		$result['video_create_date']=$this->_object_lang->exsec_string->str_ucfirst(lang('video_create_date'));
		$result['video_update_date']=$this->_object_lang->exsec_string->str_ucfirst(lang('video_update_date'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_video_detail(){

		$result['video_detail_title']=$this->_object_lang->exsec_string->str_upper(lang('video_detail_title'));
		$result['video_detail_involved']=$this->_object_lang->exsec_string->str_ucwords(lang('video_detail_involved'));
		$result['video_create_date']=$this->_object_lang->exsec_string->str_ucfirst(lang('video_create_date'));
		$result['video_update_date']=$this->_object_lang->exsec_string->str_ucfirst(lang('video_update_date'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	/* ------------------------------- Member ------------------------------- */

	public function get_data_page_members_login(){

		$result['members_module_title']=$this->_object_lang->exsec_string->str_ucwords(lang('members_module_title'));

		$result['members_module_account']=$this->_object_lang->exsec_string->str_ucwords(lang('members_module_account'));
		$result['members_module_pass']=$this->_object_lang->exsec_string->str_ucwords(lang('members_module_pass'));
		$result['members_module_button_login']=$this->_object_lang->exsec_string->str_ucwords(lang('members_module_button_login'));
		$result['members_module_register']=$this->_object_lang->exsec_string->str_ucfirst(lang('members_module_register'));
		$result['members_module_forgot']=$this->_object_lang->exsec_string->str_ucfirst(lang('members_module_forgot'));

		$result['members_module_welcome']=$this->_object_lang->exsec_string->str_ucwords(lang('members_module_welcome'));
		$result['members_module_update_profile']=$this->_object_lang->exsec_string->str_ucfirst(lang('members_module_update_profile'));
		$result['members_module_view_order']=$this->_object_lang->exsec_string->str_ucfirst(lang('members_module_view_order'));
		$result['members_module_logout']=$this->_object_lang->exsec_string->str_ucwords(lang('members_module_logout'));

		return $result;

	}

	public function get_data_members_register_update($action_name){

		$result['user_account']=$this->_object_lang->exsec_string->str_ucwords(lang('user_account'));
		$result['user_pass']=$this->_object_lang->exsec_string->str_ucwords(lang('user_pass'));
		$result['confirm_user_pass']=$this->_object_lang->exsec_string->str_ucwords(lang('confirm_user_pass'));
		$result['user_email']=$this->_object_lang->exsec_string->str_ucwords(lang('user_email'));
		$result['user_name']=$this->_object_lang->exsec_string->str_ucwords(lang('user_name'));
		$result['user_birthday']=$this->_object_lang->exsec_string->str_ucwords(lang('user_birthday'));
		$result['user_gender']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender'));
		$result['user_address']=$this->_object_lang->exsec_string->str_ucwords(lang('user_address'));
		$result['user_phone']=$this->_object_lang->exsec_string->str_ucwords(lang('user_phone'));
		$result['user_img']=$this->_object_lang->exsec_string->str_ucwords(lang('user_img'));
		$result['user_web']=$this->_object_lang->exsec_string->str_ucwords(lang('user_web'));
		$result['user_fax']=$this->_object_lang->exsec_string->str_ucwords(lang('user_fax'));

		$result['info_user_register']=$this->_object_lang->exsec_string->str_ucwords(lang('info_user_register'));
		$result['info_user_update']=$this->_object_lang->exsec_string->str_ucwords(lang('info_user_update'));
		$result['info_user_account']=$this->_object_lang->exsec_string->str_ucwords(lang('info_user_account'));
		$result['info_user_member']=$this->_object_lang->exsec_string->str_ucwords(lang('info_user_member'));
		$result['user_male']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender_male'));
		$result['user_female']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender_female'));
		$result['message_confirm']=$this->_object_lang->exsec_string->str_ucfirst(lang('error_confirm_pass_js'));
		$result['info_captcha_label']=$this->_object_lang->exsec_string->str_ucfirst(lang('info_captcha_label'));

		$result['button_member_register']=$this->_object_lang->exsec_string->str_ucwords(lang('button_member_register'));
		$result['button_member_update']=$this->_object_lang->exsec_string->str_ucwords(lang('button_member_update'));
		$result['button_member_reset']=$this->_object_lang->exsec_string->str_ucwords(lang('button_member_reset'));
		$result['button_image']=$this->_object_lang->exsec_string->str_ucwords(lang('button_image'));

		$result['action_name']=$action_name;

		return $result;

	}

	/* ----------------------------- Membership ----------------------------- */

	public function get_data_membership_register_update($action_name){

		$result['membership_email']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_email'));
		$result['membership_name']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_name'));
		$result['membership_gender']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_gender'));
		$result['membership_birthday']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_birthday'));
		$result['membership_phone']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_phone'));
		$result['membership_address']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_address'));
		$result['career_category']=$this->_object_lang->exsec_string->str_ucwords(lang('career_category'));
		$result['province_category']=$this->_object_lang->exsec_string->str_ucwords(lang('city_category'));
		$result['district_category']=$this->_object_lang->exsec_string->str_ucwords(lang('district_category'));
		$result['membership_img']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_img'));
		$result['membership_public']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_public'));
		$result['membership_order']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_order'));

		$result['info_membership_register']=$this->_object_lang->exsec_string->str_ucwords(lang('info_membership_register'));
		$result['info_membership_update']=$this->_object_lang->exsec_string->str_ucwords(lang('info_membership_update'));
		$result['user_male']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender_male'));
		$result['user_female']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender_female'));
		$result['info_captcha_label']=$this->_object_lang->exsec_string->str_ucfirst(lang('info_captcha_label'));

		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['button_membership_register']=$this->_object_lang->exsec_string->str_ucwords(lang('button_membership_register'));
		$result['button_membership_update']=$this->_object_lang->exsec_string->str_ucwords(lang('button_membership_update'));
		$result['button_membership_reset']=$this->_object_lang->exsec_string->str_ucwords(lang('button_membership_reset'));
		$result['button_image']=$this->_object_lang->exsec_string->str_ucwords(lang('button_image'));

		$result['action_name']=$action_name;

		return $result;

	}

	public function get_data_membership_card($action_name){

		$result['card_barcode']=$this->_object_lang->exsec_string->str_ucwords(lang('card_barcode'));

		$result['membership_email']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_email'));
		$result['membership_name']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_name'));
		$result['membership_gender']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_gender'));
		$result['membership_birthday']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_birthday'));
		$result['membership_phone']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_phone'));
		$result['membership_address']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_address'));
		$result['career_category']=$this->_object_lang->exsec_string->str_ucwords(lang('career_category'));
		$result['province_category']=$this->_object_lang->exsec_string->str_ucwords(lang('city_category'));
		$result['district_category']=$this->_object_lang->exsec_string->str_ucwords(lang('district_category'));
		$result['membership_img']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_img'));
		$result['membership_public']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_public'));
		$result['membership_order']=$this->_object_lang->exsec_string->str_ucwords(lang('membership_order'));

		$result['info_membership_card']=$this->_object_lang->exsec_string->str_ucwords(lang('info_membership_card'));
		$result['user_male']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender_male'));
		$result['user_female']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender_female'));
		$result['info_captcha_label']=$this->_object_lang->exsec_string->str_ucfirst(lang('info_captcha_label'));

		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['button_image']=$this->_object_lang->exsec_string->str_ucwords(lang('button_image'));

		$result['action_name']=$action_name;

		return $result;

	}

	public function get_data_membership_district(){

		$result['district_category']=$this->_object_lang->exsec_string->str_ucwords(lang('district_category'));
		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));

		return $result;

	}

	/* ------------------------------ Facebook ------------------------------ */

	public function get_data_page_facebook_themelogin(){

		$result['facebook_themelogin_title']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_themelogin_title'));

		$result['card_barcode']=$this->_object_lang->exsec_string->str_ucwords(lang('card_barcode'));
		$result['card_uid']=$this->_object_lang->exsec_string->str_ucwords(lang('card_uid'));
		$result['card_serial']=$this->_object_lang->exsec_string->str_ucwords(lang('card_serial'));
		$result['card_version']=$this->_object_lang->exsec_string->str_ucwords(lang('card_version'));
		$result['card_issue_date']=$this->_object_lang->exsec_string->str_ucwords(lang('card_issue_date'));
		$result['card_email']=$this->_object_lang->exsec_string->str_ucwords(lang('card_email'));

		return $result;

	}

	public function get_data_page_facebook_themedefault(){

		$result['facebook_themedefault_title']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_themedefault_title'));

		$result['card_barcode']=$this->_object_lang->exsec_string->str_ucwords(lang('card_barcode'));
		$result['card_uid']=$this->_object_lang->exsec_string->str_ucwords(lang('card_uid'));
		$result['card_serial']=$this->_object_lang->exsec_string->str_ucwords(lang('card_serial'));
		$result['card_version']=$this->_object_lang->exsec_string->str_ucwords(lang('card_version'));
		$result['card_issue_date']=$this->_object_lang->exsec_string->str_ucwords(lang('card_issue_date'));
		$result['card_email']=$this->_object_lang->exsec_string->str_ucwords(lang('card_email'));

		return $result;

	}

	public function get_data_page_facebook_themelike(){

		$result['facebook_themelike_title']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_themelike_title'));

		$result['card_barcode']=$this->_object_lang->exsec_string->str_ucwords(lang('card_barcode'));
		$result['card_uid']=$this->_object_lang->exsec_string->str_ucwords(lang('card_uid'));
		$result['card_serial']=$this->_object_lang->exsec_string->str_ucwords(lang('card_serial'));
		$result['card_version']=$this->_object_lang->exsec_string->str_ucwords(lang('card_version'));
		$result['card_issue_date']=$this->_object_lang->exsec_string->str_ucwords(lang('card_issue_date'));
		$result['card_email']=$this->_object_lang->exsec_string->str_ucwords(lang('card_email'));

		return $result;

	}

	public function get_data_page_facebook_themewebcam(){

		$result['facebook_themewebcam_title']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_themewebcam_title'));

		$result['card_barcode']=$this->_object_lang->exsec_string->str_ucwords(lang('card_barcode'));
		$result['card_uid']=$this->_object_lang->exsec_string->str_ucwords(lang('card_uid'));
		$result['card_serial']=$this->_object_lang->exsec_string->str_ucwords(lang('card_serial'));
		$result['card_version']=$this->_object_lang->exsec_string->str_ucwords(lang('card_version'));
		$result['card_issue_date']=$this->_object_lang->exsec_string->str_ucwords(lang('card_issue_date'));
		$result['card_email']=$this->_object_lang->exsec_string->str_ucwords(lang('card_email'));

		return $result;

	}

	public function get_data_page_facebook_themephoto(){

		$result['facebook_themephoto_title']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_themephoto_title'));

		$result['card_barcode']=$this->_object_lang->exsec_string->str_ucwords(lang('card_barcode'));
		$result['card_uid']=$this->_object_lang->exsec_string->str_ucwords(lang('card_uid'));
		$result['card_serial']=$this->_object_lang->exsec_string->str_ucwords(lang('card_serial'));
		$result['card_version']=$this->_object_lang->exsec_string->str_ucwords(lang('card_version'));
		$result['card_issue_date']=$this->_object_lang->exsec_string->str_ucwords(lang('card_issue_date'));
		$result['card_email']=$this->_object_lang->exsec_string->str_ucwords(lang('card_email'));

		return $result;

	}

	/* ------------------------------- Comment ------------------------------ */

	public function get_data_page_comment_show(){

		$result['info_comment']=$this->_object_lang->exsec_string->str_upper(lang('info_comment'));
		$result['comment_name']=$this->_object_lang->exsec_string->str_ucfirst(lang('comment_name'));
		$result['comment_email']=$this->_object_lang->exsec_string->str_ucfirst(lang('comment_email'));
		$result['comment_title']=$this->_object_lang->exsec_string->str_ucfirst(lang('comment_title'));
		$result['comment_captcha']=$this->_object_lang->exsec_string->str_ucfirst(lang('comment_captcha'));
		$result['comment_content']=$this->_object_lang->exsec_string->str_ucfirst(lang('comment_content'));
		$result['button_comment_send']=$this->_object_lang->exsec_string->str_ucwords(lang('button_comment_send'));
		$result['button_comment_reset']=$this->_object_lang->exsec_string->str_ucwords(lang('button_comment_reset'));

		return $result;

	}

	/* --------------------------------- Cart ------------------------------- */

	public function get_data_page_cart_order($data){

		$result['ajax_show_manager']=$data;
		$result['cart_order_title']=$this->_object_lang->exsec_string->str_upper(lang('cart_order_title'));
		$result['cart_order_product']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_order_product'));
		$result['cart_order_customer']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_order_customer'));
		$result['cart_order_empty']=$this->_object_lang->exsec_string->str_ucfirst(lang('cart_order_empty'));

		$result['cart_order_product_image']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_order_product_image'));
		$result['cart_order_product_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_order_product_delete'));
		$result['cart_order_product_infomation']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_order_product_infomation'));
		$result['cart_order_product_description']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_order_product_description'));
		$result['cart_order_product_subtotal']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_order_product_subtotal'));
		$result['cart_order_product_total']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_order_product_total'));

		$result['product_id']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_id'));
		$result['product_category']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_category'));
		$result['product_price']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_price'));
		$result['product_number']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_number'));
		$result['product_color']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_color'));
		$result['product_size']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_size'));

		$result['order_email']=$this->_object_lang->exsec_string->str_ucwords(lang('order_email'));
		$result['order_name']=$this->_object_lang->exsec_string->str_ucwords(lang('order_name'));
		$result['order_address']=$this->_object_lang->exsec_string->str_ucwords(lang('order_address'));
		$result['order_phone']=$this->_object_lang->exsec_string->str_ucwords(lang('order_phone'));
		$result['order_content']=$this->_object_lang->exsec_string->str_ucwords(lang('order_content'));
		$result['info_captcha_label']=$this->_object_lang->exsec_string->str_ucfirst(lang('info_captcha_label'));
		$result['cart_order_send_me']=$this->_object_lang->exsec_string->str_ucfirst(lang('cart_order_send_me'));
		$result['cart_order_send']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_order_send'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_cart_shopping($data){

		$result['ajax_show_manager']=$data;
		$result['cart_shopping_title']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_title'));
		$result['cart_shopping_empty']=$this->_object_lang->exsec_string->str_ucfirst(lang('cart_shopping_empty'));

		$result['cart_shopping_step_cart']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_step_cart'));
		$result['cart_shopping_step_method']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_step_method'));
		$result['cart_shopping_step_confirm']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_step_confirm'));

		$result['cart_shopping_product_image']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_product_image'));
		$result['cart_shopping_product_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_product_delete'));
		$result['cart_shopping_product_infomation']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_product_infomation'));
		$result['cart_shopping_product_subtotal']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_product_subtotal'));
		$result['cart_shopping_product_total']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_product_total'));

		$result['product_id']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_id'));
		$result['product_category']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_category'));
		$result['product_price']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_price'));
		$result['product_number']=$this->_object_lang->exsec_string->str_ucwords(lang('product_number'));
		$result['product_color']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_color'));
		$result['product_size']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_size'));

		$result['cart_shopping_continue']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_continue'));
		$result['cart_shopping_payment']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_payment'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_cart_method(){

		$result['cart_method_title']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_method_title'));

		$result['cart_shopping_step_cart']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_step_cart'));
		$result['cart_shopping_step_method']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_step_method'));
		$result['cart_shopping_step_confirm']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_step_confirm'));

		$result['cart_method_contact']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_method_contact'));
		$result['cart_method_delivery']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_method_delivery'));
		$result['cart_method_payment']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_method_payment'));
		$result['cart_method_free']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_method_free'));

		$result['order_email']=$this->_object_lang->exsec_string->str_ucwords(lang('order_email'));
		$result['order_name']=$this->_object_lang->exsec_string->str_ucwords(lang('order_name'));
		$result['order_address']=$this->_object_lang->exsec_string->str_ucwords(lang('order_address'));
		$result['order_phone']=$this->_object_lang->exsec_string->str_ucwords(lang('order_phone'));
		$result['order_content']=$this->_object_lang->exsec_string->str_ucwords(lang('order_content'));
		$result['info_captcha_label']=$this->_object_lang->exsec_string->str_ucfirst(lang('info_captcha_label'));
		$result['cart_method_send_me']=$this->_object_lang->exsec_string->str_ucfirst(lang('cart_method_send_me'));

		$result['delivery_name']=$this->_object_lang->exsec_string->str_ucwords(lang('delivery_name'));
		$result['delivery_cost']=$this->_object_lang->exsec_string->str_ucwords(lang('delivery_cost'));
		$result['payment_name']=$this->_object_lang->exsec_string->str_ucwords(lang('payment_name'));
		$result['payment_cost']=$this->_object_lang->exsec_string->str_ucwords(lang('payment_cost'));

		$result['cart_method_prev']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_method_prev'));
		$result['cart_method_next']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_method_next'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_cart_confirm(){

		$result['cart_confirm_title']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_confirm_title'));
		$result['cart_confirm_shopping']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_confirm_shopping'));
		$result['cart_confirm_product']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_confirm_product'));
		$result['cart_confirm_message']=lang('cart_confirm_message');

		$result['cart_shopping_step_cart']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_step_cart'));
		$result['cart_shopping_step_method']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_step_method'));
		$result['cart_shopping_step_confirm']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_step_confirm'));

		$result['cart_shopping_product_image']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_product_image'));
		$result['cart_shopping_product_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_product_delete'));
		$result['cart_shopping_product_infomation']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_product_infomation'));
		$result['cart_shopping_product_subtotal']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_product_subtotal'));
		$result['cart_shopping_product_total']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_shopping_product_total'));

		$result['product_id']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_id'));
		$result['product_category']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_category'));
		$result['product_price']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_price'));
		$result['product_number']=$this->_object_lang->exsec_string->str_ucwords(lang('product_number'));
		$result['product_color']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_color'));
		$result['product_size']=$this->_object_lang->exsec_string->str_ucfirst(lang('product_size'));

		$result['order_email']=$this->_object_lang->exsec_string->str_ucwords(lang('order_email'));
		$result['order_name']=$this->_object_lang->exsec_string->str_ucwords(lang('order_name'));
		$result['order_address']=$this->_object_lang->exsec_string->str_ucwords(lang('order_address'));
		$result['order_phone']=$this->_object_lang->exsec_string->str_ucwords(lang('order_phone'));
		$result['order_content']=$this->_object_lang->exsec_string->str_ucwords(lang('order_content'));

		$result['delivery_name_short']=$this->_object_lang->exsec_string->str_ucwords(lang('delivery_name_short'));
		$result['delivery_cost']=$this->_object_lang->exsec_string->str_ucwords(lang('delivery_cost'));
		$result['payment_name_short']=$this->_object_lang->exsec_string->str_ucwords(lang('payment_name_short'));
		$result['payment_cost']=$this->_object_lang->exsec_string->str_ucwords(lang('payment_cost'));
		$result['cart_method_free']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_method_free'));

		$result['cart_confirm_prev']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_confirm_prev'));
		$result['cart_confirm_next']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_confirm_next'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	public function get_data_page_cart_finish(){

		$result['cart_finish_title']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_finish_title'));
		$result['label_general_home']=$this->_object_lang->exsec_string->str_ucwords(lang('label_general_home'));
		$result['cart_finish_home']=$this->_object_lang->exsec_string->str_ucwords(lang('cart_finish_home'));

		$result['message_system_title']=$this->_object_lang->exsec_string->str_upper(lang('message_system_title'));
		$result['message_system_update']=$this->_object_lang->exsec_string->str_ucfirst(lang('message_system_update'));

		return $result;

	}

	/* ============================= Data Footer ============================ */

	public function get_data_page_footer(){

		$result['support_module_hotline']=$this->_object_lang->exsec_string->str_upper(lang('support_module_hotline'));

		$result['footer_menu_module_title']=$this->_object_lang->exsec_string->str_upper(lang('footer_menu_module_title'));

		$result['footer_customer_support_module_title']=$this->_object_lang->exsec_string->str_upper(lang('footer_customer_support_module_title'));

		$result['static_module_title']=$this->_object_lang->exsec_string->str_upper(lang('static_module_title'));
		$result['static_module_online']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_online'));
		$result['static_module_today']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_today'));
		$result['static_module_yesterday']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_yesterday'));
		$result['static_module_week']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_week'));
		$result['static_module_month']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_month'));
		$result['static_module_year']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_year'));
		$result['static_module_count']=$this->_object_lang->exsec_string->str_ucfirst(lang('static_module_count'));

		return $result;

	}

}

?>