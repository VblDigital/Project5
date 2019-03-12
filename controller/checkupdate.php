<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 09/03/2019
 * Time: 22:17
 */
if($post->getUpdatedDate()!="") {
    $update = $post->getUpdatedDate();
    $newdupdate = date("d-m-Y", strtotime($update));
    echo 'Modifié le ' . $newdupdate;
}