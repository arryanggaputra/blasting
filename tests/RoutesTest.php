<?php

use PHPUnit\Framework\TestCase;

/**
 * Cover Route Test
 */
class RoutesTest extends TestCase
{
    protected $routes;

    public function setUp()
    {
        $this->routes      = (new \Blasting\Http\Routes)();
        $this->middlewares = (new \Blasting\Http\Layers)();
    }

    public function testRoutes()
    {
        $this->assertInstanceOf(Phroute\Phroute\RouteDataArray::class, $this->routes);
    }

    public function testMiddlewares()
    {
        foreach ($this->middlewares as $filterName => $fqcn) {
            $this->assertArrayHasKey($filterName, $this->routes->getFilters());
            $this->assertTrue(method_exists($fqcn, 'handle'), 'Class does not have method handle()');
            $this->assertInstanceOf(\Closure::class, $this->routes->getFilters()[$filterName]);
        }
    }
}
