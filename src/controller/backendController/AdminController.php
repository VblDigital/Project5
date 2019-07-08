<?php

namespace src\controller\backendController;

/**
 * Class AdminController
 * @package src\controller\backendController
 * To manage the display of Admin part
 */
class AdminController
{
    /**
     * @param $view
     * @param array $data
     * @param array $dataCategories
     * @param array $dataPosts
     * @param array $dataUsers
     * @param array $dataComments
     */
    public function admin( $view, $data = [], $dataCategories = [], $dataPosts = [], $dataUsers = [], $dataComments = [])
    {
        require './view/admin/admin.php';
    }
}
