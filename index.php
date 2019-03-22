<?php

require_once 'includes/connection.php'; //included connection.php, initialises db connection
require_once 'includes/article.php'; //initializes the class that contains supporting function

$article= new Article; //instantiates class Article
$articles= $article->fetch_all();

//print_r($articles);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CMS Blog</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="container">
      <a href="index.php" id="logo">Life of a Poet</a>

      <ol>
        <?php foreach ($articles as $article) { ?>
         <li>
           <a href="article.php?id=<?php echo $article['article_id']; ?>">
           <?php echo $article['article_title']; ?>
          </a>
          - <small>
            posted <?php echo $article['article_timestamp']; ?>
          </small>
        </li>
      <?php } ?>
      </ol>

      <br />
       <small><a href="admin">admin</a></small>

    </div>
  </body>
</html>
