<?php
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
             $fileNewName = uniqid ('', true). "." .$fileActualExt;
             $fileDestination = 'profileimages/'.$fileNewName;
             move_uploaded_file ($fileTempName, $fileDestination);

             header ("Location: myprofile.php?upload=success");
            
         } else {
            echo '<p style= "color:red;"> File size must not be more than 10 mbs. <br> Please try uploading another file!</p>';
         }
         
     } else {
        echo '<p style= "color:red;"> There was an error uploading your file. <br> Please try uploading another file!</p>';
     }
     
  }
  else {
      echo '<p style= "color:red;"> Only .jpg, .jpeg, .png, and .gif images are allowed.</p>';
  }

}
