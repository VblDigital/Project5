<?php

namespace src\manager;

use src\model\Post;
use src\manager\UserManager;

class PostManager extends Manager
{
    public function getPosts()
    {
        $posts = $this->prepare('SELECT * FROM post order by created_date DESC LIMIT 0, 5', Post::class, true);
        $userManager = new UserManager();

        foreach ($posts as $post)
        {
            $post->setCreatedBy($userManager->getUser($post->getCreatedBy()));
        }

        return $posts;
    }
    public function getPost($postId)
    {
        return $this->prepare('SELECT * FROM post WHERE id = ' . $_GET['id'], Post::class, false);
    }
}