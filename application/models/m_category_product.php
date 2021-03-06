<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_category_product extends CI_Model{

	private $_table="category_product";

	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->Model(array('m_product'));
		$this->load->helper('general_page');

	}

	/* ----------------------- Show one Category Product -----------------------
	  | Param:menu_class,cate_id,cate_lang
	  | Result:return information of Category Product
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_category_product($cate_id,$menu_class,$cate_lang){

		$str_select='*';
		$arr_where=array('cate_id'=>$cate_id,'menu_class'=>$menu_class,'cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_category_product_public($cate_id,$menu_class,$cate_lang){

		$str_select='*';
		$arr_where=array('cate_id'=>$cate_id,'menu_class'=>$menu_class,'cate_lang'=>$cate_lang,'cate_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ----------------------- Show Category Product Root ----------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of Category Product Root
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_category_product_root($menu_class,$cate_lang){

		$str_select='*';
		$arr_where=array('menu_class'=>$menu_class,'cate_lang'=>$cate_lang,'cate_parent'=>'0');
		$str_order='cate_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_category_product_root_public($menu_class,$cate_lang){

		$str_select='*';
		$arr_where=array('menu_class'=>$menu_class,'cate_lang'=>$cate_lang,'cate_parent'=>'0','cate_public'=>1);
		$str_order='cate_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------- Show Category Product of Menu ---------------------
	  | Param:menu_class,cate_lang,update(cate_id)
	  | Result:return information Category Product of Menu
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_category_product_one_menu_admin($menu_class,$cate_lang,$update=false){

		$str_select="*";
		$arr_where=array('menu_class'=>$menu_class,'cate_lang'=>$cate_lang);
		if($update !== false)
			$arr_where['cate_id !=']=$update;

		$str_order='cate_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_category_product_one_menu_admin_public($menu_class,$cate_lang,$update=false){

		$str_select="*";
		$arr_where=array('menu_class'=>$menu_class,'cate_lang'=>$cate_lang,'cate_public'=>1);
		if($update !== false)
			$arr_where['cate_id !=']=$update;

		$str_order='cate_order asc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------ Insert Category Product ------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_category_product($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ------------------------ Update Category Product ------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_category_product($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ------------------------ Delete Category Product ------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_category_product($arr_where,$table_class=false){

		$str_select="cate_id";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$arr_category_product=$query->result_array();

		$this->db->where($arr_where);
		if($this->db->delete($this->_table) === false)
			return false;

		if($arr_category_product){

			foreach($arr_category_product as $key=> $value){
				if($table_class !== false){

					$arr_where_temp=array('cate_id'=>$value['cate_id']);
					$this->m_product->delete_product($arr_where_temp);
				}

				$arr_where_temp=array('cate_parent'=>$value['cate_id']);
				$this->delete_category_product($arr_where_temp,$table_class);
			}
		}
		return true;

	}

	/* -------------------------- Get Cate ID Product --------------------------
	  | Param:cate_id,cate_lang
	  | Result:return information of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_category_product_id($cate_id,$cate_lang,$result=''){

		$result[]=$cate_id;

		$str_select='cate_id';
		$arr_where=array('cate_parent'=>$cate_id,'cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$arr_result=$query->result_array();
		if(is_array($arr_result)){

			foreach($arr_result as $key=> $value){
				$result=$this->get_category_product_id($value['cate_id'],$cate_lang,$result);
			}
		}
		return $result;

	}

	public function get_category_product_id_public($cate_id,$cate_lang,$result=''){

		$result[]=$cate_id;

		$str_select='cate_id';
		$arr_where=array('cate_parent'=>$cate_id,'cate_lang'=>$cate_lang,'cate_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$arr_result=$query->result_array();
		if(is_array($arr_result)){

			foreach($arr_result as $key=> $value){
				$result=$this->get_category_product_id_public($value['cate_id'],$cate_lang,$result);
			}
		}
		return $result;

	}

	/* ----------------------- Show Category Add Category ----------------------
	  | Param:arr_category_product,parent_id,field_name,field_value,level,str_add
	  | Result:return string select add category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function recursive_category_product_level($arr_category_product,$parent_id,$field_name,$field_value,$level=true,$str_add='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$result='',$number_loop=0){

		$str_add_temp='';
		for($i=0; $i < $number_loop; $i++)
			$str_add_temp.=$str_add;

		$number_loop++;

		if(($number_loop <= $level - 1) || ($level === true)){

			foreach($arr_category_product as $key=> $value){
				if(element('cate_parent',$value,'') == $parent_id){

					unset($arr_category_product[$key]);
					if(isset($_POST[$field_name]) && ($_POST[$field_name] == element('cate_id',$value,'')))
						$selected="selected";
					else if(!isset($_POST[$field_name]) && ($field_value == element('cate_id',$value,'')))
						$selected="selected";
					else
						$selected="";

					$temp_string="<option value='".element('cate_id',$value,'')."' ".$selected.">";
					$temp_string.="&nbsp;&nbsp;&nbsp;".$str_add_temp."&#187;&nbsp;".element('cate_name',$value,'')."</option>";

					$result.=$this->recursive_category_product_level($arr_category_product,element('cate_id',$value,''),$field_name,$field_value,$level,$str_add,$temp_string,$number_loop);
				}
			}
		}
		return $result;

	}

	/* ----------------------- Show Category Add Product -----------------------
	  | Param:arr_category_product,parent_id,field_name,field_value,str_add
	  | Result:return string category add product
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function recursive_category_product_add($arr_category_product,$parent_id,$field_name,$field_value,$str_add='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$result='',$number_loop=0){

		$str_add_temp='';
		for($i=0; $i < $number_loop; $i++)
			$str_add_temp.=$str_add;

		$number_loop++;

		foreach($arr_category_product as $key=> $value){
			if(element('cate_parent',$value,'') == $parent_id){

				unset($arr_category_product[$key]);
				if(isset($_POST[$field_name]) && ($_POST[$field_name] == element('cate_id',$value,'')))
					$selected="selected";
				else if(!isset($_POST[$field_name]) && ($field_value == element('cate_id',$value,'')))
					$selected="selected";
				else
					$selected="";

				$temp_string="<option value='".element('cate_id',$value,'')."' ".$selected.">";
				$temp_string.="&nbsp;&nbsp;&nbsp;".$str_add_temp."&#187;&nbsp;".element('cate_name',$value,'')."</option>";

				$result.=$this->recursive_category_product_add($arr_category_product,element('cate_id',$value,''),$field_name,$field_value,$str_add,$temp_string,$number_loop);
			}
		}
		return $result;

	}

	public function recursive_category_product_add_multi($arr_category_product,$parent_id,$field_name,$field_value,$str_add='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$result='',$number_loop=0){

		$str_add_temp='';
		for($i=0; $i < $number_loop; $i++)
			$str_add_temp.=$str_add;

		$number_loop++;

		foreach($arr_category_product as $key=> $value){
			if(element('cate_parent',$value,'') == $parent_id){

				unset($arr_category_product[$key]);

				$selected="";
				if(isset($_POST[$field_name])){

					$arr_select=$_POST[$field_name];
					if(!is_array($arr_select))
						$arr_select=array();

					if(in_array(element('cate_id',$value,''),$arr_select))
						$selected="selected";
				}
				else if(!isset($_POST[$field_name])){

					$arr_select=@unserialize($field_value);
					if(!is_array($arr_select))
						$arr_select=array();

					if(in_array(element('cate_id',$value,''),$arr_select))
						$selected="selected";
				}

				$temp_string="<option value='".element('cate_id',$value,'')."' ".$selected.">";
				$temp_string.="&nbsp;&nbsp;&nbsp;".$str_add_temp."&#187;&nbsp;".element('cate_name',$value,'')."</option>";

				$result.=$this->recursive_category_product_add($arr_category_product,element('cate_id',$value,''),$field_name,$field_value,$str_add,$temp_string,$number_loop);
			}
		}
		return $result;

	}

	/* ---------------------- Show Category Table Product ----------------------
	  | Param:arr_data,parent_id,limit_x,limit_y,str_add
	  | Result:return string table product
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function recursive_category_product_table($arr_data,$parent_id,$str_add='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$result=array('content'=>'','count_record'=>0),$number_loop=0){

		$str_add_temp='';
		for($i=0; $i < $number_loop; $i++)
			$str_add_temp.=$str_add;

		$number_loop++;

		if(is_array(element('category_product',$arr_data,''))){

			foreach(element('category_product',$arr_data,array()) as $key=> $value){
				if(element('cate_parent',$value,'') == $parent_id){

					unset($arr_data['category_product'][$key]);
					$temp_string['count_record']=$result['count_record'] + 1;
					$temp_string['content']='';

					$string_public=(element('cate_public',$value,'') == 1) ? "ajax_public_yes" : "ajax_public_no";
					$string_update_public=($arr_data['authorization']['upcategory']) ? "<div align='center' class='".$string_public." ajax_update_public' update_public_param='".element('cate_id',$value,'')."' >&nbsp;</div> " : "<div align='center' class='".$string_public."' >&nbsp;</div>";
					$string_update_order=($arr_data['authorization']['upcategory']) ? "<div align='center' class='ajax_update_order_input' update_order_param='".element('cate_id',$value,'')."' >".element('cate_order',$value,'')."</div> " : "<div align='center'>".element('cate_order',$value,'')."</div>";

					$string_update=($arr_data['authorization']['upcategory']) ? "<a href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$arr_data['sub_menu']['upcategory'],false)."/".element('sub_menu_function',$arr_data['sub_menu']['upcategory'],false)."/".element('cate_id',$value,'')."'>
                                                                                        <img  alt='update' width='18' height='18' src='".base_url().ADMIN_DIR_TEMPLATE."images/action/update.png'/>
                                                                                      </a>" : "<a href='#' class='alert_authorization_update'>
                                                                                        <img alt='update' width='18' height='18' src='".base_url().ADMIN_DIR_TEMPLATE."images/action/update.png'/>
                                                                                      </a>";
					$string_delete=($arr_data['authorization']['delcategory']) ? "<a delete_param='".element('cate_id',$value,'')."' class='ajax_delete_item'>
                                                                                        <img alt='delete' width='18' height='18' src='".base_url().ADMIN_DIR_TEMPLATE."images/action/delete.png'/>
                                                                                      </a>" : "<a class='alert_authorization_delete'>
                                                                                        <img alt='delete' width='18' height='18' src='".base_url().ADMIN_DIR_TEMPLATE."images/action/delete.png'/>
                                                                                      </a>";

					$temp_string['content']="
                        <tr class='gradeC'>
                            <td>
                                <div align='center' class='title_table_database'>
                                    ".element('cate_id',$value,'')."
                                </div>
                            </td>
                            
                            <td>
                                <div align='center'>
                                    <input type='checkbox' name='checkbox[".element('cate_id',$value,'')."]' class='chkCheck' id='check_".element('cate_id',$value,'')."' />
                                </div>
                            </td>

                            <td>
                                <div align='left' class='title_table_database'>
                                    <a title='".custom_htmlspecialchars(element('cate_name',$value,''))."'>&nbsp;&nbsp;&nbsp;".$str_add_temp."&#187;&nbsp;".element('cate_name',$value,'')."</a>
                                </div>
                            </td>                   

                            <td>
                                ".$string_update_public."
                            </td>

                            <td>
                                ".$string_update_order."
                            </td>

							<td>
								<div align='center'>
									<a class='lightbox_admin'  rel='category_product' href='".base_src_img(element('cate_img',$value,''))."'>
										<img alt='".custom_htmlspecialchars(element('cate_name',$value,''))."' src='".base_src_img(element('cate_img',$value,''))."' />
									</a>
								</div>
                            </td>

                            <td>
                                <div align='center'>
                                    ".$string_update."
                                </div>
                            </td>

                            <td>
                                <div align='center'>
                                    ".$string_delete."
                                </div>
                            </td>                   
                        </tr>";

					$result_temp=$this->recursive_category_product_table($arr_data,element('cate_id',$value,''),$str_add,$temp_string,$number_loop);
					$result['content'].=$result_temp['content'];
					$result['count_record']=$result_temp['count_record'];
				}
			}
		}
		return $result;

	}

	/* ----------------------- Show one Category Product -----------------------
	  | Param:menu_class,cate_id,cate_lang
	  | Result:return information of Category Product
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_category_product_front_end($cate_id,$menu_class,$cate_lang){

		$str_select='*';
		$arr_where=array('cate_id'=>$cate_id,'menu_class'=>$menu_class,'cate_lang'=>$cate_lang,'cate_public'=>1);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* -------------------------- Get Cate ID Product --------------------------
	  | Param:cate_id,cate_lang
	  | Result:return information of Category
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_category_product_id_front_end($cate_id,$cate_lang,$result=''){

		$result[]=$cate_id;

		$str_select='cate_id';
		$arr_where=array('cate_public'=>1,'cate_parent'=>$cate_id,'cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$arr_result=$query->result_array();

		if(is_array($arr_result)){

			foreach($arr_result as $key=> $value){
				$result=$this->get_category_product_id_front_end($value['cate_id'],$cate_lang,$result);
			}
		}
		return $result;

	}

	/* ----------------------- Show Category Product Root ----------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of Category Product Root
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_category_product_root_front_end($menu_class,$cate_lang){

		$str_select='*';
		$arr_where=array('cate_public'=>1,'menu_class'=>$menu_class,'cate_lang'=>$cate_lang,'cate_parent'=>'0');
		$str_order='cate_order asc';
		$str_order_1='cate_update_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------- Show Category Product of Menu ---------------------
	  | Param:menu_class,cate_lang
	  | Result:return information Category Product of Menu
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_category_product_one_menu_admin_front_end($menu_class,$cate_lang){

		$str_select="*";
		$arr_where=array('cate_public'=>1,'menu_class'=>$menu_class,'cate_lang'=>$cate_lang);
		$str_order='cate_order asc';
		$str_order_1='cate_update_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Show all Category Product -----------------------
	  | Param:cate_lang
	  | Result:return information all Category Product
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_category_product_front_end($cate_lang){

		$str_select="*";
		$arr_where=array('cate_public'=>1,'cate_lang'=>$cate_lang);
		$str_order='cate_order asc';
		$str_order_1='cate_update_date desc';

		$this->db->select($str_select);
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Show Category Product -----------------------
	  | Param:arr_category_product,parent_id,field_name,field_value,str_add
	  | Result:return string category add product
	  |
	  | //Font-end
	  |
	  ----------------------------------------------------------------------- */

	public function recursive_category_product_front_end($arr_category_product,$parent_id,$field_name,$field_value,$str_add='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$result='',$number_loop=0){

		$str_add_temp='';
		for($i=0; $i < $number_loop; $i++)
			$str_add_temp.=$str_add;

		$number_loop++;

		foreach($arr_category_product as $key=> $value){
			if(element('cate_parent',$value,'') == $parent_id){

				unset($arr_category_product[$key]);
				if(isset($_POST[$field_name]) && ($_POST[$field_name] == element('cate_id',$value,'')))
					$selected="selected";
				else if(!isset($_POST[$field_name]) && ($field_value == element('cate_id',$value,'')))
					$selected="selected";
				else
					$selected="";
				$temp_string="<option value='".element('cate_id',$value,'')."' ".$selected.">";
				$temp_string.="&nbsp;&nbsp;&nbsp;".$str_add_temp."&#187;&nbsp;".element('cate_name',$value,'')."</option>";

				$result.=$this->recursive_category_product_front_end($arr_category_product,element('cate_id',$value,''),$field_name,$field_value,$str_add,$temp_string,$number_loop);
			}
		}
		return $result;

	}

	/* ------------------------ Show Menu Left Font-End ------------------------
	  | Param:
	  | Result:return string menu left font-end
	  |
	  | //Font-end
	  |
	  ----------------------------------------------------------------------- */

	public function recursive_menu_left($arr_category,$parent_id,$string_url,$tag_body="<ul>",$tag_content="<li>",$tag_add='<span>',$str_add='',$result='',$number_loop=0){

		$str_add_temp=$str_add;
		for($i=0; $i < $number_loop; $i++)
			$str_add_temp.=$str_add;

		$number_loop++;

		$flag_begin=true;
		$flag_end=false;

		foreach($arr_category as $value){
			if(element('cate_parent',$value,'') == $parent_id){

				if($flag_begin === true){

					$result.=$tag_body;
					$flag_begin=false;
					$flag_end=true;
				}

				$end_tag_add=($tag_add == '') ? "" : "</".substr(trim($tag_add),1);

				$temp_string=$tag_content;
				$temp_string.=$tag_add."<a title='".custom_htmlspecialchars(element('cate_name',$value,''))."' href='".base_url().$string_url."/".convert_vi_to_en(element('cate_name',$value,''))."/".element('cate_id',$value,'').URL_SUFFIX."'>".$str_add_temp.element('cate_name',$value,'')."</a>".$end_tag_add;
				$result.=$this->recursive_menu_left($arr_category,element('cate_id',$value,''),$string_url,$tag_body,$tag_content,'',$str_add,$temp_string,$number_loop);
				$result.="</".substr(trim($tag_content),1);
			}
		}

		if($flag_end === true){

			$result.="</".substr(trim($tag_body),1);
			$flag_end=false;
		}
		return $result;

	}

}

?>