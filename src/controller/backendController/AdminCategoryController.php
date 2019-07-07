<?php

namespace src\controller\backendController;

use src\controller\Input;
use src\manager\CategoryManager;
use src\Message;

/**
 * Class AdminCategoryController
 * @package src\controller\backendController
 * To manage categories in Admin part
 */
class AdminCategoryController
{
    /**
     * @return array
     * Display all the categories
     */
    public function viewCategories()
    {
        $categoryManager = new CategoryManager();
        $viewcategories = $categoryManager->getAllCategories();

        return ['dataCategories' => $viewcategories, 'view' => './view/category/viewCategories.php'];
    }

    /**
     * @return array
     * Display one specific category related to the Post id
     */
    public function viewCategory()
    {
        $input = new Input();
        $categoryManager = new CategoryManager();
        $viewcategory = $categoryManager->getCategory($input->get('id'));

        return ['dataCategories' => $viewcategory, 'view' => './view/category/modifyCategory.php'];
    }

    /**
     * @return array
     * Action after new category's form submission
     */
    public function addCategory()
    {
        $input = new Input();

        if ($input->post('categoryName')) {
            $name = htmlspecialchars($input->post('categoryName'));

            $categoryManager = new CategoryManager();
            $categoryManager->addCategory($name);
            $modifyCategory = $categoryManager->getAllCategories();

            return ['dataCategories' => $modifyCategory, 'alert' => null, 'view' => './view/category/viewCategories.php'];
        } else {
            $message = new Message();
            $alert = $message->setMessage('Le champs ci-dessous ne peut être vide.');
            return ['dataCategories' => null, 'alert' => $alert, 'view' => './view/category/addCategory.php'];
        }
    }

    /**
     * @return array
     * Action after update category's form submission
     */
    public function modifyCategory()
    {
        $input = new Input();
        $id = $input->get('id');

        if ($input->post('categoryName')) {
            $name = htmlspecialchars($input->post('categoryName'));

            $categoryManager = new CategoryManager();
            $categoryManager->modifyCategory($id, $name);
            $viewcategories = $categoryManager->getAllCategories();

            return ['dataCategories' => $viewcategories, 'alert' => null, 'view' => './view/category/viewCategories.php'];
        } else {
            $message = new Message();
            $alert = $message->setMessage('Le champs ci-dessous ne peut être vide.');

            $categoryManager = new CategoryManager();
            $viewcategory = $categoryManager->getCategory($input->get('id'));

            return ['dataCategories' => $viewcategory, 'alert' => $alert, 'view' => './view/category/modifyCategory.php'];
        }
    }

    /**
     * @return array
     * Delete one specific category related to the Post id
     */
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
