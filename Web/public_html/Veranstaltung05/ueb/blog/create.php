<?php

    require_once("model.php");
    require_once("view_utils.php");
    
    if (isset($_POST["title"])) {

        save_post(array(
            "title" => htmlspecialchars($_POST["title"]),
            "content" => htmlspecialchars($_POST["content"]),
            "date" => time(),
            "id" => uniqid()
        ));
        
        header("Location: index.php");
        exit();
    }

    include ("_head.php");
?>

<article>
    <form method="POST">
        <h1><input type="text" placeholder="Titel" name="title"></h1>
        <textarea name="content"></textarea>
        <input type="submit" value="Post"  />
        <a href="index.php">Cancel</a>
    </form>
</article>

<?php
    foreach (read_posts() as &$post) {
        render_post($post);
    }
?>
        
<?php
    include ("_tail.php");
?>