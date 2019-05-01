<?php

namespace src\manager;

use src\model\Category;
use src\model\Posts_Categories;

class CategoryManager extends Manager
{
    public function getAllCategories ()
    {
        return $category = $this->prepare('SELECT * FROM category', Category::class, true);
    }

    public function getCategory ($catId)
    {
        return $category = $this->prepare('SELECT * FROM category WHERE id=' . $catId, Category::class, false);
    }

    public function getCategories ( $postId )
    {
        $PostsCategories = $this->prepare('SELECT * FROM posts_categories WHERE post_id =' . $postId, Posts_Categories::class, true);
        $categories = [];
        foreach ($PostsCategories as $PostsCategory)
        {
            $category = $this->prepare('SELECT * FROM category WHERE id =' . $PostsCategory->getCategoryId(), Category::class, false);
            $categories[] = $category;
        }
        return $categories;
    }

    public function addCategory()
    {

    }
}