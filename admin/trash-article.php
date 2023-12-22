<?php

include '../config.php';
include 'session.php';
if (!isset($_GET['id'])) {
  header('Location: index.php');
}

$database->delete("posts", [
  "id" => $_GET['id']
]);

header('Location: index.php?articleTrashed');


//
