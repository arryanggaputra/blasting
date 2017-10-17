<?php

if (!function_exists('request')) {
    /**
     * Get an instance of the current request or an input item from the request
     * @return Symfony\Component\HttpFoundation\Request
     */
    function request()
    {
        $request = Symfony\Component\HttpFoundation\Request::createFromGlobals();
        return $request;
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
        $response = new Symfony\Component\HttpFoundation\Response;
        return $response;
    }
}

if (!function_exists('responseJson')) {
    /**
     * Response represents an HTTP response in JSON format
     * @return Symfony\Component\HttpFoundation\Response
     */
    function responseJson($data = null)
    {
        if (is_array($data)) {
            $data = json_encode($data);
        }

        $response = response();
        $response->setContent($data);
        $response->headers->set('Content-Type', 'application/json');
        $response->send();
    }
}

if (!function_exists('storage_path')) {
    function storage_path(string $path = '')
    {
        return __DIR__ . '/../storage/' . $path;
    }
}

if (!function_exists('resource_path')) {
    function resource_path(string $path = '')
    {
        return __DIR__ . '/../resources/' . $path;
    }
}

if (!function_exists('view_path')) {
    function view_path(string $path = '')
    {
        return resource_path('views/' . $path);
    }
}
