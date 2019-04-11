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
        /** @var Post $post */
        $post = $this->prepare('SELECT * FROM post WHERE id = ' . $postId, Post::class, false);

        $userManager = new UserManager();
        $post->setCreatedBy($userManager->getPostUser($post->getCreatedBy()));

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->getCategories($postId);
        $post->setCategories($categories);

        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($postId);
        $post->setComments($comments);

        return $post;
    }
}
