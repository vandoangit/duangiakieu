<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Language_admin extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array','general_page'));
		$this->load->library(array(ADMIN_DIR_ROOT.'/language'));

	}

	public function set_lang(){

		$lang_id=$this->uri->segment(3,'vi');
		$this->session->set_userdata($this->language->sess_lang,$lang_id);

		if(isset($_SERVER["HTTP_REFERER"]) && url_exists($_SERVER["HTTP_REFERER"],$_COOKIE))
			redirect($_SERVER["HTTP_REFERER"],'refresh');
		else
			redirect(base_url().ADMIN_DIR_VIRTUAL."/site/panel",'refresh');

	}

}

?>