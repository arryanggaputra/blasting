<?php

use PHPUnit\Framework\TestCase;

/**
 * Cover Route Test
 */
class RoutesTest extends TestCase
{
    protected $kernel;

    public function setUp()
    {
        $this->kernel = new \Systemblast\Engine\Http\Kernel;
    }

    public function testRoutes()
    {
        $this->assertInstanceOf(League\Route\RouteCollection::class, $this->kernel->getRoutes());
    }

}
