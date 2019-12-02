<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_authorization_user extends CI_Model{

	private $_table="authorization_user";
	public $sess_authorization_user="authorization_user";

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ------------------------------ Check Login ------------------------------
	  | Param:user_account,user_pass
	  | Result:return true if user right else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function check_user_login($user_account,$pass){

		$str_select="user_account";
		$arr_where=array('user_account'=>$user_account,'user_pass'=>$pass);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get('user_admin');
		if($query->num_rows() > 0)
			return true;

		return false;

	}

	/* ----------------------------- Check Account -----------------------------
	  | Param:user_account
	  | Result:return true if user right else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function check_user_account($user_account){

		$str_select="user_account";
		$arr_where=array('user_account'=>$user_account);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get('user_admin');
		if($query->num_rows() > 0)
			return true;

		return false;

	}

	/* --------------------- Check Exist Authorization User --------------------
	  | Param:user_account,user_group_id
	  | Result:return information of group the user
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function check_exist_authorization_user($user_account,$user_group_id){

		$str_select="user_account";
		$arr_where=array('user_account'=>$user_account,'user_group_id'=>$user_group_id);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		if($query->num_rows() > 0)
			return false;

		return true;

	}

	/* ----------------------- Insert Authorization User -----------------------
	  | Param:$arr_data:array with key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_authorization_user($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ----------------------- Delete Authorization User -----------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_authorization_user($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

}

?>