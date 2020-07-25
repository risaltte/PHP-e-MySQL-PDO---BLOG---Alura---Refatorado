<?php

namespace Risaltte\Blog\InfraStructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $dsn = 'mysql:host=localhost;dbname=blog';
        $username = 'blog';
        $password = 'password.1';
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $connection = new PDO(
            $dsn,
            $username,
            $password,
            $options
        );

        return $connection;
    }
}