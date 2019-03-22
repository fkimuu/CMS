<?php

session_start();
require_once '../includes/connection.php';

if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in']==true)){
  //display add.php
  if(isset($_POST['title'],$_POST['content'])){
    $title=$_POST['title'];
    $content=nl2br($_POST['content']);
    if(empty($title) || empty($content)){
      $error="All fields are required";
    }else{
      $content = mysqli_real_escape_string($conn,$content);
      $sql="INSERT INTO article (article_title,article_content) VALUES('$title','$content')";
      $query=mysqli_query($conn,$sql);
      print_r($query);
      //die($query);

      if(!$query){
        $error="Database access failed";
      }else{
          header('Location:index.php');
          exit();
      }
      mysqli_close($conn);
    }
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

          <h4>Add Article</h4> <br />

           <?php if(isset($error)){ ?>
           <small style="color:#aa0000;"><?php echo $error; ?></small>
         <?php } ?>

          <form action="add.php" method="post">
            <input type="text" name="title" placeholder="Title" /> <br /> <br />
            <textarea rows="30" cols="50" name="content" placeholder="Content"></textarea> <br /> <br />
            <input type="submit" name="submit" value="Add Article">

          </form>
      </div>
    </body>
  </html>

<?php
  }else{

    header('Location:index.php');
  }


 ?>
