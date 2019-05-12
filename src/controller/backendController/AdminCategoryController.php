<?php

namespace src\controller\backendController;

use src\manager\CategoryManager;

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
        if (isset($_POST['catName']))
        {
            $name = $_POST['catName'];
        }
        $categoryManager = new CategoryManager();
        $categoryManager->addCategory($name);
        $modifyCategory = $categoryManager->getAllCategories();

        return ['data' => $modifyCategory, 'view' => './view/category/viewCategories.php'];
    }

    public function modifyCategory()
    {
        $id = $_GET['id'];
        if (isset($_POST['catName']))
        {
            $name = $_POST['catName'];
        }

        $categoryManager = new CategoryManager();
        $categoryManager->modifyCategory($id, $name);
        $viewcategories = $categoryManager->getAllCategories();

        return ['data' => $viewcategories, 'view' => './view/category/viewCategories.php'];
    }

    public function deleteCategory()
    {
        $id = $_GET['id'];

        $categoryManager = new CategoryManager();
        $categoryManager->deleteCategory($id);
        $viewcategories = $categoryManager->getAllCategories();

        return ['data' => $viewcategories, 'view' => './view/category/viewCategories.php'];
    }
}