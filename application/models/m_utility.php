<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_utility extends CI_Model{

	private $_table='utility';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ---------------------------- Show one Utility ---------------------------
	  | Param:utility_id,utility_lang
	  | Result:return information of Utility
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_utility($utility_id,$utility_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.utility_id'=>$utility_id,'utility_lang'=>$utility_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ---------------------------- Show all Utility ---------------------------
	  | Param:utility_lang
	  | Result:return information of all Utility
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_utility($utility_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('utility_lang'=>$utility_lang);
		$str_order='utility_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count all Utility ---------------------------
	  | Param:utility_lang
	  | Result:return number sum row of all Utility
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_utility($utility_lang){

		$str_select='utility_id';
		$arr_where=array('utility_lang'=>$utility_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Insert Utility ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_utility($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ----------------------------- Update Utility ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_utility($arr_data,$arr_where){

		$str_select="utility_img";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$utility_img=$query->row_array();

		if(isset($arr_data['utility_img']) && is_array($utility_img) && (element('utility_img',$utility_img,'') != $arr_data['utility_img']) && (element('utility_img',$utility_img,'') != '')){

			@unlink(PUBPATH.DIR_PUBLIC_IMG.element('utility_img',$utility_img,''));
			@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".element('utility_img',$utility_img,''));
		}

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ----------------------------- Delete Utility ----------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_utility($arr_where){

		$str_select="utility_img";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$utility_img=$query->row_array();

		$this->db->where($arr_where);
		if($this->db->delete($this->_table)){

			if(is_array($utility_img) && (element('utility_img',$utility_img,'') != '')){

				@unlink(PUBPATH.DIR_PUBLIC_IMG.element('utility_img',$utility_img,''));
				@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".element('utility_img',$utility_img,''));
			}
			return true;
		}
		return false;

	}

	/* ---------------------------- Show all Utility ---------------------------
	  | Param:utility_lang
	  | Result:return information of all Utility
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_utility_front_end($utility_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('utility_lang'=>$utility_lang,'utility_public'=>1);
		$str_order='utility_order asc';
		$str_order_1='utility_update_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

}

?>