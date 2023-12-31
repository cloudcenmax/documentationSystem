<?php
include '../environment.php';
?>

<header class="wrapper">
  <nav class="navbar navbar-expand-lg center-nav bg-dark navbar-dark">
    <div class="container flex-lg-row flex-nowrap align-items-center">
      <div class="navbar-brand w-100">
        <a href="<?= $baseUrl ?>/admin">
          <h4 class="m-0 text-white"><?= $systemName ?></h4>
        </a>
      </div>
      <div class="navbar-collapse">
        <div class="ms-lg-auto d-flex flex-column">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link text-white" href="index.php">Dashboard</a></li>
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