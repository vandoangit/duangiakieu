<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_method_delivery extends CI_Model{

	private $_table='method_delivery';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ----------------------- Show one Method Delivery ------------------------
	  | Param:delivery_id,delivery_lang
	  | Result:return information of Method Delivery
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_delivery($delivery_id,$delivery_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.delivery_id'=>$delivery_id,'delivery_lang'=>$delivery_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ----------------------- Show all Method Deilivery -----------------------
	  | Param:delivery_lang
	  | Result:return information of all Method Deilivery
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_delivery($delivery_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('delivery_lang'=>$delivery_lang);
		$str_order='delivery_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Count all Method Delivery -----------------------
	  | Param:delivery_lang
	  | Result:return number sum row of all Method Delivery
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_delivery($delivery_lang){

		$str_select='delivery_id';
		$arr_where=array('delivery_lang'=>$delivery_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------- Insert Method Delivery ------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_delivery($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ------------------------- Update Method Delivery ------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_delivery($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ------------------------- Delete Method Delivery ------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_delivery($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* -----------------------Show one Method Delivery--------------------------
	  | Param:delivery_id,delivery_lang
	  | Result:return information of Method Delivery
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_delivery_front_end($delivery_id,$delivery_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.delivery_id'=>$delivery_id,'delivery_lang'=>$delivery_lang,'delivery_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------Show all Method Deilivery------------------------
	  | Param:delivery_lang
	  | Result:return information of all Method Deilivery
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_delivery_front_end($delivery_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('delivery_lang'=>$delivery_lang,'delivery_public'=>1);
		$str_order='delivery_order asc';
		$str_order_1='delivery_update_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Count all Method Delivery -----------------------
	  | Param:delivery_lang
	  | Result:return number sum row of all Method Delivery
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_delivery_front_end($delivery_lang){

		$str_select='delivery_id';
		$arr_where=array('delivery_lang'=>$delivery_lang,'delivery_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

}

?>