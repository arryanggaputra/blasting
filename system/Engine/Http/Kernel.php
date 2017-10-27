<?php

namespace Systemblast\Engine\Http;

use Systemblast\Engine\Router\RouterStrategy;
use Zend\Diactoros\Response\SapiEmitter;

class Kernel
{

    /**
     * The Router instance.
     *
     * @var \League\Route\RouteCollection
     */
    protected $router;

    /**
     * Blasting Framework Instance
     *
     * @var Systemblast\Engine\Foundation\Application
     */
    protected $app;

    public function __construct()
    {
        $this->app = app();
    }

    /**
     * This is the core of the whole application
     * to handle incoming request
     *
     * @return void
     */
    public function listen()
    {
        $this->router->setStrategy(new RouterStrategy);

        $response = $this->router->dispatch(request(), response());

        (new SapiEmitter)->emit($response);
    }

    /**
     * Set the router instance.
     *
     * @return void
     */
    public function setRouter(\Closure $callback)
    {
        $this->router = new \League\Route\RouteCollection($this->app->container);
        call_user_func($callback, $this->router);
    }

}
