<?php


namespace src\controller\frontendController;

use src\manager\CommentManager;
use src\manager\UserManager;

class CommentController
{
    public function submitComment($postId)
    {
        if (isset($_POST['commentAuthor']) && isset($_POST['commentText']) && isset($_POST['postId']))
        {
            $commentAuthor = $_POST['commentAuthor'];
            $commentText = $_POST['commentText'];
            $postId = $_POST['postId'];
        }

        $commentManager = new CommentManager();
        $newComment = $commentManager->submitComment($commentText, $commentAuthor, $postId);

        return $newComment;
    }
}