<?php

namespace src\frontendController;

use src\backendController\AdminCategoryController;

class AdminController
{
    public function admin()
    {
        require './view/admin/admin.php';
    }
}