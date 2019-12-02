<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

class Custom_cart{

	private $_product_id_rules='\.a-z0-9_-';
	private $_product_name_rules='\.\:\-_ a-z0-9';
	private $_object_custom_cart;
	private $_custom_cart_content=array();
	public $session_custom_cart="cart_custom_content";

	public function __construct($params=array()){

		$this->_object_custom_cart=&get_instance();

		$config=array();
		if(count($params) > 0)
			foreach($params as $key=> $val)
				$config[$key]=$val;

		$this->_object_custom_cart->load->library('session',$config);

		if($this->_object_custom_cart->session->userdata($this->session_custom_cart) !== FALSE){

			$this->_custom_cart_content=$this->_object_custom_cart->session->userdata($this->session_custom_cart);
		}
		else{

			$this->_custom_cart_content['cart_total']=0;
			$this->_custom_cart_content['total_items']=0;
		}

		log_message('debug',"Cart Class Initialized");

	}

	/* ----------------------------- Empty Cart --------------------------------
	  | Param:no
	  | Result:return true if empty cart else return false
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function empty_cart(){

		if(count($this->_custom_cart_content) <= 2)
			return true;

		return false;

	}

	/* -------------------------- Total Money Cart -----------------------------
	  | Param:no
	  | Result:return Total Money
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function total_money_cart(){

		return $this->_custom_cart_content['cart_total'];

	}

	/* --------------------------- Total Item Cart -----------------------------
	  | Param:no
	  | Result:return Total Item
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function total_item_cart(){

		return $this->_custom_cart_content['total_items'];

	}

	/* ----------------------------- Content Cart ------------------------------
	  | Param:no
	  | Result:return Content
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function content_cart(){

		$cart=$this->_custom_cart_content;
		unset($cart['total_items']);
		unset($cart['cart_total']);

		return $cart;

	}

	/* --------------------------- Has Option Cart -----------------------------
	  | Param:rowid
	  | Result:return true if isset Option else return false;
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function has_option_cart($rowid=''){

		if(!isset($this->_custom_cart_content[$rowid]['options']) || count($this->_custom_cart_content[$rowid]['options']) === 0)
			return FALSE;

		return TRUE;

	}

	/* -------------------------- Product Option Cart --------------------------
	  | Param:rowid
	  | Result:return array Option of Item
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function product_option_cart($rowid=''){

		if(!isset($this->_custom_cart_content[$rowid]['options']))
			return array();

		return $this->_custom_cart_content[$rowid]['options'];

	}

	/* ---------------------------- Format Number ------------------------------
	  | Param:n
	  | Result:
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function format_number($n=''){

		if($n == '')
			return '';

		$n=trim(preg_replace('/([^0-9\.])/i','',$n));

		return number_format($n,2,'.',',');

	}

	/* ----------------------------- Destroy Cart ------------------------------
	  | Param:no
	  | Result:no
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function destroy_cart(){

		unset($this->_custom_cart_content);
		$this->_custom_cart_content['cart_total']=0;
		$this->_custom_cart_content['total_items']=0;
		$this->_object_custom_cart->session->unset_userdata($this->session_custom_cart);

	}

	/* --------------------------- Insert Cart Action --------------------------
	  | Param:$items=array(
	  |                       cart_id         =>product_id,
	  |                       cart_quantity   =>product_quantity,
	  |                       cart_price      =>product_price,
	  |                       cart_name       =>product_name,
	  |                       options          =>''
	  |                   )
	  |
	  |                   or mutil $mutil_items=array($items,$items,$items,$items)
	  |
	  |
	  | Result:return true if insert successful else false
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function insert_cart($items=array()){

		if(!is_array($items) || count($items) == 0){

			log_message('error','The insert method must be passed an array containing data.');
			return FALSE;
		}

		$save_cart=FALSE;
		if(isset($items['cart_id'])){

			if($this->_insert_cart($items) == TRUE)
				$save_cart=TRUE;
		}
		else{

			foreach($items as $val){
				if(is_array($val) && isset($val['cart_id']))
					if($this->_insert_cart($val) == TRUE)
						$save_cart=TRUE;
			}
		}

		if($save_cart == TRUE){

			$this->_save_cart();
			return TRUE;
		}

		return FALSE;

	}

	/* ------------------------------ Delete Cart ------------------------------
	  | Param:$items=rowid or mutil $mutil_items=array($items,$items,$items,$items)
	  | Result:return true if delete successful else false
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function delete_cart($items=''){

		$save_cart=FALSE;
		if(!is_array($items)){

			if($this->_update_cart(array('rowid'=>$items,'cart_quantity'=>0)) == TRUE)
				$save_cart=TRUE;
		}
		else if(count($items) > 0){

			foreach($items as $val){
				if(!is_array($val))
					if($this->_update_cart(array('rowid'=>$val,'cart_quantity'=>0)) == TRUE)
						$save_cart=TRUE;
			}
		}

		if($save_cart == TRUE){

			$this->_save_cart();
			return TRUE;
		}

		return FALSE;

	}

	/* -------------------------- Update Cart Action ---------------------------
	  | Param:$items=array(
	  |                       rowid           =>md5(product_id),
	  |                       cart_quantity   =>product_quantity
	  |                   )
	  |
	  |                   or mutil $mutil_items=array($items,$items,$items,$items)
	  |
	  |
	  | Result:true if insert successful else false
	  |           and  cookie cart with content is array(
	  |                                                   total_items          =>Tong So Luong San Pham,
	  |                                                   cart_total           =>Tong Tien San Pham,
	  |                                                   md5(product_id)      =>array(
	  |                                                                                   subtotal        =>Tong Tien Cua 1 San Pham,
	  |                                                                                   cart_id         =>product_id,
	  |                                                                                   cart_quantity   =>product_quantity,
	  |                                                                                   cart_price      =>product_price,
	  |                                                                                   cart_name       =>product_name,
	  |                                                                                   options          =>''
	  |                                                                       ),
	  |                                                ....................................
	  |                                           )
	  |
	  |          and $this->_custom_cart_content tuong tu
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function update_cart($items=array()){

		if(!is_array($items) || (count($items) == 0))
			return FALSE;

		$save_cart=FALSE;
		if(isset($items['rowid']) && isset($items['cart_quantity'])){

			if($this->_update_cart($items) == TRUE)
				$save_cart=TRUE;
		}
		else{

			foreach($items as $val){
				if(is_array($val) && isset($val['rowid']) && isset($val['cart_quantity']))
					if($this->_update_cart($val) == TRUE)
						$save_cart=TRUE;
			}
		}

		if($save_cart == TRUE){

			$this->_save_cart();
			return TRUE;
		}

		return FALSE;

	}

	/* ------------------------------ Insert Cart ------------------------------
	  | Param:$items                      =array(
	  |                                           cart_id         =>product_id,
	  |                                           cart_quantity   =>product_quantity,
	  |                                           cart_price      =>product_price,
	  |                                           cart_name       =>product_name,
	  |                                           options          =>''
	  |                                   )
	  |
	  | Result:$this->_custom_cart_content=array(
	  |                                           rowid           =>md5(product_id),
	  |                                           cart_id         =>product_id,
	  |                                           cart_quantity   =>product_quantity,
	  |                                           cart_price      =>product_price,
	  |                                           cart_name       =>product_name,
	  |                                           options          =>''
	  |                                   )
	  |
	  |           Check data cart is validate and return $this->_custom_cart_content;
	  |
	  |
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	private function _insert_cart($items=array()){

		if(!is_array($items) || count($items) == 0){

			log_message('error','The insert method must be passed an array containing data.');
			return FALSE;
		}

		// ---------------------------------------------------------------------
		if(!isset($items['cart_id']) || !isset($items['cart_quantity']) || !isset($items['cart_price']) || !isset($items['cart_name'])){

			log_message('error','The cart array must contain a product ID,Quantity,Price,and Name.');
			return FALSE;
		}

		// ---------------------------------------------------------------------
		$items['cart_quantity']=trim(preg_replace('/([^0-9])/i','',$items['cart_quantity']));
		$items['cart_quantity']=trim(preg_replace('/(^[0]+)/i','',$items['cart_quantity']));

		if(!is_numeric($items['cart_quantity']) || ($items['cart_quantity'] == 0))
			return FALSE;

		// ---------------------------------------------------------------------
		if(!preg_match("/^[".$this->_product_id_rules."]+$/i",$items['cart_id'])){

			log_message('error','Invalid product ID.The product ID can only contain alpha-numeric characters,dashes,and underscores');
			return FALSE;
		}

		/* ---------------------------------------------------------------------
		  if(!preg_match("/^[".$this->_product_name_rules."]+$/i",$items['cart_name'])){

		  log_message('error','An invalid name was submitted as the product name: '.$items['cart_name'].' The name can only contain alpha-numeric characters,dashes,underscores,colons,and spaces');
		  return FALSE;
		  }
		 */

