<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 01/05/2019
 * Time: 21:08
 */

namespace src\backendController;


class Router
{
    public function url()
    {
        if (isset($_GET['p']))
        {
            if($_GET['p']==='viewCategories')
            {
                include './view/admin/viewCategories.php';
            }
            elseif ($_GET['p']==='addCategory')
            {
                include './view/admin/addCategory.php';
            }
            elseif ($_GET['p']==='modifyCategory')
            {
                include './view/admin/modifyCategory.php';
            }
        }
    }
}