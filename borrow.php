<?php
  // include('studentlogin.php');
  session_start();
  $servername = "localhost";
$username = "root";
$password = "";
$database = "online_library";

$conn = new mysqli($servername, $username, $password,$database);
 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn ->select_db($database) or die( "Unable to select database");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mybooks.css">
    <link rel="stylesheet" href="css/borrow.css">
</head>
<body>
<section>
   <div class='header'>
    <h5>Bangalore public library</h5>
     <h6 style='margin-left:85%;margin-top:-2%;'>hi <?php echo $_SESSION["pass"]; ?></h6>
     <div class='dropdown'>
     <div class='dropbtn' style='margin-left:1200px;margin-top:-50px;'><i class="fas fa-user-circle"></i></div>
     <div class="dropdown-content">
     <a href="settings.php">Account Settings</a>
    <a href="./borrow.php">Borrow</a>
    <a href="./mybooks.php">Return a book</a>
    <a href="./addbooks.php">Donate a book</a>
    <a href="#">Information</a>
    <a href="./signout.php">Signout</a>
  </div>
    </div>

<div id="id"></div>
<?php 
   $get_gen = "SELECT DISTINCT `genere` FROM books";
   $res = mysqli_query($conn, $get_gen);
   $row = mysqli_num_rows($res);
   if($row > 0){
    $i=1;
    echo "<div style='display:flex;justify-content: space-around;'>";
     while($row = mysqli_fetch_assoc($res)) {
         echo "<input style='margin-left:10px;' type='button' class='submit_c btn btn-primary btn-lg active' role='button' aria-pressed='true' id= ".$row["genere"]." value=".$row["genere"]."> &nbsp&nbsp&nbsp"; 
         $i++;
       }
      echo "</div>";
 }

?>
<table class="table" id="table">
</table>

<p id="para"></p>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
   <script src="js/borrow.js?v=1"></script>
   <script src="js/borrow1.js?v=21"></script>
  <script src="https://kit.fontawesome.com/fbe06f22f8.js" crossorigin="anonymous"></script>
</body>
</html>