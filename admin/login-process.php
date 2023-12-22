<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    include '../config.php';

    $user = $database->select("users", "*", [
        "username" => $username,
        "password" => $password
    ]);

    if (count($user) > 0) {
        $_SESSION['id'] = $user[0]['id'];
        //echo $_SESSION['id'];
        header("Location: index.php");
    } else {
        header("Location: login.php?failed=true");
    }
} else {
    echo "Username or password is empty!";
}
