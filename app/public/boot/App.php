<?php

declare(strict_types=1);
namespace boot;
use router\Router;

class App
{
    private static  DBConnect $connection;
    public function __construct(
        protected Router $router,
        protected array $request,
        protected array $config
    )
    {
        static::$connection = new DBConnect($this->config ?? null);

    }

    public static function connect():DBConnect
    {
        return static::$connection;
    }

    public function run():void
    {
        try {
            $this->router->resolve(strtolower($this->request['request_method']), $this->request['request_uri']);
        } catch (\exceptions\RouteNotFoundException $exception) {
            echo "<h1 style='text-align: center'>" . $exception->getMessage() . "</h1>";
        }
    }
}