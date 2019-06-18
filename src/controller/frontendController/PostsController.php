<?php

namespace src\controller\frontendController;

use src\controller\Input;
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
        $input = new Input();

        $postManager = new PostManager();
        $post = $postManager->getPost($input->get('id'));

        if ($post == true) {
            $categoriesNames = array();
            foreach ($post->getCategories() as $category) {
                $categoriesNames[] = $category->getName();
            }

            require './view/post/postView.php';
        } else {
            echo "Ce billet n'existe pas ! <br/><a href='index.php'>Retour à la liste des billets</a>" ;
        }
    }
}