<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 29/01/2019
 * Time: 17:27
 */

session_start();

// connection to BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=project5_bdd', 'root', '');
    //$bdd = new PDO('mysql:host=mysql-project5.alwaysdata.net;dbname=project5_bdd', 'project5', 'alan2303');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*    foreach($bdd->query('SELECT * from user') as $row) {
        print_r($row);*/

} catch (PDOException $e) {
    echo $e->getMessage();
}