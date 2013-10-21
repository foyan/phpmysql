<?php

function x10(&$number) {
    $number *= 10;
}
$count = 5;
x10($count);
echo $count;

?>
