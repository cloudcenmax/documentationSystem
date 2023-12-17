<?php

include '../config.php';

if (!isset($_POST['id'])) {
  header('Location: index.php');
}

$database->update("posts", [
  "title" => $_POST['title'],
  "content" => $_POST['tinymce'],
  "category_id" => $_POST['category'],
  "tags" => $_POST['tags'],
  "meta_title" => $_POST['meta_title'],
  "meta_description" => $_POST['meta_description'],
  "meta_keywords" => $_POST['meta_keywords'],
  "updated_at" => date('Y-m-d H:i:s'),
  'slug' => $_POST['slug']
], [
  "id" => $_POST['id']
]);

header('Location: index.php?articleEdited');
