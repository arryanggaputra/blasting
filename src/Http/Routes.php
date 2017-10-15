<?php

namespace Blasting\Http;

use Phroute\Phroute\RouteCollector;

/**
 * Routes
 */
final class Routes
{
    public $router;

    public function __construct()
    {
        $this->router = new RouteCollector;
    }

    public function __invoke()
    {
        // Check middleware size, and register middleware
        if (sizeof((new Layers)()) > 0) {
            foreach ((new Layers)() as $key => $fqcn) {
                $this->router->filter($key, function () use ($fqcn) {
                    return (new $fqcn)->handle();
                });
            }
        }

        $this->router->get('/', [\Blasting\Controllers\HomeController::class, 'index']);
        return $this->router->getData();
    }
}
