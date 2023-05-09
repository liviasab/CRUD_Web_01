<?php
require('secure.php');

$name = $_GET['name'];

$temp = tempnam(".","");
$fpOrigin = fopen("pokemons.csv","r");
$fpTemp = fopen($temp,'w');

while (($row = fgetcsv($fpOrigin))!==false){
    if($row[0] != $name) {
        fputcsv($fpTemp,$row);
    }
}

fclose($fpOrigin);
fclose($fpTemp);

rename($temp,"pokemons.csv");
header("location: ./index.php");

?>