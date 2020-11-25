<?php
session_start();
include('dbConnect.php');
if (isset($_POST['login_admin'])) {
	//get the form values
	$email=mysqli_real_escape_string($connect,$_POST['email']);
	$password=mysqli_real_escape_string($connect,$_POST['password']);
//check the details if they do match
	$query=mysqli_query($connect,"SELECT * FROM admin WHERE email='$email' AND password='$password'");
	if(mysqli_num_rows($query)>0){
		//set session for this admin
		$_SESSION['admin']=$email;
		header('Location:admin.php');
	}else{
		//echo an error
		$_SESSION['error']='User access denied';
		header('Location:admin_login.php');
	}


}

?>