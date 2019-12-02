<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class My_layout{

	private $_arr_template=array();
	private $_object_template;
	public $sess_lang_admin;

	public function __construct(){

		$this->_object_template=& get_instance();
		$this->_object_template->config->set_item('url_suffix','');

		$this->_object_template->load->helper(array('url','general_page'));

		if(!preg_match("/^".addcslashes(base_url(),'/')."/",curPageURL()))
			redirect(current_url());

		$this->_object_template->load->Model('m_general_config');
		$this->_object_template->load->library(array(ADMIN_DIR_ROOT.'/language'));
		$this->_object_template->load->Model(array('m_user','m_authorization_user','m_authorization_group','m_menu_admin','m_sub_menu_admin'));

		if((!$this->_object_template->session->userdata($this->_object_template->m_authorization_user->sess_authorization_user)) || (!$this->_object_template->session->userdata($this->_object_template->m_authorization_group->sess_authorization_group))){

			if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
				redirect(base_url().URL_LOGIN_ADMIN);
			exit();
		}
		$this->sess_lang_admin=$this->_object_template->session->userdata($this->_object_template->language->sess_lang);

	}

	public function set_layout(){

		$this->_arr_template['info_home']=$this->_object_template->language->get_data_page_home();
		$this->data_view_header();
		$this->data_view_left();
		$this->data_view_footer();
		return $this->_arr_template;

	}

	public function data_view_header(){

		$this->_arr_template['data_header']['authorization']['change']=$this->_object_template->m_authorization_group->check_authorization_one_menu('site','change');
		$this->_arr_template['data_header']['sub_menu']['change']=$this->_object_template->m_sub_menu_admin->get_sub_menu('site','change',$this->sess_lang_admin);

		$this->_arr_template['data_header']['user_admin']=$this->_object_template->m_user->get_user($this->_object_template->session->userdata($this->_object_template->m_authorization_user->sess_authorization_user));

		//Load view
		$this->_arr_template['data_header']['info_header']=$this->_object_template->language->get_data_page_header();
		$this->_arr_template['template_view_header']=ADMIN_DIR_ROOT."/view_header";

	}

	public function data_view_left(){

		$this->_arr_template['data_left']['menu_admin']=false;

		$arr_menu=$this->_object_template->m_menu_admin->list_menu_admin($this->sess_lang_admin);
		if(is_array($arr_menu)){

			foreach($arr_menu as $key_menu=> $value_menu){

				$bool_authorization_menu=false;
				$arr_sub_menu=$this->_object_template->m_sub_menu_admin->list_sub_menu_one_menu_in_1(element('menu_class',$value_menu,''),$this->sess_lang_admin);

				if(is_array($arr_sub_menu)){

					foreach($arr_sub_menu as $key_sub_menu=> $value_sub_menu){
						if($this->_object_template->m_authorization_group->check_authorization_one_menu(element('menu_class',$value_menu,''),element('sub_menu_function',$value_sub_menu,''))){

							$value_menu['sub_menu_admin'][]=$value_sub_menu;
							$bool_authorization_menu=true;
						}
					}
				}
				if($bool_authorization_menu)
					$this->_arr_template['data_left']['menu_admin'][]=$value_menu;
			}
		}

		$this->_arr_template['data_left']['session_lang_admin']=$this->sess_lang_admin;
		$this->_arr_template['template_view_left']=ADMIN_DIR_ROOT."/view_left";

	}

	public function data_view_footer(){

		$this->_arr_template['data_footer']['info_footer']=$this->_object_template->language->get_data_page_footer();
		$this->_arr_template['template_view_footer']=ADMIN_DIR_ROOT."/view_footer";

	}

}

?>