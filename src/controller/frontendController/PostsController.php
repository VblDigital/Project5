<?php

namespace src\controller\frontendController;

use src\manager\PostManager;

class PostsController
{
    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        require './view/post/postList.php';
    }

    public function post()
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);

        $categoriesNames = array();
        foreach ($post->getCategories() as $category) {
            $categoriesNames[] = $category->getName();
        }
        require './view/post/postView.php';
    }
}