<?php

namespace src\manager;

use src\model\Comment;

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $comments = $this->prepare('SELECT * FROM comment WHERE post_id =' . $postId, Comment::class, true);
        $userManager = new UserManager();
        foreach($comments as $comment)
        {
            $comment->setUser_Id($userManager->getPostUser($comment->getUserId()));
        }

        return $comments;
    }
}