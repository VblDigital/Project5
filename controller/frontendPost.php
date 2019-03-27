<?php

require ('./model/PostManager.php');
require ('./model/UserManager.php');

function listPosts()
{
    $postManager = new model\PostManager();
    $posts = $postManager->getPosts();

    require ('./view/post/postList.php');
}

function post()
{
    $postManager = new \model\PostManager();
    $post = $postManager->getPost($_GET['id']);

    require('./view/post/postView.php');
}