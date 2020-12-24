<?php
include('components/header.php');
include('components/navBar.php');
include('dbConnect.php');

$sql="SELECT * FROM personal_projects";
$query=mysqli_query($connect,$sql);
?>

<div class="row">
	<?php
	while ($row=mysqli_fetch_array($query)) {
	?>
	<div class="col-sm-6">
<!--project display-->
	<div class="projects-wrapper">
	<div class="project-title"><p><?php echo $row['title'];?></p></div>
	<div class="project-aim"><p><?php echo $row['aim'];?></p></div>
	<div class="project-image">
		<img src="<?php echo $row['cover_img'];?>">
	<div class="project-timeline"><?php echo $row['timeline'];?></div>
	</div>
<button class="showMore">Show more</button><div class="open">
	<div class="project-description"><p><?php echo $row['description'];?></p></div>
	<div class="project-requirements"><p><?php echo $row['requirements'];?></p></div>
	<div class="project-hr"><p><?php echo $row['human_resource'];?></p>
</div>
</div>
</div>
<!--project display-->
	</div>
<?php
}
?>	
</div>

<?php
include('components/footer.php');
?>