<?php

namespace src\manager;

use src\model\Comment;

class CommentManager extends Manager
{
    public function getComment($postid)
    {
        return $this->prepare('SELECT * FROM comment WHERE post_id =' . $postid, Comment::class, true);
    }
}