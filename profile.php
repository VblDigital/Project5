<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 05/02/2019
 * Time: 17:57
 */

// connection to database
require ('include/config.php');
// initialization of error message
$errMsg = "";

if(empty($_SESSION['username']))
{
    header('Location: admin/connect.php');
}

$username = $_SESSION['username'];
$id = $_SESSION['id'];
print_r($_SESSION);
$email = "";

// we prepare data
$query = $bdd -> prepare("SELECT id, email FROM user WHERE username = '$_SESSION[username]'");
$array = array(
    'id' => $id,
    'email' => $email
);
$query->execute($array);
$data = $query->fetch();
$id = $data['id'];
$email = $data['email'];


if(isset($_POST['modify']) && isset($id)) {
    header('Location:admin/update.php');
    exit;
}

?>

<html>

<head>
    <title>Votre profil</title>
</head>

<body>
<div>

    <?php
    if(isset($errMsg)){
        echo '<div>'.$errMsg.'</div>';
     }
     ?>

    <div  align="center">
        <b>Bienvenue <strong><?php
                                if(isset($_SESSION['newusername'])){echo $_SESSION['newusername'];}
                                else {echo $_SESSION['username'];} ?>
                    </strong></b><br>
        Ceci est le blog de <?php
                            if(isset($_SESSION['newusername'])){echo $_SESSION['newusername'];}
                            else {echo $_SESSION['username'];} ?>
        <br>
    </div>
    <div>
        <h3>Vos données personnelles</h3>
    </div>
    <div>
        <table border="1">
            <tr width="350">
                <th width="150">Votre pseudonyme</th>
                <td width="200"><?php
                                if(isset($_SESSION['newusername'])){echo $_SESSION['newusername'];}
                                else {echo $_SESSION['username'];} ?>
                </td>
            </tr>
            <tr width="350">
                <th width="150">Votre adresse email</th>
                <td width="200"><?php echo $email; ?>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <br/>
        <a href="admin/update.php" name="modify">Modifier son profil</a><br>
        <a href="admin/logout.php">Se deconnecter</a>
    </div>

</div>

</body>
</html>