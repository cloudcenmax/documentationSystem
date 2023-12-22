<?php

include '../config.php';
if (isset($_GET['catid'])) {
    $catid = $_GET['catid'];
} else {
    $catid = 0;
}
$categories = $database->select("categories", "*", [
    'parent_id' => $catid,
]);
$posts = $database->select("posts", "*", [
    'category_id' => $catid,
]);

if ($catid == 0) {
    $thisCategory['name'] = 'Home';
} else {
    $thisCategory = $database->get("categories", "*", [
        'id' => $catid
    ]);
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
    <title>Sandbox - Modern & Multipurpose Bootstrap 5 Template</title>
    <link rel="shortcut icon" href="./assets/img/favicon.png">
    <link rel="stylesheet" href="./assets/css/plugins.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="content-wrapper">
        <?php include 'header.php'; ?>
        <!-- /header -->
        <section class="wrapper bg-light">
            <div class="container pt-12 pt-md-14 pb-14 pb-md-16">
                <?php if (isset($_GET['articleAdded'])) : ?>
                    <div class="alert alert-success">
                        Article Added Successfully!
                    </div>
                <?php endif; ?>
                <?php if (isset($_GET['articleEdited'])) : ?>
                    <div class="alert alert-success">
                        Article Edited Successfully!
                    </div>
                <?php endif; ?>
                <?php if (isset($_GET['articleTrashed'])) : ?>
                    <div class="alert alert-danger">
                        Article Deleted Successfully!
                    </div>
                <?php endif; ?>
                <h1>Category: <?= $thisCategory['name']; ?></h1>
                <div class="row">
                    <?php foreach ($categories as $category) : ?>
                        <div class="col-3">
                            <a href="?catid=<?= $category['id']; ?>">
                                <div class="card shadow-lg bg-primary my-3 category-box">
                                    <div class="card-body mb-0">
                                        <h3 class="text-white m-0"><?= $category['name']; ?></h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-3">
                        <a href="new-category.php?catid=<?= $catid ?>">
                            <div class="card bg-soft-blue my-3 category-add">
                                <div class="card-body mb-0">
                                    <h3 class="m-0"><i class="uil uil-folder-plus m-0"></i> Sub-Category</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <h3 class="mt-5">Articles (<?= count($posts) ?>) <a href="new-article.php?catid=<?= $catid ?>">Create new?</a></h3>
                <div class="mc-field-group input-group mb-5">
                    <input type="text" name="query" class="form-control" onkeyup="showResult(this.value)" placeholder="Search Articles" id="mce-EMAIL2" autocomplete="off">
                    <input type="submit" value="Search" name="subscribe" id="mc-embedded-subscribe2" class="btn btn-orange">
                </div>
                <div class="row" id="livesearch">
                    <?php foreach ($posts as $post) : ?>
                        <div class="col-md-6">
                            <a href="edit-article.php?id=<?= $post['id'] ?>">
                                <div class="card">
                                    <div class="card-header p-4 border-0 bg-ligt text-blue"><?= $post['title']; ?></div>
                                    <div class="card-body p-4 bg-soft-orange text-dark">Last Edited/Updated on: <?= $post['updated_at'] ?></div>
                                    <?php
                                    if ($post['tags'] != '') {
                                        $tags = explode(',', $post['tags']);
                                    ?>
                                        <div class="card-footer p-4 bg-pale-orange">
                                            <?php foreach ($tags as $tag) : ?>
                                                <span class="badge bg-pale-ash text-blue rounded-pill"><?= $tag ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
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
            xmlhttp.open("GET", "livesearch.php?catid=<?= $catid ?>&q=" + str, true);
            xmlhttp.send();
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