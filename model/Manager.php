<?php
namespace model;

class Manager
{
    public static function getPDO ()
    {
        $pdo = new \PDO('mysql:host=localhost;dbname=project5_bdd', 'root', '');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public function prepare_all ( $statement, $class_name )
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute(array());
        $req->setFetchMode(\PDO::FETCH_CLASS, $class_name);
        $datas = $req->fetchAll();
        return $datas;
    }

    public function prepare_single ( $statement, $class_name )
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute(array());
        $req->setFetchMode(\PDO::FETCH_CLASS, $class_name);
        $datas = $req->fetch();
        return $datas;
    }
}