<?php

namespace src\manager;

use src\model\Category;
use src\model\Post;

class PostManager extends Manager
{
    public function getPosts()
    {
        $posts = $this->prepare('SELECT * FROM post order by created_date DESC LIMIT 0, 5', Post::class, true);
        $userManager = new UserManager();

        foreach ($posts as $post)
        {
            $post->setCreatedBy($userManager->getPostUser($post->getCreatedBy()));
        }

        return $posts;
    }
    public function getPost($postId)
    {
        $post = $this->prepare('SELECT * FROM post WHERE id = ' . $_GET['id'], Post::class, false);

        $userManager = new UserManager();
        $post->setCreatedBy($userManager->getPostUser($post->getCreatedBy()));

        $categoryManager = new CategoryManager();
        $category = $categoryManager->getCategories($_GET['id']);
        $post->setCategories($category);

        return $post;
    }
}
