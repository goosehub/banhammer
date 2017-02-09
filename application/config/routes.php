<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main/landing';

$route['about'] = 'main/about';

$route['site/(:any)'] = 'main/homepage/$1';
$route['site/(:any)/queue'] = 'main/queue/$1';
$route['site/(:any)/post'] = 'main/post/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;