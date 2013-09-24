<?php

    function bewerter($note) {
        
        switch ($note) {
            case 1: return "Eins";
            case 2: return "Zwei";
            case 3: return "Drei";
            case 4: return "Fier";
            case 5: return "Fünf";
            case 6: return "Sechs";
                
            case "Nicht bewertet": return "Nicht abgegeben";
            
            default: return "Int! Mann!";
                
        }
        
    }

?>
<table>
    
    <thead>
    <tr><th>Note</th><th>Satz</th></tr>
    
    <tbody>

<?php
    
    for ($note = 1; $note <= 6; $note += 0.5) {
        echo "<tr><td>" . $note . "</td><td>" . bewerter($note)  . "</td></tr>";
    }

    echo "<tr><td>" . "Nicht bewertet" . "</td><td>" . bewerter("Nicht bewertet")  . "</td></tr>";
        
?>
        
    </tbody>

</table>