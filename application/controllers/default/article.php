<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
  Copyright :Hồ Minh Trí


	1.Search thì lấy cả 3 title,keyword,description
    2.Lọc theo category,class,bài viết active thì lấy title,keyword
    3.Detail thì không lấy cái nào cả
 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Article extends CI_Controller{

	public $_arr_data=array();

	public function __construct(){

		parent::__construct();

		$this->load->library(array(DEFAULT_DIR_ROOT.'/my_layout','session','pagination'));
		$this->load->Model(array('m_news','m_category_news'));

		$this->_arr_data=$this->my_layout->set_layout();
        //echo '<pre>';
        //print_r($this->_arr_data);exit;
	}

	public function article_search_general(){

		if(($this->uri->segment(5,'') == '') && ($this->uri->segment(3,'') != '')){

			$key_search=urldecode($this->uri->segment(3,''));
			$get_page=$this->uri->segment(4,0);
			$number_page=floor($get_page / ROW_NEWS_PAGE) + 1;

			$this->_arr_data['data_content']['news']=$this->m_news->news_search_general_front_end($this->my_layout->sess_lang_default,$key_search,NULL,$get_page,ROW_NEWS_PAGE);
			$config['total_rows']=$this->m_news->count_news_search_general_front_end($this->my_layout->sess_lang_default,$key_search,NULL);
			$config['base_url']=base_url()."/news/search/".$this->uri->segment(3,'')."/";
			$config['per_page']=ROW_NEWS_PAGE;
			$config['uri_segment']=4;
			$this->pagination->initialize($config);

			$this->_arr_data['data_menu_header']['news_search']['key_search']=$key_search;
			$this->_arr_data['data_search_header']['news_search']['key_search']=$key_search;

			$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_news_search_general();
			$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_news_search_general_result_sidebar";

			$this->_arr_data['info_home']['facebook_title']=$key_search."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['facebook_description']=$key_search."-".$this->_arr_data['info_home']['description_web'];
			if(is_array($this->_arr_data['data_content']['news']) && !empty($this->_arr_data['data_content']['news'])){
				foreach($this->_arr_data['data_content']['news'] as $key=> $value){
					if($this->_arr_data['data_content']['news'][$key]['news_img'] != ""){
						$this->_arr_data['info_home']['facebook_image']=base_src_img($this->_arr_data['data_content']['news'][$key]['news_img']);
						break;
					}
				}
			}

			$this->_arr_data['info_home']['title_web']=$key_search."-".$this->_arr_data['info_home']['title_web']."-Trang ".$number_page;
			$this->_arr_data['info_home']['keyword_web']=$key_search.",".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=$key_search." ".$this->_arr_data['info_home']['description_web']."-Trang ".$number_page;

			$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);
		}
		else
			show_404('page');

	}

	public function article_search(){

		if(($this->uri->segment(6,'') == '') && ($this->uri->segment(4,'') != '')){

			$key_search=urldecode($this->uri->segment(3,''));
			$cate_id=$this->uri->segment(4,-1);
			$get_page=$this->uri->segment(5,0);
			$number_page=floor($get_page / ROW_NEWS_PAGE) + 1;

			if($key_search == ''){

				show_404('page');
			}
			else{

				if($key_search == '')
					$key_search=NULL;

				if($cate_id == -1)
					$arr_category_id=NULL;
				else
					$arr_category_id=$this->m_category_news->get_category_news_id_front_end($cate_id,$this->my_layout->sess_lang_default);

				$this->_arr_data['data_content']['news']=$this->m_news->news_search_front_end($this->my_layout->sess_lang_default,$key_search,$arr_category_id,$get_page,ROW_NEWS_PAGE);
				$config['total_rows']=$this->m_news->count_news_search_front_end($this->my_layout->sess_lang_default,$key_search,$arr_category_id);
				$config['base_url']=base_url()."/news/search/".$this->uri->segment(3,'')."/".$this->uri->segment(4,-1)."/";
				$config['per_page']=ROW_NEWS_PAGE;
				$config['uri_segment']=5;
				$this->pagination->initialize($config);

				$this->_arr_data['data_menu_header']['news_search']=array(
					'key_search'=>$key_search,
					'cate_id'=>$cate_id
				);

				$this->_arr_data['data_search_header']['news_search']=array(
					'key_search'=>$key_search,
					'cate_id'=>$cate_id
				);

				$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_news_search();
				$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_news_search_result_sidebar";

				$this->_arr_data['info_home']['facebook_title']=$key_search."-".$this->_arr_data['info_home']['title_web'];
				$this->_arr_data['info_home']['facebook_description']=$key_search."-".$this->_arr_data['info_home']['description_web'];
				if(is_array($this->_arr_data['data_content']['news']) && !empty($this->_arr_data['data_content']['news'])){
					foreach($this->_arr_data['data_content']['news'] as $key=> $value){
						if($this->_arr_data['data_content']['news'][$key]['news_img'] != ""){
							$this->_arr_data['info_home']['facebook_image']=base_src_img($this->_arr_data['data_content']['news'][$key]['news_img']);
							break;
						}
					}
				}

				$this->_arr_data['info_home']['title_web']=$key_search."-".$this->_arr_data['info_home']['title_web']."-Trang ".$number_page;
				$this->_arr_data['info_home']['keyword_web']=$key_search.",".$this->_arr_data['info_home']['keyword_web'];
				$this->_arr_data['info_home']['description_web']=$key_search." ".$this->_arr_data['info_home']['description_web']."-Trang ".$number_page;

				$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);
			}
		}
		else
			show_404('page');

	}

    public function index(){
        $news_class = 'article';
        $get_page=$this->uri->segment(2,0);
        $number_page=floor($get_page / ROW_NEWS_PAGE) + 1;

        $this->_arr_data['data_content']['news']=$this->m_news->list_news_front_end($news_class,$this->my_layout->sess_lang_default,$get_page,ROW_NEWS_PAGE);

        $config['total_rows']=$this->m_news->count_list_news_front_end($news_class,$this->my_layout->sess_lang_default);
        $config['base_url']=base_url().$news_class."/";
        $config['per_page']=ROW_NEWS_PAGE;
        $config['uri_segment']=2;
        $this->pagination->initialize($config);

        $this->_arr_data['data_content']['info_content']=$this->language->get_data_page_article_class($news_class);
        $this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_news_class_sidebar";

        $this->_arr_data['info_home']['facebook_title']=element('article_class_title',$this->_arr_data['data_content']['info_content'],'')."-".$this->_arr_data['info_home']['title_web'];
        $this->_arr_data['info_home']['facebook_description']=element('article_class_description',$this->_arr_data['data_content']['info_content'],'');
        if(is_array($this->_arr_data['data_content']['news']) && !empty($this->_arr_data['data_content']['news'])){
            foreach($this->_arr_data['data_content']['news'] as $key=> $value){
                if($this->_arr_data['data_content']['news'][$key]['news_img'] != ""){
                    $this->_arr_data['info_home']['facebook_image']=base_src_img($this->_arr_data['data_content']['news'][$key]['news_img']);
                    break;
                }
            }
        }

        $this->_arr_data['info_home']['title_web']=element('article_class_title',$this->_arr_data['data_content']['info_content'],'')."-".$this->_arr_data['info_home']['title_web']."-Trang ".$number_page;
        $this->_arr_data['info_home']['keyword_web']=element('article_class_keyword',$this->_arr_data['data_content']['info_content'],'').",".$this->_arr_data['info_home']['keyword_web'];
        $this->_arr_data['info_home']['description_web']=element('article_class_description',$this->_arr_data['data_content']['info_content'],'')."-Trang ".$number_page;
        //echo '<pre>';
        //print_r($this->_arr_data);exit;
        $this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

    }
	public function article_class(){
		$news_class=$this->uri->segment(1,'');
		$get_page=$this->uri->segment(2,0);
		$number_page=floor($get_page / ROW_NEWS_PAGE) + 1;

		$this->_arr_data['data_content']['news']=$this->m_news->list_news_front_end($news_class,$this->my_layout->sess_lang_default,$get_page,ROW_NEWS_PAGE);

		$config['total_rows']=$this->m_news->count_list_news_front_end($news_class,$this->my_layout->sess_lang_default);
		$config['base_url']=base_url().$news_class."/";
		$config['per_page']=ROW_NEWS_PAGE;
		$config['uri_segment']=2;
		$this->pagination->initialize($config);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_article_class($news_class);
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_news_class_sidebar";

		$this->_arr_data['info_home']['facebook_title']=element('article_class_title',$this->_arr_data['data_content']['info_content'],'')."-".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['info_home']['facebook_description']=element('article_class_description',$this->_arr_data['data_content']['info_content'],'');
		if(is_array($this->_arr_data['data_content']['news']) && !empty($this->_arr_data['data_content']['news'])){
			foreach($this->_arr_data['data_content']['news'] as $key=> $value){
				if($this->_arr_data['data_content']['news'][$key]['news_img'] != ""){
					$this->_arr_data['info_home']['facebook_image']=base_src_img($this->_arr_data['data_content']['news'][$key]['news_img']);
					break;
				}
			}
		}

		$this->_arr_data['info_home']['title_web']=element('article_class_title',$this->_arr_data['data_content']['info_content'],'')."-".$this->_arr_data['info_home']['title_web']."-Trang ".$number_page;
		$this->_arr_data['info_home']['keyword_web']=element('article_class_keyword',$this->_arr_data['data_content']['info_content'],'').",".$this->_arr_data['info_home']['keyword_web'];
		$this->_arr_data['info_home']['description_web']=element('article_class_description',$this->_arr_data['data_content']['info_content'],'')."-Trang ".$number_page;

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function article_class_one(){

		$news_class='article';

		$this->_arr_data['data_content']['category_news']=false;
		$arr_category_news=$this->m_category_news->list_category_news_root_front_end($news_class,$this->my_layout->sess_lang_default);
		if(is_array($arr_category_news) && !empty($arr_category_news)){

			foreach($arr_category_news as $key_category=> $value_category){
				$arr_category_id=$this->m_category_news->get_category_news_id_front_end(element('cate_id',$value_category),$this->my_layout->sess_lang_default);
				$arr_news=$this->m_news->list_news_one_category_front_end($arr_category_id,$news_class,$this->my_layout->sess_lang_default,0,10);
				if(is_array($arr_news) && !empty($arr_news)){

					$value_category['news']=$arr_news;
					$this->_arr_data['data_content']['category_news'][]=$value_category;
				}
			}
		}

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_article_class_one();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_news_class_one";

		$this->_arr_data['info_home']['facebook_title']=element('article_class_title',$this->_arr_data['data_content']['info_content'],'')."-".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['info_home']['facebook_description']=element('article_class_description',$this->_arr_data['data_content']['info_content'],'');
		$this->_arr_data['info_home']['facebook_image']="";

		$this->_arr_data['info_home']['title_web']=element('article_class_title',$this->_arr_data['data_content']['info_content'],'')."-".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['info_home']['keyword_web']=element('article_class_keyword',$this->_arr_data['data_content']['info_content'],'').",".$this->_arr_data['info_home']['keyword_web'];
		$this->_arr_data['info_home']['description_web']=element('article_class_description',$this->_arr_data['data_content']['info_content'],'');

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function article_category(){

		$news_class=$this->uri->segment(1,'');
		$cate_name=$this->uri->segment(2,'');
		$cate_id=$this->uri->segment(3,-1000);
		$get_page=$this->uri->segment(4,0);
		$number_page=floor($get_page / ROW_NEWS_PAGE) + 1;

		$arr_category_id=$this->m_category_news->get_category_news_id_front_end($cate_id,$this->my_layout->sess_lang_default);
		$this->_arr_data['data_content']['news']=$this->m_news->list_news_one_category_front_end($arr_category_id,$news_class,$this->my_layout->sess_lang_default,$get_page,ROW_NEWS_PAGE);

		$config['total_rows']=$this->m_news->count_list_news_one_category_front_end($arr_category_id,$news_class,$this->my_layout->sess_lang_default);
		$config['base_url']=base_url().$news_class."/".$cate_name."/".$cate_id."/";
		$config['per_page']=ROW_NEWS_PAGE;
		$config['uri_segment']=4;
		$this->pagination->initialize($config);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_article_category();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_news_category_sidebar";

		$this->_arr_data['data_content']['category']=$this->m_category_news->get_category_news_front_end($cate_id,$news_class,$this->my_layout->sess_lang_default);
		if(is_array($this->_arr_data['data_content']['category']) && !empty($this->_arr_data['data_content']['category'])){

			$this->_arr_data['info_home']['facebook_title']=element('cate_name',$this->_arr_data['data_content']['category'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['facebook_description']=element('cate_seo_description',$this->_arr_data['data_content']['category'],'');
			if(is_array($this->_arr_data['data_content']['news']) && !empty($this->_arr_data['data_content']['news'])){
				foreach($this->_arr_data['data_content']['news'] as $key=> $value){
					if($this->_arr_data['data_content']['news'][$key]['news_img'] != ""){
						$this->_arr_data['info_home']['facebook_image']=base_src_img($this->_arr_data['data_content']['news'][$key]['news_img']);
						break;
					}
				}
			}

			$this->_arr_data['info_home']['title_web']=element('cate_name',$this->_arr_data['data_content']['category'],'')."-".$this->_arr_data['info_home']['title_web']."-Trang ".$number_page;
			$this->_arr_data['info_home']['keyword_web']=element('cate_seo_keyword',$this->_arr_data['data_content']['category'],'').",".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=element('cate_seo_description',$this->_arr_data['data_content']['category'],'')."-Trang ".$number_page;
		}

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function article_detail(){

		$news_class=$this->uri->segment(2,'');
		$news_id=$this->uri->segment(5,true);
		$this->_arr_data['data_content']['news_one']=$this->m_news->get_news_front_end($news_id,$news_class,$this->my_layout->sess_lang_default);

		$cate_id=element('cate_id',$this->_arr_data['data_content']['news_one'],-1000);
		$arr_category_id=$this->m_category_news->get_category_news_id_front_end($cate_id,$this->my_layout->sess_lang_default);
		$this->_arr_data['data_content']['news']=$this->m_news->list_news_one_category_front_end($arr_category_id,$news_class,$this->my_layout->sess_lang_default,0,10);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_article_detail();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_news_detail_title";

		if(is_array($this->_arr_data['data_content']['news_one']) && !empty($this->_arr_data['data_content']['news_one'])){

			if(!$this->session->userdata('count_news'.element('news_id',$this->_arr_data['data_content']['news_one'],'')) || (time() - $this->session->userdata('count_news'.element('news_id',$this->_arr_data['data_content']['news_one'],'')) >= 600)){

				$this->session->set_userdata('count_news'.element('news_id',$this->_arr_data['data_content']['news_one']),time());
				$arr_data_intro['news_view']=element('news_view',$this->_arr_data['data_content']['news_one'],0) + 1;
				$arr_where_intro['news_id']=element('news_id',$this->_arr_data['data_content']['news_one'],'');
				$this->m_news->update_news($arr_data_intro,$arr_where_intro);
			}

			$this->_arr_data['info_home']['facebook_title']=element('news_name',$this->_arr_data['data_content']['news_one'],'');
			$this->_arr_data['info_home']['facebook_description']=element('news_seo_description',$this->_arr_data['data_content']['news_one'],'');
			$this->_arr_data['info_home']['facebook_image']=base_src_img(element('news_img',$this->_arr_data['data_content']['news_one'],''));

			$this->_arr_data['info_home']['title_web']=element('news_name',$this->_arr_data['data_content']['news_one'],'');
			$this->_arr_data['info_home']['keyword_web']=element('news_seo_keyword',$this->_arr_data['data_content']['news_one'],'');
			$this->_arr_data['info_home']['description_web']=element('news_seo_description',$this->_arr_data['data_content']['news_one'],'');
		}
		else
			show_404('page');

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

}

?>