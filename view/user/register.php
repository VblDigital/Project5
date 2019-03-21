<?php
/**
 * Created by PhpStorm.
 * PostsCategories: VALEBLES
 * Date: 05/02/2019
 * Time: 16:14
 */
// connection to database
require ('../include/config.php');
// Include the mesClass to create the users
//require '../mesClass/Userclass.php';

$errMsg = "";
$usernametemp = "";
$passwordtemp = "";
$emailtemp = "";

// we define if the form has been validated
if(isset($_POST['submit'])) {

    // we define the variable with the data filled
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // username empty / password either / email not empty
    if($username == '') {
        if(($password == '' || $password !== '') && $email !== ''){
            $errMsg = 'Entrer un pseudonyme';
            $emailtemp = $email;
        }
    }
    // password empty / username not empty / email empty
    if($password == ''){
        if($username !== '' && $email == ''){
            $errMsg = 'Entrer un mot de passe';
            $usernametemp = $username;
        }
    // password empty / username not empty / email not empty
        elseif ($username !== '' && $email !== ''){
            $errMsg = 'Entrer un mot de passe';
            $usernametemp = $username;
            $emailtemp = $email;
        }
    }
    // if all is filled
    if ($username !== '' && $password !== '' && $email !== '') {
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
}
// result of the query after database record
if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'Vous êtes maintenant inscrit. Vous pouvez vous connecter avec <a href="connect.php">la page de connexion</a>';
}
?>

<html>

<head>
    <title>S'enregistrer</title>
</head>

<body>

<!--login form -->
<div align="center">
    <form  method="POST" action="">
        <div>
            <h2>S'enregistrer</h2>
        </div>
        <div>
            <input id="username" style="width:200px" type="text" name="username" placeholder="Identifiant" value="<?php echo "$usernametemp"; ?>"> *
        </div>
        <div>
            <input id="password" style="width:200px" type="password" name="password" placeholder="Mot de passe"> *
        </div>
        <div>
            <input id="email" style="width:200px" type="email" name="email" placeholder="Adresse email" value="<?php echo "$emailtemp"; ?>"> *
        </div>
        <br/>
        Les champs suivis d'une * sont obligatoires<br/>
        <br/>
        <div>
            <input type="submit" name="submit" value="Valider">
        </div>
        <br>
        <strong>
            <?php
            if(isset($errMsg)){
                echo '<div>'.$errMsg.'</div>';
            }
            ?>
        </strong><br>
        <div>
            Déjà inscrit ? Venez par <a href="connect.php">ICI</a>
        </div>
    </form>
</div>
</body>

</html>