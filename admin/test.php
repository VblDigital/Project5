<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 15/02/2019
 * Time: 19:56
 */

$query = 'UPDATE user SET';

$value= '';

if (!empty($_POST['username'])){
    $value .= 'username = ' . $_POST['username'];
}

$query .= $value . 'where id = 5';