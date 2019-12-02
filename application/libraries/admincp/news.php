<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class News{

	private $_object_news;
	private $_menu_class;
	private $_bool_active;
	private $_arr_data=array();

	public function __construct(){

		$this->_object_news=& get_instance();

		$this->_object_news->load->helper(array('url','form','array'));
		$this->_object_news->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination'));   //my_layout:session,language
		$this->_object_news->load->Model(array('m_news','m_category_news')); //my_layout:m_authorization_group,m_sub_menu_admin
		//$this->_object_news->my_layout->sess_lang_admin:control:7,update_public:1,add:3,update:4
		$this->_object_news->load->helper('config_ckeditor');

		$this->_object_news->form_validation->set_error_delimiters('','');

		if((!isset($_POST[md5('hominhtri')])) && (!isset($_POST['validateValue'])))
			$this->_arr_data=$this->_object_news->my_layout->set_layout();

	}

	public function set_config_news($menu_class,$bool_active=array('category'=>true,'description'=>true,'image'=>true,'active'=>true)){

		$this->_menu_class=$menu_class;
		$this->_bool_active=$bool_active;
		return $this->_arr_data;

	}

	public function control(){

		if((isset($_POST['checkbox'])) && ($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete')))
			$message_session_flash=$this->delete_all($this->_object_news->input->post('checkbox',true));

		if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'control')){

			$arr_auhorization=array('add','delete','update','control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_news->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_news->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->_object_news->uri->segment(4,'all');
			if($get_select_filter != 'all'){

				$arr_category_id=$this->_object_news->m_category_news->get_category_news_id($get_select_filter,$this->_object_news->my_layout->sess_lang_admin);
				$this->_arr_data['data_content']['news']=$this->_object_news->m_news->list_news_one_category($arr_category_id,$this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
			}
			else{

				$this->_arr_data['data_content']['news']=$this->_object_news->m_news->list_news($this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
			}

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_data['data_content']['info_content']=$this->_object_news->language->get_data_news_control(true,$this->_menu_class,$this->_bool_active);
				$this->_object_news->load->view(ADMIN_DIR_ROOT."/view_news_manager",$this->_arr_data['data_content']);
			}
			else{

				$this->_arr_data['data_content']['category_news']='';
				$arr_category_news=$this->_object_news->m_category_news->list_category_news_one_menu_admin($this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
				if(is_array($arr_category_news))
					$this->_arr_data['data_content']['category_news']=$this->_object_news->m_category_news->recursive_category_news_add($arr_category_news,0,'select_category_news',$get_select_filter);

				$this->_arr_data['data_content']['info_content']=$this->_object_news->language->get_data_news_control(false,$this->_menu_class,$this->_bool_active);
				$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_news_manager";

				$this->_arr_data['data_content']['title_function']=$this->_object_news->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false));
				$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false)." ::.";
				$this->_object_news->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function control_public(){

		if((isset($_POST['checkbox'])) && ($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete')))
			$message_session_flash=$this->delete_all_public($this->_object_news->input->post('checkbox',true));

		if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'control')){

			$arr_auhorization=array('add','delete','update','control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_news->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_news->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->_object_news->uri->segment(4,'all');
			if($get_select_filter != 'all'){

				$arr_category_id=$this->_object_news->m_category_news->get_category_news_id_public($get_select_filter,$this->_object_news->my_layout->sess_lang_admin);
				$this->_arr_data['data_content']['news']=$this->_object_news->m_news->list_news_one_category_public($arr_category_id,$this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
			}
			else{

				$this->_arr_data['data_content']['news']=$this->_object_news->m_news->list_news_public($this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
			}

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_data['data_content']['info_content']=$this->_object_news->language->get_data_news_control(true,$this->_menu_class,$this->_bool_active);
				$this->_object_news->load->view(ADMIN_DIR_ROOT."/view_news_manager",$this->_arr_data['data_content']);
			}
			else{

				$this->_arr_data['data_content']['category_news']='';
				$arr_category_news=$this->_object_news->m_category_news->list_category_news_one_menu_admin_public($this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
				if(is_array($arr_category_news))
					$this->_arr_data['data_content']['category_news']=$this->_object_news->m_category_news->recursive_category_news_add($arr_category_news,0,'select_category_news',$get_select_filter);

				$this->_arr_data['data_content']['info_content']=$this->_object_news->language->get_data_news_control(false,$this->_menu_class,$this->_bool_active);
				$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_news_manager";

				$this->_arr_data['data_content']['title_function']=$this->_object_news->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false));
				$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false)." ::.";
				$this->_object_news->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function update_order(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(!preg_match("/^([\-+])?[0-9]+$/i",$this->_object_news->uri->segment(5,true))){

				echo "is_numeric";
				exit();
			}

			if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update')){

				$arr_where['news_id']=$this->_object_news->uri->segment(4,true);
				$arr_data['news_order']=$this->_object_news->uri->segment(5,true);
				if(!$this->_object_news->m_news->update_news($arr_data,$arr_where))
					echo "is_numeric";
				else
					echo $this->_object_news->uri->segment(5,true);
			}
		}
		else
			show_404('page');

	}

	public function update_order_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(!preg_match("/^([\-+])?[0-9]+$/i",$this->_object_news->uri->segment(5,true))){

				echo "is_numeric";
				exit();
			}

			if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update')){

				$arr_where['news_id']=$this->_object_news->uri->segment(4,true);
				$arr_data['news_order']=$this->_object_news->uri->segment(5,true);
				if(!$this->_object_news->m_news->update_news($arr_data,$arr_where))
					echo "is_numeric";
				else
					echo $this->_object_news->uri->segment(5,true);
			}
		}
		else
			show_404('page');

	}

	public function update_public_news(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$news=$this->_object_news->m_news->get_news($this->_object_news->uri->segment(4,true),$this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
			if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($news)){

				if(element('news_public',$news,'') == 1)
					$arr_data['news_public']=0;
				else
					$arr_data['news_public']=1;

				$arr_where['news_id']=$this->_object_news->uri->segment(4,true);
				if(!$this->_object_news->m_news->update_news($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['news_public'];
			}
		}
		else
			show_404('page');

	}

	public function update_public_news_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$news=$this->_object_news->m_news->get_news_public($this->_object_news->uri->segment(4,true),$this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
			if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($news)){

				if(element('news_public',$news,'') == 1)
					$arr_data['news_public']=0;
				else
					$arr_data['news_public']=1;

				$arr_where['news_id']=$this->_object_news->uri->segment(4,true);
				if(!$this->_object_news->m_news->update_news($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['news_public'];
			}
		}
		else
			show_404('page');

	}

	public function update_active(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$news=$this->_object_news->m_news->get_news($this->_object_news->uri->segment(4,true),$this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
			if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($news)){

				if(element('news_active',$news,'') == 1)
					$arr_data['news_active']=0;
				else
					$arr_data['news_active']=1;

				$arr_where['news_id']=$this->_object_news->uri->segment(4,true);
				if(!$this->_object_news->m_news->update_news($arr_data,$arr_where))
					echo "update_faild";
				else{

					echo $arr_data['news_active'];
					if($arr_data['news_active'] == 1){

						$arr_data_active['news_active']=0;
						$arr_where_active['news_id !=']=$this->_object_news->uri->segment(4,true);
						$arr_where_active['cate_id']=element('cate_id',$news,'');
						$this->_object_news->m_news->update_news($arr_data_active,$arr_where_active);
					}
				}
			}
		}
		else
			show_404('page');

	}

	public function update_active_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$news=$this->_object_news->m_news->get_news_public($this->_object_news->uri->segment(4,true),$this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
			if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($news)){

				if(element('news_active',$news,'') == 1)
					$arr_data['news_active']=0;
				else
					$arr_data['news_active']=1;

				$arr_where['news_id']=$this->_object_news->uri->segment(4,true);
				if(!$this->_object_news->m_news->update_news($arr_data,$arr_where))
					echo "update_faild";
				else{

					echo $arr_data['news_active'];
					if($arr_data['news_active'] == 1){

						$arr_data_active['news_active']=0;
						$arr_where_active['news_id !=']=$this->_object_news->uri->segment(4,true);
						$arr_where_active['cate_id']=element('cate_id',$news,'');
						$this->_object_news->m_news->update_news($arr_data_active,$arr_where_active);
					}
				}
			}
		}
		else
			show_404('page');

	}

	public function add(){

		if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'add')){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_news->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_news->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_news') && ($this->_object_news->form_validation->run('add_update_news'))){

				$arr_data['news_name']=$this->_object_news->input->post('txt_news_name',true);
				$arr_data['news_alias']=convert_vi_to_en($this->_object_news->input->post('txt_news_alias',true));
				$arr_data['news_headline']=$this->_object_news->input->post('txt_news_headline');
				$arr_data['news_content']=$this->_object_news->input->post('txt_news_content');
				if(isset($_POST['input_check_browser']))
					$arr_data['news_img']=$this->_object_news->input->post('txt_news_img',true);
				$arr_data['news_active']=$this->_object_news->input->post('txt_news_active',true);
				$arr_data['news_order']=$this->_object_news->input->post('txt_news_order',true);
				$arr_data['news_public']=$this->_object_news->input->post('txt_news_public',true);
				$arr_data['news_author']=$this->_object_news->session->userdata($this->_object_news->m_authorization_user->sess_authorization_user);
				$arr_data['news_view']=0;
				$arr_data['news_seo_keyword']=$this->_object_news->input->post('txt_news_seo_keyword',true);
				$arr_data['news_seo_description']=$this->_object_news->input->post('txt_news_seo_description',true);
				$arr_data['cate_id']=$this->_object_news->input->post('txt_cate_news',true);
				$arr_data['news_create_date']=date('Y-m-d H:i:s');
				$arr_data['news_update_date']=date('Y-m-d H:i:s');

				if($arr_data['news_active'] == 1){

					$arr_data_active['news_active']=0;
					$arr_where_active['cate_id']=$arr_data['cate_id'];
					$this->_object_news->m_news->update_news($arr_data_active,$arr_where_active);
				}

				if($this->_object_news->m_news->insert_news($arr_data)){

					if($this->_arr_data['data_content']['authorization']['control']){

						$this->_object_news->session->set_flashdata('add_update_news',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->_object_news->session->set_flashdata('add_update_news',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}

			$this->_arr_data['data_content']['category_news']='';
			$arr_category_news=$this->_object_news->m_category_news->list_category_news_one_menu_admin($this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
			if(is_array($arr_category_news))
				$this->_arr_data['data_content']['category_news']=$this->_object_news->m_category_news->recursive_category_news_add($arr_category_news,0,'txt_cate_news',false);

			$this->_arr_data['data_content']['info_content']=$this->_object_news->language->get_data_news_add_update('add_news',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_news";

			$arr_sub_menu=$this->_object_news->m_sub_menu_admin->get_sub_menu($this->_menu_class,'add',$this->_object_news->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_news->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_news->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function add_public(){

		if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'add')){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_news->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_news->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_news') && ($this->_object_news->form_validation->run('add_update_news'))){

				$arr_data['news_name']=$this->_object_news->input->post('txt_news_name',true);
				$arr_data['news_alias']=convert_vi_to_en($this->_object_news->input->post('txt_news_alias',true));
				$arr_data['news_headline']=$this->_object_news->input->post('txt_news_headline');
				$arr_data['news_content']=$this->_object_news->input->post('txt_news_content');
				if(isset($_POST['input_check_browser']))
					$arr_data['news_img']=$this->_object_news->input->post('txt_news_img',true);
				$arr_data['news_active']=$this->_object_news->input->post('txt_news_active',true);
				$arr_data['news_order']=$this->_object_news->input->post('txt_news_order',true);
				$arr_data['news_public']=$this->_object_news->input->post('txt_news_public',true);
				$arr_data['news_author']=$this->_object_news->session->userdata($this->_object_news->m_authorization_user->sess_authorization_user);
				$arr_data['news_view']=0;
				$arr_data['news_seo_keyword']=$this->_object_news->input->post('txt_news_seo_keyword',true);
				$arr_data['news_seo_description']=$this->_object_news->input->post('txt_news_seo_description',true);
				$arr_data['cate_id']=$this->_object_news->input->post('txt_cate_news',true);
				$arr_data['news_create_date']=date('Y-m-d H:i:s');
				$arr_data['news_update_date']=date('Y-m-d H:i:s');

				if($arr_data['news_active'] == 1){

					$arr_data_active['news_active']=0;
					$arr_where_active['cate_id']=$arr_data['cate_id'];
					$this->_object_news->m_news->update_news($arr_data_active,$arr_where_active);
				}

				if($this->_object_news->m_news->insert_news($arr_data)){

					if($this->_arr_data['data_content']['authorization']['control']){

						$this->_object_news->session->set_flashdata('add_update_news',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->_object_news->session->set_flashdata('add_update_news',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}

			$this->_arr_data['data_content']['category_news']='';
			$arr_category_news=$this->_object_news->m_category_news->list_category_news_one_menu_admin_public($this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
			if(is_array($arr_category_news))
				$this->_arr_data['data_content']['category_news']=$this->_object_news->m_category_news->recursive_category_news_add($arr_category_news,0,'txt_cate_news',false);

			$this->_arr_data['data_content']['info_content']=$this->_object_news->language->get_data_news_add_update('add_news',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_news";

			$arr_sub_menu=$this->_object_news->m_sub_menu_admin->get_sub_menu($this->_menu_class,'add',$this->_object_news->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_news->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_news->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function delete(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete')){

				$arr_where_delete['news_id']=$this->_object_news->uri->segment(5,true);
				if(!$this->_object_news->m_news->delete_news($arr_where_delete))
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

			if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete')){

				$arr_where_delete['news_id']=$this->_object_news->uri->segment(5,true);
				if(!$this->_object_news->m_news->delete_news($arr_where_delete))
					echo "delete_faild";
				else
					$this->control_public();
			}
		}
		else
			show_404('page');

	}

	public function delete_all($arr_where){

		if(!(($this->_object_news->uri->segment(2) == $this->_menu_class) && ($this->_object_news->uri->segment(3) == 'delete_all'))){

			if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){
					$arr_where_delete['news_id']=$key;
					if(!$this->_object_news->m_news->delete_news($arr_where_delete))
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

		if(!(($this->_object_news->uri->segment(2) == $this->_menu_class) && ($this->_object_news->uri->segment(3) == 'delete_all'))){

			if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){
					$arr_where_delete['news_id']=$key;
					if(!$this->_object_news->m_news->delete_news($arr_where_delete))
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

		$this->_arr_data['data_content']['news']=$this->_object_news->m_news->get_news($this->_object_news->uri->segment(4,true),$this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);

		if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($this->_arr_data['data_content']['news']) && !empty($this->_arr_data['data_content']['news'])){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_news->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_news->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_news') && ($this->_object_news->form_validation->run('add_update_news'))){

				$arr_where['news_id']=$this->_object_news->uri->segment(4,true);

				$arr_data['news_name']=$this->_object_news->input->post('txt_news_name',true);
				$arr_data['news_alias']=convert_vi_to_en($this->_object_news->input->post('txt_news_alias',true));
				$arr_data['news_headline']=$this->_object_news->input->post('txt_news_headline');
				$arr_data['news_content']=$this->_object_news->input->post('txt_news_content');
				if(isset($_POST['input_check_browser']))
					$arr_data['news_img']=$this->_object_news->input->post('txt_news_img',true);
				$arr_data['news_active']=$this->_object_news->input->post('txt_news_active',true);
				$arr_data['news_order']=$this->_object_news->input->post('txt_news_order',true);
				$arr_data['news_public']=$this->_object_news->input->post('txt_news_public',true);
				$arr_data['news_author']=$this->_object_news->session->userdata($this->_object_news->m_authorization_user->sess_authorization_user);
				$arr_data['news_seo_keyword']=$this->_object_news->input->post('txt_news_seo_keyword',true);
				$arr_data['news_seo_description']=$this->_object_news->input->post('txt_news_seo_description',true);
				$arr_data['cate_id']=$this->_object_news->input->post('txt_cate_news',true);
				$arr_data['news_update_date']=date('Y-m-d H:i:s');

				if($this->_object_news->m_news->update_news($arr_data,$arr_where)){

					if($arr_data['news_active'] == 1){

						$arr_data_active['news_active']=0;
						$arr_where_active['news_id !=']=$this->_object_news->uri->segment(4,true);
						$arr_where_active['cate_id']=$arr_data['cate_id'];
						$this->_object_news->m_news->update_news($arr_data_active,$arr_where_active);
					}

					if($this->_arr_data['data_content']['authorization']['control']){

						$this->_object_news->session->set_flashdata('add_update_news',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->_object_news->session->set_flashdata('add_update_news',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_data['data_content']['category_news']='';
			$arr_category_news=$this->_object_news->m_category_news->list_category_news_one_menu_admin($this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
			if(is_array($arr_category_news))
				$this->_arr_data['data_content']['category_news']=$this->_object_news->m_category_news->recursive_category_news_add($arr_category_news,0,'txt_cate_news',element('cate_id',$this->_arr_data['data_content']['news'],''));

			$this->_arr_data['data_content']['info_content']=$this->_object_news->language->get_data_news_add_update('update_news',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_news";

			$arr_sub_menu=$this->_object_news->m_sub_menu_admin->get_sub_menu($this->_menu_class,'update',$this->_object_news->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_news->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_news->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function update_public(){

		$this->_arr_data['data_content']['news']=$this->_object_news->m_news->get_news_public($this->_object_news->uri->segment(4,true),$this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);

		if($this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($this->_arr_data['data_content']['news']) && !empty($this->_arr_data['data_content']['news'])){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_news->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_news->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_news->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_news') && ($this->_object_news->form_validation->run('add_update_news'))){

				$arr_where['news_id']=$this->_object_news->uri->segment(4,true);

				$arr_data['news_name']=$this->_object_news->input->post('txt_news_name',true);
				$arr_data['news_alias']=convert_vi_to_en($this->_object_news->input->post('txt_news_alias',true));
				$arr_data['news_headline']=$this->_object_news->input->post('txt_news_headline');
				$arr_data['news_content']=$this->_object_news->input->post('txt_news_content');
				if(isset($_POST['input_check_browser']))
					$arr_data['news_img']=$this->_object_news->input->post('txt_news_img',true);
				$arr_data['news_active']=$this->_object_news->input->post('txt_news_active',true);
				$arr_data['news_order']=$this->_object_news->input->post('txt_news_order',true);
				$arr_data['news_public']=$this->_object_news->input->post('txt_news_public',true);
				$arr_data['news_author']=$this->_object_news->session->userdata($this->_object_news->m_authorization_user->sess_authorization_user);
				$arr_data['news_seo_keyword']=$this->_object_news->input->post('txt_news_seo_keyword',true);
				$arr_data['news_seo_description']=$this->_object_news->input->post('txt_news_seo_description',true);
				$arr_data['cate_id']=$this->_object_news->input->post('txt_cate_news',true);
				$arr_data['news_update_date']=date('Y-m-d H:i:s');

				if($this->_object_news->m_news->update_news($arr_data,$arr_where)){

					if($arr_data['news_active'] == 1){

						$arr_data_active['news_active']=0;
						$arr_where_active['news_id !=']=$this->_object_news->uri->segment(4,true);
						$arr_where_active['cate_id']=$arr_data['cate_id'];
						$this->_object_news->m_news->update_news($arr_data_active,$arr_where_active);
					}

					if($this->_arr_data['data_content']['authorization']['control']){

						$this->_object_news->session->set_flashdata('add_update_news',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->_object_news->session->set_flashdata('add_update_news',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_data['data_content']['category_news']='';
			$arr_category_news=$this->_object_news->m_category_news->list_category_news_one_menu_admin_public($this->_menu_class,$this->_object_news->my_layout->sess_lang_admin);
			if(is_array($arr_category_news))
				$this->_arr_data['data_content']['category_news']=$this->_object_news->m_category_news->recursive_category_news_add($arr_category_news,0,'txt_cate_news',element('cate_id',$this->_arr_data['data_content']['news'],''));

			$this->_arr_data['data_content']['info_content']=$this->_object_news->language->get_data_news_add_update('update_news',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_news";

			$arr_sub_menu=$this->_object_news->m_sub_menu_admin->get_sub_menu($this->_menu_class,'update',$this->_object_news->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_news->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_news->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function general_alias(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$this->_object_news->load->helper('general_page');
			$alias_name=$this->_object_news->input->post('alias_name',true);
			echo convert_vi_to_en($alias_name);
		}
		else
			show_404('page');

	}

}

?>