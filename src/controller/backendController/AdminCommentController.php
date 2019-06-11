<?php


namespace src\controller\backendController;

use src\manager\CommentManager;

class AdminCommentController
{
        public function submitComment()
    {
        if (isset($_POST['commentAuthor']) && ($_POST['commentText']) && ($_POST['postId'])) {
            {
                $author = $_POST['commentAuthor'];
                $text = $_POST['commentText'];
                $postId = $_POST['postId'];
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
        $commentManager = new CommentManager();
        $commentManager->approveComment($_GET['id']);
        $viewcomments = $commentManager->getSubmittedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewSubmittedComments.php'];
    }

    public function deleteComment()
    {
        $id = $_GET['id'];

        $commentManager = new CommentManager();
        $commentManager->deleteComment($id);
        $viewcomments = $commentManager->getPublishedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewComments.php'];
    }

    public function deleteSubmittedComment()
    {
        $id = $_GET['id'];

        $commentManager = new CommentManager();
        $commentManager->deleteComment($id);
        $viewcomments = $commentManager->getSubmittedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewSubmittedComments.php'];
    }
}