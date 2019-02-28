<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 26/02/2019
 * Time: 17:01
 */
//to create the objects 'Post'
?>
<html>
<head>
</head>
<body>
    <div style="text-align: center"><h1>Liste des billets</h1></div><br/>
    <!-- Generate all the posts in a variable -->
    <div>
        <?php foreach ($bdd->query('SELECT * FROM post', mesClass\Post::class) as $post): ;
        $id=$post->getCreatedBy();
        $sth = $bdd->prepare_username('SELECT username FROM user WHERE id = ' . $id, 'mesClass\User');
        ?>
    <!-- Display the posts -->
    <h2>
        <?php echo $post->getTitle(); ?>
    </h2>
    <div>
        Publié le <?php echo $post->getCreatedDate(); ?> par <?php echo $sth->getUsername(); ?>
    </div>
    <div style="max-width: 900px">
        <?php
        //create the small extract of post
        echo $post->getChapo(); ?><br />
    </div>
    <div>
        <!-- Link to view all the post -->
        <a href="
            <?php
                $id_url=$post->getId();
                echo 'index.php?p=allpost&id=' . $id_url ?>">Lire la suite</a><br/><br/>
    </div>
    <div><b>
        <?php
        if($post->getUpdatedDate()!="") {
            echo 'Modifié le ' . $post->getUpdatedDate();
        }
        ?>
    </b></div>
    <br/>
    <!-- To separate the posts -->
    __________________________________________________________________________________________________________
    <?php endforeach; ?>
</body>
</html>
