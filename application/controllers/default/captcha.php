<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Captcha extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','custom_captcha','array'));
		$this->load->library(array('session'));

	}

	public function comment(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$setting=array(
				'img_path'=>'./upload/captcha/',
				'img_url'=>base_url().'upload/captcha/',
				'img_width'=>'100',
				'img_height'=>'28',
				'word'=>'',
				'font_path'=>'./upload/captcha/fonts/verdana.ttf',
				'font_size'=>'12',
				'char_length'=>6,
				'expiration'=>20
			);

			$captcha=create_captcha($setting);

			if($captcha !== false){

				$this->session->set_userdata('captcha_key_comment',element('word',$captcha,''));
				echo element('image',$captcha,'');
			}
			else{

				$this->session->unset_userdata('captcha_key_comment');
				echo 'captcha_error';
			}
		}
		else{

			$this->session->unset_userdata('captcha_key_comment');
			show_404('page');
		}

	}

	public function contact(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$setting=array(
				'img_path'=>'./upload/captcha/',
				'img_url'=>base_url().'upload/captcha/',
				'img_width'=>'150',
				'img_height'=>'28',
				'word'=>'',
				'font_path'=>'./upload/captcha/fonts/verdana.ttf',
				'font_size'=>'12',
				'char_length'=>6,
				'expiration'=>20
			);

			$captcha=create_captcha($setting);

			if($captcha !== false){

				$this->session->set_userdata('captcha_key_contact',element('word',$captcha,''));
				echo element('image',$captcha,'');
			}
			else{

				$this->session->unset_userdata('captcha_key_contact');
				echo 'captcha_error';
			}
		}
		else{

			$this->session->unset_userdata('captcha_key_contact');
			show_404('page');
		}

	}

	public function members(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$setting=array(
				'img_path'=>'./upload/captcha/',
				'img_url'=>base_url().'upload/captcha/',
				'img_width'=>'100',
				'img_height'=>'28',
				'word'=>'',
				'font_path'=>'./upload/captcha/fonts/verdana.ttf',
				'font_size'=>'12',
				'char_length'=>6,
				'expiration'=>20
			);

			$captcha=create_captcha($setting);

			if($captcha !== false){

				$this->session->set_userdata('captcha_key_members',element('word',$captcha,''));
				echo element('image',$captcha,'');
			}
			else{

				$this->session->unset_userdata('captcha_key_members');
				echo 'captcha_error';
			}
		}
		else{

			$this->session->unset_userdata('captcha_key_members');
			show_404('page');
		}

	}

	public function membership(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$setting=array(
				'img_path'=>'./upload/captcha/',
				'img_url'=>base_url().'upload/captcha/',
				'img_width'=>'100',
				'img_height'=>'28',
				'word'=>'',
				'font_path'=>'./upload/captcha/fonts/verdana.ttf',
				'font_size'=>'12',
				'char_length'=>6,
				'expiration'=>20
			);

			$captcha=create_captcha($setting);

			if($captcha !== false){

				$this->session->set_userdata('captcha_key_membership',element('word',$captcha,''));
				echo element('image',$captcha,'');
			}
			else{

				$this->session->unset_userdata('captcha_key_membership');
				echo 'captcha_error';
			}
		}
		else{

			$this->session->unset_userdata('captcha_key_membership');
			show_404('page');
		}

	}

	public function cart(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$setting=array(
				'img_path'=>'./upload/captcha/',
				'img_url'=>base_url().'upload/captcha/',
				'img_width'=>'100',
				'img_height'=>'28',
				'word'=>'',
				'font_path'=>'./upload/captcha/fonts/verdana.ttf',
				'font_size'=>'12',
				'char_length'=>6,
				'expiration'=>20
			);

			$captcha=create_captcha($setting);

			if($captcha !== false){

				$this->session->set_userdata('captcha_key_cart',element('word',$captcha,''));
				echo element('image',$captcha,'');
			}
			else{

				$this->session->unset_userdata('captcha_key_cart');
				echo 'captcha_error';
			}
		}
		else{

			$this->session->unset_userdata('captcha_key_cart');
			show_404('page');
		}

	}

}

?>