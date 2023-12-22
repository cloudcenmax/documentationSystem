<?php

include 'config.php';
include 'environment.php';
if (isset($_GET['slug'])) {
  $slug = $_GET['slug'];
}

if (isset($slug)) {
  $catid = $database->get("categories", "id", [
    'slug' => $slug
  ]);
} else {
  $catid = 0;
}

$categories = $database->select("categories", "*", [
  "parent_id" => $catid,
]);

$posts = $database->select("posts", "*", [
  'category_id' => $catid,
]);

if ($catid == 0) {
  $thisCategory['name'] = 'Documentation Home';
} else {
  $thisCategory = $database->get("categories", "*", [
    'id' => $catid
  ]);
}

if (!isset($catid)) {
  // Set the HTTP status code to 404
  header("HTTP/1.0 404 Not Found");
  // Display a custom error message
  echo "404 - Page Not Found. Return to <a href='$baseUrl'>Home</a>";

  die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
  <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
  <meta name="author" content="elemis">
  <title><?= $thisCategory['name']; ?></title>
  <!-- /////////////// TODO: Change this before production /////////////// -->
  <link rel="shortcut icon" href="<?= $baseUrl ?>/assets/img/favicon.png">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/plugins.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/style.css">
  <!-- /////////////// TODO: Change this before production /////////////// -->
</head>

<body>
  <div class="content-wrapper">
    <?php include 'header.php'; ?>
    <section class="section-frame overflow-hidden">
      <div class="wrapper gradient-7">
        <div class="container py-12 py-md-14 text-center">
          <div class="row">
            <div class="col-md-7 col-lg-7 col-xl-5 mx-auto">
              <h1 class="display-1 mb-3 text-white"><?= $thisCategory['name']; ?></h1>
            </div>
            <!-- /column -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </div>
      <!-- /.wrapper -->
    </section>
    <!-- /header -->
    <section class="wrapper bg-light">
      <div class="container pt-12 pt-md-14 pb-14 pb-md-16">
        <?php if (sizeof($categories) > 0) { ?><h3>Sub-Categories</h3><?php } ?>
        <div class="row">
          <?php foreach ($categories as $category) : ?>
            <div class="col-3">
              <a href="<?= $baseUrl ?>/category/<?= $category['slug']; ?>">
                <div class="card bg-pale-sky my-3 category-box">
                  <div class="card-body mb-0">
                    <h3 class="m-0"><?= $category['name']; ?></h3>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
        <?php if (sizeof($categories) > 0) { ?><h3 class="mt-6">Articles</h3><?php } ?>
        <div class="mc-field-group input-group mb-5">
          <input type="text" name="query" class="form-control" onkeyup="showResult(this.value)" placeholder="Search Articles" id="mce-EMAIL2" autocomplete="off">
          <input type="submit" value="Search" name="subscribe" id="mc-embedded-subscribe2" class="btn btn-orange">
        </div>
        <div class="row" id="livesearch">
          <?php foreach ($posts as $post) : ?>
            <div class="col-md-6">
              <a href="<?= $baseUrl ?>/article/<?= $post['slug'] ?>">
                <div class="card mt-3 article-box">
                  <div class="card-header p-4 border-0 bg-ligt text-blue"><?= $post['title']; ?></div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>
  <?php include 'footer.php'; ?>
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <script src="./assets/js/plugins.js"></script>
  <script src="./assets/js/theme.js"></script>
  <style>
    .category-box:hover {
      transform: scale(1.01);
      transition-duration: 0.1s;
    }

    .article-box:hover {
      transform: scale(1.01);
      transition-duration: 0.1s;
      background: #F1FBF8 !important;
    }
  </style>
  <script>
    function showResult(str) {
      /*
      if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
      }*/
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("livesearch").innerHTML = this.responseText;
        }
      }
      /////////// TODO: Change this before production ///////////
      xmlhttp.open("GET", "<?= $baseUrl ?>/livesearch.php?catid=<?= $catid ?>&q=" + str, true);
      xmlhttp.send();
    }
  </script>
</body>

</html>