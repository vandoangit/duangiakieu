<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Weblink extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->library(array(ADMIN_DIR_ROOT.'/weblinks',ADMIN_DIR_ROOT.'/category_sub'));

		$display_weblink=array('category'=>false);
		$this->category_sub->set_config_category('weblink','weblink',$this->weblinks->set_config_weblink('weblink',$display_weblink),1);

	}

	public function control(){

		$this->weblinks->control_public();

	}

	public function update_order(){

		$this->weblinks->update_order_public();

	}

	public function update_public(){

		$this->weblinks->update_public_weblink_public();

	}

	public function add(){

		$this->weblinks->add_public();

	}

	public function delete(){

		$this->weblinks->delete_public();

	}

	public function delete_all($arr_where){

		$this->weblinks->delete_all_public($arr_where);

	}

	public function update(){

		$this->weblinks->update_public();

	}

}

?>