<?php

namespace Systemblast\Engine\Router;

use League\Route\Http\Exception\NotFoundException;
use League\Route\Strategy\ApplicationStrategy;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;

class RouterStrategy extends ApplicationStrategy
{

    /**
     * {@inheritdoc}
     */
    public function getNotFoundDecorator(NotFoundException $exception)
    {
        return function (ServerRequestInterface $request, ResponseInterface $response) use ($exception) {
            return new HtmlResponse($exception->getMessage(), 404);
        };
    }

}
