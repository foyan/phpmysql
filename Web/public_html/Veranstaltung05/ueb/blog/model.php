<?php

define("PATH", "data/");

function read_posts() {
    $posts = array();
    
    foreach (scandir(PATH) as $file) {
        if ($file == "." || $file == ".." || $file == ".keep") {
            continue;
        }
        $posts[] = unserialize(file_get_contents(PATH . $file));
    }
    
    return $posts;
}

function save_post($post) {
    $file = PATH . $post["id"] . ".post";
    file_put_contents($file, serialize($post));
}

function delete_post($id) {
    $file = PATH . $id . ".post";
    unlink($file);
}


?>
