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

$conn ->select_db($database) or die( "Unable to select database")
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
     <h6 style='margin-left:85%;margin-top:-2%;'>Hi &nbsp <?php echo $_SESSION['name1']?></h6>
     <div class='dropdown'>
     <div class='dropbtn' style='margin-left:1075px;margin-top:-50px;'><i class="fas fa-user-circle"></i></div>
     <div class="dropdown-content">
    <a href="#">Account</a>
    <a href="#">page 1</a>
    <a href="#">page 2</a>
    <a href="#">page 3</a>
    <a href="#">Information</a>
    <a href="#">Signout</a>
  </div>
    </div>
    
<form action="borrow.php" method="post">
<input type="submit" class="borrow" name="All" value="All">
<input type="submit" class="borrow" name="Thriller" value="Thriller">
<input type="submit" class="borrow" name="Autobiography" value="Autobiography">
<input type="submit" class="borrow" name="Sci-Fi" value="Sci-Fi">


</form>

<table class="table">
<tr>
 <th>Book name</th>
 <th>Publication</th>
 <th>Genere</th>
 <th>Availiable to</th>
 <th>Issued</th>
 <th> </th>
</tr>
<?php
  if (isset($_POST['All']))
  {
     $sql = "SELECT isbn,`name`,publication,`edition`,genere,permission,no_of_issues FROM books";
     $result = mysqli_query($conn, $sql);
    // $row = '';
     $row = mysqli_num_rows($result);
     if($row > 0){
       $i=1;
        while($row = mysqli_fetch_assoc($result)) {
            
            echo "<tr><td>".$row["name"]."</td><td>".$row["publication"]."</td><td>".$row["genere"]."</td><td>".$row["permission"]."</td><td>".$row["no_of_issues"]."</td><td><input type='submit' class = 'issues' id = ".$row["isbn"]." value = 'Issue'></td></tr>";
            $i++;
          }
    }
    
  }
?>
</table>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
   <script src="js/borrow.js"></script>
   
  <script src="https://kit.fontawesome.com/fbe06f22f8.js" crossorigin="anonymous"></script>
</body>
</html>