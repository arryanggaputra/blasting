<?php

namespace Systemblast\Engine\Foundation;

class Application
{
    private static $instance = null;

    private function __construct()
    {
        $dependencies = require_once root_path('config/dependency.php');
        $container    = new \League\Container\Container;
        foreach ($dependencies['singleton'] as $interface => $implementation) {
            $container->share($interface, $implementation);
        }

        foreach ($dependencies['binding'] as $interface => $implementation) {
            $container->add($interface, $implementation);
        }
        $this->container = $container;
    }

    public static function make()
    {
        // Check if instance is already exists
        if (self::$instance == null) {
            self::$instance = new Application();
        }
        return self::$instance;
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
