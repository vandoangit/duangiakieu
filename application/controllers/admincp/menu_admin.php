<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Menu_admin extends CI_Controller{

	public $_arr_template_admin;

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array'));
		$this->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination'));
		$this->load->Model(array('m_menu_admin','m_sub_menu_admin'));

		$this->form_validation->set_error_delimiters('','');

		if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			$this->_arr_template_admin=$this->my_layout->set_layout();

	}

	public function control(){

		if(isset($_POST['checkbox']))
			$message_session_flash=$this->delete_all($this->input->post('checkbox',true));

		$this->_arr_template_admin['data_content']['menu_admin']=$this->m_menu_admin->list_menu_admin($this->my_layout->sess_lang_admin,0);

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$this->_arr_template_admin['data_content']['info_content']['ajax_show_manager']=true;
			$this->load->view(ADMIN_DIR_ROOT."/view_menu_admin_manager",$this->_arr_template_admin['data_content']);
		}
		else{

			$this->_arr_template_admin['data_content']['info_content']['ajax_show_manager']=false;
			$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_menu_admin_manager";

			$this->_arr_template_admin['data_content']['title_function']="Quản Lí Menu Admin";
			$this->_arr_template_admin['info_home']['home_title']=".:: Quản Lí Menu Admin ::.";
			$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
		}

	}

	public function update_order(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(!preg_match("/^([\-+])?[0-9]+$/i",$this->uri->segment(5,true))){

				echo "is_numeric";
				exit();
			}

			$arr_where['menu_class']=$this->uri->segment(4,true);
			$arr_data['menu_order']=$this->uri->segment(5,true);
			if(!$this->m_menu_admin->update_menu($arr_data,$arr_where))
				echo "is_numeric";
			else
				echo $this->uri->segment(5,true);
		}
		else
			show_404('page');

	}

	public function update_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$menu_admin=$this->m_menu_admin->get_menu_admin($this->uri->segment(4,true),$this->my_layout->sess_lang_admin);
			if(is_array($menu_admin)){

				if(element('menu_public',$menu_admin,'') == 1)
					$arr_data['menu_public']=0;
				else
					$arr_data['menu_public']=1;

				$arr_where['menu_class']=$this->uri->segment(4,true);
				if(!$this->m_menu_admin->update_menu($arr_data,$arr_where))
					echo "update_faild";
				else{

					$arr_data_sub_menu['sub_menu_public']=$arr_data['menu_public'];
					$arr_where_sub_menu['menu_class']=$arr_where['menu_class'];
					if(!$this->m_sub_menu_admin->update_sub_menu($arr_data_sub_menu,$arr_where_sub_menu))
						echo "update_faild";
					else
						echo $arr_data_sub_menu['sub_menu_public'];
				}
			}
		}
		else
			show_404('page');

	}

	public function add(){

		if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_menu_admin') && ($this->form_validation->run('add_update_menu_admin'))){

			$menu_class=$this->exsec_string->str_lower($this->input->post('txt_menu_class',true));
			$menu_name_vi=$this->exsec_string->str_upper($this->input->post('txt_menu_name_vi',true));
			$menu_name_en=$this->exsec_string->str_upper($this->input->post('txt_menu_name_en',true));
			$menu_public=$this->input->post('txt_menu_public',true);
			$menu_order=$this->input->post('txt_menu_order',true);

			$arr_insert_menu_admin=array(
				array(
					'menu_name'=>$menu_name_en." MANAGER",
					'menu_lang'=>'en'
				),
				array(
					'menu_name'=>"QUẢN LÍ ".$menu_name_vi,
					'menu_lang'=>'vi'
				)
			);
			for($i=0; $i < count($arr_insert_menu_admin); $i++){
				$arr_data_menu_admin[$i]['menu_class']=$menu_class;
				$arr_data_menu_admin[$i]['menu_name']=$arr_insert_menu_admin[$i]['menu_name'];
				$arr_data_menu_admin[$i]['menu_img']=$menu_class.".png";
				$arr_data_menu_admin[$i]['menu_order']=$menu_order;
				$arr_data_menu_admin[$i]['menu_public']=$menu_public;
				$arr_data_menu_admin[$i]['menu_lang']=$arr_insert_menu_admin[$i]['menu_lang'];
				$arr_data_menu_admin[$i]['menu_create_date']=date('Y-m-d H:i:s');
				$arr_data_menu_admin[$i]['menu_update_date']=date('Y-m-d H:i:s');
			}

			$menu_name_vi=$this->exsec_string->str_ucwords($menu_name_vi);
			$menu_name_en=$this->exsec_string->str_ucwords($menu_name_en);
			$arr_insert_sub_menu_admin=array(
				array(
					'sub_menu_name'=>"Update ".$menu_name_en,
					'sub_menu_function'=>"update",
					'sub_menu_img'=>"update_".$menu_class.".png",
					'sub_menu_order'=>9,
					'sub_menu_lang'=>'en'
				),
				array(
					'sub_menu_name'=>"Cập Nhật ".$menu_name_vi,
					'sub_menu_function'=>"update",
					'sub_menu_img'=>"update_".$menu_class.".png",
					'sub_menu_order'=>9,
					'sub_menu_lang'=>'vi'
				),
				array(
					'sub_menu_name'=>"Delete ".$menu_name_en,
					'sub_menu_function'=>"delete",
					'sub_menu_img'=>"delete_".$menu_class.".png",
					'sub_menu_order'=>8,
					'sub_menu_lang'=>'en'
				),
				array(
					'sub_menu_name'=>"Xóa ".$menu_name_vi,
					'sub_menu_function'=>"delete",
					'sub_menu_img'=>"delete_".$menu_class.".png",
					'sub_menu_order'=>8,
					'sub_menu_lang'=>'vi'
				),
				array(
					'sub_menu_name'=>"Add ".$menu_name_en,
					'sub_menu_function'=>"add",
					'sub_menu_img'=>"add_".$menu_class.".png",
					'sub_menu_order'=>7,
					'sub_menu_lang'=>'en'
				),
				array(
					'sub_menu_name'=>"Thêm ".$menu_name_vi,
					'sub_menu_function'=>"add",
					'sub_menu_img'=>"add_".$menu_class.".png",
					'sub_menu_order'=>7,
					'sub_menu_lang'=>'vi'
				),
				array(
					'sub_menu_name'=>$menu_name_en." Manager",
					'sub_menu_function'=>"control",
					'sub_menu_img'=>$menu_class."_manager.png",
					'sub_menu_order'=>6,
					'sub_menu_lang'=>'en'
				),
				array(
					'sub_menu_name'=>"Quản Lí ".$menu_name_vi,
					'sub_menu_function'=>"control",
					'sub_menu_img'=>$menu_class."_manager.png",
					'sub_menu_order'=>6,
					'sub_menu_lang'=>'vi'
				)
			);

			$arr_insert_sub_menu_admin_category=array(
				array(
					'sub_menu_name'=>"Quản Lí Danh Mục ".$menu_name_vi,
					'sub_menu_function'=>"category",
					'sub_menu_img'=>$menu_class."_category.png",
					'sub_menu_order'=>1,
					'sub_menu_lang'=>'vi'
				),
				array(
					'sub_menu_name'=>$menu_name_en." Category Manager",
					'sub_menu_function'=>"category",
					'sub_menu_img'=>$menu_class."_category.png",
					'sub_menu_order'=>1,
					'sub_menu_lang'=>'en'
				),
				array(
					'sub_menu_name'=>"Thêm Danh Mục ".$menu_name_vi,
					'sub_menu_function'=>"addcategory",
					'sub_menu_img'=>"addcategory_".$menu_class.".png",
					'sub_menu_order'=>2,
					'sub_menu_lang'=>'vi'
				),
				array(
					'sub_menu_name'=>"Add ".$menu_name_en." Category",
					'sub_menu_function'=>"addcategory",
					'sub_menu_img'=>"addcategory_".$menu_class.".png",
					'sub_menu_order'=>2,
					'sub_menu_lang'=>'en'
				),
				array(
					'sub_menu_name'=>"Xóa Danh Mục ".$menu_name_vi,
					'sub_menu_function'=>"delcategory",
					'sub_menu_img'=>"delcategory_".$menu_class.".png",
					'sub_menu_order'=>3,
					'sub_menu_lang'=>'vi'
				),
				array(
					'sub_menu_name'=>"Delete ".$menu_name_en." Category",
					'sub_menu_function'=>"delcategory",
					'sub_menu_img'=>"delcategory_".$menu_class.".png",
					'sub_menu_order'=>3,
					'sub_menu_lang'=>'en'
				),
				array(
					'sub_menu_name'=>"Cập Nhật Danh Mục ".$menu_name_vi,
					'sub_menu_function'=>"upcategory",
					'sub_menu_img'=>"upcategory_".$menu_class.".png",
					'sub_menu_order'=>4,
					'sub_menu_lang'=>'vi'
				),
				array(
					'sub_menu_name'=>"Update ".$menu_name_en." Category",
					'sub_menu_function'=>"upcategory",
					'sub_menu_img'=>"upcategory_".$menu_class.".png",
					'sub_menu_order'=>4,
					'sub_menu_lang'=>'en'
				)
			);

			if($this->input->post('txt_menu_cateogry',0) == 1)
				$arr_insert_sub_menu_admin=array_merge($arr_insert_sub_menu_admin,$arr_insert_sub_menu_admin_category);


			for($i=0; $i < count($arr_insert_sub_menu_admin); $i++){
				$arr_data_sub_menu_admin[$i]['sub_menu_name']=$arr_insert_sub_menu_admin[$i]['sub_menu_name'];
				$arr_data_sub_menu_admin[$i]['sub_menu_function']=$arr_insert_sub_menu_admin[$i]['sub_menu_function'];
				$arr_data_sub_menu_admin[$i]['menu_class']=$menu_class;
				$arr_data_sub_menu_admin[$i]['sub_menu_img']=$arr_insert_sub_menu_admin[$i]['sub_menu_img'];
				$arr_data_sub_menu_admin[$i]['sub_menu_public']=$menu_public;
				$arr_data_sub_menu_admin[$i]['sub_menu_order']=$arr_insert_sub_menu_admin[$i]['sub_menu_order'];
				$arr_data_sub_menu_admin[$i]['sub_menu_lang']=$arr_insert_sub_menu_admin[$i]['sub_menu_lang'];
				$arr_data_sub_menu_admin[$i]['sub_menu_create_date']=date('Y-m-d H:i:s');
				$arr_data_sub_menu_admin[$i]['sub_menu_update_date']=date('Y-m-d H:i:s');
			}

			if($this->m_menu_admin->insert_menu($arr_data_menu_admin)){

				if($this->m_sub_menu_admin->insert_sub_menu($arr_data_sub_menu_admin)){

					$this->session->set_flashdata('add_update_menu_admin',alert(lang('message_add_success')));
					redirect(base_url().ADMIN_DIR_VIRTUAL."/menu_admin/control");
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}
			else
				$message_session_flash=alert(lang('message_add_faild'));
		}

		$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
		$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_menu_admin";

		$this->_arr_template_admin['data_content']['title_function']="Thêm Menu Admin";
		$this->_arr_template_admin['info_home']['home_title']=".:: Thêm Menu Admin ::.";
		$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);

	}

	public function delete(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$arr_where_delete['menu_class']=$this->uri->segment(5,true);
			if(!$this->m_menu_admin->delete_menu($arr_where_delete))
				echo "delete_faild";
			else{

				if(!$this->m_sub_menu_admin->delete_sub_menu($arr_where_delete))
					echo "delete_faild";
				else
					$this->control();
			}
		}
		else
			show_404('page');

	}

	public function delete_all($arr_where){

		if(!(($this->uri->segment(2) == 'menu_admin') && ($this->uri->segment(3) == 'delete_all'))){

			if(is_array($arr_where)){

				foreach($arr_where as $key=> $value){

					$arr_where_delete['menu_class']=$key;
					if(!$this->m_menu_admin->delete_menu($arr_where_delete))
						$message_session_flash=alert(lang('message_delete_all_faild'));
					else if(!$this->m_sub_menu_admin->delete_sub_menu($arr_where_delete))
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