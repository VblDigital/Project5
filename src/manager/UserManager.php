<?php

namespace src\manager;

use src\model\User;

class UserManager extends Manager
{
    public function getUser()
    {
        return $this->prepare('SELECT * FROM user', User::class, true );
    }

    public function getPostUser($postId)
    {
        return $this->prepare('SELECT * FROM user WHERE id =' . $postId, User::class, false);
    }
}