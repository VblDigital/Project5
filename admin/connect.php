<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 05/02/2019
 * Time: 16:14
 */

// connection to database
require ('../include/config.php');

// we define if the form has been validated
if(isset($_POST['submit'])) {

    // initialization of error message
    $errMsg = "";

    // we define the variable with the data filled
    if (isset($_POST['username']) AND isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    // we prepare the data which correspond to data filled
    $query = $bdd->prepare('SELECT * FROM user WHERE username = :username');
    $query->execute(array(
        ':username' => $username
    ));
    $data = $query->fetch();

    // compare the results
    if ($data !== 0) {
        if ($password == $data['password']) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            header('Location:../profile.php');
            exit;
        } else
            $errMsg = 'Le mot de passe n\'est pas correct.';
    } else {
        $errMsg = "Le compte de $username n'a pas été trouvé.";
    }
}
?>

<html>

<head>
    <title><h2>Se connecter</h2></title>
</head>

<body>

    <?php
    if(isset($errMsg)){
        echo '<div>'.$errMsg.'</div>';
    }
    ?>

<!--login form -->
<div align="center">
    <form  method="POST" action="">
        <div>
            <h2>Se connecter</h2>
        </div>
        <div>
            <input id="username" style="width:200px" type="text" name="username" placeholder="Identifiant" required> *
        </div>
        <div>
            <input id="password" style="width:200px" type="password" name="password" placeholder="Mot de passe" required> *
        </div>
        <br/>
        Les champs suivis d'une * sont obligatoires<br/>
        <br/>
        <div>
            <input type="submit" name="submit" value="Valider">
        </div>
        <br/>
        <div>
            Pas encore inscrit ? Venez par <a href="register.php">ICI</a>
        </div>
    </form>
</div>
</body>

</html>