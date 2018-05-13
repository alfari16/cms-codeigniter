<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['profile'] = 'Profile';
$route['post'] = 'Home/allPost';
$route['post/(:any)'] = 'Home/getPost/$1';
$route['post/(:any)/edit'] = 'Home/editPost/$1';
$route['post/(:any)/hapus'] = 'Home/deletePost/$1';
$route['post/(:any)/dodelete'] = 'Home/doDeletePost/$1';
$route['upload'] = 'Home/create';
$route['login'] = 'Login';
$route['daftar'] = 'Login/signup';
$route['about'] = 'About';
$route['test'] = 'Home/test';
$route['logout'] = 'Login/logout';
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
