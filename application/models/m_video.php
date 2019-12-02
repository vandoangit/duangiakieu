<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class M_video extends CI_Model{

	private $_table='video';

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	/* ----------------------------- Show one Video ----------------------------
	  | Param:video_id,menu_class,cate_lang
	  | Result:return information of Video
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function get_video($video_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.video_id'=>$video_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	public function get_video_public($video_id,$menu_class,$cate_lang){

		$str_select=$this->_table.".*";
		$arr_where=array($this->_table.'.video_id'=>$video_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------- Show Video of Category ------------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information Video of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_video_one_category($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.video_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_video_one_category_public($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.video_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------ Count Video of Category ------------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return number sum row Video of Category
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_video_one_category($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.video_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_video_one_category_public($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.video_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Show all Video ----------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Video
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function list_video($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);
		$str_order=$this->_table.'.video_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	public function list_video_public($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.video_order asc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------------- Count all Video ----------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of all Video
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_video($menu_class,$cate_lang){

		$str_select=$this->_table.'.video_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	public function count_list_video_public($menu_class,$cate_lang){

		$str_select=$this->_table.'.video_id';
		$arr_where=array('category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ------------------------------ Insert Video -----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need insert
	  | Result:if insert successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function insert_video($arr_data){

		return $this->db->insert($this->_table,$arr_data);

	}

	/* ------------------------------ Update Video -----------------------------
	  | Param:$arr_data:array width key is feildname and value is data need update
	  |       $arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if update successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function update_video($arr_data,$arr_where){

		$str_select="video_file,video_img";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$video=$query->row_array();

		if(isset($arr_data['video_file']) && is_array($video) && (element('video_file',$video,'') != $arr_data['video_file']) && (element('video_file',$video,'') != ''))
			@unlink(PUBPATH.DIR_PUBLIC_IMG.element('video_file',$video,''));

		if(isset($arr_data['video_img']) && is_array($video) && (element('video_img',$video,'') != $arr_data['video_img']) && (element('video_img',$video,'') != '')){

			@unlink(PUBPATH.DIR_PUBLIC_IMG.element('video_img',$video,''));
			@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".element('video_img',$video,''));
		}

		$this->db->where($arr_where);
		return $this->db->update($this->_table,$arr_data);

	}

	/* ------------------------------ Delete Video -----------------------------
	  | Param:$arr_where:array or string query,if it is array width key is feildname and value is data need delete
	  | Result:if delete successful return true,else return false
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	public function delete_video($arr_where){

		$str_select="video_file,video_img";

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$video=$query->row_array();

		$this->db->where($arr_where);
		if($this->db->delete($this->_table)){

			if(is_array($video) && (element('video_file',$video,'') != ''))
				@unlink(PUBPATH.DIR_PUBLIC_IMG.element('video_file',$video,''));

			if(is_array($video) && (element('video_img',$video,'') != '')){

				@unlink(PUBPATH.DIR_PUBLIC_IMG.element('video_img',$video,''));
				@unlink(PUBPATH.DIR_PUBLIC_IMG."_thumbs/".element('video_img',$video,''));
			}
			return true;
		}
		return false;

	}

	/* ----------------------------- Show One Video ----------------------------
	  | Param:video_id,with,height,skin_media
	  | Result:return string video
	  |
	  | //Admin
	  |
	  ----------------------------------------------------------------------- */

	function show_one_video($video_id,$width,$height,$skin_media='default.zip'){

		$str_select="*";
		$arr_where=array($this->_table.'.video_id'=>$video_id);

		$this->db->select($str_select);
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$arr_video=$query->row_array();

		$string_video='';

		if(is_array($arr_video) && !empty($arr_video)){

			if(preg_match("/youtube.com/",element('video_file',$arr_video,''))){

				$string_youtube="<iframe width='".$width."' height='".$height."' src='".element('video_file',$arr_video,'')."' frameborder='0' allowfullscreen></iframe>";
				return $string_youtube;
			}

			$string_flashvars="netstreambasepath=".base_url();
			$string_flashvars.= "&amp;playlist.position=none";
			$string_flashvars.= "&amp;playlist.size=0";
			$string_flashvars.= "&amp;skin=".base_url().DIR_PUBLIC."mediaplayer/skin/".$skin_media;
			$string_flashvars.= "&amp;config=".base_url().DIR_PUBLIC."mediaplayer/config/config.xml";
			$string_flashvars.= "&amp;title=".element('video_name',$arr_video,'');
			$string_flashvars.= "&amp;file=".base_src_video(element('video_file',$arr_video,''));
			if(element('video_img',$arr_video,'') != "")
				$string_flashvars.= "&amp;image=".base_src_img(element('video_img',$arr_video,''));

			$string_video="<object width='".$width."' height='".$height."' ";
			$string_video.= "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' ";
			$string_video.= "codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' ";
			$string_video.= "align='center' style='overflow:hidden'>";

			$string_video.= "<param name='movie' value='".base_url().DIR_PUBLIC."mediaplayer/player.swf'>";
			$string_video.= "<param name='quality' value='high'>";
			$string_video.= "<param name='allowscriptaccess' value='always'>";
			$string_video.= "<param name='wmode' value='transparent'>";
			$string_video.= "<param name='allowfullscreen' value='true'>";
			$string_video.= "<param name='flashvars' value='".$string_flashvars."'>";
			$string_video.= "<embed width='".$width."' height='".$height."' ";
			$string_video.= "type='application/x-shockwave-flash' ";
			$string_video.= "pluginspage='http://www.macromedia.com/go/getflashplayer' ";
			$string_video.= "align='center' style='overflow:hidden' ";

			$string_video.= "src='".base_url().DIR_PUBLIC."mediaplayer/player.swf' ";
			$string_video.= "quality='high' ";
			$string_video.= "allowscriptaccess='always' ";
			$string_video.= "wmode='transparent' ";
			$string_video.= "allowfullscreen='true' ";
			$string_video.= "flashvars='".$string_flashvars."'>";
			$string_video.= "</object>";
		}
		return $string_video;

	}

	/* ----------------------------- Show one Video ----------------------------
	  | Param:video_id,menu_class,cate_lang
	  | Result:return information of Video
	  |
	  | //Font-end
	  |
	  ----------------------------------------------------------------------- */

	public function get_video_front_end($video_id,$menu_class,$cate_lang){

		$str_select="*";
		$arr_where=array($this->_table.'.video_id'=>$video_id,$this->_table.'.video_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ---------------------------- Get Video Active ---------------------------
	  | Param:cae_id,menu_class,cate_lang
	  | Result:return information Video Active
	  |
	  | //Font-end
	  |
	  ----------------------------------------------------------------------- */

	function get_video_active_front_end($arr_cate_id,$menu_class,$cate_lang){

		$str_select="*";
		$arr_where=array($this->_table.'.video_public'=>1,$this->_table.'.video_active'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->row_array();

	}

	/* ------------------------- Show Video of Category ------------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return information Video of Category
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_video_one_category_front_end($arr_cate_id,$menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.video_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.video_order asc';
		$str_order_1=$this->_table.'.video_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ------------------------ Count Video of Category ------------------------
	  | Param:cate_id,menu_class,cate_lang
	  | Result:return number sum row Video of Category
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_video_one_category_front_end($arr_cate_id,$menu_class,$cate_lang){

		$str_select=$this->_table.'.video_id';
		$arr_where=array($this->_table.'.video_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Show all Video ----------------------------
	  | Param:menu_class,cate_lang
	  | Result:return information of all Video
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function list_video_front_end($menu_class,$cate_lang,$limit_x=NULL,$limit_y=NULL){

		if(($limit_x !== NULL) && ($limit_y !== NULL))
			$this->db->limit($limit_y,$limit_x);

		$str_select='*';
		$arr_where=array($this->_table.'.video_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.video_order asc';
		$str_order_1=$this->_table.'.video_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		return $query->result_array();

	}

	/* ---------------------------- Count all Video ----------------------------
	  | Param:menu_class,cate_lang
	  | Result:return number sum row of all Video
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	public function count_list_video_front_end($menu_class,$cate_lang){

		$str_select=$this->_table.'.video_id';
		$arr_where=array($this->_table.'.video_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		return $query->num_rows();

	}

	/* ----------------------------- Show One Video ----------------------------
	  | Param:video_id,with,height,skin_media
	  | Result:return string video
	  |
	  | //Front-end
	  |
	  ----------------------------------------------------------------------- */

	function show_one_video_front_end($video_id,$menu_class,$cate_lang,$width,$height,$skin_media='default.zip'){

		$str_select="*";
		$arr_where=array($this->_table.'.video_public'=>1,$this->_table.'.video_id'=>$video_id,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);

		$query=$this->db->get($this->_table);
		$arr_video=$query->row_array();

		$string_video='';

		if(is_array($arr_video) && !empty($arr_video)){

			if(preg_match("/youtube.com/",element('video_file',$arr_video,''))){

				$string_youtube="<iframe width='".$width."' height='".$height."' src='".element('video_file',$arr_video,'')."' frameborder='0' allowfullscreen></iframe>";
				return $string_youtube;
			}

			$string_flashvars="netstreambasepath=".base_url();
			$string_flashvars.= "&amp;playlist.position=none";
			$string_flashvars.= "&amp;playlist.size=0";
			$string_flashvars.= "&amp;skin=".base_url().DIR_PUBLIC."mediaplayer/skin/".$skin_media;
			$string_flashvars.= "&amp;config=".base_url().DIR_PUBLIC."mediaplayer/config/config.xml";
			$string_flashvars.= "&amp;title=".element('video_name',$arr_video,'');
			$string_flashvars.= "&amp;file=".base_src_video(element('video_file',$arr_video,''));
			if(element('video_img',$arr_video,'') != "")
				$string_flashvars.= "&amp;image=".base_src_img(element('video_img',$arr_video,''));

			$string_video="<object width='".$width."' height='".$height."' ";
			$string_video.= "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' ";
			$string_video.= "codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' ";
			$string_video.= "align='center' style='overflow:hidden'>";

			$string_video.= "<param name='movie' value='".base_url().DIR_PUBLIC."mediaplayer/player.swf'>";
			$string_video.= "<param name='quality' value='high'>";
			$string_video.= "<param name='allowscriptaccess' value='always'>";
			$string_video.= "<param name='wmode' value='transparent'>";
			$string_video.= "<param name='allowfullscreen' value='true'>";
			$string_video.= "<param name='flashvars' value='".$string_flashvars."'>";
			$string_video.= "<embed width='".$width."' height='".$height."' ";
			$string_video.= "type='application/x-shockwave-flash' ";
			$string_video.= "pluginspage='http://www.macromedia.com/go/getflashplayer' ";
			$string_video.= "align='center' style='overflow:hidden' ";

			$string_video.= "src='".base_url().DIR_PUBLIC."mediaplayer/player.swf' ";
			$string_video.= "quality='high' ";
			$string_video.= "allowscriptaccess='always' ";
			$string_video.= "wmode='transparent' ";
			$string_video.= "allowfullscreen='true' ";
			$string_video.= "flashvars='".$string_flashvars."'>";
			$string_video.= "</object>";
		}
		return $string_video;

	}

	/* --------------------------- Show Video Active ---------------------------
	  | Param:cae_id,menu_class,cate_lang,with,height,skin_media
	  | Result:return string video
	  |
	  | //Font-end
	  |
	  ----------------------------------------------------------------------- */

	function show_video_active($arr_cate_id,$menu_class,$cate_lang,$width,$height,$skin_media='default.zip'){

		$str_select="*";
		$arr_where=array($this->_table.'.video_public'=>1,$this->_table.'.video_active'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);

		$query=$this->db->get($this->_table);
		$arr_video=$query->row_array();

		$string_video='';

		if(is_array($arr_video) && !empty($arr_video)){

			if(preg_match("/youtube.com/",element('video_file',$arr_video,''))){

				$string_youtube="<iframe width='".$width."' height='".$height."' src='".element('video_file',$arr_video,'')."' frameborder='0' allowfullscreen></iframe>";
				return $string_youtube;
			}

			$string_flashvars="netstreambasepath=".base_url();
			$string_flashvars.= "&amp;playlist.position=none";
			$string_flashvars.= "&amp;playlist.size=0";
			$string_flashvars.= "&amp;skin=".base_url().DIR_PUBLIC."mediaplayer/skin/".$skin_media;
			$string_flashvars.= "&amp;config=".base_url().DIR_PUBLIC."mediaplayer/config/config.xml";
			$string_flashvars.= "&amp;title=".element('video_name',$arr_video,'');
			$string_flashvars.= "&amp;file=".base_src_video(element('video_file',$arr_video,''));
			if(element('video_img',$arr_video,'') != "")
				$string_flashvars.= "&amp;image=".base_src_img(element('video_img',$arr_video,''));

			$string_video="<object width='".$width."' height='".$height."' ";
			$string_video.= "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' ";
			$string_video.= "codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' ";
			$string_video.= "align='center' style='overflow:hidden'>";

			$string_video.= "<param name='movie' value='".base_url().DIR_PUBLIC."mediaplayer/player.swf'>";
			$string_video.= "<param name='quality' value='high'>";
			$string_video.= "<param name='allowscriptaccess' value='always'>";
			$string_video.= "<param name='wmode' value='transparent'>";
			$string_video.= "<param name='allowfullscreen' value='true'>";
			$string_video.= "<param name='flashvars' value='".$string_flashvars."'>";
			$string_video.= "<embed width='".$width."' height='".$height."' ";
			$string_video.= "type='application/x-shockwave-flash' ";
			$string_video.= "pluginspage='http://www.macromedia.com/go/getflashplayer' ";
			$string_video.= "align='center' style='overflow:hidden' ";

			$string_video.= "src='".base_url().DIR_PUBLIC."mediaplayer/player.swf' ";
			$string_video.= "quality='high' ";
			$string_video.= "allowscriptaccess='always' ";
			$string_video.= "wmode='transparent' ";
			$string_video.= "allowfullscreen='true' ";
			$string_video.= "flashvars='".$string_flashvars."'>";
			$string_video.= "</object>";
		}
		return $string_video;

	}

	/* ---------------------------- Show List Video ----------------------------
	  | Param:cae_id,menu_class,cate_lang,with,height,skin_media
	  | Result:return string video
	  |
	  | //Font-end
	  |
	  ----------------------------------------------------------------------- */

	function show_list_video($arr_cate_id,$menu_class,$cate_lang,$width,$height,$skin_media='default.zip'){

		$str_select="*";
		$arr_where=array($this->_table.'.video_public'=>1,'category_sub.menu_class'=>$menu_class,'category_sub.cate_lang'=>$cate_lang,'category_sub.cate_public'=>1);
		$str_order=$this->_table.'.video_order asc';
		$str_order_1=$this->_table.'.video_update_date desc';

		$this->db->select($str_select);
		$this->db->join('category_sub',$this->_table.'.cate_id=category_sub.cate_id');
		$this->db->where($arr_where);
		$this->db->where_in($this->_table.'.cate_id',$arr_cate_id);
		$this->db->order_by($str_order);
		$this->db->order_by($str_order_1);

		$query=$this->db->get($this->_table);
		$arr_video=$query->result_array();

		$string_video='';
		$string_youtube='';

		if(is_array($arr_video) && !empty($arr_video)){

			$string_flashvars="netstreambasepath=".base_url();
			$string_flashvars.= "&amp;skin=".base_url().DIR_PUBLIC."mediaplayer/skin/".$skin_media;
			$string_flashvars.= "&amp;config=".base_url().DIR_PUBLIC."mediaplayer/config/config.xml";
			$string_flashvars.= "&amp;playlist=";
			$string_flashvars_json="[[JSON]][";

			$string_flashvars_temp="";
			foreach($arr_video as $key=> $value){

				if(preg_match("/youtube.com/",element('video_file',$value,''))){

					$string_youtube.="<div class='object_video_youtube'><iframe width='".$width."' height='".$height."' src='".element('video_file',$value,'')."' frameborder='0' allowfullscreen></iframe></div>";
				}
				else{

					$string_flashvars_temp.= "{";
					$string_flashvars_temp.= "\"file\":\"".base_src_video(element('video_file',$value,''))."\",";
					$string_flashvars_temp.= "\"title\":\"".element('video_name',$value,'')."\"";
					if(element('video_img',$value,'') != "")
						$string_flashvars_temp.= ",\"image\":\"".base_src_img(element('video_img',$value,''))."\"";
					$string_flashvars_temp.= "},";
				}
			}

			$string_flashvars_temp=$string_flashvars_json.substr($string_flashvars_temp,0,-1);
			$string_flashvars_temp.= "]";
			$string_flashvars_temp=rawurlencode($string_flashvars_temp);

			$string_flashvars.=$string_flashvars_temp;

			$string_video="<object width='".$width."' height='".$height."' ";
			$string_video.= "classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' ";
			$string_video.= "codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' ";
			$string_video.= "align='center' style='overflow:hidden'>";

			$string_video.= "<param name='movie' value='".base_url().DIR_PUBLIC."mediaplayer/player.swf'>";
			$string_video.= "<param name='quality' value='high'>";
			$string_video.= "<param name='allowscriptaccess' value='always'>";
			$string_video.= "<param name='wmode' value='transparent'>";
			$string_video.= "<param name='allowfullscreen' value='true'>";
			$string_video.= "<param name='flashvars' value='".$string_flashvars."'>";
			$string_video.= "<embed width='".$width."' height='".$height."' ";
			$string_video.= "type='application/x-shockwave-flash' ";
			$string_video.= "pluginspage='http://www.macromedia.com/go/getflashplayer' ";
			$string_video.= "align='center' style='overflow:hidden' ";

			$string_video.= "src='".base_url().DIR_PUBLIC."mediaplayer/player.swf' ";
			$string_video.= "quality='high' ";
			$string_video.= "allowscriptaccess='always' ";
			$string_video.= "wmode='transparent' ";
			$string_video.= "allowfullscreen='true' ";
			$string_video.= "flashvars='".$string_flashvars."'>";
			$string_video.= "</object>";
		}
		return $string_video.$string_youtube;

	}

}

?>