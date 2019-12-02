<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Supports_other{

	private $_object_support_other;
	private $_menu_class;
	private $_bool_active;
	private $_arr_data=array();

	public function __construct(){

		$this->_object_support_other=& get_instance();

		$this->_object_support_other->load->helper(array('url','form','array'));
		$this->_object_support_other->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination'));   //my_layout:session,language
		$this->_object_support_other->load->Model(array('m_support','m_category_sub'));   //my_layout:m_authorization_group,m_sub_menu_admin
		//$this->_object_support_other->my_layout->sess_lang_admin:control:7,update_public:1,add:3,update:4

		$this->_object_support_other->form_validation->set_error_delimiters('','');

		if((!isset($_POST[md5('hominhtri')])) && (!isset($_POST['validateValue'])))
			$this->_arr_data=$this->_object_support_other->my_layout->set_layout();

	}

	public function set_config_support_other($menu_class,$bool_active=array('category'=>true)){

		$this->_menu_class=$menu_class;
		$this->_bool_active=$bool_active;
		return $this->_arr_data;

	}

	public function email(){

		if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'email')){

			if(isset($_POST['checkbox']))
				$message_session_flash=$this->delete_email_all($this->_object_support_other->input->post('checkbox',true));

			$arr_auhorization=array('email');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_support_other->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_support_other->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->_object_support_other->uri->segment(4,'all');
			if($get_select_filter != 'all'){

				$arr_category_id=$this->_object_support_other->m_category_sub->get_category_sub_id($get_select_filter,$this->_object_support_other->my_layout->sess_lang_admin);
				$this->_arr_data['data_content']['support_other']=$this->_object_support_other->m_support->list_support_one_category($arr_category_id,$this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);
			}
			else{

				$this->_arr_data['data_content']['support_other']=$this->_object_support_other->m_support->list_support($this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);
			}

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_data['data_content']['info_content']=$this->_object_support_other->language->get_data_support_control(true,$this->_menu_class,$this->_bool_active);
				$this->_object_support_other->load->view(ADMIN_DIR_ROOT."/view_support_other_manager",$this->_arr_data['data_content']);
			}
			else{

				$this->_arr_data['data_content']['category_support_other']='';
				$arr_category_support_other=$this->_object_support_other->m_category_sub->list_category_sub_one_menu_admin($this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);
				if(is_array($arr_category_support_other))
					$this->_arr_data['data_content']['category_support_other']=$this->_object_support_other->m_category_sub->recursive_category_sub_add($arr_category_support_other,0,'select_categroy_support_orther',$get_select_filter);

				$this->_arr_data['data_content']['info_content']=$this->_object_support_other->language->get_data_support_control(false,$this->_menu_class,$this->_bool_active);
				$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_support_other_manager";

				$this->_arr_data['data_content']['title_function']=$this->_object_support_other->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['email'],false));
				$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['email'],false)." ::.";
				$this->_object_support_other->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function email_public(){

		if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'control')){

			if(isset($_POST['checkbox']))
				$message_session_flash=$this->delete_email_all_public($this->_object_support_other->input->post('checkbox',true));

			$arr_auhorization=array('email');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_support_other->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_support_other->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->_object_support_other->uri->segment(4,'all');
			if($get_select_filter != 'all'){

				$arr_category_id=$this->_object_support_other->m_category_sub->get_category_sub_id_public($get_select_filter,$this->_object_support_other->my_layout->sess_lang_admin);
				$this->_arr_data['data_content']['support_other']=$this->_object_support_other->m_support->list_support_one_category_public($arr_category_id,$this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);
			}
			else{

				$this->_arr_data['data_content']['support_other']=$this->_object_support_other->m_support->list_support_public($this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);
			}

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_data['data_content']['info_content']=$this->_object_support_other->language->get_data_support_control(true,$this->_menu_class,$this->_bool_active);
				$this->_object_support_other->load->view(ADMIN_DIR_ROOT."/view_support_other_manager",$this->_arr_data['data_content']);
			}
			else{

				$this->_arr_data['data_content']['category_support_other']='';
				$arr_category_support_other=$this->_object_support_other->m_category_sub->list_category_sub_one_menu_admin_public($this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);
				if(is_array($arr_category_support_other))
					$this->_arr_data['data_content']['category_support_other']=$this->_object_support_other->m_category_sub->recursive_category_sub_add($arr_category_support_other,0,'select_categroy_support_orther',$get_select_filter);

				$this->_arr_data['data_content']['info_content']=$this->_object_support_other->language->get_data_support_control(false,$this->_menu_class,$this->_bool_active);
				$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_support_other_manager";

				$this->_arr_data['data_content']['title_function']=$this->_object_support_other->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['email'],false));
				$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['email'],false)." ::.";
				$this->_object_support_other->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function update_email_order(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(!preg_match("/^([\-+])?[0-9]+$/i",$this->_object_support_other->uri->segment(5,true))){

				echo "is_numeric";
				exit();
			}

			if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'email')){

				$arr_where['support_id']=$this->_object_support_other->uri->segment(4,true);
				$arr_data['support_order']=$this->_object_support_other->uri->segment(5,true);
				if(!$this->_object_support_other->m_support->update_support($arr_data,$arr_where))
					echo "is_numeric";
				else
					echo $this->_object_support_other->uri->segment(5,true);
			}
		}
		else
			show_404('page');

	}

	public function update_email_order_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(!preg_match("/^([\-+])?[0-9]+$/i",$this->_object_support_other->uri->segment(5,true))){

				echo "is_numeric";
				exit();
			}

			if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'email')){

				$arr_where['support_id']=$this->_object_support_other->uri->segment(4,true);
				$arr_data['support_order']=$this->_object_support_other->uri->segment(5,true);
				if(!$this->_object_support_other->m_support->update_support($arr_data,$arr_where))
					echo "is_numeric";
				else
					echo $this->_object_support_other->uri->segment(5,true);
			}
		}
		else
			show_404('page');

	}

	public function update_email_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$support_other=$this->_object_support_other->m_support->get_support($this->_object_support_other->uri->segment(4,true),$this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);
			if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'email') && is_array($support_other)){

				if(element('support_public',$support_other,'') == 1)
					$arr_data['support_public']=0;
				else
					$arr_data['support_public']=1;

				$arr_where['support_id']=$this->_object_support_other->uri->segment(4,true);
				if(!$this->_object_support_other->m_support->update_support($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['support_public'];
			}
		}
		else
			show_404('page');

	}

	public function update_email_public_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$support_other=$this->_object_support_other->m_support->get_support_public($this->_object_support_other->uri->segment(4,true),$this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);
			if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'email') && is_array($support_other)){

				if(element('support_public',$support_other,'') == 1)
					$arr_data['support_public']=0;
				else
					$arr_data['support_public']=1;

				$arr_where['support_id']=$this->_object_support_other->uri->segment(4,true);
				if(!$this->_object_support_other->m_support->update_support($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['support_public'];
			}
		}
		else
			show_404('page');

	}

	public function addemail(){

		if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'email')){

			$arr_auhorization=array('email');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_support_other->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_support_other->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_support_other') && ($this->_object_support_other->form_validation->run('add_update_support'))){


				$arr_data['support_name']=$this->_object_support_other->input->post('txt_support_name',true);
				$arr_data['support_nick']=$this->_object_support_other->input->post('txt_support_nick',true);
				$arr_data['cate_id']=$this->_object_support_other->input->post('txt_support_type',true);
				$arr_data['support_public']=$this->_object_support_other->input->post('txt_support_public',true);
				$arr_data['support_order']=$this->_object_support_other->input->post('txt_support_order',true);
				$arr_data['support_create_date']=date('Y-m-d H:i:s');
				$arr_data['support_update_date']=date('Y-m-d H:i:s');

				if($this->_object_support_other->m_support->insert_support($arr_data)){

					if($this->_arr_data['data_content']['authorization']['email']){

						$this->_object_support_other->session->set_flashdata('add_update_support_other',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['email'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['email'],false));
					}
					else{

						$this->_object_support_other->session->set_flashdata('add_update_support_other',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}

			$this->_arr_data['data_content']['category_support_other']='';
			$arr_category_support_other=$this->_object_support_other->m_category_sub->list_category_sub_one_menu_admin($this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);
			if(is_array($arr_category_support_other))
				$this->_arr_data['data_content']['category_support_other']=$this->_object_support_other->m_category_sub->recursive_category_sub_add($arr_category_support_other,0,'txt_support_type',false);

			$this->_arr_data['data_content']['info_content']=$this->_object_support_other->language->get_data_support_add_update('add_support_other',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_support_other";

			$arr_sub_menu=$this->_object_support_other->m_sub_menu_admin->get_sub_menu($this->_menu_class,'email',$this->_object_support_other->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_support_other->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_support_other->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function addemail_public(){

		if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'email')){

			$arr_auhorization=array('email');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_support_other->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_support_other->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_support_other') && ($this->_object_support_other->form_validation->run('add_update_support'))){

				$arr_data['support_name']=$this->_object_support_other->input->post('txt_support_name',true);
				$arr_data['support_nick']=$this->_object_support_other->input->post('txt_support_nick',true);
				$arr_data['cate_id']=$this->_object_support_other->input->post('txt_support_type',true);
				$arr_data['support_public']=$this->_object_support_other->input->post('txt_support_public',true);
				$arr_data['support_order']=$this->_object_support_other->input->post('txt_support_order',true);
				$arr_data['support_create_date']=date('Y-m-d H:i:s');
				$arr_data['support_update_date']=date('Y-m-d H:i:s');

				if($this->_object_support_other->m_support->insert_support($arr_data)){

					if($this->_arr_data['data_content']['authorization']['email']){

						$this->_object_support_other->session->set_flashdata('add_update_support_other',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['email'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['email'],false));
					}
					else{

						$this->_object_support_other->session->set_flashdata('add_update_support_other',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}

			$this->_arr_data['data_content']['category_support_other']='';
			$arr_category_support_other=$this->_object_support_other->m_category_sub->list_category_sub_one_menu_admin_public($this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);
			if(is_array($arr_category_support_other))
				$this->_arr_data['data_content']['category_support_other']=$this->_object_support_other->m_category_sub->recursive_category_sub_add($arr_category_support_other,0,'txt_support_type',false);

			$this->_arr_data['data_content']['info_content']=$this->_object_support_other->language->get_data_support_add_update('add_support_other',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_support_other";

			$arr_sub_menu=$this->_object_support_other->m_sub_menu_admin->get_sub_menu($this->_menu_class,'email',$this->_object_support_other->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_support_other->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_support_other->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function delete_email(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'email')){

				$arr_where_delete['support_id']=$this->_object_support_other->uri->segment(5,true);
				if(!$this->_object_support_other->m_support->delete_support($arr_where_delete))
					echo "delete_faild";
				else
					$this->email();
			}
		}
		else
			show_404('page');

	}

	public function delete_email_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'email')){

				$arr_where_delete['support_id']=$this->_object_support_other->uri->segment(5,true);
				if(!$this->_object_support_other->m_support->delete_support($arr_where_delete))
					echo "delete_faild";
				else
					$this->email_public();
			}
		}
		else
			show_404('page');

	}

	public function delete_email_all($arr_where){

		if(!(($this->_object_support_other->uri->segment(2) == $this->_menu_class) && ($this->_object_support_other->uri->segment(3) == 'delete_email_all'))){

			if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'email') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){
					$arr_where_delete['support_id']=$key;
					if(!$this->_object_support_other->m_support->delete_support($arr_where_delete))
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

	public function delete_email_all_public($arr_where){

		if(!(($this->_object_support_other->uri->segment(2) == $this->_menu_class) && ($this->_object_support_other->uri->segment(3) == 'delete_email_all'))){

			if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'email') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){
					$arr_where_delete['support_id']=$key;
					if(!$this->_object_support_other->m_support->delete_support($arr_where_delete))
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

	public function upemail(){

		$this->_arr_data['data_content']['support_other']=$this->_object_support_other->m_support->get_support($this->_object_support_other->uri->segment(4,true),$this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);

		if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'email') && is_array($this->_arr_data['data_content']['support_other']) && !empty($this->_arr_data['data_content']['support_other'])){

			$arr_auhorization=array('email');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_support_other->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_support_other->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_support_other') && ($this->_object_support_other->form_validation->run('add_update_support'))){

				$arr_where['support_id']=$this->_object_support_other->uri->segment(4,true);

				$arr_data['support_name']=$this->_object_support_other->input->post('txt_support_name',true);
				$arr_data['support_nick']=$this->_object_support_other->input->post('txt_support_nick',true);
				$arr_data['cate_id']=$this->_object_support_other->input->post('txt_support_type',true);
				$arr_data['support_public']=$this->_object_support_other->input->post('txt_support_public',true);
				$arr_data['support_order']=$this->_object_support_other->input->post('txt_support_order',true);
				$arr_data['support_update_date']=date('Y-m-d H:i:s');

				if($this->_object_support_other->m_support->update_support($arr_data,$arr_where)){

					if($this->_arr_data['data_content']['authorization']['email']){

						$this->_object_support_other->session->set_flashdata('add_update_support_other',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['email'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['email'],false));
					}
					else{

						$this->_object_support_other->session->set_flashdata('add_update_support_other',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_data['data_content']['category_support_other']='';
			$arr_category_support_other=$this->_object_support_other->m_category_sub->list_category_sub_one_menu_admin($this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);
			if(is_array($arr_category_support_other))
				$this->_arr_data['data_content']['category_support_other']=$this->_object_support_other->m_category_sub->recursive_category_sub_add($arr_category_support_other,0,'txt_support_type',element('cate_id',$this->_arr_data['data_content']['support_other'],''));

			$this->_arr_data['data_content']['info_content']=$this->_object_support_other->language->get_data_support_add_update('update_support_other',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_support_other";

			$arr_sub_menu=$this->_object_support_other->m_sub_menu_admin->get_sub_menu($this->_menu_class,'email',$this->_object_support_other->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_support_other->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_support_other->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function upemail_public(){

		$this->_arr_data['data_content']['support_other']=$this->_object_support_other->m_support->get_support_public($this->_object_support_other->uri->segment(4,true),$this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);

		if($this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,'email') && is_array($this->_arr_data['data_content']['support_other']) && !empty($this->_arr_data['data_content']['support_other'])){

			$arr_auhorization=array('email');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_support_other->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_support_other->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_support_other->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_support_other') && ($this->_object_support_other->form_validation->run('add_update_support'))){

				$arr_where['support_id']=$this->_object_support_other->uri->segment(4,true);

				$arr_data['support_name']=$this->_object_support_other->input->post('txt_support_name',true);
				$arr_data['support_nick']=$this->_object_support_other->input->post('txt_support_nick',true);
				$arr_data['cate_id']=$this->_object_support_other->input->post('txt_support_type',true);
				$arr_data['support_public']=$this->_object_support_other->input->post('txt_support_public',true);
				$arr_data['support_order']=$this->_object_support_other->input->post('txt_support_order',true);
				$arr_data['support_update_date']=date('Y-m-d H:i:s');

				if($this->_object_support_other->m_support->update_support($arr_data,$arr_where)){

					if($this->_arr_data['data_content']['authorization']['email']){

						$this->_object_support_other->session->set_flashdata('add_update_support_other',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['email'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['email'],false));
					}
					else{

						$this->_object_support_other->session->set_flashdata('add_update_support_other',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_data['data_content']['category_support_other']='';
			$arr_category_support_other=$this->_object_support_other->m_category_sub->list_category_sub_one_menu_admin_public($this->_menu_class,$this->_object_support_other->my_layout->sess_lang_admin);
			if(is_array($arr_category_support_other))
				$this->_arr_data['data_content']['category_support_other']=$this->_object_support_other->m_category_sub->recursive_category_sub_add($arr_category_support_other,0,'txt_support_type',element('cate_id',$this->_arr_data['data_content']['support_other'],''));

			$this->_arr_data['data_content']['info_content']=$this->_object_support_other->language->get_data_support_add_update('update_support_other',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_support_other";

			$arr_sub_menu=$this->_object_support_other->m_sub_menu_admin->get_sub_menu($this->_menu_class,'email',$this->_object_support_other->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_support_other->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_support_other->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function check_validation_support_nick($support_nick=true){

		$bool_support_nick=false;
		$this->_object_support_other->form_validation->set_message('check_validation_support_nick','%s');

		if(!(($this->_object_support_other->uri->segment(2) == $this->_menu_class) && ($this->_object_support_other->uri->segment(3) == 'check_validation_support_nick'))){

			switch($this->_object_support_other->input->post('txt_support_type')){

				case '1': case '2':
					$bool_support_nick=$this->_object_support_other->form_validation->valid_email($support_nick);
					break;

				case '3': case '4':
					$bool_support_nick=$this->_object_support_other->form_validation->custom_support_nick($support_nick);
					break;

				case '5': case '6':
					$bool_support_nick=$this->_object_support_other->form_validation->custom_support_nick($support_nick);
					break;

				case '7': case '8':
					$pattern='/(\s|\.)/i';
					$replacement='';
					$support_nick=preg_replace($pattern,$replacement,$support_nick);
					$bool_support_nick=$this->_object_support_other->form_validation->custom_phone($support_nick);
					break;

				case '9': case '10':
					$bool_support_nick=$this->_object_support_other->form_validation->valid_email($support_nick);
					break;

				default:
					$bool_support_nick=$this->_object_support_other->form_validation->valid_email($support_nick);
			}
		}
		else
			show_404('page');

		return $bool_support_nick;

	}

}

?>