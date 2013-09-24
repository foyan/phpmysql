<table>
    
    <thead>
    <tr><th>Land</th><th>Stadt</<th></tr>
    </thead>
    
    <tbody>

<?php

    $capitals = array(
        "Schweiz" => "Bern",
        "Italien" => "Rom",
        "Russland" => "Moskau",
        "Amerika" => "Washington",
        "Australien" => "Nicht Sidney"
    );
    
    foreach($capitals as $land => $stadt) {
        echo "<tr><td>" . $land . "</td><td>" .$stadt  . "</td></tr>";
    }

?>
        
    </tbody>

</table>