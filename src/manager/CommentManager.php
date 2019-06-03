<?php

namespace src\manager;

use src\model\Comment;

class CommentManager extends Manager
{
    public function submitComment($commentText, $commentAuthor, $postId)
    {
        $this->prepareStmt('INSERT INTO comment (text, author, post_id) VALUES ("'. $commentText . '", "' . $commentAuthor . '", "'. $postId . '")');
    }

    public function getComments($postId)
    {
        return $this->prepareObject('SELECT * FROM comment WHERE post_id =' . $postId . ' AND published = "1"', Comment::class, true);

    }

    public function approveComment($commentId)
    {
        $this->prepareStmt('update comment SET published = "1" WHERE id = "' . $commentId . '"');
    }

    public function getPublishedComments ()
    {
        return $this->prepareObject('SELECT * FROM comment WHERE published = "1"', Comment::class, true);
    }

    public function getSubmittedComments ()
    {
        return $this->prepareObject('SELECT * FROM comment WHERE published = "0"', Comment::class, true);
    }

    public function deleteComment($commentId)
    {
        return $this->prepareStmt('DELETE FROM comment WHERE id=' . $commentId);
    }
}