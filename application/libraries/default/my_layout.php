<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class My_layout{

	private $_arr_template=array();
	private $_object_template;
	public $sess_lang_default;
	public $product_class='product';

	public function __construct(){

		$this->_object_template=& get_instance();

		$this->_object_template->load->helper(array('url','array','general_page'));

		if(!preg_match("/^".addcslashes(base_url(),'/')."/",curPageURL())){

			redirect(current_url());
			exit();
		}

		if(preg_match("/\/$/",$_SERVER['REQUEST_URI']) && (current_url() != base_url()) && !isset($_POST[md5('hominhtri')])){

			redirect(current_url());
			exit();
		}

		$this->_object_template->load->library(array(DEFAULT_DIR_ROOT.'/language',DEFAULT_DIR_ROOT.'/custom_cart','static_user'));
		$this->_object_template->load->Model(array('m_general_config','m_menu','m_advertise','m_support'));
		$this->_object_template->load->Model(array('m_category_product','m_product'));
		$this->_object_template->load->Model(array('m_category_news','m_news'));
		$this->_object_template->load->Model(array('m_category_sub','m_partner','m_weblink','m_video','m_utility'));

		$this->sess_lang_default=$this->_object_template->session->userdata($this->_object_template->language->sess_lang);
		$this->define_page();

		$arr_class_product=array('product');
		if(($this->_object_template->uri->segment(1,false) !== false) && (in_array($this->_object_template->uri->segment(1,-10000),$arr_class_product)))
			$this->product_class=$this->_object_template->uri->segment(1);
		else if(($this->_object_template->uri->segment(2,false) !== false) && (in_array($this->_object_template->uri->segment(2,-10000),$arr_class_product)))
			$this->product_class=$this->_object_template->uri->segment(2);

	}

	private function define_page(){

		$arr_denfine_page=$this->_object_template->m_general_config->list_page_config();
		define('ROW_PRODUCT_PAGE',$arr_denfine_page['product_page']);
		define('ROW_SEARCH_PRODUCT_PAGE',$arr_denfine_page['search_product_page']);
		define('ROW_NEWS_PAGE',$arr_denfine_page['news_page']);

		$arr_denfine_facebook=$this->_object_template->m_general_config->list_facebook_config();
		define('FACEBOOK_USER_ID',$arr_denfine_facebook['facebook_user_id']);
		define('FACEBOOK_FANPAGE',$arr_denfine_facebook['facebook_fanpage']);

	}

	public function set_layout(){

		$info_home=$this->_object_template->m_general_config->list_seo_config($this->sess_lang_default);

		$this->_arr_template['info_home']['homepage_website']=lang('label_homepage_website');

		$this->_arr_template['info_home']['title_web']=element('title_web',$info_home,'');
		$this->_arr_template['info_home']['keyword_web']=element('keyword_web',$info_home,'');
		$this->_arr_template['info_home']['description_web']=element('description_web',$info_home,'');

		$this->_arr_template['info_home']['facebook_title']=element('title_web',$info_home,'');
		$this->_arr_template['info_home']['facebook_description']=element('description_web',$info_home,'');
		$this->_arr_template['info_home']['facebook_image']="";

		$this->_arr_template['info_home']['language']=$this->sess_lang_default;
		if($this->sess_lang_default == 'vi')
			$this->_arr_template['info_home']['language_code']='vi-vn';
		else if($this->sess_lang_default == 'en')
			$this->_arr_template['info_home']['language_code']='en-US';
		else
			$this->_arr_template['info_home']['language_code']=$this->sess_lang_default;

		$this->data_view_banner();
		$this->data_view_menu_header();
		$this->data_view_language();
		$this->data_view_search_header();
		$this->data_view_slider();

		$this->data_view_menu_left();
		//$this->data_view_search();
		//$this->data_view_news();
		$this->data_view_product_new();
		//$this->data_view_product_view();
		//$this->data_view_product_buy();
		//$this->data_view_product_prominent();
		$this->data_view_support();
		$this->data_view_partner();
		//$this->data_view_weblink();
		//$this->data_view_utility();
		$this->data_view_video();
		//$this->data_view_members();
		//$this->data_view_cart();
		//$this->data_view_static();
		$this->data_view_advertise_left();
		//$this->data_view_advertise_right();
		$this->data_view_facebook();

		$this->data_view_footer();

		return $this->_arr_template;

	}

	/* ============================= Data Header ============================ */

	public function data_view_banner(){

		$this->_arr_template['data_banner']['support_phone']=$this->_object_template->m_support->list_support_one_category_front_end(array(7,8),'support',$this->sess_lang_default);
		$this->_arr_template['data_banner']['support_contact']=$this->_object_template->m_support->list_support_one_category_front_end(array(1,2),'contact',$this->sess_lang_default);

		//$this->_arr_template['data_banner']['menu']=$this->_object_template->m_menu->list_menu_front_end($this->sess_lang_default);
		// Default
		$this->_arr_template['data_banner']['banner']=$this->_object_template->m_advertise->show_advertise_active(array(15,16),'banner',$this->sess_lang_default,1000,175);

		//Load view
		$this->_arr_template['data_banner']['info_banner']=$this->_object_template->language->get_data_page_banner();
		$this->_arr_template['template_view_banner']=DEFAULT_DIR_ROOT."/view_advertise_banner";

	}

	public function data_view_menu_header(){

		//$this->_object_template->load->Model(array('m_province','m_application'));
		//$this->_arr_template['data_menu_header']['city']=$this->_object_template->m_province->list_province_front_end('vi');
		//$this->_arr_template['data_menu_header']['category_application']=$this->_object_template->m_application->list_application_front_end($this->sess_lang_default);
		//
		//$this->_arr_template['data_menu_header']['category_service']=$this->_object_template->m_news->list_news_front_end('service',$this->sess_lang_default);

		/*
		  if($account=$this->_object_template->session->userdata($this->_object_template->m_authorization_user->sess_authorization_user))
		  $this->_arr_template['data_menu_header']['user_login']=$this->_object_template->m_user->get_user($account);
		  else
		  $this->_arr_template['data_menu_header']['user_login']=array();
		 */

		$this->_arr_template['data_menu_header']['category_product']="";
		$arr_category_product=$this->_object_template->m_category_product->list_category_product_one_menu_admin_front_end('product',$this->sess_lang_default);
		if(is_array($arr_category_product))
			$this->_arr_template['data_menu_header']['category_product']=$this->_object_template->m_category_product->recursive_menu_left($arr_category_product,'0','product','<ul>','<li>','');

		/*
		  $this->_arr_template['data_menu_header']['category_article']="";
		  $arr_category_article=$this->_object_template->m_category_news->list_category_news_one_menu_admin_front_end('article',$this->sess_lang_default);
		  if(is_array($arr_category_article))
		  $this->_arr_template['data_menu_header']['category_article']=$this->_object_template->m_category_news->recursive_menu_left($arr_category_article,'0','article','<ul>','<li>','');
		 */

		//Default
		$this->_arr_template['data_menu_header']['menu']=$this->_object_template->m_menu->list_menu_front_end($this->sess_lang_default);

		//Load view
		$this->_arr_template['data_menu_header']['info_menu_header']=$this->_object_template->language->get_data_page_menu_header();
		$this->_arr_template['template_view_menu_header']=DEFAULT_DIR_ROOT."/view_menu_header";

	}

	public function data_view_language(){

		$this->_arr_template['data_language']['language']=array(
			array('language_id'=>'vi','language_name'=>'Việt Nam','language_img'=>'Images/lang/vietnam.gif'),
			array('language_id'=>'en','language_name'=>'English','language_img'=>'Images/lang/english.gif')
		);

		//Load view
		$this->_arr_template['template_view_language']=DEFAULT_DIR_ROOT."/view_language_default";

	}

	public function data_view_search_header(){

		//Load view
		$this->_arr_template['data_search_header']['info_search_header']=$this->_object_template->language->get_data_search_header();
		$this->_arr_template['template_view_search_header']=DEFAULT_DIR_ROOT."/view_search_header";

	}

	public function data_view_slider(){

		$this->_arr_template['data_slider']['slider']=$this->_object_template->m_advertise->list_advertise_front_end(array(17,18),'slider',$this->sess_lang_default);

		//Load view
		$this->_arr_template['data_slider']['info_slider']=$this->_object_template->language->get_data_page_slider();
		$this->_arr_template['template_view_slider']=DEFAULT_DIR_ROOT."/view_advertise_slider";

	}

	/* ============================ Data Sidebar ============================ */

	public function data_view_menu_left(){

		$this->_arr_template['data_menu_left']['menu_left']="";
		$arr_category_product=$this->_object_template->m_category_product->list_category_product_one_menu_admin_front_end($this->product_class,$this->sess_lang_default);
		if(is_array($arr_category_product))
			$this->_arr_template['data_menu_left']['menu_left']=$this->_object_template->m_category_product->recursive_menu_left($arr_category_product,'0',$this->product_class,'<ul>','<li>','');

		//Load view
		$this->_arr_template['data_menu_left']['info_menu_left']=$this->_object_template->language->get_data_page_menu_left();
		$this->_arr_template['template_view_menu_left']=DEFAULT_DIR_ROOT."/view_menu_left";

	}

	public function data_view_search(){

		$this->_arr_template['data_search']['product_price']=array(
			array('price'=>'300000','name'=>'300000'),
			array('price'=>'500000','name'=>'500000'),
			array('price'=>'1000000','name'=>'1000000'),
			array('price'=>'2000000','name'=>'2000000'),
			array('price'=>'4000000','name'=>'4000000'),
			array('price'=>'6000000','name'=>'6000000'),
			array('price'=>'8000000','name'=>'8000000'),
			array('price'=>'10000000','name'=>'10000000'),
			array('price'=>'11000000','name'=>'11000000'),
			array('price'=>'13000000','name'=>'13000000'),
			array('price'=>'14000000','name'=>'14000000'),
			array('price'=>'20000000','name'=>'20000000'),
			array('price'=>'30000000','name'=>'30000000')
		);

		$cate_id_value=false;
		if($this->_object_template->uri->segment(2,'') == 'search')
			$cate_id_value=$this->_object_template->uri->segment(4,'');

		$this->_arr_template['data_search']['category_product']="";
		$arr_category_product=$this->_object_template->m_category_product->list_category_product_one_menu_admin_front_end($this->product_class,$this->sess_lang_default);
		if(is_array($arr_category_product))
			$this->_arr_template['data_search']['category_product']=$this->_object_template->m_category_product->recursive_category_product_front_end($arr_category_product,'0','select_search_category',$cate_id_value);

		//Load view
		$this->_arr_template['data_search']['info_search']=$this->_object_template->language->get_data_page_search();
		$this->_arr_template['template_view_search']=DEFAULT_DIR_ROOT."/view_product_search";

	}

	public function data_view_news(){

		$this->_arr_template['data_news']['news']=$this->_object_template->m_news->latest_news_front_end('article',$this->sess_lang_default,0,5);

		//Load view
		$this->_arr_template['data_news']['info_news']=$this->_object_template->language->get_data_page_news();
		$this->_arr_template['template_view_news']=DEFAULT_DIR_ROOT."/view_news_new";

	}

	public function data_view_product_new(){

		$this->_arr_template['data_product_new']['product']=$this->_object_template->m_product->product_new_front_end($this->product_class,$this->sess_lang_default,0,20);

		//Load view
		$this->_arr_template['data_product_new']['info_product_new']=$this->_object_template->language->get_data_page_product_new();
		$this->_arr_template['template_view_product_new']=DEFAULT_DIR_ROOT."/view_product_new";

	}

	public function data_view_product_view(){

		$this->_arr_template['data_product_view']['product']=$this->_object_template->m_product->product_view_front_end($this->product_class,$this->sess_lang_default,0,20);

		//Load view
		$this->_arr_template['data_product_view']['info_product_view']=$this->_object_template->language->get_data_page_product_view();
		$this->_arr_template['template_view_product_view']=DEFAULT_DIR_ROOT."/view_product_view";

	}

	public function data_view_product_buy(){

		$this->_arr_template['data_product_buy']['product']=$this->_object_template->m_product->product_buy_front_end($this->product_class,$this->sess_lang_default,0,20);

		//Load view
		$this->_arr_template['data_product_buy']['info_product_buy']=$this->_object_template->language->get_data_page_product_buy();
		$this->_arr_template['template_view_product_buy']=DEFAULT_DIR_ROOT."/view_product_buy";

	}

	public function data_view_product_prominent(){

		$this->_arr_template['data_product_prominent']['product']=$this->_object_template->m_product->product_prominent_front_end($this->product_class,$this->sess_lang_default,0,20);

		//Load view
		$this->_arr_template['data_product_prominent']['info_product_prominent']=$this->_object_template->language->get_data_page_product_prominent();
		$this->_arr_template['template_view_product_prominent']=DEFAULT_DIR_ROOT."/view_product_prominent";

	}

	public function data_view_support(){

		$this->_arr_template['data_support']['support_yahoo']=$this->_object_template->m_support->list_support_one_category_front_end(array(3,4),'support',$this->sess_lang_default);

		$this->_arr_template['data_support']['support_skype']=$this->_object_template->m_support->list_support_one_category_front_end(array(5,6),'support',$this->sess_lang_default);

		$this->_arr_template['data_support']['support_phone']=$this->_object_template->m_support->list_support_one_category_front_end(array(7,8),'support',$this->sess_lang_default);

		//Load view
		$this->_arr_template['data_support']['info_support']=$this->_object_template->language->get_data_page_support();
		$this->_arr_template['template_view_support']=DEFAULT_DIR_ROOT."/view_support";

	}

	public function data_view_partner(){

		$this->_arr_template['data_partner']['partner']=$this->_object_template->m_partner->list_partner_one_category_front_end(array(29,30),'partner',$this->sess_lang_default);

		//Load view
		$this->_arr_template['data_partner']['info_partner']=$this->_object_template->language->get_data_page_partner();
		$this->_arr_template['template_view_partner']=DEFAULT_DIR_ROOT."/view_partner";

	}

	public function data_view_weblink(){

		$this->_arr_template['data_weblink']['weblink']="";
		$arr_category_sub=$this->_object_template->m_category_sub->list_category_sub_root_front_end('weblink',$this->sess_lang_default);
		if(is_array($arr_category_sub) && !empty($arr_category_sub)){

			foreach($arr_category_sub as $key=> $value){
				$arr_cate_id=$this->_object_template->m_category_sub->get_category_sub_id_front_end(element('cate_id',$value,''),$this->sess_lang_default);
				$arr_weblink=$this->_object_template->m_weblink->list_weblink_one_category_front_end($arr_cate_id,'weblink',$this->sess_lang_default);
				if(is_array($arr_weblink) && !empty($arr_weblink)){

					$this->_arr_template['data_weblink']['weblink'].="<optgroup label='".element('cate_name',$value,'')."'>";

					foreach($arr_weblink as $key_link=> $value_link){
						$this->_arr_template['data_weblink']['weblink'].="<option value='".element('link_url',$value_link,'')."'>&nbsp;&nbsp;&nbsp;&nbsp;&#187;&nbsp;".element('link_name',$value_link,'')."</option>";
					}

					$this->_arr_template['data_weblink']['weblink'].="</optgroup>";
				}
			}
		}

		//Load view
		$this->_arr_template['data_weblink']['info_weblink']=$this->_object_template->language->get_data_page_weblink();
		$this->_arr_template['template_view_weblink']=DEFAULT_DIR_ROOT."/view_weblink";

	}

	public function data_view_utility(){

		$this->_arr_template['data_utility']['utility']=$this->_object_template->m_utility->list_utility_front_end($this->sess_lang_default);

		$this->_arr_template['data_utility']['weblink']="";
		$arr_category_sub=$this->_object_template->m_category_sub->list_category_sub_root_front_end('weblink',$this->sess_lang_default);
		if(is_array($arr_category_sub) && !empty($arr_category_sub)){

			foreach($arr_category_sub as $key=> $value){
				$arr_cate_id=$this->_object_template->m_category_sub->get_category_sub_id_front_end(element('cate_id',$value,''),$this->sess_lang_default);
				$arr_weblink=$this->_object_template->m_weblink->list_weblink_one_category_front_end($arr_cate_id,'weblink',$this->sess_lang_default);
				if(is_array($arr_weblink) && !empty($arr_weblink)){

					$this->_arr_template['data_utility']['weblink'].="<optgroup label='".element('cate_name',$value,'')."'>";

					foreach($arr_weblink as $key_link=> $value_link){
						$this->_arr_template['data_utility']['weblink'].="<option value='".element('link_url',$value_link,'')."'>&nbsp;&nbsp;&nbsp;&nbsp;&#187;&nbsp;".element('link_name',$value_link,'')."</option>";
					}

					$this->_arr_template['data_utility']['weblink'].="</optgroup>";
				}
			}
		}

		//Load view
		$this->_arr_template['data_utility']['info_utility']=$this->_object_template->language->get_data_page_utility();
		$this->_arr_template['template_view_utility']=DEFAULT_DIR_ROOT."/view_utility";

	}

	public function data_view_video(){

		$this->_object_template->load->Model(array('m_video'));

		$this->_arr_template['data_video']['video']=$this->_object_template->m_video->show_list_video(array(13,14),'video',$this->sess_lang_default,236,277);

		//Load view
		$this->_arr_template['data_video']['info_video']=$this->_object_template->language->get_data_page_video();
		$this->_arr_template['template_view_video']=DEFAULT_DIR_ROOT."/view_video";

	}

	public function data_view_members(){

		//Load view
		$this->_arr_template['data_members']['info_members']=$this->_object_template->language->get_data_page_members();
		$this->_arr_template['template_view_members']=DEFAULT_DIR_ROOT."/view_members";

	}

	public function data_view_cart(){

		//Load view
		$this->_arr_template['data_cart']['info_cart']=$this->_object_template->language->get_data_page_cart();
		$this->_arr_template['template_view_cart']=DEFAULT_DIR_ROOT."/view_cart";

	}

	public function data_view_static(){

		//Load view
		$this->_arr_template['data_static']['info_static']=$this->_object_template->language->get_data_page_static();
		$this->_arr_template['template_view_static']=DEFAULT_DIR_ROOT."/view_static";

	}

	public function data_view_advertise_left(){

		$this->_arr_template['data_advertise_left']['advertise']=$this->_object_template->m_advertise->show_list_advertise(array(19,20),'advertise',$this->sess_lang_default,"<div class='advertise'>","</div>",250);

		//Load view
		$this->_arr_template['template_view_advertise_left']=DEFAULT_DIR_ROOT."/view_advertise_left";

	}

	public function data_view_advertise_right(){

		$this->_arr_template['data_advertise_right']['advertise']=$this->_object_template->m_advertise->show_list_advertise(array(23,24),'advertise',$this->sess_lang_default,"<div class='advertise'>","</div>",250);

		//Load view
		$this->_arr_template['template_view_advertise_right']=DEFAULT_DIR_ROOT."/view_advertise_right";

	}

	public function data_view_facebook(){

		//Load view
		$this->_arr_template['data_facebook']['info_facebook']=$this->_object_template->language->get_data_page_facebook();
		$this->_arr_template['template_view_facebook']=DEFAULT_DIR_ROOT."/view_facebook_fanpage";

	}

	/* ============================= Data Footer ============================ */

	public function data_view_footer(){

		$this->_arr_template['data_footer']['news_customer']=$this->_object_template->m_news->latest_news_front_end('customer',$this->sess_lang_default,0,8);

		$this->_arr_template['data_footer']['menu']=$this->_object_template->m_menu->list_menu_front_end($this->sess_lang_default);

		$this->_arr_template['data_footer']['footer']=$this->_object_template->m_general_config->list_seo_config($this->sess_lang_default);

		//Load view
		$this->_arr_template['data_footer']['info_footer']=$this->_object_template->language->get_data_page_footer();
		$this->_arr_template['template_view_footer']=DEFAULT_DIR_ROOT."/view_footer";

	}

}
