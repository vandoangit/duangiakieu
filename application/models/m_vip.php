<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_vip extends CI_Model{

	private $_table='vip';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ------------------------------ Show one Vip -----------------------------
	  | Param:vip_id
	  | Result:return information of Vip
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_vip($vip_id){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.vip_id'=>$vip_id);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------------ Show all Vip -----------------------------
	  | Param:vip_lang
	  | Result:return information of all Vip
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_vip($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$str_order='vip_order asc';

		$this->db->select($str_select);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------------- Count all Vip -----------------------------
	  | Param:vip_lang
	  | Result:return number sum row of all Vip
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_vip(){

		$str_select='vip_id';

		$this->db->select($str_select);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------- Insert Vip ------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_vip($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ------------------------- Update Vip ------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_vip($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ------------------------- Delete Vip ------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_vip($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* -----------------------Show one Vip--------------------------
	  | Param:vip_id,vip_lang
	  | Result:return information of Vip
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_vip_front_end($vip_id){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.vip_id'=>$vip_id,'vip_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------Show all Vip------------------------
	  | Param:vip_lang
	  | Result:return information of all Vip
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_vip_front_end($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('vip_public'=>1);
		$str_order='vip_order asc';
		$str_order_1='vip_update_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Count all Vip -----------------------
	  | Param:vip_lang
	  | Result:return number sum row of all Vip
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_vip_front_end($vip_lang){

		$str_select='vip_id';
		$arr_where=array('vip_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

}

?>