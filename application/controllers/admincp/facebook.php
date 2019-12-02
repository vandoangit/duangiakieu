<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Facebook extends CI_Controller{

	public $_arr_template_admin=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array'));
		$this->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination'));
		$this->load->Model(array('m_facebook'));

		$this->form_validation->set_error_delimiters('','');

		if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			$this->_arr_template_admin=$this->my_layout->set_layout();

	}

	public function control(){

		if((isset($_POST['checkbox'])) && ($this->m_authorization_group->check_authorization_one_menu('facebook','delete')))
			$message_session_flash=$this->delete_all($this->input->post('checkbox',true));

		if($this->m_authorization_group->check_authorization_one_menu('facebook','control')){

			$arr_auhorization=array('add','delete','update','control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('facebook',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('facebook',$value,$this->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->uri->segment(4,'all');
			$this->_arr_template_admin['data_content']['facebook']=$this->m_facebook->list_facebook();

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_facebook_control(true);
				$this->load->view(ADMIN_DIR_ROOT."/view_facebook_manager",$this->_arr_template_admin['data_content']);
			}
			else{

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_facebook_control(false);
				$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_facebook_manager";

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

			if($this->m_authorization_group->check_authorization_one_menu('facebook','update')){

				$arr_where['facebook_id']=$this->uri->segment(4,true);
				$arr_data['facebook_order']=$this->uri->segment(5,true);
				if(!$this->m_facebook->update_facebook($arr_data,$arr_where))
					echo "is_numeric";
				else
					echo $this->uri->segment(5,true);
			}
		}
		else
			show_404('page');

	}

	public function update_facebook_post(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$facebook=$this->m_facebook->get_facebook($this->uri->segment(4,true));
			if($this->m_authorization_group->check_authorization_one_menu('facebook','update') && is_array($facebook)){

				if(element('facebook_post_bool',$facebook,'') == 1)
					$arr_data['facebook_post_bool']=0;
				else
					$arr_data['facebook_post_bool']=1;

				$arr_where['facebook_id']=$this->uri->segment(4,true);
				if(!$this->m_facebook->update_facebook($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['facebook_post_bool'];
			}
		}
		else
			show_404('page');

	}

	public function update_facebook_friend(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$facebook=$this->m_facebook->get_facebook($this->uri->segment(4,true));
			if($this->m_authorization_group->check_authorization_one_menu('facebook','update') && is_array($facebook)){

				if(element('facebook_friend_bool',$facebook,'') == 1)
					$arr_data['facebook_friend_bool']=0;
				else
					$arr_data['facebook_friend_bool']=1;

				$arr_where['facebook_id']=$this->uri->segment(4,true);
				if(!$this->m_facebook->update_facebook($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['facebook_friend_bool'];
			}
		}
		else
			show_404('page');

	}

	public function update_facebook_photo(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$facebook=$this->m_facebook->get_facebook($this->uri->segment(4,true));
			if($this->m_authorization_group->check_authorization_one_menu('facebook','update') && is_array($facebook)){

				if(element('facebook_photo_bool',$facebook,'') == 1)
					$arr_data['facebook_photo_bool']=0;
				else
					$arr_data['facebook_photo_bool']=1;

				$arr_where['facebook_id']=$this->uri->segment(4,true);
				if(!$this->m_facebook->update_facebook($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['facebook_photo_bool'];
			}
		}
		else
			show_404('page');

	}

	public function update_facebook_comment(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$facebook=$this->m_facebook->get_facebook($this->uri->segment(4,true));
			if($this->m_authorization_group->check_authorization_one_menu('facebook','update') && is_array($facebook)){

				if(element('facebook_comment_bool',$facebook,'') == 1)
					$arr_data['facebook_comment_bool']=0;
				else
					$arr_data['facebook_comment_bool']=1;

				$arr_where['facebook_id']=$this->uri->segment(4,true);
				if(!$this->m_facebook->update_facebook($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['facebook_comment_bool'];
			}
		}
		else
			show_404('page');

	}

	public function update_facebook_like(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$facebook=$this->m_facebook->get_facebook($this->uri->segment(4,true));
			if($this->m_authorization_group->check_authorization_one_menu('facebook','update') && is_array($facebook)){

				if(element('facebook_like_bool',$facebook,'') == 1)
					$arr_data['facebook_like_bool']=0;
				else
					$arr_data['facebook_like_bool']=1;

				$arr_where['facebook_id']=$this->uri->segment(4,true);
				if(!$this->m_facebook->update_facebook($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['facebook_like_bool'];
			}
		}
		else
			show_404('page');

	}

	public function update_facebook_like_fanface(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$facebook=$this->m_facebook->get_facebook($this->uri->segment(4,true));
			if($this->m_authorization_group->check_authorization_one_menu('facebook','update') && is_array($facebook)){

				if(element('facebook_like_fanface_bool',$facebook,'') == 1)
					$arr_data['facebook_like_fanface_bool']=0;
				else
					$arr_data['facebook_like_fanface_bool']=1;

				$arr_where['facebook_id']=$this->uri->segment(4,true);
				if(!$this->m_facebook->update_facebook($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['facebook_like_fanface_bool'];
			}
		}
		else
			show_404('page');

	}

	public function update_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$facebook=$this->m_facebook->get_facebook($this->uri->segment(4,true));
			if($this->m_authorization_group->check_authorization_one_menu('facebook','update') && is_array($facebook)){

				if(element('facebook_public',$facebook,'') == 1)
					$arr_data['facebook_public']=0;
				else
					$arr_data['facebook_public']=1;

				$arr_where['facebook_id']=$this->uri->segment(4,true);
				if(!$this->m_facebook->update_facebook($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['facebook_public'];
			}
		}
		else
			show_404('page');

	}

	public function add(){

		if($this->m_authorization_group->check_authorization_one_menu('facebook','add')){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('facebook',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('facebook',$value,$this->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_facebook') && ($this->form_validation->run('add_update_facebook'))){

				$arr_data['facebook_name']=$this->input->post('txt_facebook_name',true);
				$arr_data['facebook_user']=$this->input->post('txt_facebook_user',true);
				$arr_data['facebook_theme']=$this->input->post('txt_facebook_theme',true);
				$arr_data['facebook_public']=$this->input->post('txt_facebook_public',true);
				$arr_data['facebook_order']=$this->input->post('txt_facebook_order',true);

				$arr_data['facebook_post_bool']=$this->input->post('txt_facebook_post_bool',true);
				$arr_data['facebook_post_message']=$this->input->post('txt_facebook_post_message',true);
				$arr_data['facebook_post_url']=$this->input->post('txt_facebook_post_url',true);
				$arr_data['facebook_post_title']=$this->input->post('txt_facebook_post_title',true);
				$arr_data['facebook_post_summary']=$this->input->post('txt_facebook_post_summary',true);
				if(isset($_POST['input_check_browser_post']))
					$arr_data['facebook_post_image']=$this->input->post('txt_facebook_post_image',true);

				$arr_data['facebook_friend_bool']=$this->input->post('txt_facebook_friend_bool',true);
				$arr_data['facebook_friend_id']=$this->input->post('txt_facebook_friend_id',true);
				$arr_data['facebook_friend_message']=$this->input->post('txt_facebook_friend_message',true);
				$arr_data['facebook_friend_url']=$this->input->post('txt_facebook_friend_url',true);
				$arr_data['facebook_friend_title']=$this->input->post('txt_facebook_friend_title',true);
				$arr_data['facebook_friend_summary']=$this->input->post('txt_facebook_friend_summary',true);
				if(isset($_POST['input_check_browser_friend']))
					$arr_data['facebook_friend_image']=$this->input->post('txt_facebook_friend_image',true);

				$arr_data['facebook_photo_bool']=$this->input->post('txt_facebook_photo_bool',true);
				$arr_data['facebook_photo_message']=$this->input->post('txt_facebook_photo_message',true);
				if(isset($_POST['input_check_browser_photo']))
					$arr_data['facebook_photo_image']=$this->input->post('txt_facebook_photo_image',true);

				$arr_data['facebook_comment_bool']=$this->input->post('txt_facebook_comment_bool',true);
				$arr_data['facebook_comment_id']=$this->input->post('txt_facebook_comment_id',true);
				$arr_data['facebook_comment_message']=$this->input->post('txt_facebook_comment_message',true);

				$arr_data['facebook_like_bool']=$this->input->post('txt_facebook_like_bool',true);
				$arr_data['facebook_like_id']=$this->input->post('txt_facebook_like_id',true);

				$arr_data['facebook_like_fanface_bool']=$this->input->post('txt_facebook_like_fanface_bool',true);
				$arr_data['facebook_like_fanface_id']=$this->input->post('txt_facebook_like_fanface_id',true);

				$arr_data['facebook_create_date']=date('Y-m-d H:i:s');
				$arr_data['facebook_update_date']=date('Y-m-d H:i:s');

				if($this->m_facebook->insert_facebook($arr_data)){

					if($this->_arr_template_admin['data_content']['authorization']['control']){

						$this->session->set_flashdata('add_update_facebook',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->session->set_flashdata('add_update_facebook',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}


			$this->_arr_template_admin['data_content']['facebook_theme']=array(
				array("facebook_theme_id"=>"themedefault","facebook_theme_name"=>"Facebook Theme Default"),
				array("facebook_theme_id"=>"themelike","facebook_theme_name"=>"Facebook Theme Like"),
				array("facebook_theme_id"=>"themewebcam","facebook_theme_name"=>"Facebook Theme Webcam"),
				array("facebook_theme_id"=>"themephoto","facebook_theme_name"=>"Facebook Theme Photo"),
				array("facebook_theme_id"=>"themehack","facebook_theme_name"=>"Facebook Theme Hack")
			);

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_facebook_add_update('add_facebook');
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_facebook";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('facebook','add',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			show_404('page');

	}

	public function delete(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->m_authorization_group->check_authorization_one_menu('facebook','delete')){

				$arr_where_delete['facebook_id']=$this->uri->segment(5,true);
				if(!$this->m_facebook->delete_facebook($arr_where_delete))
					echo "delete_faild";
				else
					$this->control();
			}
		}
		else
			show_404('page');

	}

	public function delete_all($arr_where){

		if(!(($this->uri->segment(2) == 'facebook') && ($this->uri->segment(3) == 'delete_all'))){

			if($this->m_authorization_group->check_authorization_one_menu('facebook','delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){

					$arr_where_delete['facebook_id']=$key;
					if(!$this->m_facebook->delete_facebook($arr_where_delete))
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

		$this->_arr_template_admin['data_content']['facebook']=$this->m_facebook->get_facebook($this->uri->segment(4,true));

		if($this->m_authorization_group->check_authorization_one_menu('facebook','update') && is_array($this->_arr_template_admin['data_content']['facebook']) && !empty($this->_arr_template_admin['data_content']['facebook'])){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('facebook',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('facebook',$value,$this->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_facebook') && ($this->form_validation->run('add_update_facebook'))){

				$arr_where['facebook_id']=$this->uri->segment(4,true);

				$arr_data['facebook_name']=$this->input->post('txt_facebook_name',true);
				$arr_data['facebook_user']=$this->input->post('txt_facebook_user',true);
				$arr_data['facebook_theme']=$this->input->post('txt_facebook_theme',true);
				$arr_data['facebook_public']=$this->input->post('txt_facebook_public',true);
				$arr_data['facebook_order']=$this->input->post('txt_facebook_order',true);

				$arr_data['facebook_post_bool']=$this->input->post('txt_facebook_post_bool',true);
				$arr_data['facebook_post_message']=$this->input->post('txt_facebook_post_message',true);
				$arr_data['facebook_post_url']=$this->input->post('txt_facebook_post_url',true);
				$arr_data['facebook_post_title']=$this->input->post('txt_facebook_post_title',true);
				$arr_data['facebook_post_summary']=$this->input->post('txt_facebook_post_summary',true);
				if(isset($_POST['input_check_browser_post']))
					$arr_data['facebook_post_image']=$this->input->post('txt_facebook_post_image',true);

				$arr_data['facebook_friend_bool']=$this->input->post('txt_facebook_friend_bool',true);
				$arr_data['facebook_friend_id']=$this->input->post('txt_facebook_friend_id',true);
				$arr_data['facebook_friend_message']=$this->input->post('txt_facebook_friend_message',true);
				$arr_data['facebook_friend_url']=$this->input->post('txt_facebook_friend_url',true);
				$arr_data['facebook_friend_title']=$this->input->post('txt_facebook_friend_title',true);
				$arr_data['facebook_friend_summary']=$this->input->post('txt_facebook_friend_summary',true);
				if(isset($_POST['input_check_browser_friend']))
					$arr_data['facebook_friend_image']=$this->input->post('txt_facebook_friend_image',true);

				$arr_data['facebook_photo_bool']=$this->input->post('txt_facebook_photo_bool',true);
				$arr_data['facebook_photo_message']=$this->input->post('txt_facebook_photo_message',true);
				if(isset($_POST['input_check_browser_photo']))
					$arr_data['facebook_photo_image']=$this->input->post('txt_facebook_photo_image',true);

				$arr_data['facebook_comment_bool']=$this->input->post('txt_facebook_comment_bool',true);
				$arr_data['facebook_comment_id']=$this->input->post('txt_facebook_comment_id',true);
				$arr_data['facebook_comment_message']=$this->input->post('txt_facebook_comment_message',true);

				$arr_data['facebook_like_bool']=$this->input->post('txt_facebook_like_bool',true);
				$arr_data['facebook_like_id']=$this->input->post('txt_facebook_like_id',true);

				$arr_data['facebook_like_fanface_bool']=$this->input->post('txt_facebook_like_fanface_bool',true);
				$arr_data['facebook_like_fanface_id']=$this->input->post('txt_facebook_like_fanface_id',true);

				$arr_data['facebook_update_date']=date('Y-m-d H:i:s');

				if($this->m_facebook->update_facebook($arr_data,$arr_where)){

					if($this->_arr_template_admin['data_content']['authorization']['control']){

						$this->session->set_flashdata('add_update_facebook',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->session->set_flashdata('add_update_facebook',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}


			$this->_arr_template_admin['data_content']['facebook_theme']=array(
				array("facebook_theme_id"=>"themedefault","facebook_theme_name"=>"Facebook Theme Default"),
				array("facebook_theme_id"=>"themelike","facebook_theme_name"=>"Facebook Theme Like"),
				array("facebook_theme_id"=>"themewebcam","facebook_theme_name"=>"Facebook Theme Webcam"),
				array("facebook_theme_id"=>"themephoto","facebook_theme_name"=>"Facebook Theme Photo"),
				array("facebook_theme_id"=>"themehack","facebook_theme_name"=>"Facebook Theme Hack")
			);

			$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_facebook_add_update('update_facebook');
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_facebook";

			$arr_sub_menu=$this->m_sub_menu_admin->get_sub_menu('facebook','update',$this->my_layout->sess_lang_admin);
			$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}
		else
			show_404('page');

	}

}

?>