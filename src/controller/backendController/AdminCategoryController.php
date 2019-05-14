<?php

namespace src\controller\backendController;

use src\manager\CategoryManager;

class AdminCategoryController
{
    public function viewCategories()
    {
        $categoryManager = new CategoryManager();
        $viewcategories = $categoryManager->getAllCategories();

        return ['dataCategories' => $viewcategories, 'view' => './view/category/viewCategories.php'];
    }

    public function viewCategory()
    {
        $categoryManager = new CategoryManager();
        $viewcategory = $categoryManager->getCategory($_GET['id']);

        return ['dataCategories' => $viewcategory, 'view' => './view/category/modifyCategory.php'];
    }

    public function addCategory()
    {
        if (isset($_POST['categoryName']) && !empty($_POST['categoryName'])) {
            $name = $_POST['categoryName'];

            $categoryManager = new CategoryManager();
            $categoryManager->addCategory($name);
            $modifyCategory = $categoryManager->getAllCategories();

            return ['dataCategories' => $modifyCategory, 'view' => './view/category/viewCategories.php'];
        }
    }

    public function modifyCategory()
    {
        $id = $_GET['id'];
        if (isset($_POST['categoryName']))
        {
            $name = $_POST['categoryName'];
        }

        $categoryManager = new CategoryManager();
        $categoryManager->modifyCategory($id, $name);
        $viewcategories = $categoryManager->getAllCategories();

        return ['dataCategories' => $viewcategories, 'view' => './view/category/viewCategories.php'];
    }

    public function deleteCategory()
    {
        $id = $_GET['id'];

        $categoryManager = new CategoryManager();
        $categoryManager->deleteCategory($id);
        $viewcategories = $categoryManager->getAllCategories();

        return ['dataCategories' => $viewcategories, 'view' => './view/category/viewCategories.php'];
    }
}