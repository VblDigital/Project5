<?php
$user = $bdd->prepare_reference('SELECT * FROM user WHERE id = ' . $post->getCreatedBy(),model\mesClass\User::class);
$postauthor = $user->getUserName();

$posttitle = $post->getTitle();
$postdate = $post->getCreatedDate();
$postchapo = $post->getChapo();
$posturl = $post->getId();
$posttext = $post->getText();
