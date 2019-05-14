<?php

namespace src\manager;

use src\model\User;

class UserManager extends Manager
{
    public function getUsers()
    {
        return $this->prepareObject('SELECT * FROM user', User::class, true );
    }

    public function getPostUser($postId)
    {
        return $this->prepareObject('SELECT * FROM user WHERE id =' . $postId, User::class, false);
    }
}