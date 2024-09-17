<?php

// --------------------------------------------
// ProjectHub E-Commerce Application Entry Point
// --------------------------------------------
// This is the main entry point of the application. Every request that comes
// to the server passes through this file. Here, we initialize the core 
// system components, load essential configuration files, and route the 
// requests to the appropriate controller based on the requested URL.
// --------------------------------------------


// ---------------------------------------------------------
// Step 1: Set Environment and Configuration Settings
// ---------------------------------------------------------
// We start by defining the environment in which the application is running.
// This allows us to enable or disable certain features, such as error 
// reporting for development mode or optimizations for production.
//
// PHP has built-in constants such as 'E_ALL' to control which errors are 
// reported. In development mode, we want to see all errors and notices.
// In production, error display should be turned off to prevent leaking
// sensitive information to end-users.
//
define('ENVIRONMENT', isset($_SERVER['APP_ENV']) ? $_SERVER['APP_ENV'] : 'development');

if (ENVIRONMENT === 'development') {
    // In development, we want to see every error and notice for debugging purposes.
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    // In production, errors should not be shown directly to users.
    error_reporting(0);
    ini_set('display_errors', 0);
}

// ---------------------------------------------------------
// Step 2: Define Core Paths
// ---------------------------------------------------------
// We define some essential paths that are used throughout the application.
// These paths include the location of the application modules, system files,
// and public resources. This allows us to use relative paths dynamically
// without hardcoding them throughout the system.
//
define('BASE_PATH', dirname(__FILE__));
define('PATH_ICON', '/favicon.ico');
define('APP_PATH', BASE_PATH . '/app/');
define('SYSTEM_PATH', BASE_PATH . '/system/');
define('MODULES_PATH', APP_PATH . 'modules/');
define('PUBLIC_PATH', BASE_PATH . '/public/');

// ---------------------------------------------------------
// Step 3: Load Core System Files
// ---------------------------------------------------------
// The core of the application includes the framework that handles routing,
// request processing, and interaction with the database. This section loads
// essential system libraries and helpers that are used globally by the application.
//
// These files are the backbone of the HMVC architecture, providing utilities
// for routing, controllers, models, and views.
//
// require SYSTEM_PATH . 'core/Router.php';      // Router: Directs requests to the correct controller.
// require SYSTEM_PATH . 'core/Controller.php';  // Base controller: All application controllers inherit from this.
// require SYSTEM_PATH . 'core/Model.php';       // Base model: Interacts with the database, used by all models.

// ---------------------------------------------------------
// Step 4: Load Configuration Files
// ---------------------------------------------------------
// Configuration files contain important settings, such as database credentials,
// API keys, and routing rules. These settings allow the application to connect 
// to databases, define routes, and handle environment-specific configurations.
//
require APP_PATH . 'config/config.php';       // Load global configuration (e.g., timezone, locale)
require APP_PATH . 'routes/routerController.php';       // Load application routes for URL routing
require APP_PATH . 'config/database.php';     // Load database connection settings
require APP_PATH . '../helpers/View.php';     // Load functions helpers

// ---------------------------------------------------------
// Step 5: Initialize the Router and Dispatch Request
// ---------------------------------------------------------
// The Router is responsible for parsing the requested URL and determining which
// controller and method should handle the request. It extracts the controller 
// name, method, and any parameters from the URL, and calls the appropriate
// controller method.
//
// For example, if the URL is /products/list, the router will call the 'list' 
// method in the 'ProductController'.
//
// The 'dispatch' method will handle the process of resolving the request and 
// invoking the correct method within the controller.
//
// If no specific route is matched, the router will invoke a default controller
// (like a home page or 404 error handler).
//
$router = new Router();
$router->dispatch();

// ---------------------------------------------------------
// Step 6: Application Flow Ends
// ---------------------------------------------------------
// At this point, the request has been fully processed, and the appropriate
// response has been returned to the user. The 'dispatch' method in the Router 
// will call the appropriate controller, execute its logic, and render the 
// necessary view to the user.
//
// Now, the application waits for the next incoming request to be processed.
// ---------------------------------------------------------
