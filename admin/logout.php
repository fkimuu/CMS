<?php

session_start();
unset($_SESSION);
session_destroy();
session_write_close();

header('Location:index.php');
exit;

 ?>

 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>CMS Blog</title>
     <link rel="stylesheet" href="../css/style.css" />
   </head>
   <body>
    <div style="float:right">
      <form align="right" name="logout" action="logout.php" method="post">
        <label class="logoutLblPos">
        <input type="submit" name="submit" value="Logout">
        </label>
      </form>
    </div>

   </body>
 </html>
