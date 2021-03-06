<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

Class Category_product{

	private $_object_category;
	private $_menu_class;
	private $_table_class;
	private $_arr_data=array();
	private $_level_menu;

	public function __construct(){

		$this->_object_category=& get_instance();

		$this->_object_category->load->helper(array('url','form','array'));
		$this->_object_category->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination')); //my_layout:session,language
		$this->_object_category->load->Model(array('m_category_product'));  //my_layout:m_authorization_group,m_sub_menu_admin
		//$this->_object_category->my_layout->sess_lang_admin:category:3,update_category_public:1,addcategory:4,upcategory:4

		$this->_object_category->form_validation->set_error_delimiters('','');
		/*
		  if((!isset($_POST[md5('hominhtri')]))&&(!isset($_POST['validateValue'])))
		  $this->_arr_data=$this->_object_category->my_layout->set_layout();
		 */

	}

	public function set_config_category($menu_class,$table_class=false,$arr_data='',$level_menu=true){

		$this->_menu_class=$menu_class;
		$this->_table_class=$table_class;
		$this->_arr_data=$arr_data;
		$this->_level_menu=$level_menu;

	}

	public function category(){

		if((isset($_POST['checkbox'])) && ($this->_object_category->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delcategory')))
			$message_session_flash=$this->delete_category_all($this->_object_category->input->post('checkbox',true));

		if($this->_object_category->m_authorization_group->check_authorization_one_menu($this->_menu_class,'category')){

			$arr_auhorization=array('addcategory','delcategory','upcategory','category');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_category->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_category->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_category->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->_object_category->uri->segment(4,'all');
			$this->_arr_data['data_content']['category_product']=$this->_object_category->m_category_product->list_category_product_one_menu_admin($this->_menu_class,$this->_object_category->my_layout->sess_lang_admin);

			if($get_select_filter != 'all'){

				$category_product=$this->_object_category->m_category_product->recursive_category_product_table($this->_arr_data['data_content'],$get_select_filter);
				$this->_arr_data['data_content']['table_content_category_product']=$category_product['content'];
			}
			else{

				$category_product=$this->_object_category->m_category_product->recursive_category_product_table($this->_arr_data['data_content'],0);
				$this->_arr_data['data_content']['table_content_category_product']=$category_product['content'];
			}

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_data['data_content']['info_content']=$this->_object_category->language->get_data_category_control(true,$this->_menu_class);
				$this->_object_category->load->view(ADMIN_DIR_ROOT."/view_category_product_manager",$this->_arr_data['data_content']);
			}
			else{

				$this->_arr_data['data_content']['category_product_root']=$this->_object_category->m_category_product->list_category_product_root($this->_menu_class,$this->_object_category->my_layout->sess_lang_admin);

				$this->_arr_data['data_content']['info_content']=$this->_object_category->language->get_data_category_control(false,$this->_menu_class);
				$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_category_product_manager";

				$this->_arr_data['data_content']['title_function']=$this->_object_category->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['category'],false));
				$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['category'],false)." ::.";
				$this->_object_category->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function update_category_order(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(!preg_match("/^([\-+])?[0-9]+$/i",$this->_object_category->uri->segment(5,true))){

				echo "is_numeric";
				exit();
			}

			if($this->_object_category->m_authorization_group->check_authorization_one_menu($this->_menu_class,'upcategory')){

				$arr_where['cate_id']=$this->_object_category->uri->segment(4,true);
				$arr_data['cate_order']=$this->_object_category->uri->segment(5,true);
				if(!$this->_object_category->m_category_product->update_category_product($arr_data,$arr_where))
					echo "is_numeric";
				else
					echo $this->_object_category->uri->segment(5,true);
			}
		}
		else
			show_404('page');

	}

	public function update_category_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$category_product=$this->_object_category->m_category_product->get_category_product($this->_object_category->uri->segment(4,true),$this->_menu_class,$this->_object_category->my_layout->sess_lang_admin);
			if($this->_object_category->m_authorization_group->check_authorization_one_menu($this->_menu_class,'upcategory') && is_array($category_product)){

				if(element('cate_public',$category_product,'') == 1)
					$arr_data['cate_public']=0;
				else
					$arr_data['cate_public']=1;

				$arr_where['cate_id']=$this->_object_category->uri->segment(4,true);
				if(!$this->_object_category->m_category_product->update_category_product($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['cate_public'];
			}
		}
		else
			show_404('page');

	}

	public function addcategory(){

		if($this->_object_category->m_authorization_group->check_authorization_one_menu($this->_menu_class,'addcategory')){

			$arr_auhorization=array('category');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_category->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_category->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_category->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_category_product') && ($this->_object_category->form_validation->run('add_update_category_product'))){

				$arr_data['cate_name']=$this->_object_category->input->post('txt_cate_name',true);
				$arr_data['cate_alias']=convert_vi_to_en($this->_object_category->input->post('txt_cate_alias',true));
				if(isset($_POST['input_check_browser']))
					$arr_data['cate_img']=$this->_object_category->input->post('txt_cate_img',true);
				$arr_data['cate_public']=$this->_object_category->input->post('txt_cate_public',true);
				$arr_data['cate_order']=$this->_object_category->input->post('txt_cate_order',true);
				$arr_data['cate_parent']=$this->_object_category->input->post('txt_category_product',true);
				$arr_data['cate_seo_keyword']=$this->_object_category->input->post('txt_cate_seo_keyword',true);
				$arr_data['cate_seo_description']=$this->_object_category->input->post('txt_cate_seo_description',true);
				$arr_data['menu_class']=$this->_menu_class;
				$arr_data['cate_lang']=$this->_object_category->my_layout->sess_lang_admin;
				$arr_data['cate_create_date']=date('Y-m-d H:i:s');
				$arr_data['cate_update_date']=date('Y-m-d H:i:s');

				if($this->_object_category->m_category_product->insert_category_product($arr_data)){

					if($this->_arr_data['data_content']['authorization']['category']){

						$this->_object_category->session->set_flashdata('add_update_category_product',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['category'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['category'],false));
					}
					else{

						$this->_object_category->session->set_flashdata('add_update_category_product',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}

			$this->_arr_data['data_content']['category_product']='';
			$arr_category_product=$this->_object_category->m_category_product->list_category_product_one_menu_admin($this->_menu_class,$this->_object_category->my_layout->sess_lang_admin);
			if(is_array($arr_category_product))
				$this->_arr_data['data_content']['category_product']=$this->_object_category->m_category_product->recursive_category_product_level($arr_category_product,0,'txt_category_product',false,$this->_level_menu);

			$this->_arr_data['data_content']['info_content']=$this->_object_category->language->get_data_category_add_update('add_category_product',$this->_level_menu);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_category_product";

			$arr_sub_menu=$this->_object_category->m_sub_menu_admin->get_sub_menu($this->_menu_class,'addcategory',$this->_object_category->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_category->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_category->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function delete_category(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->_object_category->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delcategory')){

				$arr_where_delete['cate_id']=$this->_object_category->uri->segment(5,true);
				if(!$this->_object_category->m_category_product->delete_category_product($arr_where_delete,$this->_table_class))
					echo "delete_faild";
				else
					$this->category();
			}
		}
		else
			show_404('page');

	}

	public function delete_category_all($arr_where){

		if(!(($this->_object_category->uri->segment(2) == $this->_menu_class) && ($this->_object_category->uri->segment(3) == 'delete_category_all'))){

			if($this->_object_category->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delcategory') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){
					$arr_where_delete['cate_id']=$key;
					if(!$this->_object_category->m_category_product->delete_category_product($arr_where_delete,$this->_table_class))
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

	public function upcategory(){

		$this->_arr_data['data_content']['category_product_one']=$this->_object_category->m_category_product->get_category_product($this->_object_category->uri->segment(4,true),$this->_menu_class,$this->_object_category->my_layout->sess_lang_admin);

		if($this->_object_category->m_authorization_group->check_authorization_one_menu($this->_menu_class,'upcategory') && is_array($this->_arr_data['data_content']['category_product_one']) && !empty($this->_arr_data['data_content']['category_product_one'])){

			$arr_auhorization=array('category');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_category->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_category->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_category->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_category_product') && ($this->_object_category->form_validation->run('add_update_category_product'))){

				$arr_where['cate_id']=$this->_object_category->uri->segment(4,true);

				$arr_data['cate_name']=$this->_object_category->input->post('txt_cate_name',true);
				$arr_data['cate_alias']=convert_vi_to_en($this->_object_category->input->post('txt_cate_alias',true));
				if(isset($_POST['input_check_browser']))
					$arr_data['cate_img']=$this->_object_category->input->post('txt_cate_img',true);
				$arr_data['cate_public']=$this->_object_category->input->post('txt_cate_public',true);
				$arr_data['cate_order']=$this->_object_category->input->post('txt_cate_order',true);
				$arr_data['cate_parent']=$this->_object_category->input->post('txt_category_product',true);
				$arr_data['cate_seo_keyword']=$this->_object_category->input->post('txt_cate_seo_keyword',true);
				$arr_data['cate_seo_description']=$this->_object_category->input->post('txt_cate_seo_description',true);
				$arr_data['cate_update_date']=date('Y-m-d H:i:s');

				if($this->_object_category->m_category_product->update_category_product($arr_data,$arr_where)){

					if($this->_arr_data['data_content']['authorization']['category']){

						$this->_object_category->session->set_flashdata('add_update_category_product',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['category'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['category'],false));
					}
					else{

						$this->_object_category->session->set_flashdata('add_update_category_product',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_data['data_content']['category_product']='';
			$arr_category_product=$this->_object_category->m_category_product->list_category_product_one_menu_admin($this->_menu_class,$this->_object_category->my_layout->sess_lang_admin,element('cate_id',$this->_arr_data['data_content']['category_product_one'],''));
			if(is_array($arr_category_product))
				$this->_arr_data['data_content']['category_product']=$this->_object_category->m_category_product->recursive_category_product_level($arr_category_product,0,'txt_category_product',element('cate_parent',$this->_arr_data['data_content']['category_product_one'],''),$this->_level_menu);

			$this->_arr_data['data_content']['info_content']=$this->_object_category->language->get_data_category_add_update('update_category_product',$this->_level_menu);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_category_product";

			$arr_sub_menu=$this->_object_category->m_sub_menu_admin->get_sub_menu($this->_menu_class,'upcategory',$this->_object_category->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_category->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_category->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function general_category_alias(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$this->_object_category->load->helper('general_page');
			$alias_name=$this->_object_category->input->post('alias_name',true);
			echo convert_vi_to_en($alias_name);
		}
		else
			show_404('page');

	}

}

?>