<?php
/**
 * Created by PhpStorm.
 * PostsCategories: VALEBLES
 * Date: 05/03/2019
 * Time: 00:04
 */

// To create the objects Category

namespace model\mesClass;

class Category implements \Countable
{
    private $id;
    private $name;
    private $count = 0;

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
     * @param mixed $name
     */
    public function setName ( $name )
    {
        if(is_string($name)) {
            $this->name = $name;
        }
    }

    /**
     * @param int $count
     */
    public function setCount ( $count )
    {
        $count = (int)$count;
        if ($count > 0) {
            $this->count = $count;
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
    public function getName ()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCount ()
    {
        return $this->count;
    }

    public function count ()
    {
        return ++$this->count;

    }
}