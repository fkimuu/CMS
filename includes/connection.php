<?php



$conn=mysqli_connect("localhost","root", "" ,"cms") or die("!!!! Connection error");

//check Connection

if(!$conn){
  die("Connection failed:" .mysqli_connect_error());
}else{

  //echo "Connected successfully <br />";
}



 ?>
