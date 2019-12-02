<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends CI_Controller{

	public $_arr_template_admin=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array'));
		$this->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination'));
		$this->load->Model(array('m_user_group'));

		$this->form_validation->set_error_delimiters('','');

		//Cai dat khi su dung ham ajax,neu ma co ajax thi khong set_layout,else set_layout
		if((!isset($_POST[md5('hominhtri')])) && (!isset($_POST['validateValue'])))
			$this->_arr_template_admin=$this->my_layout->set_layout();

	}

	public function control(){

		//Kiem tra xem co quyen control khong
		if((isset($_POST['checkbox'])) && ($this->m_authorization_group->check_authorization_one_menu('user','delete')))
			$message_session_flash=$this->delete_all($this->input->post('checkbox',true));

		//Kiem tra xem co quyen control khong
		if($this->m_authorization_group->check_authorization_one_menu('user','control')){

			//Check quyen cho user va dua thong tin duong dan menu_class,menu_function
			$arr_auhorization=array('add','delete','update','authorization','control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('user',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('user',$value,$this->my_layout->sess_lang_admin);
			}

			//Cau hinh phan trang va show du lieu
			$get_select_filter=$this->uri->segment(4,'all');
			if($get_select_filter != 'all'){

				$this->_arr_template_admin['data_content']['user']=$this->m_user->list_user_one_group($get_select_filter);
			}
			else{

				$this->_arr_template_admin['data_content']['user']=$this->m_user->list_user();
			}

			//Neu su dung ajax
			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_user_control(true);
				$this->load->view(ADMIN_DIR_ROOT."/view_user_manager",$this->_arr_template_admin['data_content']);
			}
			else{

				//Show list user_group de loc user
				$this->_arr_template_admin['data_content']['user_group']=$this->m_user_group->list_user_group();

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_user_control(false);
				$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_user_manager";

				//Load Mat Dinh Cua Trang Home
				$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
				$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)." ::.";
				$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function add(){

		if($this->m_authorization_group->check_authorization_one_menu('user','add')){

			//Check quyen cho user va dua thong tin duong dan menu_class,menu_function
			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('user',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('user',$value,$this->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_user') && ($this->form_validation->run('add_user'))){

				$arr_data['user_account']=$this->input->post('txt_user_account',true);
				$arr_data['user_pass']=md5($this->input->post('txt_user_pass',true));
				$arr_data['user_name']=$this->input->post('txt_user_name',true);
				$arr_data['user_gender']=$this->input->post('txt_user_gender',true);
				$arr_data['user_birthday']=date('Y-m-d H:i:s',strtotime($this->input->post('txt_user_birthday',true)));
				$arr_data['user_email']=$this->input->post('txt_email',true);
				$arr_data['user_phone']=$this->input->post('txt_user_phone',true);
				$arr_data['user_address']=$this->input->post('txt_user_address',true);
				$arr_data['user_web']=$this->input->post('txt_user_web',true);
				$arr_data['user_directory']=$this->input->post('txt_user_directory',true);
				if(isset($_POST['input_check_browser']))
					$arr_data['user_img']=$this->input->post('txt_user_img',true);
				$arr_data['user_fax']=$this->input->post('txt_user_fax',true);
				$arr_data['user_last_login']=date('Y-m-d H:i:s');
				$arr_data['user_create_date']=date('Y-m-d H:i:s');
				$arr_data['user_update_date']=date('Y-m-d H:i:s');

				if($this->m_user->insert_user($arr_data)){

					if($this->_arr_template_admin['data_content']['authorization']['control']){

						$this->session->set_flashdata('add_update_user',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->session->set_flashdata('add_update_user',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_user_add_update('add_user');
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_user";

			//Load Mat Dinh Cua Trang Home
			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('user','add',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			show_404('page');

	}

	public function check_user_account(){

		if(isset($_POST['validateValue'])){

			$validateValue=$this->input->post('validateValue',true);
			$validateId=$this->input->post('validateId',true);
			$validateError=$this->input->post('validateError',true);
			$arrayToJs=array();
			$arrayToJs[0]=$validateId;
			$arrayToJs[1]=$validateError;

			if($this->m_authorization_user->check_user_account($this->input->post('validateValue',true))){

				for($x=0; $x < 1000000; $x++){
					if($x == 990000){

						$arrayToJs[2]="false";
						echo '{"jsonValidateReturn":'.json_encode($arrayToJs).'}';
					}
				}
			}
			else{

				$arrayToJs[2]="true";
				echo '{"jsonValidateReturn":'.json_encode($arrayToJs).'}';
			}
		}

	}

	public function check_user_account_exist(){

		if(isset($_POST['validateValue'])){

			$validateValue=$this->input->post('validateValue',true);
			$validateId=$this->input->post('validateId',true);
			$validateError=$this->input->post('validateError',true);
			$arrayToJs=array();
			$arrayToJs[0]=$validateId;
			$arrayToJs[1]=$validateError;

			if(!$this->m_authorization_user->check_user_account($this->input->post('validateValue',true))){

				for($x=0; $x < 1000000; $x++){
					if($x == 990000){

						$arrayToJs[2]="false";
						echo '{"jsonValidateReturn":'.json_encode($arrayToJs).'}';
					}
				}
			}
			else{

				$arrayToJs[2]="true";
				echo '{"jsonValidateReturn":'.json_encode($arrayToJs).'}';
			}
		}

	}

	public function check_user_account1($user_account=true){

		if(!(($this->uri->segment(2) == 'user') && ($this->uri->segment(3) == 'check_user_account1'))){

			if($this->m_authorization_user->check_user_account($user_account)){

				$this->form_validation->set_message('check_user_account1','%s');
				return false;
			}
			else
				return true;
		}
		else
			show_404('page');

	}

	public function check_user_account1_exist($user_account=true){

		if(!(($this->uri->segment(2) == 'user') && ($this->uri->segment(3) == 'check_user_account1'))){

			if(!$this->m_authorization_user->check_user_account($user_account)){

				$this->form_validation->set_message('check_user_account1','%s');
				return false;
			}
			else
				return true;
		}
		else
			show_404('page');

	}

	public function delete(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->m_authorization_group->check_authorization_one_menu('user','delete')){

				$arr_where_delete['user_account']=$this->uri->segment(5,true);
				if(!$this->m_user->delete_user($arr_where_delete,$this->session->userdata($this->m_authorization_user->sess_authorization_user)))
					echo "delete_faild";
				else
					$this->control();
			}
		}
		else
			show_404('page');

	}

	public function delete_all($arr_where){

		if(!(($this->uri->segment(2) == 'user') && ($this->uri->segment(3) == 'delete_all'))){

			if($this->m_authorization_group->check_authorization_one_menu('user','delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){

					$arr_where_delete['user_account']=$key;
					if(!$this->m_user->delete_user($arr_where_delete,$this->session->userdata($this->m_authorization_user->sess_authorization_user)))
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

		$this->_arr_template_admin['data_content']['user']=$this->m_user->get_user($this->uri->segment(4,true));

		if($this->m_authorization_group->check_authorization_one_menu('user','update') && is_array($this->_arr_template_admin['data_content']['user']) && !empty($this->_arr_template_admin['data_content']['user'])){

			//Check quyen cho user va dua thong tin duong dan menu_class,menu_function
			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('user',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('user',$value,$this->my_layout->sess_lang_admin);
			}

			if($this->input->post('txt_user_pass','') != '')
				$arr_data['user_pass']=md5($this->input->post('txt_user_pass',true));


			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_user') && ($this->form_validation->run('update_user'))){

				$arr_where['user_account']=$this->uri->segment(4,true);

				$arr_data['user_name']=$this->input->post('txt_user_name',true);
				$arr_data['user_gender']=$this->input->post('txt_user_gender',true);
				$arr_data['user_birthday']=date('Y-m-d H:i:s',strtotime($this->input->post('txt_user_birthday',true)));
				$arr_data['user_email']=$this->input->post('txt_email',true);
				$arr_data['user_phone']=$this->input->post('txt_user_phone',true);
				$arr_data['user_address']=$this->input->post('txt_user_address',true);
				$arr_data['user_web']=$this->input->post('txt_user_web',true);
				$arr_data['user_directory']=$this->input->post('txt_user_directory',true);
				if(isset($_POST['input_check_browser']))
					$arr_data['user_img']=$this->input->post('txt_user_img',true);
				$arr_data['user_fax']=$this->input->post('txt_user_fax',true);
				$arr_data['user_update_date']=date('Y-m-d H:i:s');

				if($this->m_user->update_user($arr_data,$arr_where)){

					if($this->_arr_template_admin['data_content']['authorization']['control']){

						$this->session->set_flashdata('add_update_user',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->session->set_flashdata('add_update_user',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_user_add_update('update_user');
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_user";

			//Load Mat Dinh Cua Trang Home
			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('user','update',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			show_404('page');

	}

	public function authorization(){

		//Show info user
		$this->_arr_template_admin['data_content']['user']=$this->m_user->get_user($this->uri->segment(4,true));

		//Kiem tra xem co quyen control khong
		if($this->m_authorization_group->check_authorization_one_menu('user','authorization') && is_array($this->_arr_template_admin['data_content']['user']) && !empty($this->_arr_template_admin['data_content']['user'])){

			if(isset($_POST['checkbox']))
				$message_session_flash=$this->delete_authorization_user_all($this->uri->segment(4,true),$this->input->post('checkbox',true));
			elseif(isset($_POST['button_authorization_user']) && ($_POST['select_authorization_user'] != -1)){

				$arr_data['user_account']=$this->uri->segment(4,true);
				$arr_data['user_group_id']=$this->input->post('select_authorization_user',true);

				if($this->m_authorization_user->check_exist_authorization_user($arr_data['user_account'],$arr_data['user_group_id'])){

					$this->m_authorization_user->insert_authorization_user($arr_data);
					$message_session_flash=alert(lang('message_authorization_success'));
				}
				else
					$message_session_flash=alert(lang('message_authorization_faild'));
			}

			//Check quyen cho user va dua thong tin duong dan menu_class,menu_function
			$arr_auhorization=array('authorization','control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('user',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('user',$value,$this->my_layout->sess_lang_admin);
			}

			$this->_arr_template_admin['data_content']['authorization']['group']=$this->m_authorization_group->check_authorization_one_menu('group','authorization');
			$this->_arr_template_admin['data_content']['sub_menu']['group']=$this->m_sub_menu_admin->get_sub_menu('group','authorization',$this->my_layout->sess_lang_admin);

			//Cau hinh phan trang va show du lieu
			$get_user_account=$this->uri->segment(4,true);
			$this->_arr_template_admin['data_content']['authorization_user']=$this->m_user_group->list_group_one_user($get_user_account);

			//Neu su dung ajax
			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_user_authorization(true);
				$this->load->view(ADMIN_DIR_ROOT."/view_user_authorization",$this->_arr_template_admin['data_content']);
			}
			else{
				//Show list user_group de loc user
				$this->_arr_template_admin['data_content']['user_group']=$this->m_user_group->list_user_group();

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_user_authorization(false);
				$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_user_authorization";

				//Load Mat Dinh Cua Trang Home
				$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_template_admin['data_content']['sub_menu']['authorization'],''));
				$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_template_admin['data_content']['sub_menu']['authorization'],'')." ::.";
				$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function delete_authorization_user(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->m_authorization_group->check_authorization_one_menu('user','authorization')){

				$arr_where_delete['user_account']=$this->uri->segment(4,true);
				$arr_where_delete['user_group_id']=$this->uri->segment(5,true);
				if(!$this->m_authorization_user->delete_authorization_user($arr_where_delete))
					echo "delete_faild";
				else
					$this->authorization();
			}
		}
		else
			show_404('page');

	}

	public function delete_authorization_user_all($user_account,$arr_where){

		if(!(($this->uri->segment(2) == 'user') && ($this->uri->segment(3) == 'delete_authorization_user_all'))){

			if($this->m_authorization_group->check_authorization_one_menu('user','authorization') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){

					$arr_where_delete['user_account']=$user_account;
					$arr_where_delete['user_group_id']=$key;
					if(!$this->m_authorization_user->delete_authorization_user($arr_where_delete))
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