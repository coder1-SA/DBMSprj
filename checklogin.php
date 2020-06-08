<?php
	session_start();


$con = mysqli_connect('localhost','root');
	if($con){
		echo"connection";
	}

	mysqli_select_db($con,'register');


	$usn = $_POST['usn1'];
	$pass = $_POST['pass1'];

$q = " select * from register1 where usn1 = '$usn' && pass1='$pass' ";

$result = mysqli_query($con,$q);

$row = mysqli_num_rows($result);

if($row == 1){
	$_SESSION['usn1'] = $usn;

	$userquery = " insert into usn1(usn1) values ('$usn')";
	$userresult = mysqli_query($con,$userquery) ;

	header('location:home.html');	
}else{

	header('location:studentlogin.html');
}



?>