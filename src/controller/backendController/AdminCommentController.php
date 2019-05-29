<?php


namespace src\controller\backendController;

use src\manager\CommentManager;

class AdminCommentController
{
    public function viewComments()
    {
        $commentManager = new CommentManager();
        $viewcomments = $commentManager->getPublishedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewComments.php'];
    }

    public function deleteComment()
    {
        $id = $_GET['id'];

        $commentManager = new CommentManager();
        $commentManager->deleteComment($id);
        $viewcomments = $commentManager->getPublishedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewComments.php'];
    }
}