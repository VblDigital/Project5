<?php

namespace src\controller\backendController;

use src\manager\PostManager;

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

        return ['dataPost' => $viewpost, 'view' => './view/post/modifyPost.php'];
    }

    /**
     * @return array
     */
    public function addPost()
    {
        if(isset($_FILES)){
            $fileName = $_FILES['img']['name'];
            $fileTmpName = $_FILES['img']['tmp_name'];
            $imgFolder = './public/img/' . $fileName;
            move_uploaded_file($fileTmpName, $imgFolder);
        }

        if (isset($_POST['author']) && isset($_POST['title']) && isset($_POST['chapo']) && isset($_POST['text']) && isset($_POST['category']) && isset($fileName) && isset($imgFolder))
        {
            $author = $_POST['author'];
            $title = $_POST['title'];
            $chapo = $_POST['chapo'];
            $text = $_POST['text'];
            $fileName = $_FILES['img']['name'];
            $imgFolder = './public/img/' . $fileName;
            $category = $_POST['category'];
        }
        $postManager = new PostManager();
        $post = $postManager->addPost($author, $title, $chapo, $text, $fileName, $imgFolder, $category);
        $postId = $post->getId();
        foreach ($category as $cat)
        {
            $postManager->linkPostToCategory($cat, $postId);
        }
        $viewPosts = $postManager->getPosts();

        return ['dataPosts' => $viewPosts, 'view' => './view/post/viewPosts.php'];
    }

    public function modifyPost()
    {
        $id = $_GET['id'];
        if (isset($_POST['title']) && isset($_POST['chapo']) && isset($_POST['text']) && isset($_POST['category']))
        {
            $title = $_POST['title'];
            $chapo = $_POST['chapo'];
            $text = $_POST['text'];
            $category = $_POST['category'];
        }

        $postManager = new PostManager();
        $post = $postManager->modifyPost($id, $title, $chapo, $text);
        $postManager->unlinkPostToCategory($id);
        $postId = $post->getId();
        foreach ($category as $cat)
        {
            $postManager->linkPostToCategory($cat, $postId);
        }

        $fileName = $_FILES['img']['name'];
        if(isset($fileName)){
            $postId = $_GET['id'];
            $fileTmpName = $_FILES['img']['tmp_name'];
            $imgFolder = './public/img/' . $fileName;
            move_uploaded_file($fileTmpName, $imgFolder);
            $postManager->addFile($postId, $fileName, $imgFolder);
        }

        $viewPosts = $postManager->getPosts();

        return ['dataPost' => $viewPosts, 'view' => './view/post/viewPosts.php'];
    }

    public function deletePost()
    {
        $id = $_GET['id'];

        $postManager = new PostManager();
        $postManager->deletePost($id);
        $postManager->unlinkPostToCategory($id);
        $viewPosts = $postManager->getPosts();

        return ['dataPosts' => $viewPosts, 'view' => './view/post/viewPosts.php'];
    }
}