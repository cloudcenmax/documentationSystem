<?php
if (isset($_POST['tinymce'])) {
  include '../config.php';
  include 'session.php';
  session_start();
  try {
    $database->insert("posts", [
      "title" => $_POST['title'],
      "content" => $_POST['tinymce'],
      "user_id" => $_SESSION['id'],
      "category_id" => $_POST['category'],
      "tags" => $_POST['tags'],
      "meta_title" => $_POST['meta_title'],
      "meta_keywords" => $_POST['meta_keywords'],
      "meta_description" => $_POST['meta_description'],
      'slug' => $_POST['slug']
    ]);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  header('Location: index.php?articleAdded=1');
}
