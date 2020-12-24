<?php
include('dbConnect.php');
include('config.php');

$categoryName = htmlentities($_GET['category']);
?>
 <div class="row">
<?php
  $trend = new Trends();
  $trends = $trend->getByCategory($categoryName);

  while ($row=mysqli_fetch_array($trends)) {
    ?>
 <div class="col-sm-4">
 <!--display card-->
 <div class="card trends-wrapper">
<h6>Created by <small><?php echo $row['author'];?></small>
 on <small><?php echo $row['time'];?></small></h6>

   <div class="card-header"><?php echo $row['title'];?></div>

<img src="<?php echo $row['image'];?>" height="100%" width="100%" alt="html 5 icon">

   <div class="card-body"><?php echo substr($row['body'],0,100)."..."; ?></div>
   <a href="viewTrends.php?trend=<?php echo $row['title'];?>&trendId=<?php echo $row['id'];?>">Read More</a>

   </div>
 </div>
  <!--display card-->
   <?php
}
	?>
  </div>
 


