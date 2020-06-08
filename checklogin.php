<?php
	session_start();


$con = mysqli_connect('localhost','root');
	if($con){
		echo"connection";
	}

	mysqli_select_db($con,'register');


	$username = $_POST['username1'];
	$password = $_POST['password1'];

$q = " select * from weather where username1 = '$username' && password1='$password' ";

$result = mysqli_query($con,$q);

$row = mysqli_num_rows($result);

if($row == 1){
	$_SESSION['username1'] = $username;

	$userquery = " insert into username1(username1) values ('$username')";
	$userresult = mysqli_query($con,$userquery) ;

	header('location:index.html');	
}else{

	header('location:studentlogin.html');
}



?>