<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Site extends CI_Controller{

	public $_arr_template_admin=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array'));
		$this->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation'));

		$this->form_validation->set_error_delimiters('','');

		$this->_arr_template_admin=$this->my_layout->set_layout();

	}

	public function panel(){

		$this->load->library(array('static_user'));

		$this->_arr_template_admin['data_content']['sub_menu_admin']=false;

		$arr_menu=$this->m_menu_admin->list_menu_admin($this->my_layout->sess_lang_admin);
		if(is_array($arr_menu)){

			foreach($arr_menu as $key_menu=> $value_menu){
				$arr_sub_menu=$this->m_sub_menu_admin->list_sub_menu_one_menu_in_2(element('menu_class',$value_menu,''),$this->my_layout->sess_lang_admin);
				if(is_array($arr_sub_menu)){

					foreach($arr_sub_menu as $key_sub_menu=> $value_sub_menu){

						if($this->m_authorization_group->check_authorization_one_menu(element('menu_class',$value_menu,''),element('sub_menu_function',$value_sub_menu,''))){

							$value_sub_menu['menu_class']=element('menu_class',$value_menu,'');
							$this->_arr_template_admin['data_content']['sub_menu_admin'][]=$value_sub_menu;
						}
					}
				}
			}
		}
		$this->_arr_template_admin['data_content']['user']=$this->m_user->list_user_last_login(0,10);

		$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_site_panel();
		$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_control_panel";

		$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('site','panel',$this->my_layout->sess_lang_admin);
		$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
		$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);

	}

	public function change(){

		if($this->m_authorization_group->check_authorization_one_menu('site','change')){

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'change_password') && ($this->form_validation->run())){

				$account=$this->session->userdata($this->m_authorization_user->sess_authorization_user);
				$pass=md5($this->input->post('txt_pass_new',true));
				$arr_update_data['user_pass']=$pass;
				$arr_update_where['user_account']=$account;

				if($this->m_user->update_user($arr_update_data,$arr_update_where)){

					$this->session->set_flashdata('site_change_user',alert(lang('message_update_success')));
					redirect(current_url());
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_template_admin['data_content']['user_account']=$this->session->userdata($this->m_authorization_user->sess_authorization_user);
			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_site_change();
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_change_pass";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('site','change',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			redirect(base_url().URL_HOME_ADMIN);

	}

	public function check_username($user_pass=false){

		if(!(($this->uri->segment(2) == 'site') && ($this->uri->segment(3) == 'check_username'))){

			if($this->m_authorization_user->check_user_login($this->session->userdata($this->m_authorization_user->sess_authorization_user),md5($user_pass)))
				return true;
			else{

				$this->form_validation->set_message('check_username','%s');
				return false;
			}
		}
		else
			show_404('page');

	}

	public function config(){

		//Load Model
		$this->load->Model('m_general_config');
		$this->load->helper('config_ckeditor');

		if($this->m_authorization_group->check_authorization_one_menu('site','config')){

			if((isset($_POST['action_form'])) && ($_POST['action_form']='config_general_page') && ($this->form_validation->run())){

				$arr_data['title_web']=$this->input->post('txt_seo_title',true);
				$arr_data['keyword_web']=$this->input->post('txt_seo_keyword',true);
				$arr_data['description_web']=$this->input->post('txt_seo_description',true);

				$arr_data['product_page']=$this->input->post('txt_product_page',true);
				$arr_data['search_product_page']=$this->input->post('txt_search_product_page',true);
				$arr_data['news_page']=$this->input->post('txt_news_page',true);

				$arr_data['facebook_user_id']=$this->input->post('txt_facebook_user_id',true);
				$arr_data['facebook_fanpage']=$this->input->post('txt_facebook_fanpage',true);

				$arr_data['static_online_virtual']=$this->input->post('txt_static_online_virtual',true);
				$arr_data['static_count_virtual']=$this->input->post('txt_static_count_virtual',true);

				$arr_data['footer_front_end']=$this->input->post('txt_footer_front_end');

				if($this->m_general_config->update_general_config($arr_data,array($this->my_layout->sess_lang_admin,'envi'))){

					$this->session->set_flashdata('site_config',alert(lang('message_update_success')));
					redirect(current_url());
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_template_admin['data_content']['seo_config']=$this->m_general_config->list_seo_config($this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['page_config']=$this->m_general_config->list_page_config();
			$this->_arr_template_admin['data_content']['facebook_config']=$this->m_general_config->list_facebook_config();
			$this->_arr_template_admin['data_content']['static_config']=$this->m_general_config->list_static_config();

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_site_config();
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_general_config";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('site','config',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			redirect(base_url().URL_HOME_ADMIN);

	}

	public function email(){

		$this->load->Model('m_general_config');

		if($this->m_authorization_group->check_authorization_one_menu('site','email')){

			if((isset($_POST['action_form'])) && ($_POST['action_form']='config_email') && ($this->form_validation->run())){

				$arr_data['email_server_smtp']=$this->input->post('txt_email_server_smtp',true);
				$arr_data['email_port_smtp']=$this->input->post('txt_email_port_smtp',true);
				$arr_data['email_secure_smtp']=$this->input->post('txt_email_secure_smtp',true);
				$arr_data['email_debug_smtp']=$this->input->post('txt_email_debug_smtp',true);
				$arr_data['email_your_name']=$this->input->post('txt_email_your_name',true);
				$arr_data['email_email_smtp']=$this->input->post('txt_email_email_smtp',true);
				$arr_data['email_pass_smtp']=$this->input->post('txt_email_pass_smtp',true);

				if($this->m_general_config->update_general_config($arr_data,array('envi'))){

					$this->session->set_flashdata('site_config_email',alert(lang('message_update_success')));
					redirect(current_url());
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_template_admin['data_content']['config_email']=$this->m_general_config->list_send_email_config();

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_site_email();
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_config_email";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('site','email',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			redirect(base_url().URL_HOME_ADMIN);

	}

	public function manager(){

		if($this->m_authorization_group->check_authorization_one_menu('site','manager')){

			$this->_arr_template_admin['data_content']="";
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_manager_upload";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('site','manager',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			redirect(base_url().URL_HOME_ADMIN);

	}

}

?>