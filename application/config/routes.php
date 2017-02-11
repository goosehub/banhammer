<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main/landing';
$route['about'] = 'main/page/about';
$route['site/(:any)'] = 'main/homepage/$1';
$route['site/(:any)/queue'] = 'main/queue/$1';
$route['site/(:any)/(:num)'] = 'main/homepage/$1/$2';
$route['site/(:any)/new_post'] = 'main/new_post/$1';
$route['login'] = 'main/login';
$route['new_user'] = 'main/new_user';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;