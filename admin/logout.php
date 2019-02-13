<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 09/02/2019
 * Time: 19:55
 */
require '../include/config.php';
session_destroy();

header('Location: ../index.php');