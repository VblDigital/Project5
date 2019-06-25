<?php

namespace src\controller\frontendController;

use src\controller\Input;
use src\manager\PostManager;

/**
 * Class PostsController
 * @package src\controller\frontendController
 * To display the posts on the homepage
 */
class PostsController
{
    /**
     * @return array
     * Display all the posts on frontend
     */
    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        require './view/post/postList.php';
    }

    /**
     * @return array
     * Display one specific post on frontend
     */
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
