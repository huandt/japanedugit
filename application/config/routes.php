<?php  if ( ! defined('IN_CDT')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
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
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';
$route['admin/([a-zA-Z0-9-_/]+)'] = "backend/$1";
$route['admin'] = "backend/home/index";
$route['tin-tuc/([a-zA-Z0-9/]+)/([a-zA-Z0-9-]+).html']  = 'detail_new/index/$1/$2';
$route['(gioi-thieu).html']    = 'about/index';
$route['(lien-he).html']   = 'about/contact';
$route['tin-tuc']   = 'news/index';
$route['(khoa-hoc).html']   = 'browse/index';
$route['kh/([a-zA-Z0-9/]+)/([a-zA-Z0-9-]+)']  = 'browse/course_detail/$1/$2';
$route['hinh-anh-hoat-dong']   = 'gallery/index';
$route['tai-lieu']   = 'ebook/index';
$route['(hop-tac).html']   = 'about/collaborate';
/* End of file routes.php */
/* Location: ./application/config/routes.php */