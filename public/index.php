<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('WEBROOT', 'http://localhost/trelloapi');

include_once '..' . DS . 'app' . DS . 'bootstrap.php';




  
/**
 * http handler (GET, POST)
 * Session
 * Cookies
 * View()
 * Route::get('/url', [ControllerName::class, 'method'])
 * Route::post()
 * User management (login, registration, udpate, delete, accessRole)
 */