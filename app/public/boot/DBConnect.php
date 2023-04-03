<?php

namespace boot;
use PDO;

class DBConnect
{

    private PDO $connection;
    public function __construct(array $config)
    {
        $defaultOptions = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->connection = new PDO(
                $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['database'],
                     $config['user'],
                     $config['pass'],
                    $config['options'] ?? $defaultOptions
            );
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function __call(string $name, array $arguments)
    {
        return call_user_func_array([$this->connection, $name], $arguments);
    }

}