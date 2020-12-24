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

   // $hashedpassword = password_hash ($pass1, PASSWORD_DEFAULT);
    # code...,
 if (empty($username) || empty($email) || empty($phone) || empty($pass1) || empty($pass2)) {
        header ("Location: ../signup.php?error=emptyfields&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        header ("Location: ../signup.php?error=invalidemailandusername&phone=".$phone);
       exit();
       
    }

     elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         header ("Location: ../signup.php?error=invalidemail&username=".$username."&phone=".$phone);
        exit();
        
     }

     elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        header ("Location: ../signup.php?error=invalidusername&email=".$email."&phone=".$phone);
       exit();
       
    }
    elseif ($pass1 !== $pass2) {
        header ("Location: ../signup.php?error=passesnotmatching&username=".$username."&email=".$email."&phone=".$phone);
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
                    header ("Location: ../signup.php?error=emailtaken&username=".$username."&phone=".$phone);
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
                    header ("Location:../signup.php?error=none");
                    exit();
                    }
            }
        }
    }
mysqli_stmt_close ($stmt);
mysqli_close ($connect);
    //$inquery = "INSERT INTO theusers(username,email,phone,hashedpassword) VALUES ('$username','$email','$phone','$hashedpassword')";
     
   // if (mysqli_query($connect,$inquery)) {
    //    echo 'user added successfully';
   // }
   // else {echo 'ERROR:' .mysqli_error($connect);}

   }
else { /*echo "Button Issues";*/
         header ("Location: ..signup.php");
         exit();
}



//First Trial Using Prepared Statemets-->

/*
if

    //error checking
    if (empty ( ($username) ||($email) || ($password1) || ($password2)) ) {
       header ("Location: ../signup.php?error=emptyfields&username=".$username);
       exit();
    } 
    elseif ($password1 !== $password2) {
        header ("Location: ../signup.php?error=passwords do not match&username=".$username);
        exit(); 
    {
        $sql = "SELECT email FROM theusers WHERE email = ?";
        $stmt = mysqli_stmt_init($dbconnect);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header ("Location: ../signup.php?error=sqlerror");
        exit();
        } else {
            mysqli_stmt_bind_param($stmt,"s", $email);
            mysqli_stmt_execute ($stmt);
            mysqli_stmt_store_result ($stmt);
            $rowCount = mysqli_stmt_num_rows ($stmt);

            if ($rowCount > 0) {header ("Location: ../signup.php?error=email already registered");
                exit(); }
                else {
                    $sql = "INSERT INTO theusers (username, email, password1) VALUES (?,?,?)";
                    $stmt = mysqli_stmt_init ($dbconnect);

                    if (!mysqli_stmt_prepare($stmt,$sql)) {
                        header ("Location: ../signup.php?error=sqlerror");
                    exit(); 
                    } else {
                        $hashedPass = password_hash ($password1, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param ($stmt, username, email, $hashedPass);
                        mysqli_stmt_execute ($stmt);
                        header ("Location: ../signup.php?SUCCESS=You are Registered");
        exit(); 
                    }

                }
        }
    }
    }
    mysqli_stmt_close($stmt);
    mysqli_close ($dbconnect);
} 
*/
?>