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
