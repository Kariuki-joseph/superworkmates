<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
</head>
<body>
    <form action="getimage.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submitnow">Upload</button>
    </form>
<?php
    require_once 'getimage.php';
    echo'

<img src="profileimages/$fileNewName" alt="No Image found!">
';
?>
</body>
</html>