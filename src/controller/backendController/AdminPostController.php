<?php

namespace src\controller\backendController;

use src\manager\PostManager;

class AdminPostController
{
    public function viewPosts()
    {
        $postManager = new PostManager();
        $viewposts = $postManager->getPosts();

        return ['data' => $viewposts, 'view' => './view/post/viewPosts.php'];
    }

    public function viewPost()
    {
        $postManager = new PostManager();
        $viewpost = $postManager->getPost($_GET['id']);

        return ['data' => $viewpost, 'view' => './view/category/modifyPost.php'];
    }

    public function addPost()
    {
        if (isset($_POST['postDate']))
        {
            $name = $_POST['postDate'];
        }
        $postManager = new CategoryManager();
        $postManager->addPost($name);
        $modifyCategory = $categoryManager->getAllCategories();

        return ['data' => $modifyCategory, 'view' => './view/category/viewCategories.php'];
    }

    public function modifyPost()
    {
        $id = $_GET['id'];
        if (isset($_POST['catName']))
        {
            $name = $_POST['catName'];
        }

        $categoryManager = new CategoryManager();
        $categoryManager->modifyCategory($id, $name);
        $viewcategories = $categoryManager->getAllCategories();

        return ['data' => $viewcategories, 'view' => './view/category/viewCategories.php'];
    }

    public function deleteCategory()
    {
        $id = $_GET['id'];

        $categoryManager = new CategoryManager();
        $categoryManager->deleteCategory($id);
        $viewcategories = $categoryManager->getAllCategories();

        return ['data' => $viewcategories, 'view' => './view/category/viewCategories.php'];
    }
}