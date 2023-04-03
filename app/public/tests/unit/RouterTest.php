<?php

declare(strict_types=1);

namespace tests\unit;

use PHPUnit\Framework\TestCase;
use router\Router;

class RouterTest extends TestCase
{

    public function testRouterRegistration():void
    {
        $router = new Router();

        $router->register('get', '/products', ['Products', 'showProducts']);

        $expected = [
            'get' => [
                '/products' => ['Products', 'showProducts']
            ]
        ];

        $this->assertEquals($expected, $router->routes());
    }

}