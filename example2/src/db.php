<?php

class Db {

    private ?PDO $conn;

    public static ?Db $db = null;

    public function __construct() {
        $this->conn = new PDO(
            'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASS']
        );
    }

    public function query(string $sql, array $params = []): PDOStatement {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetch(string $sql, array $params = [], int $mode = PDO::FETCH_ASSOC): mixed
    {
        return $this->query($sql, $params)->fetch($mode);
    }

    /**
     * Ejecuta una consulta y retorna true si se afectaron filas
     */
    public function exec(string $sql, array $params = []): bool
    {
        return $this->query($sql, $params)
            ->rowCount() > 0;
    }

    /**
     * Get driver
     */
    public function get(): PDO {
        return $this->conn;
    }

    /**
     * Cierra la conexion
     */
    public function close() {
        $this->conn = null;
    }

    public static function getInstance(): Db {
        if (self::$db === null) {
            self::$db = new Db;
        }
        return self::$db;
    }
}
