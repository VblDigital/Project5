<?php

$path = "E:\Project5_blog\Project5\\";
require ($path . 'controller/autoloader.php');
require_once($path . '/model/PostManager.php');

function listPosts()
{
    $postManager = new model\PostManager();
    $post = $postManager->getPosts();

    $path = "E:\Project5_blog\Project5\\";
    require($path . 'view/post/postList.php');
}

function post()
{
    $postManager = new \model\PostManager();

    $post = $postManager->getPost($_GET['id']);

    $path = "E:\Project5_blog\Project5\\";
    require($path . 'view/post/postView.php');
}