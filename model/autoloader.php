<?php
session_start();
/** * Created by PhpStorm.
 * PostsCategories: VALEBLES
 * Date: 24/01/2019
 * Time: 17:30
 */
// connection to database
require '../model/mesClass/Autoloader.php';
\model\mesClass\Autoloader::register();
$bdd = new \model\mesClass\Database('project5_bdd');
?>