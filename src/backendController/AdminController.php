<?php

namespace src\backendController;

class AdminController
{
    public function url()
    {
        if(isset($_GET['p']))
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
                $view = './view/category/addCategory.php';
            }
            elseif ($_GET['p']==='modifyCategoryForm')
            {
                $adminCategoryController = new AdminCategoryController();
                $viewCategoryData = $adminCategoryController->viewCategory();

                $viewCategory = $viewCategoryData['data'];
                $view =  $viewCategoryData['view'];
            }
            elseif ($_GET['p']==='modifyCategory')
            {
                $adminCategoryController = new AdminCategoryController();
                $modifyCategoryData = $adminCategoryController->modifyCategory();

                $modifyCategory = $modifyCategoryData['data'];
                $view =  $modifyCategoryData['view'];
           }
        }
        elseif (!isset($_GET['p']))
        {
            $view = './view/admin/adminMenu.php';
        }

        require './view/admin/admin.php';
    }
}
