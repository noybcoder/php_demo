<?php

class Database {
    public $connection;
    public $statement;

    public function __construct($config, $username = "root", $password = "P090384n!") {
        $dsn = "mysql:" . http_build_query($config, "", ";");
        
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    
    public function query($command, $params = []) {
        $this->statement = $this->connection->prepare($command);
        $this->statement->execute($params);

        return $this;
    }

    public function find() {
        return $this->statement->fetch();
    }

    public function findOrFail() {
        $result = $this->find();

        if (! $result) {
            abort();
        }
        return $result;
    }

    public function get() {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
}