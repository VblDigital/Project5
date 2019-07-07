<?php

namespace src\controller\backendController;

use src\controller\Input;
use src\manager\CommentManager;

/**
 * Class AdminCommentController
 * @package src\controller\backendController
 * To manage comments in Admin part
 */
class AdminCommentController
{
    /**
     * @return integer
     * Action after new comment's form submission
     */
    public function submitComment()
    {
        $input = new Input();
        if ($input->post('commentAuthor') && $input->post('commentText') && $input->post('postId')) {
            {
                $author = htmlspecialchars($input->post('commentAuthor'));
                $text = htmlspecialchars($input->post('commentText'));
                $postId = htmlspecialchars($input->post('postId'));
            }

            $commentManager = new CommentManager();
            $commentManager->submitComment($text, $author, $postId);
            return $postId;
        }
    }

    /**
     * @return array
     * Display all the published comments
     */
    public function viewComments()
    {
        $commentManager = new CommentManager();
        $viewcomments = $commentManager->getPublishedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewComments.php'];
    }

    /**
     * @return array
     * Action after new comment's form submission
     */
    public function viewSubmittedComments()
    {
        $commentManager = new CommentManager();
        $viewcomments = $commentManager->getSubmittedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewSubmittedComments.php'];
    }

    /**
     * @return array
     * Action to publish a new submitted comment
     */
    public function approveComment()
    {
        $input = new Input();
        $commentManager = new CommentManager();
        $commentManager->approveComment($input->get('id'));
        $viewcomments = $commentManager->getSubmittedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewSubmittedComments.php'];
    }

    /**
     * @return array
     * Action to delete a published comment
     */
    public function deleteComment()
    {
        $input = new Input();
        $id = $input->get('id');

        $commentManager = new CommentManager();
        $commentManager->deleteComment($id);
        $viewcomments = $commentManager->getPublishedComments();

        return ['dataComments' => $viewcomments, 'view' => './view/comment/viewComments.php'];
    }

    /**
     * @return array
     * Action to delete a submitted comment
     */
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
