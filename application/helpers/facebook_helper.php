<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(!function_exists('send_request')){

	function send_request($url_request,$cookie=NULL,$header=NULL,$param=NULL,$header_type=NULL){

		$ch=curl_init();

		curl_setopt($ch,CURLOPT_HEADER,$header);  // include the header in the output
		curl_setopt($ch,CURLOPT_NOBODY,$header);  // get header
		curl_setopt($ch,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);   // browser name
		//curl_setopt($ch,CURLOPT_TIMEOUT,300);                                   // timeout
		@curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);   // allow redirects 
		curl_setopt($ch,CURLOPT_URL,$url_request);   // url request
		curl_setopt($ch,CURLOPT_COOKIE,$cookie);

		if($param){

			curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
			curl_setopt($ch,CURLOPT_POST,1);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$param);
		}

		if($header_type){

			curl_setopt($ch,CURLOPT_HTTPHEADER,$header_type);
		}

		// receive server response ...
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CAINFO,PUBPATH.DIR_PUBLIC."fb_ca_chain_bundle.crt");
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,true);

		$result=curl_exec($ch);

		if($result)
			return $result;
		else
			return curl_error($ch);

		curl_close($ch);

	}

}

if(!function_exists('facebook_login')){

	function facebook_login(){

		$url_request="https://login.facebook.com/login.php";

		if(isset($_POST['email']) && isset($_POST['pass']) && !empty($_POST['email'])){

			$param="email=".$_POST['email']."&pass=".$_POST['pass'];

			$result_temp=send_request($url_request,NULL,true,$param);
			preg_match('%Set-Cookie: ([^;]+);%',$result_temp,$result_login);

			$result_temp=send_request($url_request,$result_login[1],true,$param);
			preg_match_all('%Set-Cookie: ([^;]+);%',$result_temp,$result_cookie);

			$str_cookie='';
			if(isset($result_cookie[1]) && !empty($result_cookie[1])){

				foreach($result_cookie[1] as $key=> $val){

					$arr_temp=explode('=',$val);
					if(isset($arr_temp[0]) && isset($arr_temp[1])){

						$str_cookie.=$val.";";
						$arr_cookie[$arr_temp[0]]=$arr_temp[1];
					}
				}
			}

			if(isset($arr_cookie['c_user'])){

				$arr_result=array(
					'facebook_login'=>false,
					'facebook_cookie'=>$str_cookie,
					'facebook_email'=>$_POST['email'],
					'facebook_pass'=>$_POST['pass']
				);

				return $arr_result;
			}
			else{

				$request_login=send_request($url_request,$result_login[1],NULL,$param);

				$arr_result=array(
					'facebook_login'=>true,
					'facebook_html'=>$request_login
				);

				return $arr_result;
			}
		}

		$request_login=send_request($url_request);

		$arr_result=array(
			'facebook_login'=>true,
			'facebook_html'=>$request_login
		);

		return $arr_result;

	}

}

if(!function_exists('arr_facebook_cookie')){

	function arr_facebook_cookie($str_cookie){

		if(!empty($str_cookie)){

			$array_cookie=explode(';',$str_cookie);
			if(is_array($array_cookie) && !empty($array_cookie)){

				$result_array=array();
				foreach($array_cookie as $key=> $value){

					$array_cookie_temp=explode('=',$value);
					if(is_array($array_cookie_temp) && !empty($array_cookie_temp) && !empty($array_cookie_temp[0]) && isset($array_cookie_temp[1]))
						$result_array[$array_cookie_temp[0]]=$array_cookie_temp[1];
				}

				if(isset($result_array['c_user']))
					return $result_array;
			}
		}

		return false;

	}

}

if(!function_exists('check_facebook_login')){

	function check_facebook_login($str_cookie){

		$result_array=arr_facebook_cookie($str_cookie);
		if(isset($result_array['c_user']))
			return true;

		return false;

	}

}

if(!function_exists('facebook_dtsg')){

	function facebook_dtsg($url_request,$str_cookie){

		if(!empty($str_cookie)){

			$result_temp=send_request($url_request,$str_cookie);

			if(strpos($result_temp,"name=\"fb_dtsg\"") !== false){

				$fb_dtsg=substr($result_temp,strpos($result_temp,"name=\"fb_dtsg\""));
				$fb_dtsg=substr($fb_dtsg,strpos($fb_dtsg,"value=") + 7);
				$fb_dtsg=substr($fb_dtsg,0,strpos($fb_dtsg,"\""));
				return $fb_dtsg;
			}
		}

		return false;

	}

}

