<?php

namespace src\controller\backendController;

use src\controller\Input;
use src\manager\CommentManager;

class AdminCommentController
{
    public function submitComment()
    {
        $input = new Input();
        if (isset($_POST['commentAuthor']) && ($_POST['commentText']) && ($_POST['postId'])) {
            {
                $author = $input->post('commentAuthor');
                $text = $input->post('commentText');
                $postId = $input->post('postId');
            }

            $commentManager = new CommentManager();
            $commentManager->submitComment($text, $author, $postId);
            return $postId;
        }
    }

    public function viewComments()
    {
        $commentManager = new CommentManager();
        $viewcomments = $commentManager->getPublishedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewComments.php'];
    }

    public function viewSubmittedComments()
    {
        $commentManager = new CommentManager();
        $viewcomments = $commentManager->getSubmittedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewSubmittedComments.php'];
    }

    public function approveComment()
    {
        $input = new Input();
        $commentManager = new CommentManager();
        $commentManager->approveComment($input->get('id'));
        $viewcomments = $commentManager->getSubmittedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewSubmittedComments.php'];
    }

    public function deleteComment()
    {
        $input = new Input();
        $id = $input->get('id');

        $commentManager = new CommentManager();
        $commentManager->deleteComment($id);
        $viewcomments = $commentManager->getPublishedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewComments.php'];
    }

    public function deleteSubmittedComment()
    {
        $input = new Input();
        $id = $input->get('id');

        $commentManager = new CommentManager();
        $commentManager->deleteComment($id);
        $viewcomments = $commentManager->getSubmittedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewSubmittedComments.php'];
    }
}