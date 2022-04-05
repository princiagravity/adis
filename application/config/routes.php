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
$route['404_override']                      = 'My404';
$route['translate_uri_dashes']              = FALSE;
$route['default_controller']                = 'CustomerController';

$route['user-registration']                 = 'CustomerController/user_registration';
$route['user-type']                         = 'CustomerController/user_type_view';
$route['shop']                              = 'CustomerController/rolebased_details/shop';
$route['individual']                        = 'CustomerController/rolebased_details/individual';
$route['login']                             = 'CustomerController';
$route['forgot-password']                   = 'CustomerController/forgot_password_view';
$route['forgot-password-success']           = 'CustomerController/forgot_password_success';
$route['change-password']                   = 'CustomerController/change_password_view';
$route['home']                              = 'CustomerController/home';
$route['wallet']                            = 'CustomerController/wallet';
$route['My-Network']                        = 'CustomerController/get_my_network';
$route['My-Profile']                        = 'CustomerController/get_profile_details'; 
$route['My-Channel']                        = 'CustomerController/get_channel';
$route['Under-Construction']                = 'CustomerController/under_construction';
$route['coupon/(:any)']                     = 'CustomerController/get_coupon_details/$1';
$route['logout']                            = 'CustomerController/logout';




$route['admin']                               = 'AdminController/index';
$route['admin/product-add']                   = 'AdminController/get_page/product-add';
$route['admin/product-update/(:any)']         = 'AdminController/get_page/product-add/$1';
$route['admin/add-shop-category']             = 'AdminController/get_page/add-shop-category'; 
$route['admin/update-shop-category/(:any)']   = 'AdminController/get_page/add-shop-category/$1';
$route['admin/add-job-category']              = 'AdminController/get_page/add-job-category'; 
$route['admin/update-job-category/(:any)']    = 'AdminController/get_page/add-job-category/$1'; 
$route['admin/add-area']                      = 'AdminController/get_page/area-add';
$route['admin/update-area/(:any)']            = 'AdminController/get_page/area-add/$1';
$route['admin/add-district']                  = 'AdminController/get_page/district-add';
$route['admin/update-district/(:any)']        = 'AdminController/get_page/district-add/$1';
$route['admin/add-slider']                    = 'AdminController/get_page/add-slider';
$route['admin/update-slider/(:any)']          = 'AdminController/get_page/add-slider/$1';
$route['admin/add-advertisement']             = 'AdminController/get_page/add-advertisement';
$route['admin/update-advertisement/(:any)']   = 'AdminController/get_page/add-advertisement/$1';
$route['admin/add-channel-videos']            = 'AdminController/get_page/add-channel-videos';
$route['admin/update-channel-videos/(:any)']  = 'AdminController/get_page/add-channel-videos/$1';
$route['admin/customer-profile/(:any)']       = 'AdminController/get_page/customer-profile/$1';
$route['admin/dashboard']                     = 'AdminController/dashboard';
$route['admin/customer/(:any)/(:any)']        = 'AdminController/customer_profile/$1/$2';
$route['admin/shop-list']                     = 'AdminController/get_customers_list/shop';
$route['admin/individual-list']               = 'AdminController/get_customers_list/individual';
$route['admin/free-list']                     = 'AdminController/get_customers_list/free';
$route['admin/single-view/(:any)/(:any)']     = 'AdminController/single_view/$1/$2';





