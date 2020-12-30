<?php
include ('components/header.php');
include('components/navbar.php');
?>
<div class="inputForm">
 <div class="welcome">
      <h3>Welcome back to Superworkmates: </br>No Need To Work Alone! <br>Fill out the details to login.</h3>
      </div>
<form action="processLogin.php" method="POST">
<div class="form-group">
		<label><b>Email</b></label>
		<input type="email" name="email" class="form-control" placeholder="Email">
	</div>
	
<div class="form-group">
		<label><b>Password</b></label>
		<input type="password" name="password" class="form-control" placeholder="Password">
	</div>
<input type="submit" name="login" value="Login">
</form>
</div>

<?php
include('components/footer.php');
?>