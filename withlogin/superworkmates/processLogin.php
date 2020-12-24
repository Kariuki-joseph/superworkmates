<?php
include('dbConnect.php');
if (isset($_POST['login'])) {
	//retrieve user input
	$email=mysqli_real_escape_string($connect,$_POST['email']);
	$password=mysqli_real_escape_string($connect,$_POST['password']);

	//check if such a user exists
	$result="SELECT * FROM workmates WHERE password=$password AND email=$email";
	//check if a user exists
	if (mysqli_num_rows($result)>0) {
		header('Location:index.php');
	}else{
		header('Location:loginWorkmates.php');
	}

}	
?>