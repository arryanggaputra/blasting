<?php

use PHPUnit\Framework\TestCase;

/**
 * Cover Helper Test
 */
class HelperTest extends TestCase
{
    public function testRequestHelper()
    {
        $this->assertInstanceOf(Symfony\Component\HttpFoundation\Request::class, request());
        $this->assertInstanceOf(Symfony\Component\HttpFoundation\Response::class, response());

        $this->markTestIncomplete();

    }
}
