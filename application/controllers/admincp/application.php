<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Application extends CI_Controller{

	public $_arr_template_admin=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array'));
		$this->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination'));
		$this->load->Model(array('m_application'));

		$this->form_validation->set_error_delimiters('','');

		if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			$this->_arr_template_admin=$this->my_layout->set_layout();

	}

	public function control(){

		if((isset($_POST['checkbox'])) && ($this->m_authorization_group->check_authorization_one_menu('application','delete')))
			$message_session_flash=$this->delete_all($this->input->post('checkbox',true));

		if($this->m_authorization_group->check_authorization_one_menu('application','control')){

			$arr_auhorization=array('add','delete','update','control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('application',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('application',$value,$this->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->uri->segment(4,'all');
			$this->_arr_template_admin['data_content']['application']=$this->m_application->list_application($this->my_layout->sess_lang_admin);

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_application_control(true);
				$this->load->view(ADMIN_DIR_ROOT."/view_application_manager",$this->_arr_template_admin['data_content']);
			}
			else{

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_application_control(false);
				$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_application_manager";

				$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
				$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)." ::.";
				$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function update_order(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(!preg_match("/^([\-+])?[0-9]+$/i",$this->uri->segment(5,true))){

				echo "is_numeric";
				exit();
			}

			if($this->m_authorization_group->check_authorization_one_menu('application','update')){

				$arr_where['application_id']=$this->uri->segment(4,true);
				$arr_data['application_order']=$this->uri->segment(5,true);
				if(!$this->m_application->update_application($arr_data,$arr_where))
					echo "is_numeric";
				else
					echo $this->uri->segment(5,true);
			}
		}
		else
			show_404('page');

	}

	public function update_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$application=$this->m_application->get_application($this->uri->segment(4,true),$this->my_layout->sess_lang_admin);
			if($this->m_authorization_group->check_authorization_one_menu('application','update') && is_array($application)){

				if(element('application_public',$application,'') == 1)
					$arr_data['application_public']=0;
				else
					$arr_data['application_public']=1;

				$arr_where['application_id']=$this->uri->segment(4,true);
				if(!$this->m_application->update_application($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['application_public'];
			}
		}
		else
			show_404('page');

	}

	public function add(){

		if($this->m_authorization_group->check_authorization_one_menu('application','add')){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('application',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('application',$value,$this->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_application') && ($this->form_validation->run('add_update_application'))){

				$arr_data['application_name']=$this->input->post('txt_application_name',true);
				$arr_data['application_alias']=convert_vi_to_en($this->input->post('txt_application_alias',true));
				$arr_data['application_public']=$this->input->post('txt_application_public',true);
				$arr_data['application_order']=$this->input->post('txt_application_order',true);
				$arr_data['application_lang']=$this->my_layout->sess_lang_admin;
				$arr_data['application_create_date']=date('Y-m-d H:i:s');
				$arr_data['application_update_date']=date('Y-m-d H:i:s');

				if($this->m_application->insert_application($arr_data)){

					if($this->_arr_template_admin['data_content']['authorization']['control']){

						$this->session->set_flashdata('add_update_application',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->session->set_flashdata('add_update_application',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_application_add_update('add_application');
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_application";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('application','add',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			show_404('page');

	}

	public function delete(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->m_authorization_group->check_authorization_one_menu('application','delete')){

				$arr_where_delete['application_id']=$this->uri->segment(5,true);
				if(!$this->m_application->delete_application($arr_where_delete))
					echo "delete_faild";
				else
					$this->control();
			}
		}
		else
			show_404('page');

	}

	public function delete_all($arr_where){

		if(!(($this->uri->segment(2) == 'application') && ($this->uri->segment(3) == 'delete_all'))){

			if($this->m_authorization_group->check_authorization_one_menu('application','delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){

					$arr_where_delete['application_id']=$key;
					if(!$this->m_application->delete_application($arr_where_delete))
						$message_session_flash=alert(lang('message_delete_all_faild'));
				}

				if(!isset($message_session_flash))
					$message_session_flash=alert(lang('message_delete_all_success'));
			}
		}
		else
			show_404('page');

		return $message_session_flash;

	}

	public function update(){

		$this->_arr_template_admin['data_content']['application']=$this->m_application->get_application($this->uri->segment(4,true),$this->my_layout->sess_lang_admin);

		if($this->m_authorization_group->check_authorization_one_menu('application','update') && is_array($this->_arr_template_admin['data_content']['application']) && !empty($this->_arr_template_admin['data_content']['application'])){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('application',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('application',$value,$this->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_application') && ($this->form_validation->run('add_update_application'))){

				$arr_where['application_id']=$this->uri->segment(4,true);

				$arr_data['application_name']=$this->input->post('txt_application_name',true);
				$arr_data['application_alias']=convert_vi_to_en($this->input->post('txt_application_alias',true));
				$arr_data['application_public']=$this->input->post('txt_application_public',true);
				$arr_data['application_order']=$this->input->post('txt_application_order',true);
				$arr_data['application_update_date']=date('Y-m-d H:i:s');

				if($this->m_application->update_application($arr_data,$arr_where)){

					if($this->_arr_template_admin['data_content']['authorization']['control']){

						$this->session->set_flashdata('add_update_application',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->session->set_flashdata('add_update_application',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_application_add_update('update_application');
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_application";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('application','update',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			show_404('page');

	}

	public function general_alias(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$this->load->helper('general_page');
			$alias_name=$this->input->post('alias_name',true);
			echo convert_vi_to_en($alias_name);
		}
		else
			show_404('page');

	}

}

?>