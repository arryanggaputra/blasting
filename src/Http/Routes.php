<?php

/**
 * Routes
 */
$router = new League\Route\RouteCollection;

$router->get('/', '\Blasting\Controllers\HomeController::index');

return $router;
