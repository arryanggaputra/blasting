<?php

/**
 * Routes
 */
$route = new League\Route\RouteCollection;

$route->get('/', '\Blasting\Controllers\HomeController::index');

return $route;
