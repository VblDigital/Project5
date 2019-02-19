<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 09/02/2019
 * Time: 19:57
 */
require '../include/config.php';
// initialization of error message
$errMsg = "";

// we prepare data
$username = $_SESSION['username'];
if(isset($id))
    {$id = $_SESSION['id'];
    }

print_r($_SESSION);

    // we define if the form has been validated
if(isset($_POST['update'])) {
    $newusername = $_POST['newusername'];
    $id = $_SESSION['id'];
    if (!empty($newusername)){
        $sql = "UPDATE user set username = '$newusername' where id = '$id'";
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $prepare = $bdd->prepare($sql);
        $prepare->execute();
        $_SESSION['newusername'] = $_POST['newusername'];
        header('Location:../profile.php?action=joined');
        exit;
    }
}
?>

<html>

<head>
    <title>Modifier son profil</title>
</head>

<body>

<!--login form -->
<div>
    <form  method="POST" action="">
        <div align="center">
            <h2>Modifier son profil</h2>
        </div>
        <div>
            <h3>Modifier vos données</h3>
        </div>
        <div>
            Votre pseudonyme :<br/>
            <input id="username" style="width:200px" type="text" name="newusername">
        </div>
        <!--<div>
            Votre mot de passe :<br/>
            <input id="password" style="width:200px" type="password" name="newpassword">
        </div>
        <div>
            Votre adresse email :<br/>
            <input id="email" style="width:200px" type="email" name="newemail">
        </div>-->
        <br/>
        <div>
            <input type="submit" name="update" value="Mettre à jour">
        </div>
    </form>
</div>
<br/>
<?php
if(isset($errMsg)){
    echo '<div>'.$errMsg.'</div>';
}
?>
</body>

</html>
