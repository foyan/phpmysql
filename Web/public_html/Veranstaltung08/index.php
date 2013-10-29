<?php

require_once("Mensch.php");

$mensch = new Mensch("Elvis Presley", "männlich");

echo $mensch->getName() . "</br>";

$mensch->umbenennen("Boris Jelzin");

echo "Alter: " . $mensch->getAlter() . "<br/>";

if (is_a($mensch, "Mensch")) {
    echo "Ist Mensch<br/>";
} else {
    echo "Ist kein Mensch<br/>";
}

echo "Vorfahre: " . Mensch::getVorfahre() . "<br/>";
Mensch::neueEvolutionstheorie("Alien");
echo "Vorfahre: " . Mensch::getVorfahre() . "<br/>";

$bankangestellter = new Schweizer("Arnold Schwarzenegger", "weiblich");
$bankangestellter->umbenennen("Fabio");

?>
