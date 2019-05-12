<?php

use src\controller\backendController\AdminCategoryController;
use \src\controller\frontendController\PostsController;
use \src\controller\backendController\AdminController;
use \src\controller\backendController\AdminPostController;

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './vendor/autoload.php';

$postController = new PostsController();
$adminCategoryController = new AdminCategoryController();
$adminController = new AdminController();
$adminPostController = new AdminPostController();

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
                if ($_GET['p'] === 'viewCategories') {
                    $viewCategoriesData = $adminCategoryController->viewCategories();

                    $data = $viewCategoriesData['data'];
                    $view = $viewCategoriesData['view'];
                    $adminController->admin($data, $view);

                } elseif ($_GET['p'] === 'addCategoryForm') {
                    $data = null;
                    $view = './view/category/addCategory.php';
                    $adminController->admin($data, $view);

                } elseif ($_GET['p'] === 'addCategory') {
                    $addCategoriesData = $adminCategoryController->addCategory();

                    $data = $addCategoriesData['data'];
                    $view = $addCategoriesData['view'];
                    $adminController->admin($data, $view);

                } elseif ($_GET['p'] === 'modifyCategoryForm') {
                    $viewCategoryData = $adminCategoryController->viewCategory();

                    $data = $viewCategoryData['data'];
                    $view = $viewCategoryData['view'];
                    $adminController->admin($data, $view);

                } elseif ($_GET['p'] === 'modifyCategory') {
                    $modifyCategoryData = $adminCategoryController->modifyCategory();

                    $data = $modifyCategoryData['data'];
                    $view = $modifyCategoryData['view'];
                    $adminController->admin($data, $view);

                } elseif ($_GET['p'] === 'deleteCategory') {
                    $deleteCategoriesData = $adminCategoryController->deleteCategory();

                    $data = $deleteCategoriesData['data'];
                    $view = $deleteCategoriesData['view'];
                    $adminController->admin($data, $view);

                } elseif ($_GET['p'] === 'viewPost') {
                    $viewPostsData = $adminPostController->viewPosts();

                    $data = $viewPostsData['data'];
                    $view = $viewPostsData['view'];
                    $adminController->admin($data, $view);
                }
            }
        }
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
function view()
{

}