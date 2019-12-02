<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

//Vi tri tham so cua trang can lay per_page
$config['uri_segment']=5;

//So link de hien thi,luu y:link mang tinh chat doi xung vi du la 1 thi se hien thi 3 trang
$config['num_links']=2;

//False:su dung link CI,True nguoc lai,link giong binh thuong
$config['page_query_string']=FALSE;

//Tag ben trai va ben phai cua entire 
$config['full_tag_open']="";
$config['full_tag_close']="";

//Ten link trang dau tien,va ten link trang cuoi
$config['first_link']="Đầu";
$config['last_link']="Cuối";

//The hmtl bao quanh link trang dau
$config['first_tag_open']="<div class='first_tag_page'>";
$config['first_tag_close']="</div>";

//The hmtl bao quanh link trang cuoi
$config['last_tag_open']="<div class='last_tag_page'>";
$config['last_tag_close']="</div>";

//Ten html cho link ke tiep
$config['next_link']="&nbsp;";
$config['next_tag_open']="<div class='next_tag_page'>";
$config['next_tag_close']="</div>";

//Ten html cho link sau
$config['prev_link']="&nbsp;";
$config['prev_tag_open']="<div class='prev_tag_page'>";
$config['prev_tag_close']="</div>";

//Trang hien tai
$config['cur_tag_open']="<div class='cur_tag_page'>";
$config['cur_tag_close']="</div>";

//Trang cua nhung so trang
$config['num_tag_open']="<div class='num_tag_page'>";
$config['num_tag_close']="</div>";
//Co hien thi phan trang khong
//$config['display_pages']=FALSE; 