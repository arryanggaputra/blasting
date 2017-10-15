<?php

namespace Blasting\Http;

/**
 * Layer class to register all middlewares
 */
final class Layers
{

    public function __invoke()
    {
        return [
            'auth' => \Blasting\Http\Middlewares\Authenticate::class,
        ];
    }
}
