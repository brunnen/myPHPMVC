<?php
session_start();


error_reporting(E_ALL ^ E_NOTICE);
define('ROOT', dirname(__FILE__));
require_once (ROOT . '/core/bootstrap.php');