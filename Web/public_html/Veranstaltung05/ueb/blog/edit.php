<?php

    require_once("model.php");
    require_once("view_utils.php");
    
    if (isset($_POST["title"])) {

        save_post(array(
            "title" => htmlspecialchars($_POST["title"]),
            "content" => htmlspecialchars($_POST["content"]),
            "date" => time(),
            "id" => $_POST["id"]
        ));
        
        header("Location: index.php");
        exit();
    }

    include ("_head.php");
?>


<?php
    foreach (read_posts() as &$post) {
        if ($post["id"] == $_GET["id"]) {
            echo "<article>";
            echo "<form method=\"POST\">";
            echo "<h1><input type=\"text\" placeholder=\"Titel\" name=\"title\" value=\"" . $post["title"] . "\"></h1>";
            echo "<textarea name=\"content\">" . $post["content"] . "</textarea>";
            echo "<input type=\"submit\" value=\"Post\"  />";
            echo "<input type=\"hidden\" name=\"id\" value=\"" . $post["id"] . "\"  />";
            echo "<a href=\"index.php\">Cancel</a>";
            echo "</form></article>";
        } else {
            render_post($post);
        }
    }
?>
        
<?php
    include ("_tail.php");
?>