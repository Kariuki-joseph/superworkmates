<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!--javascript page reload -->
<!--<script language="javascript">
    setInterval(function(){
    window.location.reload(1);
    }, 10000);
</script>
-->
<!-- javascript-->
<!--ajax method-->
<!--
setInterval(function(){
   $('#my_div').load('/path/to/server/source');
}, 2000) /* time in milliseconds (ie 2 seconds)*/
<br>
-->
<!--ajax-->
<p>Received Message is here</p>

<?php
require 'connections/dbconnect.php';
/*check if user is online*/
$ifisOnline = "SELECT * FROM ifislive WHERE receiverid=?";

    $receiverid = 47;
    $currentUnixDateTime = date("U");

            $stmt = mysqli_stmt_init ($connect);
            if(!mysqli_stmt_prepare($stmt,$ifisOnline)) {
                header ("Location: refresh.php?error=sqlerror");
                exit();
                    }
        
            else {
                mysqli_stmt_bind_param($stmt, "i", $receiverid);
                mysqli_stmt_execute ($stmt);
                $resultUser = mysqli_stmt_get_result($stmt);
                //$resultCheck = mysqli_stmt_num_rows ($stmt); //cannot work together with mysqli_stmt_num_rows
               // $resultArray = mysqli_stmt_get_result($stmt); //can not work together with mysqli_stmt_num_rows

               while($row = mysqli_fetch_assoc($resultUser)) {
                // echo $row['readstatus'] . "<br>";
                $onlineStatus = $row['readstatus'];
                $lastUpdate = $row['theDateTime'];
                $lastSeen = $row['id'];
                $onlineStatusChecker = $currentUnixDateTime - $lastUpdate;

               if ($onlineStatusChecker >= 7) {
                    echo 'Admin is Offline <br> Admin was Last Online at ' .$lastSeen;
                    exit();
                }
                elseif ($onlineStatusChecker < 7) {
                    echo 'Admin is Online <br>';
                    exit();
                }
                
                else {
                    echo 'System Time Error!';
                    exit();
                }
                
            }

        }
            

/*check how many users are online*/
    $ask = "SELECT * FROM ifislive";
    $result = mysqli_query($connect,$ask);
    $rowCount = mysqli_num_rows($result);

    echo '<br> ';
    echo $rowCount .' users in the system';
    /*echo '<br> ';
    echo date('U');
    echo '<br> ';
    echo time();
    echo '<br> ';
    echo $currentUnixDateTime;
    echo'<br>';*/
   
 //   $date = date('DATE_RFC2822');
  //  echo $date;
  //echo'<br>';
/*$timezone = date_default_timezone_get();
echo "The current server timezone is: " . $timezone;*/
?>

</body>
</html>