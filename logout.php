<?php 

    //start session
    session_start();
    //clear session
    session_unset();
    //destroy session
    session_destroy();

    header("Location: http://localhost/webproject/index.php");
?>