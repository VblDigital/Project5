<?php
namespace model;
class Manager
{
    private $pdo;

    public function getPDO ()
    {
        if ($this->pdo === null) {
            $pdo = new \PDO('mysql:host=localhost;dbname=project5_bdd', 'root', '');
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $pdo;
    }
}