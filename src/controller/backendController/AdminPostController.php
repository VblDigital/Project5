<?php

namespace src\controller\backendController;

use src\controller\Input;
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
        $input = new Input();
        $postManager = new PostManager();
        $viewpost = $postManager->getPost($input->get('id'));

        return ['dataPost' => $viewpost, 'view' => './view/post/modifyPost.php'];
    }

    /**
     * @return array
     */
    public function addPost()
    {
        $input = new Input();

        if(isset($_FILES)){
            $fileName = $_FILES['img']['name'];
            $fileTmpName = $_FILES['img']['tmp_name'];
            $imgFolder = './public/img/' . $fileName;
            move_uploaded_file($fileTmpName, $imgFolder);
        }

        if (isset($_POST['author']) && isset($_POST['title']) && isset($_POST['chapo']) && isset($_POST['text']) && isset($_POST['category']) && isset($fileName) && isset($imgFolder))
        {
            $author = $input->post('author');
            $title = $input->post('title');
            $chapo = $input->post('chapo');
            $text = $input->post('text');
            $fileName = $_FILES['img']['name'];
            $imgFolder = './public/img/' . $fileName;
            $category = $input->post('category');
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
        $input = new Input();
        $id = $input->get('id');
        if (isset($_POST['title']) && isset($_POST['chapo']) && isset($_POST['text']) && isset($_POST['category']))
        {
            $title = $input->post('title');
            $chapo = $input->post('chapo');
            $text = $input->post('text');
            $category = $input->post('category');
        }

        $postManager = new PostManager();
        $post = $postManager->modifyPost($id, $title, $chapo, $text);
        $postManager->unlinkPostToCategory($id);
        $postId = $post->getId();
        foreach ($category as $cat)
        {
            $postManager->linkPostToCategory($cat, $postId);
        }

        if($_FILES['img']['size'] > 0) {
            $fileName = $_FILES['img']['name'];
            if (isset($fileName)) {
                $postId = $input->get('id');
                $fileTmpName = $_FILES['img']['tmp_name'];
                $imgFolder = './public/img/' . $fileName;
                move_uploaded_file($fileTmpName, $imgFolder);
                $postManager->addFile($postId, $fileName, $imgFolder);
            }
        }
        $viewPosts = $postManager->getPosts();

        return ['dataPost' => $viewPosts, 'view' => './view/post/viewPosts.php'];
    }

    public function deletePost()
    {
        $input = new Input();
        $id = $input->get('id');

        $postManager = new PostManager();
        $postManager->deletePost($id);
        $postManager->unlinkPostToCategory($id);
        $viewPosts = $postManager->getPosts();

        return ['dataPosts' => $viewPosts, 'view' => './view/post/viewPosts.php'];
    }
}