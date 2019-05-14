<?php

namespace src\controller\backendController;

class AdminController
{
    public function admin($data, $view)
    {
        require './view/admin/admin.php';
    }

    public function adminCategories($dataCategories, $view)
    {
        require './view/admin/admin.php';
    }

    public function adminPost($dataPosts, $view)
    {
        require './view/admin/admin.php';
    }

    public function adminPostDisplay($dataUsers, $dataCategories, $view)
    {
        require './view/admin/admin.php';
    }
}