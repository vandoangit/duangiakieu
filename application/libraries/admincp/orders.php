<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Orders{

	private $_object_order;
	private $_menu_class;
	private $_bool_active;
	private $_arr_data=array();

	public function __construct(){

		$this->_object_order=& get_instance();

		$this->_object_order->load->helper(array('url','form','array'));
		$this->_object_order->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination'));   //my_layout:session,language
		$this->_object_order->load->Model(array('m_order','m_order_detail','m_category_sub','m_method_delivery','m_method_payment'));   //my_layout:m_authorization_group,m_sub_menu_admin
		//$this->_object_order->my_layout->sess_lang_admin:control:7,update_public:1,add:3,update:4

		$this->_object_order->form_validation->set_error_delimiters('','');

		if((!isset($_POST[md5('hominhtri')])) && (!isset($_POST['validateValue'])))
			$this->_arr_data=$this->_object_order->my_layout->set_layout();

	}

	public function set_config_order($menu_class,$bool_active=array('category'=>true)){

		$this->_menu_class=$menu_class;
		$this->_bool_active=$bool_active;
		return $this->_arr_data;

	}

	public function control(){

		if((isset($_POST['checkbox'])) && ($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete')))
			$message_session_flash=$this->delete_all($this->_object_order->input->post('checkbox',true));

		if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'control')){

			$arr_auhorization=array('add','delete','update','control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_order->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_order->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->_object_order->uri->segment(4,'all');
			if($get_select_filter != 'all'){

				$arr_category_id=$this->_object_order->m_category_sub->get_category_sub_id($get_select_filter,$this->_object_order->my_layout->sess_lang_admin);
				$this->_arr_data['data_content']['orders']=$this->_object_order->m_order->list_order_one_category($arr_category_id,$this->_menu_class,$this->_object_order->my_layout->sess_lang_admin);
			}
			else{

				$this->_arr_data['data_content']['orders']=$this->_object_order->m_order->list_order($this->_menu_class,$this->_object_order->my_layout->sess_lang_admin);
			}

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_data['data_content']['info_content']=$this->_object_order->language->get_data_order_control(true,$this->_menu_class,$this->_bool_active);
				$this->_object_order->load->view(ADMIN_DIR_ROOT."/view_order_manager",$this->_arr_data['data_content']);
			}
			else{

				$this->_arr_data['data_content']['category_order']='';
				$arr_category_order=$this->_object_order->m_category_sub->list_category_sub_one_menu_admin($this->_menu_class,$this->_object_order->my_layout->sess_lang_admin);
				if(is_array($arr_category_order))
					$this->_arr_data['data_content']['category_order']=$this->_object_order->m_category_sub->recursive_category_sub_add($arr_category_order,0,'select_category_order',$get_select_filter);

				$this->_arr_data['data_content']['info_content']=$this->_object_order->language->get_data_order_control(false,$this->_menu_class,$this->_bool_active);
				$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_order_manager";

				$this->_arr_data['data_content']['title_function']=$this->_object_order->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false));
				$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false)." ::.";
				$this->_object_order->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function control_public(){

		if((isset($_POST['checkbox'])) && ($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete')))
			$message_session_flash=$this->delete_all_public($this->_object_order->input->post('checkbox',true));

		if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'control')){

			$arr_auhorization=array('add','delete','update','control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_order->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_order->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->_object_order->uri->segment(4,'all');
			if($get_select_filter != 'all'){

				$arr_category_id=$this->_object_order->m_category_sub->get_category_sub_id_public($get_select_filter,$this->_object_order->my_layout->sess_lang_admin);
				$this->_arr_data['data_content']['orders']=$this->_object_order->m_order->list_order_one_category_public($arr_category_id,$this->_menu_class,$this->_object_order->my_layout->sess_lang_admin);
			}
			else{

				$this->_arr_data['data_content']['orders']=$this->_object_order->m_order->list_order_public($this->_menu_class,$this->_object_order->my_layout->sess_lang_admin);
			}

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_data['data_content']['info_content']=$this->_object_order->language->get_data_order_control(true,$this->_menu_class,$this->_bool_active);
				$this->_object_order->load->view(ADMIN_DIR_ROOT."/view_order_manager",$this->_arr_data['data_content']);
			}
			else{

				$this->_arr_data['data_content']['category_order']='';
				$arr_category_order=$this->_object_order->m_category_sub->list_category_sub_one_menu_admin_public($this->_menu_class,$this->_object_order->my_layout->sess_lang_admin);
				if(is_array($arr_category_order))
					$this->_arr_data['data_content']['category_order']=$this->_object_order->m_category_sub->recursive_category_sub_add($arr_category_order,0,'select_category_order',$get_select_filter);

				$this->_arr_data['data_content']['info_content']=$this->_object_order->language->get_data_order_control(false,$this->_menu_class,$this->_bool_active);
				$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_order_manager";

				$this->_arr_data['data_content']['title_function']=$this->_object_order->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false));
				$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_data['data_content']['sub_menu']['control'],false)." ::.";
				$this->_object_order->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function add(){

		if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'add')){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_order->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_order->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_order') && ($this->_object_order->form_validation->run('add_update_order'))){

				$arr_data['order_id']=round((microtime(true) * 100));
				$arr_data['order_name']=$this->_object_order->input->post('txt_order_name',true);
				$arr_data['order_address']=$this->_object_order->input->post('txt_order_address',true);
				$arr_data['order_phone']=$this->_object_order->input->post('txt_order_phone',true);
				$arr_data['order_email']=$this->_object_order->input->post('txt_order_email',true);

				$arr_data['order_total_price']=0;
				$arr_data['cate_id']=$this->_object_order->input->post('txt_cate_order',true);
				$arr_data['delivery_id']=$this->_object_order->input->post('txt_delivery',true);
				$arr_data['payment_id']=$this->_object_order->input->post('txt_payment',true);
				$arr_data['order_create_date']=date('Y-m-d H:i:s');

				$arr_data['order_update_date']=date('Y-m-d H:i:s');

				if($this->_object_order->m_order->insert_order($arr_data)){

					if($this->_arr_data['data_content']['authorization']['control']){

						$this->_object_order->session->set_flashdata('add_update_order',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->_object_order->session->set_flashdata('add_update_order',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}

			$this->_arr_data['data_content']['category_order']='';
			$arr_category_order=$this->_object_order->m_category_sub->list_category_sub_one_menu_admin($this->_menu_class,$this->_object_order->my_layout->sess_lang_admin);
			if(is_array($arr_category_order))
				$this->_arr_data['data_content']['category_order']=$this->_object_order->m_category_sub->recursive_category_sub_add($arr_category_order,0,'txt_cate_order',false);

			$this->_arr_data['data_content']['method_delivery']=$this->_object_order->m_method_delivery->list_delivery($this->_object_order->my_layout->sess_lang_admin);

			$this->_arr_data['data_content']['method_payment']=$this->_object_order->m_method_payment->list_payment($this->_object_order->my_layout->sess_lang_admin);

			$this->_arr_data['data_content']['info_content']=$this->_object_order->language->get_data_order_add_update('add_order',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_order";

			$arr_sub_menu=$this->_object_order->m_sub_menu_admin->get_sub_menu($this->_menu_class,'add',$this->_object_order->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_order->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_order->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function add_public(){

		if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'add')){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_order->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_order->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'add_order') && ($this->_object_order->form_validation->run('add_update_order'))){


				$arr_data['order_id']=round((microtime(true) * 100));
				$arr_data['order_name']=$this->_object_order->input->post('txt_order_name',true);
				$arr_data['order_address']=$this->_object_order->input->post('txt_order_address',true);
				$arr_data['order_phone']=$this->_object_order->input->post('txt_order_phone',true);
				$arr_data['order_email']=$this->_object_order->input->post('txt_order_email',true);

				$arr_data['order_total_price']=0;
				$arr_data['cate_id']=$this->_object_order->input->post('txt_cate_order',true);
				$arr_data['delivery_id']=$this->_object_order->input->post('txt_delivery',true);
				$arr_data['payment_id']=$this->_object_order->input->post('txt_payment',true);
				$arr_data['order_create_date']=date('Y-m-d H:i:s');

				$arr_data['order_update_date']=date('Y-m-d H:i:s');

				if($this->_object_order->m_order->insert_order($arr_data)){

					if($this->_arr_data['data_content']['authorization']['control']){

						$this->_object_order->session->set_flashdata('add_update_order',alert(lang('message_add_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->_object_order->session->set_flashdata('add_update_order',alert(lang('message_add_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_add_faild'));
			}

			$this->_arr_data['data_content']['category_order']='';
			$arr_category_order=$this->_object_order->m_category_sub->list_category_sub_one_menu_admin_public($this->_menu_class,$this->_object_order->my_layout->sess_lang_admin);
			if(is_array($arr_category_order))
				$this->_arr_data['data_content']['category_order']=$this->_object_order->m_category_sub->recursive_category_sub_add($arr_category_order,0,'txt_cate_order',false);

			$this->_arr_data['data_content']['method_delivery']=$this->_object_order->m_method_delivery->list_delivery($this->_object_order->my_layout->sess_lang_admin);

			$this->_arr_data['data_content']['method_payment']=$this->_object_order->m_method_payment->list_payment($this->_object_order->my_layout->sess_lang_admin);

			$this->_arr_data['data_content']['info_content']=$this->_object_order->language->get_data_order_add_update('add_order',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_order";

			$arr_sub_menu=$this->_object_order->m_sub_menu_admin->get_sub_menu($this->_menu_class,'add',$this->_object_order->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_order->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_order->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function delete(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete')){

				$arr_where_delete['order_id']=$this->_object_order->uri->segment(5,true);
				if(!$this->_object_order->m_order->delete_order($arr_where_delete))
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

			if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete')){

				$arr_where_delete['order_id']=$this->_object_order->uri->segment(5,true);
				if(!$this->_object_order->m_order->delete_order($arr_where_delete))
					echo "delete_faild";
				else
					$this->control_public();
			}
		}
		else
			show_404('page');

	}

	public function delete_all($arr_where){

		if(!(($this->_object_order->uri->segment(2) == $this->_menu_class) && ($this->_object_order->uri->segment(3) == 'delete_all'))){

			if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){
					$arr_where_delete['order_id']=$key;
					if(!$this->_object_order->m_order->delete_order($arr_where_delete))
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

		if(!(($this->_object_order->uri->segment(2) == $this->_menu_class) && ($this->_object_order->uri->segment(3) == 'delete_all'))){

			if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){
					$arr_where_delete['order_id']=$key;
					if(!$this->_object_order->m_order->delete_order($arr_where_delete))
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

		$this->_arr_data['data_content']['order']=$this->_object_order->m_order->get_order($this->_object_order->uri->segment(4,true),$this->_menu_class,$this->_object_order->my_layout->sess_lang_admin);

		if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($this->_arr_data['data_content']['order']) && !empty($this->_arr_data['data_content']['order'])){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_order->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_order->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_order') && ($this->_object_order->form_validation->run('add_update_order'))){

				$arr_where['order_id']=$this->_object_order->uri->segment(4,true);

				$arr_data['order_name']=$this->_object_order->input->post('txt_order_name',true);
				$arr_data['order_address']=$this->_object_order->input->post('txt_order_address',true);
				$arr_data['order_phone']=$this->_object_order->input->post('txt_order_phone',true);
				$arr_data['order_email']=$this->_object_order->input->post('txt_order_email',true);

				$arr_data['cate_id']=$this->_object_order->input->post('txt_cate_order',true);
				$arr_data['delivery_id']=$this->_object_order->input->post('txt_delivery',true);
				$arr_data['payment_id']=$this->_object_order->input->post('txt_payment',true);
				$arr_data['order_update_date']=date('Y-m-d H:i:s');

				if($this->_object_order->m_order->update_order($arr_data,$arr_where)){

					if($this->_arr_data['data_content']['authorization']['control']){

						$this->_object_order->session->set_flashdata('add_update_order',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->_object_order->session->set_flashdata('add_update_order',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_data['data_content']['category_order']='';
			$arr_category_order=$this->_object_order->m_category_sub->list_category_sub_one_menu_admin($this->_menu_class,$this->_object_order->my_layout->sess_lang_admin);
			if(is_array($arr_category_order))
				$this->_arr_data['data_content']['category_order']=$this->_object_order->m_category_sub->recursive_category_sub_add($arr_category_order,0,'txt_cate_order',element('cate_id',$this->_arr_data['data_content']['order'],''));

			$this->_arr_data['data_content']['method_delivery']=$this->_object_order->m_method_delivery->list_delivery($this->_object_order->my_layout->sess_lang_admin);

			$this->_arr_data['data_content']['method_payment']=$this->_object_order->m_method_payment->list_payment($this->_object_order->my_layout->sess_lang_admin);

			$this->_arr_data['data_content']['info_content']=$this->_object_order->language->get_data_order_add_update('update_order',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_order";

			$arr_sub_menu=$this->_object_order->m_sub_menu_admin->get_sub_menu($this->_menu_class,'update',$this->_object_order->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_order->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_order->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function update_public(){

		$this->_arr_data['data_content']['order']=$this->_object_order->m_order->get_order_public($this->_object_order->uri->segment(4,true),$this->_menu_class,$this->_object_order->my_layout->sess_lang_admin);

		if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'update') && is_array($this->_arr_data['data_content']['order']) && !empty($this->_arr_data['data_content']['order'])){

			$arr_auhorization=array('control');
			foreach($arr_auhorization as $key=> $value){
				$this->_arr_data['data_content']['authorization'][$value]=$this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,$value);
				$this->_arr_data['data_content']['sub_menu'][$value]=$this->_object_order->m_sub_menu_admin->get_sub_menu($this->_menu_class,$value,$this->_object_order->my_layout->sess_lang_admin);
			}

			if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'update_order') && ($this->_object_order->form_validation->run('add_update_order'))){

				$arr_where['order_id']=$this->_object_order->uri->segment(4,true);

				$arr_data['order_name']=$this->_object_order->input->post('txt_order_name',true);
				$arr_data['order_address']=$this->_object_order->input->post('txt_order_address',true);
				$arr_data['order_phone']=$this->_object_order->input->post('txt_order_phone',true);
				$arr_data['order_email']=$this->_object_order->input->post('txt_order_email',true);

				$arr_data['cate_id']=$this->_object_order->input->post('txt_cate_order',true);
				$arr_data['delivery_id']=$this->_object_order->input->post('txt_delivery',true);
				$arr_data['payment_id']=$this->_object_order->input->post('txt_payment',true);
				$arr_data['order_update_date']=date('Y-m-d H:i:s');

				if($this->_object_order->m_order->update_order($arr_data,$arr_where)){

					if($this->_arr_data['data_content']['authorization']['control']){

						$this->_object_order->session->set_flashdata('add_update_order',alert(lang('message_update_success')));
						redirect(base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$this->_arr_data['data_content']['sub_menu']['control'],false)."/".element('sub_menu_function',$this->_arr_data['data_content']['sub_menu']['control'],false));
					}
					else{

						$this->_object_order->session->set_flashdata('add_update_order',alert(lang('message_update_success')));
						redirect(current_url());
					}
				}
				else
					$message_session_flash=alert(lang('message_update_faild'));
			}

			$this->_arr_data['data_content']['category_order']='';
			$arr_category_order=$this->_object_order->m_category_sub->list_category_sub_one_menu_admin_public($this->_menu_class,$this->_object_order->my_layout->sess_lang_admin);
			if(is_array($arr_category_order))
				$this->_arr_data['data_content']['category_order']=$this->_object_order->m_category_sub->recursive_category_sub_add($arr_category_order,0,'txt_cate_order',element('cate_id',$this->_arr_data['data_content']['order'],''));

			$this->_arr_data['data_content']['method_delivery']=$this->_object_order->m_method_delivery->list_delivery($this->_object_order->my_layout->sess_lang_admin);

			$this->_arr_data['data_content']['method_payment']=$this->_object_order->m_method_payment->list_payment($this->_object_order->my_layout->sess_lang_admin);

			$this->_arr_data['data_content']['info_content']=$this->_object_order->language->get_data_order_add_update('update_order',$this->_bool_active);
			$this->_arr_data['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
			$this->_arr_data['template_view_content']=ADMIN_DIR_ROOT."/view_add_update_order";

			$arr_sub_menu=$this->_object_order->m_sub_menu_admin->get_sub_menu($this->_menu_class,'update',$this->_object_order->my_layout->sess_lang_admin);
			$this->_arr_data['data_content']['title_function']=$this->_object_order->exsec_string->str_ucwords(element('sub_menu_name',$arr_sub_menu,''));
			$this->_arr_data['info_home']['home_title']=".:: ".element('sub_menu_name',$arr_sub_menu,'')." ::.";
			$this->_object_order->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function order_detail(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'control')){

				$order_id=$this->_object_order->uri->segment(4,true);
				$this->_arr_data['data_content']['order']=$this->_object_order->m_order->get_order_method($order_id,$this->_menu_class,$this->_object_order->my_layout->sess_lang_admin);
				$this->_arr_data['data_content']['order_detail']=$this->_object_order->m_order_detail->list_order_detail_one_order($order_id);
				$this->_arr_data['data_content']['info_content']=$this->_object_order->language->get_data_order_detail_control();
				$this->_object_order->load->view(ADMIN_DIR_ROOT."/view_order_detail_manager",$this->_arr_data['data_content']);
			}
		}
		else
			show_404('page');

	}

	public function update_order_detail_total(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$order_detail_id=$this->_object_order->uri->segment(4,true);
			$order_detail_number=$this->_object_order->uri->segment(5,true);

			if(!preg_match("/^[1-9][0-9]*$/i",$order_detail_number)){

				echo "is_numeric";
				exit();
			}

			$order_detail=$this->_object_order->m_order_detail->get_order_detail($order_detail_id);

			if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'control') && is_array($order_detail)){

				$arr_where_detail['order_detail_id']=$order_detail_id;
				$arr_data_detail['order_detail_number']=$order_detail_number;
				if($this->_object_order->m_order_detail->update_order_detail($arr_data_detail,$arr_where_detail)){

					$arr_total_order=$this->_object_order->m_order_detail->total_money_order(element('order_id',$order_detail));
					$arr_where['order_id']=element('order_id',$order_detail);
					$arr_data['order_total_price']=element('total_order',$arr_total_order);
					if($this->_object_order->m_order->update_order($arr_data,$arr_where)){

						echo $order_detail_number."hominhtri".number_format(element('order_detail_price',$order_detail,'0') * $order_detail_number)." VNĐhominhtri".number_format(element('total_order',$arr_total_order,'0'))." VNĐ";
						return true;
					}
				}

				echo "update_faild";
				return false;
			}
		}
		else
			show_404('page');

	}

	public function insert_order_detail(){

		$this->_object_order->load->Model('m_product');
		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$order_id=$this->_object_order->uri->segment(4,true);
			$order_detail_code=$this->_object_order->uri->segment(5,true);
			$order_detail_number=$this->_object_order->uri->segment(6,true);

			if(!preg_match("/^([-a-z0-9_-])+$/i",$order_detail_code)){

				echo "error_order_detail_code";
				exit();
			}

			if(!preg_match("/^[1-9][0-9]*$/i",$order_detail_number)){

				echo "error_order_detail_number";
				exit();
			}

			if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'control')){

				$product=$this->_object_order->m_product->get_product_order($order_detail_code);

				if(is_array($product) && (!empty($product))){

					if($this->_object_order->m_order_detail->check_product_id_order($order_detail_code,$order_id)){

						$arr_where_order_detail['order_detail_code']=$order_detail_code;
						$arr_data_order_detail['order_detail_number']=$order_detail_number;
						if(!$this->_object_order->m_order_detail->update_order_detail($arr_data_order_detail,$arr_where_order_detail)){

							echo "insert_faild";
							exit();
						}
					}
					else{

						$arr_data_order_detail['order_detail_code']=$order_detail_code;
						$arr_data_order_detail['order_detail_name']=element('product_name',$product,'');
						$arr_data_order_detail['order_detail_price']=element('product_price',$product,'');
						;
						$arr_data_order_detail['order_detail_number']=$order_detail_number;
						$arr_data_order_detail['order_id']=$order_id;
						if(!$this->_object_order->m_order_detail->insert_order_detail($arr_data_order_detail)){

							echo "insert_faild";
							exit();
						}
					}

					$arr_total_order=$this->_object_order->m_order_detail->total_money_order($order_id);
					$arr_where['order_id']=$order_id;
					$arr_data['order_total_price']=element('total_order',$arr_total_order);
					if($this->_object_order->m_order->update_order($arr_data,$arr_where))
						$this->order_detail();
					else
						echo "insert_faild";
				}
				else
					echo "insert_faild";
			}
		}
		else
			show_404('page');

	}

	public function delete_order_detail(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$order_id=$this->_object_order->uri->segment(4,true);
			$order_detail_id=$this->_object_order->uri->segment(5,true);

			if($this->_object_order->m_authorization_group->check_authorization_one_menu($this->_menu_class,'control')){

				$arr_where_delete['order_detail_id']=$order_detail_id;
				if(!$this->_object_order->m_order_detail->delete_order_detail($arr_where_delete))
					echo "delete_faild";
				else{

					$arr_total_order=$this->_object_order->m_order_detail->total_money_order($order_id);
					$arr_where['order_id']=$order_id;
					$arr_data['order_total_price']=element('total_order',$arr_total_order);
					if($this->_object_order->m_order->update_order($arr_data,$arr_where))
						$this->order_detail();
					else
						echo "delete_faild";
				}
			}
		}
		else
			show_404('page');

	}

}

?>