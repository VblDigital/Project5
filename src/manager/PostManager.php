<?php

namespace src\manager;

use src\model\Post;

class PostManager extends Manager
{
    public function getPosts()
    {
        $posts = $this->prepare('SELECT * FROM post order by created_date DESC LIMIT 0, 5', Post::class, true);
        $userManager = new UserManager();
        $categoryManager = new CategoryManager();

        foreach ($posts as $post)
        {
            $post->setCreatedBy($userManager->getPostUser($post->getCreatedBy()));
            $post->setCategories($categoryManager->getCategories($post->getId()));
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
        $post->setCategories($categoryManager->getCategories($postId));

        $commentManager = new CommentManager();
        $post->setComments($commentManager->getComments($postId));

        return $post;
    }
}
