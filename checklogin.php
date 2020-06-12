<?php
	session_start();


$con = mysqli_connect('localhost','root');
	if($con){
		echo"connection";
	}

	mysqli_select_db($con,'online_library');


	$usn = $_POST['usn1'];
	$pass = $_POST['pass1'];

$q = " SELECT * FROM register WHERE usn1 = '$usn' && pass1='$pass' ";

$result = mysqli_query($con,$q);

$row_num = mysqli_num_rows($result);
if($row_num == 1){
	$_SESSION['usn1'] = $usn;
	
	$row = mysqli_fetch_row($result);
	$_SESSION['name1']= $row[0];
	$userquery = " INSERT INTO usn1(usn1) VALUES ('$usn')";
	$userresult = mysqli_query($con,$userquery) ;

	header('location:dashboard.php');	
}else{

	header('location:studentlogin.html');
}



?>