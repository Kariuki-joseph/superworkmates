<!DOCTYPE html>
<html lang="eng">

<head>      
<link rel="stylesheet" href="css/mainstyles.css">

<title> Sign Up </title>


</head>
<body>

<?php
include_once 'parts/header.php';

//dbconnect
 require_once 'connections/dbconnect.php';
 ?>

<h2>Sign Up Here:</h2>
 <!--sign-up-error messages-->
<div class="errortab">
<?php

if (isset ($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
       echo '<p class="signuperror">Please fill in all fields.</p>';
    }
    elseif ($_GET['error'] == "invalidemail") {
        echo '<p class="signuperror">Please enter a valid <strong>email</strong>.</p>';
    }
    elseif ($_GET['error'] == "invalidusername") {
        echo '<p class="signuperror">Please enter a valid <strong>username</strong>.<br> Letters and numbers are allowed. Underscore allowed. Hyphen allowed. Dot allowed.</p>';
    }
    elseif ($_GET['error'] == "passesnotmatching") {
        echo '<p class="signuperror"><strong>Passwords do not match</strong>.</p>';
    }
    elseif ($_GET['error'] == "email-exists") {
        echo '<p class="signuperror">A user with that <strong>email</strong> already <strong>exists</strong>.</p>';
    }
    elseif ($_GET['error'] == "sqlerror") {
        echo '<p class="sqlsignuperror">Sorry, something went wrong. Our developers are working on it</p>';
    }
    elseif ($_GET['error'] == "sqlregerror") {
        echo '<p class="sqlsignuperror">Sorry, something went wrong. Our developers are working on it</p>';
    }
    elseif ($_GET['error'] == "none") {
        echo '<p class="signupsucess"> <strong>You Have Successfully Registered.Welcome</strong></p>';
        }
    elseif ($_GET['error'] == "phone-exists") {
      echo '<p class="signuperror">The <strong>phone number</strong> you entered already exists.Please check the number and try again.<br>If you already have an account, please <a href="index.php">log in</a> instead.</p>';
      }
    elseif ($_GET['error'] == "phonedigitsnot10") {
      echo '<p class="signuperror">Please make sure the <strong>phone number</strong> you entered has all 10 digits.</p>';
      }
    elseif ($_GET['error'] == "passtooshort") {
      echo '<p class="signuperror">Password too short.<br>Please make sure it is at least 5 characters long.</p>';
      }
}

?>
<!--sign-up form-->
<div class="theform">
   <form action="connections/processSignup.php" method="post" class="signupform">
            <div class=inform>
            <label for="username">Favourite Name:</label> 
              <input type="text" name="username" placeholder="Favourite Name" value="<?php
                    if(isset($_GET['username'])){
                    echo $_GET['username'];}
                    ?>">
            </div>
            <div class=inform>
            <label for="email">Email:</label> 
              <input type="text" name="email" placeholder="Email" value="<?php
                    if(isset($_GET['email'])){
                    echo $_GET['email'];}
                    ?>">
            </div>
            <div class=inform>
            <label for="phone">Enter your phone number (10 digits):</label> 
              <input type="number" name="phone" placeholder="Phone Number" value="<?php
                    if(isset($_GET['phone'])){
                    echo $_GET['phone'];}
                    ?>">
            </div>
            <div class=inform>
            <label for="password">Create a password</label> 
              <input type="password" name="password" placeholder="Create Password">
            </div>
            <div class=inform>
            <label for="password2">Confirm your password:</label> 
              <input type="password" name="password2" placeholder="Confirm Password">
            </div>
            <br>  
            <button type="submit" name="newsubmit" value="submit">Sign Up</button>
   </form>
</div>
<!--Fetching From Database-->

<?php
include_once 'parts/footer.php';
?>
</body>
</html>