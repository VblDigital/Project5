<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './vendor/autoload.php';

session_start();

use src\controller\backendController\AdminCategoryController;
use \src\controller\frontendController\PostsController;
use \src\controller\backendController\AdminController;
use \src\controller\backendController\AdminPostController;
use \src\controller\backendController\AdminUserController;
use src\manager\CategoryManager;
use src\manager\UserManager;
use \src\controller\frontendController\CommentController;
use \src\controller\backendController\AdminCommentController;
use \src\controller\backendController\AdminLoginController;

$postController = new PostsController();
$adminCategoryController = new AdminCategoryController();
$adminController = new AdminController();
$adminPostController = new AdminPostController();
$adminUserController = new AdminUserController();
$adminCommentController = new AdminCommentController();
$commentController = new CommentController();
$adminLoginController = new AdminLoginController();


try {
    if (!isset($_GET['action']) && !isset($_GET['p']) || !isset($_GET['action']) && isset($_GET['p']) && $_GET['p'] == 'listPosts') {
        $postController->listPosts();
    } elseif (!isset($_GET['action']) && $_GET['p'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $postController->post();
        } else {
            throw new Exception('Aucun identifiant de billet envoyé ! <br/><a href="index.php">Retour</a>');
        }

    } elseif (!isset($_GET['action']) && $_GET['p'] == 'submitcomment') {
        $addCommentData = $adminCommentController->submitComment();
        $textResult = "Votre message a été soumis pour approbation";
        header('Location:post-' . $addCommentData . '-' . $textResult);

    } elseif (isset($_GET['action']) && $_GET['action'] == 'admin') {
        if (isset($_GET['p']) && $_GET['p'] == 'check-user'){

            $adminUserController->checkUser();
        }

        if (!isset($_GET['p']) && ($_SESSION['user'] == false) || isset($_GET['p']) && ($_SESSION['user'] == false)) {
            $adminController->admin('./view/user/userConnectForm.php', null);
        } elseif (isset($_GET['p']) && $_SESSION['user']){

            // Category

            if ($_GET['p'] === 'viewCategories') {
                $viewCategoriesData = $adminCategoryController->viewCategories();

                $dataCategories = $viewCategoriesData['dataCategories'];
                $view = $viewCategoriesData['view'];
                $adminController->admin($view, null, $dataCategories);

            } elseif ($_GET['p'] === 'addCategoryForm') {
                $dataCategories = null;
                $view = './view/category/addCategory.php';
                $adminController->admin($view, null, $dataCategories);

            } elseif ($_GET['p'] === 'addCategory') {
                $addCategoriesData = $adminCategoryController->addCategory();

                $dataCategories = $addCategoriesData['dataCategories'];
                $view = $addCategoriesData['view'];
                $adminController->admin($view, null, $dataCategories);

            } elseif ($_GET['p'] === 'modifyCategoryForm') {
                $viewCategoryData = $adminCategoryController->viewCategory();

                $dataCategories = $viewCategoryData['dataCategories'];
                $view = $viewCategoryData['view'];
                $adminController->admin($view, null, $dataCategories);

            } elseif ($_GET['p'] === 'modifyCategory') {
                $modifyCategoryData = $adminCategoryController->modifyCategory();

                $dataCategories = $modifyCategoryData['dataCategories'];
                $view = $modifyCategoryData['view'];
                $adminController->admin($view, null, $dataCategories);

            } elseif ($_GET['p'] === 'deleteCategory') {
                $deleteCategoriesData = $adminCategoryController->deleteCategory();

                $dataCategories = $deleteCategoriesData['dataCategories'];
                $view = $deleteCategoriesData['view'];
                $adminController->admin($view, null, $dataCategories);

            } //Post

            elseif ($_GET['p'] === 'viewPosts') {

                $viewPostsData = $adminPostController->viewPosts();
                $dataPosts = $viewPostsData['dataPosts'];

                $view = $viewPostsData['view'];
                $adminController->admin($view, null, null, $dataPosts);

            } elseif ($_GET['p'] === 'addPostForm') {
                $dataPosts = null;

                $categoryManager = new CategoryManager();
                $dataCategories = $categoryManager->getAllCategories();

                $userManager = new UserManager();
                $dataUsers = $userManager->getUsers();

                $view = './view/post/addPost.php';

                $adminController->admin($view, null, $dataCategories, null, $dataUsers);

            } elseif ($_GET['p'] === 'addPost') {
                $addPostData = $adminPostController->addPost();

                $dataPosts = $addPostData['dataPosts'];
                $view = $addPostData['view'];
                $adminController->admin($view, null, null, $dataPosts);

            } elseif ($_GET['p'] === 'modifyPostForm') {
                $viewPostData = $adminPostController->viewPost();

                $viewCategoriesData = $adminCategoryController->viewCategories();
                $dataCategories = $viewCategoriesData['dataCategories'];

                $dataPost = $viewPostData['dataPost'];
                $view = $viewPostData['view'];
                $adminController->admin($view, null, $dataCategories, $dataPost);

            } elseif ($_GET['p'] === 'modifyPost') {
                $modifyPostData = $adminPostController->modifyPost();

                $viewCategoryData = $adminCategoryController->viewCategory();
                $dataCategories = $viewCategoryData['dataCategories'];

                $dataPost = $modifyPostData['dataPost'];
                $view = $modifyPostData['view'];
                $adminController->admin($view, null, $dataCategories, $dataPost);

            } elseif ($_GET['p'] === 'deletePost') {
                $deletePostData = $adminPostController->deletePost();

                $dataPosts = $deletePostData['dataPosts'];
                $view = $deletePostData['view'];
                $adminController->admin($view, null, null, $dataPosts);
            } //User

            elseif ($_GET['p'] === 'viewUsers') {
                $viewUsersData = $adminUserController->viewUsers();

                $dataUsers = $viewUsersData['dataUsers'];
                $view = $viewUsersData['view'];
                $adminController->admin($view, null, null, null, $dataUsers);

            } elseif ($_GET['p'] === 'addUserForm') {
                $dataUsers = null;
                $view = './view/user/addUser.php';
                $adminController->admin($view, null, null, null, $dataUsers);

            } elseif ($_GET['p'] === 'addUser') {
                $addUserData = $adminUserController->addUser();

                $dataUsers = $addUserData['dataUsers'];
                $view = $addUserData['view'];
                $adminController->admin($view, null, null, null, $dataUsers);

            } elseif ($_GET['p'] === 'modifyUserForm') {
                $viewUserData = $adminUserController->viewUser();

                $dataUsers = $viewUserData['dataUser'];
                $view = $viewUserData['view'];
                $adminController->admin($view, null, null, null, $dataUsers);

            } elseif ($_GET['p'] === 'modifyUser') {
                $modifyUserData = $adminUserController->modifyUser();

                $dataUsers = $modifyUserData['dataUsers'];
                $view = $modifyUserData['view'];
                $adminController->admin($view, null, null, null, $dataUsers);

            } elseif ($_GET['p'] === 'modifyUserPass') {
                $modifyUserData = $adminUserController->modifyUserPass();

                $dataUsers = $modifyUserData['dataUsers'];
                $view = $modifyUserData['view'];
                $adminController->admin($view, null, null, null, $dataUsers);

            } elseif ($_GET['p'] === 'deleteUser') {
                $deleteUserData = $adminUserController->deleteUser();

                $dataUser = $deleteUserData['dataUser'];
                $view = $deleteUserData['view'];
                $adminController->admin($view, null, null, null, $dataUser);

            }

            //Comments

            elseif ($_GET['p'] === 'viewComments') {
                $viewCommentsData = $adminCommentController->viewComments();

                $dataComments = $viewCommentsData['dataComments'];
                $view = $viewCommentsData['view'];
                $adminController->admin($view, null, null, null, null, $dataComments);

            } elseif ($_GET['p'] === 'viewSubmittedComments') {
                $viewCommentsData = $adminCommentController->viewSubmittedComments();

                $dataComments = $viewCommentsData['dataComments'];
                $view = $viewCommentsData['view'];
                $adminController->admin($view, null, null, null, null, $dataComments);

            } elseif ($_GET['p'] === 'approveComment') {
                $viewCommentsData = $adminCommentController->approveComment();

                $dataComments = $viewCommentsData['dataComments'];
                $view = $viewCommentsData['view'];
                $adminController->admin($view, null, null, null, null, $dataComments);

            } elseif ($_GET['p'] === 'deleteComment') {
                $deleteCommentData = $adminCommentController->deleteComment();

                $dataComments = $deleteCommentData['dataComments'];
                $view = $deleteCommentData['view'];
                $adminController->admin($view, null, null, null, null, $dataComments);

            } elseif ($_GET['p'] === 'deleteSubmittedComment') {
                $deleteCommentData = $adminCommentController->deleteSubmittedComment();

                $dataComments = $deleteCommentData['dataComments'];
                $view = $deleteCommentData['view'];
                $adminController->admin($view, null, null, null, null, $dataComments);

            } elseif ($_GET['p'] === 'userlogout'){
                $_SESSION['user']=false;
                $adminController->admin('./view/user/userConnectForm.php', null);

            }
        } elseif (!isset($_GET['p']) && $_SESSION['user']) {
                $view = 'view/admin/adminMenu.php';
                $adminController->admin($view, null);
        }
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}