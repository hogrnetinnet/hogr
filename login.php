<?php


  include "db.php";
  if (isset($_POST['login'])) {
  	$email=mysqli_real_escape_string($conn,$_POST["email"]);
	$Password=mysqli_real_escape_string($conn,$_POST["Password"]);
	$sql="SELECT * from usern  where email='$email' and Password='$Password' and stuts='verifey'";
	$result=mysqli_query($conn,$sql);
	$check_users=mysqli_num_rows($result);
	if ($check_users==1) {
		$_SESSION["email"]=$email;
		echo "<script> window.open (' home.php', '_self')</script>";
	
		
	}else {
		echo "<script> alert ('incorect detail')</script>";
		
	}
  }






 ?>