<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './vendor/autoload.php';

use src\controller\backendController\AdminCategoryController;
use \src\controller\frontendController\PostsController;
use \src\controller\backendController\AdminController;
use \src\controller\backendController\AdminPostController;
use \src\controller\backendController\AdminUserController;
use src\manager\CategoryManager;
use src\manager\UserManager;

$postController = new PostsController();
$adminCategoryController = new AdminCategoryController();
$adminController = new AdminController();
$adminPostController = new AdminPostController();
$adminUserController = new AdminUserController();

try {
    if (!isset($_GET['action'])) {
        $postController->listPosts();
    } else {
        if ($_GET['action'] == 'posts') {
            if ($_GET['p'] == 'listPosts') {
                $postController->listPosts();
            } elseif ($_GET['p'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $postController->post();
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé ! <br/><a href="index.php">Retour</a>');
                }
            }
        } elseif ($_GET['action'] == 'admin') {
            $data = null;

            if (!isset($_GET['p'])) {
                $adminController->admin($data, './view/admin/adminMenu.php');
            } else {

                // Category

                if ($_GET['p'] === 'viewCategories') {
                    $viewCategoriesData = $adminCategoryController->viewCategories();

                    $dataCategories = $viewCategoriesData['dataCategories'];
                    $view = $viewCategoriesData['view'];
                    $adminController->adminCategories($dataCategories, $view);

                } elseif ($_GET['p'] === 'addCategoryForm') {
                    $dataCategories = null;
                    $view = './view/category/addCategory.php';
                    $adminController->adminCategories($dataCategories, $view);

                } elseif ($_GET['p'] === 'addCategory') {
                    $addCategoriesData = $adminCategoryController->addCategory();

                    $dataCategories = $addCategoriesData['dataCategories'];
                    $view = $addCategoriesData['view'];
                    $adminController->adminCategories($dataCategories, $view);

                } elseif ($_GET['p'] === 'modifyCategoryForm') {
                    $viewCategoryData = $adminCategoryController->viewCategory();

                    $dataCategories = $viewCategoryData['dataCategories'];
                    $view = $viewCategoryData['view'];
                    $adminController->adminCategories($dataCategories, $view);

                } elseif ($_GET['p'] === 'modifyCategory') {
                    $modifyCategoryData = $adminCategoryController->modifyCategory();

                    $dataCategories = $modifyCategoryData['dataCategories'];
                    $view = $modifyCategoryData['view'];
                    $adminController->adminCategories($dataCategories, $view);

                } elseif ($_GET['p'] === 'deleteCategory') {
                    $deleteCategoriesData = $adminCategoryController->deleteCategory();

                    $dataCategories = $deleteCategoriesData['dataCategories'];
                    $view = $deleteCategoriesData['view'];
                    $adminController->adminCategories($dataCategories, $view);

                }
                //Post
                //
                elseif ($_GET['p'] === 'viewPosts') {

                    $viewPostsData = $adminPostController->viewPosts();
                    $dataPosts = $viewPostsData['dataPosts'];

                    $view = $viewPostsData['view'];
                    $adminController->adminPost($dataPosts, $view);

                } elseif ($_GET['p'] === 'addPostForm') {

                    $categoryManager = new CategoryManager();
                    $dataCategories = $categoryManager->getAllCategories();

                    $userManager = new UserManager();
                    $dataUsers = $userManager->getUsers();

                    $view = './view/post/addPost.php';

                    $adminController->adminPostDisplay($dataUsers, $dataCategories, $view);

                } elseif ($_GET['p'] === 'addPost') {
                    $addPostData = $adminPostController->addPost();

                    $dataPosts = $addPostData['dataPosts'];
                    $view = $addPostData['view'];
                    $adminController->adminPost($dataPosts, $view);

                } elseif ($_GET['p'] === 'deletePost') {
                    $deletePostData = $adminPostController->deletePost();

                    $dataPosts = $deletePostData['dataPosts'];
                    $view = $deletePostData['view'];
                    $adminController->adminPost($dataPosts, $view);
                }
                //User
                //
                elseif ($_GET['p'] === 'viewUsers')
                {
                    $viewUsersData = $adminUserController->viewUsers();

                    $data = $viewUsersData['data'];
                    $view = $viewUsersData['view'];
                    $adminController->admin($data, $view);
                }
            }
        }
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}