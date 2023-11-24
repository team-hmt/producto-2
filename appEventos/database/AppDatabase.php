<?php

namespace database;

use PDO;

class AppDatabase
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $this->connection = new PDO("mysql:host=" . (DB_HOST) . ";dbname=" . (DB_NAME), DB_USER, DB_PASS);
    }

    public static function getInstance(): AppDatabase
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}