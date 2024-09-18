<?php

/*----------------------------------------------
| Load Composer Autoloader
| ---------------------------------------------*/
// The Composer autoloader is required to automatically include classes and dependencies.
// This ensures that all necessary libraries and classes are available for the application to run.
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;






/*----------------------------------------------
| Load Environment Variables
| ---------------------------------------------*/
// Create an instance of Dotenv to load environment variables from the .env file.
// This step is crucial for configuring the application based on environment-specific settings.
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();






/*----------------------------------------------
| Define Application Environment
| ---------------------------------------------*/
// Define the environment in which the application is running (development or production).
// This is determined by the APP_ENV variable from the .env file, defaulting to 'development' if not set.
define('ENVIRONMENT', getenv('APP_ENV') ?: 'development');






/*----------------------------------------------
| Configure PHP Error Reporting
| ---------------------------------------------*/
// Set the error reporting level based on the application environment.
// In development mode, all errors are reported and displayed to aid in debugging.
// In production mode, errors are suppressed to avoid exposing sensitive information.
if (ENVIRONMENT === 'development') {
    // Display all types of errors including notices and warnings.
    error_reporting(E_ALL);
    // Enable the display of errors on the screen for easier debugging.
    ini_set('display_errors', '1');
} else {
    // Suppress all error reporting in production to avoid disclosing sensitive information.
    error_reporting(0);
    // Disable the display of errors to the user in production mode.
    ini_set('display_errors', '0');
}






/*----------------------------------------------
| Define Path Constants
| ---------------------------------------------*/
// Define constants for various application paths based on environment variables or default values.
// These constants are used throughout the application to reference directories and files.
define('BASE_PATH', getenv('BASE_PATH') ?: __DIR__);
define('PATH_ICON', getenv('PATH_ICON') ?: '/favicon.ico');
define('APP_PATH', getenv('APP_PATH') ?: BASE_PATH . '/app/');
define('SYSTEM_PATH', getenv('SYSTEM_PATH') ?: BASE_PATH . '/system/');
define('MODULES_PATH', getenv('MODULES_PATH') ?: APP_PATH . 'modules/');
define('PUBLIC_PATH', getenv('PUBLIC_PATH') ?: BASE_PATH . '/public/');






/*----------------------------------------------
| Include Required Files
| ---------------------------------------------*/
// Include the necessary configuration and setup files for the application.
// These files include application settings, routing configurations, database connection details, and custom libraries.
require APP_PATH . 'config/config.php';  // Application configuration settings
require APP_PATH . '../library/Router.php';  // Routing definitions and controllers
require APP_PATH . 'config/database.php';  // Database connection settings
require APP_PATH . '../library/View.php';  // Custom View class for rendering views
require APP_PATH . '../library/_helpers.php';  // Custom helpers class for functions






/*----------------------------------------------
| Initialize and Dispatch Router
| ---------------------------------------------*/
// Create an instance of the Router class, which handles the routing of incoming requests.
// Dispatch the current request to the appropriate controller based on the routing configuration.
$router = new Router();
$router->dispatch();