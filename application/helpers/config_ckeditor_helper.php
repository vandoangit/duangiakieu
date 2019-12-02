<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

function config_ckeditor($file_name,$config_case,$width='870',$height='200'){

	include(DIR_PUBLIC.'ckeditor/ckeditor.php');
	include(DIR_PUBLIC.'ckfinder/ckfinder.php');

	$object_CI=& get_instance();
	$object_CI->load->library(array(ADMIN_DIR_ROOT.'/language'));
	$object_CI->load->helper('url');

	$CKEditor=new CKEditor();
	$CKEditor->basePath=rtrim(base_url(),'/').'/'.DIR_PUBLIC.'ckeditor/';
	//$CKEditor->config['toolbarStartupExpanded'] =false;
	$CKEditor->config['extraPlugins']="tableresize";
	$CKEditor->config['language']=$object_CI->session->userdata($object_CI->language->sess_lang);
	$CKEditor->config['width']=$width;
	$CKEditor->config['height']=$height;
	$CKEditor->config['resize_maxWidth']=$width;
	$CKEditor->config['resize_minWidth']=$width;
	$CKEditor->config['autoParagraph']=false;

	CKFinder::SetupCKEditor($CKEditor,'/'.DIR_PUBLIC.'ckfinder/');

	switch($config_case){

		case "custom_basic":
			$config['toolbar']=array(
				array('-','Source',
					'-','Undo','Redo',
					'-','Cut','Copy','Paste','PasteText','PasteFromWord',
					'-','Bold','Italic','Underline','Strike',
					'-','Subscript','Superscript',
					'-','NumberedList','BulletedList','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock',
					'-','Outdent','Indent',
					'-','BidiLtr','BidiRtl',
					'-','Blockquote',
					'-'
				),
				array('Link','Unlink','Anchor'),
				'/',
				array('Format','Font','FontSize','Styles'),
				array('TextColor','BGColor','Smiley','SpecialChar','Maximize'),
				array('CreateDiv','Table','HorizontalRule','RemoveFormat')
			);
			break;

		case "news_headline":
			$config['toolbar']=array(
				array('-','Source',
					'-','Undo','Redo',
					'-','Cut','Copy','Paste','PasteText','PasteFromWord',
					'-','Bold','Italic','Underline','Strike',
					'-','Subscript','Superscript',
					'-','NumberedList','BulletedList','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock',
					'-','Outdent','Indent',
					'-','BidiLtr','BidiRtl',
					'-','Blockquote',
					'-'
				),
				'/',
				array('Format','Font','FontSize','Styles'),
				array('Image','Link','Unlink','Anchor'),
				array('TextColor','BGColor','Smiley','SpecialChar','Maximize')
			);
			break;

		case "news_content":
			$config['toolbar']=array(
				array('-','Source',
					'-','Undo','Redo',
					'-','Save','Print','NewPage','DocProps','Preview',
					'-','Templates',
					'-','Cut','Copy','Paste','PasteText','PasteFromWord',
					'-','Bold','Italic','Underline','Strike',
					'-','Subscript','Superscript',
					'-','NumberedList','BulletedList','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock',
					'-'
				),
				'/',
				array('-','Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField',
					'-','CreateDiv','Table','Image','Flash','Iframe','HorizontalRule',
					'-','Link','Unlink','Anchor',
					'-'
				),
				array('-','SelectAll','SpellChecker','PageBreak',
					'-','Outdent','Indent',
					'-','BidiLtr','BidiRtl',
					'-','Blockquote',
					'-'
				),
				'/',
				array('-','Format','Font','FontSize','Styles',
					'-','TextColor','BGColor','Smiley','SpecialChar','RemoveFormat',
					'-','Find','Replace',
					'-','Maximize','ShowBlocks',
					'-'
				),
			);
			break;

		case "product_headline":
			$config['toolbar']=array(
				array('-','Source',
					'-','Undo','Redo',
					'-','Cut','Copy','Paste','PasteText','PasteFromWord',
					'-','Bold','Italic','Underline','Strike',
					'-','Subscript','Superscript',
					'-','NumberedList','BulletedList','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock',
					'-','Outdent','Indent',
					'-','BidiLtr','BidiRtl',
					'-','Blockquote',
					'-','Link','Unlink','Anchor',
					'-'
				),
				'/',
				array('Format','Font','FontSize','Styles'),
				array('CreateDiv','Table','Image','Flash','Iframe','HorizontalRule'),
				array('TextColor','BGColor','Smiley','SpecialChar','Maximize')
			);
			break;

		case "product_content":
			$config['toolbar']=array(
				array('-','Source',
					'-','Undo','Redo',
					'-','Save','Print','NewPage','DocProps','Preview',
					'-','Templates',
					'-','Cut','Copy','Paste','PasteText','PasteFromWord',
					'-','Bold','Italic','Underline','Strike',
					'-','Subscript','Superscript',
					'-','NumberedList','BulletedList','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock',
					'-','Outdent','Indent',
					'-','BidiLtr','BidiRtl',
					'-'
				),
				'/',
				array('-','Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField',
					'-','CreateDiv','Table','Image','Flash','Iframe','HorizontalRule',
					'-','Link','Unlink','Anchor',
					'-'
				),
				array('-','SelectAll','SpellChecker','PageBreak',
					'-','TextColor','BGColor','Smiley','SpecialChar','RemoveFormat',
					'-','Find','Replace',
					'-','Blockquote',
					'-'
				),
				'/',
				array('-','Format','Font','FontSize','Styles',
					'-','Maximize','ShowBlocks',
					'-'
				),
			);
			break;

		case "full_toolbar":
			$config['toolbar']=array(
				array('Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates'),//document
				array('Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo'),//clipboard
				array('Find','Replace','-','SelectAll','-','SpellChecker','Scayt'),//editing
				array('Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'),//forms
				array('Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat'),//basicstyles
				array('NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'),//paragraph
				array('Link','Unlink','Anchor'),//links
				array('Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'),//insert
				array('Styles','Format','Font','FontSize'),//styles
				array('TextColor','BGColor'),//colors
				array('Maximize','ShowBlocks','-','About'),//tools
			);
			break;
	}

	$config['skin']='office2003';

	$CKEditor->replace($file_name,$config);

}

?>