<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Video extends CI_Controller{

	public $_arr_data=array();

	public function __construct(){

		parent::__construct();
		$this->load->library(array(DEFAULT_DIR_ROOT.'/my_layout','session','pagination'));
		$this->load->Model(array('m_video','m_category_sub'));

		define('ROW_VIDEO_PAGE',10);

		$this->_arr_data=$this->my_layout->set_layout();

	}

	public function video_class(){

		$video_class=$this->uri->segment(1,'');
		$get_page=$this->uri->segment(2,0);
		$number_page=floor($get_page / ROW_VIDEO_PAGE) + 1;

		$this->_arr_data['data_content']['video']=$this->m_video->list_video_front_end($video_class,$this->my_layout->sess_lang_default,$get_page,ROW_VIDEO_PAGE);

		$config['total_rows']=$this->m_video->count_list_video_front_end($video_class,$this->my_layout->sess_lang_default);
		$config['base_url']=base_url().$video_class."/";
		$config['per_page']=ROW_VIDEO_PAGE;
		$config['uri_segment']=2;
		$this->pagination->initialize($config);

		$this->_arr_data['data_content']['video_class']=$video_class;

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_video_class($video_class);
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_video_class";

		$this->_arr_data['info_home']['facebook_title']=element('video_class_title',$this->_arr_data['data_content']['info_content'],'')."-".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['info_home']['facebook_description']=element('video_class_description',$this->_arr_data['data_content']['info_content'],'')."-".$this->_arr_data['info_home']['description_web'];
		if(is_array($this->_arr_data['data_content']['video']) && !empty($this->_arr_data['data_content']['video'])){
			foreach($this->_arr_data['data_content']['video'] as $key=> $value){
				if($this->_arr_data['data_content']['video'][$key]['video_img'] != ""){
					$this->_arr_data['info_home']['facebook_image']=base_src_img($this->_arr_data['data_content']['video'][$key]['video_img']);
					break;
				}
			}
		}

		$this->_arr_data['info_home']['title_web']=element('video_class_title',$this->_arr_data['data_content']['info_content'],'')."-".$this->_arr_data['info_home']['title_web']."-Trang ".$number_page;
		$this->_arr_data['info_home']['keyword_web']=element('video_class_keyword',$this->_arr_data['data_content']['info_content'],'').",".$this->_arr_data['info_home']['keyword_web'];
		$this->_arr_data['info_home']['description_web']=element('video_class_description',$this->_arr_data['data_content']['info_content'],'')." ".$this->_arr_data['info_home']['description_web']."-Trang ".$number_page;

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function video_category(){

		$video_class=$this->uri->segment(1,'');
		$cate_name=$this->uri->segment(2,'');
		$cate_id=$this->uri->segment(3,-1000);
		$get_page=$this->uri->segment(4,0);
		$number_page=floor($get_page / ROW_VIDEO_PAGE) + 1;

		$arr_category_id=$this->m_category_sub->get_category_sub_id_front_end($cate_id,$this->my_layout->sess_lang_default);
		$this->_arr_data['data_content']['video']=$this->m_video->list_video_one_category_front_end($arr_category_id,$video_class,$this->my_layout->sess_lang_default,$get_page,ROW_VIDEO_PAGE);

		$config['total_rows']=$this->m_video->count_list_video_one_category_front_end($arr_category_id,$video_class,$this->my_layout->sess_lang_default);
		$config['base_url']=base_url().$video_class."/".$cate_name."/".$cate_id."/";
		$config['per_page']=ROW_VIDEO_PAGE;
		$config['uri_segment']=4;
		$this->pagination->initialize($config);

		$this->_arr_data['data_content']['video_class']=$video_class;

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_video_category();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_video_category";

		$this->_arr_data['data_content']['category']=$this->m_category_sub->get_category_sub_front_end($cate_id,$video_class,$this->my_layout->sess_lang_default);
		if(is_array($this->_arr_data['data_content']['category']) && !empty($this->_arr_data['data_content']['category'])){

			$this->_arr_data['info_home']['facebook_title']=element('cate_name',$this->_arr_data['data_content']['category'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['facebook_description']=element('cate_name',$this->_arr_data['data_content']['category'],'')."-".$this->_arr_data['info_home']['description_web'];
			if(is_array($this->_arr_data['data_content']['video']) && !empty($this->_arr_data['data_content']['video'])){
				foreach($this->_arr_data['data_content']['video'] as $key=> $value){
					if($this->_arr_data['data_content']['video'][$key]['video_img'] != ""){
						$this->_arr_data['info_home']['facebook_image']=base_src_img($this->_arr_data['data_content']['video'][$key]['video_img']);
						break;
					}
				}
			}

			$this->_arr_data['info_home']['title_web']=element('cate_name',$this->_arr_data['data_content']['category'],'')."-".$this->_arr_data['info_home']['title_web']."-Trang ".$number_page;
			$this->_arr_data['info_home']['keyword_web']=element('cate_name',$this->_arr_data['data_content']['category'],'').",".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=element('cate_name',$this->_arr_data['data_content']['category'],'')." ".$this->_arr_data['info_home']['description_web']."-Trang ".$number_page;
		}

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function video_detail(){

		$video_class=$this->uri->segment(2,'');
		$video_id=$this->uri->segment(5,0);
		$this->_arr_data['data_content']['video_one']=$this->m_video->get_video_front_end($video_id,$video_class,$this->my_layout->sess_lang_default);
		$this->_arr_data['data_content']['video_html']=$this->m_video->show_one_video_front_end($video_id,$video_class,$this->my_layout->sess_lang_default,600,400);

		$cate_id=element('cate_id',$this->_arr_data['data_content']['video_one'],-1000);
		$arr_category_id=$this->m_category_sub->get_category_sub_id_front_end($cate_id,$this->my_layout->sess_lang_default);
		$this->_arr_data['data_content']['video']=$this->m_video->list_video_one_category_front_end($arr_category_id,$video_class,$this->my_layout->sess_lang_default,0,12);

		$this->_arr_data['data_content']['video_class']=$video_class;

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_video_detail();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_video_detail";

		if(is_array($this->_arr_data['data_content']['video_one']) && !empty($this->_arr_data['data_content']['video_one'])){

			$this->_arr_data['info_home']['facebook_title']=element('video_name',$this->_arr_data['data_content']['video_one'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['facebook_description']=element('video_name',$this->_arr_data['data_content']['video_one'],'')."-".$this->_arr_data['info_home']['description_web'];
			$this->_arr_data['info_home']['facebook_image']=base_src_img(element('video_img',$this->_arr_data['data_content']['video_one'],''));

			$this->_arr_data['info_home']['title_web']=element('video_name',$this->_arr_data['data_content']['video_one'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['keyword_web']=element('video_name',$this->_arr_data['data_content']['video_one'],'')."-".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=element('video_name',$this->_arr_data['data_content']['video_one'],'')."-".$this->_arr_data['info_home']['description_web'];
		}
		else
			show_404('page');

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

}

?>
