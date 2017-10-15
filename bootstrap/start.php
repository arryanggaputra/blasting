<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;

/**
 * PHP errors for cool kids http://filp.github.io/whoops/
 */
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

/*
 * Request instance (use this instead of $_GET, $_POST, etc).
 * Laravel or Symfony style...
 */
$router = new Blasting\Http\Routes;

try {
    /**
     * A matching route was found
     */
    (new Phroute\Phroute\Dispatcher($router()))
        ->dispatch(request()->getMethod(), request()->getPathInfo());

} catch (HttpRouteNotFoundException $e) {
    /**
     * No matching route was found
     */
    response()
        ->prepare(request())
        ->setContent('404 Not Found')
        ->setStatusCode(404)
        ->send();

} catch (HttpMethodNotAllowedException $e) {
    /**
     * A matching route was found, but the wrong HTTP method was used.
     */
    response()
        ->prepare(request())
        ->setContent('405 Method Not Allowed')
        ->setStatusCode(405)
        ->send();
}
