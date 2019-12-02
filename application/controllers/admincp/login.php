<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array'));
		$this->load->library(array(ADMIN_DIR_ROOT.'/language','form_validation'));
		$this->load->Model(array('m_user','m_user_group','m_authorization_user','m_authorization_group'));

	}

	public function index(){

		if($this->session->userdata($this->m_authorization_user->sess_authorization_user) && $this->session->userdata($this->m_authorization_group->sess_authorization_group)){

			$flag=false;
			$account=$this->session->userdata($this->m_authorization_user->sess_authorization_user);
			$arr_group=$this->m_user_group->list_group_one_user($account);

			if(is_array($arr_group) && !empty($arr_group)){

				$arr_authorization=array();
				foreach($arr_group as $key_group=> $value_group){

					if(element('user_group_id',$value_group,'') != -1){

						$arr_authorization_temp=$this->m_authorization_group->check_authorization_group(element('user_group_id',$value_group,''));
						if(is_array($arr_authorization_temp) && !empty($arr_authorization_temp)){

							$flag=true;
							$arr_authorization=array_merge($arr_authorization,$arr_authorization_temp);
						}
					}
				}

				if(is_array($arr_authorization) && $flag){

					$arr_authorization=$this->m_authorization_group->array_uniques($arr_authorization);
					$this->session->set_userdata($this->m_authorization_user->sess_authorization_user,$account);
					$this->session->set_userdata($this->m_authorization_group->sess_authorization_group,$arr_authorization);

					$arr_update_data['user_last_login']=date('Y-m-d H:i:s');
					$arr_update_where['user_account']=$account;
					$this->m_user->update_user($arr_update_data,$arr_update_where);

					redirect(base_url().URL_HOME_ADMIN);
					$data_error["error"]=false;
				}
				else{

					$sess_login=array($this->m_authorization_user->sess_authorization_user=>'',$this->m_authorization_group->sess_authorization_group=>'');
					$this->session->unset_userdata($sess_login);
					$data_error["error"]=false;
				}
			}
			else{

				$sess_login=array($this->m_authorization_user->sess_authorization_user=>'',$this->m_authorization_group->sess_authorization_group=>'');
				$this->session->unset_userdata($sess_login);
				$data_error["error"]=false;
			}
		}
		else if(isset($_POST['login_input']) && $this->form_validation->run()){

			$lang_id=$this->input->post('login_language',true);
			$account=$this->input->post('login_account',true);
			$pass=md5($this->input->post('login_password',true));

			if($this->m_authorization_user->check_user_login($account,$pass)){

				$flag=false;
				$arr_group=$this->m_user_group->list_group_one_user($account);

				if(is_array($arr_group) && !empty($arr_group)){

					$arr_authorization=array();
					foreach($arr_group as $key_group=> $value_group){
						if(element('user_group_id',$value_group,false) != 1){

							$arr_authorization_temp=$this->m_authorization_group->check_authorization_group(element('user_group_id',$value_group,false));
							if(is_array($arr_authorization_temp) && !empty($arr_authorization_temp)){

								$flag=true;
								$arr_authorization=array_merge($arr_authorization,$arr_authorization_temp);
							}
						}
					}

					if(is_array($arr_authorization) && $flag){

						$arr_authorization=$this->m_authorization_group->array_uniques($arr_authorization);
						$this->session->set_userdata($this->m_authorization_user->sess_authorization_user,$account);
						$this->session->set_userdata($this->m_authorization_group->sess_authorization_group,$arr_authorization);
						$this->session->set_userdata($this->language->sess_lang,$lang_id);

						$arr_update_data['user_last_login']=date('Y-m-d H:i:s');
						$arr_update_where['user_account']=$account;
						$this->m_user->update_user($arr_update_data,$arr_update_where);

						redirect(base_url().URL_HOME_ADMIN);
						$data_error["error"]=false;
					}
					else
						$data_error["error"]="login_messages_authorization";
				}
				else
					$data_error["error"]="login_messages_authorization";
			}
			else
				$data_error["error"]="login_messages_user";
		}
		else
			$data_error["error"]=false;

		$data=$this->language->get_data_page_login($data_error);
		$this->form_validation->set_error_delimiters('','');
		$this->load->view(ADMIN_DIR_ROOT."/view_login",$data);

	}

	public function exit_user(){

		$sess_login=array($this->m_authorization_user->sess_authorization_user=>false,$this->m_authorization_group->sess_authorization_group=>false);
		$this->session->unset_userdata($sess_login);
		redirect(base_url().URL_LOGIN_ADMIN);

	}

}

?>