<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Product extends CI_Controller{

	public $_arr_data=array();

	public function __construct(){

		parent::__construct();

		$this->load->library(array(DEFAULT_DIR_ROOT.'/my_layout','pagination','form_validation'));
		$this->load->Model(array('m_category_product','m_product','m_comment'));

		$this->_arr_data=$this->my_layout->set_layout();

	}

	public function product_search_general(){

		if(($this->uri->segment(5,'') == '') && ($this->uri->segment(3,'') != '')){

			$key_search=urldecode($this->uri->segment(3,''));
			$get_page=$this->uri->segment(4,0);
			$number_page=floor($get_page / ROW_SEARCH_PRODUCT_PAGE) + 1;

			$this->_arr_data['data_content']['product']=$this->m_product->product_search_general_front_end($this->my_layout->sess_lang_default,$key_search,NULL,NULL,NULL,$get_page,ROW_SEARCH_PRODUCT_PAGE);
			$config['total_rows']=$this->m_product->count_product_search_general_front_end($this->my_layout->sess_lang_default,$key_search,NULL,NULL,NULL);
			$config['base_url']=base_url()."/product/search/".$this->uri->segment(3,'')."/";
			$config['per_page']=ROW_SEARCH_PRODUCT_PAGE;
			$config['uri_segment']=4;
			$this->pagination->initialize($config);

			$this->_arr_data['data_menu_header']['product_search']['key_search']=$key_search;
			$this->_arr_data['data_search_header']['product_search']['key_search']=$key_search;

			$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_product_search_general();
			$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_product_search_general_result";

			$this->_arr_data['info_home']['facebook_title']=$key_search."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['facebook_description']=$key_search."-".$this->_arr_data['info_home']['description_web'];
			if(is_array($this->_arr_data['data_content']['product']) && !empty($this->_arr_data['data_content']['product'])){
				foreach($this->_arr_data['data_content']['product'] as $key=> $value){
					if($this->_arr_data['data_content']['product'][$key]['product_img'] != ""){

						$url_img_product=array();
						$url_img=@unserialize(element('product_img',$this->_arr_data['data_content']['product'][$key],array()));
						if(is_array($url_img) && !empty($url_img))
							foreach($url_img as $key_img=> $value_img)
								$url_img_product[]=$value_img;

						$this->_arr_data['info_home']['facebook_image']=base_src_img(element(0,$url_img_product,''));
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

	public function product_search(){

		if(($this->uri->segment(8,'') == '') && ($this->uri->segment(6,'') != '')){

			$key_search=urldecode($this->uri->segment(3,''));
			$cate_id=$this->uri->segment(4,-1);
			$price_begin=$this->uri->segment(5,-1);
			$price_end=$this->uri->segment(6,-1);
			$get_page=$this->uri->segment(7,0);
			$number_page=floor($get_page / ROW_SEARCH_PRODUCT_PAGE) + 1;

			if(($key_search == '') && ($price_begin == -1) && ($price_end == -1)){

				show_404('page');
			}
			else if($price_begin != -1 && $price_end != -1 && ($price_begin > $price_end)){

				show_404('page');
			}
			else{

				if($key_search == '')
					$key_search=NULL;

				if($cate_id == -1)
					$arr_category_id=NULL;
				else
					$arr_category_id=$this->m_category_product->get_category_product_id_front_end($cate_id,$this->my_layout->sess_lang_default);

				if($price_begin == -1)
					$price_begin=NULL;

				if($price_end == -1)
					$price_end=NULL;

				$this->_arr_data['data_content']['product']=$this->m_product->product_search_front_end($this->my_layout->sess_lang_default,$key_search,$arr_category_id,$price_begin,$price_end,$get_page,ROW_SEARCH_PRODUCT_PAGE);
				$config['total_rows']=$this->m_product->count_product_search_front_end($this->my_layout->sess_lang_default,$key_search,$arr_category_id,$price_begin,$price_end);
				$config['base_url']=base_url()."/product/search/".$this->uri->segment(3,'')."/".$this->uri->segment(4,-1)."/".$this->uri->segment(5,-1)."/".$this->uri->segment(6,-1)."/";
				$config['per_page']=ROW_SEARCH_PRODUCT_PAGE;
				$config['uri_segment']=7;
				$this->pagination->initialize($config);

				$this->_arr_data['data_menu_header']['product_search']=array(
					'key_search'=>$key_search,
					'cate_id'=>$cate_id,
					'price_begin'=>$price_begin,
					'price_end'=>$price_end
				);

				$this->_arr_data['data_search_header']['product_search']=array(
					'key_search'=>$key_search,
					'cate_id'=>$cate_id,
					'price_begin'=>$price_begin,
					'price_end'=>$price_end
				);

				$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_product_search();
				$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_product_search_result";

				$this->_arr_data['info_home']['facebook_title']=$key_search."-".$this->_arr_data['info_home']['title_web'];
				$this->_arr_data['info_home']['facebook_description']=$key_search."-".$this->_arr_data['info_home']['description_web'];
				if(is_array($this->_arr_data['data_content']['product']) && !empty($this->_arr_data['data_content']['product'])){
					foreach($this->_arr_data['data_content']['product'] as $key=> $value){
						if($this->_arr_data['data_content']['product'][$key]['product_img'] != ""){

							$url_img_product=array();
							$url_img=@unserialize(element('product_img',$this->_arr_data['data_content']['product'][$key],array()));
							if(is_array($url_img) && !empty($url_img))
								foreach($url_img as $key_img=> $value_img)
									$url_img_product[]=$value_img;

							$this->_arr_data['info_home']['facebook_image']=base_src_img(element(0,$url_img_product,''));
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

	public function product_class(){

		$get_page=$this->uri->segment(2,0);
		$number_page=floor($get_page / ROW_PRODUCT_PAGE) + 1;

		$this->_arr_data['data_content']['product']=$this->m_product->list_product_front_end($this->my_layout->product_class,$this->my_layout->sess_lang_default,$get_page,ROW_PRODUCT_PAGE);

		$config['total_rows']=$this->m_product->count_list_product_front_end($this->my_layout->product_class,$this->my_layout->sess_lang_default);
		$config['base_url']=base_url().$this->my_layout->product_class."/";
		$config['per_page']=ROW_PRODUCT_PAGE;
		$config['uri_segment']=2;
		$this->pagination->initialize($config);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_product_class($this->my_layout->product_class);
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_product_class";

		$this->_arr_data['info_home']['facebook_title']=element('product_class_title',$this->_arr_data['data_content']['info_content'],'')."-".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['info_home']['facebook_description']=element('product_class_description',$this->_arr_data['data_content']['info_content'],'');
		if(is_array($this->_arr_data['data_content']['product']) && !empty($this->_arr_data['data_content']['product'])){
			foreach($this->_arr_data['data_content']['product'] as $key=> $value){
				if($this->_arr_data['data_content']['product'][$key]['product_img'] != ""){

					$url_img_product=array();
					$url_img=@unserialize(element('product_img',$this->_arr_data['data_content']['product'][$key],array()));
					if(is_array($url_img) && !empty($url_img))
						foreach($url_img as $key_img=> $value_img)
							$url_img_product[]=$value_img;

					$this->_arr_data['info_home']['facebook_image']=base_src_img(element(0,$url_img_product,''));
					break;
				}
			}
		}

		$this->_arr_data['info_home']['title_web']=element('product_class_title',$this->_arr_data['data_content']['info_content'],'')."-".$this->_arr_data['info_home']['title_web']."-Trang ".$number_page;
		$this->_arr_data['info_home']['keyword_web']=element('product_class_keyword',$this->_arr_data['data_content']['info_content'],'').",".$this->_arr_data['info_home']['keyword_web'];
		$this->_arr_data['info_home']['description_web']=element('product_class_description',$this->_arr_data['data_content']['info_content'],'')."-Trang ".$number_page;

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function product_class_one(){

		$this->_arr_data['data_content']['category_product']=false;
		$arr_category_product=$this->m_category_product->list_category_product_root_front_end($this->my_layout->product_class,$this->my_layout->sess_lang_default);
		if(is_array($arr_category_product) && !empty($arr_category_product)){

			foreach($arr_category_product as $key_category=> $value_category){
				$arr_category_id=$this->m_category_product->get_category_product_id_front_end(element('cate_id',$value_category),$this->my_layout->sess_lang_default);
				$arr_product=$this->m_product->list_product_one_category_front_end($arr_category_id,$this->my_layout->product_class,$this->my_layout->sess_lang_default,0,12);
				if(is_array($arr_product) && !empty($arr_product)){

					$value_category['product']=$arr_product;
					$this->_arr_data['data_content']['category_product'][]=$value_category;
				}
			}
		}

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_product_class_one();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_product_class_one";

		$this->_arr_data['info_home']['facebook_title']=element('product_class_title',$this->_arr_data['data_content']['info_content'],'')."-".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['info_home']['facebook_description']=element('product_class_description',$this->_arr_data['data_content']['info_content'],'');
		$this->_arr_data['info_home']['facebook_image']="";

		$this->_arr_data['info_home']['title_web']=element('product_class_title',$this->_arr_data['data_content']['info_content'],'')."-".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['info_home']['keyword_web']=element('product_class_keyword',$this->_arr_data['data_content']['info_content'],'').",".$this->_arr_data['info_home']['keyword_web'];
		$this->_arr_data['info_home']['description_web']=element('product_class_description',$this->_arr_data['data_content']['info_content'],'');

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function product_category(){

		$cate_name=$this->uri->segment(2,"no_category");
		$cate_id=$this->uri->segment(3,true);
		$get_page=$this->uri->segment(4,0);
		$number_page=floor($get_page / ROW_PRODUCT_PAGE) + 1;

		$arr_category_id=$this->m_category_product->get_category_product_id_front_end($cate_id,$this->my_layout->sess_lang_default);
		$this->_arr_data['data_content']['product']=$this->m_product->list_product_one_category_front_end($arr_category_id,$this->my_layout->product_class,$this->my_layout->sess_lang_default,$get_page,ROW_PRODUCT_PAGE);

		$config['total_rows']=$this->m_product->count_list_product_one_category_front_end($arr_category_id,$this->my_layout->product_class,$this->my_layout->sess_lang_default);
		$config['base_url']=base_url().$this->my_layout->product_class."/".$cate_name."/".$cate_id."/";
		$config['per_page']=ROW_PRODUCT_PAGE;
		$config['uri_segment']=4;
		$this->pagination->initialize($config);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_product_category();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_product_category";

		$this->_arr_data['data_content']['category']=$this->m_category_product->get_category_product_front_end($cate_id,$this->my_layout->product_class,$this->my_layout->sess_lang_default);
		if(is_array($this->_arr_data['data_content']['category']) && !empty($this->_arr_data['data_content']['category'])){

			$this->_arr_data['info_home']['facebook_title']=element('cate_name',$this->_arr_data['data_content']['category'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['facebook_description']=element('cate_seo_description',$this->_arr_data['data_content']['category'],'');
			if(is_array($this->_arr_data['data_content']['product']) && !empty($this->_arr_data['data_content']['product'])){
				foreach($this->_arr_data['data_content']['product'] as $key=> $value){
					if($this->_arr_data['data_content']['product'][$key]['product_img'] != ""){

						$url_img_product=array();
						$url_img=@unserialize(element('product_img',$this->_arr_data['data_content']['product'][$key],array()));
						if(is_array($url_img) && !empty($url_img))
							foreach($url_img as $key_img=> $value_img)
								$url_img_product[]=$value_img;

						$this->_arr_data['info_home']['facebook_image']=base_src_img(element(0,$url_img_product,''));
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

	public function product_partner(){

		$this->load->Model('m_partner');

		$cate_name=$this->uri->segment(3,"no_category");
		$cate_id=$this->uri->segment(4,true);
		$get_page=$this->uri->segment(5,0);
		$number_page=floor($get_page / ROW_PRODUCT_PAGE) + 1;

		$this->_arr_data['data_content']['product']=$this->m_product->list_product_one_partner_front_end($cate_id,$this->my_layout->product_class,$this->my_layout->sess_lang_default,$get_page,ROW_PRODUCT_PAGE);

		$config['total_rows']=$this->m_product->count_list_product_one_partner_front_end($cate_id,$this->my_layout->product_class,$this->my_layout->sess_lang_default);
		$config['base_url']=base_url().$this->my_layout->product_class."/partner/".$cate_name."/".$cate_id."/";
		$config['per_page']=ROW_PRODUCT_PAGE;
		$config['uri_segment']=5;
		$this->pagination->initialize($config);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_product_partner();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_product_partner";

		$this->_arr_data['data_content']['partner']=$this->m_partner->get_partner_front_end($cate_id,'partner',$this->my_layout->sess_lang_default);
		if(is_array($this->_arr_data['data_content']['partner']) && !empty($this->_arr_data['data_content']['partner'])){

			$this->_arr_data['info_home']['facebook_title']=element('partner_name',$this->_arr_data['data_content']['partner'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['facebook_description']=element('partner_name',$this->_arr_data['data_content']['partner'],'')."-".$this->_arr_data['info_home']['description_web'];
			$this->_arr_data['info_home']['facebook_image']=base_src_img(element('partner_img',$this->_arr_data['data_content']['partner'],''));

			$this->_arr_data['info_home']['title_web']=element('partner_name',$this->_arr_data['data_content']['partner'],'')."-".$this->_arr_data['info_home']['title_web']."-Trang ".$number_page;
			$this->_arr_data['info_home']['keyword_web']=element('partner_name',$this->_arr_data['data_content']['partner'],'').",".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=element('partner_name',$this->_arr_data['data_content']['partner'],'')." ".$this->_arr_data['info_home']['description_web']."-Trang ".$number_page;
		}

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function product_application(){

		$this->load->Model('m_application');

		$cate_name=$this->uri->segment(3,"no_category");
		$cate_id=$this->uri->segment(4,true);
		$get_page=$this->uri->segment(5,0);
		$number_page=floor($get_page / ROW_PRODUCT_PAGE) + 1;

		$this->_arr_data['data_content']['product']=$this->m_product->list_product_one_application_front_end($cate_id,$this->my_layout->product_class,$this->my_layout->sess_lang_default,$get_page,ROW_PRODUCT_PAGE);

		$config['total_rows']=$this->m_product->count_list_product_one_application_front_end($cate_id,$this->my_layout->product_class,$this->my_layout->sess_lang_default);
		$config['base_url']=base_url().$this->my_layout->product_class."/applications/".$cate_name."/".$cate_id."/";
		$config['per_page']=ROW_PRODUCT_PAGE;
		$config['uri_segment']=5;
		$this->pagination->initialize($config);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_product_application();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_product_application";

		$this->_arr_data['data_content']['application']=$this->m_application->get_application_front_end($cate_id,$this->my_layout->sess_lang_default);
		if(is_array($this->_arr_data['data_content']['application']) && !empty($this->_arr_data['data_content']['application'])){

			$this->_arr_data['info_home']['facebook_title']=element('application_name',$this->_arr_data['data_content']['application'],'')."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['facebook_description']=element('application_name',$this->_arr_data['data_content']['application'],'')."-".$this->_arr_data['info_home']['description_web'];
			if(is_array($this->_arr_data['data_content']['product']) && !empty($this->_arr_data['data_content']['product'])){
				foreach($this->_arr_data['data_content']['product'] as $key=> $value){
					if($this->_arr_data['data_content']['product'][$key]['product_img'] != ""){

						$url_img_product=array();
						$url_img=@unserialize(element('product_img',$this->_arr_data['data_content']['product'][$key],array()));
						if(is_array($url_img) && !empty($url_img))
							foreach($url_img as $key_img=> $value_img)
								$url_img_product[]=$value_img;

						$this->_arr_data['info_home']['facebook_image']=base_src_img(element(0,$url_img_product,''));
						break;
					}
				}
			}

			$this->_arr_data['info_home']['title_web']=element('application_name',$this->_arr_data['data_content']['application'],'')."-".$this->_arr_data['info_home']['title_web']."-Trang ".$number_page;
			$this->_arr_data['info_home']['keyword_web']=element('application_name',$this->_arr_data['data_content']['application'],'').",".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=element('application_name',$this->_arr_data['data_content']['application'],'')." ".$this->_arr_data['info_home']['description_web']."-Trang ".$number_page;
		}

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function product_detail(){

		$product_id=$this->uri->segment(5,true);
		$this->_arr_data['data_content']['product_one']=$this->m_product->get_product_front_end($product_id,$this->my_layout->product_class,$this->my_layout->sess_lang_default);

		$cate_id=element('cate_id',$this->_arr_data['data_content']['product_one'],-1000);
		$arr_category_id=$this->m_category_product->get_category_product_id_front_end($cate_id,$this->my_layout->sess_lang_default);
		$this->_arr_data['data_content']['product']=$this->m_product->list_product_one_category_front_end($arr_category_id,$this->my_layout->product_class,$this->my_layout->sess_lang_default,0,12);

		//$this->_arr_data['data_content']['advertise']=$this->m_advertise->show_list_advertise(array(21,22),'advertise',$this->my_layout->sess_lang_default,"<div class='advertise' style='margin:0px auto;width:650px;'>","</div>",650);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_product_detail();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_product_detail";

		if(is_array($this->_arr_data['data_content']['product_one']) && !empty($this->_arr_data['data_content']['product_one'])){

			if(!$this->session->userdata('count_detail_product'.element('product_id',$this->_arr_data['data_content']['product_one'],'')) || ( time() - $this->session->userdata('count_detail_product'.element('product_id',$this->_arr_data['data_content']['product_one'],'')) >= 600 )){

				$this->session->set_userdata('count_detail_product'.element('product_id',$this->_arr_data['data_content']['product_one'],''),time());
				$arr_data_product['product_view']=element('product_view',$this->_arr_data['data_content']['product_one'],0) + 1;
				$arr_where_product['product_id']=element('product_id',$this->_arr_data['data_content']['product_one'],'');
				$this->m_product->update_product($arr_data_product,$arr_where_product);
			}

			$this->_arr_data['info_home']['facebook_title']=element('product_name',$this->_arr_data['data_content']['product_one'],'');
			$this->_arr_data['info_home']['facebook_description']=element('product_seo_description',$this->_arr_data['data_content']['product_one'],'');
			if(is_array($this->_arr_data['data_content']['product_one']) && !empty($this->_arr_data['data_content']['product_one'])){
				if($this->_arr_data['data_content']['product_one']['product_img'] != ""){

					$url_img_product=array();
					$url_img=@unserialize(element('product_img',$this->_arr_data['data_content']['product_one'],array()));
					if(is_array($url_img) && !empty($url_img))
						foreach($url_img as $key_img=> $value_img)
							$url_img_product[]=$value_img;

					$this->_arr_data['info_home']['facebook_image']=base_src_img(element(0,$url_img_product,''));
				}
			}

			$this->_arr_data['info_home']['title_web']=element('product_name',$this->_arr_data['data_content']['product_one'],'');
			$this->_arr_data['info_home']['keyword_web']=element('product_seo_keyword',$this->_arr_data['data_content']['product_one'],'');
			$this->_arr_data['info_home']['description_web']=element('product_seo_description',$this->_arr_data['data_content']['product_one'],'');
		}
		else
			show_404('page');

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

}

?>