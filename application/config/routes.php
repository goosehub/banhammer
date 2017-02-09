<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main/landing';
$route['about'] = 'main/about';
$route['site/(:any)'] = 'main/homepage/$1';
$route['site/(:any)/queue'] = 'main/queue/$1';
$route['site/(:any)/(:num)'] = 'main/homepage/$1/$2';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;