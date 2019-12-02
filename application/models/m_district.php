<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_district extends CI_Model{

	private $_table='district';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* --------------------------- Show one District ---------------------------
	  | Param:district_id,province_lang
	  | Result:return information of District
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_district($district_id,$province_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.district_id'=>$district_id,'province.province_lang'=>$province_lang);

		$this->db->select($str_select);
		$this->db->join('province',$this->_table.'.province_id=province.province_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_district_public($district_id,$province_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.district_id'=>$district_id,'province.province_lang'=>$province_lang,'province.province_public'=>1);

		$this->db->select($str_select);
		$this->db->join('province',$this->_table.'.province_id=province.province_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ----------------------- Show District of Province -----------------------
	  | Param:province_id,province_lang
	  | Result:return information District of Province
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_district_one_province($province_id,$province_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.province_id'=>$province_id,'province.province_lang'=>$province_lang);
		$str_order=$this->_table.'.district_order asc';

		$this->db->select($str_select);
		$this->db->join('province',$this->_table.'.province_id=province.province_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_district_one_province_public($province_id,$province_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.province_id'=>$province_id,'province.province_lang'=>$province_lang,'province.province_public'=>1);
		$str_order=$this->_table.'.district_order asc';

		$this->db->select($str_select);
		$this->db->join('province',$this->_table.'.province_id=province.province_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------- Count District of Province -----------------------
	  | Param:province_id,province_lang
	  | Result:return number sum row District of Province
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_district_one_province($province_id,$province_lang){

		$str_select=$this->_table.'.district_id';
		$arr_where=array($this->_table.'.province_id'=>$province_id,'province.province_lang'=>$province_lang);

		$this->db->select($str_select);
		$this->db->join('province',$this->_table.'.province_id=province.province_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_district_one_province_public($province_id,$province_lang){

		$str_select=$this->_table.'.district_id';
		$arr_where=array($this->_table.'.province_id'=>$province_id,'province.province_lang'=>$province_lang,'province.province_public'=>1);

		$this->db->select($str_select);
		$this->db->join('province',$this->_table.'.province_id=province.province_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* --------------------------- Show all District ---------------------------
	  | Param:province_lang
	  | Result:return information of all District
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_district($province_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('province.province_lang'=>$province_lang);
		$str_order=$this->_table.'.district_order asc';

		$this->db->select($str_select);
		$this->db->join('province',$this->_table.'.province_id=province.province_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_district_public($province_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('province.province_lang'=>$province_lang,'province.province_public'=>1);
		$str_order=$this->_table.'.district_order asc';

		$this->db->select($str_select);
		$this->db->join('province',$this->_table.'.province_id=province.province_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count all District --------------------------
	  | Param:province_lang
	  | Result:return number sum row of all District
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_district($province_lang){

		$str_select=$this->_table.'.district_id';
		$arr_where=array('province.province_lang'=>$province_lang);

		$this->db->select($str_select);
		$this->db->join('province',$this->_table.'.province_id=province.province_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_district_public($province_lang){

		$str_select=$this->_table.'.district_id';
		$arr_where=array('province.province_lang'=>$province_lang,'province.province_public'=>1);

		$this->db->select($str_select);
		$this->db->join('province',$this->_table.'.province_id=province.province_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------------- Insert District ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_district($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ---------------------------- Update District ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_district($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ---------------------------- Delete District ----------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_district($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* --------------------------- Show all District ---------------------------
	  | Param:province_lang
	  | Result:return information of all District
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_district_front_end($province_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.district_public'=>1,'province.province_lang'=>$province_lang,'province.province_public'=>1);
		$str_order=$this->_table.'.district_order asc';
		$str_order_1=$this->_table.'.district_update_date desc';

		$this->db->select($str_select);
		$this->db->join('province',$this->_table.'.province_id=province.province_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Show District of Province -----------------------
	  | Param:province_id,province_lang
	  | Result:return information District of Province
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_district_one_province_front_end($province_id,$province_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.province_id'=>$province_id,$this->_table.'.district_public'=>1,'province.province_lang'=>$province_lang,'province.province_public'=>1);
		$str_order=$this->_table.'.district_order asc';
		$str_order_1=$this->_table.'.district_update_date desc';

		$this->db->select($str_select);
		$this->db->join('province',$this->_table.'.province_id=province.province_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

}

?>