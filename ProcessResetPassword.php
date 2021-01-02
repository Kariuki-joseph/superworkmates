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
$message .= '<p><a href="'.$url.'"><button> Reset Password </button></a></p>';
$header = "From: <support@superworkmates.com>\r\n";
$header .= "Reply-To: support@superworkmates.com \r\n";
$header .="Content-type: text/html\r\n";

// mail($to,$subject, $message, $button, $header);

// header("Location:resetpassword.php?reset=success");


require "phpMailer/PHPMailer/PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'superworkmates.com';
        $mail->Port = 465;  
        $mail->Username = 'support@superworkmates.com';
        $mail->Password = '5 Potatoex1';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From="support@superworkmates.com";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            header("Location:resetpassword.php?reset=fail");

        }
        else 
        {
            header("Location:resetpassword.php?reset=success");

        }
    }
    
    $to   = $to;
    $from = 'support@superworkmates.com';
    $name = 'Superworkmates.com';
    $subj = $subject;
    $msg = $message;
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg);
}
/*else if not set - button*/
else {
    header ("Location:index.php?error=stop");
       exit();
}
