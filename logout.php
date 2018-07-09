<?php

    session_start();
    session_destroy();
    if (isset($_SESSION)) {
     	$_SESSION["email"]=$email;
     	header("location: index.php");
     } 





 ?>