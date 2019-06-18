<?php

namespace src\controller\backendController;

use src\controller\Input;
use src\manager\CategoryManager;
use src\manager\PostManager;


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
        $input = new Input();
        $categoryManager = new CategoryManager();
        $viewcategory = $categoryManager->getCategory($input->get('id'));

        return ['dataCategories' => $viewcategory, 'view' => './view/category/modifyCategory.php'];
    }

    public function addCategory()
    {
        $input = new Input();
        if (isset($_POST['categoryName']) && !empty($_POST['categoryName'])) {
            $name = $input->post('categoryName');

            $categoryManager = new CategoryManager();
            $categoryManager->addCategory($name);
            $modifyCategory = $categoryManager->getAllCategories();

            return ['dataCategories' => $modifyCategory, 'view' => './view/category/viewCategories.php'];
        }
    }

    public function modifyCategory()
    {
        $input = new Input();
        $id = $input->get('id');

        if (isset($_POST['categoryName']))
        {
            $name = $input->post('categoryName');
        }

        $categoryManager = new CategoryManager();
        $categoryManager->modifyCategory($id, $name);
        $viewcategories = $categoryManager->getAllCategories();

        return ['dataCategories' => $viewcategories, 'view' => './view/category/viewCategories.php'];
    }

    public function deleteCategory()
    {
        $input = new Input();
        $id = $input->get('id');

        $categoryManager = new CategoryManager();
        $categoryManager->deleteCategory($id);
        $viewcategories = $categoryManager->getAllCategories();

        return ['dataCategories' => $viewcategories, 'view' => './view/category/viewCategories.php'];
    }
}