<?php
include('parts/header.php');
?>
<div class="container">
	<h3>About Superworkmates</h3>
	<p>Welcome to superworkmates.com.We are here to make sure that you don't work alone. Get workmates on SuperWorkmates and collaborate in your projects. You can also get ideas on how to accomplish your ever pending projects here at Superworkmates.com. Stay logged in to get regular updates on Superworkmates.com, as we try to make it your ultimate solution. For any concerns, feel free to let us know and will greatly appreciate.
	NICE TIME ALL!</p><br>
	<p><i>From the superworkmates Team</i></p>
</div>

<!--feedback section-->
<div class="container bg bg-white pt-5 pb-5 mb-5">
	<center><h3>Plese leave your feedback or comment here</h3></center>
	<?php
	if(isset($_SESSION['error'])){
	?>
	<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert">&times</a>
	<?php echo $_SESSION['error'];
	unset($_SESSION['error']);?>
	</div>
	<?php
}elseif(isset($_SESSION['success'])) {
	?>
	<div class="alert alert-success">
	<a href="#" class="close" data-dismiss="alert">&times</a>
	<?php echo $_SESSION['success'];
	unset($_SESSION['success']);?>
	</div>
	<?php
}
	?>
	<form method="POST" action="processFeedback.php">

		<div class="form-group">
			<input type="text" name="email" placeholder="Enter your email" class="form-control">
		</div>

		<div class="form-group">
			<input type="text" name="title" placeholder="Message title" class="form-control">
		</div>

		<div class="form-group">
			<label>Type your message below</label>
			<textarea name="message" class="form-control"></textarea>
			
		</div>
		<button type="submit" name="send" class="btn btn-success"><i class="fa fa-paper-plane"></i> Send</button>
		<button type="reset" name="reset" class="btn btn-warning ml-3"><i class="fa fa-undo"></i> Reset</button>
	</form>
</div>
<?php
include('parts/footer.php');
?>