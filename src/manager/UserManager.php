<?php

namespace src\manager;

use src\model\User;

class UserManager extends Manager
{
    public function getUsers()
    {
        return $this->prepareObject('SELECT * FROM user', User::class, true );
    }

    public function getUser ($userId)
    {
        return $this->prepareObject('SELECT * FROM user WHERE id=' . $userId, User::class, false);
    }

    public function getPostUser($postId)
    {
        return $this->prepareObject('SELECT * FROM user WHERE id =' . $postId, User::class, false);
    }

    public function getCommentUser($commentId)
    {
        return $this->prepareObject('SELECT * FROM user WHERE id =' . $commentId, User::class, false);
    }

    public function addUser($username, $password, $email)
    {
        $this->prepareStmt('INSERT INTO user (username, password, email) VALUES ("'. $username . '", "'. $password . '", "'. $email . '")');
    }

    public function modifyUser($userId, $username, $email)
    {
        $this->prepareStmt('UPDATE user SET username = "' . $username . '", email = "' . $email . '" WHERE id=' . $userId);
        return $this->getUser($userId);
    }

    public function modifyUserPass($userId, $password)
    {
        $this->prepareStmt('UPDATE user SET password = "' . $password . '" WHERE id=' . $userId);
        return $this->getUser($userId);
    }

    public function deleteUser($userId)
    {
        return $this->prepareStmt('DELETE FROM user WHERE id=' . $userId);
    }

    public function addVisitor($commentLogin)
    {
        $this->prepareStmt('INSERT INTO user (username) VALUES ("'. $commentLogin . '")');
        return $this->prepareObject('SELECT * FROM user ORDER BY id DESC LIMIT 1', User::class, false);
    }

}