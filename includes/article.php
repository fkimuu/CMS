<?php

class Article{

  public function fetch_all(){
    global $conn;
    $items  = array();

    $sql="SELECT * FROM article";
    $result= mysqli_query($conn,$sql);

    if(!$result){
      die("Database access failed : " . mysqli_error());
    }else{
      $rows = mysqli_num_rows($result);

      // get number of rows returned

       if ($rows) {
          while ($row = mysqli_fetch_array($result)) {
                $items[] = $row;
                // echo 'ID:' . $row['article_id'] . '<br>';
                // echo 'Title' . $row['article_title'] . '<br>';
         }
       }else{
             echo "Die!!! row is empty";
            }
            //mysqli_close($conn); //close the database connection
          }

          return $items;
 }

  public function fetch_data($article_id){
   global $conn;
  $items= array();

      $sql= "SELECT * FROM article WHERE article_id= '$article_id'";
      $query= mysqli_query($conn,$sql);

      if(!$query){
        echo "Database access failed";
      }else{
        $rows= mysqli_num_rows($query);

          if($rows){
            while($row= mysqli_fetch_array($query)){
              $items = $row;
            }
          }else{
            echo "Row is empty";
          }
      mysqli_close($conn);
      }

    return $items;
    }

  }





 ?>
