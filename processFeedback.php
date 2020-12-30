<?php
//start sesion
session_start();
include('dbConnect.php');
if (isset($_POST['send'])) {
	//retrieve user input
	$email=mysqli_real_escape_string($connect,$_POST['email']);
	$title=mysqli_real_escape_string($connect,$_POST['title']);
	$message=mysqli_real_escape_string($connect,$_POST['message']);
	//check if the fields are empty
	if (!empty($email)&&!empty($title)&&!empty($message)) {

		//Insert the records to the database
	$insertFeedback=mysqli_query($connect,"INSERT INTO feedbacks(email,title,message) VALUES('$email','$title','$message')");
	//check if inserted
	if ($insertFeedback) {
	$_SESSION['success']='Your feedback was successfully submitted';
	header('Location:about.php');
		
	}else{
		$_SESSION['error']='Unable to upload your feedback. Plese try again';
		header('Location:about.php');
	}

	}else{
		$_SESSION['error']='All the above fields are required';
		header('Location:about.php');
	
		
	}
	
	

}	
?>