<?php

namespace src\backendController;

use src\manager\CategoryManager;
use src\model\Category;

class AdminCategoryController
{
    public function viewCategories()
    {
        $categoryManager = new CategoryManager();
        $viewcategories = $categoryManager->getAllCategories();

        return ['data' => $viewcategories, 'view' => './view/category/viewCategories.php'];
    }

    public function viewCategory()
    {
        $categoryManager = new CategoryManager();
        $viewcategory = $categoryManager->getCategory($_GET['id']);

        return ['data' => $viewcategory, 'view' => './view/category/modifyCategory.php'];
    }

    public function addCategory()
    {
        $categoryManager = new CategoryManager();

        require '../../view/category/addCategory.php';
    }

    public function modifyCategory()
    {
        $id = $_GET['id'];
        if (isset($_POST['catName']))
        {
            $name = $_POST['catName'];
        }

        $categoryManager = new CategoryManager();
        $modifiedCategory = $categoryManager->modifyCategory($id, $name);


        return ['data' => $modifiedCategory, 'view' => './view/admin/admin.php'];
    }
}
