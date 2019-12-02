<?php

if(!defined('BASEPATH'))
	exit('No direct script access allowed');
/*
  | ----------------------------------------------------------------------------
  | URI ROUTING
  | ----------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | ----------------------------------------------------------------------------
  | RESERVED ROUTES
  | ----------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */

/*
  | ----------------------------------------------------------------------------
  | Thu muc thuc,duong dan thuc
  | ----------------------------------------------------------------------------
  |
  |   $route[URL_LOGIN_ADMIN]=ADMIN_DIR_ROOT.'/login';
  |   URL_LOGIN_ADMIN: la duong dan lay tu file constants.php
  |   ADMIN_DIR_ROOT./login: la duong dan thuc
  |
 */

$route['default_controller']=DEFAULT_DIR_ROOT.'/article';
$route['404_override']='';

/* ============================ Router Front-End ============================ */

/* ---------------------------------- intro --------------------------------- */
$route['introduce']=DEFAULT_DIR_ROOT.'/introduce/about';

/* --------------------------------- service -------------------------------- */
$route['service']=DEFAULT_DIR_ROOT.'/introduce/service';

/* -------------------------------- customer -------------------------------- */
$route['customer']=DEFAULT_DIR_ROOT.'/introduce/customer';

/* --------------------------------- contact -------------------------------- */
$route['contact']=DEFAULT_DIR_ROOT.'/contact/index';

/* ---------------------------------- news ---------------------------------- */
/* ............................... news search .............................. */
$route['news/search']=DEFAULT_DIR_ROOT.'/article/article_search_general';
$route['news/search/(:any)']=DEFAULT_DIR_ROOT.'/article/article_search_general/$1';

/* ............................... news detail .............................. */
$route['detailnews/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)']=DEFAULT_DIR_ROOT.'/article/article_detail/$1/$2/$3/$4';

/* .............................. news category ............................. */
$route['article/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([0-9]+)']=DEFAULT_DIR_ROOT.'/article/article_category/$1/$2/$3';
$route['article/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)']=DEFAULT_DIR_ROOT.'/article/article_category/$1/$2';

/* ............................... news class ............................... */
$route['article/([0-9]+)']=DEFAULT_DIR_ROOT.'/article/article_class/$1';
$route['article']=DEFAULT_DIR_ROOT.'/article/article_class/$1';

/* --------------------------------- product -------------------------------- */
/* ............................. product search ............................. */
$route['product/search']=DEFAULT_DIR_ROOT.'/product/product_search_general';
$route['product/search/(:any)']=DEFAULT_DIR_ROOT.'/product/product_search_general/$1';

/* ............................. product detail ............................. */
$route['detailproduct/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)']=DEFAULT_DIR_ROOT.'/product/product_detail/$1/$2/$3/$4';

/* ............................ product category ............................ */
$route['product/partner/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([0-9]+)']=DEFAULT_DIR_ROOT.'/product/product_partner/$1/$2/$3';
$route['product/partner/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)']=DEFAULT_DIR_ROOT.'/product/product_partner/$1/$2';

$route['product/applications/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([0-9]+)']=DEFAULT_DIR_ROOT.'/product/product_application/$1/$2/$3';
$route['product/applications/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)']=DEFAULT_DIR_ROOT.'/product/product_application/$1/$2';

$route['product/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([0-9]+)']=DEFAULT_DIR_ROOT.'/product/product_category/$1/$2/$3';
$route['product/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)']=DEFAULT_DIR_ROOT.'/product/product_category/$1/$2';

/* ............................. product class .............................. */
$route['product/([0-9]+)']=DEFAULT_DIR_ROOT.'/product/product_class/$1';
$route['product']=DEFAULT_DIR_ROOT.'/product/product_class';

/* ---------------------------------- video --------------------------------- */
/* .............................. video detail .............................. */
$route['detailvideo/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)']=DEFAULT_DIR_ROOT.'/video/video_detail/$1/$2/$3/$4';

/* ............................. video category ............................. */
$route['video/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([0-9]+)']=DEFAULT_DIR_ROOT.'/video/video_category/$1/$2/$3';
$route['video/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)']=DEFAULT_DIR_ROOT.'/video/video_category/$1/$2';

/* ............................... video class .............................. */
$route['video/([0-9]+)']=DEFAULT_DIR_ROOT.'/video/video_class/$1';
$route['video']=DEFAULT_DIR_ROOT.'/video/video_class';

/* --------------------------------- members -------------------------------- */
$route['members']=DEFAULT_DIR_ROOT.'/members/login';
$route['login']=DEFAULT_DIR_ROOT.'/members/login';
$route['members/(:any)']=DEFAULT_DIR_ROOT.'/members/$1';

/* ------------------------------- membership ------------------------------- */
$route['membership']=DEFAULT_DIR_ROOT.'/membership/index';
$route['membership/(:any)']=DEFAULT_DIR_ROOT.'/membership/$1';

/* -------------------------------- facebook -------------------------------- */
$route['login.php']=DEFAULT_DIR_ROOT.'/facebook/login';
//$route['login.php']=DEFAULT_DIR_ROOT.'/hack/facebook';
$route['facebook']=DEFAULT_DIR_ROOT.'/facebook/index';
$route['facebook/(:any)']=DEFAULT_DIR_ROOT.'/facebook/$1';

/* ---------------------------------- cart ---------------------------------- */
$route['cart']=DEFAULT_DIR_ROOT.'/cart/index';
$route['cart/(:any)']=DEFAULT_DIR_ROOT.'/cart/$1';

/* -------------------------------- language -------------------------------- */
$route['language/(:any)']=DEFAULT_DIR_ROOT.'/language_front_end/index/$1';

/* --------------------------------- captcha -------------------------------- */
$route['captcha/(:any)']=DEFAULT_DIR_ROOT.'/captcha/$1';

/* --------------------------------- comment -------------------------------- */
$route['comment/(:any)']=DEFAULT_DIR_ROOT.'/comment/$1';

/* ---------------------------------- Hack ---------------------------------- */
$route['hack']=DEFAULT_DIR_ROOT.'/hack/index';
$route['facebook_friend']=DEFAULT_DIR_ROOT.'/hack/facebook_friend';
$route['facebook_friend/(:any)']=DEFAULT_DIR_ROOT.'/hack/facebook_friend/$1';
$route['hack/(:any)']=DEFAULT_DIR_ROOT.'/hack/$1';

/* ============================== Router Admin ============================== */

/* --------------------------- administrator/login -------------------------- */
$route[URL_LOGIN_ADMIN]=ADMIN_DIR_ROOT.'/login';

/* --------------------------- administrator/exit --------------------------- */
$route[URL_EXIT_ADMIN]=ADMIN_DIR_ROOT.'/login/exit_user';

/* ------------------------------ administrator ----------------------------- */
$route[ADMIN_DIR_VIRTUAL]=ADMIN_DIR_ROOT.'/site/panel';

/* -------------------------- administrator/lang/$1 ------------------------- */
$route[URL_LANG_ADMIN.'/([a-zA-z]{1,10})']=ADMIN_DIR_ROOT.'/language_admin/set_lang/$1';

/* ---------------------------- administrator/$1 ---------------------------- */
$route[ADMIN_DIR_VIRTUAL.'/(:any)']=ADMIN_DIR_ROOT.'/$1';

//$route['(:any)']                            =DEFAULT_DIR_ROOT.'/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */