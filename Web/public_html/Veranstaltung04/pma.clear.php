<?php

    session_start();
    
    $_SESSION["personen"] = [];
    
    header("Location: personenmeldeamt.php");

?>
