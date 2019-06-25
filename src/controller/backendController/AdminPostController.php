<?php

namespace src\controller\backendController;

use src\controller\Input;
use src\manager\PostManager;

/**
 * Class AdminPostController
 * @package src\controller\backendController
 * To manage posts in Admin part
 */
class AdminPostController
{
    /**
     * @return array
     * Display all the posts
     */
    public function viewPosts()
    {
        $postManager = new PostManager();
        $viewposts = $postManager->getPosts();

        return ['dataPosts' => $viewposts, 'view' => './view/post/viewPosts.php'];
    }

    /**
     * @return array
     * Display one specific post related to the his id
     */
    public function viewPost()
    {
        $input = new Input();
        $postManager = new PostManager();
        $viewpost = $postManager->getPost($input->get('id'));

        return ['dataPost' => $viewpost, 'view' => './view/post/modifyPost.php'];
    }

    /**
     * @return array
     * Action after new post's form submission
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
        if ($input->post('author') && $input->post('title') && $input->post('chapo') && $input->post('text') && $input->post('category') && isset($fileName) && isset($imgFolder))
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

    /**
     * @return array
     * Action after update pots's form submission
     */
    public function modifyPost()
    {
        $input = new Input();
        $id = $input->get('id');
        if ($input->post('title') && $input->post('chapo') && $input->post('text') && $input->post('category'))
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

    /**
     * @return array
     * Delete a post related to the his id
     */
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
