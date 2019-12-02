<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_news extends CI_Model{

	private $_table='news';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ----------------------------- Show one News -----------------------------
	  | Param:news_id,menu_class,cate_lang
	  | Result:return information of News
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_news($news_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.news_id'=>$news_id,'category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_news_public($news_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.news_id'=>$news_id,'category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ----------------------- Show News of Category ---------------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information News of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_news_one_category($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.news_order asc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_news_one_category_public($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);
		$str_order=$this->_table.'.news_order asc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------- Count News of Category ------------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return number sum row News of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_news_one_category($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.news_id';
		$arr_where=array('category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_news_one_category_public($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.news_id';
		$arr_where=array('category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Show all News -----------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all News
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_news($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.news_order asc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_news_public($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);
		$str_order=$this->_table.'.news_order asc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------------- Count all News ----------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of all News
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_news($menu_class,$cate_lang){

		$str_select=$this->_table.'.news_id';
		$arr_where=array('category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_news_public($menu_class,$cate_lang){

		$str_select=$this->_table.'.news_id';
		$arr_where=array('category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------------ Insert News ------------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_news($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ------------------------------ Update News ------------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_news($arr_data,$arr_where){

		$str_select="news_img";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$news_img=$query->result_array();

		if(is_array($news_img)){

			foreach($news_img as $key=> $value)
				if(isset($arr_data['news_img']) && (element('news_img',$value,'') != $arr_data['news_img']) && (element('news_img',$value,'') != '')){

					@unlink(PUBPATH.DIR_PUBLIC_IMG.element('news_img',$value,''));
					@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".element('news_img',$value,''));
				}
		}

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ------------------------------ Delete News ------------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin:có liên quan đến file m_category_news
	  |
	  ----------------------------------------------------------------------- */

	public function delete_news($arr_where){

		$str_select="news_img";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$news_img=$query->result_array();

		if(is_array($news_img)){

			foreach($news_img as $key=> $value)
				if(element('news_img',$value,'') != ''){

					@unlink(PUBPATH.DIR_PUBLIC_IMG.element('news_img',$value,''));
					@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".element('news_img',$value,''));
				}
		}
		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* ----------------------------- Show one News -----------------------------
	  | Param:news_id,menu_class,cate_lang
	  | Result:return information of News
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_news_front_end($news_id,$menu_class,$cate_lang){

		$str_select="*";
		$arr_where=array($this->_table.'.news_id'=>$news_id,$this->_table.'.news_public'=>1,'category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* -------------------------- Show one News Active -------------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information of News Active
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_news_active_front_end($arr_cate_id,$menu_class,$cate_lang){

		$str_select='*';
		$arr_where=array($this->_table.'.news_public'=>1,$this->_table.'.news_active'=>1,'category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ----------------------------- Show News New -----------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all News
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function latest_news_front_end($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.news_public'=>1,'category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);
		$str_order=$this->_table.'.news_update_date desc';
		$str_order_1=$this->_table.'.news_order asc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------------- Show News Order ----------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all News limit
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function news_order_front_end($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.news_public'=>1,'category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);
		$str_order=$this->_table.'.news_order asc';
		$str_order_1=$this->_table.'.news_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------------- Show News View ----------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all News limit
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function news_view_front_end($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.news_public'=>1,'category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);
		$str_order=$this->_table.'.news_view desc';
		$str_order_1=$this->_table.'.news_order asc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------------- Show News Active ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all News limit
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function news_active_front_end($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.news_public'=>1,$this->_table.'.news_active'=>1,'category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);
		$str_order=$this->_table.'.news_order asc';
		$str_order_1=$this->_table.'.news_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------- Show News Active One Category ---------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information News of Category active
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function news_active_category_front_end($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.news_public'=>1,$this->_table.'.news_active'=>1,'category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);
		$str_order=$this->_table.'.news_order asc';
		$str_order_1=$this->_table.'.news_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------- Show News of Category -------------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information News of Category
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_news_one_category_front_end($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.news_public'=>1,'category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);
		$str_order=$this->_table.'.news_order asc';
		$str_order_1=$this->_table.'.news_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------- Count News of Category ------------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return number sum row News of Category
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_news_one_category_front_end($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.news_id';
		$arr_where=array($this->_table.'.news_public'=>1,'category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Show all News -----------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all News
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_news_front_end($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.news_public'=>1,'category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);
		$str_order=$this->_table.'.news_order asc';
		$str_order_1=$this->_table.'.news_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------------- Count all News -----------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of all News
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_news_front_end($menu_class,$cate_lang){

		$str_select=$this->_table.'.news_id';
		$arr_where=array($this->_table.'.news_public'=>1,'category_news.menu_class'=>$menu_class,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------------ News Search ------------------------------
	  | Param:cate_lang,news_name,cate_id
	  | Result:return information of News
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function news_search_general_front_end($cate_lang,$key_search=NULL,$arr_cate_id=NULL,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$key_search=trim($key_search);
		$arr_key_search=explode(' ',$key_search);
		foreach($arr_key_search as $key=> $value){
			if(empty($value))
				unset($arr_key_search[$key]);
		}
		$key_search=implode('%',$arr_key_search);

		$where_key_search="(".$this->_table.".news_name LIKE '%".$key_search."%' OR ".$this->_table.".news_headline LIKE '%".$key_search."%' OR ".$this->_table.".news_content LIKE '%".$key_search."%')";

		$str_select='*';
		$arr_where=array($this->_table.'.news_public'=>1,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);

		$str_order=$this->_table.'.news_order asc';
		$str_order_1=$this->_table.'.news_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');

		if($arr_cate_id !== NULL)
			$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$this->db->where($arr_where);
		$this->db->where($where_key_search);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function news_search_front_end($cate_lang,$news_name=NULL,$arr_cate_id=NULL,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		if($news_name !== NULL)
			$this->db->like($this->_table.'.news_name',$news_name,'both');

		$str_select='*';
		$arr_where=array($this->_table.'.news_public'=>1,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);

		$str_order=$this->_table.'.news_order asc';
		$str_order_1=$this->_table.'.news_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');

		if($arr_cate_id !== NULL)
			$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count News Search ---------------------------
	  | Param:cate_lang,news_name,cate_id
	  | Result:return number sum row of News
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_news_search_general_front_end($cate_lang,$key_search=NULL,$arr_cate_id=NULL){

		$key_search=trim($key_search);
		$arr_key_search=explode(' ',$key_search);
		foreach($arr_key_search as $key=> $value){
			if(empty($value))
				unset($arr_key_search[$key]);
		}
		$key_search=implode('%',$arr_key_search);

		$where_key_search="(".$this->_table.".news_name LIKE '%".$key_search."%' OR ".$this->_table.".news_headline LIKE '%".$key_search."%' OR ".$this->_table.".news_content LIKE '%".$key_search."%')";

		$str_select='*';
		$arr_where=array($this->_table.'.news_public'=>1,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);

		$str_order=$this->_table.'.news_order asc';
		$str_order_1=$this->_table.'.news_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');

		if($arr_cate_id !== NULL)
			$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$this->db->where($arr_where);
		$this->db->where($where_key_search);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_news_search_front_end($cate_lang,$news_name=NULL,$arr_cate_id=NULL){

		if($news_name !== NULL)
			$this->db->like($this->_table.'.news_name',$news_name,'both');

		$str_select='*';
		$arr_where=array($this->_table.'.news_public'=>1,'category_news.cate_lang'=>$cate_lang,'category_news.cate_public'=>1);

		$str_order=$this->_table.'.news_order asc';
		$str_order_1=$this->_table.'.news_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_news',$this->_table.'.cate_id=category_news.cate_id');

		if($arr_cate_id !== NULL)
			$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

}

?>