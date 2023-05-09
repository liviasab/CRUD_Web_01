<?php
require('./secure.php');

$fp = fopen("pokemons.csv", "r");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud de pokemons</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
        
       
    </style>
</head>

<body>
    <a href="../logout.php">logout</a>
    <h1>Crud de pokemons</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Level</th>
            <th>Friendly?</th>
            <th></th>
        </tr>
        <?php while (($row = fgetcsv($fp)) !== false) : ?>
            <tr>
                <td><?= $row[0] ?></td>
                <td><?= $row[1] ?></td>
                <td>
                    <?php
                    if ($row[2] == 1) {
                        echo 'yes';
                    } else if ($row[2] == 2) {
                        echo 'talvez';
                    } else {
                        echo 'no';
                    }
                    ?>
                </td>
                <td><a href="delete.php?name=<?= $row[0] ?>">Delete</a></td>
                <td><a href="edit.php?name=<?= $row[0] ?>">Edit</a></td>
            </tr>
        <?php endwhile ?>
    </table>
    <form action="create.php" method="POST">
        <label>Nome</label>
        <input type="text" name="name">
        <label>Number</label>
        <input type="number" min="1" name="password">
        <label>is Friendly</span>
            <select name="friendly">
                <option value="1">yes</option>
                <option value="0">No</option>
                <option value="2">talvez</option>
            </select>
            <button>Send</button>
    </form>
</body>
</html>