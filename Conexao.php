<?php

class Conexao extends PDO
{

    private $dbname;
    private $driver = 'mysql';
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    private $pdo;

    public function __construct($dbname, $driver = '', $host = '', $user = '', $pass = '', $charset = '')
    {
        $this->setDbname($dbname);
        $this->setDriver($driver);
        $this->setHost($host);
        $this->setUser($user);
        $this->setPass($pass);
        $this->setCharset($charset);

        $this->pdo = parent::__construct(
            "$this->driver:host=$this->host;dbname=$this->dbname;charset=$this->charset",
            $this->user,
            $this->pass
        );

        return $this->pdo;
    }

    public function fetchAll($query, $params = [], $fetch = PDO::FETCH_OBJ)
    {
        $prepare = $this->prepareExecute($query, $params);
        return $prepare->fetchAll($fetch);
    }

    public function execute($query, $params)
    {
        return $this->prepareExecute($query, $params, false);
    }

    private function prepareExecute($query, $params = [], $returnPrepare = true)
    {
        $prepare = $this->prepare($query);
        $execute = $prepare->execute($params);
        return ($returnPrepare ? $prepare : $execute);
    }

    private function setDbname($dbname)
    {
        $this->dbname = $dbname ? $dbname : $this->dbname;
    }

    private function setDriver($driver)
    {
        $this->driver = $driver ? $driver : $this->driver;
    }

    private function setHost($host)
    {
        $this->host = $host ? $host : $this->host;
    }

    private function setUser($user)
    {
        $this->user = $user ? $user : $this->user;
    }

    private function setPass($pass)
    {
        $this->pass = $pass ? $pass : $this->pass;
    }

    private function setCharset($charset)
    {
        $this->charset = $charset ? $charset : $this->charset;
    }
}
