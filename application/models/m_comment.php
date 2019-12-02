<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_comment extends CI_Model{

	private $_table='comment';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ---------------------------- Show one Comment ---------------------------
	  | Param:comment_id
	  | Result:return information of comment
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_comment($comment_id){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.comment_id'=>$comment_id);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* -------------------------- Show Comment Product -------------------------
	  | Param:no
	  | Result:return information comment product
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_comment_product($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.comment_type'=>1);
		$str_order=$this->_table.'.comment_create_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------- Count Comment Product -------------------------
	  | Param:no
	  | Result:return number sum row of comment product
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_comment_product(){

		$str_select=$this->_table.'.comment_id';
		$arr_where=array($this->_table.'.comment_type'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------- Show Comment Product No Surf ---------------------
	  | Param:no
	  | Result:return information comment product no surf
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_comment_product_no_surf($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.comment_type'=>1,$this->_table.'.comment_surf'=>0);
		$str_order=$this->_table.'.comment_create_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------- Count Comment Product No Surf ---------------------
	  | Param:no
	  | Result:return number sum row of comment product no surf
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_comment_product_no_surf(){

		$str_select=$this->_table.'.comment_id';
		$arr_where=array($this->_table.'.comment_type'=>1,$this->_table.'.comment_surf'=>0);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------- Show Comment Product Surf -----------------------
	  | Param:no
	  | Result:return information comment product surf
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_comment_product_surf($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.comment_type'=>1,$this->_table.'.comment_surf'=>1);
		$str_order=$this->_table.'.comment_create_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------- Count Comment Product Surf -----------------------
	  | Param:no
	  | Result:return number sum row of comment product surf
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_comment_product_surf(){

		$str_select=$this->_table.'.comment_id';
		$arr_where=array($this->_table.'.comment_type'=>1,$this->_table.'.comment_surf'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* --------------------------- Show Comment News ---------------------------
	  | Param:no
	  | Result:return information comment news
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_comment_news($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.comment_type'=>2);
		$str_order=$this->_table.'.comment_create_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count Comment News --------------------------
	  | Param:no
	  | Result:return number sum row of comment news
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_comment_news(){

		$str_select=$this->_table.'.comment_id';
		$arr_where=array($this->_table.'.comment_type'=>2);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------- Show Comment News No Surf -----------------------
	  | Param:no
	  | Result:return information comment news no surf
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_comment_news_no_surf($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.comment_type'=>2,$this->_table.'.comment_surf'=>0);
		$str_order=$this->_table.'.comment_create_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Count Comment News No Surf ----------------------
	  | Param:no
	  | Result:return number sum row of comment news no surf
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_comment_news_no_surf(){

		$str_select=$this->_table.'.comment_id';
		$arr_where=array($this->_table.'.comment_type'=>2,$this->_table.'.comment_surf'=>0);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------ Show Comment News Surf -------------------------
	  | Param:no
	  | Result:return information comment news surf
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_comment_news_surf($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.comment_type'=>2,$this->_table.'.comment_surf'=>1);
		$str_order=$this->_table.'.comment_create_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------ Count Comment News Surf ------------------------
	  | Param:no
	  | Result:return number sum row of comment news surf
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_comment_news_surf(){

		$str_select=$this->_table.'.comment_id';
		$arr_where=array($this->_table.'.comment_type'=>2,$this->_table.'.comment_surf'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------------- Show all Comment ---------------------------
	  | Param:no
	  | Result:return information of all comment
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_comment($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$str_order=$this->_table.'.comment_create_date desc';

		$this->db->select($str_select);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count all Comment ---------------------------
	  | Param:no
	  | Result:return number sum row of all comment
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_comment(){

		$str_select=$this->_table.'.comment_id';

		$this->db->select($str_select);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------ Show all Comment No Surf -----------------------
	  | Param:no
	  | Result:return information of all comment no surf
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_comment_no_surf($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.comment_surf'=>0);
		$str_order=$this->_table.'.comment_create_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Count all Comment No Surf -----------------------
	  | Param:no
	  | Result:return number sum row of all comment no surf
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_comment_no_surf(){

		$str_select=$this->_table.'.comment_id';
		$arr_where=array($this->_table.'.comment_surf'=>0);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------- Show all Comment Surf -------------------------
	  | Param:no
	  | Result:return information of all comment surf
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_comment_surf($limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.comment_surf'=>1);
		$str_order=$this->_table.'.comment_create_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------- Count all Comment Surf ------------------------
	  | Param:no
	  | Result:return number sum row of all comment surf
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_comment_surf(){

		$str_select=$this->_table.'.comment_id';
		$arr_where=array($this->_table.'.comment_surf'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Insert Comment ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_comment($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ----------------------------- Update Comment ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_comment($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ----------------------------- Delete Comment ----------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_comment($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* ------------------------ Show Comment of Product ------------------------
	  | Param:product_id
	  | Result:return information comment of product
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_comment_one_product_front_end($product_id,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.comment_public'=>1,$this->_table.'.comment_product_news'=>$product_id,$this->_table.'.comment_type'=>1,$this->_table.'.comment_surf'=>1);
		$str_order=$this->_table.'.comment_create_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* -------------------------- Show Comment of News -------------------------
	  | Param:news_id
	  | Result:return information comment of news
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_comment_one_news_front_end($news_id,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.comment_public'=>1,$this->_table.'.comment_product_news'=>$news_id,$this->_table.'.comment_type'=>2,$this->_table.'.comment_surf'=>1);
		$str_order=$this->_table.'.comment_create_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

}

?>