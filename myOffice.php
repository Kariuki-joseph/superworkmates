<?php
include('parts/header.php');
?>

<div class="profile-wrapper">
	<div class="profile">
		<h3 class="bg bg-warning">profile</h3>
		<label>Profile Picture</label><br>
<form method="" action="">
		<input type="file" name="profile_pic" class="pb-3">
</form>
	</div>
	<div class="personal">
	<h3 class="bg bg-warning">personal</h3>
<div class="relative">
<form method="" action="">
<input type="text" name="" placeholder="Country" class="form-control">
<input type="text" name="" placeholder="Home Town" class="form-control mt-2">
<div class="relative">
	<label class="float-l">Date of birth:</label>
	<input type="date" name="date_of_birth" placeholder="Date of birth" class="float-r">
</div>
<input type="number" name="" placeholder="Id number" class="form-control mt-2 mb-2">
</form>
</div>
</div>
<div class="work">
		<h3 class="bg bg-warning">work</h3>
		<div class="relative">
		<form>
			<input type="text" name="" placeholder="Status" class="form-control">
			<input type="text" name="" placeholder="Profession" class="form-control mt-2">
			<input type="text" name="" placeholder="Specialization" class="form-control mt-2">
			<label class="float-l"><b>Rating: 5<span class="fa fa-star"></span></b></label>
		</form>
		</div>
</div>

<div class="business">
		<h3 class="bg bg-warning">business</h3>
<div class="relative">
	<form method="" action="">
	<input type="text" name="" placeholder="Equipments" class="form-control mt-2">
	<input type="text" name="" placeholder="Property" class="form-control mt-2">
	<input type="button" name="" value="Add equipment/property" class="mt-2 btn btn-warning">
	</form>
</div>
</div>
</div>

<div class="relative flex mt-3 mr-2 ml-2">
	<div class="border-black flex-1">
		<h3 class="bg-warning center">Projects</h3>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</div>

	<div class="border-black flex-2">
		<h3 class="bg-warning center">In Progress</h3>
	</div>

	<div class="border-black flex-1">
		<h3 class="bg-warning center">Done</h3>
	</div>

</div>




<div class="relative border-black mt-3"><h3 class="center">Post a new project</h3>
<div class="projects-dropdown">
	<ul>
		<a href="formPersonalProject.php"><li>Personal Project</li></a>
		<a href="formBusinessProject.php"><li>Business Project</li></a>
		<a href="formSocialProject.php"><li>Social Project</li></a>
	</ul>
</div>

</div>


<div class="relative border-black mt-3"><h3 class="center">Browse for projects</h3>

	<?php
include 'dbConnect.php';
	?>
<div class="browse-projects">
	<?php
$personal_sql="SELECT DISTINCT category FROM personal_projects";
$personal=mysqli_query($connect,$personal_sql);
$business_sql="SELECT DISTINCT category FROM business_projects";
$business=mysqli_query($connect,$business_sql);
$social_sql="SELECT DISTINCT category FROM social_projects";
$social=mysqli_query($connect,$social_sql);

	  ?>
	<div><h3>Personal</h3>
<ul>
	<?php
while ($row=mysqli_fetch_array($personal)) {

	?>
	<li><?php echo $row['category'];?></li>
	<?php
}
	?>
</ul>
	</div>

	<div><h3>Social</h3>
<ul>
	<?php
while ($row=mysqli_fetch_array($social)) {

	?>
	<li><?php echo $row['category'];?></li>
	<?php
}
	?>
</ul>
	</div>

	<div><h3>Business</h3>
<ul>
	<?php
while ($row=mysqli_fetch_array($business)) {

	?>
	<li><?php echo $row['category'];?></li>
	<?php
}
	?>
</ul>
	</div>
</div>
</div>