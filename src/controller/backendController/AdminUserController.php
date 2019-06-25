<?php

namespace src\controller\backendController;

use src\controller\Input;
use src\manager\UserManager;
use src\Message;

/**
 * Class AdminUserController
 * @package src\controller\backendController
 * To manage users in Admin part
 */
class AdminUserController
{
    /**
     * @return array
     * Display all the users
     */
    public function viewUsers()
    {
        $userManager = new UserManager();
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    /**
     * @return array
     * Display one specific user
     */
    public function viewUser()
    {
        $input = new Input();
        $userManager = new UserManager();
        $viewuser = $userManager->getUser($input->get('id'));

        return ['dataUser' => $viewuser, 'view' => './view/user/modifyUser.php'];
    }

    /**
     * @return array
     * Action after new user's form submission
     */
    public function addUser()
    {
        $input = new Input();
        if ($input->post('username') && $input->post('password') && $input->post('email'))
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

    /**
     * @return array
     * Action after update user's form submission excepted password
     */
    public function modifyUser()
    {
        $input = new Input();
        $id = $input->get('id');
        if ($input->post('username') && $input->post('email'))
        {
            $username = $input->post('username');
            $email = $input->post('email');
        }

        $userManager = new UserManager();
        $userManager->modifyUser($id, $username, $email);
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    /**
     * @return array
     * Action after update user's form submission - only password
     */
    public function modifyUserPass()
    {
        $input = new Input();
        $id = $input->get('id');

        if ($input->post('password'))
        {
            $password = $input->post('password');
        }

        $userManager = new UserManager();
        $userManager->modifyUserPass($id, $password);
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    /**
     * @return array
     * Delete one specific user related to the id
     */
    public function deleteUser()
    {
        $input = new Input();
        $id = $input->get('id');

        $userManager = new UserManager();
        $userManager->deleteUser($id);
        $viewUsers= $userManager->getUsers();

        return ['dataUser' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    /**
     * @return array
     * Action after login user's form submission
     */
    public function checkUser()
    {
        $input = new Input();
        if ($input->post('username') && $input->post('password'))
        {
            $username = $input->post('username');
            $password = $input->post('password');

            $userManager = new UserManager();
            $userManager->checkUser($username, $password);
            if ($_SESSION['user'] == false)
            {
                $message = new Message();
                $alert = $message->setMessage('L\'identifiant et/ou le mot de passe est incorrect.');
                return ['dataCategories' => null, 'alert' => $alert, 'view' => './view/admin/admin.php'];
            }

            header('Location: /admin');
        } else {
            $message = new Message();
            $alert = $message->setMessage('Les champs ci-dessous ne peuvent être vide.');
            return ['dataCategories' => null, 'alert' => $alert, 'view' => './view/admin/admin.php'];
        }
    }
}
