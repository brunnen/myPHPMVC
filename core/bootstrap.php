<?php

$conf = parse_ini_file('./config/application.ini', TRUE);

//[db]
define('DB_HOST', $conf['db']['host']);
define('DB_USERNAME', $conf['db']['username']);
define('DB_PASSWORD', $conf['db']['password']);
define('DB_NAME', $conf['db']['name']);

//[site]
define('BASE_DIR', $conf['site']['BASE_DIR']);

//date.timezone setting
date_default_timezone_set($conf['time']['default_timezone']);

//path info
define ('HTTP_PATH', 'http://' . $_SERVER['SERVER_NAME'] . '/' . BASE_DIR);
define ('FS_PATH', $_SERVER['DOCUMENT_ROOT'] . '/' . BASE_DIR);

$prefix = BASE_DIR;
$myURI = substr($_SERVER['REQUEST_URI'], 1, strlen($_SERVER['REQUEST_URI']));
if (substr($myURI, 0, strlen($prefix) ) == $prefix) {
    $myURI = substr($myURI, strlen($prefix), strlen($myURI) );
} 

define ('REQUEST_URI', preg_replace('/\?' . $_SERVER['QUERY_STRING'] . '/i', '', $myURI));

require_once (ROOT . '/core/init.php');