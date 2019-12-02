<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_membership extends CI_Model{

	//Table Name which Model interaction
	private $_table="membership";

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* -------------------------- Show one Membership --------------------------
	  | Param:membership_id
	  | Result:return information of Membership
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_membership($membership_id){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.membership_id'=>$membership_id);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_membership_card_uid($card_uid){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.card_uid'=>$card_uid);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_membership_email($membership_email){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.membership_email'=>$membership_email);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* -------------------------- Show all Membership --------------------------
	  | Param:no
	  | Result:return information of all Membership
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_membership($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$str_order=$this->_table.'.membership_order asc';

		$this->db->select($str_select);
		//$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* -------------------------- Count all Membership -------------------------
	  | Param:no
	  | Result:return number sum row of all Membership
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_membership(){

		$str_select=$this->_table.'.membership_id';

		$this->db->select($str_select);
		//$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* --------------------------- Insert Membership ---------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_membership($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* --------------------------- Update Membership ---------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_membership($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* --------------------------- Delete Membership ---------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_membership($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* -------------------------- Show one Membership --------------------------
	  | Param:membership_id
	  | Result:return information of Membership
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_membership_front_end($membership_id){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.membership_id'=>$membership_id,$this->_table.'.membership_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_membership_card_uid_front_end($card_uid){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.card_uid'=>$card_uid,$this->_table.'.membership_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_membership_card_uid_back_end($card_uid){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.card_uid'=>$card_uid);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_membership_email_front_end($membership_email){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.membership_email'=>$membership_email,$this->_table.'.membership_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* -------------------------- Show all Membership --------------------------
	  | Param:no
	  | Result:return information of all Membership
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_membership_front_end($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select=$this->_table.'.*';
		$arr_where=array($this->_table.'.membership_public'=>1);
		$str_order=$this->_table.'.membership_order asc';
		$str_order_1=$this->_table.'.membership_update_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* -------------------------- Count all Membership -------------------------
	  | Param:no
	  | Result:return number sum row of all Membership
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_membership_front_end(){

		$str_select=$this->_table.'.membership_id';
		$arr_where=array($this->_table.'.membership_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

}

?>