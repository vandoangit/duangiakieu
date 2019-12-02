<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

Class Language{

	private $_object_lang;
	private $_lang;
	public $sess_lang="lang_id";

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
		$this->_object_lang->lang->load($this->_lang,$this->_lang."/".ADMIN_DIR_ROOT);

	}

	public function get_data_page_login($data_error){

		if(isset($data_error['error']) && ($data_error['error'])){

			if(lang($data_error['error']))
				$result['info_login']['messages']=lang($data_error['error']);
			else
				$result['info_login']['messages']=$data_error['error'];
		}
		else
			$result['info_login']['messages']="";

		$result['info_login']['login_title']=$this->_object_lang->exsec_string->str_ucwords(lang('login_title'));
		$result['info_login']['sub_lang']=$this->_lang;
		$result['info_login']['login_company']=$this->_object_lang->exsec_string->str_ucwords(lang('login_company'));
		$result['info_login']['login_welcome']=lang('login_welcome');
		$result['info_login']['login_account']=$this->_object_lang->exsec_string->str_ucwords(lang('login_account'));
		$result['info_login']['login_pass']=$this->_object_lang->exsec_string->str_ucwords(lang('login_pass'));
		$result['info_login']['login_lang']=$this->_object_lang->exsec_string->str_ucwords(lang('login_lang'));
		$result['info_login']['number_lang']=array(
			array('lang_key'=>'vi','lang_name'=>$this->_object_lang->exsec_string->str_ucwords(lang('login_lang_name1'))),
			array('lang_key'=>'vi','lang_name'=>$this->_object_lang->exsec_string->str_ucwords(lang('login_lang_name2'))),
			array('lang_key'=>'en','lang_name'=>$this->_object_lang->exsec_string->str_ucwords(lang('login_lang_name3'))),
		);
		$result['info_login']['login_button']=$this->_object_lang->exsec_string->str_ucwords(lang('login_button'));
		$result['info_login']['login_footer']=lang('login_footer');

		return $result;

	}

	public function get_data_page_home(){

		$result['sub_lang']=$this->_lang;
		$result['home_title']=$this->_lang;
		return $result;

	}

	public function get_data_page_header(){

		$result['alert_authorization_change_user']=lang('alert_authorization_change_user');

		$result['marquee_content_header']=lang('marquee_content_header');
		$result['label_welcome_user']=$this->_object_lang->exsec_string->str_ucwords(lang('label_welcome_user'));
		$result['visitsite_font_end']=$this->_object_lang->exsec_string->str_ucwords(lang('visitsite_font_end'));
		$result['exit_admin']=$this->_object_lang->exsec_string->str_ucwords(lang('exit_admin'));

		return $result;

	}

	public function get_data_page_footer(){

		$result['footer_admin']=lang('footer_admin');

		return $result;

	}

	// 1 Xac  nhan hoan thanh    
	public function get_data_user_control($data){

		$result['ajax_show_manager']=$data;
		if(!$data){

			$result['alert_authorization_add_user']=lang('alert_authorization_add_user');
			$result['alert_authorization_delete_user']=lang('alert_authorization_delete_user');
			$result['alert_authorization_update_user']=lang('alert_authorization_update_user');
			$result['alert_authorization_author_user']=lang('alert_authorization_author_user');

			$result['user_control_filter']=$this->_object_lang->exsec_string->str_ucwords(lang('user_control_filter'));
			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));

			$result['user_account']=$this->_object_lang->exsec_string->str_ucwords(lang('user_account'));
			$result['user_name']=$this->_object_lang->exsec_string->str_ucwords(lang('user_name'));
			$result['user_gender']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender'));
			$result['user_email']=$this->_object_lang->exsec_string->str_ucwords(lang('user_email'));
			$result['user_last_login']=$this->_object_lang->exsec_string->str_ucwords(lang('user_last_login'));
			$result['user_create_date']=$this->_object_lang->exsec_string->str_ucwords(lang('user_create_date'));
		}

		$result['user_phone']=$this->_object_lang->exsec_string->str_ucfirst(lang('user_phone'));
		$result['user_male']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender_male'));
		$result['user_female']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender_female'));

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));
		$result['action_authorization']=$this->_object_lang->exsec_string->str_ucwords(lang('action_authorization'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_user_add_update($action_name){

		$result['user_account']=$this->_object_lang->exsec_string->str_ucwords(lang('user_account'));
		$result['user_pass']=$this->_object_lang->exsec_string->str_ucwords(lang('user_pass'));
		$result['confirm_user_pass']=$this->_object_lang->exsec_string->str_ucwords(lang('confirm_user_pass'));
		$result['user_email']=$this->_object_lang->exsec_string->str_ucwords(lang('user_email'));
		$result['user_name']=$this->_object_lang->exsec_string->str_ucwords(lang('user_name'));
		$result['user_birthday']=$this->_object_lang->exsec_string->str_ucwords(lang('user_birthday'));
		$result['user_gender']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender'));
		$result['user_address']=$this->_object_lang->exsec_string->str_ucwords(lang('user_address'));
		$result['user_phone']=$this->_object_lang->exsec_string->str_ucwords(lang('user_phone'));
		$result['user_directory']=$this->_object_lang->exsec_string->str_ucwords(lang('user_directory'));
		$result['user_img']=$this->_object_lang->exsec_string->str_ucwords(lang('user_img'));
		$result['user_web']=$this->_object_lang->exsec_string->str_ucwords(lang('user_web'));
		$result['user_fax']=$this->_object_lang->exsec_string->str_ucwords(lang('user_fax'));

		$result['info_user']=$this->_object_lang->exsec_string->str_ucwords(lang('info_user'));
		$result['user_male']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender_male'));
		$result['user_female']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender_female'));
		$result['message_confirm']=$this->_object_lang->exsec_string->str_ucfirst(lang('error_admin_confirm_pass'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['button_image']=$this->_object_lang->exsec_string->str_ucwords(lang('button_image'));
		$result['action_name']=$action_name;

		return $result;

	}

	// 3 Xac  nhan hoan thanh
	public function get_data_user_authorization($data){

		$result['ajax_show_manager']=$data;

		if(!$data){

			$result['user_group_name']=$this->_object_lang->exsec_string->str_ucwords(lang('user_group_name'));

			$result['user_name']=$this->_object_lang->exsec_string->str_ucwords(lang('user_name'));
			$result['user_account']=$this->_object_lang->exsec_string->str_ucwords(lang('user_account'));
			$result['user_gender']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender'));
			$result['user_birthday']=$this->_object_lang->exsec_string->str_ucwords(lang('user_birthday'));
			$result['user_phone']=$this->_object_lang->exsec_string->str_ucwords(lang('user_phone'));
			$result['user_email']=$this->_object_lang->exsec_string->str_ucwords(lang('user_email'));
			$result['user_address']=$this->_object_lang->exsec_string->str_ucwords(lang('user_address'));
			$result['user_web']=$this->_object_lang->exsec_string->str_ucwords(lang('user_web'));
			$result['user_fax']=$this->_object_lang->exsec_string->str_ucwords(lang('user_fax'));

			$result['user_authorization_info_user']=$this->_object_lang->exsec_string->str_ucwords(lang('user_authorization_info_user'));
			$result['user_authorization_info_add']=$this->_object_lang->exsec_string->str_ucwords(lang('user_authorization_info_add'));
			$result['user_authorization_select_group']=$this->_object_lang->exsec_string->str_ucwords(lang('user_authorization_select_group'));
			$result['user_male']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender_male'));
			$result['user_female']=$this->_object_lang->exsec_string->str_ucwords(lang('user_gender_female'));
			$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));

			$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
			$result['authorization_add']=$this->_object_lang->exsec_string->str_ucwords(lang('authorization_add'));
		}

		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));

		return $result;

	}

	//  1 Xac  nhan hoan thanh
	public function get_data_user_group_control($data){

		$result['ajax_show_manager']=$data;
		if(!$data){

			$result['alert_authorization_manager_user']=lang('alert_authorization_manager_user');

			$result['alert_authorization_add_user_group']=lang('alert_authorization_add_user_group');
			$result['alert_authorization_delete_user_group']=lang('alert_authorization_delete_user_group');
			$result['alert_authorization_update_user_group']=lang('alert_authorization_update_user_group');
			$result['alert_authorization_author_user_group']=lang('alert_authorization_author_user_group');

			$result['user_group_name']=$this->_object_lang->exsec_string->str_ucwords(lang('user_group_name'));
			$result['user_group_id']=$this->_object_lang->exsec_string->str_upper(lang('user_group_id'));
			$result['user_group_create_date']=$this->_object_lang->exsec_string->str_ucwords(lang('user_group_create_date'));
		}

		$result['user_group_detail']=$this->_object_lang->exsec_string->str_ucwords(lang('user_group_detail'));

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));
		$result['action_authorization']=$this->_object_lang->exsec_string->str_ucwords(lang('action_authorization'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_user_group_add_update($action_name){

		$result['user_group_name']=$this->_object_lang->exsec_string->str_ucwords(lang('user_group_name'));

		$result['info_user_group']=$this->_object_lang->exsec_string->str_ucwords(lang('info_user_group'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;

		return $result;

	}

	// 3 Xac  nhan hoan thanh
	public function get_data_user_group_authorization($data){

		$result['ajax_show_manager']=$data;

		if(!$data){

			$result['user_group_id']=$this->_object_lang->exsec_string->str_upper(lang('user_group_id'));
			$result['user_group_name']=$this->_object_lang->exsec_string->str_ucwords(lang('user_group_name'));
			$result['user_group_create_date']=$this->_object_lang->exsec_string->str_ucwords(lang('user_group_create_date'));
			$result['user_group_update_date']=$this->_object_lang->exsec_string->str_ucwords(lang('user_group_update_date'));

			$result['group_authorization_label']=$this->_object_lang->exsec_string->str_ucwords(lang('group_authorization_label'));
			$result['group_authorization_info_group']=$this->_object_lang->exsec_string->str_ucwords(lang('group_authorization_info_group'));
			$result['group_authorization_info_add']=$this->_object_lang->exsec_string->str_ucwords(lang('group_authorization_info_add'));
			$result['group_authorization_function']=$this->_object_lang->exsec_string->str_ucwords(lang('group_authorization_function'));

			$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
			$result['authorization_add']=$this->_object_lang->exsec_string->str_ucwords(lang('authorization_add'));
			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));
		}

		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_facebook_control($data){

		$result['ajax_show_manager']=$data;
		if(!$data){

			$result['alert_authorization_add_facebook']=lang('alert_authorization_add_facebook');
			$result['alert_authorization_delete_facebook']=lang('alert_authorization_delete_facebook');
			$result['alert_authorization_update_facebook']=lang('alert_authorization_update_facebook');

			$result['facebook_name']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_name'));
			$result['facebook_user']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_user'));
			$result['facebook_theme']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_theme'));
			$result['facebook_post_bool']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_post_bool'));
			$result['facebook_friend_bool']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_friend_bool'));
			$result['facebook_photo_bool']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_photo_bool'));
			$result['facebook_comment_bool']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_comment_bool'));
			$result['facebook_like_bool']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_like_bool'));
			$result['facebook_like_fanface_bool']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_like_fanface_bool'));
			$result['facebook_public']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_public'));
			$result['facebook_order']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_order'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_facebook_add_update($action_name){

		$result['facebook_name']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_name'));
		$result['facebook_user']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_user'));
		$result['facebook_theme']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_theme'));

		$result['facebook_post_bool']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_post_bool'));
		$result['facebook_post_message']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_post_message'));
		$result['facebook_post_url']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_post_url'));
		$result['facebook_post_title']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_post_title'));
		$result['facebook_post_summary']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_post_summary'));
		$result['facebook_post_image']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_post_image'));

		$result['facebook_friend_bool']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_friend_bool'));
		$result['facebook_friend_id']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_friend_id'));
		$result['facebook_friend_message']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_friend_message'));
		$result['facebook_friend_url']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_friend_url'));
		$result['facebook_friend_title']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_friend_title'));
		$result['facebook_friend_summary']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_friend_summary'));
		$result['facebook_friend_image']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_friend_image'));

		$result['facebook_photo_bool']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_photo_bool'));
		$result['facebook_photo_message']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_photo_message'));
		$result['facebook_photo_image']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_photo_image'));

		$result['facebook_comment_bool']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_comment_bool'));
		$result['facebook_comment_id']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_comment_id'));
		$result['facebook_comment_message']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_comment_message'));

		$result['facebook_like_bool']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_like_bool'));
		$result['facebook_like_id']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_like_id'));

		$result['facebook_like_fanface_bool']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_like_fanface_bool'));
		$result['facebook_like_fanface_id']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_like_fanface_id'));

		$result['facebook_order']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_order'));
		$result['facebook_public']=$this->_object_lang->exsec_string->str_ucwords(lang('facebook_public'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['admin_active']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_active'));
		$result['admin_inactive']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_inactive'));
		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['info_facebook']=lang('info_facebook');

		$result['button_image']=$this->_object_lang->exsec_string->str_ucwords(lang('button_image'));
		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;

		return $result;

	}

	// 1 Xac  nhan hoan thanh    
	public function get_data_category_control($data,$menu_class=''){

		$result['ajax_show_manager']=$data;
		$result['active_menu_class']=$menu_class;
		if(!$data){

			$result['alert_authorization_add_category']=lang('alert_authorization_add_category');
			$result['alert_authorization_delete_category']=lang('alert_authorization_delete_category');
			$result['alert_authorization_update_category']=lang('alert_authorization_update_category');

			$result['cate_control_filter']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_control_filter'));
			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));

			$result['cate_name']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_name'));
			$result['cate_img']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_img'));
			$result['cate_public']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_public'));
			$result['cate_order']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_order'));
			$result['cate_parent']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_parent'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_category_add_update($action_name,$level_menu){

		$result['level_menu']=$level_menu;
		$result['cate_name']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_name'));
		$result['cate_alias']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_alias'));
		$result['cate_img']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_img'));
		$result['cate_public']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_public'));
		$result['cate_order']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_order'));
		$result['cate_parent']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_parent'));
		$result['cate_seo_keyword']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_seo_keyword'));
		$result['cate_seo_description']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_seo_description'));
		$result['cate_attributes_product']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_attributes_product'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['select_cate_root']=$this->_object_lang->exsec_string->str_ucwords(lang('select_cate_root'));
		$result['info_category']=$this->_object_lang->exsec_string->str_ucwords(lang('info_category'));
		$result['info_attributes_product']=$this->_object_lang->exsec_string->str_ucwords(lang('info_attributes_product'));
		$result['note_attributes_product']=$this->_object_lang->exsec_string->str_ucfirst(lang('note_attributes_product'));
		$result['add_attributes_product']=$this->_object_lang->exsec_string->str_ucfirst(lang('add_attributes_product'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['button_image']=$this->_object_lang->exsec_string->str_ucwords(lang('button_image'));
		$result['action_name']=$action_name;

		return $result;

	}

	// 1 Xac  nhan hoan thanh    
	public function get_data_product_control($data,$menu_class='',$bool_active=false){

		$result['ajax_show_manager']=$data;
		$result['active_menu_class']=$menu_class;
		$result['bool_active']=$bool_active;

		if(!$data){

			$result['alert_authorization_add_product']=lang('alert_authorization_add_product');
			$result['alert_authorization_delete_product']=lang('alert_authorization_delete_product');
			$result['alert_authorization_update_product']=lang('alert_authorization_update_product');

			$result['product_control_filter']=$this->_object_lang->exsec_string->str_ucwords(lang('product_control_filter'));
			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));

			$result['product_id']=$this->_object_lang->exsec_string->str_ucwords(lang('product_id'));
			$result['product_name']=$this->_object_lang->exsec_string->str_ucwords(lang('product_name'));
			$result['product_img']=$this->_object_lang->exsec_string->str_ucwords(lang('product_img'));
			$result['product_prominent']=$this->_object_lang->exsec_string->str_ucwords(lang('product_prominent'));
			$result['cate_name']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_name'));
			$result['product_public']=$this->_object_lang->exsec_string->str_ucwords(lang('product_public'));
			$result['product_order']=$this->_object_lang->exsec_string->str_ucwords(lang('product_order'));
			$result['product_number']=$this->_object_lang->exsec_string->str_ucwords(lang('product_number'));
		}

		$result['product_price']=$this->_object_lang->exsec_string->str_ucwords(lang('product_price'));
		$result['product_buy']=$this->_object_lang->exsec_string->str_ucwords(lang('product_buy'));

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_product_add_update($action_name,$menu_class='',$bool_active=false){

		$result['product_id']=$this->_object_lang->exsec_string->str_ucwords(lang('product_id'));
		$result['product_name']=$this->_object_lang->exsec_string->str_ucwords(lang('product_name'));
		$result['product_alias']=$this->_object_lang->exsec_string->str_ucwords(lang('product_alias'));
		$result['product_price']=$this->_object_lang->exsec_string->str_ucwords(lang('product_price'));
		$result['product_price_old']=$this->_object_lang->exsec_string->str_ucwords(lang('product_price_old'));
		$result['product_color']=$this->_object_lang->exsec_string->str_ucwords(lang('product_color'));
		$result['product_img']=$this->_object_lang->exsec_string->str_ucwords(lang('product_img'));
		$result['product_prominent']=$this->_object_lang->exsec_string->str_ucwords(lang('product_prominent'));
		$result['product_number']=$this->_object_lang->exsec_string->str_ucwords(lang('product_number'));
		$result['cate_name']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_name'));
		$result['product_seo_keyword']=$this->_object_lang->exsec_string->str_ucwords(lang('product_seo_keyword'));
		$result['product_seo_description']=$this->_object_lang->exsec_string->str_ucwords(lang('product_seo_description'));
		$result['product_public']=$this->_object_lang->exsec_string->str_ucwords(lang('product_public'));
		$result['product_order']=$this->_object_lang->exsec_string->str_ucwords(lang('product_order'));
		$result['product_pattern']=$this->_object_lang->exsec_string->str_ucwords(lang('product_pattern'));
		$result['product_pattern_select']=$this->_object_lang->exsec_string->str_ucwords(lang('product_pattern_select'));
		$result['product_pattern_update']=$this->_object_lang->exsec_string->str_ucwords(lang('product_pattern_update'));
		$result['product_headline']=$this->_object_lang->exsec_string->str_ucwords(lang('product_headline'));
		$result['product_content']=$this->_object_lang->exsec_string->str_ucwords(lang('product_content'));
		$result['product_partner']=$this->_object_lang->exsec_string->str_ucwords(lang('product_partner'));
		$result['product_application']=$this->_object_lang->exsec_string->str_ucwords(lang('product_application'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['admin_active']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_active'));
		$result['admin_inactive']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_inactive'));
		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['info_product']=$this->_object_lang->exsec_string->str_ucwords(lang('info_product'));
		$result['add_image_product']=$this->_object_lang->exsec_string->str_ucfirst(lang('add_image_product'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['button_image']=$this->_object_lang->exsec_string->str_ucwords(lang('button_image'));
		$result['action_name']=$action_name;
		$result['active_menu_class']=$menu_class;
		$result['bool_active']=$bool_active;

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_product_pattern_control($data){

		$result['ajax_show_manager']=$data;
		if(!$data){

			$result['alert_authorization_add_product_pattern']=lang('alert_authorization_add_product_pattern');
			$result['alert_authorization_delete_product_pattern']=lang('alert_authorization_delete_product_pattern');
			$result['alert_authorization_update_product_pattern']=lang('alert_authorization_update_product_pattern');

			$result['product_pattern_name']=$this->_object_lang->exsec_string->str_ucwords(lang('product_pattern_name'));
			$result['product_pattern_order']=$this->_object_lang->exsec_string->str_ucwords(lang('product_pattern_order'));
			$result['product_pattern_create_date']=$this->_object_lang->exsec_string->str_ucwords(lang('product_pattern_create_date'));
			$result['product_pattern_update_date']=$this->_object_lang->exsec_string->str_ucwords(lang('product_pattern_update_date'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_product_pattern_add_update($action_name){

		$result['product_pattern_name']=$this->_object_lang->exsec_string->str_ucwords(lang('product_pattern_name'));
		$result['product_pattern_content']=$this->_object_lang->exsec_string->str_ucwords(lang('product_pattern_content'));
		$result['product_pattern_order']=$this->_object_lang->exsec_string->str_ucwords(lang('product_pattern_order'));

		$result['info_product_pattern']=$this->_object_lang->exsec_string->str_ucwords(lang('info_product_pattern'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_news_control($data,$menu_class='',$bool_active=false){

		$result['ajax_show_manager']=$data;
		$result['active_menu_class']=$menu_class;
		$result['bool_active']=$bool_active;

		if(!$data){

			$result['alert_authorization_add_news']=lang('alert_authorization_add_news');
			$result['alert_authorization_delete_news']=lang('alert_authorization_delete_news');
			$result['alert_authorization_update_news']=lang('alert_authorization_update_news');

			$result['news_name']=$this->_object_lang->exsec_string->str_ucwords(lang('news_name'));
			$result['cate_sub_name']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_sub_name'));
			$result['cate_name']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_name'));
			$result['news_view']=$this->_object_lang->exsec_string->str_ucwords(lang('news_view'));
			$result['news_active']=$this->_object_lang->exsec_string->str_ucwords(lang('news_active'));
			$result['news_public']=$this->_object_lang->exsec_string->str_ucwords(lang('news_public'));
			$result['news_order']=$this->_object_lang->exsec_string->str_ucwords(lang('news_order'));

			$result['news_control_filter']=$this->_object_lang->exsec_string->str_ucwords(lang('news_control_filter'));
			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_news_add_update($action_name,$bool_active=false){

		$result['news_name']=$this->_object_lang->exsec_string->str_ucwords(lang('news_name'));
		$result['cate_sub_name']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_sub_name'));
		$result['cate_name']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_name'));
		$result['news_alias']=$this->_object_lang->exsec_string->str_ucwords(lang('news_alias'));
		$result['news_active']=$this->_object_lang->exsec_string->str_ucwords(lang('news_active'));
		$result['news_public']=$this->_object_lang->exsec_string->str_ucwords(lang('news_public'));
		$result['news_order']=$this->_object_lang->exsec_string->str_ucwords(lang('news_order'));
		$result['news_img']=$this->_object_lang->exsec_string->str_ucwords(lang('news_img'));
		$result['news_seo_keyword']=$this->_object_lang->exsec_string->str_ucwords(lang('news_seo_keyword'));
		$result['news_seo_description']=$this->_object_lang->exsec_string->str_ucwords(lang('news_seo_description'));
		$result['news_headline']=$this->_object_lang->exsec_string->str_ucwords(lang('news_headline'));
		$result['news_content']=$this->_object_lang->exsec_string->str_ucwords(lang('news_content'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['admin_active']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_active'));
		$result['admin_inactive']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_inactive'));
		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['info_news']=$this->_object_lang->exsec_string->str_ucwords(lang('info_news'));

		$result['button_image']=$this->_object_lang->exsec_string->str_ucwords(lang('button_image'));
		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;
		$result['bool_active']=$bool_active;

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_advertise_control($data,$menu_class='',$bool_active=false){

		$result['ajax_show_manager']=$data;
		$result['active_menu_class']=$menu_class;
		$result['bool_active']=$bool_active;

		if(!$data){

			$result['alert_authorization_add_advertise']=lang('alert_authorization_add_advertise');
			$result['alert_authorization_delete_advertise']=lang('alert_authorization_delete_advertise');
			$result['alert_authorization_update_advertise']=lang('alert_authorization_update_advertise');

			$result['ad_name']=$this->_object_lang->exsec_string->str_ucwords(lang('ad_name'));
			$result['cate_sub_name_ad']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_sub_name_ad'));
			$result['ad_public']=$this->_object_lang->exsec_string->str_ucwords(lang('ad_public'));
			$result['ad_order']=$this->_object_lang->exsec_string->str_ucwords(lang('ad_order'));
			$result['ad_img']=lang('ad_img');
			$result['ad_link']=$this->_object_lang->exsec_string->str_ucwords(lang('ad_link'));
			$result['ad_active']=$this->_object_lang->exsec_string->str_ucwords(lang('ad_active'));

			$result['advertise_control_filter']=$this->_object_lang->exsec_string->str_ucwords(lang('advertise_control_filter'));
			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_advertise_add_update($action_name,$bool_active=false){

		$result['ad_name']=$this->_object_lang->exsec_string->str_ucwords(lang('ad_name'));
		$result['cate_sub_name_ad']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_sub_name_ad'));
		$result['ad_public']=$this->_object_lang->exsec_string->str_ucwords(lang('ad_public'));
		$result['ad_order']=$this->_object_lang->exsec_string->str_ucwords(lang('ad_order'));
		$result['ad_img']=lang('ad_img');
		$result['ad_link']=$this->_object_lang->exsec_string->str_ucwords(lang('ad_link'));
		$result['ad_active']=$this->_object_lang->exsec_string->str_ucwords(lang('ad_active'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['admin_active']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_active'));
		$result['admin_inactive']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_inactive'));
		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['info_advertise']=$this->_object_lang->exsec_string->str_ucwords(lang('info_advertise'));

		$result['button_image']=$this->_object_lang->exsec_string->str_ucwords(lang('button_image'));
		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;
		$result['bool_active']=$bool_active;

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_video_control($data,$menu_class='',$bool_active=false){

		$result['ajax_show_manager']=$data;
		$result['active_menu_class']=$menu_class;
		$result['bool_active']=$bool_active;

		if(!$data){

			$result['alert_authorization_add_video']=lang('alert_authorization_add_video');
			$result['alert_authorization_delete_video']=lang('alert_authorization_delete_video');
			$result['alert_authorization_update_video']=lang('alert_authorization_update_video');

			$result['video_name']=$this->_object_lang->exsec_string->str_ucwords(lang('video_name'));
			$result['cate_sub_name_video']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_sub_name_video'));
			$result['video_description']=$this->_object_lang->exsec_string->str_ucwords(lang('video_description'));
			$result['video_public']=$this->_object_lang->exsec_string->str_ucwords(lang('video_public'));
			$result['video_order']=$this->_object_lang->exsec_string->str_ucwords(lang('video_order'));
			$result['video_file']=$this->_object_lang->exsec_string->str_ucwords(lang('video_file'));
			$result['video_img']=$this->_object_lang->exsec_string->str_ucwords(lang('video_img'));
			$result['video_active']=$this->_object_lang->exsec_string->str_ucwords(lang('video_active'));

			$result['video_control_filter']=$this->_object_lang->exsec_string->str_ucwords(lang('video_control_filter'));
			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_video_add_update($action_name,$bool_active=false){

		$result['video_name']=$this->_object_lang->exsec_string->str_ucwords(lang('video_name'));
		$result['video_alias']=$this->_object_lang->exsec_string->str_ucwords(lang('video_alias'));
		$result['cate_sub_name_video']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_sub_name_video'));
		$result['video_description']=$this->_object_lang->exsec_string->str_ucwords(lang('video_description'));
		$result['video_public']=$this->_object_lang->exsec_string->str_ucwords(lang('video_public'));
		$result['video_order']=$this->_object_lang->exsec_string->str_ucwords(lang('video_order'));
		$result['video_file']=$this->_object_lang->exsec_string->str_ucwords(lang('video_file'));
		$result['video_img']=$this->_object_lang->exsec_string->str_ucwords(lang('video_img'));
		$result['video_active']=$this->_object_lang->exsec_string->str_ucwords(lang('video_active'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['admin_active']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_active'));
		$result['admin_inactive']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_inactive'));
		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['info_video']=$this->_object_lang->exsec_string->str_ucwords(lang('info_video'));

		$result['button_image']=$this->_object_lang->exsec_string->str_ucwords(lang('button_image'));
		$result['button_video']=$this->_object_lang->exsec_string->str_ucwords(lang('button_video'));
		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;
		$result['bool_active']=$bool_active;

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_order_control($data,$menu_class='',$bool_active=false){

		$result['ajax_show_manager']=$data;
		$result['active_menu_class']=$menu_class;
		$result['bool_active']=$bool_active;

		if(!$data){

			$result['alert_authorization_add_order']=lang('alert_authorization_add_order');
			$result['alert_authorization_delete_order']=lang('alert_authorization_delete_order');
			$result['alert_authorization_update_order']=lang('alert_authorization_update_order');

			$result['order_id']=$this->_object_lang->exsec_string->str_ucwords(lang('order_id'));
			$result['order_name']=$this->_object_lang->exsec_string->str_ucwords(lang('order_name'));
			$result['order_address']=$this->_object_lang->exsec_string->str_ucwords(lang('order_address'));
			$result['order_phone']=$this->_object_lang->exsec_string->str_ucwords(lang('order_phone'));
			$result['order_email']=$this->_object_lang->exsec_string->str_ucwords(lang('order_email'));
			$result['cate_name_order']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_name_order'));
			$result['order_total_price']=$this->_object_lang->exsec_string->str_ucwords(lang('order_total_price'));

			$result['order_control_filter']=$this->_object_lang->exsec_string->str_ucwords(lang('order_control_filter'));
			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_order_add_update($action_name,$bool_active=false){

		$result['order_name']=$this->_object_lang->exsec_string->str_ucwords(lang('order_name'));
		$result['order_address']=$this->_object_lang->exsec_string->str_ucwords(lang('order_address'));
		$result['order_phone']=$this->_object_lang->exsec_string->str_ucwords(lang('order_phone'));
		$result['order_email']=$this->_object_lang->exsec_string->str_ucwords(lang('order_email'));
		$result['cate_name_order']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_name_order'));

		$result['delivery_name']=lang('delivery_name');
		$result['payment_name']=lang('payment_name');

		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['info_order']=$this->_object_lang->exsec_string->str_ucwords(lang('info_order'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;
		$result['bool_active']=$bool_active;

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_order_detail_control(){

		$result['order_id']=$this->_object_lang->exsec_string->str_ucwords(lang('order_id'));
		$result['order_name']=$this->_object_lang->exsec_string->str_ucwords(lang('order_name'));
		$result['order_address']=$this->_object_lang->exsec_string->str_ucwords(lang('order_address'));
		$result['order_phone']=$this->_object_lang->exsec_string->str_ucwords(lang('order_phone'));
		$result['order_email']=$this->_object_lang->exsec_string->str_ucwords(lang('order_email'));
		$result['cate_name_order']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_name_order'));
		$result['order_total_price']=$this->_object_lang->exsec_string->str_ucwords(lang('order_total_price'));
		$result['order_create_date']=$this->_object_lang->exsec_string->str_ucwords(lang('order_create_date'));
		$result['order_update_date']=$this->_object_lang->exsec_string->str_ucwords(lang('order_update_date'));

		$result['delivery_name']=lang('delivery_name');
		$result['payment_name']=lang('payment_name');

		$result['info_order_detail']=$this->_object_lang->exsec_string->str_upper(lang('info_order_detail'));
		$result['order_detail_code']=$this->_object_lang->exsec_string->str_ucwords(lang('order_detail_code'));
		$result['order_detail_name']=$this->_object_lang->exsec_string->str_ucwords(lang('order_detail_name'));
		$result['order_detail_price']=$this->_object_lang->exsec_string->str_ucwords(lang('order_detail_price'));
		$result['order_detail_number']=$this->_object_lang->exsec_string->str_ucwords(lang('order_detail_number'));
		$result['order_detail_total_price']=$this->_object_lang->exsec_string->str_ucwords(lang('order_detail_total_price'));

		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_delivery_method_control($data){

		$result['ajax_show_manager']=$data;
		if(!$data){

			$result['alert_authorization_add_delivery']=lang('alert_authorization_add_delivery');
			$result['alert_authorization_delete_delivery']=lang('alert_authorization_delete_delivery');
			$result['alert_authorization_update_delivery']=lang('alert_authorization_update_delivery');

			$result['delivery_name']=lang('delivery_name');
			$result['delivery_cost']=$this->_object_lang->exsec_string->str_ucwords(lang('delivery_cost'));
			$result['delivery_create_date']=$this->_object_lang->exsec_string->str_ucwords(lang('delivery_create_date'));
			$result['delivery_public']=$this->_object_lang->exsec_string->str_ucwords(lang('delivery_public'));
			$result['delivery_order']=$this->_object_lang->exsec_string->str_ucwords(lang('delivery_order'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_delivery_method_add_update($action_name){

		$result['delivery_name']=lang('delivery_name');
		$result['delivery_cost']=$this->_object_lang->exsec_string->str_ucwords(lang('delivery_cost'));
		$result['delivery_content']=$this->_object_lang->exsec_string->str_ucwords(lang('delivery_content'));
		$result['delivery_public']=$this->_object_lang->exsec_string->str_ucwords(lang('delivery_public'));
		$result['delivery_order']=$this->_object_lang->exsec_string->str_ucwords(lang('delivery_order'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['info_delivery']=lang('info_delivery');

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_payment_method_control($data){

		$result['ajax_show_manager']=$data;
		if(!$data){

			$result['alert_authorization_add_payment']=lang('alert_authorization_add_payment');
			$result['alert_authorization_delete_payment']=lang('alert_authorization_delete_payment');
			$result['alert_authorization_update_payment']=lang('alert_authorization_update_payment');

			$result['payment_name']=lang('payment_name');
			$result['payment_cost']=$this->_object_lang->exsec_string->str_ucwords(lang('payment_cost'));
			$result['payment_create_date']=$this->_object_lang->exsec_string->str_ucwords(lang('payment_create_date'));
			$result['payment_public']=$this->_object_lang->exsec_string->str_ucwords(lang('payment_public'));
			$result['payment_order']=$this->_object_lang->exsec_string->str_ucwords(lang('payment_order'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_payment_method_add_update($action_name){

		$result['payment_name']=lang('payment_name');
		$result['payment_cost']=$this->_object_lang->exsec_string->str_ucwords(lang('payment_cost'));
		$result['payment_content']=$this->_object_lang->exsec_string->str_ucwords(lang('payment_content'));
		$result['payment_public']=$this->_object_lang->exsec_string->str_ucwords(lang('payment_public'));
		$result['payment_order']=$this->_object_lang->exsec_string->str_ucwords(lang('payment_order'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['info_payment']=lang('info_payment');

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;

		return $result;

	}

	public function get_data_site_panel(){

		$result['control']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_control'));
		$result['last_login']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_last_login'));
		$result['info_system']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_info_system'));
		$result['info_static']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_info_static'));

		$result['user_account']=$this->_object_lang->exsec_string->str_ucwords(lang('user_account'));
		$result['user_name']=$this->_object_lang->exsec_string->str_ucwords(lang('user_name'));
		$result['user_email']=$this->_object_lang->exsec_string->str_ucwords(lang('user_email'));
		$result['user_phone']=$this->_object_lang->exsec_string->str_ucfirst(lang('user_phone'));
		$result['user_last_login']=$this->_object_lang->exsec_string->str_ucwords(lang('user_last_login'));

		$result['php_version']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_php_version'));
		$result['http_host']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_http_host'));
		$result['http_user_agent']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_http_user_agent'));
		$result['server_software']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_server_software'));
		$result['server_addr']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_server_addr'));
		$result['remote_addr']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_remote_addr'));
		$result['max_execution_time']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_max_execution_time'));
		$result['max_input_time']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_max_input_time'));
		$result['memory_limit']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_memory_limit'));
		$result['post_max_size']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_post_max_size'));
		$result['upload_max_filesize']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_upload_max_filesize'));
		$result['session_support']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_session_support'));

		$result['static_online']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_static_online'));
		$result['static_today']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_static_today'));
		$result['static_yesterday']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_static_yesterday'));
		$result['static_week']=$this->_object_lang->exsec_string->str_ucfirst(lang('site_control_static_week'));
		$result['static_month']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_static_month'));
		$result['static_year']=$this->_object_lang->exsec_string->str_ucwords(lang('site_control_static_year'));

		return $result;

	}

	public function get_data_site_change(){

		$result['user_account']=$this->_object_lang->exsec_string->str_ucwords(lang('user_account'));
		$result['user_pass_old']=$this->_object_lang->exsec_string->str_ucwords(lang('user_pass_old'));
		$result['user_pass']=$this->_object_lang->exsec_string->str_ucwords(lang('user_pass'));
		$result['confirm_user_pass']=$this->_object_lang->exsec_string->str_ucwords(lang('confirm_user_pass'));

		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['message_confirm']=$this->_object_lang->exsec_string->str_ucwords(lang('error_admin_confirm_pass'));

		return $result;

	}

	public function get_data_site_config(){

		$result['title_seo']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_title_seo'));
		$result['content_seo']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_content_seo'));

		$result['title_page']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_title_page'));
		$result['content_page']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_content_page'));

		$result['content_facebook']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_content_facebook'));

		$result['content_static']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_content_static'));

		$result['footer_front_end']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_footer_front_end'));

		$result['title_web']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_title_web'));
		$result['keyword_web']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_keyword_web'));
		$result['description_web']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_description_web'));
		$result['abstract_web']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_abstract_web'));

		$result['admin_page']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_admin_page'));
		$result['product_page']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_product_page'));
		$result['search_product_page']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_search_product_page'));
		$result['news_page']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_news_page'));

		$result['facebook_user_id']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_facebook_user_id'));
		$result['facebook_fanpage']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_facebook_fanpage'));

		$result['static_online_virtual']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_static_online_virtual'));
		$result['static_count_virtual']=$this->_object_lang->exsec_string->str_ucwords(lang('site_config_static_count_virtual'));

		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));

		return $result;

	}

	public function get_data_site_email(){

		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));

		$result['email_server_smtp']=lang('email_server_smtp');
		$result['email_port_smtp']=lang('email_port_smtp');
		$result['email_secure_smtp']=lang('email_secure_smtp');
		$result['email_debug_smtp']=lang('email_debug_smtp');
		$result['email_your_name']=lang('email_your_name');
		$result['email_email_smtp']=lang('email_email_smtp');
		$result['email_pass_smtp']=lang('email_pass_smtp');

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_menu_control($data){

		$result['ajax_show_manager']=$data;
		if(!$data){

			$result['alert_authorization_add_menu']=lang('alert_authorization_add_menu');
			$result['alert_authorization_delete_menu']=lang('alert_authorization_delete_menu');
			$result['alert_authorization_update_menu']=lang('alert_authorization_update_menu');

			$result['menu_name']=$this->_object_lang->exsec_string->str_ucwords(lang('menu_name'));
			$result['menu_url']=$this->_object_lang->exsec_string->str_ucwords(lang('menu_url'));
			$result['menu_public']=$this->_object_lang->exsec_string->str_ucwords(lang('menu_public'));
			$result['menu_order']=$this->_object_lang->exsec_string->str_ucwords(lang('menu_order'));

			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_menu_add_update($action_name){

		$result['menu_name']=$this->_object_lang->exsec_string->str_ucwords(lang('menu_name'));
		$result['menu_url']=$this->_object_lang->exsec_string->str_ucwords(lang('menu_url'));
		$result['menu_img']=$this->_object_lang->exsec_string->str_ucwords(lang('menu_img'));
		$result['menu_public']=$this->_object_lang->exsec_string->str_ucwords(lang('menu_public'));
		$result['menu_order']=$this->_object_lang->exsec_string->str_ucwords(lang('menu_order'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['info_menu']=$this->_object_lang->exsec_string->str_ucwords(lang('info_menu'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['button_image']=$this->_object_lang->exsec_string->str_ucwords(lang('button_image'));
		$result['action_name']=$action_name;

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_support_control($data,$menu_class='',$bool_active=false){

		$result['ajax_show_manager']=$data;
		$result['active_menu_class']=$menu_class;
		$result['bool_active']=$bool_active;

		if(!$data){

			$result['alert_authorization_add_support']=lang('alert_authorization_add_support');
			$result['alert_authorization_delete_support']=lang('alert_authorization_delete_support');
			$result['alert_authorization_update_support']=lang('alert_authorization_update_support');

			$result['support_name']=$this->_object_lang->exsec_string->str_ucwords(lang('support_name'));
			$result['support_nick']=$this->_object_lang->exsec_string->str_ucwords(lang('support_nick'));
			$result['support_public']=$this->_object_lang->exsec_string->str_ucwords(lang('support_public'));
			$result['support_order']=$this->_object_lang->exsec_string->str_ucwords(lang('support_order'));
			$result['support_status']=$this->_object_lang->exsec_string->str_ucwords(lang('support_status'));
			$result['support_type']=$this->_object_lang->exsec_string->str_ucwords(lang('support_type'));

			$result['support_control_filter']=$this->_object_lang->exsec_string->str_ucwords(lang('support_control_filter'));
			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_support_add_update($action_name,$bool_active=false){

		$result['support_name']=$this->_object_lang->exsec_string->str_ucwords(lang('support_name'));
		$result['support_nick']=$this->_object_lang->exsec_string->str_ucwords(lang('support_nick'));
		$result['support_info']=$this->_object_lang->exsec_string->str_ucwords(lang('support_info'));
		$result['support_public']=$this->_object_lang->exsec_string->str_ucwords(lang('support_public'));
		$result['support_order']=$this->_object_lang->exsec_string->str_ucwords(lang('support_order'));
		$result['support_type']=$this->_object_lang->exsec_string->str_ucwords(lang('support_type'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['info_support']=$this->_object_lang->exsec_string->str_ucwords(lang('info_support'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;
		$result['bool_active']=$bool_active;

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_weblink_control($data,$menu_class='',$bool_active=false){

		$result['ajax_show_manager']=$data;
		$result['active_menu_class']=$menu_class;
		$result['bool_active']=$bool_active;

		if(!$data){

			$result['alert_authorization_add_weblink']=lang('alert_authorization_add_weblink');
			$result['alert_authorization_delete_weblink']=lang('alert_authorization_delete_weblink');
			$result['alert_authorization_update_weblink']=lang('alert_authorization_update_weblink');

			$result['link_name']=$this->_object_lang->exsec_string->str_ucwords(lang('link_name'));
			$result['link_url']=$this->_object_lang->exsec_string->str_ucwords(lang('link_url'));
			$result['link_public']=$this->_object_lang->exsec_string->str_ucwords(lang('link_public'));
			$result['link_order']=$this->_object_lang->exsec_string->str_ucwords(lang('link_order'));
			$result['cate_sub_name']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_sub_name'));
			$result['cate_sub_name_weblink']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_sub_name_weblink'));

			$result['weblink_control_filter']=$this->_object_lang->exsec_string->str_ucwords(lang('weblink_control_filter'));
			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_weblink_add_update($action_name,$bool_active=false){

		$result['link_name']=$this->_object_lang->exsec_string->str_ucwords(lang('link_name'));
		$result['link_url']=$this->_object_lang->exsec_string->str_ucwords(lang('link_url'));
		$result['link_public']=$this->_object_lang->exsec_string->str_ucwords(lang('link_public'));
		$result['link_order']=$this->_object_lang->exsec_string->str_ucwords(lang('link_order'));
		$result['cate_sub_name']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_sub_name'));
		$result['cate_sub_name_weblink']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_sub_name_weblink'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['info_weblink']=$this->_object_lang->exsec_string->str_ucwords(lang('info_weblink'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;
		$result['bool_active']=$bool_active;

		return $result;

	}

	// 1 Xac nhan hoan thanh
	public function get_data_application_control($data){

		$result['ajax_show_manager']=$data;
		if(!$data){

			$result['alert_authorization_add_application']=lang('alert_authorization_add_application');
			$result['alert_authorization_delete_application']=lang('alert_authorization_delete_application');
			$result['alert_authorization_update_application']=lang('alert_authorization_update_application');

			$result['application_name']=$this->_object_lang->exsec_string->str_ucwords(lang('application_name'));
			$result['application_public']=$this->_object_lang->exsec_string->str_ucwords(lang('application_public'));
			$result['application_order']=$this->_object_lang->exsec_string->str_ucwords(lang('application_order'));
			$result['application_update_date']=$this->_object_lang->exsec_string->str_ucwords(lang('application_update_date'));

			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac nhan hoan thanh
	public function get_data_application_add_update($action_name){

		$result['application_name']=$this->_object_lang->exsec_string->str_ucwords(lang('application_name'));
		$result['application_alias']=$this->_object_lang->exsec_string->str_ucwords(lang('application_alias'));
		$result['application_public']=$this->_object_lang->exsec_string->str_ucwords(lang('application_public'));
		$result['application_order']=$this->_object_lang->exsec_string->str_ucwords(lang('application_order'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['info_application']=$this->_object_lang->exsec_string->str_ucwords(lang('info_application'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_partner_control($data,$menu_class='',$bool_active=false){

		$result['ajax_show_manager']=$data;
		$result['active_menu_class']=$menu_class;
		$result['bool_active']=$bool_active;
		if(!$data){

			$result['alert_authorization_add_partner']=lang('alert_authorization_add_partner');
			$result['alert_authorization_delete_partner']=lang('alert_authorization_delete_partner');
			$result['alert_authorization_update_partner']=lang('alert_authorization_update_partner');

			$result['partner_name']=$this->_object_lang->exsec_string->str_ucwords(lang('partner_name'));
			$result['partner_url']=$this->_object_lang->exsec_string->str_ucwords(lang('partner_url'));
			$result['partner_img']=$this->_object_lang->exsec_string->str_ucwords(lang('partner_img'));
			$result['partner_public']=$this->_object_lang->exsec_string->str_ucwords(lang('partner_public'));
			$result['partner_order']=$this->_object_lang->exsec_string->str_ucwords(lang('partner_order'));
			$result['cate_sub_name_partner']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_sub_name_partner'));

			$result['partner_control_filter']=$this->_object_lang->exsec_string->str_ucwords(lang('partner_control_filter'));
			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_partner_add_update($action_name,$bool_active=false){

		$result['partner_name']=$this->_object_lang->exsec_string->str_ucwords(lang('partner_name'));
		$result['partner_alias']=$this->_object_lang->exsec_string->str_ucwords(lang('partner_alias'));
		$result['partner_url']=$this->_object_lang->exsec_string->str_ucwords(lang('partner_url'));
		$result['partner_img']=$this->_object_lang->exsec_string->str_ucwords(lang('partner_img'));
		$result['partner_info']=$this->_object_lang->exsec_string->str_ucwords(lang('partner_info'));
		$result['partner_public']=$this->_object_lang->exsec_string->str_ucwords(lang('partner_public'));
		$result['partner_order']=$this->_object_lang->exsec_string->str_ucwords(lang('partner_order'));
		$result['cate_sub_name_partner']=$this->_object_lang->exsec_string->str_ucwords(lang('cate_sub_name_partner'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['info_partner']=$this->_object_lang->exsec_string->str_ucwords(lang('info_partner'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['button_image']=$this->_object_lang->exsec_string->str_ucwords(lang('button_image'));
		$result['action_name']=$action_name;
		$result['bool_active']=$bool_active;

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_utility_control($data){

		$result['ajax_show_manager']=$data;
		if(!$data){

			$result['alert_authorization_add_utility']=lang('alert_authorization_add_utility');
			$result['alert_authorization_delete_utility']=lang('alert_authorization_delete_utility');
			$result['alert_authorization_update_utility']=lang('alert_authorization_update_utility');

			$result['utility_name']=$this->_object_lang->exsec_string->str_ucwords(lang('utility_name'));
			$result['utility_url']=$this->_object_lang->exsec_string->str_ucwords(lang('utility_url'));
			$result['utility_img']=$this->_object_lang->exsec_string->str_ucwords(lang('utility_img'));
			$result['utility_public']=$this->_object_lang->exsec_string->str_ucwords(lang('utility_public'));
			$result['utility_order']=$this->_object_lang->exsec_string->str_ucwords(lang('utility_order'));

			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_utility_add_update($action_name){

		$result['utility_name']=$this->_object_lang->exsec_string->str_ucwords(lang('utility_name'));
		$result['utility_url']=$this->_object_lang->exsec_string->str_ucwords(lang('utility_url'));
		$result['utility_img']=$this->_object_lang->exsec_string->str_ucwords(lang('utility_img'));
		$result['utility_public']=$this->_object_lang->exsec_string->str_ucwords(lang('utility_public'));
		$result['utility_order']=$this->_object_lang->exsec_string->str_ucwords(lang('utility_order'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['info_utility']=$this->_object_lang->exsec_string->str_ucwords(lang('info_utility'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['button_image']=$this->_object_lang->exsec_string->str_ucwords(lang('button_image'));
		$result['action_name']=$action_name;

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_comment_control($data){

		$result['ajax_show_manager']=$data;
		if(!$data){

			$result['alert_authorization_add_comment']=lang('alert_authorization_add_comment');
			$result['alert_authorization_delete_comment']=lang('alert_authorization_delete_comment');
			$result['alert_authorization_update_comment']=lang('alert_authorization_update_comment');

			$result['comment_product_news']=$this->_object_lang->exsec_string->str_ucwords(lang('comment_product_news'));
			$result['comment_name']=$this->_object_lang->exsec_string->str_ucwords(lang('comment_name'));
			$result['comment_email']=$this->_object_lang->exsec_string->str_ucwords(lang('comment_email'));
			$result['comment_content']=$this->_object_lang->exsec_string->str_ucwords(lang('comment_content'));
			$result['comment_surf']=$this->_object_lang->exsec_string->str_ucwords(lang('comment_surf'));
			$result['comment_public']=$this->_object_lang->exsec_string->str_ucwords(lang('comment_public'));

			$result['comment_control_filter']=$this->_object_lang->exsec_string->str_ucwords(lang('comment_control_filter'));
		}

		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_province_control($data){

		$result['ajax_show_manager']=$data;
		if(!$data){

			$result['alert_authorization_add_province']=lang('alert_authorization_add_province');
			$result['alert_authorization_delete_province']=lang('alert_authorization_delete_province');
			$result['alert_authorization_update_province']=lang('alert_authorization_update_province');

			$result['province_id']=$this->_object_lang->exsec_string->str_ucwords(lang('province_id'));
			$result['province_name']=$this->_object_lang->exsec_string->str_ucwords(lang('province_name'));
			$result['province_create_date']=$this->_object_lang->exsec_string->str_ucwords(lang('province_create_date'));
			$result['province_public']=$this->_object_lang->exsec_string->str_ucwords(lang('province_public'));
			$result['province_order']=$this->_object_lang->exsec_string->str_ucwords(lang('province_order'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_province_add_update($action_name){

		$result['province_name']=$this->_object_lang->exsec_string->str_ucwords(lang('province_name'));
		$result['province_public']=$this->_object_lang->exsec_string->str_ucwords(lang('province_public'));
		$result['province_order']=$this->_object_lang->exsec_string->str_ucwords(lang('province_order'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['info_province']=$this->_object_lang->exsec_string->str_ucwords(lang('info_province'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;

		return $result;

	}

	// 1 Xac  nhan hoan thanh
	public function get_data_district_control($data){

		$result['ajax_show_manager']=$data;
		if(!$data){

			$result['alert_authorization_add_district']=lang('alert_authorization_add_district');
			$result['alert_authorization_delete_district']=lang('alert_authorization_delete_district');
			$result['alert_authorization_update_district']=lang('alert_authorization_update_district');

			$result['district_id']=$this->_object_lang->exsec_string->str_ucwords(lang('district_id'));
			$result['district_name']=$this->_object_lang->exsec_string->str_ucwords(lang('district_name'));
			$result['district_create_date']=$this->_object_lang->exsec_string->str_ucwords(lang('district_create_date'));
			$result['district_public']=$this->_object_lang->exsec_string->str_ucwords(lang('district_public'));
			$result['district_order']=$this->_object_lang->exsec_string->str_ucwords(lang('district_order'));

			$result['province_name']=$this->_object_lang->exsec_string->str_ucwords(lang('province_name'));

			$result['district_control_filter']=$this->_object_lang->exsec_string->str_ucwords(lang('district_control_filter'));
			$result['option_select_all']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select_all'));
		}

		$result['action_add']=$this->_object_lang->exsec_string->str_ucwords(lang('action_add'));
		$result['action_delete']=$this->_object_lang->exsec_string->str_ucwords(lang('action_delete'));
		$result['action_update']=$this->_object_lang->exsec_string->str_ucwords(lang('action_update'));

		return $result;

	}

	// 2 Xac  nhan hoan thanh
	public function get_data_district_add_update($action_name){

		$result['district_name']=$this->_object_lang->exsec_string->str_ucwords(lang('district_name'));
		$result['district_public']=$this->_object_lang->exsec_string->str_ucwords(lang('district_public'));
		$result['district_order']=$this->_object_lang->exsec_string->str_ucwords(lang('district_order'));
		$result['province_name']=$this->_object_lang->exsec_string->str_ucwords(lang('province_name'));

		$result['admin_public']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_public'));
		$result['admin_hidden']=$this->_object_lang->exsec_string->str_ucwords(lang('admin_hidden'));
		$result['option_select']=$this->_object_lang->exsec_string->str_ucwords(lang('option_select'));
		$result['info_district']=$this->_object_lang->exsec_string->str_ucwords(lang('info_district'));

		$result['action_back']=$this->_object_lang->exsec_string->str_ucwords(lang('action_back'));
		$result['action_save']=$this->_object_lang->exsec_string->str_ucwords(lang('action_save'));
		$result['action_name']=$action_name;

		return $result;

	}

}

?>