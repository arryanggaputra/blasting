<?php
namespace Systemblast\Engine\Http;

class Request
{
    private static $instance = null;

    public static function make()
    {
        // Check if instance is already exists
        if (self::$instance == null) {
            self::$instance = (new Request())->create();
        }
        return self::$instance;
    }

    protected function create()
    {
        /**
         * to get the same $_SERVER['REQUEST_URI'] on both localhost and live server
         */
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            $url                    = preg_replace('#^https?://#', '', $_SERVER['APP_URL']);
            $url                    = str_replace($_SERVER['HTTP_HOST'], '', $url);
            $_SERVER['REQUEST_URI'] = str_replace($url, '', $_SERVER['REQUEST_URI']);
        }
        return \Zend\Diactoros\ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
    }

    private function __clone()
    {
        // Stopping Clonning of Object
    }

    private function __wakeup()
    {
        // Stopping unserialize of object
    }
}
