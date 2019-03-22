<?php

session_start();
require_once '../includes/connection.php';

if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in']==true) ){

  header('Location:../demo.php');
  exit();

}else{

  //echo "Session is empty";
  if(isset($_POST['submit'])){
    //display login
    if(isset($_POST['username']) && isset($_POST['password'])){
      $username=$_POST['username'];
      $password=md5($_POST['password']);

      if(empty ($username) or empty($password)){
        $error="All fields are required!";
      }
      elseif ($username!='admin' && $password!='password') {
        $error= "Incorrect details";
      }else{
        //$items=array();
        $sql="SELECT * FROM users WHERE user_name='$username' AND password='$password'";

        $query=mysqli_query($conn,$sql);

         if(!$query){
           $error= "Database access failed";
         }else{
           $rows= mysqli_num_rows($query);

             if($rows){
               $_SESSION['logged_in'] = true;
               header('Location:../demo.php');
               exit();
             }else{
               $error="Row is empty";
             }
         mysqli_close($conn);
         }


         //return $items;
           }
      }


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
       <a href="index.php" id="logo">CMS</a>
         <br /> <br />

           <?php if(isset($error)) { ?>
             <small style= "color:#aa0000;"><?php echo $error; ?></small>
           <?php } ?>
          <form action="index.php" method="post">
            <input type="text" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />
            <input type="submit" name="submit" value="Login" />

          </form>
     </div>
   </body>
 </html>

 <?php


  ?>
