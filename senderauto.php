<?php
$page = $_SERVER['PHP_SELF'];
$sec = "10";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <title>Sender Auto Load</title>
</head>
<body>
    <p>Sent Message is here</p>

<?php
require 'connections/dbconnect.php';
$trigger = "INSERT INTO ifalive (checkmessage, senderid, receiverid) VALUES (?,?,?);";
                $stmt = mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($stmt, $trigger)) {
                   // header ("Location: refresh.php?error=sqlregerror");
                    exit();
                        }
         
                 else {
                    $message = "1";
                    $senderid = 47;
                    $receiverid = 12;

                    mysqli_stmt_bind_param($stmt, "sii", $message, $senderid, $receiverid);
                    mysqli_stmt_execute ($stmt);
                   // header ("Location: refresh.php?error=none");
                    exit();
                 }
?>

</body>
</html>