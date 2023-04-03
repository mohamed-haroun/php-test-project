<?php

namespace boot;

/*
 *
 * */
class Config
{

    protected array $config = [];

    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'driver'    => 'mysql',
                'host'      => $env['DB_HOST'],
                'database'  => $env['DB_SCHEMA'],
                'user'      => $env['DB_USER'],
                'pass'      => $env['DB_PASS']
            ]
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name];
    }
}