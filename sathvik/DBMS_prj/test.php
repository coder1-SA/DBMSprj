<?php
  

   if(isset($_GET['name'])){
       $name = $_GET['name'];
       $ent = $_GET['ent'];
       echo $name;
       echo $ent;
   }
   $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "online_library";
 
 $conn = new mysqli($servername, $username, $password,$database);
  
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 
 $conn ->select_db($database) or die( "Unable to select database")

 //$sql = "INSERT"
 
     //$x =  $_SESSION['id'];
?>
