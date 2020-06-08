<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$uname=$_POST["username1"];
$pass=$_POST["password1"];
$em=$_POST["email1"];
$ph=$_POST["phno1"];
//$email=$_POST["emailid"];
//$phno=$_POST["phonenumber"];

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}

$sql = "INSERT INTO weather (username1,password1,email1,phno1)
	VALUES ('$uname','$pass','$em','$ph')";

if ($conn->query($sql) === TRUE) {

echo "New record created successfully";

} else {															

echo "Error: " . $sql . "<br>" . $conn->error;

}

/*$sql = "SELECT username,password FROM weather";

$result = $conn->query($sql);

if ( $result->num_rows >0) {
    // output data of each row
    echo '<table>';
    echo '<tr>';
    echo'<th>SERIAL NO</th>
        <th>CHECKOUT TO</th>
        <th>ASSET TAG</th>
        <th>COMPANY</th>
        <th>ASSET NAME</th>
        <th>ORDER NO</th>
        <th>WARRANTY</th>';
    echo'<tr>';
    while($row = $result->fetch_assoc())  {
        echo '<tr>';
        echo '  <td>' . $row["Serial_no"] . '</td>';
        echo '  <td>' . $row["Checkout_to"] . '</td>';
        echo '  <td>' . $row["Asset_tag"] . '</td>';
        echo '  <td>' . $row["Company"] . '</td>';
        echo '  <td>' . $row["Asset_name"] . '</td>';
        echo '  <td>' . $row["Order_no"] . '</td>';
        echo '  <td>' . $row["Warranty"] . '</td>';
        echo '  </tr> ';                
    }
echo'</table>';
}
else {

echo "0 results";

}
*/
header("location:studentlogin.html");
$conn->close();

?>