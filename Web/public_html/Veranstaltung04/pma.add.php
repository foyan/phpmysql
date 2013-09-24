<?php

    session_start();
    
    $_SESSION["personen"][] = array($_POST["vollerName"], $_POST["alter"]);
    
    header("Location: personenmeldeamt.php");

?>
