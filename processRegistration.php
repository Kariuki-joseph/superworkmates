<?php
include('dbConnect.php');

if (isset($_POST['register'])) {
	//retrive form values
	$firstName=mysqli_real_escape_string($connect,$_POST['firstName']);
	$lastName=mysqli_real_escape_string($connect,$_POST['lastName']);
	$userName=mysqli_real_escape_string($connect,$_POST['userName']);
	$email=mysqli_real_escape_string($connect,$_POST['email']);
	$phone=mysqli_real_escape_string($connect,$_POST['phone']);
	$password=mysqli_real_escape_string($connect,$_POST['password']);
	$cPassword=mysqli_real_escape_string($connect,$_POST['cPassword']);
//check if both passwords match
	if ($password!=$cPassword) {
		$_SESSION['error']='Passwords do not match. Please try again';
		header('Location:registerWorkmates.php');
	}else{
		//encrypt password
		$hashedPassword=hash(MD5, $password);

		//insert records to the db
		$sql="INSERT INTO workmates(firstName,lastName,username,email,phone,password) VALUES('$firstName','$lastName','$userName','$email','$phone','$hashedPassword')";
		//check if records were inserted
		if (mysqli_query($connect,$sql)) {
		echo "Records were successfully inserted";
		header('Location:index.php');
		}

	}

}
?>