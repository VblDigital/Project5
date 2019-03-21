<?php
session_start();
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 22/02/2019
 * Time: 22:02
 */

// connection to database
require '..\mesClass\Autoloader.php';
\App\Autoloader::register();
$bdd = new App\Database('project5_bdd');

$pdo->exec("INSERT INTO post SET title, text, created_by VALUES ()");
?>

<html>

<head>
    <title>Nouveau billet</title>
</head>

<body>

<!--login form -->
<div>
    <form  method="POST" action="">
        <div align="center">
            <h2>Créer un nouveau billet</h2>
        </div>
        <div>
            Titre :
            <input id="title" style="width:800px" type="text" name="title"> *
        </div>
        <br/>
        <div>
            Texte :
            <input id="text" style="width:800px; height:300px" type="text" name="text"> *
        </div>
        <div>
            Catégorie :
            <input id="category" style="width:800px" type="category" name="category"> *
        </div>
        <br/>
        Les champs suivis d'une * sont obligatoires<br/>
        <br/>
        <div>
            <input type="submit" name="create" value="Créer">
        </div>
        <br>
        <strong>
            <?php
            if(isset($errMsg)){
                echo '<div>'.$errMsg.'</div>';
            }
            ?>
        </strong><br>
    </form>
</div>
</body>

</html>
