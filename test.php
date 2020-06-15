<?php
  

   if(isset($_GET['name'])){
       $name = $_GET['name'];
       $ent = $_GET['ent'];
      


   $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "online_library";
 
 $conn = new mysqli($servername, $username, $password,$database);
  
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 
 $conn ->select_db($database) or die( "Unable to select database");
 


 $r = date("d")+15;
 $m=date("m");
 if($r>28 && $m==2)
 {
   $m++;
   $r-=28;

 }
 else if($r>30 && $m%2==0 && $m!=8)
 {
    $m++;
    $r-=30;
 }
 else if(($r<=30 && $m%2==0)||($r<=31 && $m%2!=0)||($r<31 && $m==8)){

 }
 else{
   $m++;
   $r-=31;
 }
 $return_date = date("Y")."-".$m."-".$r;



 $check = "select issues from borrow_return where isbn = $name";
 $res = mysqli_query($conn,$check);
 $row = '';
 $row = mysqli_num_rows($res);

  if($row>0){
      while($row = mysqli_fetch_assoc($res)){
          if($row["issues"] != 1){
            $sql = "update borrow_return set usn='$ent',date_issue='$todate',date_return='$return_date',issues=1 where isbn = '$name'";
            $update = mysqli_query($conn, $sql);
          }
          else
           echo json_encode($row["issues"]);
        }
  }
  
 
}
?>