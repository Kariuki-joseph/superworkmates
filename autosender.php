<?php
//include_once 'parts/header.php';

?>
    <p class="pl-4">Sent Message is here</p>

<?php
require 'connections/dbconnect.php';
session_start();

/*delete users entry from table*/

if (isset($_SESSION['username'])) {

        $deleteguy = "DELETE FROM ifislive WHERE senderid =?;";

            $senderid = $_SESSION ['userid'];

                        $stmt = mysqli_stmt_init ($connect);
                        if(!mysqli_stmt_prepare($stmt, $deleteguy)) {
                            echo 'Sorry, Connection problem -from delete command!';
                            exit();
                        }
                        else {
                            mysqli_stmt_bind_param ($stmt, "i", $senderid);
                            mysqli_stmt_execute($stmt);
                        }

        /*enter last seen into table*/
        $trigger = "INSERT INTO ifislive (theDateTime, senderid, receiverid) VALUES (?,?,?);";
                        $stmt = mysqli_stmt_init($connect);
                        if(!mysqli_stmt_prepare($stmt, $trigger)) {
                        // header ("Location: refresh.php?error=sqlregerror");
                            exit();
                        }
                        else {
                            $senderid =$_SESSION ['userid'];
                            $receiverid = 47;
                            $currentDateTime = date("U");

                            mysqli_stmt_bind_param($stmt, "sii", $currentDateTime, $senderid, $receiverid);
                            mysqli_stmt_execute ($stmt);
                        // header ("Location: refresh.php?error=none");
                            exit();
                        }
} else {
    echo 'You are not logged in!';
    exit();
}

?>
