<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Members extends CI_Controller{

	public $_arr_data=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('form','url','array','general_page'));
		$this->load->library(array(DEFAULT_DIR_ROOT.'/my_layout','session','pagination','form_validation'));
		$this->load->Model(array('m_user','m_user_group','m_authorization_user','m_authorization_group'));

		$this->form_validation->set_error_delimiters('','');
		if(!isset($_POST[md5('hominhtri')]) && !isset($_POST['validateValue']))
			$this->_arr_data=$this->my_layout->set_layout();

	}

	public function login(){

		$this->form_validation->set_error_delimiters('','');

		$this->_arr_data['data_content']['members_login']=true;

		if($this->session->userdata($this->m_authorization_user->sess_authorization_user) && ($this->session->userdata($this->m_authorization_group->sess_authorization_group) || is_array($this->session->userdata($this->m_authorization_group->sess_authorization_group)))){

			$account=$this->session->userdata($this->m_authorization_user->sess_authorization_user);

			$this->_arr_data['data_content']['user']=$this->m_user->get_user($account);

			$arr_group=$this->m_user_group->list_group_one_user($account);
			if(is_array($arr_group) && !empty($arr_group) && !empty($this->_arr_data['data_content']['user'])){

				$arr_authorization=array();
				foreach($arr_group as $key_group=> $value_group){
					$arr_authorization_temp=$this->m_authorization_group->check_authorization_group(element('user_group_id',$value_group,''));
					if(is_array($arr_authorization_temp) && !empty($arr_authorization_temp))
						$arr_authorization=array_merge($arr_authorization,$arr_authorization_temp);
				}
				if(is_array($arr_authorization) && !empty($arr_authorization))
					$arr_authorization=$this->m_authorization_group->array_uniques($arr_authorization);

				$this->session->set_userdata($this->m_authorization_user->sess_authorization_user,$account);
				$this->session->set_userdata($this->m_authorization_group->sess_authorization_group,$arr_authorization);

				$arr_update_data['user_last_login']=date('Y-m-d H:i:s');
				$arr_update_where['user_account']=$account;
				$this->m_user->update_user($arr_update_data,$arr_update_where);

				$this->_arr_data['data_content']['members_login']=false;
			}
			else{

				$sess_login=array($this->m_authorization_user->sess_authorization_user=>'',$this->m_authorization_group->sess_authorization_group=>'');
				$this->session->unset_userdata($sess_login);
			}
		}
		else if(isset($_POST['submit_form']) && $this->form_validation->run('member_login')){

			$account=$this->input->post('txt_account_login',true);
			$pass=md5($this->input->post('txt_password_login',true));

			if($this->m_authorization_user->check_user_login($account,$pass)){

				$this->_arr_data['data_content']['user']=$this->m_user->get_user($account);

				$arr_group=$this->m_user_group->list_group_one_user($account);
				if(is_array($arr_group) && !empty($arr_group)){

					$arr_authorization=array();
					foreach($arr_group as $key_group=> $value_group){
						$arr_authorization_temp=$this->m_authorization_group->check_authorization_group(element('user_group_id',$value_group,false));
						if(is_array($arr_authorization_temp) && !empty($arr_authorization_temp))
							$arr_authorization=array_merge($arr_authorization,$arr_authorization_temp);
					}
					if(is_array($arr_authorization) && !empty($arr_authorization))
						$arr_authorization=$this->m_authorization_group->array_uniques($arr_authorization);

					$this->session->set_userdata($this->m_authorization_user->sess_authorization_user,$account);
					$this->session->set_userdata($this->m_authorization_group->sess_authorization_group,$arr_authorization);

					$arr_update_data['user_last_login']=date('Y-m-d H:i:s');
					$arr_update_where['user_account']=$account;
					$this->m_user->update_user($arr_update_data,$arr_update_where);

					$this->_arr_data['data_content']['members_login']=false;
				}
				else
					$this->_arr_data['data_content']['members_login']=lang('messages_login_authorization');
			}
			else
				$this->_arr_data['data_content']['members_login']=lang('messages_login_user');
		}
		else
			$this->_arr_data['data_content']['members_login']=validation_errors();


		$this->load->Model('m_news');
		$this->_arr_data['data_content']['newslogin']=$this->m_news->get_news_active_front_end(array(5,6),'newslogin',$this->my_layout->sess_lang_default);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_members_login();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_members_login";

		$this->_arr_data['info_home']['title_web']=element('members_module_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['info_home']['keyword_web']=element('members_module_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['keyword_web'];
		$this->_arr_data['info_home']['description_web']=element('members_module_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['description_web'];

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function logout(){

		$sess_login=array($this->m_authorization_user->sess_authorization_user=>false,$this->m_authorization_group->sess_authorization_group=>false);
		$this->session->unset_userdata($sess_login);

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false'))
			echo "Hồ Minh Trí";
		else{

			if(isset($_SERVER["HTTP_REFERER"]) && url_exists($_SERVER["HTTP_REFERER"],$_COOKIE))
				redirect($_SERVER["HTTP_REFERER"],'refresh');
			else
				redirect(base_url(),'refresh');
		}

	}

	public function register(){

		if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'member_register') && ($this->form_validation->run('member_register'))){

			$arr_data['user_account']=$this->input->post('txt_user_account',true);
			$arr_data['user_pass']=md5($this->input->post('txt_user_pass',true));
			$arr_data['user_name']=$this->input->post('txt_user_name',true);
			$arr_data['user_gender']=$this->input->post('txt_user_gender',true);
			$arr_data['user_birthday']=date('Y-m-d H:i:s',strtotime($this->input->post('txt_user_birthday',true)));
			$arr_data['user_email']=$this->input->post('txt_email',true);
			$arr_data['user_phone']=$this->input->post('txt_user_phone',true);
			$arr_data['user_address']=$this->input->post('txt_user_address',true);
			$arr_data['user_web']=$this->input->post('txt_user_web',true);
			if(isset($_POST['input_check_browser']))
				$arr_data['user_img']=$this->input->post('txt_user_img',true);
			$arr_data['user_fax']=$this->input->post('txt_user_fax',true);
			$arr_data['user_last_login']=date('Y-m-d H:i:s');
			$arr_data['user_create_date']=date('Y-m-d H:i:s');
			$arr_data['user_update_date']=date('Y-m-d H:i:s');

			if($this->m_user->insert_user($arr_data)){

				$this->session->set_userdata($this->m_authorization_user->sess_authorization_user,$arr_data['user_account']);
				$this->session->set_userdata($this->m_authorization_group->sess_authorization_group,array());
				echo "register_success";
				exit();
			}
			else{

				echo "register_failed";
				exit();
			}
		}

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(isset($_POST['ajax_member_register']) && ($_POST['ajax_member_register'] == 'true')){

				$this->_arr_data['info_content']=$this->language->get_data_members_register_update('member_register');
				$this->load->view(DEFAULT_DIR_ROOT."/view_members_register_ajax",$this->_arr_data);
			}
			else{

				echo "Validation";
				exit();
			}
		}
		else{

			$this->_arr_data['data_content']['info_content']=$this->language->get_data_members_register_update('member_register');
			$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_members_register";

			$this->_arr_data['info_home']['title_web']=element('info_user_register',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['keyword_web']=element('info_user_register',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=element('info_user_register',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['description_web'];

			$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);
		}

	}

	public function update(){

		if($this->session->userdata($this->m_authorization_user->sess_authorization_user)){

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'member_update') && ($this->form_validation->run('member_update'))){

				$arr_where['user_account']=$this->session->userdata($this->m_authorization_user->sess_authorization_user);

				if($this->input->post('txt_user_pass','') != '')
					$arr_data['user_pass']=md5($this->input->post('txt_user_pass',true));
				$arr_data['user_name']=$this->input->post('txt_user_name',true);
				$arr_data['user_gender']=$this->input->post('txt_user_gender',true);
				$arr_data['user_birthday']=date('Y-m-d H:i:s',strtotime($this->input->post('txt_user_birthday',true)));
				$arr_data['user_email']=$this->input->post('txt_email',true);
				$arr_data['user_phone']=$this->input->post('txt_user_phone',true);
				$arr_data['user_address']=$this->input->post('txt_user_address',true);
				$arr_data['user_web']=$this->input->post('txt_user_web',true);
				if(isset($_POST['input_check_browser']))
					$arr_data['user_img']=$this->input->post('txt_user_img',true);
				$arr_data['user_fax']=$this->input->post('txt_user_fax',true);
				$arr_data['user_update_date']=date('Y-m-d H:i:s');

				if($this->m_user->update_user($arr_data,$arr_where)){

					echo "update_success";
					exit();
				}
				else{

					echo "update_failed";
					exit();
				}
			}

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				if(isset($_POST['ajax_member_update']) && ($_POST['ajax_member_update'] == 'true')){

					$this->_arr_data['user']=$this->m_user->get_user($this->session->userdata($this->m_authorization_user->sess_authorization_user));

					$this->_arr_data['info_content']=$this->language->get_data_members_register_update('member_update');
					$this->load->view(DEFAULT_DIR_ROOT."/view_members_update_ajax",$this->_arr_data);
				}
				else{

					echo "Validation";
					exit();
				}
			}
			else{

				$this->_arr_data['data_content']['user']=$this->m_user->get_user($this->session->userdata($this->m_authorization_user->sess_authorization_user));

				$this->_arr_data['data_content']['info_content']=$this->language->get_data_members_register_update('member_update');
				$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_members_update";

				$this->_arr_data['info_home']['title_web']=element('info_user_update',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['title_web'];
				$this->_arr_data['info_home']['keyword_web']=element('info_user_update',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['keyword_web'];
				$this->_arr_data['info_home']['description_web']=element('info_user_update',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['description_web'];

				$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);
			}
		}
		else
			show_404('page');

	}

	public function login_ajax(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$this->form_validation->set_error_delimiters('','');

			$this->_arr_data['data_content']['members_login']=true;

			if($this->session->userdata($this->m_authorization_user->sess_authorization_user) && ($this->session->userdata($this->m_authorization_group->sess_authorization_group) || is_array($this->session->userdata($this->m_authorization_group->sess_authorization_group)))){

				$account=$this->session->userdata($this->m_authorization_user->sess_authorization_user);

				$this->_arr_data['data_content']['user']=$this->m_user->get_user($account);

				$arr_group=$this->m_user_group->list_group_one_user($account);
				if(is_array($arr_group) && !empty($arr_group) && !empty($this->_arr_data['data_content']['user'])){

					$arr_authorization=array();
					foreach($arr_group as $key_group=> $value_group){
						$arr_authorization_temp=$this->m_authorization_group->check_authorization_group(element('user_group_id',$value_group,''));
						if(is_array($arr_authorization_temp) && !empty($arr_authorization_temp))
							$arr_authorization=array_merge($arr_authorization,$arr_authorization_temp);
					}
					if(is_array($arr_authorization) && !empty($arr_authorization))
						$arr_authorization=$this->m_authorization_group->array_uniques($arr_authorization);

					$this->session->set_userdata($this->m_authorization_user->sess_authorization_user,$account);
					$this->session->set_userdata($this->m_authorization_group->sess_authorization_group,$arr_authorization);

					$arr_update_data['user_last_login']=date('Y-m-d H:i:s');
					$arr_update_where['user_account']=$account;
					$this->m_user->update_user($arr_update_data,$arr_update_where);

					$this->_arr_data['data_content']['members_login']=false;
				}
				else{

					$sess_login=array($this->m_authorization_user->sess_authorization_user=>'',$this->m_authorization_group->sess_authorization_group=>'');
					$this->session->unset_userdata($sess_login);
				}
			}
			else if(isset($_POST['submit_form']) && $this->form_validation->run('member_login')){

				$account=$this->input->post('txt_account_login',true);
				$pass=md5($this->input->post('txt_password_login',true));

				if($this->m_authorization_user->check_user_login($account,$pass)){

					$this->_arr_data['data_content']['user']=$this->m_user->get_user($account);

					$arr_group=$this->m_user_group->list_group_one_user($account);
					if(is_array($arr_group) && !empty($arr_group)){

						$arr_authorization=array();
						foreach($arr_group as $key_group=> $value_group){
							$arr_authorization_temp=$this->m_authorization_group->check_authorization_group(element('user_group_id',$value_group,false));
							if(is_array($arr_authorization_temp) && !empty($arr_authorization_temp))
								$arr_authorization=array_merge($arr_authorization,$arr_authorization_temp);
						}
						if(is_array($arr_authorization) && !empty($arr_authorization))
							$arr_authorization=$this->m_authorization_group->array_uniques($arr_authorization);

						$this->session->set_userdata($this->m_authorization_user->sess_authorization_user,$account);
						$this->session->set_userdata($this->m_authorization_group->sess_authorization_group,$arr_authorization);

						$arr_update_data['user_last_login']=date('Y-m-d H:i:s');
						$arr_update_where['user_account']=$account;
						$this->m_user->update_user($arr_update_data,$arr_update_where);

						$this->_arr_data['data_content']['members_login']=false;
					}
					else
						$this->_arr_data['data_content']['members_login']=lang('messages_login_authorization');
				}
				else
					$this->_arr_data['data_content']['members_login']=lang('messages_login_user');
			}
			else
				$this->_arr_data['data_content']['members_login']=validation_errors();


			if(isset($_POST['ajax_member_login']) && ($_POST['ajax_member_login'] == 'true')){

				$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_members_login();
				$this->load->view(DEFAULT_DIR_ROOT."/view_members_login_ajax",$this->_arr_data['data_content']);
			}
			else{

				if($this->_arr_data['data_content']['members_login'] === false){

					echo "login_success";
				}
				else if($this->_arr_data['data_content']['members_login'] === true){

					echo "login_action";
				}
				else
					echo $this->_arr_data['data_content']['members_login'];
			}
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
			if($this->m_authorization_user->check_user_account($validateValue)){

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
			if(!$this->m_authorization_user->check_user_account($validateValue)){

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

		if(!(($this->uri->segment(2) == 'members') && ($this->uri->segment(3) == 'check_user_account1'))){

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

		if(!(($this->uri->segment(2) == 'members') && ($this->uri->segment(3) == 'check_user_account1'))){

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

	public function check_captcha($string_captcha=true){

		if(!(($this->uri->segment(1) == 'members') && ($this->uri->segment(2) == 'check_captcha'))){

			if(trim($string_captcha) != trim($this->session->userdata('captcha_key_members'))){

				$this->form_validation->set_message('check_captcha','%s');
				return false;
			}
			else
				return true;
		}
		else
			show_404('page');

	}

}

?>
