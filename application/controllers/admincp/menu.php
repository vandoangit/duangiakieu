<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Menu extends CI_Controller{

	public $_arr_template_admin=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array'));
		$this->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination'));
		$this->load->Model(array('m_menu'));

		$this->form_validation->set_error_delimiters('','');

		if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			$this->_arr_template_admin=$this->my_layout->set_layout();

	}

	public function control(){

		if((isset($_POST['checkbox'])) && ($this->m_authorization_group->check_authorization_one_menu('menu','delete')))
			$message_session_flash=$this->delete_all($this->input->post('checkbox',true));

		if($this->m_authorization_group->check_authorization_one_menu('menu','control')){

			$arr_auhorization=array('add','delete','update','control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('menu',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('menu',$value,$this->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->uri->segment(4,'all');
			$this->_arr_template_admin['data_content']['menu']=$this->m_menu->list_menu($this->my_layout->sess_lang_admin);

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_menu_control(true);
				$this->load->view(ADMIN_DIR_ROOT."/view_menu_manager",$this->_arr_template_admin['data_content']);
			}
			else{

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_menu_control(false);
				$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_menu_manager";

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

			if($this->m_authorization_group->check_authorization_one_menu('menu','update')){

				$arr_where['menu_id']=$this->uri->segment(4,true);
				$arr_data['menu_order']=$this->uri->segment(5,true);
				if(!$this->m_menu->update_menu($arr_data,$arr_where))
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

			$menu=$this->m_menu->get_menu($this->uri->segment(4,true),$this->my_layout->sess_lang_admin);
			if($this->m_authorization_group->check_authorization_one_menu('menu','update') && is_array($menu)){

				if(element('menu_public',$menu,'') == 1)
					$arr_data['menu_public']=0;
				else
					$arr_data['menu_public']=1;

				$arr_where['menu_id']=$this->uri->segment(4,true);
				if(!$this->m_menu->update_menu($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['menu_public'];
			}
		}
		else
			show_404('page');

	}

	public function add(){

		if($this->m_authorization_group->check_authorization_one_menu('menu','add')){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('menu',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('menu',$value,$this->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_menu') && ($this->form_validation->run('add_update_menu'))){

				$arr_data['menu_name']=$this->input->post('txt_menu_name',true);
				$arr_data['menu_url']=$this->input->post('txt_menu_url',true);
				$arr_data['menu_public']=$this->input->post('txt_menu_public',true);
				$arr_data['menu_order']=$this->input->post('txt_menu_order',true);
				$arr_data['menu_lang']=$this->my_layout->sess_lang_admin;
				$arr_data['menu_create_date']=date('Y-m-d H:i:s');
				$arr_data['menu_update_date']=date('Y-m-d H:i:s');

				if($this->m_menu->insert_menu($arr_data)){

					if($this->_arr_template_admin['data_content']['authorization']['control']){

						$this->session->set_flashdata('add_update_menu',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->session->set_flashdata('add_update_menu',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_menu_add_update('add_menu');
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_menu";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('menu','add',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			show_404('page');

	}

	public function delete(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->m_authorization_group->check_authorization_one_menu('menu','delete')){

				$arr_where_delete['menu_id']=$this->uri->segment(5,true);
				if(!$this->m_menu->delete_menu($arr_where_delete))
					echo "delete_faild";
				else
					$this->control();
			}
		}
		else
			show_404('page');

	}

	public function delete_all($arr_where){

		if(!(($this->uri->segment(2) == 'menu') && ($this->uri->segment(3) == 'delete_all'))){

			if($this->m_authorization_group->check_authorization_one_menu('menu','delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){

					$arr_where_delete['menu_id']=$key;
					if(!$this->m_menu->delete_menu($arr_where_delete))
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

		$this->_arr_template_admin['data_content']['menu']=$this->m_menu->get_menu($this->uri->segment(4,true),$this->my_layout->sess_lang_admin);

		if($this->m_authorization_group->check_authorization_one_menu('menu','update') && is_array($this->_arr_template_admin['data_content']['menu']) && !empty($this->_arr_template_admin['data_content']['menu'])){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('menu',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('menu',$value,$this->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_menu') && ($this->form_validation->run('add_update_menu'))){

				$arr_where['menu_id']=$this->uri->segment(4,true);

				$arr_data['menu_name']=$this->input->post('txt_menu_name',true);
				$arr_data['menu_url']=$this->input->post('txt_menu_url',true);
				$arr_data['menu_public']=$this->input->post('txt_menu_public',true);
				$arr_data['menu_order']=$this->input->post('txt_menu_order',true);
				$arr_data['menu_update_date']=date('Y-m-d H:i:s');

				if($this->m_menu->update_menu($arr_data,$arr_where)){

					if($this->_arr_template_admin['data_content']['authorization']['control']){

						$this->session->set_flashdata('add_update_menu',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->session->set_flashdata('add_update_menu',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_menu_add_update('update_menu');
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_menu";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('menu','update',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			show_404('page');

	}

}

?>