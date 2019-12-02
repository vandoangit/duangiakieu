<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Delivery extends CI_Controller{

	public $_arr_template_admin=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array'));
		$this->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination'));
		$this->load->Model(array('m_method_delivery'));

		$this->load->helper('config_ckeditor');

		$this->form_validation->set_error_delimiters('','');

		if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			$this->_arr_template_admin=$this->my_layout->set_layout();

	}

	public function control(){

		if((isset($_POST['checkbox'])) && ($this->m_authorization_group->check_authorization_one_menu('delivery','delete')))
			$message_session_flash=$this->delete_all($this->input->post('checkbox',true));

		if($this->m_authorization_group->check_authorization_one_menu('delivery','control')){

			$arr_auhorization=array('add','delete','update','control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('delivery',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('delivery',$value,$this->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->uri->segment(4,'all');
			$this->_arr_template_admin['data_content']['delivery_method']=$this->m_method_delivery->list_delivery($this->my_layout->sess_lang_admin);

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_delivery_method_control(true);
				$this->load->view(ADMIN_DIR_ROOT."/view_delivery_method_manager",$this->_arr_template_admin['data_content']);
			}
			else{

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_delivery_method_control(false);
				$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_delivery_method_manager";

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

			if($this->m_authorization_group->check_authorization_one_menu('delivery','update')){

				$arr_where['delivery_id']=$this->uri->segment(4,true);
				$arr_data['delivery_order']=$this->uri->segment(5,true);
				if(!$this->m_method_delivery->update_delivery($arr_data,$arr_where))
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

			$delivery_method=$this->m_method_delivery->get_delivery($this->uri->segment(4,true),$this->my_layout->sess_lang_admin);
			if($this->m_authorization_group->check_authorization_one_menu('delivery','update') && is_array($delivery_method)){

				if(element('delivery_public',$delivery_method,'') == 1)
					$arr_data['delivery_public']=0;
				else
					$arr_data['delivery_public']=1;

				$arr_where['delivery_id']=$this->uri->segment(4,true);
				if(!$this->m_method_delivery->update_delivery($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['delivery_public'];
			}
		}
		else
			show_404('page');

	}

	public function add(){

		if($this->m_authorization_group->check_authorization_one_menu('delivery','add')){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('delivery',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('delivery',$value,$this->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_delivery_method') && ($this->form_validation->run('add_update_delivery_method'))){


				$arr_data['delivery_name']=$this->input->post('txt_delivery_name',true);
				$arr_data['delivery_content']=$this->input->post('txt_delivery_content');
				$arr_data['delivery_cost']=$this->input->post('txt_delivery_cost',true);
				$arr_data['delivery_public']=$this->input->post('txt_delivery_public',true);
				$arr_data['delivery_order']=$this->input->post('txt_delivery_order',true);
				$arr_data['delivery_lang']=$this->my_layout->sess_lang_admin;
				$arr_data['delivery_create_date']=date('Y-m-d H:i:s');
				$arr_data['delivery_update_date']=date('Y-m-d H:i:s');

				if($this->m_method_delivery->insert_delivery($arr_data)){

					if($this->_arr_template_admin['data_content']['authorization']['control']){

						$this->session->set_flashdata('add_update_delivery_method',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->session->set_flashdata('add_update_delivery_method',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_delivery_method_add_update('add_delivery_method');
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_delivery_method";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('delivery','add',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			show_404('page');

	}

	public function delete(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->m_authorization_group->check_authorization_one_menu('delivery','delete')){

				$arr_where_delete['delivery_id']=$this->uri->segment(5,true);
				if(!$this->m_method_delivery->delete_delivery($arr_where_delete))
					echo "delete_faild";
				else
					$this->control();
			}
		}
		else
			show_404('page');

	}

	public function delete_all($arr_where){

		if(!(($this->uri->segment(2) == 'delivery') && ($this->uri->segment(3) == 'delete_all'))){

			if($this->m_authorization_group->check_authorization_one_menu('delivery','delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){

					$arr_where_delete['delivery_id']=$key;
					if(!$this->m_method_delivery->delete_delivery($arr_where_delete))
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

		$this->_arr_template_admin['data_content']['delivery_method']=$this->m_method_delivery->get_delivery($this->uri->segment(4,true),$this->my_layout->sess_lang_admin);

		if($this->m_authorization_group->check_authorization_one_menu('delivery','update') && is_array($this->_arr_template_admin['data_content']['delivery_method']) && !empty($this->_arr_template_admin['data_content']['delivery_method'])){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('delivery',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('delivery',$value,$this->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_delivery_method') && ($this->form_validation->run('add_update_delivery_method'))){

				$arr_where['delivery_id']=$this->uri->segment(4,true);

				$arr_data['delivery_name']=$this->input->post('txt_delivery_name',true);
				$arr_data['delivery_content']=$this->input->post('txt_delivery_content');
				$arr_data['delivery_cost']=$this->input->post('txt_delivery_cost',true);
				$arr_data['delivery_public']=$this->input->post('txt_delivery_public',true);
				$arr_data['delivery_order']=$this->input->post('txt_delivery_order',true);
				$arr_data['delivery_update_date']=date('Y-m-d H:i:s');

				if($this->m_method_delivery->update_delivery($arr_data,$arr_where)){

					if($this->_arr_template_admin['data_content']['authorization']['control']){

						$this->session->set_flashdata('add_update_delivery_method',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->session->set_flashdata('add_update_delivery_method',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_delivery_method_add_update('update_delivery_method');
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_delivery_method";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('delivery','update',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			show_404('page');

	}

}

?>