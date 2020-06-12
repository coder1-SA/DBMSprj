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


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/tables.css">
    <title>My Books</title>
</head>
<body>



        <section>
   <div class='header'>
     <form action="">
       <input class='bg-light search' type="text" placeholder='search for a book :)'>
       <i class="fas fa-search" style='background-color:#286fd7;color:white;padding:8px;margin-left:-4px;border-radius:5%;'></i>
     </form>
     <h6 style='margin-left:85%;margin-top:-2%;'>Hi &nbsp <?php echo $_SESSION['name1']?> </h6>
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

<table style="color:blue;border-spacing: 15px;text-align:center;border:5px solid black; width:1000px; margin-left:200px; margin-top:100px">
<tr>
<th>Name</th>
<th>Publication</th>
<th>Genere</th>
<th>Return</th>
</tr>


    <!-- data display-->
<div>
<?php
        $usn=$_SESSION['usn1'];
        $sql = "SELECT books.isbn,`name`,publication,genere FROM books JOIN borrow_return ON books.isbn = borrow_return.isbn";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr> <td>" . $row["name"]. "</td><td>" . $row["publication"]. "</td><td>" .$row["genere"]."</td><td><input value='Return' type='submit'></td></tr>";
                }
        } 
        
        else {
                echo "You've not borrowed any book.";
        }
        $conn->close();
?></div>

</table>




<!-- Side panal -->
   </div>
    <div class='side_bar'>
    <i class="fas fa-book-reader" style='margin-top:38%;margin-left:28%;color:whitesmoke'></i>
    <h5 style='margin-top:-13%;margin-left:45%;color:whitesmoke;'>Admin</h5>
     <hr class='bg-light' style='margin-top:11%;width:11em;'>
     <p style='color:white;font-weight:100;'><i class="fas fa-tachometer-alt" style='color:white;margin-left:35px;'></i><a style="color:white"href="dashboard.php">&nbsp&nbsp&nbsp Dashboard</a></p>
     <hr class='bg-light' style='margin-top:11%;width:11em;'>
    <p style='margin-top:-10px;margin-left:2px;font-size:10;color:#dadada;'>Interface</p>
    <p style='color:white;font-weight:100;'><i class="fas fa-cogs" style='color:white;margin-left:35px;'></i>&nbsp&nbsp&nbsp Settings</p>
    <hr class='bg-light' style='margin-top:11%;width:11em;'>
    <p style='margin-top:-10px;margin-left:2px;font-size:10;color:#dadada;'>View</p>
    <p style='color:white;font-weight:100;'><i class="fas fa-book-open" style='color:white;margin-left:35px;'></i>&nbsp&nbsp&nbsp New Additions</p>
    <p style='color:white;font-weight:100;'><i class="fas fa-book" style='color:white;margin-left:35px;'></i>&nbsp&nbsp&nbsp Upcomming</p>
    <hr class='bg-light' style='margin-top:11%;width:11em;'>
    <p style='margin-top:-10px;margin-left:2px;font-size:10;color:#dadada;'>Statistics</p>
    <p style='color:white;font-weight:100;'><i class="far fa-chart-bar" style='color:white;margin-left:35px;'></i><a style="color:white"href="charts.php">&nbsp&nbsp&nbsp Charts</a></p>
    <hr class='bg-light' style='margin-top:11%;width:11em;'>
    </div>
   </section>

   
   <img class="mySlides" src="img/shtheory.jpg">
<img class="mySlides" src="img/got.jpg" >
<img class="mySlides" src="img/elonmusk.jpg">
<img class="mySlides" src="img/harrypotter.png">
<img class="mySlides" src="img/got2.jpg">
<h5 style='margin-top:-300px;margin-left:53%;color:black'>New Collections</h5>
  </section>
   
    
    <script src="https://kit.fontawesome.com/fbe06f22f8.js" crossorigin="anonymous"></script>
    <script src="js/dashboard.js"></script>
        
</body>
</html>