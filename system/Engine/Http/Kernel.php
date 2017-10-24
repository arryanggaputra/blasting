<?php

namespace Systemblast\Engine\Http;

use Systemblast\Engine\Router\RouterStrategy;
use Zend\Diactoros\Response\SapiEmitter;

class Kernel
{

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

        $route = $this->getRoutes();

        $route->setStrategy(new RouterStrategy);

        $response = $route->dispatch(request(), response());

        (new SapiEmitter)->emit($response);
    }

    /**
     * PHP errors for cool kids
     * http://filp.github.io/whoops/
     *
     * @return void
     */
    private function handleErrors()
    {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }

    /**
     * Get all registered route
     *
     * @return void
     */
    public function getRoutes()
    {
        return require_once root_path('src/Http/Routes.php');
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
