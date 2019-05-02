<?php

namespace src\backendController;

use src\manager\CategoryManager;

class AdminCategoryController
{
    public function viewCategories()
    {
        $categoryManager = new CategoryManager();
        $viewcategories = $categoryManager->getAllCategories();

        return ['data' => $viewcategories, 'view' => './view/admin/viewCategories.php'];
    }

    public function addCategory()
    {
        $categoryManager = new CategoryManager();

        require '../../view/admin/addCategory.php';
    }

    public function modifyCategory()
    {
        $categoryManager = new CategoryManager();
        $modifycategories = $categoryManager->getCategory();

        require '../../view/admin/modifyCategory.php';
    }
}
