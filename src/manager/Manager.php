<?php
namespace src\manager;

class Manager
{
    public static function getPDO ()
    {
        $pdo = new \PDO('mysql:host=172.17.0.2;dbname=project5_bdd', 'root', 'root');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public function prepare ($statement, $class_name, $all = false)
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute(array());
        $req->setFetchMode(\PDO::FETCH_CLASS, $class_name);
        if ($all) {
            return $req->fetchAll();
        } else {
            return $req->fetch();
        }
    }
}
