<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 05/02/2019
 * Time: 16:14
 */

// connection to database
require ('../include/config.php');
// initialization of error message
$errMsg = "";

// we define if the form has been validated
if(isset($_POST['submit'])) {

    // we define if the form has been filled
    if (empty($_POST['username'])) {

        $errMsg = "Veuillez saisir un identifiant";

    } elseif (empty($_POST['password'])) {

        $errMsg = "Veuillez saisir votre mot de passe";

    } elseif (isset($_POST['username']) && isset($_POST['password'])) {

        // we define the variable with the data filled
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }

        // we prepare the data which correspond to data filled
        $query = $bdd->prepare('SELECT * FROM user WHERE username = :username && password = :password');
        $query->execute(array(
            ':username' => $username,
            ':password' => $password,
        ));
        $count = $query->rowCount();
        var_dump($email);

        // compare the results
        if ($count > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('Location:../profile.php');
            exit;
        } else {
            $errMsg = 'Votre identifiant et/ou votre mot de passe est incorrect.';
        }
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