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

		$display_partner=array('alias'=>true,'category'=>false,'link'=>false,'info'=>false);
		$this->category_sub->set_config_category('partner','partner',$this->partners->set_config_partner('partner',$display_partner),1);

	}

	public function control(){

		$this->partners->control_public();

	}

	public function update_order(){

		$this->partners->update_order_public();

	}

	public function update_public(){

		$this->partners->update_public_partner_public();

	}

	public function add(){

		$this->partners->add_public();

	}

	public function delete(){

		$this->partners->delete_public();

	}

	public function delete_all($arr_where){

		$this->partners->delete_all_public($arr_where);

	}

	public function update(){

		$this->partners->update_public();

	}

	public function general_alias(){

		$this->partners->general_alias();

	}

}

?>