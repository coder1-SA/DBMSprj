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

$conn ->select_db($database) or die( "Unable to select database");

if(isset($_POST["upload"]))
{
 if($_FILES['product_file']['name'])
 {
  $filename = explode(".", $_FILES['product_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['product_file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $id = mysqli_real_escape_string($conn, $data[0]);
    $password = mysqli_real_escape_string($conn, $data[1]);  
    $name = mysqli_real_escape_string($conn, $data[2]);
    $dept = mysqli_real_escape_string($conn, $data[3]);
    $bal = mysqli_real_escape_string($conn, $data[4]);
    
    $query = "insert into teacher values('$id','$password','$name','$dept',$bal)";
    mysqli_query($conn, $query);

   $buys_ins = "INSERT into buys values(NULL,'$id',NULL,NULL)";
   mysqli_query($conn,$buys_ins);
   }
   fclose($handle);

  }
  else
  {
   $message = '<label class="text-danger">Please Select CSV File only</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select File</label>';
 }
}

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
     <h6 style='margin-left:85%;margin-top:-2%;'>hi <?php echo $_SESSION['pass']?></h6>
     <div class='dropdown'>
     <div class='dropbtn' style='margin-left:1075px;margin-top:-50px;'><i class="fas fa-user-circle"></i></div>
     <div class="dropdown-content">
     <a href="settings.php">Account Settings</a>
    <a href="./borrow.php">Borrow</a>
    <a href="./mybooks.php">Return a book</a>
    <a href="./addbooks.php">Donate a book</a>
    <a href="#">Information</a>
    <a href="./signout.php">Signout</a>
  </div>
    </div>
    <a style="text:decoration:none;color:red" href="./dashboard.php?loggedin=1"><input style="margin-left:70%;margin-top:5%;color:blue;width:140px;height:40px;" type="button" value="To dashboard"></a>

    <form method="post" enctype='multipart/form-data'>
    <p style="margin-top:10%;margin-left:10%"><label>Please Select File(Only CSV Formate)</label>
    <input type="file" name="product_file" /></p>
    <br />
    <input style="margin-left:10%" type="submit" name="upload" class="btn btn-info" value="Upload" />
   </form>
</section>
</body>
</html>