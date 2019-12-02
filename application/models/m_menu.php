<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_menu extends CI_Model{

	private $_table='menu';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* --------------------------- Show one Menu -------------------------------
	  | Param:menu_id,menu_lang
	  | Result:return information of Menu
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_menu($menu_id,$menu_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.menu_id'=>$menu_id,'menu_lang'=>$menu_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ----------------------------- Show all Menu -----------------------------
	  | Param:menu_lang
	  | Result:return information of all Menu
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_menu($menu_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('menu_lang'=>$menu_lang);
		$str_order='menu_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------------- Count all Menu -----------------------------
	  | Param:menu_lang
	  | Result:return number sum row of all Menu
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_menu($menu_lang){

		$str_select='menu_id';
		$arr_where=array('menu_lang'=>$menu_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------------ Insert Menu ------------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_menu($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ------------------------------ Update Menu ------------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_menu($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ------------------------------- Delete Menu -----------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_menu($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* ---------------------------- Show all Menu ------------------------------
	  | Param:menu_lang
	  | Result:return information of all Menu
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_menu_front_end($menu_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('menu_lang'=>$menu_lang,'menu_public'=>1);
		$str_order='menu_order asc';
		$str_order_1='menu_update_date asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

}

?>