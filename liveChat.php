<!DOCTYPE html>
<html lang="en">
<?php
 include 'parts/header.php';
 require_once 'classes/db.php';
 require_once 'classes/dbh.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="bootstrap/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
                setInterval(function(){
                $('#online-Status-Receiver').load('autoreceiver.php');
                }, 7000) /* time in milliseconds (ie 1000 = 1 seconds)*/
    </script>
    <script>
                setInterval(function(){
                $('#online-Status-Sender').load('autosender.php');
                }, 5000) /* time in milliseconds (ie 1000 = 1 seconds)*/
                //load chat messages
                setInterval(() => {
                    
                }, 700);
    </script>
    <title>Live Chat</title>
</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <ul class="users">
                <?php 
                $DBUsers = new DBH();
                $users = $DBUsers->getTable('chats');

                ?>
                <li class="user user-active bg-super-9" data-userId="48">Joseph Njenga</li>
                <li class="user bg-super-9" data-userId="11">Joel</li>
                <li class="user bg-super-9" data-userId="49">Mwaniki Simon</li>
                <li class="user bg-super-9" data-userId="4">Esther Nyokabi</li>
                <li class="user bg-super-9" data-userId="5">Jane Muthoni</li>
                <li class="user bg-super-9" data-userId="6">Ruth Wamuyu</li>
                <li class="user bg-super-9" data-userId="7">John Maina</li>
                <li class="user bg-super-9" data-userId="8">Esther Nyokabi</li>
                <li class="user bg-super-9" data-userId="9">Jane Muthoni</li>
                <li class="user bg-super-9" data-userId="10">Ruth Wamuyu</li>
                <li class="user bg-super-9" data-userId="11">John Maina</li>
            </ul>
        </div>
        <div class="col-sm-12">
        <div class="receiver" data-receiver="">
        <h4 class="pl-4">Receiver Part</h4>
        <div class="receiver-autoloader">
            <div id="online-Status-Receiver"></div>
            <div class="d-flex justify-content-center"><strong>
                <i class="receiver-name"></i>
            </strong></div>
            <ul class="messages">
                <li class="message"></li>
            </ul>
        </div>
    </div>
        </div>
    </div>
    <div class="sender container my-3">
        <form action="" id="formSendChat">
    <!--input text-->
	<div class="input-wrapper d-flex">
        <?php
        //logged in users can send messages
        $canSend = ((isset($_SESSION['userid']) || isset($_SESSION['userid']))) ? true : false ;
        ?>
		<input type="text" name="chatInput" id="chatInput" class="form-control ml-3 br-50" placeholder= "<?= $canSend ? 'Type your message here...' : 'Login to send chats...' ;?>" <?=$canSend ? "": "disabled";?>>
		<button class="btn btn-send mr-3 ml-2" id="btnSend" <?=$canSend ? "": "disabled";?>><span class="fa fa-paper-plane" style="padding:15px;"></span></button>
	</div>
    <!--input text-->
        </form>
    </div>
    
    <?php
    //jquery and bootstrap js
    require_once 'general-scripts-sources.php';
    ?>
    <script src="js/liveChat.js"></script>
</body>
</html>