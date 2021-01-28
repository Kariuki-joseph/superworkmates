<?php
if (isset($_POST['buy-item'])) {
    include 'dbconnect.php';
    //get data
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $itemName = $_POST['item'];
    $userMessage = $_POST['message'];
   
    $message = "Hello, ".$username." has just sent a buy request to your item ".$itemName.". Contact him/her on: ".$phone.". Buyers message is: ".$userMessage.". <br> Thankyou.<br> Supeprworkmates-you don't have to work alone<br><br><br><br>";
    $message .="You are receiving this email because you listed your item for sale on superworkmates pricelist.";

    //users class
    require_once 'classes/db.php';
    require_once 'classes/user.php';
    $user = new User($_POST['sellerId']);
        /*Sending the email */
        $to = $user->get('email');
        $subject = 'Buy request for your item: '.'$itemName';
        $header = "From: <support@superworkmates.com>\r\n";
        $header .= "Reply-To: support@superworkmates.com \r\n";
        $header .="Content-type: text/html\r\n";

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
                    $error='Sorry. We are currently unable to process your request to buy '.$itemName.'. Plese try again later. Thank you.';
                    return $error;

                }
                else 
                {
                    $error='Your request to buy '.$itemName.' was successfully submitted. You will be contacted by the seller as soon as possible.<br> Keep visiting superworkmates pricelist for more items.<br> Thank you.';
                    return $error;

                }
            }
            
            $to   = $to;
            $from = 'support@superworkmates.com';
            $name = 'Superworkmates.com | Pricelist';
            $subj = $subject;
            $msg = $message;
            
            $error=smtpmailer($to,$from, $name ,$subj, $msg);
        
            $resp = array(
                'status'=>'?',
                'message'=>$error
            );
            echo json_encode($resp);
            exit();
  

}