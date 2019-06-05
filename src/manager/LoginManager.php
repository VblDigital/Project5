<?php

namespace src\manager;

class LoginManager extends Manager
{
    public function userToLog($username)
    {
        return $this->prepareObject('SELECT * FROM user WHERE username =' . "' . $username . '", User::class, false);
    }
}