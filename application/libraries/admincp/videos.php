<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Videos{

	private $_object_video;
	private $_menu_class;
	private $_bool_active;
	private $_arr_data=array();

	public function __construct(){

		$this->_object_video=& get_instance();

		$this->_object_video->load->helper(array('url','form','array'));
		$this->_object_video->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination'));
		$this->_object_video->load->Model(array('m_video','m_category_sub'));

		$this->_object_video->form_validation->set_error_delimiters('','');

		if((!isset($_POST[md5('hominhtri')])) && (!isset($_POST['validateValue'])))
			$this->_arr_data=$this->_object_video->my_layout->set_layout();

	}

	public function set_config_video($menu_class,$bool_active=array('alias'=>true,'category'=>true,'description'=>true,'active'=>true)){

		$this->_menu_class=$menu_class;
		$this->_bool_active=$bool_active;
		return $this->_arr_data;

	}

	public function control(){

		if(isset($_POST['checkbox']) && $this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete'))
			$message_session_flash=$this->delete_all($this->_object_video->input->post('checkbox',true));

		if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'control')){

			$arr_auhorization=array('add','delete','update','control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_video->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_video->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->_object_video->uri->segment(4,'all');
			if($get_select_filter != 'all'){

				$arr_category_id=$this->_object_video->m_category_sub->get_category_sub_id($get_select_filter,$this->_object_video->my_layout->sess_lang_admin);
				$this->_arr_data['data_content']['videos']=$this->_object_video->m_videos->list_video_one_category($arr_category_id,$this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
			}
			else{

				$this->_arr_data['data_content']['videos']=$this->_object_video->m_videos->list_video($this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
			}

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_data['data_content']['info_content']=$this->_object_video->language->get_data_video_control(true,$this->_menu_class,$this->_bool_active);
				$this->_object_video->load->view(ADMIN_DIR_ROOT."/view_video_manager",$this->_arr_data['data_content']);
			}
			else{

				$this->_arr_data['data_content']['category_video']='';
				$arr_category_video=$this->_object_video->m_category_sub->list_category_sub_one_menu_admin($this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
				if(is_array($arr_category_video))
					$this->_arr_data['data_content']['category_video']=$this->_object_video->m_category_sub->recursive_category_sub_add($arr_category_video,0,'select_category_video',$get_select_filter);

				$this->_arr_data['data_content']['info_content']=$this->_object_video->language->get_data_video_control(false,$this->_menu_class,$this->_bool_active);
				$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_video_manager";

				$this->_arr_data['data_content']['title_function']=$this->_object_video->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false));
				$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false)." ::.";
				$this->_object_video->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function control_public(){

		if(isset($_POST['checkbox']) && $this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete'))
			$message_session_flash=$this->delete_all_public($this->_object_video->input->post('checkbox',true));

		if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'control')){

			$arr_auhorization=array('add','delete','update','control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_video->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_video->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->_object_video->uri->segment(4,'all');
			if($get_select_filter != 'all'){

				$arr_category_id=$this->_object_video->m_category_sub->get_category_sub_id_public($get_select_filter,$this->_object_video->my_layout->sess_lang_admin);
				$this->_arr_data['data_content']['videos']=$this->_object_video->m_video->list_video_one_category_public($arr_category_id,$this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
			}
			else{

				$this->_arr_data['data_content']['videos']=$this->_object_video->m_video->list_video_public($this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
			}

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_data['data_content']['info_content']=$this->_object_video->language->get_data_video_control(true,$this->_menu_class,$this->_bool_active);
				$this->_object_video->load->view(ADMIN_DIR_ROOT."/view_video_manager",$this->_arr_data['data_content']);
			}
			else{

				$this->_arr_data['data_content']['category_video']='';
				$arr_category_video=$this->_object_video->m_category_sub->list_category_sub_one_menu_admin_public($this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
				if(is_array($arr_category_video))
					$this->_arr_data['data_content']['category_video']=$this->_object_video->m_category_sub->recursive_category_sub_add($arr_category_video,0,'select_category_video',$get_select_filter);

				$this->_arr_data['data_content']['info_content']=$this->_object_video->language->get_data_video_control(false,$this->_menu_class,$this->_bool_active);
				$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_video_manager";

				$this->_arr_data['data_content']['title_function']=$this->_object_video->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false));
				$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false)." ::.";
				$this->_object_video->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function update_order(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(!preg_match("/^([\-+])?[0-9]+$/i",$this->_object_video->uri->segment(5,true))){

				echo "is_numeric";
				exit();
			}

			if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update')){

				$arr_where['video_id']=$this->_object_video->uri->segment(4,true);
				$arr_data['video_order']=$this->_object_video->uri->segment(5,true);
				if(!$this->_object_video->m_video->update_video($arr_data,$arr_where))
					echo "is_numeric";
				else
					echo $this->_object_video->uri->segment(5,true);
			}
		}
		else
			show_404('page');

	}

	public function update_order_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(!preg_match("/^([\-+])?[0-9]+$/i",$this->_object_video->uri->segment(5,true))){

				echo "is_numeric";
				exit();
			}

			if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update')){

				$arr_where['video_id']=$this->_object_video->uri->segment(4,true);
				$arr_data['video_order']=$this->_object_video->uri->segment(5,true);
				if(!$this->_object_video->m_video->update_video($arr_data,$arr_where))
					echo "is_numeric";
				else
					echo $this->_object_video->uri->segment(5,true);
			}
		}
		else
			show_404('page');

	}

	public function update_public_video(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$video=$this->_object_video->m_video->get_video($this->_object_video->uri->segment(4,true),$this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
			if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($video)){

				if(element('video_public',$video,'') == 1)
					$arr_data['video_public']=0;
				else
					$arr_data['video_public']=1;

				$arr_where['video_id']=$this->_object_video->uri->segment(4,true);
				if(!$this->_object_video->m_video->update_video($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['video_public'];
			}
		}
		else
			show_404('page');

	}

	public function update_public_video_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$video=$this->_object_video->m_video->get_video_public($this->_object_video->uri->segment(4,true),$this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
			if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($video)){

				if(element('video_public',$video,'') == 1)
					$arr_data['video_public']=0;
				else
					$arr_data['video_public']=1;

				$arr_where['video_id']=$this->_object_video->uri->segment(4,true);
				if(!$this->_object_video->m_video->update_video($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['video_public'];
			}
		}
		else
			show_404('page');

	}

	public function update_active(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$video=$this->_object_video->m_video->get_video($this->_object_video->uri->segment(4,true),$this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
			if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($video)){

				if(element('video_active',$video,'') == 1)
					$arr_data['video_active']=0;
				else
					$arr_data['video_active']=1;

				$arr_where['video_id']=$this->_object_video->uri->segment(4,true);
				if(!$this->_object_video->m_video->update_video($arr_data,$arr_where))
					echo "update_faild";
				else{

					echo $arr_data['video_active'];
					if($arr_data['video_active'] == 1){

						$arr_data_active['video_active']=0;
						$arr_where_active['video_id !=']=$this->_object_video->uri->segment(4,true);
						$arr_where_active['cate_id']=element('cate_id',$video,'');
						$this->_object_video->m_video->update_video($arr_data_active,$arr_where_active);
					}
				}
			}
		}
		else
			show_404('page');

	}

	public function update_active_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$video=$this->_object_video->m_video->get_video_public($this->_object_video->uri->segment(4,true),$this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
			if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($video)){

				if(element('video_active',$video,'') == 1)
					$arr_data['video_active']=0;
				else
					$arr_data['video_active']=1;

				$arr_where['video_id']=$this->_object_video->uri->segment(4,true);
				if(!$this->_object_video->m_video->update_video($arr_data,$arr_where))
					echo "update_faild";
				else{

					echo $arr_data['video_active'];
					if($arr_data['video_active'] == 1){

						$arr_data_active['video_active']=0;
						$arr_where_active['video_id !=']=$this->_object_video->uri->segment(4,true);
						$arr_where_active['cate_id']=element('cate_id',$video,'');
						$this->_object_video->m_video->update_video($arr_data_active,$arr_where_active);
					}
				}
			}
		}
		else
			show_404('page');

	}

	public function add(){

		if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'add')){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_video->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_video->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_video') && ($this->_object_video->form_validation->run('add_update_video'))){


				$arr_data['video_file']=$this->_object_video->input->post('txt_video_file',true);
				if(check_type_file($arr_data['video_file']) == 0 || check_type_file($arr_data['video_file']) == 3){

					$arr_data['video_name']=$this->_object_video->input->post('txt_video_name',true);
					$arr_data['video_alias']=convert_vi_to_en($this->_object_video->input->post('txt_video_alias',true));
					if(isset($_POST['input_check_browser']))
						$arr_data['video_img']=$this->_object_video->input->post('txt_video_img',true);
					$arr_data['video_description']=$this->_object_video->input->post('txt_video_description',true);
					$arr_data['video_active']=$this->_object_video->input->post('txt_video_active',true);
					$arr_data['video_public']=$this->_object_video->input->post('txt_video_public',true);
					$arr_data['video_order']=$this->_object_video->input->post('txt_video_order',true);
					$arr_data['cate_id']=$this->_object_video->input->post('txt_cate_video',true);
					$arr_data['video_create_date']=date('Y-m-d H:i:s');
					$arr_data['video_update_date']=date('Y-m-d H:i:s');

					if($arr_data['video_active'] == 1){

						$arr_data_active['video_active']=0;
						$arr_where_active['cate_id']=$arr_data['cate_id'];
						$this->_object_video->m_video->update_video($arr_data_active,$arr_where_active);
					}

					if($this->_object_video->m_video->insert_video($arr_data)){

						if($this->_arr_data['data_content']['authorization']['control']){

							$this->_object_video->session->set_flashdata('add_update_video',alert(lang('message_add_success')));
							redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
						}
						else{

							$this->_object_video->session->set_flashdata('add_update_video',alert(lang('message_add_success')));
							redirect(current_url());
						}
					}
					else
						$message_session_flash=alert(lang('message_add_faild'));
				}
				else
					$message_session_flash=alert(lang('message_undefined_type_file'));
			}

			$this->_arr_data['data_content']['category_video']='';
			$arr_category_video=$this->_object_video->m_category_sub->list_category_sub_one_menu_admin($this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
			if(is_array($arr_category_video))
				$this->_arr_data['data_content']['category_video']=$this->_object_video->m_category_sub->recursive_category_sub_add($arr_category_video,0,'txt_cate_video',false);

			$this->_arr_data['data_content']['info_content']=$this->_object_video->language->get_data_video_add_update('add_video',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_video";

			$arr_sub_menu=$this->_object_video->m_sub_menu_admin->get_sub_menu($this->_menu_class,'add',$this->_object_video->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_video->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_video->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function add_public(){

		if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'add')){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_video->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_video->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_video') && ($this->_object_video->form_validation->run('add_update_video'))){

				$arr_data['video_file']=$this->_object_video->input->post('txt_video_file',true);
				if(check_type_file($arr_data['video_file']) == 0 || check_type_file($arr_data['video_file']) == 3){

					$arr_data['video_name']=$this->_object_video->input->post('txt_video_name',true);
					$arr_data['video_alias']=convert_vi_to_en($this->_object_video->input->post('txt_video_alias',true));
					if(isset($_POST['input_check_browser']))
						$arr_data['video_img']=$this->_object_video->input->post('txt_video_img',true);
					$arr_data['video_description']=$this->_object_video->input->post('txt_video_description',true);
					$arr_data['video_active']=$this->_object_video->input->post('txt_video_active',true);
					$arr_data['video_public']=$this->_object_video->input->post('txt_video_public',true);
					$arr_data['video_order']=$this->_object_video->input->post('txt_video_order',true);
					$arr_data['cate_id']=$this->_object_video->input->post('txt_cate_video',true);
					$arr_data['video_create_date']=date('Y-m-d H:i:s');
					$arr_data['video_update_date']=date('Y-m-d H:i:s');

					if($arr_data['video_active'] == 1){

						$arr_data_active['video_active']=0;
						$arr_where_active['cate_id']=$arr_data['cate_id'];
						$this->_object_video->m_video->update_video($arr_data_active,$arr_where_active);
					}

					if($this->_object_video->m_video->insert_video($arr_data)){

						if($this->_arr_data['data_content']['authorization']['control']){

							$this->_object_video->session->set_flashdata('add_update_video',alert(lang('message_add_success')));
							redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
						}
						else{

							$this->_object_video->session->set_flashdata('add_update_video',alert(lang('message_add_success')));
							redirect(current_url());
						}
					}
					else
						$message_session_flash=alert(lang('message_add_faild'));
				}
				else
					$message_session_flash=alert(lang('message_undefined_type_file'));
			}

			$this->_arr_data['data_content']['category_video']='';
			$arr_category_video=$this->_object_video->m_category_sub->list_category_sub_one_menu_admin_public($this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
			if(is_array($arr_category_video))
				$this->_arr_data['data_content']['category_video']=$this->_object_video->m_category_sub->recursive_category_sub_add($arr_category_video,0,'txt_cate_video',false);

			$this->_arr_data['data_content']['info_content']=$this->_object_video->language->get_data_video_add_update('add_video',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_video";

			$arr_sub_menu=$this->_object_video->m_sub_menu_admin->get_sub_menu($this->_menu_class,'add',$this->_object_video->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_video->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_video->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function delete(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete')){

				$arr_where_delete['video_id']=$this->_object_video->uri->segment(5,true);
				if(!$this->_object_video->m_video->delete_video($arr_where_delete))
					echo "delete_faild";
				else
					$this->control();
			}
		}
		else
			show_404('page');

	}

	public function delete_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete')){

				$arr_where_delete['video_id']=$this->_object_video->uri->segment(5,true);
				if(!$this->_object_video->m_video->delete_video($arr_where_delete))
					echo "delete_faild";
				else
					$this->control_public();
			}
		}
		else
			show_404('page');

	}

	public function delete_all($arr_where){

		if(!(($this->_object_video->uri->segment(2) == $this->_menu_class) && ($this->_object_video->uri->segment(3) == 'delete_all'))){

			if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){
					$arr_where_delete['video_id']=$key;
					if(!$this->_object_video->m_video->delete_video($arr_where_delete))
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

	public function delete_all_public($arr_where){

		if(!(($this->_object_video->uri->segment(2) == $this->_menu_class) && ($this->_object_video->uri->segment(3) == 'delete_all'))){

			if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){
					$arr_where_delete['video_id']=$key;
					if(!$this->_object_video->m_video->delete_video($arr_where_delete))
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

		$this->_arr_data['data_content']['video']=$this->_object_video->m_video->get_video($this->_object_video->uri->segment(4,true),$this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);

		if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($this->_arr_data['data_content']['video']) && !empty($this->_arr_data['data_content']['video'])){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_video->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_video->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_video') && ($this->_object_video->form_validation->run('add_update_video'))){

				$arr_where['video_id']=$this->_object_video->uri->segment(4,true);
				$arr_data['video_file']=$this->_object_video->input->post('txt_video_file',true);
				if(check_type_file($arr_data['video_file']) == 0 || check_type_file($arr_data['video_file']) == 3){

					$arr_data['video_name']=$this->_object_video->input->post('txt_video_name',true);
					$arr_data['video_alias']=convert_vi_to_en($this->_object_video->input->post('txt_video_alias',true));
					if(isset($_POST['input_check_browser']))
						$arr_data['video_img']=$this->_object_video->input->post('txt_video_img',true);
					$arr_data['video_description']=$this->_object_video->input->post('txt_video_description',true);
					$arr_data['video_active']=$this->_object_video->input->post('txt_video_active',true);
					$arr_data['video_public']=$this->_object_video->input->post('txt_video_public',true);
					$arr_data['video_order']=$this->_object_video->input->post('txt_video_order',true);
					$arr_data['cate_id']=$this->_object_video->input->post('txt_cate_video',true);
					$arr_data['video_update_date']=date('Y-m-d H:i:s');

					if($arr_data['video_active'] == 1){

						$arr_data_active['video_active']=0;
						$arr_where_active['video_id !=']=$this->_object_video->uri->segment(4,true);
						$arr_where_active['cate_id']=$arr_data['cate_id'];
						$this->_object_video->m_video->update_video($arr_data_active,$arr_where_active);
					}

					if($this->_object_video->m_video->update_video($arr_data,$arr_where)){

						if($this->_arr_data['data_content']['authorization']['control']){

							$this->_object_video->session->set_flashdata('add_update_video',alert(lang('message_update_success')));
							redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
						}
						else{

							$this->_object_video->session->set_flashdata('add_update_video',alert(lang('message_update_success')));
							redirect(current_url());
						}
					}
					else
						$message_session_flash=alert(lang('message_update_faild'));
				}
				else
					$message_session_flash=alert(lang('message_undefined_type_file'));
			}

			$this->_arr_data['data_content']['category_video']='';
			$arr_category_video=$this->_object_video->m_category_sub->list_category_sub_one_menu_admin($this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
			if(is_array($arr_category_video))
				$this->_arr_data['data_content']['category_video']=$this->_object_video->m_category_sub->recursive_category_sub_add($arr_category_video,0,'txt_cate_video',element('cate_id',$this->_arr_data['data_content']['video'],''));

			$this->_arr_data['data_content']['info_content']=$this->_object_video->language->get_data_video_add_update('update_video',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_video";

			$arr_sub_menu=$this->_object_video->m_sub_menu_admin->get_sub_menu($this->_menu_class,'update',$this->_object_video->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_video->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_video->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function update_public(){

		$this->_arr_data['data_content']['video']=$this->_object_video->m_video->get_video_public($this->_object_video->uri->segment(4,true),$this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);

		if($this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($this->_arr_data['data_content']['video']) && !empty($this->_arr_data['data_content']['video'])){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_video->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_video->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_video->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_video') && ($this->_object_video->form_validation->run('add_update_video'))){

				$arr_where['video_id']=$this->_object_video->uri->segment(4,true);
				$arr_data['video_file']=$this->_object_video->input->post('txt_video_file',true);
				if(check_type_file($arr_data['video_file']) == 0 || check_type_file($arr_data['video_file']) == 3){

					$arr_data['video_name']=$this->_object_video->input->post('txt_video_name',true);
					$arr_data['video_alias']=convert_vi_to_en($this->_object_video->input->post('txt_video_alias',true));
					if(isset($_POST['input_check_browser']))
						$arr_data['video_img']=$this->_object_video->input->post('txt_video_img',true);
					$arr_data['video_description']=$this->_object_video->input->post('txt_video_description',true);
					$arr_data['video_active']=$this->_object_video->input->post('txt_video_active',true);
					$arr_data['video_public']=$this->_object_video->input->post('txt_video_public',true);
					$arr_data['video_order']=$this->_object_video->input->post('txt_video_order',true);
					$arr_data['cate_id']=$this->_object_video->input->post('txt_cate_video',true);
					$arr_data['video_update_date']=date('Y-m-d H:i:s');

					if($arr_data['video_active'] == 1){

						$arr_data_active['video_active']=0;
						$arr_where_active['video_id !=']=$this->_object_video->uri->segment(4,true);
						$arr_where_active['cate_id']=$arr_data['cate_id'];
						$this->_object_video->m_video->update_video($arr_data_active,$arr_where_active);
					}

					if($this->_object_video->m_video->update_video($arr_data,$arr_where)){

						if($this->_arr_data['data_content']['authorization']['control']){

							$this->_object_video->session->set_flashdata('add_update_video',alert(lang('message_update_success')));
							redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
						}
						else{

							$this->_object_video->session->set_flashdata('add_update_video',alert(lang('message_update_success')));
							redirect(current_url());
						}
					}
					else
						$message_session_flash=alert(lang('message_update_faild'));
				}
				else
					$message_session_flash=alert(lang('message_undefined_type_file'));
			}

			$this->_arr_data['data_content']['category_video']='';
			$arr_category_video=$this->_object_video->m_category_sub->list_category_sub_one_menu_admin_public($this->_menu_class,$this->_object_video->my_layout->sess_lang_admin);
			if(is_array($arr_category_video))
				$this->_arr_data['data_content']['category_video']=$this->_object_video->m_category_sub->recursive_category_sub_add($arr_category_video,0,'txt_cate_video',element('cate_id',$this->_arr_data['data_content']['video'],''));

			$this->_arr_data['data_content']['info_content']=$this->_object_video->language->get_data_video_add_update('update_video',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_video";

			$arr_sub_menu=$this->_object_video->m_sub_menu_admin->get_sub_menu($this->_menu_class,'update',$this->_object_video->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_video->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_video->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function general_alias(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$this->_object_video->load->helper('general_page');
			$alias_name=$this->_object_video->input->post('alias_name',true);
			echo convert_vi_to_en($alias_name);
		}
		else
			show_404('page');

	}

}

?>