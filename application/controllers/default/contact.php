<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Contact extends CI_Controller{

	public $_arr_data=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array'));
		$this->load->library(array(DEFAULT_DIR_ROOT.'/my_layout','form_validation'));
		$this->load->Model(array('m_news','m_category_news','m_support'));

		$this->form_validation->set_error_delimiters('','');
		$this->_arr_data=$this->my_layout->set_layout();

	}

	public function index(){

		if(isset($_POST['action_form']) && ($_POST['action_form'] == 'submit_contact') && $this->form_validation->run('submit_contact')){

			$arr_data['contact_company']=$this->input->post('txt_contact_company',true);
			$arr_data['contact_email']=$this->input->post('txt_contact_email',true);
			$arr_data['contact_name']=$this->input->post('txt_contact_name',true);
			$arr_data['contact_address']=$this->input->post('txt_contact_address',true);
			$arr_data['contact_phone']=$this->input->post('txt_contact_phone',true);
			$arr_data['contact_header']=$this->input->post('txt_contact_header',true);
			$arr_data['contact_content']=$this->input->post('txt_contact_content',true);

			$arr_template['data_template']=$arr_data;
			$body=$this->load->view("template/template_contact",$arr_template,true);

			$send_me=false;
			if(isset($_POST['contact_send_me']) && ($_POST['contact_send_me'] == 1))
				$send_me=true;

			error_reporting(E_STRICT);

			if($this->m_support->mailer($arr_data['contact_email'],$arr_data['contact_name'],$arr_data['contact_header'],$body,'txt_contact_attachment',array(1,2),'contact',$this->my_layout->sess_lang_default,$send_me)){
				$this->session->set_flashdata('submit_contact',alert(lang('message_send_mail_success')));
				redirect(current_url());
			}
			else{

				$this->session->set_flashdata('submit_contact',alert(lang('message_send_mail_failed')));
				redirect(current_url());
			}
		}

		$this->_arr_data['data_content']['contact']=$this->m_news->get_news_active_front_end(array(1,2),'contact',$this->my_layout->sess_lang_default);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_contact_index();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_contact";

		if(is_array($this->_arr_data['data_content']['contact']) && !empty($this->_arr_data['data_content']['contact'])){

			if(!$this->session->userdata('count_contact'.element('news_id',$this->_arr_data['data_content']['contact'],'')) || (time() - $this->session->userdata('count_contact'.element('news_id',$this->_arr_data['data_content']['contact'],'')) >= 600)){

				$this->session->set_userdata('count_contact'.element('news_id',$this->_arr_data['data_content']['contact'],''),time());
				$arr_data_contact['news_view']=element('news_view',$this->_arr_data['data_content']['contact'],0) + 1;
				$arr_where_contact['news_id']=element('news_id',$this->_arr_data['data_content']['contact'],'');
				$this->m_news->update_news($arr_data_contact,$arr_where_contact);
			}

			$this->_arr_data['info_home']['facebook_title']=element('news_name',$this->_arr_data['data_content']['contact'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['facebook_description']=element('news_seo_description',$this->_arr_data['data_content']['contact'],'');
			$this->_arr_data['info_home']['facebook_image']="";

			$this->_arr_data['info_home']['title_web']=element('news_name',$this->_arr_data['data_content']['contact'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['keyword_web']=element('news_seo_keyword',$this->_arr_data['data_content']['contact'],'').",".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=element('news_seo_description',$this->_arr_data['data_content']['contact'],'');
		}

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function check_captcha($string_captcha=true){

		if(!(($this->uri->segment(1) == 'contact') && ($this->uri->segment(2) == 'check_captcha'))){

			if(trim($string_captcha) != trim($this->session->userdata('captcha_key_contact'))){

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