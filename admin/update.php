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

if(isset($_SESSION['id']))
{$id = $_SESSION['id'];
}

// we define if the form has been validated

if(isset($_POST['update'])) {
    if($_POST['newusername']){
        $newuser = $_POST['newusername'] ;
    }
    if($_POST['newpassword']){
        $pass = $_POST['newpassword'];
    }
    if($_POST['newemail']){
        $mail = $_POST['newemail'];
    }
    $req = "UPDATE user SET";
    $value = '';
    if (!empty($_POST['newusername'])){
        $value .= " username = '$newuser'";
    }
    if (!empty($_POST['newemail'])){
        if(empty($value)){
            $value .= " email = '$mail'";
        } else {
            $value .= ", email = '$mail'";
        }
    }
    if (!empty($_POST['newpassword'])){
        if(empty($value)){
            $value .= " password = '$pass'";
        } else {
            $value .= ", password = '$pass'";
        }
    }
    $req .= $value . " WHERE id = $id";
    $prepare = $bdd->prepare($req);
    $prepare -> execute(array());
    if(!empty($_POST['newusername']))
        {$_SESSION['newusername'] = $_POST['newusername'];
        }
    if(!empty($_POST['newpassword'])){
        $_SESSION['newpassword'] = $_POST['newpassword'];
        }
    if(!empty($_POST['newemail'])){
        $_SESSION['newemail'] = $_POST['newemail'];
    }
    header('Location:../profile.php?action=joined');
    exit;
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
        <div>
            Votre mot de passe :<br/>
            <input id="password" style="width:200px" type="password" name="newpassword">
        </div>
        <div>
            Votre adresse email :<br/>
            <input id="email" style="width:200px" type="email" name="newemail">
        </div>
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
