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
if (isset ($_SESSION['error'])){
  ?>
       <p class="signuperror"><?php echo $_SESSION['error']; unset($_SESSION['error']);?></p>
       
  <?php
    }else if(isset($_SESSION['success'])){
  ?>
      <p class="signupsucess"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></p>
  <?php
    }
  ?>
<!--sign-up form-->
<div class="theform">
  <div class="row p-5">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 bg-white">
    <form action="connections/processSignup.php" method="post" class="signupform">
                <div class="form-group">
                <label for="username">Favourite Name:</label>
                  <input type="text" name="username" value="<?php echo isset($_SESSION['username'])? $_SESSION['username'] : ''?>" placeholder="Favourite Name"  class="form-control">
                </div>
                <div class="form-group">
                <label for="email">Email:</label>
                  <input type="text" name="email" value="<?php echo isset($_SESSION['username'])? $_SESSION['email'] : ''?>" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                <label for="phone">Enter your phone number (10 digits):</label>
                  <input type="number" name="phone" value="<?php echo isset($_SESSION['username'])? $_SESSION['phone'] : ''?>" placeholder="Phone Number" class="form-control">
                </div>
                <div class="form-group">
                <label for="password">Create a password</label>
                  <input type="password" name="password" value="<?php echo isset($_SESSION['username'])? $_SESSION['password'] : ''?>" placeholder="Create Password" class="form-control">
                </div>
                <div class="form-group">
                <label for="password2">Confirm your password:</label>
                  <input type="password" name="password2" value="<?php echo isset($_SESSION['username'])? $_SESSION['password2'] : ''?>" placeholder="Confirm Password" class="form-control">
                </div>
                </br>
                <button type="submit" name="newsubmit" value="submit" class="btn-super mb-3">Sign Up</button>
    </form>
    </div>
    <div class="col-sm-3"></div>
  </div>
</div>
<!--Fetching From Database-->

<?php
include_once 'parts/footer.php';
?>
</body>
</html>
