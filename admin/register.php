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
    if (isset($_POST['username']) AND isset($_POST['password']) AND isset($_POST['email'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
    }


    // we prepare to insert data in BDD
    $query = $bdd->prepare('INSERT INTO user (username, password, email) VALUES (:username, :password, :email)');
    $query->execute(array(
        ':username' => $username,
        ':password' => $password,
        ':email' => $email
    ));
    header('Location:register.php?action=joined');
    exit;
}

if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'Vous êtes maintenant inscrit. Vous pouvez vous connecter avec <a href="connect.php">la page de connexion</a>';
}

?>

<html>

<head>

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
            <h2>S'enregistrer</h2>
        </div>
        <div>
            <input id="username" style="width:200px" type="text" name="username" placeholder="Identifiant" required> *
        </div>
        <div>
            <input id="password" style="width:200px" type="password" name="password" placeholder="Mot de passe" required> *
        </div>
        <div>
            <input id="email" style="width:200px" type="email" name="email" placeholder="Adresse email" required> *
        </div>
        <br/>
        Les champs suivis d'une * sont obligatoires<br/>
        <br/>
        <div>
            <input type="submit" name="submit" value="Valider">
        </div>
        <br/>
        <div>
            Déjà inscrit ? Venez par <a href="connect.php">ICI</a>
        </div>
    </form>
</div>
</body>

</html>