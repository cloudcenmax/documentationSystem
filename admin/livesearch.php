<?php
include '../config.php';
include '../environment.php';

if (isset($_GET['q'])) {
  $search = $_GET['q'];
  $catid = $_GET['catid'];

  $posts = $database->select("posts", "*", [
    "OR" => [
      "title[~]" => $search,
      "content[~]" => $search,
    ],
    'category_id' => $catid,
  ]);
}

foreach ($posts as $post) { ?>

  <div class="col-md-6">
    <a href="<?= $baseUrl ?>/admin/edit-article.php?id=<?= $post['id'] ?>">
      <div class="card mt-3 article-box">
        <div class="card-header p-4 border-0 bg-ligt text-blue"><?= $post['title']; ?></div>
      </div>
    </a>
  </div>

<?php } ?>