<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 31-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cart extends CI_Controller{

	public $_arr_data=array();
	public $_type_cart='shopping'; //order : shopping
	public $_bool_quantity=false;
	public $_bool_mutil_items=true;

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array'));
		$this->load->library(array(DEFAULT_DIR_ROOT.'/my_layout',DEFAULT_DIR_ROOT.'/custom_cart','form_validation'));
		$this->load->Model(array('m_product','m_support'));
		$this->load->Model(array('m_user','m_authorization_user'));
		$this->load->Model(array('m_method_delivery','m_method_payment'));
		$this->load->Model(array('m_order','m_order_detail'));

		$this->form_validation->set_error_delimiters('','');

		if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			$this->_arr_data=$this->my_layout->set_layout();

	}

	function index(){

		if($this->_type_cart == 'order')
			redirect(base_url()."cart/order".URL_SUFFIX);
		else
			redirect(base_url()."cart/shopping".URL_SUFFIX);

	}

	public function insert(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$product_id=$this->input->post('product_id','-100000000');
			$arr_product=$this->m_product->get_product_order_front_end($product_id);
			if(is_array($arr_product) && !empty($arr_product) && ($this->_bool_quantity === false || element('product_number',$arr_product,0) > 0)){

				$arr_data=array(
					'cart_id'=>element('product_id',$arr_product,''),
					'cart_quantity'=>1,
					'cart_price'=>element('product_price',$arr_product,''),
					'cart_name'=>element('product_name',$arr_product,''),
					'options'=>array(
						'product_color'=>'',
						'product_size'=>0,
						'language'=>$this->my_layout->sess_lang_default
					)
				);

				if($this->_bool_mutil_items === false)
					$this->custom_cart->destroy_cart();

				if($this->custom_cart->insert_cart($arr_data) === TRUE){

					if($this->_type_cart == 'order')
						echo base_url()."cart/order".URL_SUFFIX;
					else
						echo base_url()."cart/shopping".URL_SUFFIX;
				}
				else
					echo 'cart_insert_failed';
			}
			else
				echo 'cart_error';
		}
		else
			show_404('page');

	}

	public function update_quantity(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(!preg_match("/^[1-9][0-9]*$/i",$this->uri->segment(5,'hominhtri'))){

				echo "quantity_numeric";
				exit();
			}

			$product_id=$this->uri->segment(4,'-100000000');
			$arr_product=$this->m_product->get_product_order_front_end($product_id);
			if(is_array($arr_product) && !empty($arr_product) && (($this->_bool_quantity === false) || (element('product_number',$arr_product,0) >= $this->uri->segment(5,true)))){

				$arr_data=array(
					'rowid'=>$this->uri->segment(3,true),
					'cart_quantity'=>$this->uri->segment(5,true)
				);

				if(!$this->custom_cart->update_cart($arr_data))
					echo "cart_update_failed";
				else if($this->_type_cart == 'order')
					$this->order();
				else
					$this->shopping();
			}
			else
				echo "cart_error";
		}
		else
			show_404('page');

	}

	public function delete(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->custom_cart->delete_cart($this->uri->segment(3,'-100000000'))){

				if($this->_type_cart == 'order')
					$this->order();
				else
					$this->shopping();
			}
			else
				echo "cart_delete_failed";
		}
		else
			show_404('page');

	}

	public function order(){

		if($this->_type_cart != 'order')
			show_404('page');

		$this->_arr_data['data_content']['product_cart']="";
		$arr_cart=$this->custom_cart->content_cart();

		if(is_array($arr_cart) && !empty($arr_cart)){

			foreach($arr_cart as $key=> $value){

				$arr_product=$this->m_product->get_product_order_front_end(element('cart_id',$value,'-100000000'));
				if(is_array($arr_product) && !empty($arr_product) && ($this->_bool_quantity === false || element('product_number',$arr_product,0) > 0))
					$this->_arr_data['data_content']['product_cart'][$key]=array_merge($value,$arr_product);
				else
					$this->custom_cart->delete_cart(element('rowid',$value,''));
			}
		}

		if(isset($_POST['action_form']) && ($_POST['action_form'] == 'submit_cart_order') && $this->form_validation->run('submit_cart_order')){

			$arr_cart_order['order_email']=$this->input->post('txt_order_email',true);
			$arr_cart_order['order_name']=$this->input->post('txt_order_name',true);
			$arr_cart_order['order_address']=$this->input->post('txt_order_address',true);
			$arr_cart_order['order_phone']=$this->input->post('txt_order_phone',true);
			$arr_cart_order['order_content']=$this->input->post('txt_order_content',true);

			$arr_template['data_template']=$arr_cart_order;
			$arr_template['data_template']['product']=$this->_arr_data['data_content']['product_cart'];
			$body=$this->load->view("template/template_cart_order",$arr_template,true);

			$send_me=false;
			if(isset($_POST['cart_order_send_me']) && ($_POST['cart_order_send_me'] == 1))
				$send_me=true;

			error_reporting(E_STRICT);

			if($this->m_support->mailer($arr_cart_order['order_email'],$arr_cart_order['order_name'],"Đơn Đặt Hàng",$body,NULL,array(9,10),'ordermail',$this->my_layout->sess_lang_default,$send_me)){

				switch($this->my_layout->sess_lang_default){

					case 'vi':
						$arr_cart_order['cate_id']=25;
						$arr_cart_order['delivery_id']=1;
						$arr_cart_order['payment_id']=1;
						break;

					case 'en':
						$arr_cart_order['cate_id']=26;
						$arr_cart_order['delivery_id']=2;
						$arr_cart_order['payment_id']=2;
						break;

					default:
						$arr_cart_order['cate_id']=25;
						$arr_cart_order['delivery_id']=1;
						$arr_cart_order['payment_id']=1;
				}

				if($this->m_order->insert_order_cart_front_end($arr_cart_order)){

					$this->session->set_flashdata('submit_cart',lang('message_order_success'));

					foreach($this->_arr_data['data_content']['product_cart'] as $key=> $value){

						$arr_product_update['product_buy']=1;
						if($this->_bool_quantity !== false)
							$arr_product_update['product_number']=$value['cart_quantity'];

						$this->m_product->update_product_front_end($arr_product_update,array('product_id'=>$value['cart_id']));
					}

					$this->custom_cart->destroy_cart();

					redirect(base_url().'cart/finish'.URL_SUFFIX);
					exit();
				}
				else
					$this->session->set_flashdata('submit_cart',alert(lang('message_order_failed')));
			}
			else
				$this->session->set_flashdata('submit_cart',alert(lang('message_order_failed')));
		}

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_cart_order(true);
			$this->load->view(DEFAULT_DIR_ROOT."/view_cart_order_multiple",$this->_arr_data['data_content']); //view_cart_order_multiple
		}
		else{

			$this->_arr_data['data_content']['info_content']=$info_content=$this->language->get_data_page_cart_order(false);
			$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_cart_order_multiple"; //view_cart_order_multiple

			$this->_arr_data['info_home']['title_web']=$info_content['cart_order_title']."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['keyword_web']=$info_content['cart_order_title']."-".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=$info_content['cart_order_title']."-".$this->_arr_data['info_home']['description_web'];

			$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);
		}

	}

	public function shopping(){

		if($this->_type_cart != 'shopping')
			show_404('page');

		$this->_arr_data['data_content']['product_cart']="";
		$arr_cart=$this->custom_cart->content_cart();

		if(is_array($arr_cart) && !empty($arr_cart)){

			foreach($arr_cart as $key=> $value){

				$arr_product=$this->m_product->get_product_order_front_end(element('cart_id',$value,'-100000000'));
				if(is_array($arr_product) && !empty($arr_product) && ($this->_bool_quantity === false || element('product_number',$arr_product,0) > 0))
					$this->_arr_data['data_content']['product_cart'][$key]=array_merge($value,$arr_product);
				else
					$this->custom_cart->delete_cart(element('rowid',$value,''));
			}
		}

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_cart_shopping(true);
			$this->load->view(DEFAULT_DIR_ROOT."/view_cart_shopping",$this->_arr_data['data_content']);
		}
		else{

			$this->_arr_data['data_content']['info_content']=$info_content=$this->language->get_data_page_cart_shopping(false);
			$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_cart_shopping";

			$this->_arr_data['info_home']['title_web']=$info_content['cart_shopping_title']."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['keyword_web']=$info_content['cart_shopping_title']."-".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=$info_content['cart_shopping_title']."-".$this->_arr_data['info_home']['description_web'];

			$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);
		}

	}

	public function method(){

		if($this->_type_cart != 'shopping')
			show_404('page');

		if(!$this->custom_cart->empty_cart()){

			if(isset($_POST['action_form']) && ($_POST['action_form'] == 'submit_cart_method') && $this->form_validation->run('submit_cart_method')){

				$arr_data['order_email']=$this->input->post('txt_order_email',true);
				$arr_data['order_name']=$this->input->post('txt_order_name',true);
				$arr_data['order_address']=$this->input->post('txt_order_address',true);
				$arr_data['order_phone']=$this->input->post('txt_order_phone',true);
				$arr_data['order_content']=$this->input->post('txt_order_content',true);
				$arr_data['delivery_id']=$this->input->post('txt_delivery_id',true);
				$arr_data['payment_id']=$this->input->post('txt_payment_id',true);

				$arr_data['cart_method_send_me']=$this->input->post('cart_method_send_me',true);

				$this->session->set_userdata('cart_method',$arr_data);
				redirect(base_url()."cart/confirm".URL_SUFFIX);
				exit();
			}

			$this->_arr_data['data_content']['info_method']=$this->session->userdata('cart_method');

			$account=$this->session->userdata($this->m_authorization_user->sess_authorization_user);
			$this->_arr_data['user']=$this->m_user->get_user($account);

			$this->_arr_data['data_content']['method_delivery']=$this->m_method_delivery->list_delivery_front_end($this->my_layout->sess_lang_default);
			$this->_arr_data['data_content']['method_payment']=$this->m_method_payment->list_payment_front_end($this->my_layout->sess_lang_default);

			$this->_arr_data['data_content']['info_content']=$info_content=$this->language->get_data_page_cart_method();
			$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_cart_method";

			$this->_arr_data['info_home']['title_web']=$info_content['cart_method_title']."-".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['keyword_web']=$info_content['cart_method_title']."-".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=$info_content['cart_method_title']."-".$this->_arr_data['info_home']['description_web'];

			$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);
		}
		else{

			redirect(base_url()."cart/shopping".URL_SUFFIX);
			exit();
		}

	}

	public function confirm(){

		if($this->_type_cart != 'shopping')
			show_404('page');

		if(!$this->custom_cart->empty_cart()){

			if(($this->session->userdata('cart_method')) && (count($this->session->userdata('cart_method')) >= 8)){

				$this->_arr_data['data_content']['product_cart']="";
				$arr_cart=$this->custom_cart->content_cart();

				if(is_array($arr_cart) && !empty($arr_cart)){

					foreach($arr_cart as $key=> $value){

						$arr_product=$this->m_product->get_product_order_front_end(element('cart_id',$value,'-100000000'));
						if(is_array($arr_product) && !empty($arr_product) && ($this->_bool_quantity === false || element('product_number',$arr_product,0) > 0))
							$this->_arr_data['data_content']['product_cart'][$key]=array_merge($value,$arr_product);
						else
							$this->custom_cart->delete_cart(element('rowid',$value,''));
					}
				}

				if(isset($_POST['action_form']) && ($_POST['action_form'] == 'submit_cart_confirm')){

					$arr_cart_method=$this->session->userdata('cart_method');

					$arr_cart_shopping['order_email']=element('order_email',$arr_cart_method,'');
					$arr_cart_shopping['order_name']=element('order_name',$arr_cart_method,'');
					$arr_cart_shopping['order_address']=element('order_address',$arr_cart_method,'');
					$arr_cart_shopping['order_phone']=element('order_phone',$arr_cart_method,'');
					$arr_cart_shopping['order_content']=element('order_content',$arr_cart_method,'');
					$arr_cart_shopping['delivery_id']=element('delivery_id',$arr_cart_method,'');
					$arr_cart_shopping['payment_id']=element('payment_id',$arr_cart_method,'');

					switch($this->my_layout->sess_lang_default){

						case 'vi':
							$arr_cart_shopping['cate_id']=25;
							break;

						case 'en':
							$arr_cart_shopping['cate_id']=26;
							break;

						default:
							$arr_cart_shopping['cate_id']=25;
					}

					if($this->m_order->insert_order_cart_front_end($arr_cart_shopping)){

						$this->session->set_flashdata('submit_cart',lang('message_shopping_success'));

						foreach($this->_arr_data['data_content']['product_cart'] as $key=> $value){

							$arr_product_update['product_buy']=1;
							if($this->_bool_quantity !== false)
								$arr_product_update['product_number']=$value['cart_quantity'];

							$this->m_product->update_product_front_end($arr_product_update,array('product_id'=>$value['cart_id']));
						}

						$arr_template['data_template']=$arr_cart_shopping;
						$arr_template['data_template']['product']=$this->_arr_data['data_content']['product_cart'];
						$body=$this->load->view("template/template_cart_shopping",$arr_template,true);

						$send_me=false;
						if(element('cart_method_send_me',$arr_cart_method,0) == 1)
							$send_me=true;

						error_reporting(E_STRICT);
						if(!$this->m_support->mailer($arr_cart_shopping['order_email'],$arr_cart_shopping['order_name'],"Đơn Đặt Hàng",$body,NULL,array(9,10),'ordermail',$this->my_layout->sess_lang_default,$send_me))
							$this->session->set_flashdata('submit_cart',lang('message_send_mail_shopping_failed'));

						$this->custom_cart->destroy_cart();
						$sess_cart_method=array('cart_method'=>false);
						$this->session->unset_userdata($sess_cart_method);

						redirect(base_url().'cart/finish'.URL_SUFFIX);
						exit();
					}
					else{

						$this->session->set_flashdata('submit_cart',lang('message_shopping_failed'));

						redirect(base_url().'cart/finish'.URL_SUFFIX);
						exit();
					}
				}

				$this->_arr_data['data_content']['cart_method']=$this->session->userdata('cart_method');
				$this->_arr_data['data_content']['delivery']=$this->m_method_delivery->get_delivery_front_end(element('delivery_id',$this->_arr_data['data_content']['cart_method']),$this->my_layout->sess_lang_default);
				$this->_arr_data['data_content']['payment']=$this->m_method_payment->get_payment_front_end(element('payment_id',$this->_arr_data['data_content']['cart_method']),$this->my_layout->sess_lang_default);

				$this->_arr_data['data_content']['info_content']=$info_content=$this->language->get_data_page_cart_confirm();
				$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_cart_confirm";

				$this->_arr_data['info_home']['title_web']=$info_content['cart_confirm_title']."-".$this->_arr_data['info_home']['title_web'];
				$this->_arr_data['info_home']['keyword_web']=$info_content['cart_confirm_title']."-".$this->_arr_data['info_home']['keyword_web'];
				$this->_arr_data['info_home']['description_web']=$info_content['cart_confirm_title']."-".$this->_arr_data['info_home']['description_web'];

				$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);
			}
			else{

				redirect(base_url()."cart/method".URL_SUFFIX);
				exit();
			}
		}
		else{

			redirect(base_url()."cart/shopping".URL_SUFFIX);
			exit();
		}

	}

	public function finish(){

		$submit_cart=$this->session->flashdata('submit_cart');
		if($submit_cart != ''){

			$this->session->set_flashdata('submit_cart',$submit_cart);
			custom_redirect(base_url(),'refresh',302,20);
			//$this->output->set_header('refresh:20;url='.base_url());
		}
		else{

			redirect(base_url());
			exit();
		}

		$this->_arr_data['data_content']['submit_cart']=$submit_cart;

		$this->_arr_data['data_content']['info_content']=$info_content=$this->language->get_data_page_cart_finish();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_cart_finish";

		$this->_arr_data['info_home']['title_web']=$info_content['cart_finish_title']."-".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['info_home']['keyword_web']=$info_content['cart_finish_title']."-".$this->_arr_data['info_home']['keyword_web'];
		$this->_arr_data['info_home']['description_web']=$info_content['cart_finish_title']."-".$this->_arr_data['info_home']['description_web'];

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function check_captcha($string_captcha=true){

		if(!(($this->uri->segment(1) == 'cart') && ($this->uri->segment(2) == 'check_captcha'))){

			if(trim($string_captcha) != trim($this->session->userdata('captcha_key_cart'))){

				$this->form_validation->set_message('check_captcha','%s');
				return false;
			}
			else
				return true;
		}
		else
			show_404('page');

	}

}

?>