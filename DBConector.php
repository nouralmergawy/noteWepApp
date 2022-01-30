<?php
$url ='localhost';
$username ='root';
$passwordDb='';
$conn = mysqli_connect($url,$username,$passwordDb,'webproj');
if(!$conn){
    die('Could not Connect My Sql:' .$conn());
 }
 ?>