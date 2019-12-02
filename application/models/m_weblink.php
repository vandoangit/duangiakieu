<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_weblink extends CI_Model{

	private $_table='weblink';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ---------------------------- Show one Weblink ---------------------------
	  | Param:link_id,menu_class,cate_lang
	  | Result:return information of Weblink
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_weblink($link_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.link_id'=>$link_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_weblink_public($link_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.link_id'=>$link_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------ Show Weblink of Category -----------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information Weblink of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_weblink_one_category($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.link_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_weblink_one_category_public($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.link_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Count Weblink of Category -----------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return number sum row Weblink of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_weblink_one_category($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.link_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_weblink_one_category_public($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.link_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------------- Show all Weblink ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Weblink
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_weblink($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.link_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_weblink_public($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.link_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count all Weblink ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of all Weblink
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_weblink($menu_class,$cate_lang){

		$str_select=$this->_table.'.link_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_weblink_public($menu_class,$cate_lang){

		$str_select=$this->_table.'.link_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Insert Weblink ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_weblink($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ----------------------------- Update Weblink ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_weblink($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ----------------------------- Delete Weblink ----------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_weblink($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* ---------------------------- Show all Weblink ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Weblink
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_weblink_front_end($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.link_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.link_order asc';
		$str_order_1=$this->_table.'.link_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------ Show Weblink of Category -----------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information Weblink of Category
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_weblink_one_category_front_end($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.link_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.link_order asc';
		$str_order_1=$this->_table.'.link_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

}

?>