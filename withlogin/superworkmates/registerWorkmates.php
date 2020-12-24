<?php
include ('components/header.php');
include('components/navbar.php');
?>
<div class="inputForm">
      <div class="welcome">
      <h3>Welcome to Superworkmates: </br> You Don't Have To Work Alone! <br>Please fill out the details to register and get started!</h3>
      </div>
      <?php if (isset($_SESSION['error'])) {
      	?>
      <div class="alert alert-danger">
      	<a href="#">&times</a>
      	<?php echo $_SESSION['error']; 
      	unset($_SESSION['error']);
      	?>
      </div>
      <?php
}
      ?>
<form action="processRegistration.php" method="POST">
	<div class="form-group">
		<label><b>First Name</b></label>
		<input type="text" name="firstName" class="form-control" placeholder="First Name">
	</div>
<div class="form-group">
		<label><b>Last Name</b></label>
		<input type="text" name="lastName" class="form-control" placeholder="Last Name">
	</div>
<div class="form-group">
		<label><b>Username</b></label>
		<input type="text" name="userName" class="form-control" placeholder="Username">
	</div>
<div class="form-group">
		<label><b>Email</b></label>
		<input type="email" name="email" class="form-control" placeholder="Email">
	</div>
	<div class="form-group">
		<label><b>Phone</b></label><small> Optional</small>
		<input type="number" name="phone" class="form-control" placeholder="Phone">
	</div>
<div class="form-group">
		<label><b>Password</b></label>
		<input type="password" name="password" class="form-control" placeholder="Password">
	</div>
<div class="form-group">
		<label><b>Confirm Password</b></label>
		<input type="password" name="cPassword" class="form-control" placeholder="Confirm Password">
	</div>

<input type="submit" name="register" value="Register">
</form>
</div>
<?php
include('components/footer.php');
?>