<?php

namespace src\manager;

use src\model\Comment;

/**
 * Class CommentManager with sql requests related to comments
 * @package src\manager
 */
class CommentManager extends Manager
{
    /**
     * @param $commentText
     * @param $commentAuthor
     * @param $postId
     */
    public function submitComment( $commentText, $commentAuthor, $postId)
    {
        $this->prepareStmt('INSERT INTO comment (text, author, post_id) VALUES ("'. $commentText . '", "' . $commentAuthor . '", "'. $postId . '")');
    }

    /**
     * @param $postId
     * @return array|mixed
     */
    public function getComments( $postId)
    {
        return $this->prepareObject('SELECT * FROM comment WHERE post_id =' . $postId . ' AND published = "1"', Comment::class, true);

    }

    /**
     * @param $commentId
     */
    public function approveComment( $commentId)
    {
        $this->prepareStmt('update comment SET published = "1" WHERE id = "' . $commentId . '"');
    }

    /**
     * @return array|mixed
     */
    public function getPublishedComments ()
    {
        return $this->prepareObject('SELECT * FROM comment WHERE published = "1"', Comment::class, true);
    }

    /**
     * @return array|mixed
     */
    public function getSubmittedComments ()
    {
        return $this->prepareObject('SELECT * FROM comment WHERE published = "0"', Comment::class, true);
    }

    /**
     * @param $commentId
     */
    public function deleteComment( $commentId)
    {
        return $this->prepareStmt('DELETE FROM comment WHERE id=' . $commentId);
    }
}
