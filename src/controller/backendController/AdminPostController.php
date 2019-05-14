<?php

namespace src\controller\backendController;

use src\manager\PostManager;
use src\model\Posts_Categories;

class AdminPostController
{
    public function viewPosts()
    {
        $postManager = new PostManager();
        $viewposts = $postManager->getPosts();

        return ['dataPosts' => $viewposts, 'view' => './view/post/viewPosts.php'];
    }

    public function viewPost()
    {
        $postManager = new PostManager();
        $viewpost = $postManager->getPost($_GET['id']);

        return ['dataPosts' => $viewpost, 'view' => './view/category/modifyPost.php'];
    }

    public function addPost()
    {
        if (isset($_POST['author']) && isset($_POST['title']) && isset($_POST['chapo']) && isset($_POST['text']) && isset($_POST['category']))
        {
            $author = $_POST['author'];
            $title = $_POST['title'];
            $chapo = $_POST['chapo'];
            $text = $_POST['text'];
            $category = $_POST['category'];
        }
        $postManager = new PostManager();
        $postManager->addPost($author, $title, $chapo, $text, $category);
        $viewPosts = $postManager->getPosts();

        return ['dataPosts' => $viewPosts, 'view' => './view/category/viewPosts.php'];
    }

    public function modifyPost()
    {
        $id = $_GET['id'];
        if (isset($_POST['author']) && isset($_POST['title']) && isset($_POST['chapo']) && isset($_POST['text']) && isset($_POST['category']))
        {
            $author = $_POST['author'];
            $title = $_POST['title'];
            $chapo = $_POST['chapo'];
            $text = $_POST['text'];
            $category = $_POST['category'];
        }

        $postManager = new PostManager();
        $postManager->modifyPost($id, $author, $title, $chapo, $text, $category);
        $viewPosts = $postManager->getPosts();

        return ['dataPosts' => $viewPosts, 'view' => './view/post/viewPosts.php'];
    }

    public function deletePost()
    {
        $id = $_GET['id'];

        $postManager = new PostManager();
        $postManager->deletePost($id);
        $viewPosts = $postManager->getPosts();

        return ['dataPosts' => $viewPosts, 'view' => './view/post/viewPosts.php'];
    }
}