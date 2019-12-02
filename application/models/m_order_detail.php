<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_order_detail extends CI_Model{

	private $_table='order_detail';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ---------------------------- Check Product ID ---------------------------
	  | Param:product_id,order_id
	  | Result:return true if isset else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function check_product_id_order($product_id,$order_id){

		$str_select="order_detail_code";
		$arr_where=array('order_detail_code'=>$product_id,'order_id'=>$order_id);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		if($query->num_rows() > 0)
			return true;

		return false;

	}

	/* ------------------------- Show one Order Detail -------------------------
	  | Param:order_detail_id
	  | Result:return information of Order Detail
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_order_detail($order_detail_id){

		$str_select="*";
		$arr_where=array($this->_table.'.order_detail_id'=>$order_detail_id);

		$this->db->select($str_select);
		$this->db->join('order',$this->_table.'.order_id=order.order_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* -------------------------- SUM Total One Order --------------------------
	  | Param:order_id
	  | Result:return sum money of one order
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function total_money_order($order_id){

		$str_select_sum=$this->_table.".order_detail_price * ".$this->_table.".order_detail_number";
		$arr_where=array($this->_table.'.order_id'=>$order_id);

		$this->db->select_sum($str_select_sum,'total_order');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ---------------------- Show Order Detail of Order -----------------------
	  | Param:order_id
	  | Result:return information Order Detail of Order
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_order_detail_one_order($order_id){

		$str_select='*';
		$arr_where=array($this->_table.'.order_id'=>$order_id);

		$this->db->select($str_select);
		$this->db->join('order',$this->_table.'.order_id=order.order_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* -------------------------- Insert Order Detail --------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_order_detail($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	public function insert_order_detail_batch($arr_data){

		return $this->db->insert_batch($this->_table,$arr_data);

	}

	/* -------------------------- Update Order Detail --------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_order_detail($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* -------------------------- Delete Order Detail --------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_order_detail($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

}

?>