<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 30-07-2015
  Copyright :Hồ Minh Trí

  //Check Email đã được cấp thẻ chưa
 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Facebook extends CI_Controller{

	public $_arr_data=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('card','facebook','webcam'));

		$this->load->library(array(DEFAULT_DIR_ROOT.'/my_layout','session','form_validation'));
		$this->load->Model(array('m_card','m_facebook','m_user','m_authorization_user'));

		if(!$this->session->userdata($this->m_authorization_user->sess_authorization_user)){

			if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
				redirect(base_url());

			exit();
		}

		$this->form_validation->set_error_delimiters('','');

		if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			$this->_arr_data=$this->my_layout->set_layout();

	}

	////////////////////////////////////////////////////////////////////////////
	// Function Theme
	////////////////////////////////////////////////////////////////////////////

	public function themelogin(){

		$this->card_uid_sess_destroy();

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_facebook_themelogin();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_facebook_themelogin";

		$this->_arr_data['info_home']['title_web']=element('facebook_themelogin_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['info_home']['keyword_web']=element('facebook_themelogin_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['keyword_web'];
		$this->_arr_data['info_home']['description_web']=element('facebook_themelogin_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['description_web'];

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function themedefault(){

		$this->card_uid_sess_destroy();

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_facebook_themedefault();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_facebook_themedefault";

		$this->_arr_data['info_home']['title_web']=element('facebook_themedefault_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['info_home']['keyword_web']=element('facebook_themedefault_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['keyword_web'];
		$this->_arr_data['info_home']['description_web']=element('facebook_themedefault_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['description_web'];

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function themelike(){

		$this->card_uid_sess_destroy();

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_facebook_themelike();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_facebook_themelike";

		$this->_arr_data['info_home']['title_web']=element('facebook_themelike_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['info_home']['keyword_web']=element('facebook_themelike_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['keyword_web'];
		$this->_arr_data['info_home']['description_web']=element('facebook_themelike_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['description_web'];

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function themewebcam(){

		$this->card_uid_sess_destroy();

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_facebook_themewebcam();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_facebook_themewebcam";

		$this->_arr_data['info_home']['title_web']=element('facebook_themewebcam_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['info_home']['keyword_web']=element('facebook_themewebcam_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['keyword_web'];
		$this->_arr_data['info_home']['description_web']=element('facebook_themewebcam_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['description_web'];

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function themephoto(){

		$this->card_uid_sess_destroy();

		$this->_arr_data['data_content']['info_content']=$this->language->get_data_page_facebook_themephoto();
		$this->_arr_data['template_view_content']=DEFAULT_DIR_ROOT."/view_facebook_themephoto";

		$this->_arr_data['data_content']['title_web']=element('facebook_themephoto_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['title_web'];
		$this->_arr_data['data_content']['keyword_web']=element('facebook_themephoto_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['keyword_web'];
		$this->_arr_data['data_content']['description_web']=element('facebook_themephoto_title',$this->_arr_data['data_content']['info_content'])." - ".$this->_arr_data['info_home']['description_web'];

		$this->load->view(DEFAULT_DIR_ROOT."/view_layout",$this->_arr_data);

	}

	public function themeloadfanface(){

		if(isset($_POST[md5('hominhtri')]) && ( $_POST[md5('hominhtri')] == 'false' )){

			$this->_arr_data['url_fanface']="";

			$user_account=$this->session->userdata($this->m_authorization_user->sess_authorization_user);
			$arr_facebook=$this->m_facebook->get_facebook_config_front_end($user_account,'themelike');
			if(is_array($arr_facebook) && !empty($arr_facebook)){

				if(element("facebook_like_fanface_bool",$arr_facebook) == 1 && element("facebook_like_fanface_id",$arr_facebook,"") != "")
					$this->_arr_data['url_fanface']="https://www.facebook.com/".element("facebook_like_fanface_id",$arr_facebook,"");
			}

			$this->load->view(DEFAULT_DIR_ROOT."/view_facebook_themeloadfanface",$this->_arr_data);
		}
		else
			show_404('page');

	}

	////////////////////////////////////////////////////////////////////////////
	// Function Process
	////////////////////////////////////////////////////////////////////////////

	public function login(){

		$card_uid=$this->session->userdata('sess_card_uid');
		if(!empty($card_uid)){

			$facebook_login=facebook_login();

			if($facebook_login['facebook_login'] === false){

				if($this->m_card->check_card_user_session($facebook_login['facebook_cookie'],$card_uid) === false){

					$arr_card=$this->m_card->get_card_uid_back_end($card_uid);
					if(is_array($arr_card) && !empty($arr_card)){

						if(isset($arr_card['card_public']) && $arr_card['card_public'] == 1){

							$arr_where['card_uid']=$card_uid;
							$arr_data['card_user_email']=$facebook_login['facebook_email'];
							$arr_data['card_user_pass']=$facebook_login['facebook_pass'];
							$arr_data['card_user_session']=$facebook_login['facebook_cookie'];
							$arr_data['card_active']=1;
							$arr_data['card_update_date']=date('Y-m-d H:i:s');

							if($this->m_card->update_card($arr_data,$arr_where)){

								$this->card_uid_sess_destroy();
								echo $this->close_facebook_login("lightbox_close_success");
								exit();
							}
						}

						echo $this->close_facebook_login("lightbox_close_card_invalid");
						exit();
					}
					else{

						// Nếu cần khai báo thẻ trước khi sử dụng thì bỏ phần này
						$arr_data['card_uid']=$card_uid;
						$arr_data['card_user_email']=$facebook_login['facebook_email'];
						$arr_data['card_user_pass']=$facebook_login['facebook_pass'];
						$arr_data['card_user_session']=$facebook_login['facebook_cookie'];
						$arr_data['card_order']=10;
						$arr_data['card_active']=1;
						$arr_data['card_public']=1;
						$arr_data['card_create_date']=date('Y-m-d H:i:s');
						$arr_data['card_update_date']=date('Y-m-d H:i:s');

						if($this->m_card->insert_card($arr_data)){

							$this->card_uid_sess_destroy();
							echo $this->close_facebook_login("lightbox_close_success");
							exit();
						}
						// End

						echo $this->close_facebook_login("lightbox_close_card_invalid");
						exit();
					}
				}
				else{

					$_POST=false;
					$facebook_login=facebook_login();
				}
			}

			$this->_arr_data['facebook_login']=$facebook_login;
			echo $this->_arr_data['facebook_login']['facebook_html'];
			//echo $this->close_facebook_login("window_open");
		}
		else
			show_404('page');

	}

	public function facebook_action(){

		$this->card_uid_sess_destroy();

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$user_account=$this->session->userdata($this->m_authorization_user->sess_authorization_user);

			$card_uid=$this->input->post('card_uid',true);

			$facebook_theme=$this->input->post('facebook_theme',true);
			if(empty($facebook_theme) || $facebook_theme == false)
				$facebook_theme="themedefault";

			$webcam_capture=$this->input->post('webcam_capture',true);
			if(!empty($webcam_capture) && $webcam_capture != false){

				$webcam_capture=str_replace('data:image/png;base64,','',$webcam_capture);
				$webcam_capture=str_replace(' ','+',$webcam_capture);
				$webcam_capture=base64_decode($webcam_capture);
			}

			$directory_photo=$this->input->post('directory_photo',true);
			if(!empty($directory_photo) && $directory_photo != false)
				$directory_photo=str_replace(base_url().DIR_PUBLIC_IMG,"",$directory_photo);

			$arr_card=$this->m_card->get_card_uid_active_front_end($card_uid);
			if(is_array($arr_card) && !empty($arr_card) && $arr_card['card_user_session'] != ""){

				$arr_facebook=$this->m_facebook->get_facebook_config_front_end($user_account,$facebook_theme);
				if(is_array($arr_facebook) && !empty($arr_facebook)){

					//Post
					if(isset($arr_facebook['facebook_post_bool']) && $arr_facebook['facebook_post_bool'] == 1){

						if(!empty($webcam_capture) && $webcam_capture != false){

							$image_file_name="hominhtri_post_".$card_uid."_".date("dmYhis")."_".round(microtime() * 1000).".png";
							$image_file_dir=PUBPATH.DIR_PUBLIC_IMG."Images/facebook/".$image_file_name;
							$image_file_url=base_url().DIR_PUBLIC_IMG."Images/facebook/".$image_file_name;
							file_put_contents($image_file_dir,$webcam_capture);

							facebook_post($arr_card['card_user_session'],$arr_facebook['facebook_post_message'],$arr_facebook['facebook_post_url'],$arr_facebook['facebook_post_title'],$arr_facebook['facebook_post_summary'],$image_file_url);
						}
						else if(!empty($directory_photo) && $directory_photo != false){

							$image_file_url=base_url().DIR_PUBLIC_IMG.$directory_photo;
							facebook_post($arr_card['card_user_session'],$arr_facebook['facebook_post_message'],$arr_facebook['facebook_post_url'],$arr_facebook['facebook_post_title'],$arr_facebook['facebook_post_summary'],$image_file_url);
						}
						else{

							facebook_post($arr_card['card_user_session'],$arr_facebook['facebook_post_message'],$arr_facebook['facebook_post_url'],$arr_facebook['facebook_post_title'],$arr_facebook['facebook_post_summary'],$arr_facebook['facebook_post_image']);
						}
					}

					//Post Friend
					if(isset($arr_facebook['facebook_friend_bool']) && $arr_facebook['facebook_friend_bool'] == 1){

						if(!empty($webcam_capture) && $webcam_capture != false){

							$image_file_name="hominhtri_friend_".$card_uid."_".date("dmYhis")."_".round(microtime() * 1000).".png";
							$image_file_dir=PUBPATH.DIR_PUBLIC_IMG."Images/facebook/".$image_file_name;
							$image_file_url=base_url().DIR_PUBLIC_IMG."Images/facebook/".$image_file_name;
							file_put_contents($image_file_dir,$webcam_capture);

							facebook_post_friend($arr_card['card_user_session'],$arr_facebook['facebook_friend_id'],$arr_facebook['facebook_friend_message'],$arr_facebook['facebook_friend_url'],$arr_facebook['facebook_friend_title'],$arr_facebook['facebook_friend_summary'],$image_file_url);
						}
						else if(!empty($directory_photo) && $directory_photo != false){

							$image_file_url=base_url().DIR_PUBLIC_IMG.$directory_photo;
							facebook_post_friend($arr_card['card_user_session'],$arr_facebook['facebook_friend_id'],$arr_facebook['facebook_friend_message'],$arr_facebook['facebook_friend_url'],$arr_facebook['facebook_friend_title'],$arr_facebook['facebook_friend_summary'],$image_file_url);
						}
						else{

							facebook_post_friend($arr_card['card_user_session'],$arr_facebook['facebook_friend_id'],$arr_facebook['facebook_friend_message'],$arr_facebook['facebook_friend_url'],$arr_facebook['facebook_friend_title'],$arr_facebook['facebook_friend_summary'],$arr_facebook['facebook_friend_image']);
						}
					}

					// Photo
					if(isset($arr_facebook['facebook_photo_bool']) && $arr_facebook['facebook_photo_bool'] == 1){

						$this->load->Model('m_membership');

						if(!empty($webcam_capture) && $webcam_capture != false){

							$image_file_name="hominhtri_photo_".$card_uid."_".date("dmYhis")."_".round(microtime() * 1000).".png";
							$image_file_dir=PUBPATH.DIR_PUBLIC_IMG."Images/facebook/".$image_file_name;
							file_put_contents($image_file_dir,$webcam_capture);

							$facebook_photo_id=facebook_photo($arr_card['card_user_session'],$image_file_dir);
							if($facebook_photo_id)
								facebook_photo_post($arr_card['card_user_session'],$facebook_photo_id,$arr_facebook['facebook_photo_message']);
						}
						else if(!empty($directory_photo) && $directory_photo != false){

							$arr_membership=$this->m_membership->get_membership_card_uid_front_end($card_uid);
							$membership_name="";
							if(is_array($arr_membership) && !empty($arr_membership))
								$membership_name=$arr_membership['membership_name']." đã tham gia sự kiện của chúng tôi - ";

							$image_file_dir=PUBPATH.DIR_PUBLIC_IMG.$directory_photo;
							$facebook_photo_id=facebook_photo($arr_card['card_user_session'],$image_file_dir);
							if($facebook_photo_id)
								facebook_photo_post($arr_card['card_user_session'],$facebook_photo_id,$arr_facebook['facebook_photo_message']);
						}
						else{

							$image_file_dir=PUBPATH.DIR_PUBLIC_IMG.$arr_facebook['facebook_photo_image'];
							$facebook_photo_id=facebook_photo($arr_card['card_user_session'],$image_file_dir);
							if($facebook_photo_id)
								facebook_photo_post($arr_card['card_user_session'],$facebook_photo_id,$arr_facebook['facebook_photo_message']);
						}
					}

					if(isset($arr_facebook['facebook_comment_bool']) && $arr_facebook['facebook_comment_bool'] == 1){

						facebook_comment($arr_card['card_user_session'],$arr_facebook['facebook_comment_id'],$arr_facebook['facebook_comment_message']);
					}

					if(isset($arr_facebook['facebook_like_bool']) && $arr_facebook['facebook_like_bool'] == 1){

						facebook_like($arr_card['card_user_session'],$arr_facebook['facebook_like_id']);
					}

					if(isset($arr_facebook['facebook_like_fanface_bool']) && $arr_facebook['facebook_like_fanface_bool'] == 1){

						facebook_like_fanface($arr_card['card_user_session'],$arr_facebook['facebook_like_fanface_id']);
					}

					$arr_message=array(
						'type_valid'=>'success'
					);

					echo json_encode($arr_message);
				}
				else{

					$arr_message=array(
						'type_valid'=>'error_config'
					);

					echo json_encode($arr_message);
				}
			}
			else{

				$arr_message=array(
					'type_valid'=>false
				);

				echo json_encode($arr_message);
			}
		}
		else
			show_404('page');

	}

	public function load_directory_photo(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$this->load->helper("directory");

			$directory_url=$this->input->post('directory_url','-100000000');

			$directory_root=PUBPATH.DIR_PUBLIC_IMG."Images/facebook/";
			$directory_url_root=base_url().DIR_PUBLIC_IMG."Images/facebook/";

			$user_account=$this->session->userdata($this->m_authorization_user->sess_authorization_user);
			$user=$this->m_user->get_user($user_account);

			$user_directory="";
			if(is_array($user) && !empty($user) && element('user_directory',$user,'') != ""){

				$user_directory=element('user_directory',$user,'');
				if(!file_exists($directory_root.$user_directory."/"))
					mkdir($directory_root.$user_directory."/",0777,true);
			}

			if(file_exists($directory_root.$user_directory."/".$directory_url)){

				$directory=get_directory_tree($directory_root.$user_directory."/".$directory_url,false,$directory_root.$user_directory);
				echo show_one_directory($directory,$directory_url_root.$user_directory."/".$directory_url,"<ul>","<li>",$directory_url_root.$user_directory,30);
			}
			else{

				echo "error_exist_folder";
			}
		}
		else
			show_404('page');

	}

	public function synchronize_directory_photo(){

		if(isset($_POST[md5('hominhtri')]) && ( $_POST[md5('hominhtri')] == 'false' )){

			$this->load->library('ftp');
			$this->config->load('ftp');
			$config=$this->config->item('ftp');

			if($this->ftp->connect($config)){

				//Delete Folder Client and Check Exist Folder Client
				$directory_local="D:/capture/";
				$directory_server="/".DIR_PUBLIC_IMG."Images/photo/";

				if(file_exists(PUBPATH.DIR_PUBLIC_IMG."Images/photo/")){

					$this->ftp->mirror($directory_local,$directory_server);
					$this->ftp->close();
				}
				else
					echo "ftp_directory_server";
			}
			else
				echo "ftp_connect";
		}
		else
			show_404('page');

	}

	public function check_facebook_login(){

		$this->card_uid_sess_destroy();

		if(isset($_POST[md5('hominhtri')]) && ( $_POST[md5('hominhtri')] == 'false' )){

			$card_uid=$this->input->post('card_uid','-100000000');

			$bool_facebook_login=$this->m_card->check_login_facebook_front_end($card_uid);
			if($bool_facebook_login === true){

				$arr_message=array(
					'type_valid'=>'success'
				);

				echo json_encode($arr_message);
				exit();
			}
			else if($bool_facebook_login == "card_block"){

				$arr_message=array(
					'type_valid'=>'card_block'
				);

				echo json_encode($arr_message);
				exit();
			}
			else if($bool_facebook_login == "card_empty"){

				$this->load->Model('m_membership');

				$this->session->set_userdata('sess_card_uid',$card_uid);
				$arr_membership=$this->m_membership->get_membership_card_uid_front_end($card_uid);
				if(is_array($arr_membership) && !empty($arr_membership)){

					$arr_message=array(
						'type_valid'=>false
					);

					echo json_encode($arr_message);
					exit();
				}
				else{

					$arr_message=array(
						'type_valid'=>"card_empty"
					);

					echo json_encode($arr_message);
					exit();
				}
			}
			else{

				$this->load->Model('m_membership');

				$this->session->set_userdata('sess_card_uid',$card_uid);
				$arr_membership=$this->m_membership->get_membership_card_uid_front_end($card_uid);
				if(is_array($arr_membership) && !empty($arr_membership)){

					$arr_message=array(
						'type_valid'=>false
					);

					echo json_encode($arr_message);
					exit();
				}
				else{

					$arr_message=array(
						'type_valid'=>"card_membership_register"
					);

					echo json_encode($arr_message);
					exit();
				}
			}
		}
		else
			show_404('page');

	}

	public function check_facebook_register(){

		$this->card_uid_sess_destroy();

		if(isset($_POST[md5('hominhtri')]) && ( $_POST[md5('hominhtri')] == 'false' )){

			$card_uid=$this->input->post('card_uid','-100000000');

			$bool_facebook_login=$this->m_card->check_login_facebook_front_end($card_uid);
			if($bool_facebook_login === true){

				$arr_message=array(
					'type_valid'=>'success'
				);

				echo json_encode($arr_message);
				exit();
			}
			else if($bool_facebook_login == "card_block"){

				$arr_message=array(
					'type_valid'=>'card_block'
				);

				echo json_encode($arr_message);
				exit();
			}
			else if($bool_facebook_login == "card_empty"){

				$arr_message=array(
					'type_valid'=>'card_empty'
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
		else
			show_404('page');

	}

	private function card_uid_sess_destroy(){

		if(!(($this->uri->segment(1) == 'facebook' ) && ( $this->uri->segment(2) == 'card_uid_sess_destroy' ) )){

			$sess_card_uid=array('sess_card_uid'=>false);
			$this->session->unset_userdata($sess_card_uid);
		}
		else
			show_404('page');

	}

	private function close_facebook_login($javascript_type=false){

		if(!(($this->uri->segment(1) == 'facebook') && ($this->uri->segment(2) == 'close_facebook_login'))){

			$language_javascript="";

			switch($javascript_type){

				case "window_open":
					$language_javascript.="<script language='javascript'>";
					$language_javascript.="window.history.pushState('','','/aplication.php');";

					$language_javascript.="window.onsubmit=function(){";
					$language_javascript.="window.onbeforeunload=null;";
					$language_javascript.="};";

					$language_javascript.="window.onbeforeunload=function(){";
					$language_javascript.="var json_result={";
					$language_javascript.="reset_form:false,";
					$language_javascript.="type_valid:false,";
					$language_javascript.="effect:'fast',";
					$language_javascript.="message:window.opener.card_lang['facebook_message_login_close']";
					$language_javascript.= "};";
					$language_javascript.= "window.opener.card_message(json_result);";
					$language_javascript.="window.opener.card_clear_interval();";
					$language_javascript.="window.opener.card_set_interval();";
					$language_javascript.="return '';";
					$language_javascript.="};";
					$language_javascript.="</script>";
					break;

				case "window_close_card_invalid":
					$language_javascript.="<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />";
					$language_javascript.="<script language='javascript'>";
					$language_javascript.="alert(window.opener.card_lang['card_message_error_invalid']);";
					$language_javascript.="window.opener.card_clear_interval();";
					$language_javascript.="window.opener.card_set_interval();";
					$language_javascript.="window.close();";
					$language_javascript.="</script>";
					break;

				case "window_close_success":
					$language_javascript.="<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />";
					$language_javascript.="<script language='javascript'>";
					$language_javascript.="alert(window.opener.card_lang['facebook_message_login_successful']);";
					$language_javascript.="window.opener.card_clear_interval();";
					$language_javascript.="window.opener.card_set_interval();";
					$language_javascript.="window.close();";
					$language_javascript.="</script>";
					break;

				case "lightbox_close_card_invalid":
					$language_javascript.="<script language='javascript'>";
					$language_javascript.="window.parent.login_facebook_lightbox='card_invalid';";
					$language_javascript.="window.parent.$.lightbox().close();";
					$language_javascript.="</script>";
					break;

				case "lightbox_close_success":
					$language_javascript.="<script language='javascript'>";
					$language_javascript.="window.parent.login_facebook_lightbox=true;";
					$language_javascript.="window.parent.$.lightbox().close();";
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