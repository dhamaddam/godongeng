<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = "category";
$route['404_override'] = 'Error_404';

$route['home/(:any)'] = "homepage/index/$1";
$route['auth_oa2/session/google'] = "auth_oa2/session/google";
$route['art/(:any)'] = "article/show/$1";
$route['login/(:any)'] = "login/index/$1";

$route['kumpulan/(:any)'] = "category/show/$1";
$route['thread/(:any)'] = "category/show/$1";
$route['thread'] = "category/index/$1";
$route['blog/(:any)'] = "category/show/$1";
$route['page/(:any)/(:any)/(:any)'] = "page/index/$1";
$route['p/(:any)/(:any)'] = "page/index/$1";
$route['page/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = "page/index/$1";

// $route['home/(:any)'] = "homepage/index/$1";
// $route['brand/(:any)'] = "brand/show/$1";
// $route['brands/(:any)'] = "brands/show/$1";
// $route['shop/(:any)'] = "category/show/$1";
// $route['admin'] = "admin/login";
// $route['admin/(:any)'] = "admin/$1";
// $route['fp/(:any)'] = "fp/$1";
// $route['(:any)'] = "item/show/$1";

$route['translate_uri_dashes'] = FALSE;
