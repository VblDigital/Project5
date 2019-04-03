<?php

namespace src\manager;

use src\model\User;

class UserManager extends Manager
{
    public function getUser($postid)
    {
        return $this->prepare('SELECT * FROM user WHERE id =' . $postid, User::class, false);
    }
}