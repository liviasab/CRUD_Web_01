<?php
$fp = fopen("User.csv","r");
$data= [];

while(($row = fgetcsv($fp)) !== false){
    $data[] = [
        'email' => $row[0],
        'password' => $row[1],
        'name' => $row[2],
    ];
}

echo json_encode($data);

?>