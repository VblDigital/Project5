<?php

namespace src\controller\backendController;

class AdminController
{
    public function admin($view, $data = [], $dataCategories = [], $dataPosts = [], $dataUsers = [], $dataComments = [])
    {
        require './view/admin/admin.php';
    }
}