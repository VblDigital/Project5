<?php

namespace src\model;


class Category
{
    private $id;
    private $name;

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
     * @param mixed $name
     */
    public function setName ( $name ): void
    {
        $this->name = $name;
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
}