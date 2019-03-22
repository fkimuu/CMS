<?php

require_once 'includes/connection.php'; //included connection.php, initialises db connection
require_once 'includes/article.php'; //initializes the class that contains supporting function

$article= new Article;

if(isset($_GET['id'])){
  $id= $_GET['id'];
  $data= $article->fetch_data($id);
  //print_r($data);
  //[0]['article_title']
      ?>
          <html lang="en" dir="ltr">
            <head>
              <meta charset="utf-8">
              <title>CMS Blog</title>
              <link rel="stylesheet" href="css/style.css" />
            </head>
            <body>
              <div class="container">
                <a href="index.php" id="logo">Life of a Poet</a>
                  <h4><?php echo $data['article_title']; ?> -<small> posted <?php echo $data['article_timestamp']; ?></small>
                  </h4>
                  <p><?php echo $data['article_content']; ?></p>
                  <a href="index.php">&larr; Back</a>
              </div>
            </body>
        </html>
  <?php
}else{
  header('Location:index.php');
  exit();
}

 ?>
