<?php

return [
    /**
     * Register whatever class that need to binding
     */
    'binding'   => [
        // 'foo' => Foo::class,
    ],

    /**
     * The singleton pattern is a design pattern that restricts the instantiation of a class to one object
     *
     * @see  https://code.tutsplus.com/tutorials/design-patterns-the-singleton-pattern--cms-23073
     */
    'singleton' => [
        Systemblast\Interfaces\View::class => \Systemblast\Engine\Template\Twig::class,
        'request'                          => \Systemblast\Engine\Http\Request::make(),
    ],
];
