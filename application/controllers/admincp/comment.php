<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Comment extends CI_Controller{

	public $_arr_template_admin=array();

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url','form','array'));
		$this->load->library(array(ADMIN_DIR_ROOT.'/my_layout','form_validation','pagination'));
		$this->load->Model(array('m_comment'));

		$this->form_validation->set_error_delimiters('','');

		if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			$this->_arr_template_admin=$this->my_layout->set_layout();

	}

	public function control(){

		if(isset($_POST['checkbox']) && $this->m_authorization_group->check_authorization_one_menu('comment','delete'))
			$message_session_flash=$this->delete_all($this->input->post('checkbox',true));

		if($this->m_authorization_group->check_authorization_one_menu('comment','control')){

			$arr_auhorization=array('delete','update','control');
			foreach($arr_auhorization as $key=> $value){

				$this->_arr_template_admin['data_content']['authorization'][$value]=$this->m_authorization_group->check_authorization_one_menu('comment',$value);
				$this->_arr_template_admin['data_content']['sub_menu'][$value]=$this->m_sub_menu_admin->get_sub_menu('comment',$value,$this->my_layout->sess_lang_admin);
			}

			$get_select_filter=$this->uri->segment(4,'all_no_surf');
			switch($get_select_filter){

				case 'all':
					$this->_arr_template_admin['data_content']['comment']=$this->m_comment->list_comment();
					break;

				case 'all_no_surf':
					$this->_arr_template_admin['data_content']['comment']=$this->m_comment->list_comment_no_surf();
					break;

				case 'all_surf':
					$this->_arr_template_admin['data_content']['comment']=$this->m_comment->list_comment_surf();
					break;


				case 'product':
					$this->_arr_template_admin['data_content']['comment']=$this->m_comment->list_comment_product();
					break;

				case 'product_no_surf':
					$this->_arr_template_admin['data_content']['comment']=$this->m_comment->list_comment_product_no_surf();
					break;

				case 'product_surf':
					$this->_arr_template_admin['data_content']['comment']=$this->m_comment->list_comment_product_surf();
					break;


				case 'news':
					$this->_arr_template_admin['data_content']['comment']=$this->m_comment->list_comment_news();
					break;

				case 'news_no_surf':
					$this->_arr_template_admin['data_content']['comment']=$this->m_comment->list_comment_news_no_surf();
					break;

				case 'news_surf':
					$this->_arr_template_admin['data_content']['comment']=$this->m_comment->list_comment_news_surf();
					break;

				default:
					$this->_arr_template_admin['data_content']['comment']=$this->m_comment->list_comment_no_surf();
			}

			if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_comment_control(true);
				$this->load->view(ADMIN_DIR_ROOT."/view_comment_manager",$this->_arr_template_admin['data_content']);
			}
			else{

				if($this->my_layout->sess_lang_admin == 'vi'){

					$this->_arr_template_admin['data_content']['category_comment']=array(
						array(
							'cate_id'=>'all',
							'cate_name'=>'Tất cả'
						),
						array(
							'cate_id'=>'all_no_surf',
							'cate_name'=>'Ý kiến chưa duyệt'
						),
						array(
							'cate_id'=>'all_surf',
							'cate_name'=>'Ý kiến đã duyệt'
						),
						array(
							'cate_id'=>'product',
							'cate_name'=>'Ý kiến Sản Phẩm'
						),
						array(
							'cate_id'=>'product_no_surf',
							'cate_name'=>'Ý kiến Sản Phẩm chưa duyệt'
						),
						array(
							'cate_id'=>'product_surf',
							'cate_name'=>'Ý kiến Sản Phẩm đã duyệt'
						),
						array(
							'cate_id'=>'news',
							'cate_name'=>'Ý kiến Tin Tức'
						),
						array(
							'cate_id'=>'news_no_surf',
							'cate_name'=>'Ý kiến Tin Tức chưa duyệt'
						),
						array(
							'cate_id'=>'news_surf',
							'cate_name'=>'Ý kiến Tin Tức đã duyệt'
						)
					);
				}
				else{

					$this->_arr_template_admin['data_content']['category_comment']=array(
						array(
							'cate_id'=>'all',
							'cate_name'=>'All'
						),
						array(
							'cate_id'=>'all_no_surf',
							'cate_name'=>'Comments were not approved'
						),
						array(
							'cate_id'=>'all_surf',
							'cate_name'=>'Comments were approved'
						),
						array(
							'cate_id'=>'product',
							'cate_name'=>'Product Comments'
						),
						array(
							'cate_id'=>'product_no_surf',
							'cate_name'=>'Product Comments were not approved'
						),
						array(
							'cate_id'=>'product_surf',
							'cate_name'=>'Product Comments were approved'
						),
						array(
							'cate_id'=>'news',
							'cate_name'=>'News Comments'
						),
						array(
							'cate_id'=>'news_no_surf',
							'cate_name'=>'News Comments were not approved'
						),
						array(
							'cate_id'=>'news_surf',
							'cate_name'=>'News Comments were approved'
						)
					);
				}

				$this->_arr_template_admin['data_content']['info_content']=$this->language->get_data_comment_control(false);
				$this->_arr_template_admin['data_content']['info_content']['message_session_flash']=(isset($message_session_flash)) ? $message_session_flash : '';
				$this->_arr_template_admin['template_view_content']=ADMIN_DIR_ROOT."/view_comment_manager";

				$this->_arr_template_admin['data_content']['title_function']=$this->exsec_string->str_ucwords(element('sub_menu_name',$this->_arr_template_admin['data_content']['sub_menu']['control'],false));
				$this->_arr_template_admin['info_home']['home_title']=".:: ".element('sub_menu_name',$this->_arr_template_admin['data_content']['sub_menu']['control'],false)." ::.";
				$this->load->view(ADMIN_DIR_ROOT.'/home',$this->_arr_template_admin);
			}
		}
		else if(!(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')))
			show_404('page');

	}

	public function update_public(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$comment=$this->m_comment->get_comment($this->uri->segment(4,true));
			if($this->m_authorization_group->check_authorization_one_menu('comment','update') && is_array($comment)){

				if(element('comment_public',$comment,'') == 1)
					$arr_data['comment_public']=0;
				else
					$arr_data['comment_public']=1;

				$arr_where['comment_id']=$this->uri->segment(4,true);
				if(!$this->m_comment->update_comment($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['comment_public'];
			}
		}
		else
			show_404('page');

	}

	public function update_surf(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			$comment=$this->m_comment->get_comment($this->uri->segment(4,true));
			if($this->m_authorization_group->check_authorization_one_menu('comment','update') && is_array($comment)){

				if(element('comment_surf',$comment,'') == 0)
					$arr_data['comment_surf']=1;
				else
					$arr_data['comment_surf']=1;

				$arr_where['comment_id']=$this->uri->segment(4,true);
				if(!$this->m_comment->update_comment($arr_data,$arr_where))
					echo "update_faild";
				else
					echo $arr_data['comment_surf'];
			}
		}
		else
			show_404('page');

	}

	public function delete(){

		if(isset($_POST[md5('hominhtri')]) && ($_POST[md5('hominhtri')] == 'false')){

			if($this->m_authorization_group->check_authorization_one_menu('comment','delete')){

				$arr_where_delete['comment_id']=$this->uri->segment(5,true);
				if(!$this->m_comment->delete_comment($arr_where_delete))
					echo "delete_faild";
				else
					$this->control();
			}
		}
		else
			show_404('page');

	}

	public function delete_all($arr_where){

		if(!(($this->uri->segment(2) == 'comment') && ($this->uri->segment(3) == 'delete_all'))){

			if($this->m_authorization_group->check_authorization_one_menu('comment','delete') && is_array($arr_where)){

				foreach($arr_where as $key=> $value){

					$arr_where_delete['comment_id']=$key;
					if(!$this->m_comment->delete_comment($arr_where_delete))
						$message_session_flash=alert(lang('message_delete_all_faild'));
				}

				if(!isset($message_session_flash))
					$message_session_flash=alert(lang('message_delete_all_success'));
			}
		}
		else
			show_404('page');

		return $message_session_flash;

	}

}

?>