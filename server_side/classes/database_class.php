<?php

class Database
{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;
    private $option;

    private $dsn;
    function __construct()
    {
        $this->host = '127.0.0.1';
        $this->db = 'camagru';
        $this->user = 'root';
        $this->pass = 'lalagobiramos';
        $this->charset = 'utf8mb4';
        $this->option =  [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
    }

    function creat_PDO()
    {

        try {
            $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->option);
            return $pdo;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}