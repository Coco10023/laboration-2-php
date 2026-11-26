<?php 

class Database 
{
    private string $host;
    private string $dbname;
    private string $username;
    private string $password;

    public function __construct()
    {
        $config = require __DIR__ . '/../config/config.php';

        $this->host = $config['host'];
        $this->dbname = $config['dbname'];
        $this->username = $config['username'];
        $this->password = $config['password']; 
    }

    public function connect(): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";

        $pdo = new PDO(
            $dsn,
            $this->username,
            $this->password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );

        return $pdo;
    }
}