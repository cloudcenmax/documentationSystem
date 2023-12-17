<?php
require '../vendor/autoload.php';
require '../config.php';

if (!isset($_GET['id'])) {
  header('Location: index.php');
}

$post = $database->get("posts", "*", [
  "id" => $_GET['id']
]);

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
  <title>Edit Article - Docs</title>
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
        <h1>Edit Article <small><a class="text-red" onclick="trash()">(Trash)</a></small></h1>
        <form action="edit-article-processor.php" method="post">
          <input type="hidden" name="id" value="<?= $post['id'] ?>">
          <input type="text" name="title" id="name" class="form-control mb-1" placeholder="Article Name" autocomplete="off" value="<?= $post['title'] ?>">
          <input type="text" name="slug" id="slug" class="form-control mb-1" placeholder="Article Slug" autocomplete="off" value="<?= $post['slug'] ?>">
          <textarea id="default" name="tinymce"><?= $post['content'] ?></textarea>

          <h2 class="fs-15 text-uppercase text-line text-navy mt-6">Publishing Settings</h2>
          <hr class="mb-3 mt-1">

          <select class="form-control mt-1" name="category">
            <option value="0" selected>Parent Category</option>
            <?php foreach ($categories as $category) : ?>
              <option value="<?= $category['id'] ?>" <?php if ($post['category_id'] == $category['id']) {
                                                        echo "selected";
                                                      } ?>>Under <?= $category['name'] ?> Category</option>
            <?php endforeach; ?>
          </select>
          <input type="text" value="<?= $post['tags'] ?>" name="tags" class="form-control mb-1 mt-1" placeholder="Tags (separated by comma ie., cpanel,whm,directadmin)" autocomplete="off">

          <hr class="my-3">
          <h2 class="fs-15 text-uppercase text-line text-navy m-0">SEO Settings (optional)</h2>
          <hr class="mb-3 mt-1">

          <input type="text" value="<?= $post['meta_title'] ?>" name="meta_title" class="form-control mb-1 mt-1" placeholder="Meta Title" autocomplete="off">
          <input type="text" value="<?= $post['meta_keywords'] ?>" name="meta_keywords" class="form-control mb-1 mt-1" placeholder="Meta Keywords" autocomplete="off">
          <textarea type="text" name="meta_description" class="form-control mb-1 mt-1" placeholder="Meta Description" autocomplete="off"><?= $post['meta_description'] ?></textarea>

          <input type="submit" class="btn btn-primary rounded-pill btn-login w-100 mb-2 mt-2">
        </form>
      </div>
    </section>

  </div>
  <!-- /.content-wrapper -->
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

    function trash() {
      if (window.confirm('Do you really want to delete this article? This action cannot be undone!')) {
        window.location = 'trash-article.php?id=<?= $post['id'] ?>';
      } else {
        die();
      }
    }

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

</html>