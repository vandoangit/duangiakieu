<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_partner extends CI_Model{

	private $_table='partner';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ---------------------------- Show one Partner ---------------------------
	  | Param:partner_id,menu_class,cate_lang
	  | Result:return information of Partner
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_partner($partner_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.partner_id'=>$partner_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_partner_public($partner_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.partner_id'=>$partner_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------ Show Partner of Category -----------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information all Partner of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_partner_one_category($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.partner_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_partner_one_category_public($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.partner_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Count Partner of Category -----------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return number sum row Partner of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_partner_one_category($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.partner_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_partner_one_category_public($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.partner_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------------- Show all Partner ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Partner
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_partner($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.partner_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_partner_public($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.partner_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count all Partner ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of all Partner
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_partner($menu_class,$cate_lang){

		$str_select=$this->_table.'.partner_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_partner_public($menu_class,$cate_lang){

		$str_select=$this->_table.'.partner_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Insert Partner ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_partner($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ----------------------------- Update Partner ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_partner($arr_data,$arr_where){

		$str_select="partner_img";
		$this->db->select($str_select);
		$this->db->where($arr_where);
		$query=$this->db->get($this->_table);
		$partner_img=$query->row_array();
		if(isset($arr_data['partner_img']) && is_array($partner_img) && (element('partner_img',$partner_img,'') != $arr_data['partner_img']) && (element('partner_img',$partner_img,'') != '')){

			@unlink(PUBPATH.DIR_PUBLIC_IMG.element('partner_img',$partner_img,''));
			@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".element('partner_img',$partner_img,''));
		}

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ----------------------------- Delete Partner ----------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_partner($arr_where){

		$str_select="partner_img";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$partner_img=$query->row_array();

		$this->db->where($arr_where);
		if($this->db->delete($this->_table)){

			if(is_array($partner_img) && (element('partner_img',$partner_img,'') != '')){

				@unlink(PUBPATH.DIR_PUBLIC_IMG.element('partner_img',$partner_img,''));
				@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".element('partner_img',$partner_img,''));
			}
			return true;
		}
		return false;

	}

	/* ---------------------------- Show one Partner ---------------------------
	  | Param:partner_id,menu_class,cate_lang
	  | Result:return information of Partner
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_partner_front_end($partner_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.partner_id'=>$partner_id,$this->_table.'.partner_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------ Show Partner of Category -----------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information Partner of Category
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_partner_one_category_front_end($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.partner_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.partner_order asc';
		$str_order_1=$this->_table.'.partner_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Count Partner of Category -----------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return number sum row Partner of Category
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_partner_one_category_front_end($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.partner_id';
		$arr_where=array($this->_table.'.partner_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------------- Show all Partner ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Partner
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_partner_front_end($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.partner_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.partner_order asc';
		$str_order_1=$this->_table.'.partner_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count all Partner ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of all Partner
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_partner_front_end($menu_class,$cate_lang){

		$str_select=$this->_table.'.partner_id';
		$arr_where=array($this->_table.'.partner_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

}

?>