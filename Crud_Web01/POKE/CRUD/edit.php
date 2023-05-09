<?php
require('secure.php');

$name = $_GET['name'];

$fp = fopen("pokemons.csv","r");

$found = false;
$data = null;

while(($row = fgetcsv($fp)) !== false){
    if($row[0] == $name){
        $found = true;
        $data = $row;
    }
}

if(!$found){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update your pokemon</h>
    <h3>Pokemon name: <?=$data[0]?></h3>
    <h3>Pokemon level: <?=$data[1]?></h3>

    <form action="update.php" method="POST">
        <input type="hidden" value="<?=$data[0]?>" name="id">
       
        <label>Name</label>
        <input value="<?=$data[0]?>" type="text" name="name">

        <label>Level</label>
        <input value="<?=$data[1]?>" type="number" min="1" name="level">

        <select name="friendly">
            <option value="1" <?=$data[2] == 1 ? "selected" : "" ?>>yes</option>
            <option value="0" <?=$data[2] == 0 ? "selected" : "" ?>>No</option>
            <option value="2" <?=$data[2] == 2 ? "selected" : "" ?>>talvez</option>
        </select>
        <button>Save</button>
    </form>
</body>
</html>