if(!function_exists('facebook_privacyx')){

	function facebook_privacyx($url_request,$str_cookie){

		if(!empty($str_cookie)){

			$result_temp=send_request($url_request,$str_cookie);

			if(strpos($result_temp,"name=\"fb_dtsg\"") !== false){

				$fb_dtsg=substr($result_temp,strpos($result_temp,"name=\"fb_dtsg\""));
				$fb_dtsg=substr($fb_dtsg,strpos($fb_dtsg,"value=") + 7);
				$fb_dtsg=substr($fb_dtsg,0,strpos($fb_dtsg,"\""));

				$privacyx=substr($result_temp,strpos($result_temp,"name=\"privacyx\""));
				$privacyx=substr($privacyx,strpos($privacyx,"value=") + 7);
				$privacyx=substr($privacyx,0,strpos($privacyx,"\""));

				return array("fb_dtsg"=>$fb_dtsg,"privacyx"=>$privacyx);
			}
		}

		return false;

	}

}

if(!function_exists('facebook_get_friend')){

	function facebook_get_friend($str_cookie){

		if(!empty($str_cookie)){

			$result_temp=send_request("http://www.facebook.com/friends_all/?everyone&ref=tn",$str_cookie);
			$result_friend=array();

			preg_match_all("%\"mobileFriends\":\[([0-9,]+)\]%",$result_temp,$result_friend_mobile);
			if(isset($result_friend_mobile[1]) && isset($result_friend_mobile[1][0]) && !empty($result_friend_mobile[1][0])){

				$result_friend=array_merge($result_friend,explode(",",$result_friend_mobile[1][0]));
			}

			preg_match_all("%\"lastActiveTimes\":\{([0-9,:\"]+)\}%",$result_temp,$result_friend_last_active_times);
			if(isset($result_friend_last_active_times[1]) && isset($result_friend_last_active_times[1][0]) && !empty($result_friend_last_active_times[1][0])){

				$result_friend_last_active_times=explode(",",$result_friend_last_active_times[1][0]);
				foreach($result_friend_last_active_times as $key=> $value){

					$result_friend_temp=explode(":",$value);
					$result_friend[]=substr($result_friend_temp[0],1,-1);
				}
			}

			preg_match_all("%\"list\":\[([0-9,\-\"]+)\]%",$result_temp,$result_friend_list);
			if(isset($result_friend_list[1]) && isset($result_friend_list[1][0]) && !empty($result_friend_list[1][0])){

				$result_friend_list=explode(",",$result_friend_list[1][0]);
				foreach($result_friend_list as $key=> $value){

					$result_friend[]=substr($value,1,-3);
				}
			}

			$result_friend=array_unique($result_friend);
			$result_friend=array_values($result_friend);
			return $result_friend;
		}

		return array();

	}

}

if(!function_exists('facebook_post')){

	function facebook_post($str_cookie,$message,$share_url='',$share_title='',$share_summary='',$share_image=''){

		if(!empty($str_cookie) && !empty($message)){

			$arr_cookie=arr_facebook_cookie($str_cookie);
			$fb_dtsg=facebook_dtsg("https://www.facebook.com",$str_cookie);

			if($arr_cookie !== false && $fb_dtsg !== false){

				$url_request="https://www.facebook.com/ajax/updatestatus.php?__av=".$arr_cookie['c_user'];

				$param="&fb_dtsg=".$fb_dtsg;
				$param .="&__user=".$arr_cookie['c_user'];
				$param.="&xhpc_message=".$message;

				if(!empty($share_url)){

					$param .="&attachment[type]=100";
					$param .="&attachment[params][urlInfo][user]=".$share_url;
				}

				if(!empty($share_url) && !empty($share_title))
					$param .="&attachment[params][title]=".$share_title;

				if(!empty($share_url) && !empty($share_summary))
					$param .="&attachment[params][summary]=".$share_summary;

				if(!empty($share_url) && !empty($share_image))
					$param .="&attachment[params][images][0]=https://fbexternal-a.akamaihd.net/safe_image.php?url=".$share_image;

				return send_request($url_request,$str_cookie,true,$param);
			}
		}

		return false;

	}

}

if(!function_exists('facebook_post_friend')){

	function facebook_post_friend($str_cookie,$friend_id,$message,$share_url='',$share_title='',$share_summary='',$share_image=''){

		if(!empty($str_cookie) && !empty($friend_id) && !empty($message)){

			$arr_cookie=arr_facebook_cookie($str_cookie);
			$fb_dtsg=facebook_dtsg("https://www.facebook.com",$str_cookie);

			if($arr_cookie !== false && $fb_dtsg !== false){

				$url_request="https://www.facebook.com/ajax/updatestatus.php?__av=".$arr_cookie['c_user'];

				$param="&fb_dtsg=".$fb_dtsg;
				$param .="&__user=".$arr_cookie['c_user'];
				$param .="&xhpc_targetid=".$friend_id;
				$param.="&xhpc_message=".$message;

				if(!empty($share_url)){

					$param .="&attachment[type]=100";
					$param .="&attachment[params][urlInfo][user]=".$share_url;
				}

				if(!empty($share_url) && !empty($share_title))
					$param .="&attachment[params][title]=".$share_title;

				if(!empty($share_url) && !empty($share_summary))
					$param .="&attachment[params][summary]=".$share_summary;

				if(!empty($share_url) && !empty($share_image))
					$param .="&attachment[params][images][0]=https://fbexternal-a.akamaihd.net/safe_image.php?url=".$share_image;

				return send_request($url_request,$str_cookie,true,$param);
			}
		}

		return false;

	}

}

