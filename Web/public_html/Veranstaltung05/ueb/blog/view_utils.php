<?php

date_default_timezone_set("CET");

function render_post(&$post, $edit = false) {
    echo "<article>";
    echo "<h1>" . $post["title"] . "</h1>";
    echo "<div class=\"date\">" . date("Y/m/d, H:i", $post["date"]) . "</div>";
    echo $post["content"];

    if ($edit) {
        echo "<br/><a href=\"edit.php?id=" . $post["id"] . "\">Edit</a>";
        echo "<br/><a href=\"delete.php?id=" . $post["id"] . "\">Delete</a>";
    }
    
    echo "</article>";
}

?>
