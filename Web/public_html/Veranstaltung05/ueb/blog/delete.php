<?php
    
    require_once("model.php");

    $id = $_GET["id"];
    
    delete_post($id);
    
    header("Location: index.php");
    exit();

?>
