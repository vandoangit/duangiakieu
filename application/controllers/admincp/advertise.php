<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Advertise extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->library(array(ADMIN_DIR_ROOT.'/advertises',ADMIN_DIR_ROOT.'/category_sub'));

		$display_advertise=array('category'=>true,'active'=>false);
		$this->category_sub->set_config_category('advertise','advertise',$this->advertises->set_config_advertise('advertise',$display_advertise),1);

	}

	public function control(){

		$this->advertises->control_public();

	}

	public function update_order(){

		$this->advertises->update_order_public();

	}

	public function update_public(){

		$this->advertises->update_public_advertise_public();

	}

	public function update_active(){

		$this->advertises->update_active_public();

	}

	public function add(){

		$this->advertises->add_public();

	}

	public function delete(){

		$this->advertises->delete_public();

	}

	public function update(){

		$this->advertises->update_public();

	}

}

?>