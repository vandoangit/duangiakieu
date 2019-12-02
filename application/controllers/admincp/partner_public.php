<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Partner extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->library(array(ADMIN_DIR_ROOT.'/partners',ADMIN_DIR_ROOT.'/category_sub'));

		$display_partner=array('alias'=>true,'category'=>true,'link'=>true,'info'=>true);
		$this->category_sub->set_config_category('partner','partner',$this->partners->set_config_partner('partner',$display_partner),1);

	}

	public function control(){

		$this->partners->control();

	}

	public function update_order(){

		$this->partners->update_order();

	}

	public function update_public(){

		$this->partners->update_public_partner();

	}

	public function add(){

		$this->partners->add();

	}

	public function delete(){

		$this->partners->delete();

	}

	public function delete_all($arr_where){

		$this->partners->delete_all($arr_where);

	}

	public function update(){

		$this->partners->update();

	}

	public function general_alias(){

		$this->partners->general_alias();

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