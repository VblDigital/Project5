<?php

namespace src\manager;

use src\model\Category;
use src\model\Posts_Categories;

class CategoryManager extends Manager
{
    public function getCategories ( $postId )
    {
        $linkPostsCategories = $this->prepare('SELECT * FROM posts_categories WHERE post_id =' . $postId, Posts_Categories::class, true);
        $categories = [];
        foreach ($linkPostsCategories as $linkPostsCategorie) {
            $category = $this->prepare('SELECT * FROM category WHERE id =' . $linkPostsCategorie->getCategoryId(), Category::class, false);
            $categories[] = $category;
        }

        return $categories;
    }
}
