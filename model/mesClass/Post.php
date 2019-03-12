<?php
/**
 * Created by PhpStorm.
 * PostsCategories: VALEBLES
 * Date: 26/02/2019
 * Time: 17:48
 */
// To create the objects Posts

namespace model\mesClass;

class Post {
    private $id;
    private $title;
    private $text;
    private $chapo;
    private $created_date;
    private $created_by;
    private $updated_date;
    private $updated_by;

    /**
     * @param mixed $id
     * @return void
     */
    public function setId ( $id )
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->id = $id;
        }
    }

    /**
     * @param mixed $title
     */
    public function setTitle ( $title )
    {
        if(is_string($title)) {
            $this->title = $title;
        }
    }

    /**
     * @param mixed $chapo
     */
    public function setChapo ( $chapo )
    {
        if(is_string($chapo)) {
            $this->chapo = $chapo;
        }
    }

    /**
     * @param mixed $text
     */
    public function setText ( $text )
    {
        if(is_string($text)) {
            $this->text = $text;
        }

    }

    /**
     * @param mixed $created_date
     */
    public function setCreatedDate ( $created_date )
    {
        if($created_date = date($created_date)) {
            $this->created_date = $created_date;
        }
    }

    /**
     * @param mixed $created_by
     */
    public function setCreatedBy ( $created_by )
    {
        if(is_string($created_by)) {
            $this->created_by = $created_by;
        }
    }

    /**
     * @param mixed $updated_date
     */
    public function setUpdatedDate ( $updated_date )
    {
        if($updated_date = date($updated_date)) {
            $this->updated_date = $updated_date;
        }
    }

    /**
     * @param mixed $updated_by
     */
    public function setUpdatedBy ( $updated_by )
    {
        if(is_string($updated_by)) {
            $this->updated_by = $updated_by;
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
    public function getTitle ()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getChapo ()
    {
        return $this->chapo;
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
    public function getCreatedDate ()
    {
        return $this->created_date;
    }

    /**
     * @return mixed
     */

    public function getCreatedBy ()
    {
        return $this->created_by;
    }

    /**
     * @return mixed
     */
    public function getUpdatedDate ()
    {
        return $this->updated_date;
    }

    /**
     * @return mixed
     */
    public function getUpdatedBy ()
    {
        return $this->updated_by;
    }
}