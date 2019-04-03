<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 02/04/2019
 * Time: 23:21
 */

namespace src\manager;

use src\model\Category;

class CategoryManager extends Manager
{
    public function getCategoryId($postid)
    {
        return $this->prepare('SELECT * FROM posts_categories WHERE post_id =' . $postid, Category::class, true);
    }
}