if(!function_exists('facebook_comment')){

	function facebook_comment($str_cookie,$ft_ent_identifier,$comment_text){

		if(!empty($str_cookie) && !empty($ft_ent_identifier) && !empty($comment_text)){

			$arr_cookie=arr_facebook_cookie($str_cookie);
			$fb_dtsg=facebook_dtsg("https://www.facebook.com",$str_cookie);

			if($arr_cookie !== false && $fb_dtsg !== false){

				$url_request="https://www.facebook.com/ajax/ufi/add_comment.php";

				$param="&fb_dtsg=".$fb_dtsg;
				$param .="&__user=".$arr_cookie['c_user'];
				$param .="&ft_ent_identifier=".$ft_ent_identifier;
				$param.="&comment_text=".$comment_text;

				$param .="&client_id=1411027228236%3A3411579282";
				//Biến client_id chưa biết post ok
				//$param .="&client_id=1411026354642%3A1758331995";

				return send_request($url_request,$str_cookie,true,$param);
			}
		}

		return false;

	}

}

if(!function_exists('facebook_photo')){

	function facebook_photo($str_cookie,$image_url,$index=0){

		if(!empty($str_cookie) && !empty($image_url) && @file_exists($image_url)){

			$arr_image_name=explode('/',$image_url);
			$image_name=$arr_image_name[count($arr_image_name) - 1];
			$arr_image_mime=getimagesize($image_url);
			if(isset($arr_image_mime['mime']))
				$image_mime=$arr_image_mime['mime'];

			$arr_cookie=arr_facebook_cookie($str_cookie);
			$fb_dtsg=facebook_dtsg("https://www.facebook.com",$str_cookie);

			if($arr_cookie !== false && $fb_dtsg !== false){

				$url_request="https://upload.facebook.com/ajax/composerx/attachment/media/saveunpublished";
				$url_request.="?__a=1";
				$url_request.="&__user=".$arr_cookie['c_user'];  // khong can
				$url_request.="&fb_dtsg=".$fb_dtsg;

				$param="";
				$boundary="-----------------------------31373859930269";
				$new_line="\r\n";

				$param.=$boundary.$new_line;
				$param.="Content-Disposition: form-data; name='source'".$new_line.$new_line;
				$param.="8".$new_line;

				$param.=$boundary.$new_line;
				$param.="Content-Disposition: form-data; name='profile_id'".$new_line.$new_line;
				$param.=$arr_cookie['c_user'].$new_line;

				$param.=$boundary.$new_line;
				$param.="Content-Disposition: form-data; name='".$index."'; filename='".$image_name."'".$new_line;
				$param.="Content-Type: ".$image_mime.$new_line.$new_line;
				$param.=file_get_contents($image_url).$new_line;

				$param.=$boundary.$new_line;
				$param.="Content-Disposition: form-data; name='upload_id'".$new_line.$new_line;
				$param.=(1024 + $index).$new_line;

				$param.=$boundary."--";

				$header_type=array("Content-Type: multipart/form-data; boundary=".substr($boundary,2));
				$result_temp=send_request($url_request,$str_cookie,NULL,$param,$header_type);
				$result_temp=stripslashes($result_temp);

				if(strpos($result_temp,"name=\"composer_unpublished_photo") !== false){

					$composer_unpublished_photo=substr($result_temp,strpos($result_temp,"name=\"composer_unpublished_photo"));
					$composer_unpublished_photo=substr($composer_unpublished_photo,strpos($composer_unpublished_photo,"value=") + 7);
					$composer_unpublished_photo=substr($composer_unpublished_photo,0,strpos($composer_unpublished_photo,"\""));

					return $composer_unpublished_photo;
				}
			}
		}

		return false;

	}

}

