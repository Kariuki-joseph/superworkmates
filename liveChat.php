<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="bootstrap/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
                setInterval(function(){
                $('#online-Status-Receiver').load('receiverauto.php');
                }, 7000) /* time in milliseconds (ie 1000 = 1 seconds)*/
    </script>
    <script>
                setInterval(function(){
                $('#online-Status-Sender').load('senderauto.php');
                }, 5000) /* time in milliseconds (ie 1000 = 1 seconds)*/
    </script>
    <title>Messaging</title>
</head>
<body>
<?php
 include 'parts/header.php';
?>
    <div class="sender">
        <h4>Sender Part</h4>
            <div id="online-Status-Sender">

            </div>
        
    </div>
    
    <div class="receiver">
        <h4>Receiver Part</h4>
        <div class="receiver-autoloader">
            <?php
            echo 'Hello';
            ?>
            <div id="online-Status-Receiver">
            
            </div>
        </div>
    </div>
</body>
</html>