<?php
include ('components/header.php');
?>
<div class="inputForm">
	<h3>Welcome Admin</h3>
	<?php
	if (isset($_SESSION['error'])) {
	?>
	<div class="alert alert-danger">
		<a href="#" data-dismiss="alert" class="close">&times</a>
		<?php echo $_SESSION['error'];  unset($_SESSION['error']);?>
	</div>
	<?php
}
	?>
<form action="processLoginAdmin.php" method="POST">
<div class="form-group">
		<label><b>Email</b></label>
		<input type="email" name="email" class="form-control" placeholder="Email">
</div>
	
<div class="form-group">
		<label><b>Password</b></label>
		<input type="password" name="password" class="form-control" placeholder="Password">
</div>
<input type="submit" name="login_admin" value="Login">
</form>
</div>

<?php
include('components/footer.php');
?>