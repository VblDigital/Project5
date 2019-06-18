<?php

namespace src\controller\frontendController;

use src\controller\Input;
use src\manager\CommentManager;

class CommentController
{
    public function submitComment($postId)
    {
        $input = new Input();

        if (isset($_POST['commentAuthor']) && isset($_POST['commentText']) && isset($_POST['postId']))
        {
            $commentAuthor = $input->post('commentAuthor');
            $commentText = $input->post('commentText');
            $postId = $input->post('postId');
        }

        $commentManager = new CommentManager();
        $newComment = $commentManager->submitComment($commentText, $commentAuthor, $postId);

        return $newComment;
    }
}