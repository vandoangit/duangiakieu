<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Orderproduct extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->library(array(ADMIN_DIR_ROOT.'/orders',ADMIN_DIR_ROOT.'/category_sub'));

		$display_order=array('category'=>true);
		$this->category_sub->set_config_category('orderproduct','order',$this->orders->set_config_order('orderproduct',$display_order),1);

	}

	public function control(){

		$this->orders->control_public();

	}

	public function add(){

		$this->orders->add_public();

	}

	public function delete(){

		$this->orders->delete_public();

	}

	public function update(){

		$this->orders->update_public();

	}

	public function order_detail(){

		$this->orders->order_detail();

	}

	public function update_order_detail_total(){

		$this->orders->update_order_detail_total();

	}

	public function insert_order_detail(){

		$this->orders->insert_order_detail();

	}

	public function delete_order_detail(){

		$this->orders->delete_order_detail();

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