<?php

define('ENVIRONMENT', isset($_SERVER['APP_ENV']) ? $_SERVER['APP_ENV'] : 'development');

if (ENVIRONMENT === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

define('BASE_PATH', dirname(__FILE__));
define('PATH_ICON', '/favicon.ico');
define('APP_PATH', BASE_PATH . '/app/');
define('SYSTEM_PATH', BASE_PATH . '/system/');
define('MODULES_PATH', APP_PATH . 'modules/');
define('PUBLIC_PATH', BASE_PATH . '/public/');

require APP_PATH . 'config/config.php';      
require APP_PATH . 'routes/routerController.php';       
require APP_PATH . 'config/database.php';     
require APP_PATH . '../library/View.php';     

$router = new Router();
$router->dispatch();

