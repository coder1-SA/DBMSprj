<?php
  session_start();
  $servername = "localhost";
$username = "root";
$password = "";
$database = "online_library";

$conn = new mysqli($servername, $username, $password,$database);
 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    if(isset($_GET["value"])){
       $balance = $_GET["value"];
       $id = $_SESSION["id"];
       if($_SESSION["teacher"]){
         $admin = "teacher";
       }
       else{
         $admin = "student";
       }

       $select_bal = "SELECT bal FROM $admin WHERE id='$id'";
       $res = mysqli_query($conn,$select_bal);
       foreach($res as $r){
         $bal = $r["bal"];
       }

       $balance+=$bal;
          $sql_update = "UPDATE $admin SET bal = $balance WHERE `id`= '$id'";
          mysqli_query($conn,$sql_update);
          echo "balance updated"; 
      }
?>