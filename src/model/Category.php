<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 02/04/2019
 * Time: 23:17
 */

namespace src\model;


class Category
{
    private $id;
    private $category_id;
    private $post_id;

    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId ( $id ): void
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->id = $id;
        }
    }

    /**
     * @return mixed
     */
    public function getCategoryId ()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId ( $category_id ): void
    {
        $category_id = (int)$category_id;
        if ($category_id > 0) {
            $this->category_id = $category_id;
        }
    }

    /**
     * @return mixed
     */
    public function getPostId ()
    {
        return $this->post_id;
    }

    /**
     * @param mixed $post_id
     */
    public function setPostId ( $post_id ): void
    {
        $post_id = (int)$post_id;
        if ($post_id > 0) {
            $this->post_id = $post_id;
        }
    }


}