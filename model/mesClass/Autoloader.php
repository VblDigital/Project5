<?php
/**
 * Created by PhpStorm.
 * PostsCategories: VALEBLES
 * Date: 25/02/2019
 * Time: 23:24
 */

namespace model\mesClass;

    class Autoloader
    {
        static function register ()
        {
            spl_autoload_register(array(__CLASS__, 'autoload'));
        }

        static function autoload ($class_name)
        {
            require '../' . $class_name . '.php';
        }
    }
