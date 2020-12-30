<?php
//try uploading the image
  $folder="item-images/";
  $fileName = $folder.$_FILES['images']['name'];
  $fileExt = pathinfo($fileName,PATHINFO_EXTENSION);
  // die($fileExt);
  $tmpName = $_FILES['images']['tmp_name'];
  if (move_uploaded_file($tmpName, $fileName)) {
    echo "Upload successful";
  }else{
    echo "Unable to upload your data";
  }

?>