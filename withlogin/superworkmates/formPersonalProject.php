<?php
include('components/header.php');
?>
<div class="container">
	<?php   
if (isset($_SESSION['error'])) {
	?>
	<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times</a>
		<?php echo $_SESSION['error']; 
		unset($_SESSION['error']); ?>
	</div>
	<?php
	}elseif (isset($_SESSION['success'])) {
	?>
	<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert">&times</a>
		<?php echo $_SESSION['success'];
		unset($_SESSION['success']); ?>
	</div>
	<?php
	}
	?>
<form method="POST" action="processPosts.php" enctype="multipart/form-data">
	<center><h2>Please fill out the following form to post your personal project</h2></center>
<div class="form-group">
		<label>Project Title</label>
<input type="text" name="title" placeholder="Enter the title of yor project" class="form-control">
</div>
<select name="category" class="form-control">
	<option value="">--Select Category--</option>
	<option value="agriculture">Agriculture</option>
	<option value="housing">Housing</option>
	<option value="education">Education</option>
	<option value="food">Food</option>
	<option value="heath and fitness">Health and Fitness</option>
	<option value="home projects">Home Projects</option>
	<option value="technical">Technical</option>
	<option value="property purchase">Property Purchase</option>

</select><br>
<label><b>Choose Your Cover Image</b></label><br>
<input type="file" name="coverImg">	
<div class="form-group">
	<label>Project Timeline</label>
<input type="text" name="timeline" placeholder="e.g. 1 month" class="form-control">
</div>
<div class="form-group">
	<label>Description</label>
	<textarea placeholder="The body content of your project goes here..." name="description" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Requirements</label>
	<textarea name="requirements" placeholder="What do you require in this project?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Aim of the project</label>
	<textarea name="aim" placeholder="What are you aiming at, at the end of this project?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Human Resource</label>
	<textarea name="human_resource" placeholder="What kind of human resource does this project need?" class="form-control"></textarea>
</div>

<input type="submit" name="submit_personal_project" value="Submit" class="btn btn-success">&nbsp<input type="reset" name="reset" value="Reset" class="btn btn-warning">
</form>
</div>

<script src="scripts.js"></script>
<?php
include('components/footer.php');
?>