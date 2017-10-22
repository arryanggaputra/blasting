<?php

if (!function_exists('request')) {
    /**
     * Get an instance of the current request or an input item from the request
     * @return Symfony\Component\HttpFoundation\Request
     */
    function request()
    {
        return Zend\Diactoros\ServerRequestFactory::fromGlobals();
    }
}

if (!function_exists('response')) {
    /**
     * A response function holds all the information that needs
     * to be sent back to the client from a given request
     * @return Symfony\Component\HttpFoundation\Response
     */
    function response()
    {
        return (new Zend\Diactoros\Response);
    }
}

if (!function_exists('JsonResponse')) {
    /**
     * Response represents an HTTP response in JSON format
     * @return Symfony\Component\HttpFoundation\Response
     */
    function JsonResponse($data = null)
    {
        return new Zend\Diactoros\Response\JsonResponse($data);
    }
}

if (!function_exists('root_path')) {
    function root_path(string $path = '')
    {
        return __DIR__ . '/../' . $path;
    }
}

if (!function_exists('storage_path')) {
    function storage_path(string $path = '')
    {
        return root_path('storage/' . $path);
    }
}

if (!function_exists('resource_path')) {
    function resource_path(string $path = '')
    {
        return root_path('resources/' . $path);
    }
}

if (!function_exists('view_path')) {
    function view_path(string $path = '')
    {
        return resource_path('views/' . $path);
    }
}

if (!function_exists('app')) {
    function app()
    {
        $dependencies = require_once __DIR__ . '/../config/dependency.php';
        $container    = new League\Container\Container;
        foreach ($dependencies as $interface => $implementation) {
            $container->share($interface, $implementation);
        }
        return $container;
    }
}

if (!function_exists('view')) {
    function view(string $path, array $data = [])
    {
        $view = app()->get('Systemblast\Interfaces\View');
        return new Zend\Diactoros\Response\HtmlResponse($view->render($path, $data));
    }
}

if (!function_exists('input')) {
    function input(string $key = null, $default = null)
    {
        $queryParams = request()->getQueryParams();
        if ($key !== null) {
            $queryParams = (isset($queryParams[$key])) ?: $default;
        }
        return $queryParams;
    }
}
