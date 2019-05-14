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
}