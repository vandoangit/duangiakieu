<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_authorization_group extends CI_Model{

	private $_table="authorization_group";
	public $sess_authorization_group="authorization_group";

	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->library("session");

	}

	/* ----------------------------- Process Array -----------------------------
	  | Param:
	  | Result:
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function array_uniques($arr_uniques){
		$arr_result=array();
		$arr_result[0]=$arr_uniques[0];
		$count=0;

		foreach($arr_uniques as $key_uniques=> $value_uniques){
			$flag=true;
			foreach($arr_result as $key_result=> $value_result){
				if(($value_result['menu_class'] == $value_uniques['menu_class']) && ($value_result['sub_menu_function'] == $value_uniques['sub_menu_function']))
					$flag=false;
			}
			if($flag){

				$count++;
				$arr_result[$count]=$value_uniques;
			}
		}
		return $arr_result;

	}

	/* -------------------- Check Exist Authorization Group --------------------
	  | Param:user_group_id,menu_class,sub_menu_function
	  | Result:return information of groups the user
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function check_exist_authorization_group($user_group_id,$menu_class,$sub_menu_function){

		$str_select="user_group_id";
		$arr_where=array('user_group_id'=>$user_group_id,'menu_class'=>$menu_class,'sub_menu_function'=>$sub_menu_function);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		if($query->num_rows() > 0)
			return false;

		return true;

	}

	/* ----------------------- Check Authorization Group -----------------------
	  | Param:user_group_id
	  | Result:return authoriztion of one group combine with sub_menu_admin and menu_admin
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function check_authorization_group($user_group_id){

		$str_select="*";
		$arr_where=array('user_group_id'=>$user_group_id);
		$str_order="menu_class asc";

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------- Check Authorization one Menu ---------------------
	  | Param:menu_class,sub_menu_function
	  | Result:check user current there are allow access to menu current
	  |        return true if allow access,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function check_authorization_one_menu($menu_class,$sub_menu_function=NULL){

		$arr_authorization=$this->session->userdata($this->sess_authorization_group);

		foreach($arr_authorization as $key_authorization=> $value_authorization){
			if($value_authorization['menu_class'] == 'all')
				return true;
			else if(($value_authorization['menu_class'] == $menu_class) && ($sub_menu_function === NULL))
				return true;
			else if(($value_authorization['menu_class'] == $menu_class) && ($value_authorization['sub_menu_function'] == $sub_menu_function))
				return true;
		}
		return false;

	}

	/* ----------------------- Check Authorization Group -----------------------
	  | Param:user_group_id,menu_lang
	  | Result:return authoriztion of one group combine with sub_menu_admin and menu_admin
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_authorization_one_group($user_group_id,$menu_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='sub_menu_admin.sub_menu_name,'.$this->_table.'.*';
		$arr_where=array($this->_table.'.user_group_id'=>$user_group_id,'menu_admin.menu_public'=>'1','menu_admin.menu_lang'=>$menu_lang,'sub_menu_admin.sub_menu_public'=>'1','sub_menu_admin.sub_menu_lang'=>$menu_lang);
		$arr_where_or="(".$this->_table.".menu_class='all' AND ".$this->_table.".user_group_id='".$user_group_id."')";
		$str_order="menu_admin.menu_order asc,sub_menu_admin.sub_menu_order asc";

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->or_where($arr_where_or);
		$this->db->join("menu_admin",$this->_table.'.menu_class=menu_admin.menu_class','left');
		$this->db->join("sub_menu_admin",$this->_table.'.sub_menu_function=sub_menu_admin.sub_menu_function and '.$this->_table.'.menu_class=sub_menu_admin.menu_class','left');
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Check Authorization Group -----------------------
	  | Param:user_group_id,menu_lang
	  | Result:return authoriztion of one group combine with sub_menu_admin and menu_admin
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_authorization_one_group($user_group_id,$menu_lang){

		$str_select=$this->_table.".user_group_id";
		$arr_where=array($this->_table.'.user_group_id'=>$user_group_id,'menu_admin.menu_public'=>'1','menu_admin.menu_lang'=>$menu_lang,'sub_menu_admin.sub_menu_public'=>'1','sub_menu_admin.sub_menu_lang'=>$menu_lang);
		$arr_where_or="(".$this->_table.".menu_class='all' AND ".$this->_table.".user_group_id='".$user_group_id."')";

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->or_where($arr_where_or);
		$this->db->join("menu_admin",$this->_table.'.menu_class=menu_admin.menu_class','left');
		$this->db->join("sub_menu_admin",$this->_table.'.sub_menu_function=sub_menu_admin.sub_menu_function and '.$this->_table.'.menu_class=sub_menu_admin.menu_class','left');

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------- Insert Authorization Group ----------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_authorization_group($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ----------------------- Delete Authorization Group ----------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_authorization_group($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

}

?>