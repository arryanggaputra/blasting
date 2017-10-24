<?php

if (!function_exists('request')) {
    /**
     * Get an instance of the current request or an input item from the request
     *
     * @return Zend\Diactoros\ServerRequestFactory
     */
    function request()
    {
        return app()->container->get('request');
    }
}

if (!function_exists('response')) {
    /**
     * A response function holds all the information that needs
     * to be sent back to the client from a given request
     *
     * @return Zend\Diactoros\Response
     */
    function response()
    {
        return (new Zend\Diactoros\Response);
    }
}

if (!function_exists('json_response')) {
    /**
     * Response represents an HTTP response in JSON format
     *
     * @param  null|array  $data data to represent on client
     * @param  integer $code HTTP status code
     * @return Zend\Diactoros\Response\JsonResponse JSON object
     */
    function json_response($data = null, $code = 200)
    {
        return new Zend\Diactoros\Response\JsonResponse($data, $code);
    }
}

if (!function_exists('root_path')) {
    /**
     * get the rooth path
     *
     * @param  string $path path to add after the root path
     * @return string
     */
    function root_path(string $path = '')
    {
        return __DIR__ . '/../' . $path;
    }
}

if (!function_exists('storage_path')) {
    /**
     * get the storage path
     *
     * @param  string $path path to add after the storage path
     * @return string
     */
    function storage_path(string $path = '')
    {
        return root_path('storage/' . $path);
    }
}

if (!function_exists('resource_path')) {
    /**
     * get the resource path
     *
     * @param  string $path path to add after the resource path
     * @return string
     */
    function resource_path(string $path = '')
    {
        return root_path('resources/' . $path);
    }
}

if (!function_exists('view_path')) {
    /**
     * get the view path
     *
     * @param  string $path path to add after the view path
     * @return string
     */
    function view_path(string $path = '')
    {
        return resource_path('views/' . $path);
    }
}

if (!function_exists('app')) {
    /**
     * Get the available container instance.
     *
     * @return void
     */
    function app()
    {
        return Systemblast\Engine\Foundation\Application::make();
    }
}

if (!function_exists('view')) {
    /**
     * Get the evaluated view contents for the given view
     *
     * @param  string $path path or view filename
     * @param  array  $data data to represent to the client
     * @return string
     */
    function view(string $path, array $data = [])
    {
        $view = app()->container->get('Systemblast\Interfaces\View');
        return new Zend\Diactoros\Response\HtmlResponse($view->render($path, $data));
    }
}

if (!function_exists('input')) {
    /**
     * Get an instance of the current request or an input item from the request.
     *
     * @return Systemblast\Engine\Http\Input|string|array
     */
    function input()
    {
        return new Systemblast\Engine\Http\Input;
    }
}
