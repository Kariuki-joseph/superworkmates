<?php
if (isset ($_POST ["submit"])) {

    require_once 'dbconnect.php';
    $emailphone =  mysqli_real_escape_string($connect, $_POST['userid']);
    $password =  mysqli_real_escape_string($connect, $_POST['password']);

    if (empty($emailphone) || empty($password)) {
        header ("Location: ../index.php?error=emptyfields&username=".$username);
        exit();
    }
    else {
        $sqlenquery = "SELECT * FROM theusers WHERE phone = ? OR email = ?;";
        $stmt = mysqli_stmt_init ($connect);
        if (!mysqli_stmt_prepare( $stmt, $sqlenquery)) {
            header ("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param ($stmt, "is", $emailphone, $emailphone);
            mysqli_stmt_execute ($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify ($password, $row['hashedpassword']);
                if ($passCheck == false) {
                    header ("Location: ../index.php?error=passworderror");
                    exit();
                }
                elseif ($passCheck == true) {
                    session_start();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['userid'] = $row['id'];

                    header ("Location: ../index.php");
                    exit();

                }
                else {
                    header ("Location: ../index.php?error=unknown");
                    exit();
                }
            }
            else {
                header ("Location: ../index.php?error=nosuchuserhere");
                exit();
            }
        }

    }
}
else {
    header ("Location: ../index.php");
    exit();
}