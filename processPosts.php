<?php
//start session
session_start();
//include db connection
include('dbConnect.php');
//include config
include('config.php');

/////////////////////delete trend///////////////////////////
if (isset($_POST['deleteTrend'])) {
//get the trend id
	$id=mysqli_real_escape_string($connect,$_POST['deleteId']);
//delete sql
	$sql_delete=mysqli_query($connect,"DELETE FROM trends WHERE id='$id'");
	//check of successful deletion
	if ($sql_delete) {
		$_SESSION['success']='The trend post was successfully deleted.';
		header('Location:admin.php');
	}else{
		$_SESSION['error']='Unable to delete this trend. Please try again.';
		header('Location:admin.php');
	}
}

////////////////////////update trend///////////////////////////
elseif (isset($_POST['submit'])) {

	//retrieve form values
$author=mysqli_real_escape_string($connect,$_POST['author']);
$title=mysqli_real_escape_string($connect,$_POST['title']);
$category=mysqli_real_escape_string($connect,$_POST['category']);
$body=mysqli_real_escape_string($connect,$_POST['body']);

//image fetching
$folder="uploads/";
//file name
$fileName=$folder.basename($_FILES['image']['name']);
$fileName2=$folder.basename($_FILES['image2']['name']);
//file size
//$fileSize=$_FILES['image']['size'];
//file type
//$fileType=$_FILES['image']['type'];
//file extension
$fileExt=pathinfo($fileName,PATHINFO_EXTENSION);

//insert
$sql="INSERT INTO trends(author,title,body,image,image2,category) VALUES ('$author','$title','$body','$fileName','$fileName2','$category')";
$insert=mysqli_query($connect,$sql);

//check if insert successful
if ($insert) {	
#upload the file
move_uploaded_file($_FILES['image']['tmp_name'], $fileName);
move_uploaded_file($_FILES['image2']['tmp_name'], $fileName2);

$_SESSION['success']='Insert successful';
	header('Location:admin.php');
}else{
$_SESSION['error']='Insert unsuccessful. Please try again.';
header('Location:admin.php');
}

}

///////////////add a trend entry///////////
elseif (isset($_POST['update'])) {
//retrieve form values
$author=mysqli_real_escape_string($connect,$_POST['author']);
$title=mysqli_real_escape_string($connect,$_POST['title']);
$body=mysqli_real_escape_string($connect,$_POST['body']);
$updateId=mysqli_real_escape_string($connect,$_POST['deleteId']);
//update
$sql="UPDATE trends SET author='$author',title='$title',body='$body' WHERE id='$updateId'";
$update=mysqli_query($connect,$sql);

//check if insert successful
if ($update) {
$_SESSION['success']='Update successful';
	header('Location:admin.php');
}else{
$_SESSION['error']='Update unsuccessful. Please try again.';
header('Location:admin.php');
}
}

