<!DOCTYPE html>
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Personenmeldeamt</title>
    </head>
    
    <body>
        <form action="pma.add.php" method="POST">
            <label for="vollerName">Name</label>
            <input type="text" id="vollerName" name="vollerName" />
            <label for="alter">Alter</label>
            <input type="text" id="alter" name="alter" />
            
            <input type="submit" value="Los" />
        </form>

    <div>
        <a href="pma.clear.php">Löschen mit GET. (!)</a>
    </div>
        
    <table>
        <thead>
            <tr><th>Perrson</th><th>Alterrr</th></tr>
        </thead>
        <tbody>
    <?php

        session_start();
        
        for ($i = 0; $i < count($_SESSION["personen"]); $i++) {
            echo "<tr><td>" . $_SESSION["personen"][$i][0] . "</td><td>" . $_SESSION["personen"][$i][1] . "</td></tr>";
        }

    ?>
        
        </tbody>
    </table>
        
    </body>
</html>