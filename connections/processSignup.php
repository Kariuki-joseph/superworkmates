<?php
//start session
session_start();
if (isset($_POST['newsubmit'])) {
    //add db connection
    require_once 'dbconnect.php';

//Get Form Data

    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $pass1 = mysqli_real_escape_string($connect, $_POST['password']);
    $pass2 = mysqli_real_escape_string ($connect,$_POST['password2']);
    //store values in sessions
    foreach($_POST as $key=>$value){
        $_SESSION[$key]=$value;
    }

    $phonenumbercount = mb_strlen((string) $phone);
    $passLength = mb_strlen((string) $pass1);

   // $hashedpassword = password_hash ($pass1, PASSWORD_DEFAULT);
    # code...,
 if (empty($username) || empty($email) || empty($phone) || empty($pass1) || empty($pass2)) {
        $_SESSION['error'] = 'Please fill in all fields.';
        header('Location: ../signup.php');
        exit();
    }
    
     elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $_SESSION['error'] = 'Please enter a valid <strong>email</strong>';
        header('Location: ../signup.php');
        exit();
        
     }

     elseif (!preg_match("/^[a-zA-Z0-9-_. ]*$/",$username)) {
         $_SESSION['error'] = 'Please enter a valid <strong>username</strong>.<br> Letters and numbers are allowed. Underscore allowed. Hyphen allowed. Dot allowed.';
       header('Location: ../signup.php');
        exit();
       
    }
    //check if number has 10 digits
    elseif ($phonenumbercount !== 10) {
        $_SESSION['error'] = 'Please make sure the <strong>phone number</strong> you entered has all 10 digits.';
        header('Location: ../signup.php');
        exit();
    }
    //check if passwords match
    elseif ($pass1 !== $pass2) {
        $_SESSION['error'] = '<strong>Passwords do not match</strong>.';
        header('Location: ../signup.php');
        exit();
    }
    //check if password has at least 5 characters long
    elseif ($passLength < 6) {
        $_SESSION['error'] = 'Password too short.<br>Please make sure it is at least 6 characters long.';
        header('Location: ../signup.php');
        exit();
    }
    else {
        $sqlcheck = "SELECT email FROM theusers WHERE email=?";
        $stmt = mysqli_stmt_init ($connect);

            if(!mysqli_stmt_prepare($stmt,$sqlcheck)) {
                $_SESSION['error'] = 'Sorry, something went wrong. Our developers are working on it';
                header('Location: ../signup.php');
        exit();
                    }

        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute ($stmt);
            mysqli_stmt_store_result ($stmt);
            $resultCheck = mysqli_stmt_num_rows ($stmt);

                if ($resultCheck > 0 ) {
                    $_SESSION['error'] = 'A user with that <strong>email</strong> already <strong>exists</strong>.';
                header('Location: ../signup.php');
        exit();

                }
//Check if phone number exists
        else {
            $sqlcheck = "SELECT phone FROM theusers WHERE phone=?";
            $stmt = mysqli_stmt_init ($connect);

            if(!mysqli_stmt_prepare($stmt,$sqlcheck)) {
                $_SESSION['error'] = 'Sorry, something went wrong. Our developers are working on it';
                header('Location: ../signup.php');
        exit();
                    }
        
        else {
            mysqli_stmt_bind_param($stmt, "i", $phone);
            mysqli_stmt_execute ($stmt);
            mysqli_stmt_store_result ($stmt);
            $resultCheck = mysqli_stmt_num_rows ($stmt);

                if ($resultCheck > 10 ) {
                    $_SESSION['error'] = 'The <strong>phone number</strong> you entered already exists.Please check the number and try again.<br>If you already have an account, please <a href="#" onclick="login()">log in</a> instead.';
                header('Location: ../signup.php');
        exit();

                }
        
        
//Allow a registration
            else {
                $inquery = "INSERT INTO theusers (username,email,phone,hashedpassword) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($stmt,$inquery)) {
                    $_SESSION['error'] = 'Sorry, something went wrong. Our developers are working on it';
                    header('Location: ../signup.php');
        exit();
                        }
                 else {
                     //unset all registration sessions
                     foreach($_POST as $key=>$value){
                        unset($_SESSION[$key]);
                        }

                    $hashedpassword = password_hash ($pass1, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssis", $username, $email, $phone, $hashedpassword);
                    mysqli_stmt_execute ($stmt);
                    $_SESSION['success'] = '<strong>You Have Successfully Registered.Welcome</strong>';
                    header ("Location:../index.php");
            
                $getuserid = "SELECT id FROM theusers WHERE email = '$email'";
                $query = mysqli_query ($connect, $getuserid);
                $result = mysqli_fetch_array($query);
                $userid = $result['id'];

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
