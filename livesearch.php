<?php
include 'config.php';
include 'environment.php';

if (isset($_GET['q'])) {
  $search = $_GET['q'];
  $catid = $_GET['catid'];

  if ($catid == 0) {
    $posts = $database->select("posts", "*", [
      "OR" => [
        "title[~]" => $search,
        "content[~]" => $search,
        "tags[~]" => $search,
      ],
    ]);
  } else {
    $posts = $database->select("posts", "*", [
      "OR" => [
        "title[~]" => $search,
        "content[~]" => $search,
        "tags[~]" => $search,
      ],
      'category_id' => $catid,
    ]);
  }
}

foreach ($posts as $post) { ?>

  <div class="col-md-6">
    <a href="<?= $baseUrl ?>/article/<?= $post['slug'] ?>">
      <div class="card mt-3 article-box">
        <div class="card-header p-4 border-0 bg-ligt text-blue"><?= $post['title']; ?></div>
      </div>
    </a>
  </div>

<?php } ?>