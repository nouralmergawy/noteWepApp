<?php
//start session
if(!isset($_SESSION)){ 
    session_start(); 
} 
// Create connection
include_once 'DBConector.php';
//get data
$email = $_POST['email-ln'];
$pass = $_POST['password-ln'];
$password = md5($pass);
//Perform query
$result = "SELECT * FROM users WHERE email ='$email' && password ='$password'";
$query = mysqli_query($conn, $result);
if (mysqli_num_rows($query)>0) {
    $row =mysqli_fetch_array($query);
    $_SESSION['id'] = $row['id'];
    header("Location: http://localhost/webproject/home.php");
}else{
    echo'wrong email or password please try again redirect...';
    header("refresh:2;url= http://localhost/webproject/index.php?");
}
?>