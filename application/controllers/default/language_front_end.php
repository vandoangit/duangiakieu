<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Language_front_end extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array','general_page'));
		$this->load->library(array(DEFAULT_DIR_ROOT.'/language'));

	}

	public function index(){

		$lang_id=$this->uri->segment(2,'vi');
		$this->session->set_userdata($this->language->sess_lang,$lang_id);

		if(isset($_SERVER["HTTP_REFERER"]) && url_exists($_SERVER["HTTP_REFERER"],$_COOKIE))
			redirect($_SERVER["HTTP_REFERER"],'refresh');
		else
			redirect(base_url(),'refresh');

	}

}

?>