<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Contact extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->library(array(ADMIN_DIR_ROOT.'/news_other',ADMIN_DIR_ROOT.'/category_news'));
		$this->load->library(array(ADMIN_DIR_ROOT.'/supports_other',ADMIN_DIR_ROOT.'/category_sub'));

		$display_news_other=array('category'=>false,'description'=>false,'image'=>false,'active'=>true);
		$this->category_news->set_config_category('contact','news',$this->news_other->set_config_news_other('contact',$display_news_other),1);

		$display_support_other=array('category'=>false);
		$this->supports_other->set_config_support_other('contact',$display_support_other);

	}

	public function article(){

		$this->news_other->article_public();

	}

	public function update_article_order(){

		$this->news_other->update_article_order_public();

	}

	public function update_article_public(){

		$this->news_other->update_article_public_public();

	}

	public function update_article_active(){

		$this->news_other->update_article_active_public();

	}

	public function addarticle(){

		$this->news_other->addarticle_public();

	}

	public function delete_article(){

		$this->news_other->delete_article_public();

	}

	public function uparticle(){

		$this->news_other->uparticle_public();

	}

	public function general_alias(){

		$this->news_other->general_alias();

	}

	public function email(){

		$this->supports_other->email_public();

	}

	public function update_email_order(){

		$this->supports_other->update_email_order_public();

	}

	public function update_email_public(){

		$this->supports_other->update_email_public_public();

	}

	public function addemail(){

		$this->supports_other->addemail_public();

	}

	public function delete_email(){

		$this->supports_other->delete_email_public();

	}

	public function upemail(){

		$this->supports_other->upemail_public();

	}

	public function check_validation_support_nick($support_nick=true){

		return $this->supports_other->check_validation_support_nick($support_nick);

	}

}

?>