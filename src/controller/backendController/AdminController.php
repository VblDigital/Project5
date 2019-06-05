<?php

namespace src\controller\backendController;

class AdminController
{
    public function admin($view, $data = [], $dataCategories = [], $dataPosts = [], $dataUsers = [], $dataComments = [], $userToLog = null)
    {
        require './view/admin/admin.php';
    }
}