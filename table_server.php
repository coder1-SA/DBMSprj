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


   if(isset($_GET["name"]))
   {
     $genere = $_GET["name"];
           
     $sql = "SELECT isbn,`name`,publication,genere,permission FROM books WHERE genere='$genere'";
     $result = mysqli_query($conn, $sql);
    // $row = '';
    $send = array();
    $j=1;
  
    foreach($result as $row)
{
    $book_name = $row["name"];
    $publication = $row["publication"];
    $genere = $row["genere"];
    $permission = $row["permission"];
    $book_id = $row["isbn"];
    $results[] = array("book_name" => $book_name, "publication" => $publication, "genere" => $genere, "permission" => $permission, "book_id" => $book_id);
}

    echo json_encode($results);
            
           // $x[j] = "<tr><td>".$row["name"]."</td><td>".$row["publication"]."</td><td>".$row["genere"]."</td><td>".$row["permitions"]."</td><td>".$row["issued"]."</td><td><input type='submit' class = 'issues' id = ".$row["isbn"]." value = 'issue'></td></tr>";
    

   }
   
?>