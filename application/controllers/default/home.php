<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends CI_Controller{

	public $_arr_data=array();

	public function __construct(){

		parent::__construct();

		$this->load->library(array(DEFAULT_DIR_ROOT.'/my_layout','pagination'));
		$this->load->Model(array('m_category_product','m_product'));

		$this->_arr_data=$this->my_layout->set_layout();

	}

	public function home_index(){

		$this->_arr_data['data_content']['product_prominent']=$this->m_product->product_prominent_front_end('product',$this->my_layout->sess_lang_default,0,21);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_home();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_home_index";
		//echo '<pre>';
		//print_r($this->_arr_data);exit;
		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function home_index_1(){

		//List Product Prominent Of Category
		$this->_arr_data['data_content']['category_product']="";
		$arr_category_product=$this->m_category_product->list_category_product_root_front_end('product',$this->my_layout->sess_lang_default);
		if(is_array($arr_category_product) && !empty($arr_category_product)){

			foreach($arr_category_product as $key=> $value){

				$arr_cate_id=$this->m_category_product->get_category_product_id_front_end(element('cate_id',$value,''),$this->my_layout->sess_lang_default);
				$arr_product=$this->m_product->product_prominent_category_front_end($arr_cate_id,'product',$this->my_layout->sess_lang_default,0,4);
				if(is_array($arr_product) && !empty($arr_product)){

					$value['product']=$arr_product;
					$this->_arr_data['data_content']['category_product'][]=$value;
				}
			}
		}

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_home();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_home_index";

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function home_index_2(){

		$this->_arr_data['data_content']['latest_news']=$this->m_news->latest_news_front_end('article',$this->my_layout->sess_lang_default,0,4);
		$this->_arr_data['data_content']['news_view']=$this->m_news->news_view_front_end('article',$this->my_layout->sess_lang_default,0,4);
		$this->_arr_data['data_content']['news_order']=$this->m_news->news_order_front_end('article',$this->my_layout->sess_lang_default,0,4);

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_home();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_home_index";

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

}

?>