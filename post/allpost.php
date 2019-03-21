<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 27/02/2019
 * Time: 13:15
 */
$post = $bdd->prepare('SELECT * FROM post WHERE id = ?', [$_GET['id']], 'mesClass\Post', true);
$id=$post->getCreatedBy();
$sth = $bdd->prepare_username('SELECT username FROM user WHERE id = ' . $id, 'mesClass\User');
?>

<h2>
    <?php echo $post->getTitle(); ?>
</h2>
<div>
    Publié le <?php echo $post->getCreatedDate(); ?> par <?php echo $sth->getUsername(); ?>
</div>
<div style="max-width: 900px">
    <?php
    //create the small extract of post
    echo $post->getText(); ?><br />
</div>
<div><b>
        <?php
        if($post->getUpdatedDate()!="") {
            echo 'Modifié le ' . $post->getUpdatedDate();
        }
        ?>
    </b>
</div>
<div>
    <a href="index.php?p=home">Retour</a>
</div>
<br/>