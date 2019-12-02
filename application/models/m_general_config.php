<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_general_config extends CI_Model{

	private $_table="general_config";

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ------------------------------ Show Config ------------------------------
	  | Param:general_config_id,lang
	  | Result:return information of a config
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_config_general($arr_where_in,$lang){

		$str_select="*";
		$arr_where=array('config_lang'=>$lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.general_config_id',$arr_where_in);

		$query=$this->db->get($this->_table);
		$arr_general_config=$query->result_array();

		if(is_array($arr_general_config) && (!empty($arr_general_config))){

			$arr_result=array();
			foreach($arr_general_config as $key=> $value){
				$arr_result[element('general_config_id',$value,false)]=element('general_config_value',$value,'');
			}
			return $arr_result;
		}
		else
			return false;

	}

	/* ---------------------------- Show Seo Config ----------------------------
	  | Param:lang
	  | Result:return information of config
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_seo_config($lang){

		$str_select="*";
		$arr_where=array('config_lang'=>$lang);
		$arr_where_in=array('title_web','keyword_web','description_web','footer_front_end');

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.general_config_id',$arr_where_in);

		$query=$this->db->get($this->_table);
		$arr_general_config=$query->result_array();

		if(is_array($arr_general_config) && (!empty($arr_general_config))){

			$arr_result=array();
			foreach($arr_general_config as $key=> $value){
				$arr_result[element('general_config_id',$value,false)]=element('general_config_value',$value,'');
			}
			return $arr_result;
		}
		else
			return false;

	}

	/* ---------------------------- Show Page Config ---------------------------
	  | Param:no
	  | Result:return information of config
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_page_config(){

		$str_select="*";
		$arr_where_in=array('product_page','search_product_page','news_page');

		$this->db->select($str_select);
		$this->db->where_in($this->_table.'.general_config_id',$arr_where_in);

		$query=$this->db->get($this->_table);
		$arr_general_config=$query->result_array();

		if(is_array($arr_general_config) && (!empty($arr_general_config))){

			$arr_result=array();
			foreach($arr_general_config as $key=> $value){
				$arr_result[element('general_config_id',$value,false)]=element('general_config_value',$value,'');
			}
			return $arr_result;
		}
		else
			return false;

	}

	/* ---------------------------- Show Facebook Config ---------------------------
	  | Param:no
	  | Result:return information of config
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_facebook_config(){

		$str_select="*";
		$arr_where_in=array('facebook_user_id','facebook_fanpage');

		$this->db->select($str_select);
		$this->db->where_in($this->_table.'.general_config_id',$arr_where_in);

		$query=$this->db->get($this->_table);
		$arr_general_config=$query->result_array();

		if(is_array($arr_general_config) && (!empty($arr_general_config))){

			$arr_result=array();
			foreach($arr_general_config as $key=> $value){
				$arr_result[element('general_config_id',$value,false)]=element('general_config_value',$value,'');
			}
			return $arr_result;
		}
		else
			return false;

	}

	/* --------------------------- Show Static Config --------------------------
	  | Param:no
	  | Result:return information of config
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_static_config(){

		$str_select="*";
		$arr_where_in=array('static_online_virtual','static_count_virtual');

		$this->db->select($str_select);
		$this->db->where_in($this->_table.'.general_config_id',$arr_where_in);

		$query=$this->db->get($this->_table);
		$arr_general_config=$query->result_array();

		if(is_array($arr_general_config) && (!empty($arr_general_config))){

			$arr_result=array();
			foreach($arr_general_config as $key=> $value){
				$arr_result[element('general_config_id',$value,false)]=element('general_config_value',$value,'');
			}
			return $arr_result;
		}
		else
			return false;

	}

	/* ------------------------- Show Send Email Config ------------------------
	  | Param:
	  | Result:return information of  config
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_send_email_config(){

		$str_select="*";
		$arr_where_in=array('email_server_smtp','email_port_smtp','email_secure_smtp','email_debug_smtp','email_your_name','email_email_smtp','email_pass_smtp');

		$this->db->select($str_select);
		$this->db->where_in($this->_table.'.general_config_id',$arr_where_in);

		$query=$this->db->get($this->_table);
		$arr_general_config=$query->result_array();

		if(is_array($arr_general_config) && (!empty($arr_general_config))){

			$arr_result=array();
			foreach($arr_general_config as $key=> $value){
				$arr_result[element('general_config_id',$value,false)]=element('general_config_value',$value,'');
			}
			return $arr_result;
		}
		else
			return false;

	}

	/* ----------------------------- Update Config -----------------------------
	  | Param:$arr_data_general_config:array with key is condition need update and value is data need update
	  | Result:return true if update successful else false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_general_config($arr_data_general_config,$arr_lang_in){

		foreach($arr_data_general_config as $key=> $value){

			$arr_where=array('general_config_id'=>$key);

			$this->db->where($arr_where);
			$this->db->where_in('config_lang',$arr_lang_in);

			$arr_data=array('general_config_value'=>$value);
			if(!$this->db->update($this->_table,$arr_data))
				return false;
		}
		return true;

	}

}

?>