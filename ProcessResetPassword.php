<?php
if (isset($_POST["submit-email"])) {
    
    $selectortoken = bin2hex(random_bytes(8));
    $realtoken = random_bytes(32);

    $url = "www.superworkmates.com/createNewPassword.php?selector=".$selectortoken."&validator=".bin2hex($realtoken);
    $tokenexpiry = date("U") + 1800;

    require_once 'connections/dbconnect.php';

    $userEmail = mysqli_real_escape_string($connect, $_POST['email']);

    $sql = "DELETE FROM passreset WHERE resetEmail=?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Sorry, Connection Error";
        exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }

        $newsql = "INSERT INTO passreset (resetEmail, resetSelectorToken, resetRealToken, resetExpires) VALUES (?,?,?,?);";
        $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $newsql)) {
        echo "Sorry, Connection Error";
        exit();
        }
        else {
            $hashedToken = password_hash($realtoken, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selectortoken, $hashedToken, $tokenexpiry);
            mysqli_stmt_execute($stmt);
        }
    mysqli_stmt_close($stmt);
    mysqli_close($stmt);

/*Sending the email */
$to = $userEmail;
$subject = 'Password Reset for Superworkmates.com';
$message = '<p> We received a request to change your password. Here is your password reset link: </p>';
$message .= '<a href="'.$url.'">'.$url.'</a>';
$button = '<p><a href="'.$url.'"><button> Reset Password </button></a></p>';

$header = "From: <support@superworkmates.com>\r\n";
$header .= "Reply-To: support@superworkmates.com \r\n";
$header .="Content-type: text/html\r\n";

mail($to,$subject, $message, $button, $header);

header("Location:resetpassword.php?reset=success");

}
/*else if not set - button*/
else {
    header ("Location:index.php?error=stop");
       exit();
}