/////////////////////////update the images//////////
elseif (isset($_POST['updateImage1'])) {
//image fetching
$folder="uploads/";
//file name
$fileName=$folder.basename($_FILES['image']['name']);
//file size
//$fileSize=$_FILES['image']['size'];
//file type
//$fileType=$_FILES['image']['type'];
//file extension
$fileExt=pathinfo($fileName,PATHINFO_EXTENSION);

//insert
$sql="UPDATE trends SET image='$fileName'";
$query=mysqli_query($connect,$sql);
if ($query) {
	#upload the file
move_uploaded_file($_FILES['image']['tmp_name'], $fileName);

	$_SESSION['success']='Image update was successful';
	header('Location:admin.php');
}else{

	$_SESSION['error']='Image update was unsuccessful';
	header('Location:admin.php');
}
	
}
elseif (isset($_POST['updateImage2'])) {
	
//image fetching
$folder="uploads/";
//file name
$fileName=$folder.basename($_FILES['image2']['name']);
//file size
//$fileSize=$_FILES['image']['size'];
//file type
//$fileType=$_FILES['image']['type'];
//file extension
$fileExt=pathinfo($fileName,PATHINFO_EXTENSION);

//insert
$sql="UPDATE trends SET image2='$fileName'";
$query=mysqli_query($connect,$sql);
if ($query) {
	#upload the file
move_uploaded_file($_FILES['image2']['tmp_name'], $fileName);


	$_SESSION['success']='Image update was successful';
	header('Location:admin.php');
}else{
	
	$_SESSION['error']='Image update was unsuccessful';
	header('Location:admin.php');
}
}
////////////////insert personal project////////////////
elseif (isset($_POST['submit_personal_project'])) {
	//fetch the cover image
	$folder="uploads/";
	$cover_img=$folder.basename($_FILES['coverImg']['name']);

	//fetch form data
	$title=mysqli_real_escape_string($connect,$_POST['title']);
	$timeline=mysqli_real_escape_string($connect,$_POST['timeline']);
	$category=mysqli_real_escape_string($connect,$_POST['category']);
	$description=mysqli_real_escape_string($connect,$_POST['description']);
	$requirements=mysqli_real_escape_string($connect,$_POST['requirements']);
	$aim=mysqli_real_escape_string($connect,$_POST['aim']);
	$human_resource=mysqli_real_escape_string($connect,$_POST['human_resource']);

	//insert the data
	$sql="INSERT INTO personal_projects(title,category,timeline,description,requirements,aim,human_resource,cover_img) VALUES('$title','$category','$timeline','$description','$requirements','$aim','$human_resource','$cover_img')";
	$query=mysqli_query($connect,$sql);
	//check if records inserted
	if ($query) {		
	//upload the cover image
	move_uploaded_file($_FILES['coverImg']['tmp_name'], $cover_img);

		$_SESSION['success']='Records inserted successfully';
		header('Location:myOffice.php');
	}else{
		$_SESSION['error']='Unable to upload your data. Plese try again';
		header('Location:formPersonalProject.php');
	}
}
////////////////insert business project////////////////
elseif (isset($_POST['submit_business_project'])) {
//fetch the cover image
	$folder="uploads/";
	$cover_img=$folder.basename($_FILES['coverImg']['name']);

	//fetch form data
	$title=mysqli_real_escape_string($connect,$_POST['title']);
	$timeline=mysqli_real_escape_string($connect,$_POST['timeline']);
	$category=mysqli_real_escape_string($connect,$_POST['category']);
	$aim=mysqli_real_escape_string($connect,$_POST['aim']);
	$description=mysqli_real_escape_string($connect,$_POST['description']);
	$requirements=mysqli_real_escape_string($connect,$_POST['requirements']);
	$market=mysqli_real_escape_string($connect,$_POST['market']);
	$suppliers=mysqli_real_escape_string($connect,$_POST['suppliers']);
	$products=mysqli_real_escape_string($connect,$_POST['products']);
	$pricing=mysqli_real_escape_string($connect,$_POST['pricing']);
	$profits=mysqli_real_escape_string($connect,$_POST['profits']);
	$human_resource=mysqli_real_escape_string($connect,$_POST['human_resource']);
	$policies=mysqli_real_escape_string($connect,$_POST['policies']);

	//insert the data
	$sql="INSERT INTO business_projects(title,category,timeline,aim,description,requirements,market,suppliers,products,pricing,profits,human_resource,policies,cover_img) VALUES('$title','$category','$timeline','$aim','$description','$requirements','$market','$suppliers','$products','$pricing','$profits','$human_resource','$policies','$cover_img')";
	$query=mysqli_query($connect,$sql);
	//check if records inserted
	if ($query) {		
	//upload the cover image
	move_uploaded_file($_FILES['coverImg']['tmp_name'], $cover_img);

		$_SESSION['success']='Records inserted successfully';
		header('Location:myOffice.php');
	}else{
		$_SESSION['error']='Unable to upload your data. Plese try again';
		header('Location:formBusinessProject.php');
	}	
}
////////////////insert social project////////////////
elseif (isset($_POST['submit_social_project'])) {
//fetch the cover image
	$folder="uploads/";
	$cover_img=$folder.basename($_FILES['coverImg']['name']);

	//fetch form data
	$title=mysqli_real_escape_string($connect,$_POST['title']);
	$timeline=mysqli_real_escape_string($connect,$_POST['timeline']);
	$aim=mysqli_real_escape_string($connect,$_POST['aim']);
	$category=mysqli_real_escape_string($connect,$_POST['category']);
	$beneficiaries=mysqli_real_escape_string($connect,$_POST['beneficiaries']);
	$location=mysqli_real_escape_string($connect,$_POST['location']);
	$description=mysqli_real_escape_string($connect,$_POST['description']);
	$requirements=mysqli_real_escape_string($connect,$_POST['requirements']);
	$budget=mysqli_real_escape_string($connect,$_POST['budget']);
	$policies=mysqli_real_escape_string($connect,$_POST['policies']);
	$human_resource=mysqli_real_escape_string($connect,$_POST['human_resource']);

	//insert the data
	$sql="INSERT INTO social_projects(title,category,timeline,aim,location,description,requirements,budget,policies,human_resource,cover_img) VALUES('$title','$category','$timeline','$aim','$location','$description','$requirements','$budget','$policies','$human_resource','$cover_img')";
	$query=mysqli_query($connect,$sql);

	//check if records inserted
	if ($query) {		
	//upload the cover image
	move_uploaded_file($_FILES['coverImg']['tmp_name'], $cover_img);

		$_SESSION['success']='Records inserted successfully';
		header('Location:myOffice.php');
	}else{
		$_SESSION['error']='Unable to upload your data. Plese try again';
		header('Location:formSocialProject.php');
	}		
}
//////adding categories to the database//////////////////////
elseif (isset($_POST['add_category'])) {
	//get form values
$categoryName = mysqli_real_escape_string($connect,$_POST['categoryName']);
$category = new Category();

if ($category->add($categoryName)) {
	$_SESSION['success']='Category added successfully';
	header('Location:admin.php');
}else{
	$_SESSION['error']='Unable to add category. Please try again.';
	header('Location:admin.php');
}

}

?>