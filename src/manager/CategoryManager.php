<?php

namespace src\manager;

use src\model\Category;
use src\model\Posts_Categories;

class CategoryManager extends Manager
{
    public function getAllCategories ()
    {
        return $this->prepareObject('SELECT * FROM category', Category::class, true);
    }

    public function getCategory ($catId)
    {
        return $this->prepareObject('SELECT * FROM category WHERE id=' . $catId, Category::class, false);
    }

    public function getCategories ( $postId )
    {
        $PostsCategories = $this->prepareObject('SELECT * FROM posts_categories WHERE post_id =' . $postId, Posts_Categories::class, true);
        $categories = [];
        foreach ($PostsCategories as $PostsCategory)
        {
            $category = $this->prepareObject('SELECT * FROM category WHERE id =' . $PostsCategory->getCategoryId(), Category::class, false);
            $categories[] = $category;
        }
        return $categories;
    }

    public function modifyCategory($catId, $name)
    {
        return $this->prepareStmt('UPDATE category SET name = "' . $name . '" WHERE id=' . $catId);
    }

    public function addCategory($name)
    {
        return $this->prepareStmt('INSERT INTO category (name) VALUES ("'. $name . '")');
    }

    public function deleteCategory($catId)
    {
        return $this->prepareStmt('DELETE FROM category WHERE id=' . $catId);
    }
}