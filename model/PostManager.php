<?php

namespace model;

$path = "E:\Project5_blog\Project5\\";
require_once($path . 'model/Manager.php');

class PostManager extends Manager
{
    public function getPosts()
    {
        $bdd = $this->getPDO();
        $req = $bdd->query('SELECT * FROM post ORDER BY created_date DESC');

        return $req;
    }

    public function getPost($postId)
    {
        $bdd = $this->getPDO();
        $req = $bdd->prepare('SELECT * FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}