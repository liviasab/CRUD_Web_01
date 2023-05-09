<?php
require('secure.php');

$name = $_POST['name'];
$password = $_POST['password'];
$friendly = $_POST['friendly'];

$fp = fopen("pokemons.csv","r");

while(($row = fgetcsv($fp)) !== false){
    if($row[0] == $name){
        header("location: ./index.php");
        exit();
    }
}
$fp = fopen("pokemons.csv","a");

fputcsv($fp,[$name,$password,$friendly]);
header("location: ./index.php")

?>