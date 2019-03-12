<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 10/03/2019
 * Time: 12:29
 */
foreach ($bdd->prepare_all('SELECT * FROM posts_categories WHERE post_id = ' . $post->getId(),model\mesClass\Posts_Categories::class) as $label): {
$name = $bdd->prepare_all('SELECT * FROM category WHERE id = ' . $label->getCategory_id(), model\mesClass\Category::class);
}
$cat = $name['0'];
$catname = $cat->getName();
echo $catname . ', ';
endforeach;