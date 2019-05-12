<?php

namespace src\controller\backendController;

class AdminController
{
    public function admin($data, $view)
    {
        require './view/admin/admin.php';
    }
}