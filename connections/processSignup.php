<?php
if (isset($_POST['newsubmit'])) {
    //add db connection
    require_once 'dbconnect.php';

//Get Form Data

    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $pass1 = mysqli_real_escape_string($connect, $_POST['password']);
    $pass2 = mysqli_real_escape_string ($connect,$_POST['password2']);

    $phonenumbercount = mb_strlen((string) $phone);
    $passLength = mb_strlen((string) $pass1);

 if (empty($username) || empty($email) || empty($phone) || empty($pass1) || empty($pass2)) {
        header ("Location: ../signup.php?error=emptyfields&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    }
    
     elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         header ("Location: ../signup.php?error=invalidemail&username=".$username."&phone=".$phone);
        exit();
        
     }

     elseif (!preg_match("/^[a-zA-Z0-9-_.]*$/",$username)) {
        header ("Location: ../signup.php?error=invalidusername&email=".$email."&phone=".$phone);
       exit();
       
    }
    //check if number has 10 digits
    elseif ($phonenumbercount !== 10) {
        header ("Location: ../signup.php?error=phonedigitsnot10&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    }
    //check if passwords match
    elseif ($pass1 !== $pass2) {
        header ("Location: ../signup.php?error=passesnotmatching&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    }
    //check if password has at least 5 characters long
    elseif ($passLength < 5) {
        header ("Location: ../signup.php?error=passtooshort&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    }
    else {
        $sqlcheck = "SELECT email FROM theusers WHERE email=?";
        $stmt = mysqli_stmt_init ($connect);

            if(!mysqli_stmt_prepare($stmt,$sqlcheck)) {
                header ("Location: ../signup.php?error=sqlerror");
                exit();
                    }

        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute ($stmt);
            mysqli_stmt_store_result ($stmt);
            $resultCheck = mysqli_stmt_num_rows ($stmt);

                if ($resultCheck > 0 ) {
                    header ("Location: ../signup.php?error=email-exists&username=".$username."&phone=".$phone);
                exit();

                }
//Check if phone number exists
        else {
            $sqlcheck = "SELECT phone FROM theusers WHERE phone=?";
            $stmt = mysqli_stmt_init ($connect);

            if(!mysqli_stmt_prepare($stmt,$sqlcheck)) {
                header ("Location: ../signup.php?error=sqlerror");
                exit();
                    }
        
        else {
            mysqli_stmt_bind_param($stmt, "i", $phone);
            mysqli_stmt_execute ($stmt);
            mysqli_stmt_store_result ($stmt);
            $resultCheck = mysqli_stmt_num_rows ($stmt);

                if ($resultCheck > 0 ) {
                    header ("Location: ../signup.php?error=phone-exists&username=".$username."&email=".$email."&phone=".$phone);
                exit();

                }
        
        
//Allow a registration
            else {
                $inquery = "INSERT INTO theusers (username,email,phone,hashedpassword) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($stmt,$inquery)) {
                    header ("Location: ../signup.php?error=sqlregerror");
                    exit();
                        }
         
                 else {
                    $hashedpassword = password_hash ($pass1, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssis", $username, $email, $phone, $hashedpassword);
                    mysqli_stmt_execute ($stmt);
                    header ("Location:../index.php?error=none");
//                    exit();

                $getuserid = "SELECT id FROM theusers WHERE email = '$email'";
                $query = mysqli_query ($connect, $getuserid);
                $result = mysqli_fetch_array($query);
                $userid = $result['id'];

                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['userid'] = $userid;
        

                    exit();

                    }
             }

            }

         }

        }
    }
mysqli_stmt_close ($stmt);
mysqli_close ($connect);

   }
else { 
         header ("Location: ..signup.php");
         exit();
}


?>