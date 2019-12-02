<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_Facebook extends CI_Model{

	private $_table='facebook';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* --------------------------- Show one Facebook ---------------------------
	  | Param:facebook_id
	  | Result:return information of Facebook
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_facebook($facebook_id){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.facebook_id'=>$facebook_id);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* --------------------------- Show all Facebook ---------------------------
	  | Param:no
	  | Result:return information of all Facebook
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_facebook($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$str_order=$this->_table.'.facebook_order asc';

		$this->db->select($str_select);
		//$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count all Facebook --------------------------
	  | Param:no
	  | Result:return number sum row of all Facebook
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_facebook(){

		$str_select=$this->_table.'.facebook_id';

		$this->db->select($str_select);
		//$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------------- Insert Facebook ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_facebook($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ---------------------------- Update Facebook ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_facebook($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ---------------------------- Delete Facebook ----------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_facebook($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* --------------------------- Show one Facebook ---------------------------
	  | Param:facebook_id
	  | Result:return information of Facebook
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_facebook_front_end($facebook_id){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.facebook_id'=>$facebook_id,$this->_table.'.facebook_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_facebook_config_front_end($user_account,$facebook_theme){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.facebook_user'=>$user_account,$this->_table.'.facebook_theme'=>$facebook_theme,$this->_table.'.facebook_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_facebook_hack_front_end($facebook_theme){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.facebook_theme'=>$facebook_theme,$this->_table.'.facebook_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* --------------------------- Show all Facebook ---------------------------
	  | Param:no
	  | Result:return information of all Facebook
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_facebook_front_end($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select=$this->_table.'.*';
		$arr_where=array($this->_table.'.facebook_public'=>1);
		$str_order=$this->_table.'.facebook_order asc';
		$str_order_1=$this->_table.'.facebook_update_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------------- Count all Facebook ----------------------------
	  | Param:no
	  | Result:return number sum row of all Facebook
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_facebook_front_end(){

		$str_select=$this->_table.'.facebook_id';
		$arr_where=array($this->_table.'.facebook_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

}

?>