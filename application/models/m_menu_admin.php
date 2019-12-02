<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_menu_admin extends CI_Model{

	private $_table="menu_admin";

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ----------------------------- Show one Menu -----------------------------
	  | Param:menu_class,menu_lang
	  | Result:return information of menu
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_menu_admin($menu_class,$menu_lang){

		$str_select="*";
		$arr_where=array('menu_class'=>$menu_class,'menu_lang'=>$menu_lang,'menu_public'=>'1');

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ----------------------------- Show all Menu -----------------------------
	  | Param:menu_lang,menu_public
	  | Result:return information of all menu
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_menu_admin($menu_lang,$menu_public=true){

		$str_select="*";
		if($menu_public)
			$arr_where=array('menu_lang'=>$menu_lang,'menu_public'=>'1');
		else
			$arr_where=array('menu_lang'=>$menu_lang);

		$str_order="menu_order asc";

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------------ Insert Menu ------------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_menu($arr_data){

		return $this->db->insert_batch($this->_table,$arr_data);

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

	/* ------------------------------ Delete Menu ------------------------------
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

}

?>