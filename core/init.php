<?php
function callHook() {

    $url = REQUEST_URI;

    // strip out our query string
    $url = preg_replace('/\?.+$/i', '', $url);
    //explode() the string into an array of parameters
    $urlArray = array();
    if ( $url != ""){
        $urlArray = explode("/", $url);
    }
    // for an empty string we assume the user wants to access index/index
    if (!count($urlArray)) {
        $urlArray[0] = "index";
        $urlArray[1] = "index";
    } else if (count($urlArray) < 2) {
        $urlArray[1] = "index";
    }

    $controller = $urlArray[0];
    array_shift($urlArray);
    $action = $urlArray[0];
    array_shift($urlArray);
    $params = array_map('urldecode', $urlArray);

    $controllerName = $controller;
    $controller = ucwords($controller);
    $controller .= 'Controller';

    //we instantiate and call the controller methods
    try {

        if (class_exists($controller)) {
            $dispatch = new $controller;
        } else {
            throw new Exception("Invalid call to non-existent class {$controller}.");

        }

        if (method_exists($dispatch, $action)) {

            call_user_func_array(array($dispatch, $action), $params);
        } else {

            throw new Exception("Invalid call to non-existent {$controller}::{$action}.");

        }
    } catch (Exception $e) {

        echo "<pre>" . $e->getMessage() . "</pre>";

    }

}

/** Autoload any classes that are required **/

function __autoload($className) {

    if (file_exists(ROOT . '/db/' . strtolower($className) . '.php')) {
        require_once(ROOT . '/db/' . strtolower($className) . '.php');
    }

    if (file_exists(ROOT . '/core/' . strtolower($className) . '.php')) {
        require_once(ROOT . '/core/' . strtolower($className) . '.php');
    }

    if (file_exists(ROOT . '/lib/' . strtolower($className) . '.php')) {
        require_once(ROOT . '/lib/' . strtolower($className) . '.php');
    }

    if (file_exists(ROOT . '/application/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . '.php')) {
        require_once(ROOT . '/application/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . '.php');
    }

    if (file_exists(ROOT . '/application/models/' . strtolower($className) . '.php')) {
        require_once(ROOT . '/application/models/' . strtolower($className) . '.php');

    }

}

try {
    callHook();

} catch (Exception $e) {

    echo $e->getMessage();
}