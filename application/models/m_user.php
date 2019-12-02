<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_user extends CI_Model{

	//Table Name which Model interaction
	private $_table="user_admin";

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ----------------------------- Show one User -----------------------------
	  | Param:user_account
	  | Result:return information of user
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_user($user_account){

		$str_select="*";
		$arr_where=array('user_account'=>$user_account);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return ($user_account) ? $query->row_array() : array();

	}

	/* ------------------------ Show User of User Group ------------------------
	  | Param:user_group_id
	  | Result:return information User of user_group
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_user_one_group($user_group_id,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select=$this->_table.".*";
		$arr_where=array("authorization_user.user_group_id"=>$user_group_id);
		$str_order=$this->_table.".user_update_date desc";

		$this->db->select($str_select);
		$this->db->join('authorization_user',$this->_table.'.user_account=authorization_user.user_account');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Count User of User Group ------------------------
	  | Param:user_group_id
	  | Result:return number sum row user of user group
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_user_one_group($user_group_id){

		$str_select=$this->_table.".user_account";
		$arr_where=array('authorization_user.user_group_id'=>$user_group_id);

		$this->db->select($str_select);
		$this->db->join('authorization_user',$this->_table.'.user_account=authorization_user.user_account');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* -------------------------- Show User Last Login -------------------------
	  | Param:no
	  | Result:return information of user last login
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_user_last_login($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select="*";
		$str_order="user_last_login desc";

		$this->db->select($str_select);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------------- Show all User -----------------------------
	  | Param:no
	  | Result:return information of all user
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_user($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select="*";
		$str_order="user_update_date desc";

		$this->db->select($str_select);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------------- Count all User ----------------------------
	  | Param:no
	  | Result:return number sum row of all user
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_user(){

		$str_select="user_account";

		$this->db->select($str_select);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------------- Insert User -----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_user($arr_data){

		if($this->db->insert($this->_table,$arr_data)){

			$arr_data_atuhorization['user_account']=element('user_account',$arr_data,'');
			$arr_data_atuhorization['user_group_id']=1;
			@$this->db->insert('authorization_user',$arr_data_atuhorization);
			return true;
		}
		return false;

	}

	/* ------------------------------ Update User ------------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_user($arr_data,$arr_where){

		$str_select="user_img";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$user_img=$query->row_array();

		if(isset($arr_data['user_img']) && is_array($user_img) && (element('user_img',$user_img,'') != $arr_data['user_img']) && (element('user_img',$user_img,'') != '')){

			@unlink(PUBPATH.DIR_PUBLIC_IMG.element('user_img',$user_img,''));
			@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".element('user_img',$user_img,''));
		}

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ------------------------------ Delete User ------------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_user($arr_where,$user_account=''){

		$str_select="user_account,user_img";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$user_img=$query->row_array();

		if(element('user_account',$user_img,'') == $user_account)
			return false;

		$this->db->where($arr_where);
		if($this->db->delete('authorization_user')){

			$this->db->where($arr_where);
			if($this->db->delete($this->_table)){

				if(is_array($user_img) && (element('user_img',$user_img,'') != '')){

					@unlink(PUBPATH.DIR_PUBLIC_IMG.element('user_img',$user_img,''));
					@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".element('user_img',$user_img,''));
				}
				return true;
			}
		}
		return false;

	}

}

?>