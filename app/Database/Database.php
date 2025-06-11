<?php

namespace App\Database;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $dbPath = dirname(__DIR__, 2) . '/database/' . $_ENV['DB_FNAME'];
            $dsn = "sqlite:$dbPath";

            try {
                self::$instance = new PDO($dsn);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}