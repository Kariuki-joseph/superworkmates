<?php
include('components/header.php');
include('components/navBar.php');
include('dbConnect.php');

$sql="SELECT * FROM social_projects";
$query=mysqli_query($connect,$sql);
?>
<div class="row">
	<?php
	while ($row=mysqli_fetch_array($query)) {
	?>
	<div class="col-sm-6">

<!--social Project-->
<div class="projects-wrapper">
	<div class="project-title p-field"><h3><?php echo $row['title'];?></h3></div><!--plus author plus author profile pic-->
	<div class="project-image">
		<img src="<?php echo $row['cover_img'];?>">
		<div class="project-timeline"><?php echo $row['timeline'];?></div>
	</div>
	<div class="project-aim p-field"><?php echo $row['aim'];?></div>
	<button class="showMore">Show more</button><div class="open">
	<div class="project-location p-field"><?php echo $row['location'];?></div>
	<div class="project-description p-field"><?php echo $row['description'];?></div>
	<div class="project-requirements p-field"><?php echo $row['requirements'];?></div>
	<div class="project-budget p-field"><?php echo $row['budget'];?></div>
	<div class="project-policies p-field"><?php echo $row['policies'];?></div>
	<div class="project-hr p-field"><?php echo $row['human_resource'];?></div>
</div>
<!--social Project-->

	</div>
</div>

<?php
}
?>
</div>
<?php
include('components/footer.php');
?>