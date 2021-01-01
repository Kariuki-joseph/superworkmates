<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
<?php
include_once 'parts/header.php';
?>
<!--When reset-->
<br>
<?php
if (isset ($_GET['reset'])) {
    if ($_GET['reset'] == "success") {
   echo '<p class="reset-success">Your reset link has been sent to your email.<br><strong>Please Check Your Email</strong>.</p>';
}
}
if (isset ($_GET['error'])) {
    if ($_GET['error'] == "tokenexpired") {
   echo '<p class="reset-error">Please re-submit your request. <br>Ensure you change your password within 30 minutes of submitting the reset request.</p>';
}
   elseif ($_GET['error'] == "token-not-same") {
    echo '<p class="reset-error">Please re-submit your request. <br>Ensure you clicked on the latest password reset email link.</p>';
   }
   elseif ($_GET['error'] == "sql-no-such-email") {
    echo '<p class="reset-error">Sorry, we are unable to reset the password for that email. <br>Please ensure you entered the correct email.</p>';
   }
}

if (!isset ($_GET['reset'])) {
?>
<!--Reset Email-->
<div id="resetPasswordWrapper">
    <h3>Password Reset:</h3>
    
    <p>An e-mail will be sent to you with instructions on how to reset your password</p>
    <p>Please enter your email here:</p>
    <!--Form-->
        <form action="processResetPassword.php" name="resetpassword" method="post" id="formPasswordReset">
            <label for="email">
                <input type="email" name="email" placeholder = "Your email here">
            </label>
            <button type="submit" name="submit-email">Next</button>
        </form>
</div>
</body>
<?php
}
?>
</html>