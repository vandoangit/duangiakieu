<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Group extends CI_Controller{

	public $_arr_template_admin=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array'));
		$this->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination'));
		$this->load->Model(array('m_user_group'));

		$this->form_validation->set_error_delimiters('','');

		if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			$this->_arr_template_admin=$this->my_layout->set_layout();

	}

	public function control(){

		if((isset($_POST['checkbox'])) && ($this->m_authorization_group->check_authorization_one_menu('group','delete')))
			$message_session_flash=$this->delete_all($this->input->post('checkbox',true));

		if($this->m_authorization_group->check_authorization_one_menu('group','control')){

			$arr_auhorization=array('add','delete','update','authorization','control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('group',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('group',$value,$this->my_layout->sess_lang_admin);
			}
			$this->_arr_template_admin['data_content']['authorization']['user']=$this->m_authorization_group->check_authorization_one_menu('user','control');
			$this->_arr_template_admin['data_content']['sub_menu']['user']=$this->m_sub_menu_admin->get_sub_menu('user','control',$this->my_layout->sess_lang_admin);

			$this->_arr_template_admin['data_content']['user_group']=$this->m_user_group->list_user_group();

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_user_group_control(true);
				$this->load->view(ADMIN_DIR_ROOT."/view_user_group_manager",$this->_arr_template_admin['data_content']);
			}
			else{

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_user_group_control(false);
				$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_user_group_manager";

				$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
				$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)." ::.";
				$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function add(){

		if($this->m_authorization_group->check_authorization_one_menu('group','add')){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('group',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('group',$value,$this->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_user_group') && ($this->form_validation->run('add_update_user_group'))){

				$arr_data['user_group_name']=$this->input->post('txt_user_group_name',true);
				$arr_data['user_group_create_date']=date('Y-m-d H:i:s');
				$arr_data['user_group_update_date']=date('Y-m-d H:i:s');

				if($this->m_user_group->insert_user_group($arr_data)){

					if($this->_arr_template_admin['data_content']['authorization']['control']){

						$this->session->set_flashdata('add_update_user_group',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->session->set_flashdata('add_update_user_group',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_user_group_add_update('add_user_group');
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_user_group";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('group','add',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			show_404('page');

	}

	public function delete(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->m_authorization_group->check_authorization_one_menu('group','delete')){

				$arr_where_delete['user_group_id']=$this->uri->segment(5,true);
				if(!$this->m_user_group->delete_user_group($arr_where_delete))
					echo "delete_faild";
				else
					$this->control();
			}
		}
		else
			show_404('page');

	}

	public function delete_all($arr_where){

		if(!(($this->uri->segment(2) == 'group') && ($this->uri->segment(3) == 'delete_all'))){

			if($this->m_authorization_group->check_authorization_one_menu('group','delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){

					$arr_where_delete['user_group_id']=$key;
					if(!$this->m_user_group->delete_user_group($arr_where_delete))
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

		$this->_arr_template_admin['data_content']['user_group']=$this->m_user_group->get_user_group($this->uri->segment(4,true));

		if($this->m_authorization_group->check_authorization_one_menu('group','update') && is_array($this->_arr_template_admin['data_content']['user_group']) && !empty($this->_arr_template_admin['data_content']['user_group'])){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('group',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('group',$value,$this->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_user_group') && ($this->form_validation->run('add_update_user_group'))){

				$arr_where['user_group_id']=$this->uri->segment(4,true);

				$arr_data['user_group_name']=$this->input->post('txt_user_group_name',true);
				$arr_data['user_group_update_date']=date('Y-m-d H:i:s');

				if($this->m_user_group->update_user_group($arr_data,$arr_where)){

					if($this->_arr_template_admin['data_content']['authorization']['control']){

						$this->session->set_flashdata('add_update_user_group',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->session->set_flashdata('add_update_user_group',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_user_group_add_update('update_user_group');
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_user_group";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('group','update',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			show_404('page');

	}

	public function authorization(){

		$this->_arr_template_admin['data_content']['user_group']=$this->m_user_group->get_user_group($this->uri->segment(4,true));

		if($this->m_authorization_group->check_authorization_one_menu('group','authorization') && is_array($this->_arr_template_admin['data_content']['user_group']) && !empty($this->_arr_template_admin['data_content']['user_group'])){

			if(isset($_POST['checkbox']))
				$message_session_flash=$this->delete_authorization_group_all($this->uri->segment(4,true),$this->input->post('checkbox',true));
			elseif(isset($_POST['button_authorization_group'])){

				$arr_data['user_group_id']=$this->uri->segment(4,true);
				$arr_temp=$this->input->post('select_authorization_group',true);
				$arr_temp=explode('/',$arr_temp);
				$arr_data['menu_class']=$arr_temp[0];
				$arr_data['sub_menu_function']=$arr_temp[1];

				if($this->m_authorization_group->check_exist_authorization_group($arr_data['user_group_id'],$arr_data['menu_class'],$arr_data['sub_menu_function'])){

					$this->m_authorization_group->insert_authorization_group($arr_data);
					$message_session_flash=alert(lang('message_authorization_success1'));
				}
				else
					$message_session_flash=alert(lang('message_authorization_faild1'));
			}

			$arr_auhorization=array('authorization','control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('group',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('group',$value,$this->my_layout->sess_lang_admin);
			}

			$get_user_group_id=$this->uri->segment(4,true);
			$arr_user_group=$this->m_authorization_group->list_authorization_one_group($get_user_group_id,$this->my_layout->sess_lang_admin);

			if(is_array($arr_user_group)){

				for($i=0; $i < count($arr_user_group); $i++){
					if(element('menu_class',$arr_user_group[$i],false) == 'all'){

						$arr_user_group[$i]['sub_menu_name']="Administrator";
						break;
					}
				}
			}

			$this->_arr_template_admin['data_content']['authorization_user_group']=$arr_user_group;

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_user_group_authorization(true);
				$this->load->view(ADMIN_DIR_ROOT."/view_user_group_authorization",$this->_arr_template_admin['data_content']);
			}
			else{

				$arr_menu_admin=$this->m_menu_admin->list_menu_admin($this->my_layout->sess_lang_admin);
				$this->_arr_template_admin['data_content']['menu_authorization']=array();
				if(is_array($arr_menu_admin)){

					for($i=0; $i < count($arr_menu_admin); $i++){
						$arr_sub_menu_admin=$this->m_sub_menu_admin->list_sub_menu_one_menu(element('menu_class',$arr_menu_admin[$i],''),$this->my_layout->sess_lang_admin);
						if(is_array($arr_sub_menu_admin)){

							$arr_menu_admin[$i]['sub_menu_admin']=$arr_sub_menu_admin;
							$this->_arr_template_admin['data_content']['menu_authorization'][]=$arr_menu_admin[$i];
						}
					}
				}

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_user_group_authorization(false);
				$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_user_group_authorization";

				$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_template_admin['data_content']['sub_menu']['authorization'],''));
				$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_template_admin['data_content']['sub_menu']['authorization'],'')." ::.";
				$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function delete_authorization_group(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->m_authorization_group->check_authorization_one_menu('group','authorization')){

				$arr_where_delete['user_group_id']=$this->uri->segment(4,true);
				$arr_where_delete['menu_class']=$this->uri->segment(5,true);
				$arr_where_delete['sub_menu_function']=$this->uri->segment(6,true);

				if(!$this->m_authorization_group->delete_authorization_group($arr_where_delete))
					echo "delete_faild";
				else
					$this->authorization();
			}
		}
		else
			show_404('page');

	}

	public function delete_authorization_group_all($user_group_id,$arr_where){

		if(!(($this->uri->segment(2) == 'group') && ($this->uri->segment(3) == 'delete_authorization_group_all'))){

			if($this->m_authorization_group->check_authorization_one_menu('group','authorization') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){

					$arr_where_delete['user_group_id']=$user_group_id;
					$arr_temp=explode('/',$key);
					$arr_where_delete['menu_class']=$arr_temp[0];
					$arr_where_delete['sub_menu_function']=$arr_temp[1];
					if(!$this->m_authorization_group->delete_authorization_group($arr_where_delete))
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

}

?>