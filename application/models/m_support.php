<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_support extends CI_Model{

	private $_table='support';

	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->library(array('phpmailer'));

	}

	/* ---------------------------- Show one Support ---------------------------
	  | Param:support_id,menu_class,cate_lang
	  | Result:return information of support
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_support($support_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.support_id'=>$support_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_support_public($support_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.support_id'=>$support_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------ Show Support of Category -----------------------
	  | Param:cate_id,menu_class,support_lang
	  | Result:return information Support of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_support_one_category($arr_cate_id,$menu_class,$support_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$support_lang);
		$str_order=$this->_table.'.support_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_support_one_category_public($arr_cate_id,$menu_class,$support_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$support_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.support_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ----------------------- Count Support of Category -----------------------
	  | Param:cate_id,menu_class,support_lang
	  | Result:return number sum row Support of a Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_support_one_category($arr_cate_id,$menu_class,$support_lang){

		$str_select=$this->_table.'.support_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$support_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_support_one_category_public($arr_cate_id,$menu_class,$support_lang){

		$str_select=$this->_table.'.support_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$support_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------------- Show all Support ---------------------------
	  | Param:menu_class,support_lang
	  | Result:return information of all Support
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_support($menu_class,$support_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$support_lang);
		$str_order=$this->_table.'.support_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_support_public($menu_class,$support_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$support_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.support_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* --------------------------- Count all Support ---------------------------
	  | Param:menu_class,support_lang
	  | Result:return number sum row of all Support
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_support($menu_class,$support_lang){

		$str_select=$this->_table.'.support_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$support_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_support_public($menu_class,$support_lang){

		$str_select=$this->_table.'.support_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$support_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Insert Support ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_support($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ----------------------------- Update Support ----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_support($arr_data,$arr_where){

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ----------------------------- Delete Support ----------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_support($arr_where){

		$this->db->where($arr_where);
		return $this->db->delete($this->_table);

	}

	/* ----------------------- Show Support of Category ------------------------
	  | Param:cate_id,menu_class,support_lang
	  | Result:return information Support of Category
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_support_one_category_front_end($arr_cate_id,$menu_class,$support_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.support_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$support_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.support_order asc';
		$str_order_1=$this->_table.'.support_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------------- Show all Support ---------------------------
	  | Param:menu_class,support_lang
	  | Result:return information of all Support
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_support_front_end($menu_class,$support_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.support_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$support_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.support_order asc';
		$str_order_1=$this->_table.'.support_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* -------------------------------- Gui Mail ------------------------------- 
	  | Param:from,name,title,body,cate_id,menu_class,support_lang
	  | Result:return true if send successful else return false
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	function mailer($from,$name,$title,$body,$field_attachment=NULL,$arr_cate_id,$menu_class,$support_lang='vi',$send_me=false,$mail_to=false){

		$this->phpmailer->IsSMTP();

		$str_select="*";
		$arr_where_in=array('email_server_smtp','email_port_smtp','email_secure_smtp','email_debug_smtp','email_your_name','email_email_smtp','email_pass_smtp');

		$this->db->select($str_select);
		$this->db->where_in('general_config.general_config_id',$arr_where_in);
		$query=$this->db->get('general_config');
		$arr_general_config=$query->result_array();

		if(is_array($arr_general_config) && !empty($arr_general_config)){

			foreach($arr_general_config as $key=> $value){
				$arr_config[element('general_config_id',$value,'')]=element('general_config_value',$value,'');
			}

			try{

				$this->phpmailer->CharSet="utf-8";

				$this->phpmailer->Host=$arr_config['email_server_smtp'];  // specify main and backup server               :smtp.gmail.com
				$this->phpmailer->Port=$arr_config['email_port_smtp']; // set the port to use                          :465

				$this->phpmailer->SMTPAuth=true;  // turn on SMTP authentication                  :true
				if(preg_match("/ssl/i",$arr_config['email_secure_smtp']))
					$this->phpmailer->SMTPSecure=$arr_config['email_secure_smtp'];  //                                              :ssl
				$this->phpmailer->Username=$arr_config['email_email_smtp'];  // your SMTP username or your gmail username    :hominhtri.it@gmail.com 
				$this->phpmailer->Password=$arr_config['email_pass_smtp'];   // your SMTP password or your gmail password    :123456789

				$this->phpmailer->From=$arr_config['email_email_smtp'];
				$this->phpmailer->FromName=$arr_config['email_your_name']; // Name to indicate where the email came from when the recepient received

				if($mail_to != false){

					$str_select='*';
					$arr_where=array($this->_table.'.support_id'=>$mail_to,$this->_table.'.support_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$support_lang,'category_sub.cate_public'=>1);

					$this->db->select($str_select);
					$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
					$this->db->where($arr_where);

					$query=$this->db->get($this->_table);
					$arr_support=$query->row_array();

					if(is_array($arr_support) && !empty($arr_support)){

						$this->phpmailer->AddAddress($arr_support['support_nick'],$arr_support['support_name']);
					}
					else
						$this->phpmailer->AddAddress($arr_config['email_email_smtp'],$arr_config['email_your_name']);
				}
				else{

					$str_select='*';
					$arr_where=array($this->_table.'.support_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$support_lang,'category_sub.cate_public'=>1);

					$this->db->select($str_select);
					$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
					$this->db->where($arr_where);
					$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

					$query=$this->db->get($this->_table);
					$arr_support=$query->result_array();

					if(is_array($arr_support) && !empty($arr_support)){

						$this->phpmailer->AddAddress($arr_support[0]['support_nick'],$arr_support[0]['support_name']);
						for($i=1; $i < count($arr_support); $i++)
							$this->phpmailer->AddCC($arr_support[$i]['support_nick'],$arr_support[$i]['support_name']);
					}
					else
						$this->phpmailer->AddAddress($arr_config['email_email_smtp'],$arr_config['email_your_name']);
				}

				if($send_me === true)
					$this->phpmailer->AddCC($from,$name);

				$this->phpmailer->AddReplyTo($from,$name);
				$this->phpmailer->WordWrap=50; //set word wrap
				$this->phpmailer->IsHTML(true);   // send as HTML
				$this->phpmailer->Subject=$title;
				$this->phpmailer->Body=$body;  //HTML Body
				$this->phpmailer->AltBody="";  //Text Body
				$this->phpmailer->SMTPDebug=$arr_config['email_debug_smtp']; // 1=errors and messages
				// 2=messages only            
				$this->phpmailer->PluginDir="";

				if($field_attachment !== NULL && isset($_FILES[$field_attachment]) && $_FILES[$field_attachment]['error'] == UPLOAD_ERR_OK)
					$this->phpmailer->AddAttachment($_FILES[$field_attachment]['tmp_name'],$_FILES[$field_attachment]['name'],'base64','application/octet-stream');

				if($this->phpmailer->Send()){

					return true;
				}
				else{

					return false;
				}
			}
			catch(phpmailerException $e){
				return false;
			}
		}
		return false;

	}

}

?>