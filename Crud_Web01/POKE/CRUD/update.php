<?php
    require('secure.php');
    $id = $_POST['id'];

$name = $_POST['name'];
$level= $_POST['level'];
$friendly = $_POST['friendly'];

$temp = tempnam(".","");
$fpOrigin = fopen("pokemons.csv","r");
$fpTemp = fopen($temp,'w');

while (($row = fgetcsv($fpOrigin))!==false){
    if($row[0] != $id){
        fputcsv($fpTemp,$row);
    }else{
        fputcsv($fpTemp, [$name, $level, $friendly]);
    }
}

fclose($fpOrigin);
fclose($fpTemp);

rename($temp,"pokemons.csv");
header("location: ./index.php");
exit();
