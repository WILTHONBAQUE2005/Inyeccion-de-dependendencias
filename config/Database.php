<?php
class Database {
    private static $pdo = null;

    public static function connect(): PDO {
        if (self::$pdo === null) {
            $host = '127.0.0.1';
            $db   = 'tienda';
            $user = 'root';
            $pass = '';           // tu contraseña de root en XAMPP
            $dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

            self::$pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }
        return self::$pdo;
    }
}
