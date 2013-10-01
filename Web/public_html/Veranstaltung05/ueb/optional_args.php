<?php

function get_cost($amt, $price = 45, $curr = "CHF") {
    $cost = $price * $amt;
    return $curr . " " . $cost;
}

echo "Kosten: " . get_cost(7, 39.99, "USD") . "<br/>";
echo "Kosten: " . get_cost(7, 39.99) . "<br/>";
echo "Kosten: " . get_cost(7) . "<br/>";


?>
