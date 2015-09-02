<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users";
$route['404_override'] = '';
// $route['/users/get_reviews_by_id/(:any)']='/users/get_reviews_by_id/$1';
$route['books/(:any)']= '/users/get_reviews_by_id/$1';
$route['users/delete/(:any)']='/users/delete/$1>';
$route['users/user_profile/(:any)']='/users/user_profile/$1';
// $route['users/books/(:any)']='users/books/$1';
// $route['/users/login']='/books';
//end of routes.php