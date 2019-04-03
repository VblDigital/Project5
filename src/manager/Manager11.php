<?php
namespace src\manager;

class Manager
{
    public static function getPDO ()
    {
        $pdo = new \PDO('mysql:db5000033073.hosting-data.io;dbname=dbs28194', 'dbu60680', 'Sara150108@06');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public function prepare ( $statement, $class_name, $all = false )
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