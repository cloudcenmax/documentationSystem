<?php
if (isset($_POST['tinymce'])) {
  include '../config.php';
  include 'session.php';
  session_start();
  try {

    if (isset($_POST['rewriteWithAi20i'])) {
      $_POST['tinymce'] = rewriteWithAi20i($_POST['tinymce']);
    }

    $database->insert("posts", [
      "title" => $_POST['title'],
      "content" => $_POST['tinymce'],
      "user_id" => $_SESSION['id'],
      "category_id" => $_POST['category'],
      "tags" => $_POST['tags'],
      "meta_title" => $_POST['meta_title'],
      "meta_keywords" => $_POST['meta_keywords'],
      "meta_description" => $_POST['meta_description'],
      'slug' => $_POST['slug']
    ]);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  header('Location: index.php?articleAdded=1');
}

function rewriteWithAi20i($article)
{
  include 'assets/rewrite-prompt.php';
  $processiblePrompt = $prompt;

  $processiblePrompt = str_replace('{{ORIGINAL_ARTICLE}}', $article, $processiblePrompt);

  include 'env.php';

  $anthropic = new \WpAi\Anthropic\AnthropicAPI($api_key);
  $messages = [
    [
      'role' => 'user',
      'content' => $processiblePrompt,
    ],
  ];
  $options = [
    'max_tokens' => 8192,
    'model' => 'claude-3-5-sonnet-20241022',
    'messages' => $messages,
  ];

  $response = $anthropic->messages()->create($options);

  $result = json_encode($response, true);
  $result = json_decode($result, true);
  $response = $result['content'][0]['text'];
  preg_match('/<rewritten_article>(.*?)<\/rewritten_article>/s', $response, $rewrite);

  return $rewrite[1];
}
