<?php
if (isset($_POST['tinymce'])) {
  include '../config.php';
  print_r($database->info());
  session_start();
  $_SESSION['id'] = 1; /////////////// TODO: Change this before production ///////////////
  try {
    $database->insert("posts", [
      "title" => $_POST['title'],
      "content" => $_POST['tinymce'],
      "user_id" => $_SESSION['id'],
      "category_id" => $_POST['category'],
      "tags" => $_POST['tags'],
      "meta_title" => $_POST['meta_title'],
      "meta_keywords" => $_POST['meta_keywords'],
      "meta_description" => $_POST['meta_description']
    ]);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  header('Location: index.php?articleAdded=1');
}
