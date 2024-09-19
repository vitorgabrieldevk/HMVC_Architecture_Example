<?php

use Dotenv\Dotenv;

/*----------------------------------------------
| Load Composer Autoloader
| ---------------------------------------------*/
require_once __DIR__ . '/../vendor/autoload.php';

/*----------------------------------------------
| Load Environment Variables
| ---------------------------------------------*/
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

/*----------------------------------------------
| Define Application Environment
| ---------------------------------------------*/
define('ENVIRONMENT', $_ENV['APP_ENV'] ?? 'development');

/*----------------------------------------------
| Validate Required Environment Variables
| ---------------------------------------------*/
$requiredEnvVars = [
    'APP_ENV',
    'BASE_PATH',
    'PATH_ICON',
    'APP_PATH',
    'SYSTEM_PATH',
    'MODULES_PATH',
    'PUBLIC_PATH',
    'DB_CONNECTION',
    'DB_HOST',
    'DB_PORT',
    'DB_DATABASE',
    'DB_USERNAME'
];

foreach ($requiredEnvVars as $var) {
    if (empty($_ENV[$var])) {
        if (ENVIRONMENT === 'development') {
            $title = 'Error';
            $message = 'Verifique se todas as váriaveis de ambiente foi configuradas corretamente';
        } else {
            $title = 'Estamos em manutenção';
            $message = 'Por favor, aguarde enquanto estamos verificando';
        };
        include __DIR__ . '/resources/TemplateViewError.php';
        die();
    }
}

/*----------------------------------------------
| Define Path Constants
| ---------------------------------------------*/
define('BASE_PATH', $_ENV['BASE_PATH']);
define('PATH_ICON', $_ENV['PATH_ICON']);
define('APP_PATH', $_ENV['APP_PATH']);
define('SYSTEM_PATH', $_ENV['SYSTEM_PATH']);
define('MODULES_PATH', $_ENV['MODULES_PATH']);
define('PUBLIC_PATH', $_ENV['PUBLIC_PATH']);

/*----------------------------------------------
| Configure PHP Error Reporting
| ---------------------------------------------*/
if (ENVIRONMENT === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', $_ENV['DISPLAY_ERRORS'] ?? '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

/*----------------------------------------------
| Test Database Connection
| ---------------------------------------------*/
try {
    $dsn = $_ENV['DB_CONNECTION'] . ':host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_DATABASE'];
    $pdo = new PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    if (ENVIRONMENT === 'development') {
        $title = 'Error';
        $message = 'Verifique se todas as váriaveis de ambiente foi configuradas corretamente';
    } else {
        $title = 'Estamos em manutenção';
        $message = 'Por favor, aguarde enquanto estamos verificando';
    };
    include __DIR__ . '/resources/TemplateViewError.php';
    die();
}

/*----------------------------------------------
| Include Required Files
| ---------------------------------------------*/
$requiredFiles = [
    APP_PATH . 'config/config.php',
    APP_PATH . '../library/Router.php',
    APP_PATH . 'config/database.php',
    APP_PATH . '../library/View.php',
    APP_PATH . '../library/_helpers.php'
];

foreach ($requiredFiles as $file) {
    if (!file_exists($file)) {
        if (ENVIRONMENT === 'development') {
            $title = 'Erro na configuração do projeto';
            $message = "Não foi possível achar o arquivo: {$file}";
        } else {
            $title = 'Estamos em manutenção';
            $message = 'Por favor, aguarde enquanto estamos verificando';
        };
        include __DIR__ . '/resources/TemplateViewError.php';
        die();
    }
    require_once $file;
}
