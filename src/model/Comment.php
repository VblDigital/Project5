<?php

namespace src\model;

/**
 * Class Comment
 * @package src\model
 */
class Comment{
    private $id;
    private $text;
    private $date;
    private $author;
    private $post_id;
    private $published;

    /**
     * @param mixed $id
     */
    public function setId ( $id ) {
        $id = (int) $id;
        if($id>0) {
            $this->id = $id;
        }
    }

    /**
     * @param $text
     */
    public function setText ( $text )
    {
        if(is_string($text)) {
            $this->text = $text;
        }
    }

    /**
     * @param $date
     */
    public function setDate ( $date )
    {
        if($date = date($date)) {
            $this->date = $date;
        }
    }

    /**
     * @param $author
     */
    public function setAuthor ( $author )
    {
            $this->author = $author;
    }

    /**
     * @param $post_id
     */
    public function setPost_Id ( $post_id )
    {
        $post_id = (int)$post_id;
        if ($post_id > 0) {
            $this->post_id = $post_id;
        }
    }

    /**
     * @param $published
     */
    public function setPublished( $published )
    {
        $this->published = $published;
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
    public function getAuthor ()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getPostId ()
    {
        return $this->post_id;
    }

    /**
     * @return mixed
     */
    public function getPublished ()
    {
        return $this->published;
    }
}