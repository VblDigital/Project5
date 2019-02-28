<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 25/02/2019
 * Time: 22:40
 */
//Connection to database with PDO

namespace mesClass;
use \PDO;

class Database

{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct ($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->$db_name = $db_name;
        $this->$db_user = $db_user;
        $this->$db_pass = $db_pass;
        $this->$db_host = $db_host;
    }

    public function getPDO() {
        if($this->pdo === null) {
            $pdo = new PDO('mysql:host=localhost;dbname=project5_bdd', 'root', '');
            //$pdo = new PDO ('mysql:host=mysql-project5.alwaysdata.net;dbname=project5_bdd', 'project5', 'alan2303');
            //to display the errors
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $pdo;
    }

    public function query($stmt, $class_name) {
        $req = $this->getPDO()->query($stmt);
        $result = $req -> fetchAll(PDO::FETCH_CLASS, $class_name);
        return $result;
    }

    public function prepare_username($statement, $class_name) {
        $req = $this->pdo->prepare($statement);
        $req->execute(array());
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $datas = $req->fetch();
        return $datas;
    }

    public function prepare($statement, $attributes, $class_name, $one = false) {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }
}