<?php

     include "db.php";
if (isset($_POST["sign_in"])) {
	$Username=mysqli_real_escape_string($conn,$_POST["Username"]);
	$Password=mysqli_real_escape_string($conn,$_POST["Password"]);
	$passwordAgain=mysqli_real_escape_string($conn,$_POST["passwordAgain"]);
	$email=mysqli_real_escape_string($conn,$_POST["email"]);
	$firstname=mysqli_real_escape_string($conn,$_POST["firstname"]);
	$lastname=mysqli_real_escape_string($conn,$_POST["lastname"]);
	$_date=mysqli_real_escape_string($conn,$_POST["_date"]);
	$Gender=mysqli_real_escape_string($conn,$_POST["Gender"]);
	
	$posts="no";
	$stuts="unverify";
	$ver_code=mt_rand();
	if ($Password==$passwordAgain) {
	

	if (strlen($Password  )<8) {
		echo "<script> alert('Password must be 8 charachter ')</script>";
		exit();
	}
	$checkemail="SELECT * from usern where email='$email'";
	$res=mysqli_query($conn, $checkemail);
	$check = mysqli_num_rows($res) ;
	if ($check==1 ) {
	echo "<script> alert('Email already exit please try new ')</script>";
		exit();
	}
	
	$sql="INSERT into usern (Username, Password, passwordAgain, email,firstname , lastname,_date,Gender,user_date,stuts,ver_code,posts)

	 values('$Username','$Password', '$passwordAgain', '$email', '$firstname', '$lastname', $_date,'$Gender', NOW(), '$stuts','$ver_code', '$posts' ) ";
	$query=mysqli_query($conn, $sql);
	if ($query) {
		echo "<script> alert('success')</script>";
		exit();
		$_SESSION["email"]=$email;
		
	}else {
		echo "not ttttttttttttttt";
	}

	}else {
		echo "<script> alert('Password is not mutch ')</script>";
		exit();
	}
	
	
}



 ?>
 