<?php


namespace src\controller\frontendController;

use src\manager\CommentManager;
use src\manager\UserManager;

class CommentController
{
    public function submitComment($postId)
    {
        if (isset($_POST['commentAuthor']) && isset($_POST['commentText']))
        {
            $commentAuthor = $_POST['commentAuthor'];
            $commentText = $_POST['commentText'];
        }

        $userManager = new UserManager();
        $user = $userManager->addVisitor($commentAuthor);
        $userId = $user->getId();

        $commentManager = new CommentManager();
        $newComment = $commentManager->submitComment($commentText, $userId, $postId);

        return $newComment;
    }
}