<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_product_pattern extends CI_Model{

	private $_table='product_pattern';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ------------------------ Show one Product Pattern -----------------------
	  | Param:product_pattern_id,product_pattern_lang
	  | Result:return information of Product Pattern
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_product_pattern($product_pattern_id,$product_pattern_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.product_pattern_id'=>$product_pattern_id,$this->_table.'.product_pattern_lang'=>$product_pattern_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------ Show all Product Pattern -----------------------
	  | Param:product_pattern_lang
	  | Result:return information of all Product Pattern
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_product_pattern($product_pattern_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('product_pattern_lang'=>$product_pattern_lang);
		$str_order='product_pattern_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Count all Product Pattern -----------------------
	  | Param:product_pattern_lang
	  | Result:return number sum row of all Product Pattern
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_product_pattern($product_pattern_lang){

		$str_select='product_pattern_id';
		$arr_where=array('product_pattern_lang'=>$product_pattern_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------- Insert Product Pattern ------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_product_pattern($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ------------------------- Update Product Pattern ------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_product_pattern($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ------------------------- Delete Product Pattern ------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_product_pattern($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

}

?>