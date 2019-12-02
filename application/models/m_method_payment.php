<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_method_payment extends CI_Model{

	private $_table='method_payment';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ------------------------ Show one Method Payment ------------------------
	  | Param:payment_id,payment_lang
	  | Result:return information of Method Payment
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_payment($payment_id,$payment_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.payment_id'=>$payment_id,'payment_lang'=>$payment_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------ Show all Method Payment ------------------------
	  | Param:payment_lang
	  | Result:return information of all Method Payment
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_payment($payment_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('payment_lang'=>$payment_lang);
		$str_order='payment_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------ Count all Method Payment -----------------------
	  | Param:payment_lang
	  | Result:return number sum row of all Method Payment
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_payment($payment_lang){

		$str_select='payment_id';
		$arr_where=array('payment_lang'=>$payment_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------ Insert Method Payment --------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_payment($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ------------------------- Update Method Payment -------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_payment($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ------------------------- Delete Method Payment -------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_payment($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* ------------------------ Show one Method Payment ------------------------
	  | Param:payment_id,payment_lang
	  | Result:return information of Method Payment
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_payment_front_end($payment_id,$payment_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.payment_id'=>$payment_id,'payment_lang'=>$payment_lang,'payment_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------ Show all Method Payment ------------------------
	  | Param:payment_lang
	  | Result:return information of all Method Payment
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_payment_front_end($payment_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('payment_lang'=>$payment_lang,'payment_public'=>1);
		$str_order='payment_order asc';
		$str_order_1='payment_update_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------ Count all Method Payment -----------------------
	  | Param:payment_lang
	  | Result:return number sum row of all Method Payment
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_payment_front_end($payment_lang){

		$str_select='payment_id';
		$arr_where=array('payment_lang'=>$payment_lang,'payment_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

}

?>