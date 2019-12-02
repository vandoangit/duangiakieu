<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Video extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->library(array(ADMIN_DIR_ROOT.'/videos',ADMIN_DIR_ROOT.'/category_sub'));

		$display_video=array('alias'=>false,'category'=>false,'description'=>false,'active'=>false);
		$this->category_sub->set_config_category('video','video',$this->videos->set_config_video('video',$display_video),1);

	}

	public function control(){

		$this->videos->control_public();

	}

	public function update_order(){

		$this->videos->update_order_public();

	}

	public function update_public(){

		$this->videos->update_public_video_public();

	}

	public function update_active(){

		$this->videos->update_active_public();

	}

	public function add(){

		$this->videos->add_public();

	}

	public function delete(){

		$this->videos->delete_public();

	}

	public function update(){

		$this->videos->update_public();

	}

	public function general_alias(){

		$this->videos->general_alias();

	}

}

?>