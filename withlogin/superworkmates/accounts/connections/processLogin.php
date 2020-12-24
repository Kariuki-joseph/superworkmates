<?php

/*require 'dbconnect.php';
$sql = "SELECT * FROM theusers";
$result = mysqli_query($connect,$sql);
$rowCount = mysqli_num_rows($result);

if ($rowCount > 0) { while ($row = mysqli_fetch_assoc($result)) {
    echo $row ['username'];
}
   
} else {
    echo "Nothing Found";
}
echo '<p>nice nice</p>'
?>
*/

if (isset ($_POST ["submit"])) {

    require_once 'dbconnect.php';
    $emailphone =  mysqli_real_escape_string($connect, $_POST['userid']);
    $password =  mysqli_real_escape_string($connect, $_POST['password']);

    if (empty($emailphone) || empty($password)) {
        header ("Location: .../index.php?error=emptyfields&username=".$username);
        exit();
    }
    else {
        $sqlenquery = "SELECT * FROM theusers WHERE phone = ? OR email = ?;";
        $stmt = mysqli_stmt_init ($connect);
        if (!mysqli_stmt_prepare($sqlenquery, $stmt)) {
            header ("Location: .../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param ($stmt, "is", $emailphone, $emailphone);
            mysqli_stmt_execute ($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify ($password, $row['hashedpassword']);
                if ($passCheck == false) {
                    header ("Location: .../index.php?error=passworderror");
                    exit();
                }
                elseif ($passCheck == true) {
                    session_start();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];

                    header ("Location: .../index.php?login=success");
                    exit();

                }
                else {
                    header ("Location: .../index.php?error=unknown");
                    exit();
                }
            }
            else {
                header ("Location: .../index.php?error=nouser");
                exit();
            }
        }

    }
}
else {
    header ("Location: .../index.php");
    exit();
}