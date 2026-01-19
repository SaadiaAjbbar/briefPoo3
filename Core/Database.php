<?php

class Database {
    private $connection;

    public function __construct($host, $user, $password, $dbname) {
        try {
            $this->connection = new PDO(
                "pgsql:host=$host;dbname=$dbname;",
                $user,
                $password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection(){
        return $this->connection;
    }
}