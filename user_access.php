<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "online_library";
     
     $conn = new mysqli($servername, $username, $password,$database);
      
     if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
     }
     $conn ->select_db($database) or die( "Unable to select database");
    

    if(isset($_GET["change_pass"])){
        $pass = $_GET["change_pass"];
        $sql = "DELETE FROM student WHERE id='$pass'";
        $res = mysqli_query($conn, $sql);
        echo json_encode($pass);
    }

?>