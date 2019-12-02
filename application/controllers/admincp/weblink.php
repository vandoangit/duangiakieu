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

		$display_weblink=array('category'=>true);
		$this->category_sub->set_config_category('weblink','weblink',$this->weblinks->set_config_weblink('weblink',$display_weblink),1);

	}

	public function control(){

		$this->weblinks->control();

	}

	public function update_order(){

		$this->weblinks->update_order();

	}

	public function update_public(){

		$this->weblinks->update_public_weblink();

	}

	public function add(){

		$this->weblinks->add();

	}

	public function delete(){

		$this->weblinks->delete();

	}

	public function delete_all($arr_where){

		$this->weblinks->delete_all($arr_where);

	}

	public function update(){

		$this->weblinks->update();

	}

	public function category(){

		$this->category_sub->category();

	}

	public function update_category_order(){

		$this->category_sub->update_category_order();

	}

	public function update_category_public(){

		$this->category_sub->update_category_public();

	}

	public function addcategory(){

		$this->category_sub->addcategory();

	}

	public function delete_category(){

		$this->category_sub->delete_category();

	}

	public function upcategory(){

		$this->category_sub->upcategory();

	}

}

?>