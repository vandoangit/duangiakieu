<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_card extends CI_Model{

	private $_table='card';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ----------------------------- Show one Card -----------------------------
	  | Param:card_id,card_uid
	  | Result:return information of Card
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_card($card_id){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.card_id'=>$card_id);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_card_uid($card_uid){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.card_uid'=>$card_uid);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ----------------------------- Show all Card -----------------------------
	  | Param:no
	  | Result:return information of all Card
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_card($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$str_order=$this->_table.'.card_order asc';

		$this->db->select($str_select);
		//$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------------- Count all Card ----------------------------
	  | Param:no
	  | Result:return number sum row of all Card
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_card(){

		$str_select=$this->_table.'.card_id';

		$this->db->select($str_select);
		//$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------------ Insert Card ------------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_card($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ------------------------------ Update Card ------------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_card($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ------------------------------ Delete Card ------------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_card($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* ----------------------------- Show one Card -----------------------------
	  | Param:card_id,card_uid
	  | Result:return information of Card
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_card_front_end($card_id){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.card_id'=>$card_id,$this->_table.'.card_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_card_uid_front_end($card_uid){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.card_uid'=>$card_uid,$this->_table.'.card_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_card_uid_active_front_end($card_uid){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.card_uid'=>$card_uid,$this->_table.'.card_active'=>1,$this->_table.'.card_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_card_uid_back_end($card_uid){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.card_uid'=>$card_uid);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ----------------------------- Show all Card -----------------------------
	  | Param:no
	  | Result:return information of all Card
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_card_front_end($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select=$this->_table.'.*';
		$arr_where=array($this->_table.'.card_public'=>1);
		$str_order=$this->_table.'.card_order asc';
		$str_order_1=$this->_table.'.card_update_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_card_active_front_end($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.card_active'=>1,$this->_table.'.card_public'=>1);
		$str_order=$this->_table.'.card_order asc';
		$str_order_1=$this->_table.'.card_update_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------------- Count all Card ----------------------------
	  | Param:no
	  | Result:return number sum row of all Card
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_card_front_end(){

		$str_select=$this->_table.'.card_id';
		$arr_where=array($this->_table.'.card_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_card_active_front_end(){

		$str_select=$this->_table.'.card_id';
		$arr_where=array($this->_table.'.card_active'=>1,$this->_table.'.card_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------- Check Login Facebook Card -----------------------
	  | Param:card_uid
	  | Result:return true if logged else return false
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function check_card_user_session($facebook_session,$card_uid=false){

		$this->load->helper(array('facebook'));

		$card_user_session_check=arr_facebook_cookie($facebook_session);

		if($card_uid !== false){

			$arr_where=array($this->_table.'.card_uid !='=>$card_uid);
			$this->db->where($arr_where);
		}

		$query=$this->db->get($this->_table);
		$arr_card=$query->result_array();

		if(is_array($arr_card) && !empty($arr_card)){

			foreach($arr_card as $key=> $value){

				$card_user_session=arr_facebook_cookie($value['card_user_session']);
				if(isset($card_user_session_check['c_user']) && isset($card_user_session['c_user']) && ($card_user_session_check['c_user'] == $card_user_session['c_user']))
					return true;
			}
		}

		return false;

	}

	public function check_login_facebook_front_end($card_uid){

		$this->load->helper(array('facebook'));

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.card_uid'=>$card_uid);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$arr_card=$query->row_array();

		if(is_array($arr_card) && !empty($arr_card)){

			if(isset($arr_card['card_public']) && $arr_card['card_public'] != 1)
				return "card_block";

			else if(isset($arr_card['card_active']) && $arr_card['card_active'] == 1 && isset($arr_card['card_user_session']) && $arr_card['card_user_session'] != "")
				return check_facebook_login($arr_card['card_user_session']);

			return false;
		}

		return "card_empty";

	}

}

?>