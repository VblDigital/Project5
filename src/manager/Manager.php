<?php
namespace src\manager;

use src\controller\Input;

/**
 * Class Manager
 * @package src\manager
 */
class Manager
{
    /**
     * @return \PDO -> connexion to database
     */
    public static function getPDO ()
    {
        $input = new Input();
        $host = $input->env('DB_SERVER');
        $username = $input->env('DB_USER');
        $password = $input->env('DB_PASS');
        $dbname = $input->env('DB_NAME');

        $pdo = new \PDO('mysql:host='. $host .';dbname=' . $dbname, $username, $password);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    /**
     * @param $statement
     * Prepare the results of a sql request
     * @param array $params
     */
    public function prepareStmt ($statement, $params = [])
    {
        $req = $this->getPDO()->prepare($statement);
        foreach ($params as $key => $val) {
            $req->bindParam($key, $val);
        }
        $req->execute($params);
    }

    /**
     * @param $statement
     * @param $class_name
     * @param bool $all
     * @param array $params
     * @return array|mixed
     * Prepare the results of a sql request - object layout
     */
    public function prepareObject ( $statement, $class_name, $all = false, $params = [])
    {
        $req = $this->getPDO()->prepare($statement);
        foreach ($params as $key => $val) {
            $req->bindParam($key, $val);
        }
        $req->execute($params);
        $req->setFetchMode(\PDO::FETCH_CLASS, $class_name);
        if ($all) {
            return $req->fetchAll();
        } return $req->fetch();
    }
}
