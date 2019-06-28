<?php

// to display the error message
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// autoloader installed with Composer
require './vendor/autoload.php';

session_start();

// path to Controllers and Managers
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

// object creation
$adminCategoryController = new AdminCategoryController();
$postController = new PostsController();
$adminController = new AdminController();
$adminPostController = new AdminPostController();
$adminUserController = new AdminUserController();
$adminCommentController = new AdminCommentController();
$commentController = new CommentController();
$contactController = new ContactController();
$input = new Input();
$message = new \src\Message();

try {
    if ($input->get('action') == null && $input->get('p') == null || $input->get('action') && $input->get('p') && $input->get('p') == 'listPosts') {
        // frontend -> display all the posts
        $postController->listPosts();
    } elseif ($input->get('action') == null) {
        if ($input->get('p') == 'post') {
            if ($input->get('id') && $input->get('id') > 0) {
                // frontend -> display one post
                $postController->post();
            } else {
                // frontend -> if no post available
                throw new Exception('Aucun identifiant de billet envoyé ! <br/><a href="index.php">Retour</a>');
            }
        // all the other frontend pages
        } elseif ($input->get('p') == 'profile') {
            require './view/profile/profile.php';
        } elseif ($input->get('p') == 'cv') {
            require './view/profile/cv.php';
        } elseif ($input->get('p') == '404') {
            require './view/404.php';
        } elseif ($input->get('p') == 'product') {
            require './view/profile/product.php';
        } elseif ($input->get('p') == 'contactform') {
            require './view/forms/contactForm.php';
        } elseif ($input->get('p') == 'contact') {
            $contact = $contactController->sendContact();
            require './view/forms/contactForm.php';
        } elseif ($input->get('p') == 'submitcomment') {
            $addCommentData = $adminCommentController->submitComment();
            $message->setMessage('Votre commentaire a été soumis pour validation. Il sera traité dans les meilleurs délais.');
            header('Location:post-' . $addCommentData);
        }
    // to access to the backend
    } elseif ($input->get('action') && $input->get('action') == 'admin') {
        if ($input->get('p') && $input->get('p') == 'checkuser'){
            // login
            $checkUserData = $adminUserController->checkUser();

            $alert = $checkUserData['alert'];
            $view = $checkUserData['view'];
            $adminController->admin($view, null, null, null, null, null, $alert);
        } elseif ($input->get('p') && $input->get('p') == 'passrecovery'){
            $adminController->admin('./view/forms/passRecoveryForm.php', null);
        } elseif (($input->get('p') && $input->get('p') == 'recoveryemail')) {
            $recoveryEmailData = $adminUserController->passRecovery();

            $alert = $recoveryEmailData['alert'];
            $view = $recoveryEmailData['view'];
            $adminController->admin($view, null, null, null, null, null, $alert);
        } elseif ($input->get('p') == null && ($input->session('user') == false) || $input->get('p') && ($input->session('user') == false)) {
            // if the user is not logged
            $adminController->admin('./view/forms/userConnectForm.php', null);
        } elseif ($input->get('p') && $input->session('user')){

            // backend -> Categories

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
                $alert = $addCategoriesData['alert'];
                $view = $addCategoriesData['view'];
                $adminController->admin($view, null, $dataCategories, null, null, null, $alert);

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

            } // backend -> Posts

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
            }

            // backend -> Users

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

            // backend -> Comments

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
        } elseif ($input->get('p') == null && $input->session('user')) {
                $view = 'view/admin/adminMenu.php';
                $adminController->admin($view, null);
        }
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
