<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_order extends CI_Model{

	private $_table='order';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ----------------------------- Show one Order ----------------------------
	  | Param:order_id,menu_class,cate_lang
	  | Result:return information of Order
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_order($order_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*,category_sub.cate_name";
		$arr_where=array($this->_table.'.order_id'=>$order_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_order_public($order_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*,category_sub.cate_name";
		$arr_where=array($this->_table.'.order_id'=>$order_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_order_method($order_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*,category_sub.cate_name,method_delivery.delivery_name,method_payment.payment_name";
		$arr_where=array($this->_table.'.order_id'=>$order_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->join('method_delivery',$this->_table.'.delivery_id=method_delivery.delivery_id');
		$this->db->join('method_payment',$this->_table.'.payment_id=method_payment.payment_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------ Show Order of Category -------------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information Order of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_order_one_category($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.order_create_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_order_one_category_public($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.order_create_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------ Count Order of Category ------------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return number sum row Order of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_order_one_category($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.order_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_order_one_category_public($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.order_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Show all Order ----------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Order
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_order($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.order_create_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_order_public($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.order_create_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------------- Count all Order ----------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of all Order
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_order($menu_class,$cate_lang){

		$str_select=$this->_table.'.order_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_order_public($menu_class,$cate_lang){

		$str_select=$this->_table.'.order_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------------ Insert Order -----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_order($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ------------------------------ Update Order -----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_order($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ------------------------------ Delete Order -----------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_order($arr_where){

		$this->db->where($arr_where);
		if($this->db->delete('order_detail')){

			$this->db->where($arr_where);
			return $this->db->delete($this->_table);
		}
		return false;

	}

	/* --------------------------- Insert Order Cart ---------------------------
	  | Param:array_order
	  | Result:if insert successful return true,else return false
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function insert_order_cart_front_end($arr_order){

		if(is_array($arr_order) && !empty($arr_order)){

			$this->load->library(DEFAULT_DIR_ROOT.'/custom_cart');

			if(!$this->custom_cart->empty_cart()){

				$arr_order['order_id']=round((microtime(true) * 100));
				$arr_order['order_total_price']=$this->custom_cart->total_money_cart();
				$arr_order['order_create_date']=date('Y-m-d H:i:s');
				$arr_order['order_update_date']=date('Y-m-d H:i:s');

				if($this->db->insert($this->_table,$arr_order)){

					$ij=0;

					$arr_cart=$this->custom_cart->content_cart();
					foreach($arr_cart as $key=> $value){

						$arr_order_detail[$ij]['order_detail_code']=element('cart_id',$value,'-100000');
						$arr_order_detail[$ij]['order_detail_name']=element('cart_name',$value,'-100000');
						$arr_order_detail[$ij]['order_detail_price']=element('cart_price',$value,'-100000');
						$arr_order_detail[$ij]['order_detail_number']=element('cart_quantity',$value,'-100000');
						$arr_order_detail[$ij]['order_detail_color']=element('product_color',$value['options'],'');
						$arr_order_detail[$ij]['order_id']=element('order_id',$arr_order,'-111111');

						$ij++;
					}

					if($this->db->insert_batch('order_detail',$arr_order_detail))
						return true;
				}
			}
		}

		return false;

	}

}

?>