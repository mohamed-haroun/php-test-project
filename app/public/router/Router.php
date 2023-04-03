<?php

namespace router;

use container\Container;
use exceptions\RouteNotFoundException;

class Router
{
    private array $routes = [];

    public function __construct(private Container $container)
    {
    }

    public function register(string $request_method,string $route, callable|array $action):self
    {
        $this->routes[$request_method][$route] = $action;

        return $this;
    }

    public function get(string $route, callable|array $action):self
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action):self
    {
        return $this->register('post', $route, $action);
    }

    public function routes():array
    {
        return $this->routes;
    }

    /**
     * @throws RouteNotFoundException
     */
    public function resolve(string $request_method, $request_uri):void
    {
        $route = explode('?', $request_uri)[0];
        $action = $this->routes[$request_method][$route] ?? null;

        if (!$action) {
            throw new RouteNotFoundException();
        }

        if (is_callable($action)) {
            call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;
            
            if (class_exists($class)) {

                $class = $this->container->get($class);

                if (method_exists($class, $method)) {
                      call_user_func_array([$class, $method], []);
                      exit;
                }
            }
        }

        throw new RouteNotFoundException();
    }

}