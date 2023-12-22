<?php

require '../vendor/autoload.php';
require '../config.php';
include 'session.php';

if (isset($_POST['catname'])) {
  $database->insert("categories", [
    "name" => $_POST['catname'],
    "parent_id" => $_POST['parent_id'],
    'slug' => $_POST['slug']
  ]);
  $created = $_POST['catname'];
}

$categories = $database->select("categories", "*");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
  <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
  <meta name="author" content="elemis">
  <title>Add New Category</title>
  <link rel="shortcut icon" href="./assets/img/favicon.png">
  <link rel="stylesheet" href="./assets/css/plugins.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <script src="../vendor/tinymce/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
  <div class="content-wrapper">
    <?php include 'header.php'; ?>
    <section class="wrapper gradient-8">
      <div class="container pt-12 pt-md-14 pb-14 pb-md-16">
        <h1>Add New Category</h1>
        <?php if (isset($created)) : ?>
          <div class="alert alert-success" role="alert">
            Category <?= $_POST['catname'] ?> created successfully!
          </div>
        <?php endif; ?>
        <form method="post">
          <input type="text" name="catname" id="name" class="form-control mb-1" placeholder="Category Name" onchange="slugProcessor()" autocomplete="off" required>
          <input type="text" name="slug" class="form-control mb-1" id="slug" placeholder="Slug" autocomplete="off" required>
          <select class="form-control mt-1" name="parent_id">
            <option value="0" selected>No Parent Category</option>
            <?php foreach ($categories as $category) : ?>
              <option value="<?= $category['id'] ?>" <?php if ($_GET['catid'] == $category['id']) {
                                                        echo "selected";
                                                      } ?>><?= $category['name'] ?></option>
            <?php endforeach; ?>
          </select>
          <input type="submit" class="btn btn-primary rounded-pill btn-login mb-2 mt-2" value="Create new category">
        </form>
      </div>
    </section>
  </div>
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <script src="./assets/js/plugins.js"></script>
  <script src="./assets/js/theme.js"></script>
  <script>
    tinymce.init({
      selector: '#default',
      images_upload_url: 'imageAcceptor.php',
      plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'help', 'wordcount'
      ],
      min_height: 500,
      toolbar: +'code'
    });

    function slugProcessor() {
      var name = document.getElementById('name').value;
      var slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
      document.getElementById('slug').value = slug;
    }
  </script>
  <style>
    .category-box:hover {
      transform: scale(1.01);
      transition-duration: 0.1s;
      background: #45C4A0 !important;
    }

    .category-add:hover {
      transform: scale(1.01);
      transition-duration: 0.1s;
      background: #F1FBF8 !important;
    }
  </style>
</body>