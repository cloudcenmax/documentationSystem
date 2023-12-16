<?php
require '../vendor/autoload.php';
require '../config.php';

$categories = $database->select("categories", "*");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords"
        content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>Sandbox - Modern & Multipurpose Bootstrap 5 Template</title>
    <link rel="shortcut icon" href="./assets/img/favicon.png">
    <link rel="stylesheet" href="./assets/css/plugins.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script type="text/javascript"
        src="http://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=23YqD_7NKa9ouyw6MVd5hkLChYCdVE6z4GHOJq9qQ44K8awRJR9SEwIzpqN6DaoT6_t-BjzyA3A3mtBirh1ZlmULEfLBSncsRue_GvJG6YThfhneq5AfqOyZkzeyFUHn"
        charset="UTF-8"></script>
    <script src="../vendor/tinymce/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <div class="content-wrapper">
        <header class="wrapper bg-dark navbar-dark">
            <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                        <h4 class="text-white m-0">Documentation System</h4>
                    </div>
                    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                        <div class="offcanvas-header d-lg-none">
                            <h3 class="text-white fs-30 mb-0">Sandbox</h3>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link text-white" href="#">Link</a></li>
                            </ul>
                        </div>
                        <!-- /.offcanvas-body -->
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>
            <!-- /.navbar -->
        </header>
        <!-- /header -->
        <section class="wrapper bg-light">
            <div class="container pt-12 pt-md-14 pb-14 pb-md-16">
                <h1>Add New Article</h1>
                <form action="new-article-processor.php" method="post">
                    <input type="text" name="title" class="form-control mb-1" placeholder="Article Name"
                        autocomplete="off">
                    <textarea id="default" name="tinymce">Hello, World!</textarea>

                    <h2 class="fs-15 text-uppercase text-line text-navy mt-6">Publishing Settings</h2>
                    <hr class="mb-3 mt-1">

                    <select class="form-control mt-1">
                        <option value="NULL" selected disabled>Select a Category</option>
                        <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id'] ?>"><?=$category['name']?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="text" name="tags" class="form-control mb-1 mt-1"
                        placeholder="Tags (separated by comma ie., cpanel,whm,directadmin)" autocomplete="off">

                    <hr class="my-3">
                    <h2 class="fs-15 text-uppercase text-line text-navy m-0">SEO Settings</h2>
                    <hr class="mb-3 mt-1">

                    <input type="text" name="meta_title" class="form-control mb-1 mt-1" placeholder="Meta Title"
                        autocomplete="off">
                    <input type="text" name="meta_keywords" class="form-control mb-1 mt-1" placeholder="Meta Keywords"
                        autocomplete="off">
                    <textarea type="text" name="meta_description" class="form-control mb-1 mt-1"
                        placeholder="Meta Description" autocomplete="off"></textarea>

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