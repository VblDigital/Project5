<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 29/01/2019
 * Time: 17:36
 */

session_start();

// connection to database
require ('../include/config.php');

// we define if the form has been validated
if(isset($_POST['log_action']))
{
    // we define the variable with the data filled
    $login = $_POST['username'];
    $userpass = $_POST['password'];

    // we prepare the data which correspond to data filled
    $query = $bdd->prepare("SELECT * FROM user WHERE 'username' = '$login' AND 'password' = '$userpass'");
    $query -> execute();

    // we identify if date found
    $count = $query->fetchColumn();

    // we check if a data corresponds
    if ($count == "1")
    {
       $_SESSION['username'] = $login;

       header('location: ../profile.php');
    }
    else
    {
        var_dump($_SESSION['username']);
        var_dump($_POST['username']);
    }
}
