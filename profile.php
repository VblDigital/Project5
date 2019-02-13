<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 05/02/2019
 * Time: 17:57
 */

require 'include/config.php';

if(empty($_SESSION['username']))
{
    header('Location: admin/connect.php');
}

?>

<html>

<head>
    <title>Votre profil</title>
</head>

<body>
<div align="center">

    <?php
    if(isset($errMsg)){
        echo '<div>'.$errMsg.'</div>';
     }
     ?>

    <div>
        Bienvenue <?php echo $_SESSION['username']; ?><br>
        Ceci est le blog de <?php echo $_SESSION['username']; ?><br>
    </div>
    <div>
        <a href="admin/update.php">Modifier son profil</a><br>
        <a href="admin/logout.php">Se deconnecter</a>
    </div>
</div>

</body>
</html>
