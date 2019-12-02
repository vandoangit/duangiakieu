<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_user_group extends CI_Model{

	//Table Name which Model interaction
	private $_table='user_group';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* -------------------------- Show one User Group --------------------------
	  | Param:user_group_id
	  | Result:return information of user group
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_user_group($user_group_id){

		$str_select="*";
		$arr_where=array('user_group_id'=>$user_group_id);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* --------------------------- Show Group of User --------------------------
	  | Param:user_account
	  | Result:return information group of user
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_group_one_user($user_account,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select="authorization_user.user_account,authorization_user.user_group_id,".$this->_table.".user_group_name";
		$arr_where=array('authorization_user.user_account'=>$user_account);
		$str_order=$this->_table.".user_group_update_date desc";

		$this->db->select($str_select);
		$this->db->join('authorization_user',$this->_table.'.user_group_id=authorization_user.user_group_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* -------------------------- Count Group of User --------------------------
	  | Param:user_account
	  | Result:return number sum row of group the user
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_group_one_user($user_account){

		$str_select="authorization_user.user_account,authorization_user.user_group_id,".$this->_table.".user_group_name";
		$arr_where=array('authorization_user.user_account'=>$user_account);

		$this->db->select($str_select);
		$this->db->join('authorization_user',$this->_table.'.user_group_id=authorization_user.user_group_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Show all Group ----------------------------
	  | Param:no
	  | Result:return information of all group
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_user_group($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select="*";
		$str_order="user_group_update_date desc";

		$this->db->select($str_select);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------------- Count all Group ----------------------------
	  | Param:no
	  | Result:return number sum row of all group
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_user_group(){

		$str_select="user_group_id";

		$this->db->select($str_select);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* --------------------------- Insert User Group ---------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_user_group($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ------------------------------ Update Group -----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_user_group($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ------------------------------ Delete Group -----------------------------
	  | Param:$arr_where:array or string query,if it is array with key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_user_group($arr_where){

		if(element('user_group_id',$arr_where,1) == 1)
			return false;

		$this->db->where($arr_where);
		if($this->db->delete('authorization_user')){

			$this->db->where($arr_where);
			if($this->db->delete('authorization_group')){

				$this->db->where($arr_where);
				return $this->db->delete($this->_table);
			}
		}
		return false;

	}

}

?>