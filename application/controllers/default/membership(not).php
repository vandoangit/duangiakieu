<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 01-10-2014
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Membership extends CI_Controller{

	public $_arr_data=array();

	public function __construct(){

		parent::__construct();

		$this->load->library(array(DEFAULT_DIR_ROOT.'/my_layout','session','form_validation'));
		$this->load->Model(array('m_membership','m_card','m_province','m_district'));

		$this->form_validation->set_error_delimiters('','');

		if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			$this->_arr_data=$this->my_layout->set_layout();

	}

	public function register(){

		if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'membership_register') && ($this->form_validation->run('membership_register'))){

			$card_uid=$this->input->post('card_uid',true);
			if($card_uid != false && !empty($card_uid)){

				$arr_membership=$this->m_membership->get_membership_card_uid_back_end($card_uid);
				$arr_card=$this->m_card->get_card_uid_back_end($card_uid);

				if(is_array($arr_membership) && !empty($arr_membership)){

					if((is_array($arr_card) && !empty($arr_card))){

						echo "register_success";
						exit();
					}
					else{

						echo "card_invalid";
						exit();
					}
				}
				else{

					if(!(is_array($arr_card) && !empty($arr_card))){

						/*
						  echo "card_invalid";
						  exit();
						 */

						// Nếu cần khai báo thẻ trước khi sử dụng thì bỏ phần này
						$arr_data_card['card_uid']=$card_uid;
						$arr_data_card['card_order']=10;
						$arr_data_card['card_active']=0;
						$arr_data_card['card_public']=1;
						$arr_data_card['card_create_date']=date('Y-m-d H:i:s');
						$arr_data_card['card_update_date']=date('Y-m-d H:i:s');

						if(!$this->m_card->insert_card($arr_data_card)){

							echo "register_failed";
							exit();
						}
						//End
					}

					$arr_data['card_uid']=$card_uid;
					$arr_data['membership_email']=$this->input->post('txt_membership_email',true);
					$arr_data['membership_name']=$this->input->post('txt_membership_name',true);
					$arr_data['membership_birthday']=date('Y-m-d H:i:s',strtotime($this->input->post('txt_membership_birthday',true)));
					$arr_data['membership_gender']=$this->input->post('txt_membership_gender',true);
					$arr_data['membership_address']=$this->input->post('txt_membership_address',true);
					$arr_data['membership_phone']=$this->input->post('txt_membership_phone',true);
					$arr_data['career_id']=$this->input->post('txt_career_category',true);
					$arr_data['district_id']=$this->input->post('txt_district_category',true);
					$arr_data['membership_public']=1;
					$arr_data['membership_order']=10;
					$arr_data['membership_create_date']=date('Y-m-d H:i:s');
					$arr_data['membership_update_date']=date('Y-m-d H:i:s');

					if($this->m_membership->insert_membership($arr_data)){

						echo "register_success";
						exit();
					}
					else{

						echo "register_failed";
						exit();
					}
				}
			}
			else{

				/*
				  echo "card_invalid";
				  exit();
				 */

				// Nếu cần khai báo thẻ trước khi sử dụng thì bỏ phần này
				$arr_data['card_uid']="";
				$arr_data['membership_email']=$this->input->post('txt_membership_email',true);
				$arr_data['membership_name']=$this->input->post('txt_membership_name',true);
				$arr_data['membership_birthday']=date('Y-m-d H:i:s',strtotime($this->input->post('txt_membership_birthday',true)));
				$arr_data['membership_gender']=$this->input->post('txt_membership_gender',true);
				$arr_data['membership_address']=$this->input->post('txt_membership_address',true);
				$arr_data['membership_phone']=$this->input->post('txt_membership_phone',true);
				$arr_data['career_id']=$this->input->post('txt_career_category',true);
				$arr_data['district_id']=$this->input->post('txt_district_category',true);
				$arr_data['membership_public']=1;
				$arr_data['membership_order']=10;
				$arr_data['membership_create_date']=date('Y-m-d H:i:s');
				$arr_data['membership_update_date']=date('Y-m-d H:i:s');

				if($this->m_membership->insert_membership($arr_data)){

					echo "register_success";
					exit();
				}
				else{

					echo "register_failed";
					exit();
				}
				//End
			}
		}

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if(isset($_POST['ajax_membership_register']) && ($_POST['ajax_membership_register'] == 'true')){

				$this->_arr_data['province']=$this->m_province->list_province_front_end($this->my_layout->sess_lang_default);
				$this->_arr_data['career']=array(
					array('career_id'=>'1','career_name'=>'Nhân Viên Văn Phòng'),
					array('career_id'=>'2','career_name'=>'Sinh Viên'),
					array('career_id'=>'3','career_name'=>'Nhân Viên Bán Hàng')
				);

				$this->_arr_data['info_content']=$this->language->get_data_membership_register_update('membership_register');
				$this->load->view(DEFAULT_DIR_ROOT."/view_membership_register_ajax",$this->_arr_data);
			}
			else
				echo "Validation";
		}
		else{

			$this->_arr_data['data_content']['province']=$this->m_province->list_province_front_end($this->my_layout->sess_lang_default);
			$this->_arr_data['data_content']['career']=array(
				array('career_id'=>'1','career_name'=>'Nhân Viên Văn Phòng'),
				array('career_id'=>'2','career_name'=>'Sinh Viên'),
				array('career_id'=>'3','career_name'=>'Nhân Viên Bán Hàng')
			);

			$this->_arr_data['data_content']['info_content']=$this->language->get_data_membership_register_update('membership_register');
			$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_membership_register";

			$this->_arr_data['info_home']['title_web']=element('info_membership_register',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['keyword_web']=element('info_membership_register',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=element('info_membership_register',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['description_web'];

			$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);
		}

	}

	public function card(){

		$this->load->helper('card');

		if((isset($_POST['action_form'])) && ($_POST['action_form'] == 'membership_card') && ($this->form_validation->run('membership_card'))){

			$card_uid=$this->input->post('card_uid',true);
			if($card_uid != false && !empty($card_uid)){

				$arr_membership=$this->m_membership->get_membership_card_uid_back_end($card_uid);
				$arr_card=$this->m_card->get_card_uid_back_end($card_uid);

				if(is_array($arr_membership) && !empty($arr_membership)){

					if((is_array($arr_card) && !empty($arr_card))){

						$arr_message=array(
							'type_valid'=>'exist_success'
						);

						echo json_encode($arr_message);
						exit();
					}
					else{

						$arr_message=array(
							'type_valid'=>'card_invalid'
						);

						echo json_encode($arr_message);
						exit();
					}
				}
				else{

					if(!(is_array($arr_card) && !empty($arr_card))){

						/*
						  $arr_message=array(
						  'type_valid'=>'card_invalid'
						  );

						  echo json_encode($arr_message);
						  exit();
						 */

						// Nếu cần khai báo thẻ trước khi sử dụng thì bỏ phần này
						$arr_data_card['card_uid']=$card_uid;
						$arr_data_card['card_order']=10;
						$arr_data_card['card_active']=0;
						$arr_data_card['card_public']=1;
						$arr_data_card['card_create_date']=date('Y-m-d H:i:s');
						$arr_data_card['card_update_date']=date('Y-m-d H:i:s');

						if(!$this->m_card->insert_card($arr_data_card)){

							$arr_message=array(
								'type_valid'=>false
							);

							echo json_encode($arr_message);
							exit();
						}
						//End
					}

					$arr_data['card_uid']=$card_uid;
					$arr_data['membership_email']=$this->input->post('txt_membership_email',true);
					$arr_data['membership_name']=$this->input->post('txt_membership_name',true);
					$arr_data['membership_birthday']=date('Y-m-d H:i:s',strtotime($this->input->post('txt_membership_birthday',true)));
					$arr_data['membership_gender']=$this->input->post('txt_membership_gender',true);
					$arr_data['membership_address']=$this->input->post('txt_membership_address',true);
					$arr_data['membership_phone']=$this->input->post('txt_membership_phone',true);
					$arr_data['career_id']=$this->input->post('txt_career_category',true);
					$arr_data['district_id']=$this->input->post('txt_district_category',true);
					$arr_data['membership_public']=1;
					$arr_data['membership_order']=10;
					$arr_data['membership_create_date']=date('Y-m-d H:i:s');
					$arr_data['membership_update_date']=date('Y-m-d H:i:s');

					if($this->m_membership->insert_membership($arr_data)){

						$arr_message=array(
							'type_valid'=>'success'
						);

						echo json_encode($arr_message);
						exit();
					}
					else{

						$arr_message=array(
							'type_valid'=>false
						);

						echo json_encode($arr_message);
						exit();
					}
				}
			}
			else{

				$arr_message=array(
					'type_valid'=>'card_invalid'
				);

				echo json_encode($arr_message);
				exit();
			}
		}

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$arr_message=array(
				'type_valid'=>'Validation'
			);

			echo json_encode($arr_message);
			exit();
		}
		else{

			$this->_arr_data['data_content']['province']=$this->m_province->list_province_front_end($this->my_layout->sess_lang_default);

			$this->_arr_data['data_content']['career']=array(
				array('career_id'=>'1','career_name'=>'Nhân Viên Văn Phòng'),
				array('career_id'=>'2','career_name'=>'Sinh Viên'),
				array('career_id'=>'3','career_name'=>'Nhân Viên Bán Hàng')
			);

			$this->_arr_data['data_content']['info_content']=$this->language->get_data_membership_card('membership_card');
			$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_membership_card";

			$this->_arr_data['info_home']['title_web']=element('info_membership_card',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['title_web'];
			$this->_arr_data['info_home']['keyword_web']=element('info_membership_card',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['keyword_web'];
			$this->_arr_data['info_home']['description_web']=element('info_membership_card',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['description_web'];

			$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);
		}

	}

	public function load_district(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$province_id=$this->input->post('province_id','-100000000');
			$this->_arr_data['data_content']['district']=$this->m_district->list_district_one_province_front_end($province_id,$this->my_layout->sess_lang_default);

			$this->_arr_data['data_content']['info_content']=$this->language->get_data_membership_district();
			$this->load->view(DEFAULT_DIR_ROOT."/view_membership_district",$this->_arr_data['data_content']);
		}
		else
			show_404('page');

	}

	public function check_captcha($string_captcha=true){

		if(!(($this->uri->segment(1) == 'membership' ) && ($this->uri->segment(2) == 'check_captcha'))){

			if(trim($string_captcha) != trim($this->session->userdata('captcha_key_membership'))){

				$this->form_validation->set_message('check_captcha','%s');
				return false;
			}
			else
				return true;
		}
		else
			show_404('page');

	}

	public function check_email($email=true){

		if(!(($this->uri->segment(1) == 'membership' ) && ($this->uri->segment(2) == 'check_email'))){

			$arr_membership=$this->m_membership->get_membership_email($email);
			if(is_array($arr_membership) && !empty($arr_membership)){

				$this->form_validation->set_message('check_email','%s');
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