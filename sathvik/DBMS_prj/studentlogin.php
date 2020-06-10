<!DOCTYPE html>
<html>
<head>
	<title>Student login page</title>
	<link rel="stylesheet" type="text/css" href="css/studentlogin.css">
</head>
<body>
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
echo "Connected successfully";

$conn ->select_db($database) or die( "Unable to select database")
?>
	<div class="student"><img src="images/student.png"></div>
	<div class="hi"><img id="hi" src="images/hi.png"></div>
	<div class="wave1"></div>
	<div class="main">
		<div id="login"><img src="images/bmslogo.png" alt="BMSCE"/><p>login<p></div>
		<form action="studentlogin.php" method="POST">
			<p><i class="fa fa-user" aria-hidden="true"></i> ID</p>
			<input id="user" type="text" name="ID" placeholder="Please Enter ID" autocomplete="off"/><br><br>
			<p><i class="fa fa-lock" aria-hidden="true"></i> Password</p>
			<input id="pass" type="Password" name="pass1" placeholder="Please Enter Password" autocomplete="off"/><br><br>
			<input class="sub" type="submit" value="SIGN IN"><br>
			<a class="a" href="index3.html">Create an Account</a>
			<a class="b" href="#">Forgot Password?</a>
		</form>
		<?php
		   $id=$password="";
		   $id = (isset($_POST['ID']) ? $_POST['ID'] : '');
		   $password = (isset($_POST['pass1']) ? $_POST['pass1'] : '');
		   $password = strtolower($password);
		   $sql = "SELECT * FROM student WHERE id = $id"; 
		   $result = mysqli_query($conn, $sql);
		   $row = '';
		   $row = mysqli_num_rows($result);
		   //echo $row;
		   if($row == 1){
			while($row = mysqli_fetch_assoc($result)) {
				if($row['pass']==$password){
					$_SESSION['id'] = $id;
					$_SESSION['pass'] = $password;
					header('location:dashboard.php');
				}
				else
				echo "<h5 style=color:red>Please enter a valid password</h5>";
			  }
		}
		   else
		   echo "<h5 style='color:red'>Please enter a valid password</h5>";
		?>
		
	</div>
	<div class="wave2"></div>
</body>
</html>