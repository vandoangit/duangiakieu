<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_advertise extends CI_Model{

	private $_table='advertise';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* --------------------------- Show one Advertise --------------------------
	  | Param:ad_id,menu_class,cate_lang
	  | Result:return information of Advertise
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_advertise($ad_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.ad_id'=>$ad_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_advertise_public($ad_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.ad_id'=>$ad_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ----------------------- Show Advertise of Category ----------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information Advertise of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_advertise_one_category($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.ad_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_advertise_one_category_public($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.ad_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------- Count Advertise of Category ----------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return number sum row Advertise of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_advertise_one_category($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.ad_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_advertise_one_category_public($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.ad_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* --------------------------- Show all Advertise --------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Advertise
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_advertise($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.ad_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_advertise_public($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.ad_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* -------------------------- Count all Advertise --------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of all Advertise
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_advertise($menu_class,$cate_lang){

		$str_select=$this->_table.'.ad_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_advertise_public($menu_class,$cate_lang){

		$str_select=$this->_table.'.ad_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ---------------------------- Insert Advertise ---------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_advertise($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ---------------------------- Update Advertise ---------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_advertise($arr_data,$arr_where){

		$str_select="ad_img";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$ad_img=$query->row_array();

		if(isset($arr_data['ad_img']) && is_array($ad_img) && (element('ad_img',$ad_img,'') != $arr_data['ad_img']) && (element('ad_img',$ad_img,'') != '')){

			@unlink(PUBPATH.DIR_PUBLIC_IMG.element('ad_img',$ad_img,''));
			@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".element('ad_img',$ad_img,''));
		}

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ---------------------------- Delete Advertise ---------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_advertise($arr_where){

		$str_select="ad_img";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$ad_img=$query->row_array();

		$this->db->where($arr_where);
		if($this->db->delete($this->_table)){

			if(is_array($ad_img) && (element('ad_img',$ad_img,'') != '')){

				@unlink(PUBPATH.DIR_PUBLIC_IMG.element('ad_img',$ad_img,''));
				@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".element('ad_img',$ad_img,''));
			}
			return true;
		}
		return false;

	}

	/* -------------------------- Show Advertise Video -------------------------
	  | Param:ad_id,width,height,skin_media mac dinh la default
	  | Result:string video
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	function show_advertise_video($ad_id,$width,$height,$skin_media='default.zip'){

		$str_select="*";
		$arr_where=array($this->_table.'.ad_id'=>$ad_id);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$arr_advertise=$query->row_array();
		$string_advertise='';

		if(is_array($arr_advertise) && !empty($arr_advertise)){

			$str_height=($height == 0) ? "" : "height='".$height."px' ";

			$string_flashvars="netstreambasepath=".base_url();
			$string_flashvars.= "&amp;playlist.position=none";
			$string_flashvars.= "&amp;playlist.size=0";
			$string_flashvars.= "&amp;skin=".base_url().DIR_PUBLIC."mediaplayer/skin/".$skin_media;
			$string_flashvars.= "&amp;config=".base_url().DIR_PUBLIC."mediaplayer/config/config.xml";
			$string_flashvars.= "&amp;title=".element('ad_name',$arr_advertise,'');
			$string_flashvars.= "&amp;file=".base_src_video(element('ad_img',$arr_advertise,''));

			$string_advertise.= "<object width='".$width."' ".$str_height;
			$string_advertise.= "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' ";
			$string_advertise.= "codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' ";
			$string_advertise.= "align='center' style='overflow:hidden'>";

			$string_advertise.= "<param name='movie' value='".base_url().DIR_PUBLIC."mediaplayer/player.swf' />";
			$string_advertise.= "<param name='quality' value='high' />";
			$string_advertise.= "<param name='allowscriptaccess' value='always' />";
			$string_advertise.= "<param name='wmode' value='transparent' />";
			$string_advertise.= "<param name='allowfullscreen' value='true' />";
			$string_advertise.= "<param name='flashvars' value='".$string_flashvars."' />";
			$string_advertise.= "<embed width='".$width."' ".$str_height;
			$string_advertise.= "type='application/x-shockwave-flash' ";
			$string_advertise.= "pluginspage='http://www.macromedia.com/go/getflashplayer' ";
			$string_advertise.= "align='center' style='overflow:hidden' ";

			$string_advertise.= "src='".base_url().DIR_PUBLIC."mediaplayer/player.swf' ";
			$string_advertise.= "quality='high' ";
			$string_advertise.= "allowscriptaccess='always' ";
			$string_advertise.= "wmode='transparent' ";
			$string_advertise.= "allowfullscreen='true' ";
			$string_advertise.= "flashvars='".$string_flashvars."' />";
			$string_advertise.= "</object>";
		}
		return $string_advertise;

	}

	/* ---------------------- Show Advertise Video Public ----------------------
	  | Param:ad_id,width,height,skin_media mac dinh la default
	  | Result:string video public
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	function show_advertise_video_public($ad_id,$width,$height,$skin_media='default.zip'){

		$str_select="*";
		$arr_where=array($this->_table.'.ad_id'=>$ad_id,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$arr_advertise=$query->row_array();
		$string_advertise='';

		if(is_array($arr_advertise) && !empty($arr_advertise)){

			$str_height=($height == 0) ? "" : "height='".$height."px' ";

			$string_flashvars="netstreambasepath=".base_url();
			$string_flashvars.= "&amp;playlist.position=none";
			$string_flashvars.= "&amp;playlist.size=0";
			$string_flashvars.= "&amp;skin=".base_url().DIR_PUBLIC."mediaplayer/skin/".$skin_media;
			$string_flashvars.= "&amp;config=".base_url().DIR_PUBLIC."mediaplayer/config/config.xml";
			$string_flashvars.= "&amp;title=".element('ad_name',$arr_advertise,'');
			$string_flashvars.= "&amp;file=".base_src_video(element('ad_img',$arr_advertise,''));

			$string_advertise.= "<object width='".$width."' ".$str_height;
			$string_advertise.= "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' ";
			$string_advertise.= "codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' ";
			$string_advertise.= "align='center' style='overflow:hidden'>";

			$string_advertise.= "<param name='movie' value='".base_url().DIR_PUBLIC."mediaplayer/player.swf' />";
			$string_advertise.= "<param name='quality' value='high' />";
			$string_advertise.= "<param name='allowscriptaccess' value='always' />";
			$string_advertise.= "<param name='wmode' value='transparent' />";
			$string_advertise.= "<param name='allowfullscreen' value='true' />";
			$string_advertise.= "<param name='flashvars' value='".$string_flashvars."' />";
			$string_advertise.= "<embed width='".$width."' ".$str_height;
			$string_advertise.= "type='application/x-shockwave-flash' ";
			$string_advertise.= "pluginspage='http://www.macromedia.com/go/getflashplayer' ";
			$string_advertise.= "align='center' style='overflow:hidden' ";

			$string_advertise.= "src='".base_url().DIR_PUBLIC."mediaplayer/player.swf' ";
			$string_advertise.= "quality='high' ";
			$string_advertise.= "allowscriptaccess='always' ";
			$string_advertise.= "wmode='transparent' ";
			$string_advertise.= "allowfullscreen='true' ";
			$string_advertise.= "flashvars='".$string_flashvars."' />";
			$string_advertise.= "</object>";
		}
		return $string_advertise;

	}

	/* ------------------------- Show Advertise Active -------------------------
	  | Param:cate_id,menu_class,width,height,skin_media mac dinh la default
	  | Result:string img or video or flash
	  |
	  | //Font-end
	  |
	  ----------------------------------------------------------------------- */

	function show_advertise_active($arr_cate_id,$menu_class,$cate_lang,$width,$height=0,$skin_media='default.zip'){

		$str_select="*";
		$arr_where=array($this->_table.'.ad_public'=>1,$this->_table.'.ad_active'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		$arr_advertise=$query->row_array();
		$string_advertise='';

		if(is_array($arr_advertise) && !empty($arr_advertise)){

			switch(element('ad_type',$arr_advertise,'')){
				case 1:
					if(element('ad_link',$arr_advertise,'') == ''){

						$string_advertise.= "<img alt='".custom_htmlspecialchars(element('ad_name',$arr_advertise,''))."' width='".$width."px' style='border:0px' src='".base_src_img(element('ad_img',$arr_advertise,''))."'/>";
					}
					else{

						$string_advertise.= "<a title='".custom_htmlspecialchars(element('ad_name',$arr_advertise,''))."' href='".element('ad_link',$arr_advertise,'')."' target='_blank'>";
						$string_advertise.= "<img alt='".custom_htmlspecialchars(element('ad_name',$arr_advertise,''))."' width='".$width."px' style='border:0px' src='".base_src_img(element('ad_img',$arr_advertise,''))."'/>";
						$string_advertise.= "</a>";
					}
					break;
				case 2:
					if(element('ad_link',$arr_advertise,'') == ''){

						$str_height=($height == 0) ? "" : "height='".$height."px' ";

						$string_advertise.= "<object width='".$width."px' ".$str_height;
						$string_advertise.= "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' ";
						$string_advertise.= "codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' ";
						$string_advertise.= "align='center' style='overflow:hidden'>";

						$string_advertise.= "<param name='movie' value='".base_src_video(element('ad_img',$arr_advertise,''))."' />";
						$string_advertise.= "<param name='allowScriptAccess' value='sameDomain' />";
						$string_advertise.= "<param name='menu' value='false' />";
						$string_advertise.= "<param name='quality' value='high' />";
						$string_advertise.= "<param name='wmode' value='opaque' />";
						$string_advertise.= "<embed width='".$width."px' ".$str_height;
						$string_advertise.= "type='application/x-shockwave-flash' ";
						$string_advertise.= "pluginspage='http://www.macromedia.com/go/getflashplayer' ";
						$string_advertise.= "align='center' style='overflow:hidden' ";

						$string_advertise.= "src='".base_src_video(element('ad_img',$arr_advertise,''))."' ";
						$string_advertise.= "allowscriptaccess='sameDomain' ";
						$string_advertise.= "menu='false' ";
						$string_advertise.= "quality='high' ";
						$string_advertise.= "wmode='opaque' />";
						$string_advertise.= "</object>";
					}
					else{

						$str_height=($height == 0) ? "" : "height='".$height."px' ";

						$string_advertise.= "<div style='position:relative;overflow:hidden;'>";
						$string_advertise.= "<a style='position:absolute;float:left;width:".$width."px;height:".$height."px' title='".custom_htmlspecialchars(element('ad_name',$arr_advertise,''))."' href='".element('ad_link',$arr_advertise,'')."' target='_blank'>&nbsp;</a>";
						$string_advertise.= "<object width='".$width."px' ".$str_height;
						$string_advertise.= "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' ";
						$string_advertise.= "codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' ";
						$string_advertise.= "align='center' style='overflow:hidden'>";
						$string_advertise.= "<param name='movie' value='".base_src_video(element('ad_img',$arr_advertise,''))."' />";
						$string_advertise.= "<param name='allowScriptAccess' value='sameDomain' />";
						$string_advertise.= "<param name='menu' value='false' />";
						$string_advertise.= "<param name='quality' value='high' />";
						$string_advertise.= "<param name='wmode' value='opaque' />";
						$string_advertise.= "<embed width='".$width."px' ".$str_height;
						$string_advertise.= "type='application/x-shockwave-flash' ";
						$string_advertise.= "pluginspage='http://www.macromedia.com/go/getflashplayer' ";
						$string_advertise.= "align='center' style='overflow:hidden' ";

						$string_advertise.= "src='".base_src_video(element('ad_img',$arr_advertise,''))."' ";
						$string_advertise.= "allowscriptaccess='sameDomain' ";
						$string_advertise.= "menu='false' ";
						$string_advertise.= "quality='high' ";
						$string_advertise.= "wmode='opaque' />";
						$string_advertise.= "</object>";
						$string_advertise.= "</div>";
					}
					break;
				case 3:

					$str_height=($height == 0) ? "" : "height='".$height."px' ";

					$string_flashvars="netstreambasepath=".base_url();
					$string_flashvars.= "&amp;playlist.position=none";
					$string_flashvars.= "&amp;playlist.size=0";
					$string_flashvars.= "&amp;skin=".base_url().DIR_PUBLIC."mediaplayer/skin/".$skin_media;
					$string_flashvars.= "&amp;config=".base_url().DIR_PUBLIC."mediaplayer/config/config.xml";
					$string_flashvars.= "&amp;title=".element('ad_name',$arr_advertise,'');
					$string_flashvars.= "&amp;file=".base_src_video(element('ad_img',$arr_advertise,''));

					$string_advertise.= "<object width='".$width."' ".$str_height;
					$string_advertise.= "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' ";
					$string_advertise.= "codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' ";
					$string_advertise.= "align='center' style='overflow:hidden'>";

					$string_advertise.= "<param name='movie' value='".base_url().DIR_PUBLIC."mediaplayer/player.swf' />";
					$string_advertise.= "<param name='quality' value='high' />";
					$string_advertise.= "<param name='allowscriptaccess' value='always' />";
					$string_advertise.= "<param name='wmode' value='transparent' />";
					$string_advertise.= "<param name='allowfullscreen' value='true' />";
					$string_advertise.= "<param name='flashvars' value='".$string_flashvars."' />";
					$string_advertise.= "<embed width='".$width."' ".$str_height;
					$string_advertise.= "type='application/x-shockwave-flash' ";
					$string_advertise.= "pluginspage='http://www.macromedia.com/go/getflashplayer' ";
					$string_advertise.= "align='center' style='overflow:hidden' ";

					$string_advertise.= "src='".base_url().DIR_PUBLIC."mediaplayer/player.swf' ";
					$string_advertise.= "quality='high' ";
					$string_advertise.= "allowscriptaccess='always' ";
					$string_advertise.= "wmode='transparent' ";
					$string_advertise.= "allowfullscreen='true' ";
					$string_advertise.= "flashvars='".$string_flashvars."' />";
					$string_advertise.= "</object>";
					break;
			}
		}
		return $string_advertise;

	}

	/* -------------------------- Show List Advertise --------------------------
	  | Param:cate_id,menu_class,width,height,skin_media mac dinh la default
	  | Result:string img or video or flash
	  |
	  | //Font-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_advertise_front_end($arr_cate_id,$menu_class,$cate_lang){
		$str_select="*";
		$arr_where=array($this->_table.'.ad_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.ad_order asc';
		$str_order_1=$this->_table.'.ad_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function show_list_advertise($arr_cate_id,$menu_class,$cate_lang,$tag_begin,$tag_end,$width,$height=0,$skin_media='default.zip'){

		$str_select="*";
		$arr_where=array($this->_table.'.ad_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.ad_order asc';
		$str_order_1=$this->_table.'.ad_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		$arr_advertise=$query->result_array();
		$string_advertise='';

		if(is_array($arr_advertise) && !empty($arr_advertise)){

			foreach($arr_advertise as $key=> $value){
				$string_advertise.=$tag_begin;
				switch(element('ad_type',$value,'')){
					case 1:
						if(element('ad_link',$value,'') == ''){

							$string_advertise.="<img alt='".custom_htmlspecialchars(element('ad_name',$value,''))."' width='".$width."px' style='border:0px' src='".base_src_img(element('ad_img',$value,''))."'/>";
						}
						else{

							$string_advertise.= "<a title='".custom_htmlspecialchars(element('ad_name',$value,''))."' href='".element('ad_link',$value,'')."' target='_blank'>";
							$string_advertise.= "<img alt='".custom_htmlspecialchars(element('ad_name',$value,''))."' width='".$width."px' style='border:0px' src='".base_src_img(element('ad_img',$value,''))."' />";
							$string_advertise.= "</a>";
						}
						break;
					case 2:
						if(element('ad_link',$value,'') == ''){

							$str_height=($height == 0) ? "" : "height='".$height."px' ";

							$string_advertise.= "<object width='".$width."px'".$str_height;
							$string_advertise.= "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' ";
							$string_advertise.= "codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' ";
							$string_advertise.= "align='center' style='overflow:hidden'>";

							$string_advertise.= "<param name='movie' value='".base_src_video(element('ad_img',$value,''))."' />";
							$string_advertise.= "<param name='allowScriptAccess' value='sameDomain' />";
							$string_advertise.= "<param name='menu' value='false' />";
							$string_advertise.= "<param name='quality' value='high' />";
							$string_advertise.= "<param name='wmode' value='opaque' />";
							$string_advertise.= "<embed width='".$width."px' ".$str_height;
							$string_advertise.= "type='application/x-shockwave-flash' ";
							$string_advertise.= "pluginspage='http://www.macromedia.com/go/getflashplayer' ";
							$string_advertise.= "align='center' style='overflow:hidden' ";

							$string_advertise.= "src='".base_src_video(element('ad_img',$value,''))."' ";
							$string_advertise.= "allowscriptaccess='sameDomain' ";
							$string_advertise.= "menu='false' ";
							$string_advertise.= "quality='high' ";
							$string_advertise.= "wmode='opaque' />";
							$string_advertise.= "</object>";
						}
						else{

							$str_height=($height == 0) ? "" : "height='".$height."px' ";

							$string_advertise.= "<div style='position:relative;overflow:hidden;'>";
							$string_advertise.= "<a style='position:absolute;float:left;width:".$width."px;' title='".custom_htmlspecialchars(element('ad_name',$value,''))."' href='".element('ad_link',$value,'')."' target='_blank'>&nbsp;</a>";
							$string_advertise.= "<object width='".$width."px' ".$str_height;
							$string_advertise.= "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' ";
							$string_advertise.= "codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' ";
							$string_advertise.= "align='center' style='overflow:hidden'>";
							$string_advertise.= "<param name='movie' value='".base_src_video(element('ad_img',$value,''))."' />";
							$string_advertise.= "<param name='allowScriptAccess' value='sameDomain' />";
							$string_advertise.= "<param name='menu' value='false' />";
							$string_advertise.= "<param name='quality' value='high' />";
							$string_advertise.= "<param name='wmode' value='opaque' />";
							$string_advertise.= "<embed width='".$width."px' ".$str_height;
							$string_advertise.= "type='application/x-shockwave-flash' ";
							$string_advertise.= "pluginspage='http://www.macromedia.com/go/getflashplayer' ";
							$string_advertise.= "align='center' style='overflow:hidden' ";

							$string_advertise.= "src='".base_src_video(element('ad_img',$value,''))."' ";
							$string_advertise.= "allowscriptaccess='sameDomain' ";
							$string_advertise.= "menu='false' ";
							$string_advertise.= "quality='high' ";
							$string_advertise.= "wmode='opaque' />";
							$string_advertise.= "</object>";
							$string_advertise.= "</div>";
						}
						break;
					case 3:

						$str_height=($height == 0) ? "" : "height='".$height."px' ";

						$string_flashvars="netstreambasepath=".base_url();
						$string_flashvars.= "&amp;playlist.position=none";
						$string_flashvars.= "&amp;playlist.size=0";
						$string_flashvars.= "&amp;skin=".base_url().DIR_PUBLIC."mediaplayer/skin/".$skin_media;
						$string_flashvars.= "&amp;config=".base_url().DIR_PUBLIC."mediaplayer/config/config.xml";
						$string_flashvars.= "&amp;title=".element('ad_name',$value,'');
						$string_flashvars.= "&amp;file=".base_src_video(element('ad_img',$value,''));

						$string_advertise.= "<object width='".$width."' ".$str_height;
						$string_advertise.= "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' ";
						$string_advertise.= "codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' ";
						$string_advertise.= "align='center' style='overflow:hidden'>";

						$string_advertise.= "<param name='movie' value='".base_url().DIR_PUBLIC."mediaplayer/player.swf' />";
						$string_advertise.= "<param name='quality' value='high' />";
						$string_advertise.= "<param name='allowscriptaccess' value='always' />";
						$string_advertise.= "<param name='wmode' value='transparent' />";
						$string_advertise.= "<param name='allowfullscreen' value='true' />";
						$string_advertise.= "<param name='flashvars' value='".$string_flashvars."' />";
						$string_advertise.= "<embed width='".$width."' ".$str_height;
						$string_advertise.= "type='application/x-shockwave-flash' ";
						$string_advertise.= "pluginspage='http://www.macromedia.com/go/getflashplayer' ";
						$string_advertise.= "align='center' style='overflow:hidden' ";

						$string_advertise.= "src='".base_url().DIR_PUBLIC."mediaplayer/player.swf' ";
						$string_advertise.= "quality='high' ";
						$string_advertise.= "allowscriptaccess='always' ";
						$string_advertise.= "wmode='transparent' ";
						$string_advertise.= "allowfullscreen='true' ";
						$string_advertise.= "flashvars='".$string_flashvars."' />";
						$string_advertise.= "</object>";
						break;
				}
				$string_advertise.=$tag_end;
			}
		}
		return $string_advertise;

	}

}

?>