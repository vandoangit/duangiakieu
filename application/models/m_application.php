<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_application extends CI_Model{

	private $_table='application';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* -------------------------- Show one Application -------------------------
	  | Param:application_id,application_lang
	  | Result:return information of Application
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_application($application_id,$application_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.application_id'=>$application_id,'application_lang'=>$application_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* -------------------------- Show all Application -------------------------
	  | Param:application_lang
	  | Result:return information of all Application
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_application($application_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('application_lang'=>$application_lang);
		$str_order='application_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------- Count all Application -------------------------
	  | Param:application_lang
	  | Result:return number sum row of all Application
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_application($application_lang){

		$str_select='application_id';
		$arr_where=array('application_lang'=>$application_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* --------------------------- Insert Application --------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_application($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* --------------------------- Update Application --------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_application($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* --------------------------- Delete Application --------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_application($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* -------------------------- Show one Application -------------------------
	  | Param:application_id,application_lang
	  | Result:return information of Application
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_application_front_end($application_id,$application_lang){

		$str_select=$this->_table.".*";
		$arr_where=array('application_id'=>$application_id,'application_public'=>1,'application_lang'=>$application_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* -------------------------- Show all Application -------------------------
	  | Param:application_lang
	  | Result:return information of all Application
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_application_front_end($application_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('application_lang'=>$application_lang,'application_public'=>1);
		$str_order='application_order asc';
		$str_order_1='application_update_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

}

?>