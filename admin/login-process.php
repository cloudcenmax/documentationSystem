<?php

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    include '../config.php';

    $user = $database->select("users", "*", [
        "username" => $username,
        "password" => $password
    ]);

    if(count($user) > 0) {
        $_SESSION['user'] = $user[0];
        header("Location: index.php");
    } else {
        header("Location: login.php?failed=true");
    }
} else {
    header("Location: login.php");
}