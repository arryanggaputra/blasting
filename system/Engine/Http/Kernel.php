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
        $this->handleErrors();

        $this->handleConfiguration();

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

    /**
     * PHP errors for cool kids
     *
     * @see  http://filp.github.io/whoops/
     * @return void
     */
    private function handleErrors()
    {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }

    /**
     * load .env configuration file
     *
     * @return void
     */
    private function handleConfiguration()
    {
        $dotenv = new \Dotenv\Dotenv(root_path());
        $dotenv->load();
    }
}
