<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Password</title>
</head>
<body>
<?php
include_once 'parts/header.php';
?>

<!-- Token Validation -->

<?php
    $theselector = $_GET["selector"];
    $thevalidator = $_GET["validator"];

    if (isset ($_GET['error'])) {
        if ($_GET['error'] == "passnotsame") {
        echo '<p class="reset-error">The passwords you entered do not match. <br>Please ensure there are no typing errors.</p>';
       }
       elseif ($_GET['error'] == "emptyfields") {
        echo '<p class="reset-error">Enter your new password. <br>Remember to confirm it on the second box.</p>';
       }
    }

    if (empty($theselector) || empty($thevalidator)) {
        echo "Sorry, we could not validate your request. <br>Please use the link in you received in your email to reset your password!";
    }
    else {
        if (ctype_xdigit($theselector) == true && ctype_xdigit($thevalidator) == true) {
            ?>
                <form action="processChangePassword.php" name="resetpassword" method="post">
                    <input type="hidden" name="selector" value = "<?php echo "$theselector";?>">
                    <input type="hidden" name="validator" value = "<?php echo "$thevalidator";?>">
                    <label for="password">
                        <input type="password" name="password1" placeholder = "Enter New Password Here">
                    </label>
                    <label for="password">
                        <input type="password" name="password2" placeholder = "Confirm New Password Here">
                    </label>
                    <button type="submit" name="change-password">Create New Password</button>
                </form>


            <?php
        }
    }


?>

        
    <a href=""></a>
</body>
</html>