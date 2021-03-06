<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// CodeIgniter Features
$autoload['packages'] = array();
$autoload['libraries'] = array('session', 'form_validation');
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'form');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array();

// Set timezone
date_default_timezone_set('America/New_York');

// 
// General Purpose Functions
// 

// Return if this is dev
function site_name() {
    return 'Ban Hammer';
}

// Return if this is dev
function is_dev() {
    if (isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === 'dev.foobar.com')) {
        return true;
    }
    return false;
}

// Auth Token
function auth() {
    $auth = json_decode(file_get_contents('auth.php'));
    return $auth;
}

function force_ssl() {
    return false;
    if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
        $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        redirect($url);
        exit;
    }
}

function deslug($string) {
    return ucwords(str_replace('_', ' ', $string));
}

function html_clean($string)
{
    $string = htmlspecialchars($string, ENT_QUOTES, config_item('charset'), TRUE);
    $string = nl2br($string);
    return $string;
}

function accuracy_calculator($pass, $fail) {
    if (!is_whole_int($pass) || !is_whole_int($fail)) {
        $result = 0;
    }
    else if ($pass == 0) {
        $result = 0;
    }
    else if ($fail == 0) {
        $result = 100;
    }
    else {
        $result = 100 - (100 / ( ($pass + $fail) / $fail) );
    }
    return sprintf('%0.2f', $result);
}

function array_orderby()
{
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}

function report_bugs_string() {
    return '<p>Please report bugs to goosepostbox@gmail.com</p>';
}

function is_whole_int($val) {
    $val = strval($val);
    $val = str_replace('-', '', $val);
    if (ctype_digit($val)) {
        if ($val === (string)0) {
            return true;
        }
        else if (ltrim($val, '0') === $val) {
            return true;
        }
    }
    return false;
}

// For human readable spans of time
// http://stackoverflow.com/questions/2915864/php-how-to-find-the-time-elapsed-since-a-date-time
function get_time_ago($time_stamp) {
    $time_difference = strtotime('now') - $time_stamp;
    if ($time_difference >= 60 * 60 * 24 * 365.242199) {
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 365.242199, 'year');
    }
    else if ($time_difference >= 60 * 60 * 24 * 30.4368499) {
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 30.4368499, 'month');
    }
    else if ($time_difference >= 60 * 60 * 24 * 7) {
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 7, 'week');
    }
    else if ($time_difference >= 60 * 60 * 24) {
        return get_time_ago_string($time_stamp, 60 * 60 * 24, 'day');
    }
    else if ($time_difference >= 60 * 60) {
        return get_time_ago_string($time_stamp, 60 * 60, 'hour');
    }
    else {
        return get_time_ago_string($time_stamp, 60, 'minute');
    }
}
function get_time_ago_string($time_stamp, $divisor, $time_unit) {
    $time_difference = strtotime("now") - $time_stamp;
    $time_units      = floor($time_difference / $divisor);
    settype($time_units, 'string');
    if ($time_units === '0') {
        return 'less than 1 ' . $time_unit . ' ago';
    }
    else if ($time_units === '1') {
        return '1 ' . $time_unit . ' ago';
    }
    else {
        return $time_units . ' ' . $time_unit . 's ago';
    }
}

// Flash Message
// http://www.phpdevtips.com/2013/05/simple-session-based-flash-messages/
function flash( $name = '', $message = '', $class = 'success' ) {
    // We can only do something if the name isn't empty
    if ( !empty( $name ) ) {
        // No message, create it
        if ( !empty( $message ) && empty( $_SESSION[$name] ) ) {
            if ( !empty( $_SESSION[$name] ) ) {
                unset( $_SESSION[$name] );
            }
            if ( !empty( $_SESSION[$name.'_class'] ) ) {
                unset( $_SESSION[$name.'_class'] );
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        }
        // Message exists, display it
        else if ( !empty( $_SESSION[$name] ) && empty( $message ) ) {
            $class = !empty( $_SESSION[$name.'_class'] ) ? $_SESSION[$name.'_class'] : 'success';
            echo '<div class="alert alert-' . $class . '" role="alert">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}