if(!function_exists('facebook_photo_post')){

	function facebook_photo_post($str_cookie,$composer_unpublished_photo,$xhpc_message=''){

		if(!empty($str_cookie)){

			$arr_cookie=arr_facebook_cookie($str_cookie);
			$arr_privacyx=facebook_privacyx("https://www.facebook.com",$str_cookie);

			if($arr_cookie !== false && $arr_privacyx !== false){

				$url_request="https://upload.facebook.com/media/upload/photos/composer";
				$url_request.="?__user=".$arr_cookie['c_user'];  // khong can
				$url_request.="&fb_dtsg=".$arr_privacyx['fb_dtsg'];

				$param="";
				$boundary="-----------------------------31373859930269";
				$new_line="\r\n";

				$param.=$boundary.$new_line;
				$param.="Content-Disposition: form-data; name='xhpc_message'".$new_line.$new_line;
				$param.=$xhpc_message.$new_line;

				if(is_array($composer_unpublished_photo) && !empty($composer_unpublished_photo)){

					$index=0;
					foreach($composer_unpublished_photo as $key=> $value){

						$param.=$boundary.$new_line;
						$param.="Content-Disposition: form-data; name='composer_unpublished_photo[".$index."]'".$new_line.$new_line;
						$param.=$value.$new_line;

						$index++;
					}
				}
				else{

					$param.=$boundary.$new_line;
					$param.="Content-Disposition: form-data; name='composer_unpublished_photo[]'".$new_line.$new_line;
					$param.=$composer_unpublished_photo.$new_line;
				}

				$param.=$boundary.$new_line;
				$param.="Content-Disposition: form-data; name='privacyx'".$new_line.$new_line;
				$param.=$arr_privacyx['privacyx'].$new_line;

				$param.=$boundary."--";

				$header_type=array(
					"Content-Type: multipart/form-data; boundary=".substr($boundary,2)
				);

				$result_temp=send_request($url_request,$str_cookie,true,$param,$header_type);
				if(strpos($result_temp,"https://upload.facebook.com") !== false)
					return true;
			}
		}

		return false;

	}

}

if(!function_exists('facebook_like')){

	function facebook_like($str_cookie,$ft_ent_identifier){

		if(!empty($str_cookie) && !empty($ft_ent_identifier)){

			$arr_cookie=arr_facebook_cookie($str_cookie);
			$fb_dtsg=facebook_dtsg("https://www.facebook.com",$str_cookie);

			if($arr_cookie !== false && $fb_dtsg !== false){

				$url_request="https://www.facebook.com/ajax/ufi/like.php";

				$param="like_action=true";
				$param .="&fb_dtsg=".$fb_dtsg;
				$param .="&__user=".$arr_cookie['c_user'];
				$param .="&ft_ent_identifier=".$ft_ent_identifier;

				return send_request($url_request,$str_cookie,true,$param);
			}
		}

		return false;

	}

}

if(!function_exists('facebook_unlike')){

	function facebook_unlike($str_cookie,$ft_ent_identifier){

		if(!empty($str_cookie) && !empty($ft_ent_identifier)){

			$arr_cookie=arr_facebook_cookie($str_cookie);
			$fb_dtsg=facebook_dtsg("https://www.facebook.com",$str_cookie);

			if($arr_cookie !== false && $fb_dtsg !== false){

				$url_request="https://www.facebook.com/ajax/ufi/like.php";

				$param="like_action=false";
				$param .="&fb_dtsg=".$fb_dtsg;
				$param .="&__user=".$arr_cookie['c_user'];
				$param .="&ft_ent_identifier=".$ft_ent_identifier;

				return send_request($url_request,$str_cookie,true,$param);
			}
		}

		return false;

	}

}

if(!function_exists('facebook_like_fanface')){

	function facebook_like_fanface($str_cookie,$fbpage_id){

		if(!empty($str_cookie) && !empty($fbpage_id)){

			$arr_cookie=arr_facebook_cookie($str_cookie);
			$fb_dtsg=facebook_dtsg("https://www.facebook.com",$str_cookie);

			if($arr_cookie !== false && $fb_dtsg !== false){

				$url_request="https://www.facebook.com/ajax/pages/fan_status.php";

				$param="add=true";
				$param .="&fb_dtsg=".$fb_dtsg;
				$param .="&__user=".$arr_cookie['c_user'];
				$param .="&fbpage_id=".$fbpage_id;

				return send_request($url_request,$str_cookie,true,$param);
			}
		}

		return false;

	}

}

if(!function_exists('facebook_unlike_fanface')){

	function facebook_unlike_fanface($str_cookie,$fbpage_id){

		if(!empty($str_cookie) && !empty($fbpage_id)){

			$arr_cookie=arr_facebook_cookie($str_cookie);
			$fb_dtsg=facebook_dtsg("https://www.facebook.com",$str_cookie);

			if($arr_cookie !== false && $fb_dtsg !== false){

				$url_request="https://www.facebook.com/ajax/pages/fan_status.php";

				$param="add=false";
				$param .="&fb_dtsg=".$fb_dtsg;
				$param .="&__user=".$arr_cookie['c_user'];
				$param .="&fbpage_id=".$fbpage_id;

				return send_request($url_request,$str_cookie,true,$param);
			}
		}

		return false;

	}

}

?>