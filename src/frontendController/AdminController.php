<?php

namespace src\frontendController;

use src\backendController\AdminCategoryController;

class AdminController
{
    public function admin()
    {

        if($_GET['p']==='viewCategories')
        {
            $adminCategoryController = new AdminCategoryController();
            $viewCategoriesData = $adminCategoryController->viewCategories();

            $viewCategories = $viewCategoriesData['data'];
            $view =  $viewCategoriesData['view'];
        }
        elseif ($_GET['p']==='addCategory')
        {
            $view = './view/admin/addCategory.php';
        }
        elseif ($_GET['p']==='modifyCategory')
        {
            $view =  './view/admin/modifyCategory.php';
        }



        require './view/admin/admin.php';
    }
}
