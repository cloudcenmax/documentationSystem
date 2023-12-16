<?php

include '../config.php';
if (!isset($_GET['id'])) {
  header('Location: index.php');
}

$database->delete("posts", [
  "id" => $_GET['id']
]);

header('Location: index.php?articleTrashed');
