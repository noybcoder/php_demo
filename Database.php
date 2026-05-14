<?php

class Database {
    public $connection;

    public function __construct($config, $username = "noyb911", $password = "") {
        $dsn = "pgsql:" . http_build_query($config, "", ";");

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    
    public function query($command, $params = []) {
        $statement = $this->connection->prepare($command);
        $statement->execute($params);

        return $statement;
    }
}