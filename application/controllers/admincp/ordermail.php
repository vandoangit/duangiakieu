<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Ordermail extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->library(array(ADMIN_DIR_ROOT.'/supports',ADMIN_DIR_ROOT.'/category_sub'));

		$display_support=array('category'=>false,'info'=>false);
		$this->category_sub->set_config_category('ordermail','support',$this->supports->set_config_support('ordermail',$display_support),1);

	}

	public function control(){

		$this->supports->control_public();

	}

	public function update_order(){

		$this->supports->update_order_public();

	}

	public function update_public(){

		$this->supports->update_public_support_public();

	}

	public function add(){

		$this->supports->add_public();

	}

	public function delete(){

		$this->supports->delete_public();

	}

	public function update(){

		$this->supports->update_public();

	}

	public function check_validation_support_nick($support_nick=true){

		return $this->supports->check_validation_support_nick($support_nick);

	}

}

?>