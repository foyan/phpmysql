<?php
    include ("_head.php");
?>

<?php
    foreach (read_posts() as &$post) {
        render_post($post, $login);
    }
?>
        
<?php
    include ("_tail.php");
?>