<?php

namespace src\controller\backendController;

use src\controller\Input;
use src\manager\CategoryManager;
use src\manager\PostManager;
use src\manager\UserManager;
use src\Message;

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
        // if an image has been uploaded, we create the file and path, after a size and a extension check
        $input = new Input();
        if($input->files('img')['size'] > 0){
            $fileName = $input->files('img')['name'];
            //check of extension and size
            $authorizedExtensions = array("jpg", "png", "gif", "jpeg", "JPG", "PNG", "GIF", "JPEG");
            $extension = basename($input->files('img')['type']);
            $authorizedSize = 1000000;
            $size = $input->files('img')['size'];
            if (in_array($extension, $authorizedExtensions) && $size <= $authorizedSize) {
                $newname = md5($fileName);
                $fileTmpName = $input->files('img')['tmp_name'];
                $imgFolder = './public/img/' . $newname;
                move_uploaded_file($fileTmpName, $imgFolder);
            } else {
                $message = new Message();
                $message->setMessage('Ce format n\'est pas un format d\'image accepté');

                $dataPosts = null;
                $adminController = new AdminController();

                $categoryManager = new CategoryManager();
                $dataCategories = $categoryManager->getAllCategories();

                $userManager = new UserManager();
                $dataUsers = $userManager->getUsers();

                $view = './view/post/addPost.php';

                $adminController->admin($view, null, $dataCategories, null, $dataUsers);
                exit;
            }
        }
        //if all the fields have been filled
        if ($input->post('author') && $input->post('title') && $input->post('chapo') &&
            $input->post('text') && $input->post('category') && isset($newname) && isset($imgFolder))
        {
            $author = htmlspecialchars($input->post('author'));
            $title = htmlspecialchars($input->post('title'));
            $chapo = htmlspecialchars($input->post('chapo'));
            $text = htmlspecialchars($input->post('text'));
            $fileName = ($input->files('img')['name']);
            $newname = md5($fileName);
            $imgFolder = './public/img/' . $newname;
            $category = $input->post('category');
        } elseif ($input->post('title') == null || $input->post('chapo') == null ||
            $input->post('text') == null || $input->post('category')== null) {
            // if all the fields have not been filled
            $message = new Message();
            $message->setMessage('Tous les champs n\'ont pas été complétés');

            $dataPosts = null;
            $adminController = new AdminController();

            $categoryManager = new CategoryManager();
            $dataCategories = $categoryManager->getAllCategories();

            $userManager = new UserManager();
            $dataUsers = $userManager->getUsers();

            $view = './view/post/addPost.php';

            $adminController->admin($view, null, $dataCategories, null, $dataUsers);
            exit;
        } elseif ($input->post('author') && $input->post('title') && $input->post('chapo') &&
            $input->post('text') && $input->post('category') && !isset($newname) || !isset($imgFolder)) {
            // if all the fileds have been filled but no image is uploaded
            $author = htmlspecialchars($input->post('author'));
            $title = htmlspecialchars($input->post('title'));
            $chapo = htmlspecialchars($input->post('chapo'));
            $text = htmlspecialchars($input->post('text'));
            $category = $input->post('category');
            $newname = null;
            $imgFolder = null;
        }
        $postManager = new PostManager();
        $post = $postManager->addPost($author, $title, $chapo, $text, $newname, $imgFolder, $category);
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
            //check of extension and size
            $authorizedExtensions = array("jpg", "png", "gif", "jpeg", "JPG", "PNG", "GIF", "JPEG");
            $extension = basename($_FILES['img']['type']);
            $authorizedSize = 10000000;
            $size = $_FILES['img']['size'];
            if (in_array($extension, $authorizedExtensions) && $size <= $authorizedSize) {
                $newname = md5($fileName);
                $fileTmpName = $_FILES['img']['tmp_name'];
                $imgFolder = './public/img/' . $newname;
                move_uploaded_file($fileTmpName, $imgFolder);
                $postManager->addFile($postId, $newname, $imgFolder);
            } else {
                $message = new Message();
                $message->setMessage('Ce format n\'est pas un format d\'image accepté');
                $dataPosts = null;
                $adminController = new AdminController();
                $categoryManager = new CategoryManager();
                $dataCategories = $categoryManager->getAllCategories();
                $userManager = new UserManager();
                $dataUsers = $userManager->getUsers();
                $view = './view/post/addPost.php';
                $adminController->admin($view, null, $dataCategories, null, $dataUsers);
                exit;
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
