<?php

namespace src\controller\backendController;

use src\controller\Input;
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
        $input = new Input();
        $userManager = new UserManager();
        $viewuser = $userManager->getUser($input->get('id'));

        return ['dataUser' => $viewuser, 'view' => './view/user/modifyUser.php'];
    }

    public function addUser()
    {
        $input = new Input();
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))
        {
            $username = $input->post('username');
            $password = $input->post('password');
            $email = $input->post('email');
        }
        $userManager = new UserManager();
        $userManager->addUser($username, $password, $email);
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    public function modifyUser()
    {
        $input = new Input();
        $id = $input->get('id');
        if (isset($_POST['username']) && isset($_POST['email']))
        {
            $username = $input->post('username');
            $email = $input->post('email');
        }

        $userManager = new UserManager();
        $userManager->modifyUser($id, $username, $email);
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    public function modifyUserPass()
    {
        $input = new Input();
        $id = $input->get('id');

        if (isset($_POST['password']))
        {
            $password = $input->post('password');
        }

        $userManager = new UserManager();
        $userManager->modifyUserPass($id, $password);
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    public function deleteUser()
    {
        $input = new Input();
        $id = $input->get('id');

        $userManager = new UserManager();
        $userManager->deleteUser($id);
        $viewUsers= $userManager->getUsers();

        return ['dataUser' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    public function checkUser()
    {
        $input = new Input();
        if (isset($_POST['username']) && isset($_POST['password']))
        {
            $username = $input->post('username');
            $password = $input->post('password');
        }

        $userManager = new UserManager();
        $checkusers = $userManager->checkUser($username, $password);

        header('Location: /admin');
    }
}