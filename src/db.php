<?php

class Db {
    const DB_HOST = 'dbmanager';
    const DB_NAME = 'dbsenati';
    const DB_USER = 'admin';
    const DB_PASSWORD = '123456';

    private PDO $conn;

    public function __construct() {
        $this->conn = new PDO(
            'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME,
            self::DB_USER,
            self::DB_PASSWORD
        );
    }
}

var_dump(new Db());