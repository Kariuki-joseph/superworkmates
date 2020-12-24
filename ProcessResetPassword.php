<?php
if (isset($_POST["submit-email"])) {
    header ("Location:resetpassword.php");
    echo 'Karibu';
}
else {
    header ("Location:resetpassword.php?error=stop");
     echo "Oops!";
       exit();
}
