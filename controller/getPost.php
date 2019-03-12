<?php
$post = $bdd->query('SELECT * FROM post WHERE id = ' . $_GET['id'], model\mesClass\Post::class);
$user = $bdd->prepare_reference('SELECT * FROM user WHERE id = ' . $post->getCreatedBy(),model\mesClass\User::class);
$postauthor = $user->getUserName();

$posttitle = $post->getTitle();
$postdate = $post->getCreatedDate();
$posturl = $post->getId();
$posttext = $post->getText();


if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('../view/post/postView.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}
