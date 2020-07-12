<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_library";

$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);

if(isset($_POST["name1"])){
$name=$_POST["name1"];
$usn=$_POST["usn1"];
$dept=$_POST["dept1"];
$sem=$_POST["sem1"];
$pass=$_POST["pass1"];
$secamt=$_POST["secamt1"];



$sql = "INSERT INTO student VALUES ('$usn','$pass','$name',$sem,'$dept',$secamt)";
$sql2 = "INSERT INTO buys values(NULL,'$usn',NULL,NULL)";

$res = mysqli_query($conn, $sql);
mysqli_query($conn, $sql2);

header("location:login.php");
}
?>