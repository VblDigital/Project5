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

if(empty($_SESSION['username']))
{
    header('Location: connect.php');
}

// we define if the form has been validated
if(isset($_POST['update'])) {

    // we define the variable with the data filled
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

            $sql = "SELECT email FROM user WHERE username = :username, password = :password";
            $query = $bdd->prepare($sql);
            $query->execute();
            $data = $query->fetch();
            $mail = $data['email'];
    }
?>

<html>

<head>
    <title>Modifier son profil</title>
</head>

<body>

<?php
if(isset($errMsg)){
    echo '<div>'.$errMsg.'</div>';
}
?>

<!--login form -->
<div>
    <form  method="POST" action="">
        <div align="center">
            <h2>Modifier son profil</h2>
        </div>
        <div>
            <h3>Vos données personnelles</h3>
        </div>
        <div>
            <table border="1">
                <tr width="350">
                    <th width="150">Votre pseudonyme</th>
                    <td width="200" align="center"><?php echo $_SESSION['username'] ?></td>
                </tr>
                <tr width="350" valign>
                    <th width="150">Votre adresse email</th>
                    <td width="200" align="center">
                        <?php

                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <h3>Modifier vos données</h3>
        </div>
        <div>
            Votre pseudonyme :<br/>
            <input id="username" style="width:200px" type="text" name="username"> *
        </div>
        <div>
            Votre mot de passe :<br/>
            <input id="password" style="width:200px" type="password" name="password"> *
        </div>
        <div>
            Votre adresse email :<br/>
            <input id="email" style="width:200px" type="email" name="email"> *
        </div>
        <br/>
        <div>
            <input type="submit" name="update" value="Mettre à jour">
        </div>
    </form>
</div>
</body>

</html>
