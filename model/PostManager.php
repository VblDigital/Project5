<?php

namespace model;
require_once ("Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $req = $this->prepare_all('SELECT * FROM post order by created_date DESC LIMIT 0, 5', Post::class);

        return $req;
    }

    public function getPost($postId)
    {
        $req = $this->prepare_single('SELECT * FROM post WHERE id = ' . $_GET['id'], Post::class);

        return $req;
    }

    public function getAuthor()
    {
        $req = $this->prepare_all('SELECT created_by FROM user WHERE id = ?', User::class);

        return $req;
    }
}