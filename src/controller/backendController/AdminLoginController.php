<?php


namespace src\controller\backendController;

use src\manager\LoginManager;

class AdminLoginController
{
    public function userLoggedIn()
    {
        if (isset($_SESSION['username']) AND $_SESSION['username'] == 1) {
            return true;
        }
        return false;
    }

    public function login(){

        $loginManager = new LoginManager();
        $userToLog = $loginManager->userToLog($_POST['username']);

        return ['userToLog' => $userToLog, $userLoggedIn = true];
    }
}