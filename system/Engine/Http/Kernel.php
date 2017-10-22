<?php

namespace Systemblast\Engine\Http;

use Systemblast\Engine\Router\RouterStrategy;
use Zend\Diactoros\Response\SapiEmitter;

class Kernel
{

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
     * PHP errors for cool kids http://filp.github.io/whoops/
     */
    private function handleErrors()
    {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }

    public function getRoutes()
    {
        return require_once root_path('src/Http/Routes.php');
    }

    private function handleConfiguration()
    {
        $dotenv = new \Dotenv\Dotenv(root_path());
        $dotenv->load();
    }
}
