<table>
    
    <thead>
    <tr><th>Num</th><th>Denom</th><th>Num/Denom</th></tr>
    
    <tbody>

<?php

    $num = 5;
    $denom = -2;
    
    for ($denom = -2; $denom <= +2; $denom++) {
    
        if ($denom == 0) {
            continue;
        }
        $res = $num / $denom;
        
        echo "<tr><td>" . $num . "</td><td>" . $denom  . "</td><td>" . $res . "</td></tr>";
        
    }

    
?>
        
    </tbody>

</table>