<?php

namespace src\manager;

use src\model\Category;
use src\model\Posts_Categories;

class CategoryManager extends Manager
{
    public function getCategories ( $postId )
    {
        $categoriesId = $this->prepare('SELECT * FROM posts_categories WHERE post_id =' . $postId, Posts_Categories::class, true);
        foreach ($categoriesId as $categories)
        {
            $categoriesName = $this->prepare('SELECT * FROM category WHERE id =' . $categories->getCategoryId(), Category::class, false);
            $categories->setCategory_Id($categoriesName->getName());
        }

        return $categoriesId;
    }
}
