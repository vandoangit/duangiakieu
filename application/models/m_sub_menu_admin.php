<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_sub_menu_admin extends CI_Model{

	private $_table="sub_menu_admin";

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* --------------------------- Show one Sub Menu ---------------------------
	  | Param:menu_class,sub_menu_function,sub_menu_lang
	  | Result:return information of sub menu
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_sub_menu($menu_class,$sub_menu_function,$sub_menu_lang){

		$str_select='*';
		$arr_where=array('menu_class'=>$menu_class,'sub_menu_function'=>$sub_menu_function,'sub_menu_lang'=>$sub_menu_lang,'sub_menu_public'=>'1');

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* --------------------------- Show one Sub Menu ---------------------------
	  | Param:menu_class,sub_menu_function,sub_menu_lang
	  | Result:return information of a sub menu
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_sub_menu_one_menu($menu_class,$sub_menu_function,$sub_menu_lang){

		$str_select='*';
		$arr_where=array($this->_table.'.menu_class'=>$menu_class,$this->_table.'.sub_menu_function'=>$sub_menu_function,$this->_table.'.sub_menu_lang'=>$sub_menu_lang,$this->_table.'.sub_menu_public'=>'1','menu_admin.menu_public'=>'1','menu_admin.menu_lang'=>$sub_menu_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->join('menu_admin',$this->_table.".menu_class=menu_admin.menu_class");

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ----------------------- Show Sub Menu of Menu ---------------------------
	  | Param:menu_class,sub_menu_lang
	  | Result:return information Sub Menu of Menu
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_sub_menu_one_menu($menu_class,$sub_menu_lang){

		$str_select=$this->_table.'.*';
		$arr_where=array($this->_table.'.menu_class'=>$menu_class,$this->_table.'.sub_menu_lang'=>$sub_menu_lang,$this->_table.'.sub_menu_public'=>'1','menu_admin.menu_public'=>'1','menu_admin.menu_lang'=>$sub_menu_lang);
		$str_order='sub_menu_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->join('menu_admin',$this->_table.".menu_class=menu_admin.menu_class");
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------- Show Sub Menu of Menu Condition 1 -------------------
	  | Param:menu_class,sub_menu_lang
	  | Result:return information Sub Menu of Menu in limit allow(ctrl,change,config,manager)
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_sub_menu_one_menu_in_1($menu_class,$sub_menu_lang){

		$str_select=$this->_table.'.*';
		$arr_where=array($this->_table.'.menu_class'=>$menu_class,$this->_table.'.sub_menu_lang'=>$sub_menu_lang,$this->_table.'.sub_menu_public'=>'1','menu_admin.menu_public'=>'1','menu_admin.menu_lang'=>$sub_menu_lang);
		$arr_where_in=array('panel','change','config','manager','email','article','category','control','add');
		$str_order='sub_menu_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.sub_menu_function',$arr_where_in);
		$this->db->join('menu_admin',$this->_table.".menu_class=menu_admin.menu_class");
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------- Show Sub Menu of Menu Condition 2 -------------------
	  | Param:menu_class,sub_menu_lang
	  | Result:return information Sub Menu of Menu in limit allow(ctrl,change,config,manager)
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_sub_menu_one_menu_in_2($menu_class,$sub_menu_lang){

		$str_select='*';
		$arr_where=array($this->_table.'.menu_class'=>$menu_class,$this->_table.'.sub_menu_lang'=>$sub_menu_lang,$this->_table.'.sub_menu_public'=>'1','menu_admin.menu_public'=>'1','menu_admin.menu_lang'=>$sub_menu_lang);
		$arr_where_in=array('change','config','manager','email','control');
		$str_order='sub_menu_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.sub_menu_function',$arr_where_in);
		$this->db->join('menu_admin',$this->_table.".menu_class=menu_admin.menu_class");
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Show All Sub Menu ---------------------------
	  | Param:sub_menu_lang
	  | Result:return information of all sub menu
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_sub_menu_admin($sub_menu_lang){

		$str_select=$this->table.'.*';
		$arr_where=array($this->table.'.sub_menu_lang'=>$sub_menu_lang,$this->table.'.sub_menu_public'=>'1','menu_admin.menu_public'=>'1','menu_admin.menu_lang'=>$sub_menu_lang);
		$str_order='sub_menu_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->join('menu_admin',$this->_table.".menu_class=menu_admin.menu_class");
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------------- Insert Sub Menu ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_sub_menu($arr_data){

		return $this->db->insert_batch($this->_table,$arr_data);

	}

	/* ---------------------------- Update Sub Menu ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_sub_menu($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ---------------------------- Delete Sub Menu ----------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_sub_menu($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

}

?>