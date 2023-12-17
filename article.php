<?php
//echo $_GET['slug'];
include 'config.php';
$thisPost = $database->get("posts", "*", [
  'slug' => $_GET['slug']
]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
  <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
  <meta name="author" content="elemis">
  <title>Sandbox - Modern & Multipurpose Bootstrap 5 Template</title>
  <!-- /////////////// TODO: Change this before production /////////////// -->
  <link rel="shortcut icon" href="http://localhost/documentationSystem/assets/img/favicon.png">
  <link rel="stylesheet" href="http://localhost/documentationSystem/assets/css/plugins.css">
  <link rel="stylesheet" href="http://localhost/documentationSystem/assets/css/style.css">
  <!-- /////////////// TODO: Change this before production /////////////// -->
</head>

<body>
  <div class="content-wrapper">
    <?php include 'header.php'; ?>
    <section class="section-frame overflow-hidden">
      <div class="wrapper gradient-8">
        <div class="container py-12 pt-md-14 pb-md-20 text-center">
          <div class="row">
            <div class="col-md-7 col-lg-7 col-xl-7 mx-auto">
              <h1 class="display-1 mb-0"><?= $thisPost['title']; ?></h1>
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
      <div class="container pb-14 pb-md-16">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="blog single mt-n17">
              <div class="card">
                <figure class="card-img-top"><img src="./assets/img/photos/b1.jpg" alt=""></figure>
                <div class="card-body">
                  <div class="classic-view">
                    <article class="post fs-lg" id="post">
                      <?= $thisPost['content']; ?>
                    </article>
                    <!-- /.post -->
                  </div>
                  <!-- /.classic-view -->
                  <hr class="my-8">
                  <div class="card gradient-7">
                    <div class="card-body p-10 p-xl-12">
                      <div class="row">
                        <div class="col-md-10 mx-auto">
                          <h3 class="display-3 text-white">Still need help? We're always available to help.</h3>
                          <p class="fs-16 text-white mb-3">This tutorial was created by experts in our Hosting support department and it is verified multiple times to make sure it works before publishing. But still, if for some reason if you get stuck along the way, feel free to contact support - we're always available.</p>
                          <span><a class="btn btn-white rounded mt-1">Contact Support</a></span>
                        </div>
                        <!-- /column -->
                      </div>
                    </div>
                    <!--/.card-body -->
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.blog -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
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
      background: #45C4A0 !important;
    }

    .article-box:hover {
      transform: scale(1.01);
      transition-duration: 0.1s;
      background: #F1FBF8 !important;
    }

    .post code {
      background: #F1FBF8;
      padding: 5px;
      border-radius: 5px;
      font-size: 18px;
    }

    .post li :last-child {
      padding-bottom: 5px;
    }
  </style>
</body>

</html>