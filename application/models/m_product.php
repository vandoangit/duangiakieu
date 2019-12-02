<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_product extends CI_Model{

	private $_table='product';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ---------------------------- Check Product ID ---------------------------
	  | Param:product_id
	  | Result:return true if isset else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function check_product_id($product_id){

		$str_select="product_id";
		$arr_where=array('product_id'=>$product_id);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		if($query->num_rows() > 0)
			return true;

		return false;

	}

	/* ---------------------------- Show one Product ---------------------------
	  | Param:product_id,menu_class,cate_lang
	  | Result:return information of Product
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_product_order($product_id){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.product_id'=>$product_id);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_product($product_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.product_id'=>$product_id,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_product_public($product_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.product_id'=>$product_id,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------ Show Product of Category -----------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information Product of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_product_one_category($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.product_order asc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_product_one_category_public($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);
		$str_order=$this->_table.'.product_order asc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Count Product of Category -----------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return number sum row Product of a Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_product_one_category($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.product_id';
		$arr_where=array('category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_product_one_category_public($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.product_id';
		$arr_where=array('category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------------- Show all Product ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Product
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_product($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.product_order asc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_product_public($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);
		$str_order=$this->_table.'.product_order asc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count all Product ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of all Product
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_product($menu_class,$cate_lang){

		$str_select=$this->_table.'.product_id';
		$arr_where=array('category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_product_public($menu_class,$cate_lang){

		$str_select=$this->_table.'.product_id';
		$arr_where=array('category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Insert Product ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_product($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ----------------------------- Update Product ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_product($arr_data,$arr_where){

		$str_select="product_img,product_buy,product_number";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$product_img=$query->row_array();

		if(is_array($product_img) && isset($arr_data['product_img'])){

			$arr_image_old=@unserialize(element('product_img',$product_img,''));
			$arr_image_new=@unserialize(element('product_img',$arr_data,''));
			if(is_array($arr_image_old)){

				foreach($arr_image_old as $key=> $value){
					if((!isset($arr_image_new[$key])) || (($arr_image_old[$key] != $arr_image_new[$key]) && ($arr_image_old[$key] != ''))){

						@unlink(PUBPATH.DIR_PUBLIC_IMG.$arr_image_old[$key]);
						@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".$arr_image_old[$key]);
					}
				}
			}
		}

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ----------------------------- Delete Product ----------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin:có liên quan đến file m_category_product
	  |
	  ----------------------------------------------------------------------- */

	public function delete_product($arr_where){

		$str_select="product_img";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$product_img=$query->row_array();

		if(is_array($product_img)){

			$arr_image=@unserialize(element('product_img',$product_img,''));
			if(is_array($arr_image)){

				foreach($arr_image as $key=> $value){
					@unlink(PUBPATH.DIR_PUBLIC_IMG.$value);
					@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".$value);
				}
			}
		}
		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* ---------------------------- Show one Product ---------------------------
	  | Param:product_id,menu_class,cate_lang
	  | Result:return information of Product
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_product_order_front_end($product_id){

		$str_select=$this->_table.".*,category_product.menu_class,category_product.cate_name,category_product.cate_alias";
		$arr_where=array($this->_table.'.product_id'=>$product_id,$this->_table.'.product_public'=>1,'category_product.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_product_front_end($product_id,$menu_class,$cate_lang){

		$str_select="*";
		$arr_where=array($this->_table.'.product_id'=>$product_id,$this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ----------------- Show Product Prominent One Category -------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information of all Product Prominent Of Category
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function product_prominent_category_front_end($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.product_public'=>1,$this->_table.'.product_prominent'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);
		$str_order=$this->_table.'.product_order asc';
		$str_order_1=$this->_table.'.product_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------ Show Product Prominent -------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Product Prominent
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function product_prominent_front_end($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.product_public'=>1,$this->_table.'.product_prominent'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);
		$str_order=$this->_table.'.product_order asc';
		$str_order_1=$this->_table.'.product_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------ Count Product Prominent ------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of Product Prominent
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_product_prominent_front_end($menu_class,$cate_lang){

		$str_select=$this->_table.'.product_id';
		$arr_where=array($this->_table.'.product_public'=>1,$this->_table.'.product_prominent'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------------- Show Product New ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Product
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function product_new_front_end($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);
		$str_order=$this->_table.'.product_update_date desc';
		$str_order_1=$this->_table.'.product_order asc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count Product New ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of Product New
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_product_new_front_end($menu_class,$cate_lang){

		$str_select=$this->_table.'.product_id';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* --------------------------- Show Product View ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Product
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function product_view_front_end($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);
		$str_order=$this->_table.'.product_view desc';
		$str_order_1=$this->_table.'.product_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count Product View --------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of Product View
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_product_view_front_end($menu_class,$cate_lang){

		$str_select=$this->_table.'.product_id';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------------- Show Product Buy ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Product
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function product_buy_front_end($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);
		$str_order=$this->_table.'.product_buy desc';
		$str_order_1=$this->_table.'.product_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count Product Buy ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of Product Buy
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_product_buy_front_end($menu_class,$cate_lang){

		$str_select=$this->_table.'.product_id';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------ Show Product of Category -----------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information Product of Category
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_product_one_category_front_end($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);
		$str_order=$this->_table.'.product_order asc';
		$str_order_1=$this->_table.'.product_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Count Product of Category -----------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return number sum row Product of Category
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_product_one_category_front_end($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.product_id';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------ Show Product of Partner ------------------------
	  | Param:product_partner,menu_class,cate_lang
	  | Result:return information Product of Parnter
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_product_one_partner_front_end($product_partner,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.product_partner'=>$product_partner,$this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);
		$str_order=$this->_table.'.product_order asc';
		$str_order_1=$this->_table.'.product_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------ Count Product of Partner -----------------------
	  | Param:product_partner,menu_class,cate_lang
	  | Result:return number sum row Product of Partner
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_product_one_partner_front_end($product_partner,$menu_class,$cate_lang){

		$str_select=$this->_table.'.product_id';
		$arr_where=array($this->_table.'.product_partner'=>$product_partner,$this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------- Show Product of Application ----------------------
	  | Param:product_application,menu_class,cate_lang
	  | Result:return information Product of Application
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_product_one_application_front_end($product_application,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);
		$where_key_search="(".$this->_table.".product_application LIKE '%\"".trim($product_application)."\"%')";
		$str_order=$this->_table.'.product_order asc';
		$str_order_1=$this->_table.'.product_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->where($where_key_search);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------- Count Product of Application ---------------------
	  | Param:product_application,menu_class,cate_lang
	  | Result:return number sum row Product of Application
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_product_one_application_front_end($product_application,$menu_class,$cate_lang){

		$str_select=$this->_table.'.product_id';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);
		$where_key_search="(".$this->_table.".product_application LIKE '%\"".trim($product_application)."\"%')";

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->where($where_key_search);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------------- Show all Product ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Product
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_product_front_end($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);
		$str_order=$this->_table.'.product_order asc';
		$str_order_1=$this->_table.'.product_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count all Product ---------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of all Product
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_product_front_end($menu_class,$cate_lang){

		$str_select=$this->_table.'.product_id';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.menu_class'=>$menu_class,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Product Search ----------------------------
	  | Param:cate_lang,product_name,cate_id,product_price_begin,product_price_end
	  | Result:return information of Product
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function product_search_general_front_end($cate_lang,$key_search=NULL,$arr_cate_id=NULL,$product_price_begin=NULL,$product_price_end=NULL,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		if(!empty($product_price_begin) && !empty($product_price_end) && ($product_price_begin > $product_price_end))
			return array();

		if($key_search !== NULL && !empty($key_search)){

			$key_search=trim($key_search);
			$arr_key_search=explode(' ',$key_search);
			foreach($arr_key_search as $key=> $value){
				if(empty($value))
					unset($arr_key_search[$key]);
			}
			$key_search=implode('%',$arr_key_search);

			$where_key_search="(".$this->_table.".product_name LIKE '%".$key_search."%' OR ".$this->_table.".product_headline LIKE '%".$key_search."%' OR ".$this->_table.".product_content LIKE '%".$key_search."%')";
		}

		$str_select='*';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		if($product_price_begin !== NULL && !empty($product_price_begin))
			$arr_where[$this->_table.'.product_price >=']=$product_price_begin;

		if($product_price_end !== NULL && !empty($product_price_end))
			$arr_where[$this->_table.'.product_price <=']=$product_price_end;

		$str_order=$this->_table.'.product_order asc';
		$str_order_1=$this->_table.'.product_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');

		if($arr_cate_id !== NULL && !empty($arr_cate_id))
			$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$this->db->where($arr_where);
		$this->db->where($where_key_search);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function product_search_front_end($cate_lang,$product_name=NULL,$arr_cate_id=NULL,$product_price_begin=NULL,$product_price_end=NULL,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		if(!empty($product_price_begin) && !empty($product_price_end) && ($product_price_begin > $product_price_end))
			return array();

		if($product_name !== NULL && !empty($product_name)){

			$product_name=trim($product_name);
			$arr_product_name=explode(' ',$product_name);
			foreach($arr_product_name as $key=> $value){
				if(empty($value))
					unset($arr_product_name[$key]);
			}
			$product_name=implode('%',$arr_product_name);

			$this->db->like($this->_table.'.product_name',$product_name,'both');
		}

		$str_select='*';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		if($product_price_begin !== NULL && !empty($product_price_begin))
			$arr_where[$this->_table.'.product_price >=']=$product_price_begin;

		if($product_price_end !== NULL && !empty($product_price_end))
			$arr_where[$this->_table.'.product_price <=']=$product_price_end;

		$str_order=$this->_table.'.product_order asc';
		$str_order_1=$this->_table.'.product_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');

		if($arr_cate_id !== NULL && !empty($arr_cate_id))
			$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* -------------------------- Count Product Search -------------------------
	  | Param:cate_lang,product_name,cate_id,product_price_begin,product_price_end
	  | Result:return number sum row of Product
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_product_search_general_front_end($cate_lang,$key_search=NULL,$arr_cate_id=NULL,$product_price_begin=NULL,$product_price_end=NULL){

		if(!empty($product_price_begin) && !empty($product_price_end) && ($product_price_begin > $product_price_end))
			return array();

		if($key_search !== NULL && !empty($key_search)){

			$key_search=trim($key_search);
			$arr_key_search=explode(' ',$key_search);
			foreach($arr_key_search as $key=> $value){
				if(empty($value))
					unset($arr_key_search[$key]);
			}
			$key_search=implode('%',$arr_key_search);

			$where_key_search="(".$this->_table.".product_name LIKE '%".$key_search."%' OR ".$this->_table.".product_headline LIKE '%".$key_search."%' OR ".$this->_table.".product_content LIKE '%".$key_search."%')";
		}

		$str_select='*';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		if($product_price_begin !== NULL && !empty($product_price_begin))
			$arr_where[$this->_table.'.product_price >=']=$product_price_begin;

		if($product_price_end !== NULL && !empty($product_price_end))
			$arr_where[$this->_table.'.product_price <=']=$product_price_end;

		$str_order=$this->_table.'.product_order asc';
		$str_order_1=$this->_table.'.product_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');

		if($arr_cate_id !== NULL && !empty($arr_cate_id))
			$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$this->db->where($arr_where);
		$this->db->where($where_key_search);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_product_search_front_end($cate_lang,$product_name=NULL,$arr_cate_id=NULL,$product_price_begin=NULL,$product_price_end=NULL){

		if(!empty($product_price_begin) && !empty($product_price_end) && ($product_price_begin > $product_price_end))
			return array();

		if($product_name !== NULL && !empty($product_name)){

			$product_name=trim($product_name);
			$arr_product_name=explode(' ',$product_name);
			foreach($arr_product_name as $key=> $value){
				if(empty($value))
					unset($arr_product_name[$key]);
			}
			$product_name=implode('%',$arr_product_name);

			$this->db->like($this->_table.'.product_name',$product_name,'both');
		}

		$str_select='*';
		$arr_where=array($this->_table.'.product_public'=>1,'category_product.cate_lang'=>$cate_lang,'category_product.cate_public'=>1);

		if($product_price_begin !== NULL && !empty($product_price_begin))
			$arr_where[$this->_table.'.product_price >=']=$product_price_begin;

		if($product_price_end !== NULL && !empty($product_price_end))
			$arr_where[$this->_table.'.product_price <=']=$product_price_end;

		$str_order=$this->_table.'.product_order asc';
		$str_order_1=$this->_table.'.product_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_product',$this->_table.'.cate_id=category_product.cate_id');

		if($arr_cate_id !== NULL && !empty($arr_cate_id))
			$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Update Product ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function update_product_front_end($arr_data,$arr_where){

		$str_select="product_buy,product_number";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$product=$query->row_array();

		if(is_array($product) && isset($arr_data['product_buy']))
			$arr_data['product_buy']=$product['product_buy'] + $arr_data['product_buy'];

		if(is_array($product) && isset($arr_data['product_number']))
			$arr_data['product_number']=$product['product_number'] - $arr_data['product_number'];

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

}

?>