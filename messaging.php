<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messaging</title>
</head>
<body>
    <div class="sender">
        <h4>Sender Part</h4>
        <div class="sender-autoloader">
            <?php
            include 'senderauto.php';
            ?>
        </div>
    </div>
    
    <div class="receiver">
        <h4>Receiver Part</h4>
        <div class="receiver-autoloader">
            <?php
            include 'receiverauto.php';
            ?>
        </div>
    </div>
</body>
</html>