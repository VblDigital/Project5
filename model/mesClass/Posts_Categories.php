<?php
/**
 * Created by PhpStorm.
 * PostsCategories: VALEBLES
 * Date: 26/02/2019
 * Time: 17:48
 */
// To create the objects Labels

namespace model\mesClass;

class Posts_Categories implements \Countable
{
    private $id;
    private $category_id;
    private $post_id;
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
     * @param mixed $category_id
     */
    public function setCategory_id ( $category_id )
    {
        $category_id = (int)$category_id;
        if ($category_id > 0) {
            $this->category_id = $category_id;
        }
    }

    /**
     * @param mixed $post_id
     */
    public function setPost_id ( $post_id )
    {
        $post_id = (int)$post_id;
        if ($post_id > 0) {
            $this->post_id = $post_id;
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
    public function getCategory_id ()
    {
        return $this->category_id;
    }

    /**
     * @return mixed
     */
    public function getPost_id ()
    {
        return $this->post_id;
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