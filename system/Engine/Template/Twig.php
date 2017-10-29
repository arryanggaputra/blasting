<?php

namespace Systemblast\Engine\Template;

use Systemblast\Interfaces\View as ViewInterface;

/**
 * The flexible, fast, and secure template engine for PHP
 * https://twig.symfony.com/doc/2.x/intro.html
 * before using twig template engine, make sure, you already install twig
 * composer require "twig/twig:^2.0"
 */
class Twig implements ViewInterface
{
    private $view;

    public function __construct()
    {
        $loader     = new \Twig_Loader_Filesystem(view_path());
        $this->view = new \Twig_Environment($loader, [
            'cache'       => storage_path('views/twig'),
            'auto_reload' => (env('APP_ENV') == 'local') ? true : false,
        ]);

        $public_path = new \Twig_SimpleFunction('public_path', function ($public_path) {
            return $public_path;
        });

        $this->view->addFunction($public_path);
    }

    /**
     * Render twig to html string
     *
     * @param  string $path view filename
     * @param  array  $data data to represent to the client
     * @return string
     */
    public function render(string $path, array $data = []): string
    {
        return $this->view->render($path, $data);
    }
}
