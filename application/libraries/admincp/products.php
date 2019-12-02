<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Products{

	private $_object_product;
	private $_menu_class;
	private $_bool_active;
	private $_arr_data=array();

	public function __construct(){

		$this->_object_product=& get_instance();

		$this->_object_product->load->helper(array('url','form','array'));
		$this->_object_product->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination'));   //my_layout:session,language
		$this->_object_product->load->Model(array('m_product','m_category_product','m_product_pattern'));   //my_layout:m_authorization_group,m_sub_menu_admin
		//$this->_object_product->my_layout->sess_lang_admin:control:7,update_public:1,add:3,product_detail:1,update:4
		$this->_object_product->load->helper('config_ckeditor');

		$this->_object_product->form_validation->set_error_delimiters('','');

		if((!isset($_POST[md5('hominhtri')])) && (!isset($_POST['validateValue'])))
			$this->_arr_data=$this->_object_product->my_layout->set_layout();

	}

	public function set_config_product($menu_class,$bool_active=array('category'=>true,'partner'=>true,'application'=>true,'price'=>true,'quantity'=>true,'color'=>true,'headline'=>true,'prominent'=>true)){

		$this->_menu_class=$menu_class;
		$this->_bool_active=$bool_active;
		return $this->_arr_data;

	}

	public function control(){

		if((isset($_POST['checkbox'])) && ($this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete')))
			$message_session_flash=$this->delete_all($this->_object_product->input->post('checkbox',true));

		if($this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,'control')){

			$arr_auhorization=array('add','delete','update','control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_product->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_product->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->_object_product->uri->segment(4,'all');
			if($get_select_filter != 'all'){

				$arr_category_id=$this->_object_product->m_category_product->get_category_product_id($get_select_filter,$this->_object_product->my_layout->sess_lang_admin);
				$this->_arr_data['data_content']['product']=$this->_object_product->m_product->list_product_one_category($arr_category_id,$this->_menu_class,$this->_object_product->my_layout->sess_lang_admin);
			}
			else{

				$this->_arr_data['data_content']['product']=$this->_object_product->m_product->list_product($this->_menu_class,$this->_object_product->my_layout->sess_lang_admin);
			}

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_data['data_content']['info_content']=$this->_object_product->language->get_data_product_control(true,$this->_menu_class,$this->_bool_active);
				$this->_object_product->load->view(ADMIN_DIR_ROOT."/view_product_manager",$this->_arr_data['data_content']);
			}
			else{

				$this->_arr_data['data_content']['category_product']='';
				$arr_category_product=$this->_object_product->m_category_product->list_category_product_one_menu_admin($this->_menu_class,$this->_object_product->my_layout->sess_lang_admin);
				if(is_array($arr_category_product))
					$this->_arr_data['data_content']['category_product']=$this->_object_product->m_category_product->recursive_category_product_add($arr_category_product,0,'select_category_product',$get_select_filter);

				$this->_arr_data['data_content']['info_content']=$this->_object_product->language->get_data_product_control(false,$this->_menu_class,$this->_bool_active);
				$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_product_manager";

				$this->_arr_data['data_content']['title_function']=$this->_object_product->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false));
				$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false)." ::.";
				$this->_object_product->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function update_order(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(!preg_match("/^([\-+])?[0-9]+$/i",$this->_object_product->uri->segment(5,true))){

				echo "is_numeric";
				exit();
			}

			if($this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update')){

				$arr_where['product_id']=$this->_object_product->uri->segment(4,true);
				$arr_data['product_order']=$this->_object_product->uri->segment(5,true);
				if(!$this->_object_product->m_product->update_product($arr_data,$arr_where))
					echo "is_numeric";
				else
					echo $this->_object_product->uri->segment(5,true);
			}
		}
		else
			show_404('page');

	}

	public function update_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$product=$this->_object_product->m_product->get_product($this->_object_product->uri->segment(4,true),$this->_menu_class,$this->_object_product->my_layout->sess_lang_admin);
			if($this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($product)){

				if(element('product_public',$product,'') == 1)
					$arr_data['product_public']=0;
				else
					$arr_data['product_public']=1;

				$arr_where['product_id']=$this->_object_product->uri->segment(4,true);
				if(!$this->_object_product->m_product->update_product($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['product_public'];
			}
		}
		else
			show_404('page');

	}

	public function update_prominent(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$product=$this->_object_product->m_product->get_product($this->_object_product->uri->segment(4,true),$this->_menu_class,$this->_object_product->my_layout->sess_lang_admin);
			if($this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($product)){

				if(element('product_prominent',$product,'') == 1)
					$arr_data['product_prominent']=0;
				else
					$arr_data['product_prominent']=1;

				$arr_where['product_id']=$this->_object_product->uri->segment(4,true);
				if(!$this->_object_product->m_product->update_product($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['product_prominent'];
			}
		}
		else
			show_404('page');

	}

	public function add(){

		if($this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,'add')){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_product->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_product->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_product') && ($this->_object_product->form_validation->run('add_product'))){


				$arr_data['product_id']=$this->_object_product->input->post('txt_product_id',true);
				$arr_data['product_name']=$this->_object_product->input->post('txt_product_name',true);
				$arr_data['product_alias']=convert_vi_to_en($this->_object_product->input->post('txt_product_alias',true));
				$arr_data['product_price']=(int) str_replace('.','',$this->_object_product->input->post('txt_product_price',true));
				$arr_data['product_price_old']=(int) str_replace('.','',$this->_object_product->input->post('txt_product_price_old',true));
				$arr_data['product_color']=$this->_object_product->input->post('txt_product_color',true);

				$product_img=$this->_object_product->input->post('txt_product_img',true);
				$product_check_img=$this->_object_product->input->post('input_check_browser',true);
				if(is_array($product_img)){

					foreach($product_img as $key=> $value){
						if(($value == '') || (!isset($product_check_img[$key])))
							unset($product_img[$key]);
					}
				}
				$arr_data['product_img']=@serialize($product_img);
				$arr_data['product_headline']=$this->_object_product->input->post('txt_product_headline_ckeditor');
				$arr_data['product_content']=$this->_object_product->input->post('txt_product_content_ckeditor');
				$arr_data['product_prominent']=$this->_object_product->input->post('txt_product_prominent',true);
				$arr_data['product_number']=(int) str_replace('.','',$this->_object_product->input->post('txt_product_number',true));
				$arr_data['product_order']=$this->_object_product->input->post('txt_product_order',true);
				$arr_data['product_public']=$this->_object_product->input->post('txt_product_public',true);
				$arr_data['product_view']=0;
				$arr_data['product_buy']=0;
				$arr_data['product_seo_keyword']=$this->_object_product->input->post('txt_product_seo_keyword',true);
				$arr_data['product_seo_description']=$this->_object_product->input->post('txt_product_seo_description',true);
				$arr_data['cate_id']=$this->_object_product->input->post('txt_cate_product',true);
				$arr_data['product_partner']=$this->_object_product->input->post('txt_product_partner',true);

				if(isset($_POST['txt_product_application']))
					$arr_data['product_application']=@serialize($this->_object_product->input->post('txt_product_application',true));
				else
					$arr_data['product_application']=@serialize(array());

				$arr_data['product_create_date']=date('Y-m-d H:i:s');
				$arr_data['product_update_date']=date('Y-m-d H:i:s');

				if($this->_object_product->m_product->insert_product($arr_data)){

					if($this->_arr_data['data_content']['authorization']['control']){

						$this->_object_product->session->set_flashdata('add_update_product',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->_object_product->session->set_flashdata('add_update_product',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}

			$this->_arr_data['data_content']['category_product']='';
			$arr_category_product=$this->_object_product->m_category_product->list_category_product_one_menu_admin($this->_menu_class,$this->_object_product->my_layout->sess_lang_admin);
			if(is_array($arr_category_product))
				$this->_arr_data['data_content']['category_product']=$this->_object_product->m_category_product->recursive_category_product_add($arr_category_product,0,'txt_cate_product',false);

			$this->_arr_data['data_content']['product_pattern']=$this->_object_product->m_product_pattern->list_product_pattern($this->_object_product->my_layout->sess_lang_admin);

			/* ----------------------------------------------------------------------------------------------- */

			$this->_object_product->load->Model(array('m_partner','m_application'));

			$this->_arr_data['data_content']['product_partner']=$this->_object_product->m_partner->list_partner('partner',$this->_object_product->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['product_application']=$this->_object_product->m_application->list_application($this->_object_product->my_layout->sess_lang_admin);

			/* ----------------------------------------------------------------------------------------------- */

			$this->_arr_data['data_content']['info_content']=$this->_object_product->language->get_data_product_add_update('add_product',$this->_menu_class,$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_product";

			$arr_sub_menu=$this->_object_product->m_sub_menu_admin->get_sub_menu($this->_menu_class,'add',$this->_object_product->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_product->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_product->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function check_product_id(){

		if(isset($_POST['validateValue'])){

			$validateValue=$this->_object_product->input->post('validateValue',true);
			$validateId=$this->_object_product->input->post('validateId',true);
			$validateError=$this->_object_product->input->post('validateError',true);
			$arrayToJs=array();
			$arrayToJs[0]=$validateId;
			$arrayToJs[1]=$validateError;

			if($this->_object_product->m_product->check_product_id($this->_object_product->input->post('validateValue',true))){

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

	public function check_product_id1($product_id=true){

		if(!(($this->_object_product->uri->segment(2) == $this->_menu_class) && ($this->_object_product->uri->segment(3) == 'check_product_id1'))){

			if($this->_object_product->m_product->check_product_id($product_id)){

				$this->_object_product->form_validation->set_message('check_product_id1','%s');
				return false;
			}
			else
				return true;
		}
		else
			show_404('page');

	}

	public function product_detail(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,'add') || $this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update')){

				$product_pattern_id=$this->_object_product->uri->segment(4,true);
				$product_id=$this->_object_product->uri->segment(5,true);
				if($product_pattern_id == -1){
					echo "";
				}
				else if($product_pattern_id == -2){

					$product=$this->_object_product->m_product->get_product($product_id,$this->_menu_class,$this->_object_product->my_layout->sess_lang_admin);
					echo element('product_content',$product,'');
				}
				else{

					$product_pattern=$this->_object_product->m_product_pattern->get_product_pattern($product_pattern_id,$this->_object_product->my_layout->sess_lang_admin);
					echo element('product_pattern_content',$product_pattern,'');
				}
			}
		}
		else
			show_404('page');

	}

	public function delete(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete')){

				$arr_where_delete['product_id']=$this->_object_product->uri->segment(5,true);
				if(!$this->_object_product->m_product->delete_product($arr_where_delete))
					echo "delete_faild";
				else
					$this->control();
			}
		}
		else
			show_404('page');

	}

	public function delete_all($arr_where){

		if(!(($this->_object_product->uri->segment(2) == $this->_menu_class) && ($this->_object_product->uri->segment(3) == 'delete_all'))){

			if($this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){
					$arr_where_delete['product_id']=$key;
					if(!$this->_object_product->m_product->delete_product($arr_where_delete))
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

		$this->_arr_data['data_content']['product']=$this->_object_product->m_product->get_product($this->_object_product->uri->segment(4,true),$this->_menu_class,$this->_object_product->my_layout->sess_lang_admin);

		if($this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($this->_arr_data['data_content']['product']) && !empty($this->_arr_data['data_content']['product'])){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_product->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_product->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_product->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_product') && ($this->_object_product->form_validation->run('update_product'))){

				$arr_where['product_id']=$this->_object_product->uri->segment(4,true);

				$arr_data['product_name']=$this->_object_product->input->post('txt_product_name',true);
				$arr_data['product_alias']=convert_vi_to_en($this->_object_product->input->post('txt_product_alias',true));
				$arr_data['product_price']=(int) str_replace('.','',$this->_object_product->input->post('txt_product_price',true));
				$arr_data['product_price_old']=(int) str_replace('.','',$this->_object_product->input->post('txt_product_price_old',true));
				$arr_data['product_color']=$this->_object_product->input->post('txt_product_color',true);

				$product_img=$this->_object_product->input->post('txt_product_img',true);
				$product_check_img=$this->_object_product->input->post('input_check_browser',true);
				if(is_array($product_img)){

					foreach($product_img as $key=> $value){
						if(($value == '') || (!isset($product_check_img[$key])))
							unset($product_img[$key]);
						else
							$product_img[$key]=$value;
					}
				}
				$arr_data['product_img']=@serialize($product_img);
				$arr_data['product_headline']=$this->_object_product->input->post('txt_product_headline_ckeditor');
				$arr_data['product_content']=$this->_object_product->input->post('txt_product_content_ckeditor');
				$arr_data['product_prominent']=$this->_object_product->input->post('txt_product_prominent',true);
				$arr_data['product_number']=(int) str_replace('.','',$this->_object_product->input->post('txt_product_number',true));
				$arr_data['product_order']=$this->_object_product->input->post('txt_product_order',true);
				$arr_data['product_public']=$this->_object_product->input->post('txt_product_public',true);
				$arr_data['product_seo_keyword']=$this->_object_product->input->post('txt_product_seo_keyword',true);
				$arr_data['product_seo_description']=$this->_object_product->input->post('txt_product_seo_description',true);
				$arr_data['cate_id']=$this->_object_product->input->post('txt_cate_product',true);
				$arr_data['product_partner']=$this->_object_product->input->post('txt_product_partner',true);

				if(isset($_POST['txt_product_application']))
					$arr_data['product_application']=@serialize($this->_object_product->input->post('txt_product_application',true));
				else
					$arr_data['product_application']=@serialize(array());

				$arr_data['product_update_date']=date('Y-m-d H:i:s');

				if($this->_object_product->m_product->update_product($arr_data,$arr_where)){

					if($this->_arr_data['data_content']['authorization']['control']){

						$this->_object_product->session->set_flashdata('add_update_product',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->_object_product->session->set_flashdata('add_update_product',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_data['data_content']['category_product']='';
			$arr_category_product=$this->_object_product->m_category_product->list_category_product_one_menu_admin($this->_menu_class,$this->_object_product->my_layout->sess_lang_admin);
			if(is_array($arr_category_product))
				$this->_arr_data['data_content']['category_product']=$this->_object_product->m_category_product->recursive_category_product_add($arr_category_product,0,'txt_cate_product',element('cate_id',$this->_arr_data['data_content']['product'],''));

			$this->_arr_data['data_content']['product_pattern']=$this->_object_product->m_product_pattern->list_product_pattern($this->_object_product->my_layout->sess_lang_admin);


			/* ----------------------------------------------------------------------------------------------- */

			$this->_object_product->load->Model(array('m_partner','m_application'));

			$this->_arr_data['data_content']['product_partner']=$this->_object_product->m_partner->list_partner('partner',$this->_object_product->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['product_application']=$this->_object_product->m_application->list_application($this->_object_product->my_layout->sess_lang_admin);

			/* ----------------------------------------------------------------------------------------------- */

			$this->_arr_data['data_content']['info_content']=$this->_object_product->language->get_data_product_add_update('update_product',$this->_menu_class,$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_product";

			$arr_sub_menu=$this->_object_product->m_sub_menu_admin->get_sub_menu($this->_menu_class,'update',$this->_object_product->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_product->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_product->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function general_alias(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$this->_object_product->load->helper('general_page');
			$alias_name=$this->_object_product->input->post('alias_name',true);
			echo convert_vi_to_en($alias_name);
		}
		else
			show_404('page');

	}

}

?>