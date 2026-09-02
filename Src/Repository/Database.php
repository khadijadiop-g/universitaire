<?php

namespace App\Repository;

final class Database
{
    private static ?\PDO $instance = null;

    private function __construct(){}
    public static function getConnexion(): \PDO
    {
        if (self::$instance === null) {
            try {
                $dsn = "pgsql:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']};dbname={$_ENV['DB_NAME']}";
                self::$instance = new \PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS'], [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                ]);
            } catch (\PDOException $e) {
                throw new \Exception('Erreur de connexion à la base de donnée : ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
    protected static function closeConnection(): void
    {
        self::$instance = null;
    }

}