<?php

class db {

    private PDO $pdo;

    public function __construct() {

        $host = "db";
        $user = "user";
        $password = "password";
        $dbname = "mydatabase";

        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    }

    public function get_connection(): PDO {
        return $this->pdo;
    }
    

}