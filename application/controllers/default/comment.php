<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Comment extends CI_Controller{

	public $_arr_data=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array','general_page'));
		$this->load->library(array(DEFAULT_DIR_ROOT.'/language','session','form_validation'));
		$this->load->Model(array('m_comment'));

		$this->form_validation->set_error_delimiters('','');

	}

	//  Xac  nhan hoan thanh
	public function show_comment_product(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$comment_product_news=$this->uri->segment(3,-1000);
			$this->_arr_data['data_content']['comment_product']=$this->m_comment->list_comment_one_product_front_end($comment_product_news);

			$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_comment_show();

			$this->_arr_data['data_content']['info_content']['comment_product_news']=$comment_product_news;
			if(($this->session->userdata('message_comment'.$comment_product_news) != '') && (time() - $this->session->userdata('message_comment'.$comment_product_news) >= 500))
				$this->session->unset_userdata('message_comment'.$comment_product_news);

			$this->load->view(DEFAULT_DIR_ROOT."/view_comment_product",$this->_arr_data['data_content']);
		}
		else
			show_404('page');

	}

	//  Xac  nhan hoan thanh
	public function insert_product(){

		$arr_message=array();
		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(isset($_POST) && $this->form_validation->run('add_comment_front_end')){

				if(trim($this->input->post('txt_comment_captcha',true)) == trim($this->session->userdata('captcha_key_comment'))){

					$arr_data['comment_name']=$this->input->post('txt_comment_name',true);
					$arr_data['comment_email']=$this->input->post('txt_comment_email',true);
					$arr_data['comment_title']=$this->input->post('txt_comment_title',true);
					$arr_data['comment_content']=$this->input->post('txt_comment_content',true);
					$arr_data['comment_surf']=0;
					$arr_data['comment_public']=1;
					$arr_data['comment_product_news']=$this->input->post('txt_comment_product_news',true);
					$arr_data['comment_type']=1;
					$arr_data['comment_create_date']=date('Y-m-d H:i:s');

					if($this->m_comment->insert_comment($arr_data)){

						$this->session->set_userdata('message_comment'.$arr_data['comment_product_news'],time());
						$arr_message[]=lang('message_comment_successful');
					}
					else
						$arr_message[]=lang('message_comment_faild');
				}
				else
					$arr_message[]=lang('error_comment_captcha');
			}
			else{

				if(form_error('txt_comment_name') != '')
					$arr_message[]=form_error('txt_comment_name');

				if(form_error('txt_comment_email') != '')
					$arr_message[]=form_error('txt_comment_email');

				if(form_error('txt_comment_title') != '')
					$arr_message[]=form_error('txt_comment_title');

				if(form_error('txt_comment_captcha') != '')
					$arr_message[]=form_error('txt_comment_captcha');

				if(form_error('txt_comment_content') != '')
					$arr_message[]=form_error('txt_comment_content');
			}

			$this->session->set_userdata('message_insert_comment',$arr_message);
			$this->show_comment_product();
		}
		else
			show_404('page');

	}

}

?>