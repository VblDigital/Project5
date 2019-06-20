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
use \src\controller\backendController\AdminCommentController;
use \src\controller\frontendController\CommentController;
use \src\controller\frontendController\ContactController;
use \src\controller\Input;
use Mailgun\Mailgun;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$adminCategoryController = new AdminCategoryController();
$postController = new PostsController();
$adminController = new AdminController();
$adminPostController = new AdminPostController();
$adminUserController = new AdminUserController();
$adminCommentController = new AdminCommentController();
$commentController = new CommentController();
$contactController = new ContactController();
$input = new Input();

try {
    if (!isset($_GET['action']) && !isset($_GET['p']) || !isset($_GET['action']) && isset($_GET['p']) && $input->get('p') == 'listPosts') {
        $postController->listPosts();
    } elseif (!isset($_GET['action'])) {
        if ($input->get('p') == 'post') {
            if (isset($_GET['id']) && $input->get('id') > 0) {
                $postController->post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé ! <br/><a href="index.php">Retour</a>');
            }
        } elseif ($input->get('p') == 'profile') {
            require './view/profile/profile.php';
        } elseif ($input->get('p') == 'cv') {
            require './view/profile/cv.php';
        } elseif ($input->get('p') == 'product') {
            require'./view/profile/product.php';
        } elseif ($input->get('p') == 'contactform') {
            require'./view/forms/contactForm.php';
        } elseif ($input->get('p') == 'contact') {
            $contact = $contactController->sendContact();
        } elseif ($input->get('p') == 'submitcomment') {
            $addCommentData = $adminCommentController->submitComment();
            $textResult = "Votre message a été soumis pour approbation";
            header('Location:post-' . $addCommentData . '-' . $textResult);
        }
    } elseif (isset($_GET['action']) && $input->get('action') == 'admin') {
        if (isset($_GET['p']) && $input->get('p') == 'check-user'){

            $adminUserController->checkUser();
        }

        if (!isset($_GET['p']) && ($input->session('user') == false) || isset($_GET['p']) && ($input->session('user') == false)) {
            $adminController->admin('./view/forms/userConnectForm.php', null);
        } elseif (isset($_GET['p']) && $input->session('user')){

            // Category

            if ($input->get('p') === 'viewCategories') {
                $viewCategoriesData = $adminCategoryController->viewCategories();

                $dataCategories = $viewCategoriesData['dataCategories'];
                $view = $viewCategoriesData['view'];
                $adminController->admin($view, null, $dataCategories);

            } elseif ($input->get('p') === 'addCategoryForm') {
                $dataCategories = null;
                $view = './view/category/addCategory.php';
                $adminController->admin($view, null, $dataCategories);

            } elseif ($input->get('p') === 'addCategory') {
                $addCategoriesData = $adminCategoryController->addCategory();

                $dataCategories = $addCategoriesData['dataCategories'];
                $view = $addCategoriesData['view'];
                $adminController->admin($view, null, $dataCategories);

            } elseif ($input->get('p') === 'modifyCategoryForm') {
                $viewCategoryData = $adminCategoryController->viewCategory();

                $dataCategories = $viewCategoryData['dataCategories'];
                $view = $viewCategoryData['view'];
                $adminController->admin($view, null, $dataCategories);

            } elseif ($input->get('p') === 'modifyCategory') {
                $modifyCategoryData = $adminCategoryController->modifyCategory();

                $dataCategories = $modifyCategoryData['dataCategories'];
                $view = $modifyCategoryData['view'];
                $adminController->admin($view, null, $dataCategories);

            } elseif ($input->get('p') === 'deleteCategory') {
                $deleteCategoriesData = $adminCategoryController->deleteCategory();

                $dataCategories = $deleteCategoriesData['dataCategories'];
                $view = $deleteCategoriesData['view'];
                $adminController->admin($view, null, $dataCategories);

            } //Post

            elseif ($input->get('p') === 'viewPosts') {

                $viewPostsData = $adminPostController->viewPosts();
                $dataPosts = $viewPostsData['dataPosts'];

                $view = $viewPostsData['view'];
                $adminController->admin($view, null, null, $dataPosts);

            } elseif ($input->get('p') === 'addPostForm') {
                $dataPosts = null;

                $categoryManager = new CategoryManager();
                $dataCategories = $categoryManager->getAllCategories();

                $userManager = new UserManager();
                $dataUsers = $userManager->getUsers();

                $view = './view/post/addPost.php';

                $adminController->admin($view, null, $dataCategories, null, $dataUsers);

            } elseif ($input->get('p') === 'addPost') {
                $addPostData = $adminPostController->addPost();

                $dataPosts = $addPostData['dataPosts'];
                $view = $addPostData['view'];
                $adminController->admin($view, null, null, $dataPosts);

            } elseif ($input->get('p') === 'modifyPostForm') {
                $viewPostData = $adminPostController->viewPost();

                $viewCategoriesData = $adminCategoryController->viewCategories();
                $dataCategories = $viewCategoriesData['dataCategories'];

                $dataPost = $viewPostData['dataPost'];
                $view = $viewPostData['view'];
                $adminController->admin($view, null, $dataCategories, $dataPost);

            } elseif ($input->get('p') === 'modifyPost') {
                $modifyPostData = $adminPostController->modifyPost();

                $viewCategoryData = $adminCategoryController->viewCategory();
                $dataCategories = $viewCategoryData['dataCategories'];

                $dataPost = $modifyPostData['dataPost'];
                $view = $modifyPostData['view'];
                $adminController->admin($view, null, $dataCategories, $dataPost);

            } elseif ($input->get('p') === 'deletePost') {
                $deletePostData = $adminPostController->deletePost();

                $dataPosts = $deletePostData['dataPosts'];
                $view = $deletePostData['view'];
                $adminController->admin($view, null, null, $dataPosts);
            } //User

            elseif ($input->get('p') === 'viewUsers') {
                $viewUsersData = $adminUserController->viewUsers();

                $dataUsers = $viewUsersData['dataUsers'];
                $view = $viewUsersData['view'];
                $adminController->admin($view, null, null, null, $dataUsers);

            } elseif ($input->get('p') === 'addUserForm') {
                $dataUsers = null;
                $view = './view/user/addUser.php';
                $adminController->admin($view, null, null, null, $dataUsers);

            } elseif ($input->get('p') === 'addUser') {
                $addUserData = $adminUserController->addUser();

                $dataUsers = $addUserData['dataUsers'];
                $view = $addUserData['view'];
                $adminController->admin($view, null, null, null, $dataUsers);

            } elseif ($input->get('p') === 'modifyUserForm') {
                $viewUserData = $adminUserController->viewUser();

                $dataUsers = $viewUserData['dataUser'];
                $view = $viewUserData['view'];
                $adminController->admin($view, null, null, null, $dataUsers);

            } elseif ($input->get('p') === 'modifyUser') {
                $modifyUserData = $adminUserController->modifyUser();

                $dataUsers = $modifyUserData['dataUsers'];
                $view = $modifyUserData['view'];
                $adminController->admin($view, null, null, null, $dataUsers);

            } elseif ($input->get('p') === 'modifyUserPass') {
                $modifyUserData = $adminUserController->modifyUserPass();

                $dataUsers = $modifyUserData['dataUsers'];
                $view = $modifyUserData['view'];
                $adminController->admin($view, null, null, null, $dataUsers);

            } elseif ($input->get('p') === 'deleteUser') {
                $deleteUserData = $adminUserController->deleteUser();

                $dataUser = $deleteUserData['dataUser'];
                $view = $deleteUserData['view'];
                $adminController->admin($view, null, null, null, $dataUser);

            }

            //Comments

            elseif ($input->get('p') === 'viewComments') {
                $viewCommentsData = $adminCommentController->viewComments();

                $dataComments = $viewCommentsData['dataComments'];
                $view = $viewCommentsData['view'];
                $adminController->admin($view, null, null, null, null, $dataComments);

            } elseif ($input->get('p') === 'viewSubmittedComments') {
                $viewCommentsData = $adminCommentController->viewSubmittedComments();

                $dataComments = $viewCommentsData['dataComments'];
                $view = $viewCommentsData['view'];
                $adminController->admin($view, null, null, null, null, $dataComments);

            } elseif ($input->get('p') === 'approveComment') {
                $viewCommentsData = $adminCommentController->approveComment();

                $dataComments = $viewCommentsData['dataComments'];
                $view = $viewCommentsData['view'];
                $adminController->admin($view, null, null, null, null, $dataComments);

            } elseif ($input->get('p') === 'deleteComment') {
                $deleteCommentData = $adminCommentController->deleteComment();

                $dataComments = $deleteCommentData['dataComments'];
                $view = $deleteCommentData['view'];
                $adminController->admin($view, null, null, null, null, $dataComments);

            } elseif ($input->get('p') === 'deleteSubmittedComment') {
                $deleteCommentData = $adminCommentController->deleteSubmittedComment();

                $dataComments = $deleteCommentData['dataComments'];
                $view = $deleteCommentData['view'];
                $adminController->admin($view, null, null, null, null, $dataComments);

            } elseif ($input->get('p') === 'userlogout'){
                $_SESSION['user']=false;
                $adminController->admin('./view/forms/userConnectForm.php', null);

            }
        } elseif (!isset($_GET['p']) && $input->session('user')) {
                $view = 'view/admin/adminMenu.php';
                $adminController->admin($view, null);
        }
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}