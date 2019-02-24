<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 22/02/2019
 * Time: 22:02
 */

// connection to database
require ('../include/config.php');
// initialization of error message
$errMsg = "";

$titletemp = "";
$texttemp = "";
$categorytemp = "";
$id = $_SESSION['id'];

// we define if the form has been validated
if(isset($_POST['create'])) {

    // we define the variable with the data filled
    $title = $_POST['title'];
    $text = $_POST['text'];
    $category = $_POST['category'];

    // title empty / text either / category not empty
    if($title == '') {
        if(($text == '' || $text !== '') && $category !== ''){
            $errMsg = 'Entrer un titre de billet';
            $titletemp = $title;
        }
    }
    // text empty / title not empty / category empty
    if($text == ''){
        if($title !== '' && $category == ''){
            $errMsg = 'Entrer un texte';
            $texttemp = $text;
        }
        // text empty / title not empty / category not empty
        elseif ($title !== '' && $category !== ''){
            $errMsg = 'Entrer une catégorie';
            $titletemp = $title;
            $categorytemp = $category;
        }
    }
    // if all is filled
    if ($title !== '' && $text !== '' && $category !== '') {
        // we prepare to insert data in BDD
        $query = $bdd->prepare('INSERT INTO post (title, text, created_by) VALUES (:title, :text, :id)');
        $query->execute(array(
            ':title' => $title,
            ':text' => $text,
            ':id' => $id,
        ));
        $query2 = $bdd->prepare('INSERT INTO category (name) VALUES (:category)');
        $query2->execute(array(
                ':category'=>$category
        ));
        header('Location:newpost.php?action=joined');
        exit;
    }
}

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
