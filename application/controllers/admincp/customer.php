<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Customer extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->library(array(ADMIN_DIR_ROOT.'/news',ADMIN_DIR_ROOT.'/category_news'));

		$display_news=array('category'=>false,'description'=>false,'image'=>false,'active'=>true);
		$this->category_news->set_config_category('customer','news',$this->news->set_config_news('customer',$display_news),1);

	}

	public function control(){

		$this->news->control_public();

	}

	public function update_order(){

		$this->news->update_order_public();

	}

	public function update_public(){

		$this->news->update_public_news_public();

	}

	public function update_active(){

		$this->news->update_active_public();

	}

	public function add(){

		$this->news->add_public();

	}

	public function delete(){

		$this->news->delete_public();

	}

	public function update(){

		$this->news->update_public();

	}

	public function general_alias(){

		$this->news->general_alias();

	}

}

?>