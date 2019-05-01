<?php

namespace src\frontend\controller;

use src\manager\CategoryManager;

class CategoriesController
{
    public function viewCategories()
    {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->getAllCategories();

        require('../../view/admin/viewCategories.php');
    }
}