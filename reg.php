<?php 
include_once 'DBConector.php';
//get data
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$password = md5($pass);
$sql = "INSERT INTO users (username,email,password) 
        VALUES ('$username','$email','$password')";

	 if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost/webproject/index.php");

	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
?>