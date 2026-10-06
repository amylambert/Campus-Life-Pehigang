<?php

abstract class AbstractManager
{
    protected PDO $db;

    public function __construct()
    {
        $dbHost = $_ENV['DATABASE_HOST'];
        $dbUser = $_ENV['DATABASE_USERNAME'];
        $dbPass = $_ENV['DATABASE_PASSWORD'];
        $dbName = $_ENV['DATABASE_NAME'];

        $connexion = "mysql:host=".$dbHost.";port=3306;charset=utf8;dbname=".$dbName;
        $this->db = new PDO(
            $connexion,
            $dbUser,
            $dbPass
        );
    }
}