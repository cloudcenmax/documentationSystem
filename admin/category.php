<?php
if (!isset($_GET['id'])) {
  header('Location: index.php');
  exit();
}

include '../config.php';

$category = $database->get("categories", "*", [
  "parent_id" => $_GET['id']
]);

$posts = $database->select("posts", "*", [
  "category_id" => $_GET['id']
]);
