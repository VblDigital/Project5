<?php

namespace src\manager;

use src\model\Comment;

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $comments = $this->prepare('SELECT * FROM comment WHERE post_id =' . $_GET['id'], Comment::class, true);
        $userManager = new UserManager();
        foreach($comments as $items)
        {
            $items->setUser_Id($userManager->getPostUser($items->getUserId()));
        }

        return $comments;
    }
}