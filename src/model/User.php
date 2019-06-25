<?php

namespace src\model;

/**
 * Class User
 * @package src\model
 */
class User
{
    private $id;
    private $username;
    private $password;
    private $email;
    /**
     * @param mixed $id
     * @return int
     */
    public function setId ( $id ) {
        $id = (int) $id;
        if($id>0) {
            $this->id = $id;
        }
    }
    /**
     * @param mixed $username
     * @return string
     */
    public function setUsername ( $username ) {
        if(is_string($username)) {
            $this->username = $username;
        }
    }
    /**
     * @param mixed $password
     * @return string
     */
    public function setPassword ( $password ) {
        if(is_string($password)) {
            $this->password = $password;
        }
    }
    /**
     * @param mixed $email
     * @return string
     */
    public function setEmail ( $email ) {
        if(is_string($email)) {
            $this->email = $email;
        }
    }
    /**
     * @return mixed
     */
    public function getId () {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getUsername () {
        return $this->username;
    }
    /**
     * @return mixed
     */
    public function getPassword () {
        return $this->password;
    }
    /**
     * @return mixed
     */
    public function getEmail () {
        return $this->email;
    }
}
