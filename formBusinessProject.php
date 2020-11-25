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
	<center><h2>Please fill out the following form to post your business project</h2></center>
<div class="form-group">
		<label>Project Title</label>
<input type="text" name="title" placeholder="Enter the title of yor project" class="form-control">
</div>
<select name="category" class="form-control">
	<option value="">--Select Category--</option>
	<option value="agriculture">Agriculture</option>
	<option value="arts">Arts</option>
	<option value="commerce/trading">Commerce/Trading</option>
	<option value="construction">Construction</option>
	<option value="entertainment">Entertainment</option>
	<option value="health">Heath</option>
	<option value="education">Education</option>
	<option value="food">Food</option>
	<option value="manufacturing">Manufacturing</option>
	<option value="sports">Sports</option>
	<option value="security">Security</option>
	<option value="transport">Transport</option>
	<option value="technology">Technology</option>
	<option value="technical">Technical</option>

</select><br>
<label><b>Choose Your Cover Image</b></label><br>
<input type="file" name="coverImg">	

<div class="form-group">
	<label>Project Timeline</label>
<input type="text" name="timeline" placeholder="e.g. 1 month" class="form-control">
</div>
<div class="form-group">
	<label>Aim of the project</label>
	<textarea name="aim" placeholder="What are you aiming at, at the end of this project?" class="form-control"></textarea>
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
	<label>Market</label>
	<textarea name="market" placeholder="What about the targeted market?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Suppliers</label>
	<textarea name="suppliers" placeholder="Who are the suppliers to this project?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Products</label>
	<textarea name="products" placeholder="What products do your business mostly entail?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Pricing</label>
	<textarea name="pricing" placeholder="Give an estimate of some of your products?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Profits</label>
	<textarea name="profits" placeholder="What approximate profit does your business make?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Human Resource</label>
	<textarea name="human_resource" placeholder="What kind of human resource does this project need?" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Policies</label>
	<textarea name="policies" placeholder="What are some of the policies that your business have?" class="form-control"></textarea>
</div>
<input type="submit" name="submit_business_project" value="Submit" class="btn btn-success">&nbsp<input type="reset" name="reset" value="Reset" class="btn btn-warning">
</form>
</div>

<script src="scripts.js"></script>