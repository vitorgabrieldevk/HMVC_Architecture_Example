<?php

/*----------------------------------------------
| Initialize Application
| ---------------------------------------------*/
require_once __DIR__ . '/library/bootstrap.php';

/*----------------------------------------------
| Initialize and Dispatch Router
| ---------------------------------------------*/
$router = new Router();
$router->dispatch();
