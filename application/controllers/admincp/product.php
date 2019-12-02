<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Product extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->library(array(ADMIN_DIR_ROOT.'/products',ADMIN_DIR_ROOT.'/category_product'));

		$display_product=array('category'=>true,'partner'=>true,'application'=>false,'price'=>true,'price_old'=>true,'quantity'=>false,'color'=>false,'headline'=>true,'prominent'=>true);
		$this->category_product->set_config_category('product','product',$this->products->set_config_product('product',$display_product),true);

	}

	public function control(){

		$this->products->control();

	}

	public function update_order(){

		$this->products->update_order();

	}

	public function update_public(){

		$this->products->update_public();

	}

	public function update_prominent(){

		$this->products->update_prominent();

	}

	public function add(){

		$this->products->add();

	}

	public function check_product_id(){

		$this->products->check_product_id();

	}

	public function check_product_id1($product_id=true){

		return $this->products->check_product_id1($product_id);

	}

	public function product_detail(){

		$this->products->product_detail();

	}

	public function delete(){

		$this->products->delete();

	}

	public function update(){

		$this->products->update();

	}

	public function general_alias(){

		$this->products->general_alias();

	}

	public function category(){

		$this->category_product->category();

	}

	public function update_category_order(){

		$this->category_product->update_category_order();

	}

	public function update_category_public(){

		$this->category_product->update_category_public();

	}

	public function addcategory(){

		$this->category_product->addcategory();

	}

	public function delete_category(){

		$this->category_product->delete_category();

	}

	public function upcategory(){

		$this->category_product->upcategory();

	}

	public function general_category_alias(){

		$this->category_product->general_category_alias();

	}

}

?>