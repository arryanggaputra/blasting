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
            'cache' => storage_path('views'),
        ]);
    }

    public function render(string $path, array $data = []): string
    {
        return $this->view->render($path, $data);
    }
}
