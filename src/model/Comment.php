<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 01/04/2019
 * Time: 20:34
 */

namespace src\model;

class Comment{
    private $id;
    private $text;
    private $date;
    private $user_id;
    private $post_id;

    /**
     * @param mixed $id
     */
    public function setId ( $id ) {
        $id = (int) $id;
        if($id>0) {
            $this->id = $id;
        }
    }

    public function setText ( $text )
    {
        if(is_string($text)) {
            $this->text = $text;
        }
    }

    public function setDate ( $date )
    {
        if($date = date($date)) {
            $this->date = $date;
        }
    }

    public function setUser_Id ( $user_id )
    {
        $user_id = (int)$user_id;
        if ($user_id > 0) {
            $this->user_id = $user_id;
        }
    }

    public function setPost_Id ( $post_id )
    {
        $post_id = (int)$post_id;
        if ($post_id > 0) {
            $this->post_id = $post_id;
        }
    }

    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getText ()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getDate ()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getUserId ()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getPostId ()
    {
        return $this->post_id;
    }
}