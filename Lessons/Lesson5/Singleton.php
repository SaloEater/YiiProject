<?php

class Database
{
    private static $database;

    private function __construct()
    {
        echo "Create database connection..." . PHP_EOL;
    }

    public static function instance()
    {
        if (!isset(self::$database)) {
            echo "Create instance..." . PHP_EOL;
            self::$database = new self();
        }

        return self::$database;
    }
}

class Query
{
    private $db;

    public function __construct()
    {
        $this->db = Database::instance();
    }
}



