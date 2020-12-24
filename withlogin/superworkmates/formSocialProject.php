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
	<center><h2>Please fill out the following form to post your social project</h2></center>
<div class="form-group">
		<label>Project Title</label>
<input type="text" name="title" placeholder="Enter the title of yor project" class="form-control">
</div>
<select name="category" class="form-control">
	<option value="">--Select Category--</option>
	<option value="events">Events</option>
	<option value="charity">Charity</option>
	<option value="sports">Sports</option>
	<option value="community projects">Community Projects</option>
	<option value="family activity">Family Activity</option>
	<option value="public project">Public Project</option>
</select><br>
<label><b>Choose Your Cover Image</b></label><br>
<input type="file" name="coverImg">	

<div class="form-group">
	<label>Project Timeline</label>
<input type="text" name="timeline" placeholder="e.g. 1 month" class="form-control">
</div>
<div class="form-group">
	<label>Aim of the project</label>
	<textarea name="aim" placeholder="What are you aiming at in this social project?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Beneficiaries</label>
	<textarea name="beneficiaries" placeholder="What do you require in this project?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Location</label>
	<textarea name="location" placeholder="Where do you want to host this social event?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Description</label>
	<textarea name="description" placeholder="Brief description of your social project" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Requirements</label>
	<textarea name="requirements" placeholder="What do you require in this project?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Budget</label>
	<textarea name="budget" placeholder="What budget do you have for this project?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Policies</label>
	<textarea name="policies" placeholder="What policies govern your social project?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Human Resource</label>
	<textarea name="human_resource" placeholder="What human resource is needed in this project?" class="form-control"></textarea>
</div>
<input type="submit" name="submit_social_project" value="Submit" class="btn btn-success">&nbsp<input type="reset" name="reset" value="Reset" class="btn btn-warning">
</form>
</div>

<script src="scripts.js"></script>