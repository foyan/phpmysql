<?php

session_start();
$error = "";

if (isset ($_POST["user"])) {
    if ($_POST["user"] == "fabio" && $_POST["pwd"] == "fabio") {
        // login succeeded
        $_SESSION["login"] = true;
        
        header("Location: index.php");
        exit();
    } else {
        // login failed
        $error = "Falsches Passwort.";
        $_SESSION["login"] = false;
    }
}


if ($error != "") {
    echo "<div>" . $error . "</div>";
}

?>

    <form method="POST">
        <input type="text" name="user" id="user" value="fabio" /><label for="user">User</label><br/>
        <input type="password" name="pwd" id="pwd" /><label for="pwd">Passwort</label>
        <input type="submit" value="Login"  />
    </form>

<?php
    foreach (read_posts() as &$post) {
        render_post($post);
    }
?>
        
<?php
    include ("_tail.php");
?>