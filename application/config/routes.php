<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main/landing';
$route['about'] = 'main/page/about';
$route['site/(:any)'] = 'main/homepage/$1';
$route['site/(:any)/leaderboard'] = 'main/leaderboard/$1';
$route['site/(:any)/queue'] = 'main/queue/$1';
$route['site/(:any)/new_review']['post'] = 'main/new_review/$1';
$route['site/(:any)/(:num)'] = 'main/homepage/$1/$2';
$route['site/(:any)/(:num)/(:num)'] = 'main/homepage/$1/$2/$3';
$route['site/(:any)/new_post']['post'] = 'main/new_post/$1';
$route['site/(:any)/real_report']['post'] = 'main/real_report/$1';
$route['import'] = 'import';
$route['login']['post'] = 'user/login';
$route['new_user']['post'] = 'user/register';
$route['logout'] = 'user/logout';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;