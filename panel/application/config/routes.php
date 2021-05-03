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
$route['default_controller'] = 'login';
$route['404_override'] = '';


$route["welcome"] = "welcome/index";
$route["welcome/(.*)"] = "welcome/$1";

$route["category"] = "category/index";
$route["category/(.*)"] = "category/$1";

$route["supplier"] = "supplier/index";
$route["supplier/(.*)"] = "supplier/$1";

$route["product"] = "product/index";
$route["product/(.*)"] = "product/$1";

$route["purchase"] = "purchase/index";
$route["purchase/(.*)"] = "purchase/$1";

$route["contact"] = "contact/index";
$route["contact/(.*)"] = "contact/$1";

$route["message"] = "message/index";
$route["message/(.*)"] = "message/$1";

$route["order"] = "order/index";
$route["order/(.*)"] = "order/$1";

$route["login"] = "login/index";
$route["login/(.*)"] = "login/$1";

$route["home"] = "home/index";
$route["home/(.*)"] = "home/$1";

$route["deneme"] = "deneme/index";
$route["deneme/(.*)"] = "deneme/$1";

$route["newscast"] = "newscast/index";
$route["newscast/(.*)"] = "newscast/$1";

$route["kategori"] = "kategori/index";
$route["kategori/(.*)"] = "kategori/$1";

$route["user"] = "user/index";
$route["user/(.*)"] = "user/$1";

$route["basket"] = "basket/index";
$route["basket/(.*)"] = "basket/$1";

$route["receivedorder"] = "receivedorder/index";
$route["receivedorder/(.*)"] = "receivedorder/$1";

$route["Test"] = "Test/index";
$route["Test/(.*)"] = "Test/$1";

$route["receivedorders"] = "receivedorders/index";
$route["receivedorders/(.*)"] = "receivedorders/$1";

$route["search"] = "search/index";
$route["search/(.*)"] = "search/$1";


$route["^(.*)"] = "index/$1";
