<?php

namespace src\controller\backendController;

use src\manager\UserManager;

class AdminUserController
{
    public function viewAuthor()
    {
        $userManager = new UserManager();
        $viewAuthor = $userManager->getUsers();

        return ['dataAuthor' => $viewAuthor];
    }

    public function viewUsers()
    {
        $userManager = new UserManager();
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    public function viewUser()
    {
        $userManager = new UserManager();
        $viewuser = $userManager->getUser($_GET['id']);

        return ['dataUser' => $viewuser, 'view' => './view/user/modifyUser.php'];
    }

    public function addUser()
    {
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
        }
        $userManager = new UserManager();
        $userManager->addUser($username, $password, $email);
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    public function modifyUser()
    {
        $id = $_GET['id'];
        if (isset($_POST['username']) && isset($_POST['email']))
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
        }

        $userManager = new UserManager();
        $userManager->modifyUser($id, $username, $email);
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    public function modifyUserPass()
    {
        $id = $_GET['id'];
        if (isset($_POST['password']))
        {
            $password = $_POST['password'];
        }

        $userManager = new UserManager();
        $userManager->modifyUserPass($id, $password);
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    public function deleteUser()
    {
        $id = $_GET['id'];

        $userManager = new UserManager();
        $userManager->deleteUser($id);
        $viewUsers= $userManager->getUsers();

        return ['dataUser' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    public function checkUser()
    {
        if (isset($_POST['username']) && isset($_POST['password']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }

        $userManager = new UserManager();
        $checkusers = $userManager->checkUser($username, $password);

        header('Location: /');
    }
}