<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$multiCity = array(
    array('City', 'Country', 'Continent'),
    array('Tokyo', 'Japan', 'Asia'),
    array('Mexico City','Mexico', 'North America'),
    array('New York City', 'USA', 'North America'),
    array('Mumbai', 'India', 'Asia'),
    array('Seoul', 'Korea', 'Asia'),
    array('Shanghai', 'China', 'Asia'),
    array('Lagos', 'Nigeria', 'Africa'),
    array('Buenos Aires', 'Argentina', 'South America'),
    array('Cairo', 'Egypt', 'Africa'),
    array('London', 'UK','Europe')
);

$multiCity = array_filter($multiCity, function ($c) {
    return $c[0] != "City";
});
?>
<html>
<head>
<title>Multi-dimensional Array</title>
<style type="text/css">
td, th {width: 8em; border: 1px solid black; padding-left: 4px;}
th {text-align:center;}
table {border-collapse: collapse; border: 1px solid black;}
</style>
</head>
 <body>
<h2>Auflistung Array<br /></h2>
 <table>
<thead>
<tr>
<th>Stadt</th>
<th>Land</th>
<th>Kontinent</th>
</tr>
</thead>
<tbody>
 <?php
// durchiterieren und key/values ausgeben
foreach ($multiCity as &$city) {
    echo "<tr>";
    echo "<td>" . $city[0] . "</td><td>" . $city[1] . "</td><td>" . $city[2] . "</td>";
    echo "</tr>";
}
?>
</tbody>
 </table>

<h2>Auflistung der St&auml;dte in Asien<br /></h2>

 <table>
<thead>
<tr>
<th>Stadt</th>
<th>Land</th>
<th>Kontinent</th>
</tr>
</thead>
<tbody>
 <?php
// durchiterieren und key/values ausgeben
foreach (array_filter($multiCity, function ($c) {
    return $c[2] == "Asia";
}) as &$city) {
    echo "<tr>";
    echo "<td>" . $city[0] . "</td><td>" . $city[1] . "</td><td>" . $city[2] . "</td>";
    echo "</tr>";
}
?>
</tbody>
 </table>    

<h2>Auflistung der Kontinente, sowie die Zahl der L&auml;nder darin (im Array)<br /></h2>

 <table>
<thead>
<tr>
<th>Stadt</th>
<th># Länder</th>
</tr>
</thead>
<tbody>
<?php

function array_distinct($array, $equals) {

    // Komplexität O(n^2), besser mit hashes oder so...
    $result = array();
    foreach ($array as &$x) {
        $add = true;
        foreach ($result as &$y) {
            if ($equals($x, $y)) {
                $add = false;
                break;
            }
        }
        if ($add) {
            $result[] = $x;
        }
    }
    return $result;
}

$conts_and_countries = array_map(function ($c) {
    return array($c[2], $c[1]);
}, $multiCity);

$distinct = array_distinct($conts_and_countries, function ($a, $b) {
    return $a[0] == $b[0] && $a[1] == $b[1];
});

$counts = array_count_values(array_map(function ($c) {
    return $c[0];
}, $distinct));

 
foreach ($counts as $cont => $cnt) {
    echo "<tr>";
    echo "<td>" . $cont . "</td><td>" . $cnt . "</td>";
    echo "</tr>";
}
?>
</tbody>
 </table>  


<h2>Auflistung nach L&auml;nder A-Z <br /></h2>

 <table>
<thead>
<tr>
<th>Stadt</th>
<th>Land</th>
<th>Kontinent</th>
</tr>
</thead>
<tbody>
 <?php
// durchiterieren und key/values ausgeben
usort($multiCity, function ($x, $y) {
    return $x[1] == $y[1] ? 0 : $x[1] < $y[1] ? -1 : 1;
});
foreach ($multiCity as &$city) {
    echo "<tr>";
    echo "<td>" . $city[0] . "</td><td>" . $city[1] . "</td><td>" . $city[2] . "</td>";
    echo "</tr>";
}
?>
</tbody>
 </table>  

</body>
</html>