<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Article extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->library(array(ADMIN_DIR_ROOT.'/news',ADMIN_DIR_ROOT.'/category_news'));

		$display_news=array('category'=>false,'description'=>true,'image'=>true,'active'=>false);
		$this->category_news->set_config_category('article','news',$this->news->set_config_news('article',$display_news),1);

	}

	public function control(){

		$this->news->control();

	}

	public function update_order(){

		$this->news->update_order();

	}

	public function update_public(){

		$this->news->update_public_news();

	}

	public function add(){

		$this->news->add();

	}

	public function delete(){

		$this->news->delete();

	}

	public function update(){

		$this->news->update();

	}

	public function general_alias(){

		$this->news->general_alias();

	}

	public function category(){

		$this->category_news->category();

	}

	public function update_category_order(){

		$this->category_news->update_category_order();

	}

	public function update_category_public(){

		$this->category_news->update_category_public();

	}

	public function addcategory(){

		$this->category_news->addcategory();

	}

	public function delete_category(){

		$this->category_news->delete_category();

	}

	public function upcategory(){

		$this->category_news->upcategory();

	}

	public function general_category_alias(){

		$this->category_news->general_category_alias();

	}

}

?>