<?php

session_start();

require_once '../includes/connection.php';
require_once '../includes/article.php';

$article=new Article;
$articles=$article->fetch_all();

if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in']==true)){
  //display delete.php
  if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="DELETE FROM article WHERE article_id='$id'";
    $query=mysqli_query($conn,$sql);
    header('Location:index.php');

  }
  ?>

  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>CMS Blog</title>
      <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
      <div class="container">
        <a href="demo.php" id="logo">CMS</a>
          <br />

          <h4>Select An Article to Delete</h4>

           <form action="delete.php" method="get">
             <select onchange="this.form.submit();" name="id">
               <?php foreach ($articles as $article) { ?>
                    <option value="<?php echo $article['article_id']; ?>">
                      <?php echo $article['article_title']; ?>
                    </option>
                 // code...
               <?php } ?>

             </select>
           </form>
      </div>
    </body>
  </html>


  <?php
}else{
  header('Location:index.php');
}




 ?>