		// ---------------------------------------------------------------------
		$items['cart_price']=trim(preg_replace('/([^0-9\.])/i','',$items['cart_price']));
		$items['cart_price']=trim(preg_replace('/(^[0]+)/i','',$items['cart_price']));

		if(!is_numeric($items['cart_price'])){

			log_message('error','An invalid price was submitted for product ID: '.$items['cart_id']);
			return FALSE;
		}

		// ---------------------------------------------------------------------
		if(isset($items['options']) && count($items['options']) > 0)
			$rowid=md5($items['cart_id'].implode('',$items['options']));
		else
			$rowid=md5($items['cart_id']);


		// ---------------------------------------------------------------------
		if(isset($this->_custom_cart_content[$rowid]) && $this->_custom_cart_content[$rowid]['cart_id'] == $items['cart_id'])
			$items['cart_quantity']=$this->_custom_cart_content[$rowid]['cart_quantity'] + $items['cart_quantity'];

		unset($this->_custom_cart_content[$rowid]);
		$this->_custom_cart_content[$rowid]['rowid']=$rowid;

		foreach($items as $key=> $val)
			$this->_custom_cart_content[$rowid][$key]=$val;

		return TRUE;

	}

	/* ----------------------------- Update Cart -------------------------------
	  | Param:$items=array(
	  |                       rowid           =>md5(product_id),
	  |                       cart_quantity   =>product_quantity
	  |                   )
	  |
	  |
	  |
	  | Result:$this->_custom_cart_content=array(
	  |                                           rowid           =>md5(product_id),
	  |                                           cart_id         =>product_id,
	  |                                           cart_quantity   =>product_quantity,
	  |                                           cart_price      =>product_price,
	  |                                           cart_name       =>product_name,
	  |                                           options          =>''
	  |                                   )
	  |
	  |           Check data cart is validate and return $this->_custom_cart_content;
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	private function _update_cart($items=array()){

		if(!isset($items['cart_quantity']) || !isset($items['rowid']) || !isset($this->_custom_cart_content[$items['rowid']]))
			return FALSE;

		$items['cart_quantity']=preg_replace('/([^0-9])/i','',$items['cart_quantity']);
		if(!is_numeric($items['cart_quantity']))
			return FALSE;

		if($this->_custom_cart_content[$items['rowid']]['cart_quantity'] == $items['cart_quantity'])
			return TRUE;

		if($items['cart_quantity'] == 0){

			unset($this->_custom_cart_content[$items['rowid']]);
		}
		else{

			$this->_custom_cart_content[$items['rowid']]['cart_quantity']=$items['cart_quantity'];
		}

		return TRUE;

	}

	/* ------------------------------- Save Cart -------------------------------
	  | Param:no
	  | Result:return cookie cart with content is array(
	  |                                                   total_items          =>Tong So Luong San Pham,
	  |                                                   cart_total           =>Tong Tien San Pham,
	  |                                                   md5(product_id)      =>array(
	  |                                                                                   subtotal        =>Tong Tien Cua 1 San Pham,
	  |                                                                                   rowid           =>md5(product_id),
	  |                                                                                   cart_id         =>product_id,
	  |                                                                                   cart_quantity   =>product_quantity,
	  |                                                                                   cart_price      =>product_price,
	  |                                                                                   cart_name       =>product_name,
	  |                                                                                   options          =>''
	  |                                                                       ),
	  |                                                ....................................
	  |                                           )
	  |
	  |          and $this->_custom_cart_content tuong tu
	  |
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	private function _save_cart(){

		unset($this->_custom_cart_content['total_items']);
		unset($this->_custom_cart_content['cart_total']);

		$total=0;
		$items=0;
		foreach($this->_custom_cart_content as $key=> $val){
			if(!is_array($val) || !isset($val['cart_price']) || !isset($val['cart_quantity']))
				continue;

			$total +=($val['cart_price'] * $val['cart_quantity']);
			$items +=$val['cart_quantity'];

			$this->_custom_cart_content[$key]['subtotal']=($this->_custom_cart_content[$key]['cart_price'] * $this->_custom_cart_content[$key]['cart_quantity']);
		}

		$this->_custom_cart_content['total_items']=$items;
		$this->_custom_cart_content['cart_total']=$total;

		if(count($this->_custom_cart_content) <= 2){

			$this->_object_custom_cart->session->unset_userdata($this->session_custom_cart);
			return FALSE;
		}
		$this->_object_custom_cart->session->set_userdata(array($this->session_custom_cart=>$this->_custom_cart_content));

		return TRUE;

	}

}

?>