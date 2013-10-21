<?php

// output buffern, includes setzen, errors zeigen
ob_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("model.php");
require_once("view_utils.php");

session_start();
$login = isset($_SESSION["login"]) && $_SESSION["login"] == true;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Der Un-Blog</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--[if lt IE 9]><script src="js/libs/html5shiv-r29/html5shiv.js"></script><![endif]-->
        <link type="text/css" href="css/kill_everything_that_moves.css" rel="stylesheet" />
        <!--[if lt IE 9]><link type="text/css" href="css/winternetz_explorer.css" rel="stylesheet" /><![endif]-->
        <link type="text/css" href="css/default.css" rel="stylesheet" />
    </head>
    
    <body>
        
        <header>
            Der Un-Blog
            <nav>
                <ul>
                    <?php
                    if ($login) {
                        echo "<li><a href=\"create.php\">Create post</a>";
                        echo "<li><a href=\"logout.php\">Logout</a>";
                    } else {
                        echo "<li><a href=\"login.php\">Login (Passwort ist \"fabio\")</a>";
                    }
                    ?>                    
                </ul>
            </nav>
        </header>    
