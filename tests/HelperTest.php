<?php

use PHPUnit\Framework\TestCase;

/**
 * Cover Helper Test
 */
class HelperTest extends TestCase
{
    public function testRequestHelper()
    {
        $this->assertTrue(function_exists('request'));
        $this->assertTrue(function_exists('response'));
        $this->assertTrue(function_exists('json_response'));
        $this->assertTrue(function_exists('root_path'));
        $this->assertTrue(function_exists('storage_path'));
        $this->assertTrue(function_exists('view_path'));
        $this->assertTrue(function_exists('app'));
        $this->assertTrue(function_exists('view'));
        $this->assertTrue(function_exists('input'));

        $this->assertInstanceOf(Zend\Diactoros\ServerRequest::class, request());
        $this->assertInstanceOf(Zend\Diactoros\Response::class, response());
        $this->assertInstanceOf(Zend\Diactoros\Response\JsonResponse::class, json_response());
        $this->assertInstanceOf(League\Container\Container::class, app());

    }
}
