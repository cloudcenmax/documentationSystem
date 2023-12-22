<?php
include 'environment.php';
$categories1 = $database->select("categories", "*", [
  'parent_id' => 0,
]);
?>
<header class="wrapper">
  <nav class="navbar navbar-expand-lg center-nav">
    <div class="container flex-lg-row flex-nowrap align-items-center">
      <div class="navbar-brand w-100">
        <a href="<?= $baseUrl ?>/">
          <h4 class="m-0"><?= $systemName ?></h4>
        </a>
      </div>
      <div class="navbar-collapse">
        <div class="ms-lg-auto d-flex flex-column">
          <ul class="navbar-nav">
            <?php foreach ($categories1 as $category) : ?>
              <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/category/<?= $category['slug']; ?>"><?= $category['name']; ?></a></li>
            <?php endforeach; ?>
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