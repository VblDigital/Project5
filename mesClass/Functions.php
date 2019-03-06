<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 04/03/2019
 * Time: 18:09
 */

namespace mesClass;
use \PDO;

class Functions extends Database
{
    public function query ( $stmt, $class_name )
    {
        $req = $this->getPDO()->query($stmt);
        $result = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
        return $result;
    }

    public function prepare ( $statement, $attributes, $class_name, $one = false )
    {
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

    public function prepare_reference ( $statement, $class_name )
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute(array());
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $datasref = $req->fetch();
        return $datasref;
    }
}