<?php

require 'connections/dbconnect.php';

if(isset($_POST['change-password'])) {
    $aselector = $_POST['$theselector'];
    $avalidator = $_POST['$thevalidator'];
    $anewpass1 = mysqli_real_escape_string($connect, $_POST['password1']);
    $anewpass2 = mysqli_real_escape_string($connect, $_POST['password2']);

    if (empty($anewpass1) || empty($anewpass2)) {
        header ("Location:createNewPassword.php?error=emptyfields&selector=".$aselector."&validator=".$avalidator);
        exit();
    }
    elseif ($anewpass1 != $anewpass2) {
        header ("Location:createNewPassword.php?error=passnotsame&selector=".$aselector."&validator=".$avalidator);
        exit();
    }

    /*Selecting user needing password change */
    $currentDate = date("U");

    $theSql = "SELECT * FROM passrest WHERE resetSelectorToken =? AND resetExpires >=? ;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $theSql)) {
        echo "Sorry, Connection Error";
        exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $theselector, $currentDate);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if (!$row = mysqli_fetch_assoc($result)) {
                header ("Location:resetpassword.php?error=tokenexpired");
                exit();
            }
            else {
                $tokenBin = hex2bin($avalidator);
                $tokenCheck = password_verify($tokenBin, $row["resetRealToken"]);

                if ($tokenCheck == false) {
                    header ("Location:resetpassword.php?error=token-not-same");
                    exit();
                }
                elseif ($tokenCheck == true) {
                    
                    $tokenEmail = $row['resetEmail'];

                    $resetPassSql = "SELECT * FROM theusers WHERE email =?;";

                    $stmt = mysqli_stmt_init($connect);
                    if (!mysqli_stmt_prepare($stmt, $resetPassSql)) {
                        echo "Sorry, Connection Error";
                        exit();
                        }
                        else {
                            mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            $theresult = mysqli_stmt_get_result($stmt);
                            if (!$therow = mysqli_fetch_assoc($theresult)) {
                                header ("Location:resetpassword.php?error=sql-no-such-email");
                                exit();
                            }
                            else {
                                $changePassSql = "UPDATE theusers SET hashedpassword =? WHERE email =?;";

                                $stmt = mysqli_stmt_init($connect);
                                if (!mysqli_stmt_prepare($stmt, $changePassSql)) {
                                    echo "Sorry, Connection Error";
                                    exit();
                                    }
                                    else {
                                        $theNewHashedPass = password_hash($anewpass1, PASSWORD_DEFAULT);
                                        mysqli_stmt_bind_param($stmt, "ss", $theNewHashedPass, $tokenEmail);
                                        mysqli_stmt_execute($stmt);
                                        
                                        $otherSql = "DELETE FROM passreset WHERE resetEmail =?;";

                                        $stmt = mysqli_stmt_init($connect);
                                        if (!mysqli_stmt_prepare($stmt, $otherSql)) {
                                            echo "Sorry, Connection Error";
                                            exit();
                                            }
                                            else {
                                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                                mysqli_stmt_execute($stmt);
                                                header("Location:index.php?success=password=reset=successful")
                                            }
                                    }
                            }
                        }

                }
            }


        }

    


}
/*else if not set - button*/
else {
    header ("Location:index.php?error=stop");
       exit();
}

?>