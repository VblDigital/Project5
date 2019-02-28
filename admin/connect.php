<?php
session_start();
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 05/02/2019
 * Time: 16:14
 */
// connection to database
require '..\mesClass\Autoloader.php';
\App\Autoloader::register();
$bdd = new App\Database('project5_bdd');

// initialization of error message
$errMsg = "";

// we define if the form has been validated
if(isset($_POST['submit'])) {

    // we define if the form has been filled
    $connect = (isset($username) && isset($_POST['password']));

     // we define the variable with the data filled
     if ($connect) {
         echo "OK";
     }
}
?>

<html>

<head>
    <title>Se connecter</title>
</head>

<body>

<!--login form -->
<div align="center">
    <form  method="POST" action="">
        <div>
            <h2>Se connecter</h2>
        </div>
        <div>
            <input id="username" style="width:200px" type="text" name="username" placeholder="Identifiant" autocomplete="off" value=""> *
        </div>
        <div>
            <input id="password" style="width:200px" type="password" name="password" placeholder="Mot de passe" autocomplete="off" value=""> *
        </div>
        <br/>
        Les champs suivis d'une * sont obligatoires<br/>
        <br/>
        <div>
            <input type="submit" name="submit" value="Valider">
        </div>
        <br/>
        <strong>
        <?php
        if(isset($errMsg)){
            echo '<div>'.$errMsg.'</div>';
        }
        ?>
        </strong><br>
        <div>
            Pas encore inscrit ? Venez par <a href="register.php">ICI</a>
        </div>
    </form>
</div>
</body>

</html>