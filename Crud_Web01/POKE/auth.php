<?php
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $response = file_get_contents("http://localhost:8000/getUser.php");
    $data = json_decode($response,true);

    foreach ($data as $user){
        if($user['email'] == $email && $user['password'] == $password){
            $_SESSION['auth'] = true;
            header("location: CRUD/index.php");
            exit();
        }
            
    }
        header("location: login.php");
        $_SESSION['auth'] = false;
        exit();
    ?>



