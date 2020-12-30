<?php
session_start();
include_once 'connections/dbconnect.php';
if (isset ($_POST ['submitnow'])) {
  $file = $_FILES['file'];

  $fileName =$_FILES['file']['name'];
  $fileTempName =$_FILES['file']['tmp_name'];
  $fileType =$_FILES['file']['type'];
  $fileSize =$_FILES['file']['size'];
  $fileError =$_FILES['file']['error'];
  $fileExt = explode ('.' , $fileName);
  $fileActualExt = strtolower (end($fileExt));
  $allowed = array('jpg', 'jpeg', 'png', 'gif');

  if (in_array ($fileActualExt, $allowed)) {
     if ($fileError === 0) {
         if ( $fileSize <10485760) {
            $uid = $_SESSION ['userid'];
             //$fileNewName = "profileimages/".uniqid ('', true). "." .$fileActualExt;
             $fileNewName = "profileimages/".$uid. "." .$fileActualExt;
             //die($fileNewName);
             $fileDestination = $fileNewName;
             move_uploaded_file ($fileTempName, $fileDestination);

            $uid = $_SESSION['userid'];
$profpic = "UPDATE theusers SET profpic = '$fileNewName' WHERE id = '$uid'";
// die($profpic);  
// $stmt = mysqli_stmt_init ($connect);
//         if (!mysqli_stmt_prepare( $stmt, $profpic)) {
//             header ("Location: ../index.php?error=sqlerror");
//             exit();
//         }
if (!mysqli_query($connect,$profpic)) {
    header ("Location: ../index.php?error=sqlerror");
}
             header ("Location: index.php");
            
         } else {
            $_SESSION['error']='File size must not be more than 10 mbs. <br> Please try uploading another file!';
            header ("Location: index.php");
         }
         
     } else {
        $_SESSION['error']='There was an error uploading your file. <br> Please try uploading another file!';
        header ("Location: index.php");
     }
     
  }
  else {
    $_SESSION['error']='Only .jpg, .jpeg, .png, and .gif images are allowed.';
      header ("Location: index.php");
  }

}

