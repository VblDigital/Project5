<?php

namespace src\model;

/**
 * Class PostsCategories
 * @package src\model
 */
class PostsCategories
{
    private $id;
    private $category_id;
    private $post_id;

    /**
     * @param mixed $id
     */
    public function setId ( $id ): void {
        $id = (int)$id;
        if ($id > 0) {
            $this->id = $id;
        }
    }

    /**
     * @param mixed $name
     */
    public function setCategory_id ( $category_id ): void {
        $this->category_id = $category_id;
    }

    /**
     * @param mixed $post_id
     */
    public function setPostId ( $post_id ): void
    {
        $this->post_id = $post_id;
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
    public function getCategoryId ()
    {
        return $this->category_id;
    }

    /**
     * @return mixed
     */
    public function getPostId ()
    {
        return $this->post_id;
    }
}