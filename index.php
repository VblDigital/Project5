<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 24/01/2019
 * Time: 17:30
 */
?>

<html>

<head>
    <title>Mon blog</title>
</head>

<body>
    <div align="center">
        <?php
            if(isset($errMsg))
            {
                echo '<div>'.$errMsg.'</div>';
            }
            ?>
            <div><b>Mon blog</b></div>
            <br>
            <div>
            <a href="admin/connect.php">Se connecter</a> <br>
            <a href="admin/register.php">S'enregistrer</a><br>
            </div>
    </div>
</body>

</html>