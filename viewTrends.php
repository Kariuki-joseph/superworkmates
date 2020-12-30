<?php
include 'parts/header.php';
include 'dbConnect.php';
include 'config.php';
//get trend data
$trendId = htmlentities($_GET['trendId']);
$trend = new Trends();
$trnd = mysqli_fetch_array($trend->getById($trendId));
?>
<!--container for viewing the trends-->
<div class="row">
<div class="container">	
	<div class="text-center"><b><i><?php echo $trnd['title']; ?></i></b></div>	<?php echo $trnd['body'];?>
	<!--display into two columns-->
	<div class="row pt-3">
		<div class="col-sm-6 col-md-6">
			<div class="imageContainer">
				<img src="<?php echo $trnd['image'];?>" alt="trend image">
			</div>
		</div>
		<div class="col-sm-6 col-md-6 pl-5">
			<div class="imageContainer">
				<img src="<?php echo $trnd['image2'];?>" alt="trend image">
			</div>
		</div>
	</div>
	<!--/ display into two columns-->
</div>
</div>
<!--/ container for viewing the trends-->
<div class="container">
	<h4 class="pt-3">Related trends</h4>
<!--related trends-->
<div class="row pt-3 pb-3">
	<?php
		$relatedTrends = $trend->getRelated($trendId,$trnd['title'],$trnd['category']);
		//loop through related trends
		while ($trndRel = mysqli_fetch_array($relatedTrends)) {
	?>
	<div class="col-sm-3 p-2">
		<div class="card">
			<div class="card-header">
				<?php echo substr($trndRel['title'], 0,20); 
				if (strlen($trndRel['title']) > 20) {
					echo "...";
				}
				?>
				 <small>by <?php echo $trndRel['author']; ?></small>
				</div>
			<div class="card-body">
				<?php echo substr($trndRel['body'], 0,30);
				if (strlen($trndRel['body']) > 30) {
					echo "...";
				}
				 ?>
			</div>
			<a class="" href="viewTrends.php?trend=<?php echo $trndRel['title'];?>&trendId=<?php echo $trndRel['id'];?>">View</a>
		</div>
	</div>
	<?php
		}
	?>
</div>
<!--/ related trends-->
</div>
<?php
include 'parts/footer.php';
?>