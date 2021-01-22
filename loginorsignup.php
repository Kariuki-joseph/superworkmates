<div class="bb">
  <h4>Log In</h4>
    <button class="bg-super-8 border-0 py-2 px-3 btn" onclick="login()">Login <i class="fa fa-sign-in"></i></button>
<!--Forgot Password-->
      <?php
      if (isset($_GET['success'])) {
        if ($_GET['success'] == "password=reset=successful") {
          echo '<p class="signupsucess">Your password has been reset successfully. <br>Now log in ith your new password!</p>';
        }
      }
      ?>
      <br>
      <a href="resetpassword.php">I forgot my password!</a>
<!--Sign Up-->
  <h4>Sign Up</h4>
  <a href="signup.php"> <button class="bg-super-8 px-2 btn py-2">Create Account  <i class="fa fa-user-plus"></i></button> </a>
</div>

