<?php

namespace src\manager;

use src\model\Category;
use src\model\PostsCategories;

/**
 * Class CategoryManager with sql requests related to categories
 * @package src\manager
 */

class CategoryManager extends Manager
{
    /**
     * @return array|mixed
     */
    public function getAllCategories ()
    {
        return $this->prepareObject('SELECT * FROM category', Category::class, true);
    }

    /**
     * @param $catId
     * @return array|mixed
     */
    public function getCategory ($catId)
    {
        return $this->prepareObject('SELECT * FROM category WHERE id= :catId', Category::class,
            false, [':catId' => $catId]);
    }

    /**
     * @param $postId
     * @return array
     */
    public function getCategories ($postId)
    {
        $PostsCategories = $this->prepareObject('SELECT * FROM posts_categories WHERE post_id = :postId',
            PostsCategories::class, true, [':postId' => $postId]);
        $categories = [];
        foreach ($PostsCategories as $PostsCategory)
        {
            $catId = $PostsCategory->getCategoryId();
            $category = $this->prepareObject('SELECT * FROM category WHERE id = :catId',
                Category::class, false, [':catId' => $catId]);
            $categories[] = $category;
        }
        return $categories;
    }

    /**
     * @param $catId
     * @param $name
     */
    public function modifyCategory($catId, $name)
    {
        return $this->prepareStmt('UPDATE category SET name = :name WHERE id= :catId', [':name' => $name, ':catId' => $catId]);
    }

    /**
     * @param $name
     */
    public function addCategory($name)
    {
        return $this->prepareStmt('INSERT INTO category (name) VALUES (:name)', [':name' => $name]);
    }

    /**
     * @param $catId
     */
    public function deleteCategory($catId)
    {
        try{
            return $this->prepareStmt('DELETE FROM category WHERE id= :catId', [':catId' => $catId]);
        }
        catch (\PDOException $e) {
            $erreur = explode(':', $e->getMessage());
            if ($erreur[2] == 1451) {
                echo $errorMessage = "Cette catégorie est utilisée par un(plusieurs) billet(s) actif(s),
                 elle ne peut être supprimée !";
            }
        }
    }
}
