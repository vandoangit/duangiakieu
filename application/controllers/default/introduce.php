<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Introduce extends CI_Controller{

	public $_arr_data=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array'));
		$this->load->library(array(DEFAULT_DIR_ROOT.'/my_layout','form_validation','session'));
		$this->load->Model(array('m_news','m_category_news','m_video','m_support'));

		$this->form_validation->set_error_delimiters('','');
		$this->_arr_data=$this->my_layout->set_layout();

	}

	public function about(){

		//$this->_arr_data['data_content']['video']=$this->m_video->show_video_active(array(13,14),'video',$this->my_layout->sess_lang_default,330,240);

		$this->_arr_data['data_content']['introduce']=$this->m_news->get_news_active_front_end(array(3,4),'introduce',$this->my_layout->sess_lang_default);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_intro_about();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_introduce_about";

		if(is_array($this->_arr_data['data_content']['introduce']) && !empty($this->_arr_data['data_content']['introduce'])){

			if(!$this->session->userdata('count_introduce'.element('news_id',$this->_arr_data['data_content']['introduce'],'')) || (time() - $this->session->userdata('count_introduce'.element('news_id',$this->_arr_data['data_content']['introduce'],'')) >= 600)){

				$this->session->set_userdata('count_introduce'.element('news_id',$this->_arr_data['data_content']['introduce']),time());
				$arr_data_intro['news_view']=element('news_view',$this->_arr_data['data_content']['introduce'],0) + 1;
				$arr_where_intro['news_id']=element('news_id',$this->_arr_data['data_content']['introduce'],'');
				$this->m_news->update_news($arr_data_intro,$arr_where_intro);
			}

			$this->_arr_data['info_home']['facebook_title']=element('news_name',$this->_arr_data['data_content']['introduce'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['facebook_description']=element('news_seo_description',$this->_arr_data['data_content']['introduce'],'');
			$this->_arr_data['info_home']['facebook_image']="";

			$this->_arr_data['info_home']['title_web']=element('news_name',$this->_arr_data['data_content']['introduce'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['keyword_web']=element('news_seo_keyword',$this->_arr_data['data_content']['introduce'],'').",".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=element('news_seo_description',$this->_arr_data['data_content']['introduce'],'');
		}

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function service_other(){

		$this->_arr_data['data_content']['service']=$this->m_news->get_news_active_front_end(array(5,6),'service',$this->my_layout->sess_lang_default);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_intro_service();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_introduce_service";

		if(is_array($this->_arr_data['data_content']['service']) && !empty($this->_arr_data['data_content']['service'])){

			if(!$this->session->userdata('count_service'.element('news_id',$this->_arr_data['data_content']['service'],'')) || (time() - $this->session->userdata('count_service'.element('news_id',$this->_arr_data['data_content']['service'],'')) >= 600)){

				$this->session->set_userdata('count_service'.element('news_id',$this->_arr_data['data_content']['service'],''),time());
				$arr_data_service['news_view']=element('news_view',$this->_arr_data['data_content']['service'],0) + 1;
				$arr_where_service['news_id']=element('news_id',$this->_arr_data['data_content']['service'],'');
				$this->m_news->update_news($arr_data_service,$arr_where_service);
			}

			$this->_arr_data['info_home']['facebook_title']=element('news_name',$this->_arr_data['data_content']['service'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['facebook_description']=element('news_seo_description',$this->_arr_data['data_content']['service'],'');
			$this->_arr_data['info_home']['facebook_image']="";

			$this->_arr_data['info_home']['title_web']=element('news_name',$this->_arr_data['data_content']['service'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['keyword_web']=element('news_seo_keyword',$this->_arr_data['data_content']['service'],'').",".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=element('news_seo_description',$this->_arr_data['data_content']['service'],'');
		}

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function service(){

		if(isset($_POST['action_form']) && ($_POST['action_form'] == 'submit_service') && $this->form_validation->run('submit_service')){

			$arr_data['service_company']=$this->input->post('txt_service_company',true);
			$arr_data['service_email']=$this->input->post('txt_service_email',true);
			$arr_data['service_name']=$this->input->post('txt_service_name',true);
			$arr_data['service_address']=$this->input->post('txt_service_address',true);
			$arr_data['service_phone']=$this->input->post('txt_service_phone',true);
			$arr_data['service_header']=$this->input->post('txt_service_header',true);
			$arr_data['service_content']=$this->input->post('txt_service_content',true);

			$arr_template['data_template']=$arr_data;
			$body=$this->load->view("template/template_service",$arr_template,true);

			$send_me=false;
			if(isset($_POST['service_send_me']) && ($_POST['service_send_me'] == 1))
				$send_me=true;

			error_reporting(E_STRICT);

			if($this->m_support->mailer($arr_data['service_email'],$arr_data['service_name'],$arr_data['service_header'],$body,'txt_service_attachment',array(1,2),'contact',$this->my_layout->sess_lang_default,$send_me)){
				$this->session->set_flashdata('submit_service',alert(lang('message_send_mail_success')));
				redirect(current_url());
			}
			else{

				$this->session->set_flashdata('submit_service',alert(lang('message_send_mail_failed')));
				redirect(current_url());
			}
		}

		$this->_arr_data['data_content']['service']=$this->m_news->get_news_active_front_end(array(5,6),'service',$this->my_layout->sess_lang_default);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_intro_service();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_introduce_service";

		if(is_array($this->_arr_data['data_content']['service']) && !empty($this->_arr_data['data_content']['service'])){

			if(!$this->session->userdata('count_service'.element('news_id',$this->_arr_data['data_content']['service'],'')) || (time() - $this->session->userdata('count_service'.element('news_id',$this->_arr_data['data_content']['service'],'')) >= 600)){

				$this->session->set_userdata('count_service'.element('news_id',$this->_arr_data['data_content']['service'],''),time());
				$arr_data_service['news_view']=element('news_view',$this->_arr_data['data_content']['service'],0) + 1;
				$arr_where_service['news_id']=element('news_id',$this->_arr_data['data_content']['service'],'');
				$this->m_news->update_news($arr_data_service,$arr_where_service);
			}

			$this->_arr_data['info_home']['facebook_title']=element('news_name',$this->_arr_data['data_content']['service'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['facebook_description']=element('news_seo_description',$this->_arr_data['data_content']['service'],'');
			$this->_arr_data['info_home']['facebook_image']="";

			$this->_arr_data['info_home']['title_web']=element('news_name',$this->_arr_data['data_content']['service'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['keyword_web']=element('news_seo_keyword',$this->_arr_data['data_content']['service'],'').",".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=element('news_seo_description',$this->_arr_data['data_content']['service'],'');
		}

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function customer(){

		$this->_arr_data['data_content']['customer']=$this->m_news->get_news_active_front_end(array(9,10),'customer',$this->my_layout->sess_lang_default);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_intro_customer();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_introduce_customer";

		if(is_array($this->_arr_data['data_content']['customer']) && !empty($this->_arr_data['data_content']['customer'])){

			if(!$this->session->userdata('count_customer'.element('news_id',$this->_arr_data['data_content']['customer'],'')) || (time() - $this->session->userdata('count_customer'.element('news_id',$this->_arr_data['data_content']['customer'],'')) >= 600)){

				$this->session->set_userdata('count_customer'.element('news_id',$this->_arr_data['data_content']['customer']),time());
				$arr_data_intro['news_view']=element('news_view',$this->_arr_data['data_content']['customer'],0) + 1;
				$arr_where_intro['news_id']=element('news_id',$this->_arr_data['data_content']['customer'],'');
				$this->m_news->update_news($arr_data_intro,$arr_where_intro);
			}

			$this->_arr_data['info_home']['facebook_title']=element('news_name',$this->_arr_data['data_content']['customer'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['facebook_description']=element('news_seo_description',$this->_arr_data['data_content']['customer'],'');
			$this->_arr_data['info_home']['facebook_image']="";

			$this->_arr_data['info_home']['title_web']=element('news_name',$this->_arr_data['data_content']['customer'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['keyword_web']=element('news_seo_keyword',$this->_arr_data['data_content']['customer'],'').",".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=element('news_seo_description',$this->_arr_data['data_content']['customer'],'');
		}

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function check_captcha($string_captcha=true){

		if(!(($this->uri->segment(1) == 'introduce') && ($this->uri->segment(2) == 'check_captcha'))){

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