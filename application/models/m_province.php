<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_province extends CI_Model{

	private $_table='province';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* --------------------------- Show one Province ---------------------------
	  | Param:province_id,province_lang
	  | Result:return information of Province
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_province($province_id,$province_lang){

		$str_select="*";
		$arr_where=array('province_id'=>$province_id,'province_lang'=>$province_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* --------------------------- Show all Province ---------------------------
	  | Param:province_lang
	  | Result:return information of all Province
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_province($province_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('province_lang'=>$province_lang);
		$str_order='province_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count all Province --------------------------
	  | Param:province_lang
	  | Result:return number sum row of all Province
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_province($province_lang){

		$str_select='province_id';
		$arr_where=array('province_lang'=>$province_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------------- Insert Province ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_province($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ---------------------------- Update Province ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_province($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ---------------------------- Delete Province ----------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_province($arr_where){

		$this->db->where($arr_where);
		if($this->db->delete('district') === false)
			return false;

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* --------------------------- Show one Province ---------------------------
	  | Param:province_id,province_lang
	  | Result:return information of Province
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_province_front_end($province_id,$province_lang){

		$str_select="*";
		$arr_where=array('province_id'=>$province_id,'province_lang'=>$province_lang,'province_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* --------------------------- Show all Province ---------------------------
	  | Param:province_lang
	  | Result:return information of all Province
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_province_front_end($province_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('province_lang'=>$province_lang,'province_public'=>1);
		$str_order='province_order asc';
		$str_order_1='province_update_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count all Province --------------------------
	  | Param:province_lang
	  | Result:return number sum row of all Province
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_province_front_end($province_lang){

		$str_select='province_id';
		$arr_where=array('province_lang'=>$province_lang,'province_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

}

?>